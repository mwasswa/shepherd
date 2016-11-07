<?php

class Mqueries extends CI_Model {

    public function add_query($data = array()) {
        $sql = $this->db->insert_string('teacher_student_querries', $data);
        $result = $this->db->query($sql);
        if ($result) {
            return $this->db->insert_id();
        } else {
            return 0;
        }
    }

    public function get_queries_author($author) {
        $sql = $this->db->query("select * from teacher_student_querries where author='$author' order by id desc")->result();
        if ($sql) {
            return $sql;
        } else {
            return 0;
        }
    }

    public function get_querries_count($year,$term,$subject,$class) {
        $qu = "select * from teacher_student_querries where subject='$subject'";
        if(strlen($year)) {
            $qu .= " and year='$year'";
        }

        if(strlen($term)) {
            $qu .= " and term='$term'";
        }

        if($class) {
            $qu .= " and author_class='$class'";
        }

        //print($qu); exit;
         $sname = $this->msubject->get_subject_byId($subject);
        $sql = $this->db->query($qu);

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

    public function get_subject_querries_count() {
        $sql = $this->db->query("select * from teacher_student_querries");
        if ($sql->num_rows() > 0) {
            $data = array();
            foreach ($sql->result_array() as $row) {
                extract($row);
                $data1[$subject] = 0;
            }
            foreach ($sql->result_array() as $row) {
                extract($row);
                $data1[$subject] += 1;
            }
            return $data1;
        } else {
            return 0;
        }
    }

    public function get_topic_querries_count() {
        $sql = $this->db->query("select * from teacher_student_querries");
        if ($sql->num_rows() > 0) {
            $data = array();
            foreach ($sql->result_array() as $row) {
                extract($row);
                $data1[$topic] = 0;
            }
            foreach ($sql->result_array() as $row) {
                extract($row);
                $data1[$topic] += 1;
            }
            return $data1;
        } else {
            return 0;
        }
    }

    public function get_queries_teacher($teacher) {
        $sql = $this->db->query("select * from teacher_student_querries where receipient='$teacher' order by id desc")->result();
        if($sql){
            foreach($sql as $result){
                $result->author = $this->musers->getName($result->author);
            }
        }else{
            return false;
        }
        
        return $sql;

    }

    public function get_queries_teacher_count() {
        $sql = $this->db->query("select * from teacher_student_querries");
        if ($sql->num_rows() > 0) {
            return $sql->num_rows();
        } else {
            return 0;
        }
    }

    public function get_query_replies($qid) {
        $sql = $this->db->query("select * from query_replies where qtn_id='$qid' order by created asc")->result();
        if ($sql) {

            return $sql;

        } else {
            return 0;
        }
    }

    public function get_query_replies_other($qid) {
        $sql = $this->db->query("select * from query_replies where qtn_id='$qid'");
        if ($sql->num_rows() > 0) {
            foreach ($sql->result_array() as $row) {
                extract($row);
                $data[$id][$created] = $reply;
            }
            return $data;
        } else {
            return 0;
        }
    }

    public function get_query_byId($qid) {
        $sql = $this->db->query("select * from teacher_student_querries where id='$qid'");
        if ($sql->num_rows() > 0) {
            foreach ($sql->result_array() as $row) {
                extract($row);
                return $question;
            }
        } else {
            return 0;
        }
    }

    public function post_answer($data = array()) {
        $sql = $this->db->insert_string('query_replies', $data);
        $result = $this->db->query($sql);
        if ($result) {
            return $this->db->insert_id();
        } else {
            return 0;
        }
    }

    function getQuestionInfo($qid) {
        $sql = $this->db->query("select * from teacher_student_querries where id='$qid'")->result();

        return $sql;

    }

    function getResponse($id) {
        $sql = $this->db->query("select * from query_replies where qtn_id='$id'")->result();

        return $sql;
    }

}
