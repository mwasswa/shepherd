<?php
class Mvideo extends CI_Model{
    public function get_videos(){
	$this->load->model('msubject');
        $sql = "select * from videos where 1";
        $result = $this->db->query($sql);
        if($result->num_rows()> 0){
            foreach($result->result_array()as $row){
                extract($row);
                $sub_name = $this->msubject->get_subject_byId($subjectid);
                $vdata[$sub_name][$topic][$id][$description] = $path;
            }
            return $vdata;
        }else{
            return 0;
        }
    }
    
    public function get_sidebar_videos(){
        $sql = "select * from videos where 1 order by level desc,class,subjectid,term";
        $result = $this->db->query($sql);
        if($result->num_rows()> 0){
            foreach($result->result_array()as $row){
                extract($row);
                $sub_name = $this->msubject->get_subject_byId($subjectid);
                $vdata[$level][$class][$sub_name][$term][$topic][$subtopic]['clip'][$id] = $path;
            }
            return $vdata;
        }else{
            return array();
        }
    }
    
    public function get_video_rows(){
        $sql = "select * from videos where 1";
        $result = $this->db->query($sql);
        if($result->num_rows()> 0){
            return $result->num_rows();
        }else{
            return 0;
        }
    }
    
    public function get_videos_table($limit=0,$offset=0){
        $sql = "select * from videos";
        if($limit > 0){
            $sql .= " limit $limit";
        }
        if($offset > 0){
            $sql .= " offset $offset";
        }
        $result = $this->db->query($sql);
        if($result->num_rows()> 0){
            foreach($result->result_array()as $row){
                extract($row);
                $sub_name = $this->msubject->get_subject_byId($subjectid);
                $vdata[$sub_name][$topic][$id][$description][$created][$createdby] = $path."-:".$level."-:".$class."-:".$term."-:".$subtopic;
            }
            return $vdata;
        }else{
            return 0;
        }
    }
    
    public function edit_video($data=array()){
        extract($data);
        $where = "id = $id";
        $sql = $this->db->update_string('videos', $data, $where);
        $result = $this->db->query($sql);
        if($result){
            return 1;
        }else{
            return 0;
        }
    }
    
    public function get_video_detailsId($id){
        $sql = $this->db->query("select * from videos where id='$id'");
        if ($sql->num_rows() > 0) {
            foreach ($sql->result_array() as $row) {
                extract($row);
                $subject = $this->msubject->get_subject_byId($subjectid);
                $data["e_vid"] = $id;
                $data["e_vpath"] = $path;
                $data["e_vsubject"] = $subject;
                $data["e_vtopic"] = $topic;
                $data["e_vdesc"] = $description;
            }
            return $data;
        } else {
            return array();
        }
    }
    
    public function add_video($data=array()){
        $sql = $this->db->insert_string('videos',$data);
        $result = $this->db->query($sql);
        if($result){
            return $this->db->insert_id();
        }else{
            return 0;
        }
    }

    //function to search for the videos
    function videoSearch($name){

        $result = $this->db->query("SELECT * FROM videos WHERE path LIKE '%$name%'")->result();
        if($result){
            return $result;
        }else{
            return false;
        }
        
    }

    function getVideoBySubject($id){
        $result = $this->db->query("SELECT * FROM videos WHERE subjectid = '$id'")->result();
        if($result){
            return $result;
        }else{
            return false;
        }
    }
}

