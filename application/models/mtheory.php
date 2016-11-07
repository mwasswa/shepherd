<?php

class Mtheory extends CI_Model {

    public function get_theory($limit=0,$offset=0) {
        $sql = "select * from theory where 1";
        if($limit > 0){
            $sql .= " limit $limit";
        }
        
        if($offset > 0){
            $sql .= " offset $offset";
        }
        $result = $this->db->query($sql);
        if ($result->num_rows() > 0) {
            foreach ($result->result_array()as $row) {
                extract($row);
                $sub_name = $this->msubject->get_subject_byId($subjectid);
                $vdata[$id][$sub_name][$topic][$content][$category] = $upload."-:".$level."-:".$class."-:".$term."-:".$subtopic;
            }
            return $vdata;
        } else {
            return 0;
        }
    }
    
    public function get_sidebar_theory(){
        $sql = "select * from theory where 1 order by level desc,class,subjectid,term";
        $result = $this->db->query($sql);
        if ($result->num_rows() > 0) {
            foreach ($result->result_array()as $row) {
                extract($row);
                $sub_name = $this->msubject->get_subject_byId($subjectid);
                $vdata[$level][$class][$sub_name][$term][$topic][$subtopic]['documents'][$category][] = $upload;
            }
            return $vdata;
        } else {
            return array();
        }
    }
    
    public function edit_theory($data = array()){
        extract($data);
        $where = "id = $id";
        $sql = $this->db->update_string('theory', $data, $where);
        $result = $this->db->query($sql);
        //print $sql;
        if($result){
            return 1;
        }else{
            return 0;
        }
    }
    
    public function get_theory_detailsId($id){
        $sql = $this->db->query("select * from theory where id='$id'");
        if ($sql->num_rows() > 0) {
            foreach ($sql->result_array() as $row) {
                extract($row);
                //$role = $this->get_user_role($roleid);
                $sub = $this->msubject->get_subject_byId($subjectid);
                $data["et_id"] = $id;
                $data["e_upload"] = $upload;
                $data["et_subject"] = $sub.",".$subjectid;
                $data["et_topic"] = $topic;
                $data["e_content"] = $content;
                $data["e_category"] = $category;
            }
            return $data;
        } else {
            return 0;
        }
    }
    
    public function add_theory($data=array()){
        $sql = $this->db->insert_string("theory",$data);
        $result = $this->db->query($sql);
        if($result){
            return $this->db->insert_id();
        }else{
            return 0;
        }
    }

}
