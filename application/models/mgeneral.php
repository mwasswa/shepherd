<?php

class Mgeneral extends CI_Model {

    public function delete_record($table, $id) {
        $sql = $this->db->query("delete from $table where id = $id");
        if ($sql) {
            return 1;
        } else {
            return 0;
        }
    }

    public function get_settings() {
        $result = $this->db->query("select * from settings where 1");
        if ($result->num_rows() == 1) {
            foreach ($result->result_array() as $row) {
                return $row;
            }
        } else {
            return 0;
        }
    }

    public function update_settings($table, $data = array()) {
        if (!is_array($this->get_settings())) {
            $sql = $this->db->insert_string($table, $data);
            $result = $this->db->query($sql);
            if ($result) {
                return $this->db->insert_id();
            } else {
                return 0;
            }
        }else{
            $term = $data["current_term"];
            $year = $data["current_year"];
            $createdby = $this->session->userdata('username');
            $result = $this->db->query("UPDATE settings set current_term='$term',current_year='$year',createdby='$createdby' WHERE 1");
            //$result = $this->db->query($sql);
            if ($result) {
                return 1;
            } else {
                return 0;
            }
        }
    }

    public function add_item($table, $data = array()) {
        //print_r($data);exit;
        $sql = $this->db->insert_string($table, $data);
        $result = $this->db->query($sql);
        if ($result) {
            return $this->db->insert_id();
        } else {
            return 0;
        }
    }

   

}
