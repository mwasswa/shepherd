<?php
class Msubject extends CI_Model{
    public function get_subject_byId($id){
        $result = $this->db->query("select * from subject where id = '$id'");
        if($result->num_rows()> 0){
            foreach($result->result_array()as $row){
                return $row['name'];
            }
        }  else {
            return 0;
        }
    }

    function getSubjectId($subjectName){
        $result = $this->db->query("SELECT * FROM subject WHERE name='$subjectName'")->result();
       
        if($result){
            foreach($result as $val){
                return $val->id;
            }
            
        }else{
            return false;
        }
        
    }

    function getSubjects(){
        $result = $this->db->query("SELECT * FROM subject order by name asc")->result();

        return $result;
    }

}

