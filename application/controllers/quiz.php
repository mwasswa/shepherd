<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
*/
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Quiz extends CI_Controller {

    function index() {
        redirect ('');
    }

    function editQuiz() {//For editing quizes
        $data = $this->get_videos();
        if($this->session->userdata('urole')== 'admin') {
            $data['results'] = $this->mquiz->getAllQuiz();
        }else {
            $data['results'] = $this->mquiz->getTeacherQuiz($this->session->userdata('username'));
        }

        $this->template->load("default", "quiz/editQuiz", $data);

    }

    function addQuiz() {//For adding a quiz


        $data = array(
                "title" => $_GET['title'],
                "duration" =>$_GET['duration'],
                "start_time" =>$_GET['start_time'],
                "date"=>$_GET['date'],
                "createdby"=>$this->session->userdata('username')

        );


        $gid = $this->mquiz->add_quiz_general($data);

        echo $gid;
    }

    public function editQuizSetup() {
        $data = $this->get_videos();
        $qid = $this->uri->segment(3);
        $data['quiz'] = $this->mquiz->quizToEdit($qid);
        $data['qid'] = $qid;
        $this->template->load("default", "quiz/editQuizSetup", $data);

    }

    public function changeActive() {
        //Will set a quiz to either active or deactive, when a quiz is active, then students can do it, if its deactive, students can't do it.. :)
        $var = $this->uri->segment(3);

        if($this->mquiz->activate($var)) {
            $this->editQuiz();
        }else {
            echo 'Something is wrong <br> Contact admin please';
        }

    }

    public function addQuestions() {
        //Adds quesitons to a particular quiz
        $data = $this->get_videos();
        $res= $this->mquiz->quizToEdit($this->uri->segment(3));
        foreach($res as $result) {
            $data['quizName'] = $result->title;
            $data['quiz_id'] = $result->id;
        }

        $data['questions'] = $this->mquiz->getQuizQuestions($this->uri->segment(3));

        $this->template->load("default", "quiz/addQuestions", $data);


    }

    function deleteQuestion(){

        if($this->mgeneral->delete_record('quiz',$this->uri->segment(3))==1){
            redirect('quiz/addQuestions/'.$this->uri->segment(4));
        }else{
            echo 'Not good at all';
        }
        
    }

    public function deleteQuiz() {
        //Deleting a given quiz..
        echo 'Editing '.$this->uri->segment(3);

    }

    public function addQuestion(){
        //Adds question to the quiz... 
        $data = $this->get_videos();
        $res = $this->mquiz->quizToEdit($this->uri->segment(3));
        //$data['qtn'] =  $this->uri->segment(3);
        foreach($res as $result){
            $data['qtnName'] = $result->title;
            $data['qid'] = $result->id;
        }
     
        $this->template->load("default", "quiz/addQuestion", $data);
    }

    function postQuestion(){
//Add a new question to the quiz table.. 
        $question = $this->input->post('question');
        $options =  $this->input->post('options');
        $correct = $this->input->post('correctOption');
        $qid = $this->input->post('quizid');

        $data = array(
            'titleid'=>$qid,
            'question'=>$question,
            'options'=>$options,
            'correct_answer'=>$correct,
            'weight'=>$this->input->post('weight')
        );
        if($this->mgeneral->add_item('quiz',$data) == 0){
            echo 'Please contact admin.. Something went terribly wrong';
        }else{
            redirect('quiz/addQuestions/'.$qid);  }      
       

    }

    public function updateQiz(){
      
       if($this->mquiz->updateQuiz($this->input->post('id'))){
            redirect('quiz/editQuizSetup/'.$this->input->post('id'));
       }else{
           echo 'Contact admin, something went horribly wrong....';
       }
    }

    function editQuestion(){
        $data = $this->get_videos();
        $qid = $this->uri->segment(3);
        if($this->mquiz->getQuestion($qid)){
            $data['quiz'] = $qid;
            $data['question']=$this->mquiz->getQuestion($qid);
            $this->template->load("default", "quiz/editQuestion", $data);
        }else{
            echo 'Something went terribly wrong, kindly contact Admin';
        }
    }

    function postQuestionEdit(){
        if($this->mquiz->updateQuestion()){
            redirect('quiz/addQuestions/'.$this->input->post('quizid'));
        }else{
            echo 'Soemthing went horribly wrong.. Kindly contact admin :(';
        }
    }

    function questionAnswers(){
        //Mean while, there is some crazy stuff going on in this function.. u have nooooo idea...
        $data = $this->get_videos();
        $info = $this->uri->segment(3);
        $data['information'] = json_encode($this->mquiz->getAnswers($info));
        $this->template->load("default", "quiz/questionAnswers", $data);
        
    }

    public function get_videos() {
        $videos = $this->mvideo->get_videos();
        $data['videos'] = $videos;
        return $data;
    }
}
/*
 * Number of attempts against number of failed attempts
 */
?>
