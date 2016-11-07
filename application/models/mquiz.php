<?php

class Mquiz extends CI_Model {

    public function add_quiz($path) {
        $path = realpath($path);
        $path = str_replace('\\', '/', $path);
        $sql = "LOAD DATA LOCAL INFILE '$path' INTO TABLE quiz FIELDS TERMINATED BY ',' LINES TERMINATED BY '\n'(titleid,question,options,correct_answer)";
        //die($sql);
        $result = $this->db->query($sql);
        if ($result) {
            return 1;
        } else {
            return 0;
        }
    }

    public function add_quiz_general($data = array()) {
        $qid = $this->mgeneral->add_item('quiz_general', $data);
        if ($qid) {
            return $qid;//$this->mgeneral->add_item('quiz_general', $data);
        } else {
            return 0;
        }
    }
    
    public function get_sidebar_quizzes(){
        $sql = "select * from quiz_general WHERE 1 order by level desc,class,subject,term";
        $result = $this->db->query($sql);
        if($result->num_rows() > 0){
            foreach($result->result_array() as $row){
                extract($row);
                $createdby = $this->musers->getName($createdby);
                //$data[$id]= $row;
                $sub_name = $this->getSubject($subject);
                $vdata[$level][$class][$sub_name][$term][$topic][$subtopic]['quiz'][$id] = $title;
            }
            return $vdata;
        }else{
            return array();
        }
    }

    public function get_quizzes($role,$class = "") {
        if ($role == 'student') {
            $sql = "select * from quiz_general where (status = 'o' or class = '$class' or class='all') AND active= 1 ";
        } else {
            $sql = "select * from quiz_general WHERE 1";
        }
        $result = $this->db->query($sql);
        //print_r($result->result_array());exit;
        if($result->num_rows() > 0){
            foreach($result->result_array() as $row){
                extract($row);
                //extract($createdby);
                $createdby = $this->musers->getName($createdby);              
                
                $data[$id]= $row;
            }
            //echo json_encode($data);
            //exit;
            return $data;
        }else{
            return array();
        }
    }
    
    public function get_questions_byTitleid($titleid){
        //print $titleid;exit;
        $sql = "select * from quiz where titleid = '$titleid'";
        $result = $this->db->query($sql);
        if($result->num_rows() > 0){
            foreach($result->result_array() as $row){
                extract($row);
                $data[$id] = $row;
            }
            return $data;
        }else{
            return array();
        }
    }
    
    public function get_quiz_titleid($titleid){
        $sql = "select * from quiz_general where id = '$titleid'";
        $result = $this->db->query($sql);
        if($result->num_rows() > 0){
            foreach($result->result_array() as $row){
                extract($row);
                $data[$id] = $row;
            }
            return $data;
        }else{
            return array();
        }
    }
    
    public function get_results($qid){
        $sql = "select * from quiz_scores where quiz_id = '$qid' order by score desc";
        $result = $this->db->query($sql);
        if($result->num_rows() > 0){
            foreach($result->result_array() as $row){
                extract($row);
                $data[$id] = $row;
            }
            return $data;
        }else{
            return array();
        }
    }


    function getAllQuiz(){
        $sql = 'SELECT * FROM quiz_general';
        $result = $this->db->query($sql)->result();
        if($result){
            foreach($result as $res){
                $res->createdby = $this->musers->getName($res->createdby);
            }
            return $result;
        }else{
            return false;
        }
    }

    function getParticularQuiz($id){
        $sql = "SELECT * FROM quiz_general WHERE id='$id'";
        $result = $this->db->query($sql)->result();
        if($result){
            foreach($result as $res){
                $res->createdby = $this->musers->getName($res->createdby);
            }
            return $result;
        }else{
            return false;
        }
    }

    function getTeacherQuiz($teacher){
        $sql = "SELECT * FROM quiz_general WHERE createdby ='$teacher'";
        $result = $this->db->query($sql)->result();
        if($result){
            foreach($result as $res){
                $res->createdby = $this->musers->getName($res->createdby);
            }
            return $result;
        }else{
            return false;
        }
    }

    function quizToEdit($id){
        $sql = "SELECT * FROM quiz_general WHERE id ='$id'";
        $result = $this->db->query($sql)->result();
        foreach($result as $res){
            $res->subject = $this->getSubject($res->subject);
        }
        return $result;
    }

