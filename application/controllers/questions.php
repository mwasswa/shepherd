<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
*/
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Questions extends CI_Controller {
    function index() {
        redirect('');
    }

    function searchTeacher() {
        $teacherName = $_GET['query'];
        $data = $this->musers->teacherSearch($teacherName);
        if($data) {
            echo json_encode($data);
        }else {
            $data = array();
            echo json_encode($data);
        }

        return false;
    }

    function myQuestions() {
        $author = $this->session->userdata('username');
        $data = $this->get_videos();
        $myQuestions = $this->mqueries->get_queries_author($author);

        foreach($myQuestions as $teacherName) {
            $teacherName->receipient = $this->musers->getName($teacherName->receipient);
        }

        $data['myQuestions']=$myQuestions;

        $this->template->load('default', 'myQuestions', $data);
    }

    function questionResponse() {

        $data = array();
        $response = array();
        $response = $_GET['query'];
        $id = $_GET['id'];
        if($this->session->userdata('urole')=='student') {
            $data = array(
                    'qtn_id'=> $id,
                    'roleid'=>1, //Should use a model to pick the role id form the roles table
                    'reply'=>$response
            );

        }else {
            $data = array(
                    'qtn_id'=> $id,
                    'roleid'=>2, //Should use a model to pick the role id form the roles table
                    'reply'=>$response
            );

        }

        $return =  $this->mqueries->post_answer($data);

        if($return) {
            $response = array(
                'qresponse'=>$this->mqueries->getResponse($id),
                'question'=>$this->mqueries->getQuestionInfo($id)
            );
            
            
            echo json_encode($response);
        }

        
   
    }

    public function get_videos() {
        $videos = $this->mvideo->get_videos();
        $data['videos'] = $videos;
        return $data;
    }


}

?>
