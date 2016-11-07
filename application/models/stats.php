<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 * Written by Joshua Waiswa
 * jwaiswa7@gmail.com
*/
class Stats extends CI_Model {

    function quizPerSubject($subjectid) {
        $sql = "SELECT * FROM quiz_general WHERE subject='$subjectid'";
        $result = $this->db->query($sql)->result();
        if($result) {
            return $result;
        }else {
            return 'false';
        }

    }
    function quizPerformance($quizid) {
        $sql = "SELECT * FROM quiz WHERE titleid='$quizid'";
        $result = $this->db->query($sql)->result();//Gets all the questions for the particular quiz..
        $data = array();
        $i = 0;
        foreach ($result as $res) {
            $data[$i] = array(
                    'question'=> $res->question,
                    'passRate'=>$this->passRate($res->id)
            );
            $i++;
        }

        return json_encode($data);
    }

    function passRate($id) {
        $sql = "SELECT * FROM quiz_answers WHERE qtn_id='$id'";
        $result = $this->db->query($sql)->result();//Gets all the questions for the particular quiz..
        $number = $this->db->query($sql)->num_rows();
        if($number == 0) {
            $number = 1;
        }
        $i = 0;
        foreach($result as $res) {
            if(preg_replace( "/\r|\n/", "", $res->answer) == preg_replace( "/\r|\n/", "", $this->right($res->qtn_id))) {
                $i++;
            }else {
                $i = $i;
            }
        }

        return ($i/$number)*100;

    }

    function right($id) {
        $sql = "SELECT * FROM quiz WHERE id='$id'";
        $result = $this->db->query($sql)->result();//Gets all the questions for the particular quiz..
        foreach($result as $res) {
            return $res->correct_answer;
        }
    }

    function getTeacherStudentQueryCounts($subjectid) {
        $sql = "SELECT * FROM teacher_student_querries WHERE subject='$subjectid'";

        $sql = $this->db->query($sql);
         $sname = $this->msubject->get_subject_byId($subjectid);

        
        if ($sql->num_rows() > 0) {
            foreach ($sql->result_array() as $row) {
                extract($row);
                $data[$sname][$topic] = 0;
            }
            //var_dump($data);
            foreach ($sql->result_array() as $row) {
                extract($row);
                $data[$sname][$topic] += 1;
            }
            //var_dump($data);
            return $data;
        } else {
            return array();
        }
    }

}

?>
