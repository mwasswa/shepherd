<?php

##############################                                                                                                                          #
#  The Login Controller
#  Date: 14/March/2015
#  Author: Moses Wasswa                                                                                
#  Email: mwasswa@marble.ug 
##############################
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Login extends CI_Controller {

    public function index() {
        $this->userlogin();
    }

    public function userlogin() {
	$this->load->model('musers');
	$this->load->model('mgeneral');
	
        if ($this->input->post('login_btn')) {
            $username = $this->input->post('lusername');
            $password = $this->input->post('lpassword');

            $this->form_validation->set_rules('lusername', 'Username', 'required');
            $this->form_validation->set_rules('lpassword', 'Password', 'required');

            if ($this->form_validation->run() == TRUE) {
                $userInfo = $this->musers->validate_user($username, $password);
                if (is_array($userInfo) && count($userInfo)) {
                    extract($userInfo);
                    if ($status == 'active') {
                        if ($roleid) {
                            $user_role = $this->musers->get_user_role($roleid);
                            if (is_string($user_role)) {
                                $settings = $this->mgeneral->get_settings();
                                $userdata = array(
                                    'username' => $username,
                                    'namesForUser' => $name,
                                    'urole' => $user_role,
                                    'current_term'=>$settings['current_term'],
                                    'current_year'=>$settings['current_year'],
                                    'teachers' => $this->musers->get_teachers()
                                );
                                if (strlen($class) > 0) {
                                    $userdata['class'] = $class;
                                }
                                
                                $this->session->set_userdata($userdata);
								redirect("welcome/user_login");
                            } else {
                                $msg = "No valid User Role found for your account";
                                $data['error_msg'] = $msg;
                                $this->load->view('vlogin', $data);
                            }
                        } else {
                            $msg = "No user exists with this Username and Password";
                            $data['error_msg'] = $msg;
                            $this->load->view('vlogin', $data);
                        }
                    }else{
                        $msg = "Sorry, Your account is Blocked. Only System Administrator can Unblock it";
                        $data['error_msg'] = $msg;
                        $this->load->view('vlogin', $data);
                    }
                } else {
                    $msg = "No user exists with this Username and Password";
                    $data['error_msg'] = $msg;
                    $this->load->view('vlogin', $data);
                }
            } else {
                $data['error_msg'] = validation_errors();
                $this->load->view('vlogin', $data);
            }
        } else {
            $data['error_msg'] = "";
            $this->load->view('vlogin', $data);
        }
    }

}