    function activate($id){
        $sql = "SELECT * FROM quiz_general WHERE id ='$id'";
        $result = $this->db->query($sql)->result();

        foreach($result as $res){
            if($res->active == 0){
                $this->db->query("UPDATE quiz_general SET active = 1 WHERE id = '$id'");
                return true;
            }else{
                $this->db->query("UPDATE quiz_general SET active = 0 WHERE id = '$id'");
                return true;
            }
        }

        return false;
    }

    function getQuizQuestions($id){
        $sql = "SELECT * FROM quiz WHERE titleid ='$id'";
        $result = $this->db->query($sql)->result();
       
        return $result;
    }

   function updateQuiz($id,$data=array()){
       //$query = "UPDATE";
       //$this->db->query("UPDATE quiz_general SET active = 0 WHERE id = '$id'");
      
            $title=$this->input->post('title');
            $duration=$this->input->post('duration');
            $start_time = $this->input->post('start_time');
            $class = $this->input->post('qclass');
            $weight = $this->input->post('qweight');
            $year = $this->input->post('qyear');
            $term = $this->input->post('qterm');
            $status = $this->input->post('qstatus');
            $subject = $this->input->post('qsubject');
            $date = $this->input->post('qdate');

        $query = "UPDATE quiz_general SET title='$title',duration='$duration',start_time='$start_time',class='$class',weight='$weight',year='$year',term='$term',status='$status',subject='$subject',date='$date' WHERE id='$id'";

        if($this->db->query($query)){
            return TRUE;
        }else{
            return FALSE;
        }
      
   }

   function getSubject($id){
       $qsl = "SELECT * FROM subject WHERE id='$id'";
       $res = $this->db->query($qsl)->result();
       foreach ($res as $result){
           return $result->name;
       }
   }

   function getQuestion($id){
       $res = $this->db->query("SELECT * FROM quiz WHERE id='$id'")->result();
       if($res){
           return $res;
       }else{
           return false;
       }
   }

   function updateQuestion(){
       $question = $this->input->post('question');
        $options =  $this->input->post('options');
        $correct = $this->input->post('correctOption');
        $qid = $this->input->post('qtnid');
        $weight = $this->input->post('weight');

        $query = "UPDATE quiz SET question='$question',options='$options',correct_answer='$correct',weight='$weight' WHERE id='$qid'";

        if($this->db->query($query)){
            return TRUE;
        }else{
            return FALSE;
        }
   }

   function getNumberOfQuestions($titleid){
       $result = $this->db->query("SELECT * FROM quiz WHERE titleid='$titleid'");
       if($result){
           return $result->num_rows();
       }else{
           return 0;
       }
   }

   function getQuizAttempts($quizid,$user){
       $result = $this->db->query("SELECT * FROM quiz_scores WHERE quiz_id='$quizid' AND user='$user'");
       if($result){
           return $result->num_rows()+1;
       }else{
           return 1;
       }
   }

   function getAnswers($info){
       $information = explode('-', $info);
       $quiz = $information[0];
       $attempts =  $information[1];
       $user =  $information[2];

       $query = "SELECT * FROM quiz_answers WHERE quiz_id = '$quiz' AND attempt ='$attempts' AND participant = '$user'";
       $result = $this->db->query($query)->result();
       //Array with the quiz title and user's name
       $get = $this->db->query("SELECT title FROM quiz_general WHERE id='$quiz'")->result();
       foreach($get as $res){
           $quiz = $res->title;
       }
       $data['header']= array(
           'quiz'=>$quiz,
           'participant'=>$this->musers->getName($user)
       );

       $i = 0;
       foreach ($result as $qtnAns){

           $questionInfo = $this->db->query("SELECT question, correct_answer FROM quiz WHERE id='$qtnAns->qtn_id'")->result();
           foreach($questionInfo as $qinfo){
               $qAsked = $qinfo->question;
               $qAns = $qinfo->correct_answer;
           }
           $data['body'][$i]=array(
            'question'=>$qAsked,
               'correct'=>$qAns,
             'answer'=>$qtnAns->answer
           );
           $i++;
       }

       return $data;
       
   }

}

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

