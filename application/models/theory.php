<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class Theory extends CI_Model {

    function get($fileName){

        $sql = $this->db->query("select * from theory where upload='$fileName'");
        if ($sql->num_rows() == 1) {
            foreach ($sql->result() as $row) {
                $fileID = $row->id;
            }
            return $fileID;
        } else {
            return false;
        }
        
    }
}
?>
