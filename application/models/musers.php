<?php

##############################                                                                                                                          #
#  The Login Model
#  Date: 14/March/2015
#  Author: Moses Wasswa                                                                                
#  Email: mwasswa@marble.ug 
##############################

class Musers extends CI_Model {

    public function add_user($data = array()) {
        $sql = $this->db->insert_string('users', $data);
        $result = $this->db->query($sql);
        if ($result) {
            return $this->db->insert_id();
        } else {
            return 0;
        }
    }

    public function edit_user($data = array()) {
        extract($data);
        $where = "id = $id AND username = '$username'";
        $sql = $this->db->update_string('users', $data, $where);
        $result = $this->db->query($sql);
        //print $sql;
        if ($result) {
            return 1;
        } else {
            return 0;
        }
    }

    public function get_user_detailsId($id) {
        $sql = $this->db->query("select * from users where id='$id'");
        if ($sql->num_rows() > 0) {
            foreach ($sql->result_array() as $row) {
                extract($row);
                $role = $this->get_user_role($roleid);
                //$data[$id][$firstname][$lastname][$username][$class][$password] = $role;
                $data["id"] = $id;
                $data["e_fname"] = $firstname;
                $data["e_lname"] = $lastname;
                $data["e_uname"] = $username;
                $data["e_class"] = $class;
                $data["e_psword"] = $password;
                $data["e_role"] = $role . "," . $roleid;
            }
            return $data;
        } else {
            return 0;
        }
    }

    public function validate_user($uname, $psword) {
        //$psword = $this->encrypt->sha1($psword);
        $psword = do_hash($psword);
        $sql = $this->db->query("select * from users where username='$uname' and password='$psword'");
        if ($sql->num_rows() > 0) {
            foreach ($sql->result() as $row) {
                $data['status'] = $row->status;
                $data['roleid'] = $row->roleid;
                $data['class'] = $row->class;
                $data['name'] = $row->firstname . " " . $row->lastname;
            }
            return $data;
        } else {
            return array();
        }
    }

    public function validate_username($uname) {
        $sql = $this->db->query("select * from users where username='$uname'");
        if ($sql->num_rows() > 0) {
            return 1;
        } else {
            return 0;
        }
    }

    public function get_user_role($roleid) {
        $sql = $this->db->query("select * from roles where id='$roleid'");
        if ($sql->num_rows() == 1) {
            foreach ($sql->result() as $row) {
                $role = $row->role;
            }
            return $role;
        } else {
            return 0;
        }
    }

    public function change_password($data = array()) {
        $username = $this->session->userdata('username');
        $where = "username = '$username'";
        $sql = $this->db->update_string('users', $data, $where);
        $result = $this->db->query($sql);
        //print $sql;
        if ($result) {
            return 1;
        } else {
            return 0;
        }
    }

    public function get_password_byUsername($uname) {
        $sql = $this->db->query("select password from users where username='$uname'");
        if ($sql->num_rows() == 1) {
            foreach ($sql->result_array() as $row) {
                return $row['password'];
            }
        } else {
            return 0;
        }
    }

    public function get_user_namesbyUsername($uname) {
        $sql = $this->db->query("select firstname,lastname from users where username='$uname'");
        if ($sql->num_rows() == 1) {
            foreach ($sql->result_array() as $row) {
                return $row['firstname'] . " " . $row['lastname'];
            }
        } else {
            return 0;
        }
    }

    public function get_users($per_page=0,$offset=0) {
        $sql = "select * from users where 1";
        if ($per_page > 0) {
            $sql .= " limit $per_page";
        }

        if (intval($offset) > 0) {
            $sql .= " OFFSET $offset";
        }
        //echo $sql;exit;
        $res = $this->db->query($sql);
        if ($res->num_rows() > 0) {
            foreach ($res->result_array() as $row) {
                extract($row);
                $roles = $this->get_user_role($roleid);
                $data[$id][$username][$firstname][$roles] = $lastname;
            }
            return $data;
        } else {
            return 0;
        }
    }


    public function get_usernameById($id) {
        $sql = $this->db->query("select * from users where id='$id'");
        if ($sql->num_rows() > 0) {
            foreach ($sql->result_array() as $row) {
                extract($row);
                return $username;
            }
        } else {
            return 0;
        }
    }

    public function get_userDetailsByUsername($uname) {
        $sql = "select * from users where username = '$uname'";
        $result = $this->db->query($sql);
        if($result->num_rows() > 0) {
            foreach ($result->result_array() as $row) {
                return $row;
            }
        }else {
            return array();
        }
    }

    //This function returns all users with roleid 2
    public function get_teachers() {
        $sql = $this->db->query("select * from users where roleid='2'");
        if ($sql->num_rows() > 0) {
            foreach ($sql->result_array() as $row) {
                extract($row);
                $data[$id] = $lastname . " " . $firstname;
            }
            return $data;
        } else {
            return 0;
        }
    }

    //Search for teachers
    function teacherSearch($teacherName) {
        $data = array();
        $counter = 0;
        $sql = $this->db->query("SELECT * FROM users WHERE roleid='2' AND firstname Like '%$teacherName%'")->result();
        if($sql) {
            foreach($sql as $result) {
                $data[$counter]=array(
                        'id'=>$result->id,
                        'name'=> $result->firstname." ".$result->lastname,
                        'username'=> $result->username,

                );
                $counter = $counter+1;
            }
            return $data;
        }else {
            return false;
        }
    }

    function getTeacherID($lName,$fName) {
        $sql = $this->db->query("select * from users where firstname='$fName' AND lastname='$lName'");
        
        if ($sql->num_rows() > 0) {
            foreach ($sql->result_array() as $row) {
                extract($row);
                return $username;
            }
        } else {
            return 0;
        }
    }

    function getName($teacherName){
        $data = array();
        $counter = 0;
        $sql = $this->db->query("SELECT * FROM users WHERE username='$teacherName'")->result();

        foreach($sql as $result){
            $name = $result->firstname." ".$result->lastname;
        }

        return $name;
    }

    function getUser($id){
        $result = $this->db->query("select * from users where roleid='$id' order by lastname asc")->result();

        return $result;
    }

   

}
