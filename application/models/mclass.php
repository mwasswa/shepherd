<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class Mclass extends CI_Model{
    
    function getAllClasses(){
         $result = $this->db->query("SELECT * FROM class")->result();

        return $result;
    }

}
?>
