<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 * Written by Joshua Waiswa
 * jwaiswa7@gmail.com
 */
class fileSearch extends CI_Model{

    function getSubjects($id){
        $result = $this->db->query("SELECT * FROM theory WHERE subjectid = '$id'")->result();
        if($result){
            return $result;
        }else{
            return false;
        }
    }

    function getFileSearched($name){
        $result = $this->db->query("SELECT * FROM theory WHERE upload LIKE '%$name%'")->result();
        if($result){
            return $result;
        }else{
            return false;
        }
    }

}

?>
