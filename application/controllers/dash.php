<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
*/
if (!defined('BASEPATH'))
    exit('No direct script access allowed');



class Dash extends CI_Controller {

    function index() {
        redirect('');

    }

    public function dashBoard() {
        $data = $this->get_videos();
        $data['subjects'] = $this->msubject->getSubjects();
        $data['classes']=$this->mclass->getAllClasses();
        $data['teachers']=$this->musers->getUser(2);
        $data['totalCountsPerFile'] = $this->fileclicks->getTotalCountsPerFile();
        $this->template->load("default", "dash/dash", $data);


    }

    function getQuizPerSubject() {
        $id = $this->uri->segment(3);
        $data = $this->get_videos();
        $data['quizes'] = $this->stats->quizPerSubject($id);
        $this->template->load("default", "dash/dashQuizes", $data);
    }

    function getQuizStats() {
        $id = $this->uri->segment(3);
        $data = $this->get_videos();
        $data['counts']=$this->stats->quizPerformance($id);

        $this->template->load("default", "dash/quizStats", $data);

    }

    function studentTeacherQuestions() {
        $subjectid = $this->uri->segment(3);
        $data = $this->get_videos();

        if($this->input->post('stat_filter_btn')) {
            $year = $this->input->post('stat_year');
            $class = $this->input->post('stat_class');
            $term = $this->input->post('stat_term');
            $return= $this->mqueries->get_querries_count($year,$term,$subjectid,$class);
            if(count($return)) {
                $data['quizCount'] = $return;
            }else{
                $data['quizCount'] = array();
            }
        }else {
            $data['quizCount']= $this->stats->getTeacherStudentQueryCounts($subjectid);

        }

        $this->template->load("default", "dash/studentTeacherQuestions", $data);

    }

    public function get_videos() {
        $videos = $this->mvideo->get_videos();
        $data['videos'] = $videos;
        return $data;
    }
}
?>
