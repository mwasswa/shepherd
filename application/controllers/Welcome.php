<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Welcome extends CI_Controller {

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     * 	- or -
     * 		http://example.com/index.php/welcome/index
     * 	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see http://codeigniter.com/user_guide/general/urls.html
     */
    public function index($data = array()) {

        if ($this->session->userdata('username')) {

            $videos = $this->mvideo->get_videos();
            $data['videos'] = $videos;
            $this->template->load('default', null, $data);
        } else {
            redirect('login/index');
        }
    }
    
    public function get_sidebar_topics(){
        //get all the videos
        $videos=$this->mvideo->get_sidebar_videos();
        //print_r($videos);exit;
        //get all the documents
        
        //get all the quizzes
    }

    public function quiz() {
        if ($this->input->post('answer_quiz')) {
            date_default_timezone_set("Africa/Kampala");
            $now = date("Y-m-d H:i:s");
            $end_date = $this->session->userdata("qend_time");
            $user = $this->session->userdata('username');
            //$userName= $this->musers->get_user_namesbyUsername($user);
            $data['user'] = $user;
            $answers = $this->input->post("option");
            $mark = 0;
            $total = 1;
            //Getting the number of times the quiz has been attempted...
            $quizid = $this->input->post('quizid');
            $attempts = $this->mquiz->getQuizAttempts($quizid,$this->session->userdata('username'));
            
            //echo json_encode($answers);exit;
            if (is_array($answers) && count($answers)) {
                    $total = 0;
                $passed = $failed = array();
                foreach ($answers as $qtn => $ans) {
                    $info = explode("_", $ans[0]);
                    $correct = $info[1];
                    $answer = $info[0];
                    $marks=$info[2];
                    $qtnid = $info[3];
                    if (trim(strtolower($answer)) == trim(strtolower($correct))) {
                        $passed[$qtn] = 1;
                        $mark+=$marks;
                    } else {
                        $failed[$qtn][$answer] = $correct;
                        $mark += 0;
                    }

                    $total +=$marks;
                    //Send the question id,quiz id the answer given and username to the database.. with the time stamp
                     $send = array(
                        'quiz_id'=>$quizid,
                         'qtn_id'=>$qtnid,
                         'participant'=>$user,
                         'answer'=>$answer,
                         'attempt'=>$attempts
                     );
                     //$now = date("Y-m-d H:i:s");
                     $this->mgeneral->add_item('quiz_answers',$send);
                }
            }
            $score = ($mark/$total)*100;
            $data['quiz_id'] = $this->uri->segment(3);
            $data['score'] = $score;
            $data['attempt']= $attempts;
           
            $added = $this->mgeneral->add_item('quiz_scores', $data);
            
            if ($added) {
                $msg = "The quiz has been completed successfully. You scored $score%";
                $msg_type = "success";
                $page = "quiz/vquiz_qtns";
                $fail['quiz_failed'] = $failed;
                $this->set_quiz_default($msg_type, $msg, $page, $fail);
            } else {
                $msg = "Error saving your answers. Please contact system administrator";
                $msg_type = "failure";
                $page = "quiz/vquiz_qtns";
                $this->set_quiz_default($msg_type, $msg, $page);
            }
            //}
        } else {
            $settings = $this->mquiz->get_quiz_titleid($this->uri->segment(3));
            if (is_array($settings) && count($settings)) {
                foreach ($settings as $id => $arr) {
                    extract($arr);
                    $start_date = $date . " " . $start_time . ":00";
                    $status = $status;
                }
                date_default_timezone_set("Africa/Kampala");
                $now = date("Y-m-d H:i:s");
                $end_time = date("d Y m H:i:s", strtotime($start_date) + (intval($duration) * 3600));
                //die($end_time);
                $dataq["qend_time"] = $end_time;
                //echo $end_time;exit;
                $this->session->set_userdata($dataq);
                if ($createdby == $this->session->userdata("username")) {
                    $this->load_quiz_qtns();
                } else {
                    /*if ($status != 'o') {
                        if (strtotime($now) < strtotime($start_date)) {
                            $msg = "Sorry, the set date($date) and time($start_time) for this quiz have not been reached.";
                            $this->attempt_quiz_default("failure", $msg);
                        } elseif (strtotime($now) > strtotime($end_time)) {
                            $msg = "This quiz expired. Please contact your teacher";
                            $this->attempt_quiz_default("failure", $msg);
                        } elseif (($this->session->userdata('urole') == 'student') && (($this->session->userdata("class") == strtolower($class)) || ($class == "all"))) {
                            $this->load_quiz_qtns();
                        } elseif (($this->session->userdata('urole') == 'student') && (($this->session->userdata("class") != strtolower($class)) || ($class != "all"))) {
                            $msg = "This quiz is restricted to a particular class";
                            $this->attempt_quiz_default("failure", $msg);
                        } else {
                            $this->load_quiz_qtns();
                        }
                    } else {
                        $this->load_quiz_qtns();
                    }*/
                    $this->load_quiz_qtns();
                }
            } else {
                $msg = "Sorry, no information could be retrieved about the selected quiz";
                $this->attempt_quiz_default("failure", $msg);
            }
        }
    }

    public function load_quiz_qtns() {
        $titleid = $this->uri->segment(3);
        $data = $this->get_videos();
        $data["q_qtns"] = $this->mquiz->get_questions_byTitleid($titleid);
        $data['qtnCount']=$this->mquiz->getNumberOfQuestions($titleid);
        $data['user'] = $this->session->userdata('username');
        $data['settings'] = $this->mgeneral->get_settings();
        $data["failure"] = "";
        $data["success"] = "";
        $data['quizid'] = $titleid;
        $this->template->load("default", "quiz/vquiz_qtns", $data);
    }

    

    public function settings_default($msg_type = "", $msg = "") {
        $data = $this->get_videos();
        $data['user'] = $this->session->userdata('username');
        $data['settings'] = $this->mgeneral->get_settings();
        if ($msg_type == "success") {
            $data["success"] = $msg;
            $data["failure"] = "";
        } elseif ($msg_type == "failure") {
            $data["failure"] = $msg;
            $data["success"] = "";
        } else {
            $data["failure"] = "";
            $data["success"] = "";
        }
        $this->template->load('default', 'vsettings', $data);
    }

    public function set_quiz_default($msg_type = "", $msg = "", $page = 'quiz/vsetquiz', $failed = array()) {
        $data = $this->get_videos();
        $data['user'] = $this->session->userdata('username');
        $data['settings'] = $this->mgeneral->get_settings();
        $data["q_qtns"] = "";
        $data['qtnCount']= $this->mquiz->getNumberOfQuestions($this->uri->segment(3));
        $data["failed"] = $failed;
        if ($msg_type == "success") {
            $data["success"] = $msg;
            $data["failure"] = "";
        } elseif ($msg_type == "failure") {
            $data["failure"] = $msg;
            $data["success"] = "";
        } else {
            $data["failure"] = "";
            $data["success"] = "";
        }
        $this->template->load('default', $page, $data);
    }

    public function set_quiz() {
        if ($this->input->post('set_quiz_btn')) {
            $this->form_validation->set_rules('title', 'Title', 'required');
            $this->form_validation->set_rules('qlevel', 'Level', 'required');
            $this->form_validation->set_rules('qsubtopic', 'Sub Topic', 'required');
            $this->form_validation->set_rules('qtopic', 'Topic', 'required');
            //$this->form_validation->set_rules('duration', 'Duration', 'required');
            //$this->form_validation->set_rules('start_time', 'Start time', 'required');
            $this->form_validation->set_rules('qweight', 'Marks per Question', 'required');
            $this->form_validation->set_rules('num_of_qtns', 'Number of Questions', 'required');
            //$this->form_validation->set_rules('qyear', 'Year', 'required');
            $this->form_validation->set_rules('qterm', 'Term', 'required');
            $this->form_validation->set_rules('qclass', 'Class', 'required');
            $this->form_validation->set_rules('qsubject', 'Subject', 'required');
            //$this->form_validation->set_rules('qstatus', 'Status', 'required');
            //$this->form_validation->set_rules('qdate', 'Date', 'required');
            if ($this->form_validation->run() == TRUE) {
                $tot_mark = (intval($this->input->post('qweight'))) * (intval($this->input->post('num_of_qtns')));
                $data = array(
                        "title" => $this->input->post('title'),
                        //"duration" => $this->input->post('duration'),
                        //"start_time" => $this->input->post('start_time'),
                        "weight" => $this->input->post('qweight'),
                        "num_of_qtns" => $this->input->post('num_of_qtns'),
                        //"year" => $this->input->post('qyear'),
                        "term" => $this->input->post('qterm'),
                        "subject" => $this->input->post('qsubject'),
                        //"status" => $this->input->post('qstatus'),
                        "createdby" => $this->session->userdata('username'),
                        "tot_mark" => $tot_mark,
                        //"date"=> $this->input->post('qdate'),
                        "class" => $this->input->post('qclass'),
                        "level" => $this->input->post('qlevel'),
                        "subtopic" => $this->input->post('qsubtopic'),
                        "topic" => $this->input->post('qtopic'),
                );
                $upload_path = FCPATH . "uploads/quiz/";
                if (strlen($_FILES['quizfile']['name'])) {
                    $fileName = $_FILES['quizfile']['name'];
                    $tmpName = $_FILES['quizfile']['tmp_name'];
                    $fileType = $_FILES['quizfile']['type'];
                    $filePathid = $upload_path . $fileName;
                    if (preg_match('/\\.(xls|xlsx|csv|txt)$/i', $_FILES['quizfile']['name'])) {
                        $result = move_uploaded_file($tmpName, $filePathid);
                        if ($result) {
                            $gid = $this->mquiz->add_quiz_general($data);
                            if ($gid) {
                                $lines = file($filePathid);
                                $output = "";
                                foreach ($lines as $line) {
                                    $output .= "$gid," . $line . "\n";
                                }
                                $user = $this->session->userdata('username');
                                $dbfilePath = $upload_path . "$user" . "_quizdbfile.txt";
                                file_put_contents($dbfilePath, $output);
                                $added = $this->mquiz->add_quiz($dbfilePath);
                                if ($added) {
                                    $msg = "The quiz has been set successfully";
                                    $this->set_quiz_default("success", $msg);
                                } else {
                                    $msg = "The file has issues";
                                    $this->set_quiz_default("failure", $msg);
                                }
                            } else {
                                $msg = "Could not add the quiz now. Please contact system administrator";
                                $this->set_quiz_default("failure", $msg);
                            }
                        }
                    } else {
                        $msg = "Invalid File Type for the Quiz field";
                        $this->set_quiz_default("failure", $msg);
                    }
                } else {
                    $msg = "No file select. Please choose a file";
                    $this->set_quiz_default("failure", $msg);
                }
            } else {
                $msg = validation_errors();
                $this->set_quiz_default("failure", $msg);
            }
        } else {
            $this->set_quiz_default();
        }
    }

    public function attempt_quiz_default($msg_type = "", $msg = "", $quizzes = array()) {
        $data = $this->get_videos();
        $data['user'] = $this->session->userdata('username');
        $data['settings'] = $this->mgeneral->get_settings();
        $data["quizzes"] = $quizzes;
        if ($msg_type == "success") {
            $data["success"] = $msg;
            $data["failure"] = "";
        } elseif ($msg_type == "failure") {
            $data["failure"] = $msg;
            $data["success"] = "";
        } else {
            $data["failure"] = "";
            $data["success"] = "";
        }
        if (strlen($this->session->userdata("username"))) {
            $this->template->load('default', 'quiz/vquiz', $data);
        } else {
            $this->index($data);
        }
    }

    public function attempt_quiz() {
        $user = $this->session->userdata('username');
        $urole = $this->session->userdata('urole');
        $details = $this->musers->get_userDetailsByUsername($user);
        //print_r($details);exit;
        if (is_array($details) && count($details)) {
            extract($details);
            $quizzes = $this->mquiz->get_quizzes($urole, $class);
            if (is_array($quizzes) && count($quizzes)) {
                $this->attempt_quiz_default("success", "Please select quiz from the list below", $quizzes);
            } else {
                $this->attempt_quiz_default("failure", "No quizzes for you exist yet");
            }
        } else {
            $this->attempt_quiz_default("failure", "This current user doesnot exist");
        }
    }

    public function quiz_results() {
        if ($this->session->userdata("urole") != "student") {
            $qid = $this->uri->segment(3);
            $results = $this->mquiz->get_results($qid);
            if (is_array($results) && count($results)) {
                $data = $this->get_videos();
                $data["results"] = $results;
                $this->template->load("default", "quiz/vquiz_results", $data);
            } else {
                $msg = "No one has attempted this quiz yet";
                $this->attempt_quiz_default("failure", $msg);
            }
        } else {
            $msg = "This action is denied for students";
            $this->attempt_quiz_default("failure", $msg);
        }
    }

    public function settings() {
        if ($this->input->post('settings_btn')) {
            $this->form_validation->set_rules('current_term', 'Current Term', 'required');
            $this->form_validation->set_rules('current_year', 'Current Year', 'required');
            if ($this->form_validation->run() == TRUE) {
                $data = array(
                        'current_year' => $this->input->post('current_year'),
                        'current_term' => $this->input->post('current_term'),
                        'createdby' => $this->session->userdata('username')
                );
                $added = $this->mgeneral->update_settings('settings', $data);
                if ($added) {
                    $msg = "Settings updated successfully";
                    $this->settings_default("success", $msg);
                } else {
                    $msg = "Could not update settings now. Please try again later";
                    $this->settings_default("failure", $msg);
                }
            } else {
                $msg = validation_errors();
                $this->settings_default("failure", $msg);
            }
        } else {
            $this->settings_default();
        }
    }

    public function query_stats_default($stats, $msg_type = "", $msg = "") {
        $data = $this->get_videos();
        $data['user'] = $this->session->userdata('username');
        $data['source'] = $stats;
        if ($msg_type == "success") {
            $data["success"] = $msg;
            $data["failure"] = "";
        } elseif ($msg_type == "failure") {
            $data["failure"] = $msg;
            $data["success"] = "";
        } else {
            $data["failure"] = "";
            $data["success"] = "";
        }
        //$this->session->set_userdata($data);
        $this->template->load('default', 'vqstats', $data);
    }

    public function query_statistics() {
        if ($this->input->post('stat_filter_btn')) {
            $this->form_validation->set_rules('stat_class', "Class", "required");
            if ($this->form_validation->run() == TRUE) {
                $year = $this->input->post('stat_year');
                $term = $this->input->post('stat_term');
                $class = $this->input->post('stat_class');
                if (!strlen($year)) {
                    $year = $this->session->userdata("current_year");
                }

                if (!strlen($term)) {
                    $term = $this->session->userdata("current_term");
                }

                $stats = $this->mqueries->get_querries_count($year, $term, $class);
                if (is_array($stats) && count($stats)) {
                    $msg = "Showing Statistics of: $class in: $year term: $term";
                    $this->query_stats_default($stats, "success", $msg);
                } else {
                    $stats = array();
                    $msg = "No questions of: $class in: $year term: $term found";
                    $this->query_stats_default($stats, "failure", $msg);
                }
            } else {
                $msg = validation_errors();
                $stats = $this->mqueries->get_querries_count($this->session->userdata('current_year'), $this->session->userdata('current_term'));
                $this->query_stats_default($stats, "failure", $msg);
            }
        } else {
            $stats = $this->mqueries->get_querries_count($this->session->userdata('current_year'), $this->session->userdata('current_term'));
            $this->query_stats_default($stats);
        }
    }

    public function edit_user() {
        $userid = $this->uri->segment(3);
        $data = $this->musers->get_user_detailsId($userid);
        $this->session->set_userdata($data);
        $this->users();
    }

    public function edit_theory() {
        $theoryid = $this->uri->segment(3);
        $data = $this->mtheory->get_theory_detailsId($theoryid);
        //$this->session->set_userdata($data);

        echo json_encode($data);
        //echo json_encode($data);
        //exit;
        //$this->theory($data);
    }

    public function edit_video() {
        //echo 'Here';exit;
        $vid = $this->uri->segment(3);
        $data = $this->mvideo->get_video_detailsId($vid);
        //print_r($data);exit;
        //$this->session->set_userdata($data);
        $this->videos($data);
    }

    public function change_password() {
        if ($this->input->post('change_password')) {
            $this->form_validation->set_rules('old_psword', 'Current Password', 'required');
            $this->form_validation->set_rules('new_psword', 'New Password', 'required');
            $this->form_validation->set_rules('cnew_psword', 'Confirm New Password', 'required');

            if ($this->form_validation->run() == TRUE) {
                $old_password = $this->musers->get_password_byUsername($this->session->userdata('username'));
                if (trim($old_password) != trim($this->input->post('old_psword'))) {
                    $msg = "Incorrect Current Password. Password was not changed";
                    $this->change_password_default("failure", $msg);
                } else {
                    if (trim($this->input->post('new_psword')) != trim($this->input->post('cnew_psword'))) {
                        $msg = "The New Passwords Do not Match";
                        $this->change_password_default("failure", $msg);
                    } else {
                        $pswords = array(
                                'password' => $this->input->post('new_psword')
                        );
                        $pchanged = $this->musers->change_password($pswords);
                        if ($pchanged) {
                            $msg = "Your Password was changed Successfully";
                            $this->change_password_default("success", $msg);
                        } else {
                            $msg = "Error Changing your Password. Contact System Administrator";
                            $this->change_password_default("failure", $msg);
                        }
                    }
                }
            } else {
                $msg = validation_errors();
                $this->change_password_default("failure", $msg);
            }
        } else {
            $this->change_password_default();
        }
    }

    public function change_password_default($msg_type = "", $msg = "") {
        $data = $this->get_videos();
        $data['user'] = $this->session->userdata('username');
        if ($msg_type == "success") {
            $data["success"] = $msg;
            $data["failure"] = "";
        } elseif ($msg_type == "failure") {
            $data["failure"] = $msg;
            $data["success"] = "";
        } else {
            $data["failure"] = "";
            $data["success"] = "";
        }
        //$this->session->set_userdata($data);
        $this->template->load('default', 'change_password', $data);
    }

    public function delete_theory() {
        if (trim($this->session->userdata('urole')) != 'student') {
            $id = $this->uri->segment(3);
            $deleted = $this->mgeneral->delete_record("theory", $id);
            if ($deleted) {
                $msg = "The record has been deleted successfully";
                $this->theory_default("success", $msg);
            } else {
                $msg = "Could not delete the record at this time. Please try again later";
                $this->theory_default("failure", $msg);
            }
        } else {
            $msg = "Sorry, your role denies you this action";
            $this->theory_default("failure", $msg);
        }
    }

    public function delete_user() {
        if (trim($this->session->userdata('urole')) != 'student') {
            $id = $this->uri->segment(3);
            $deleted = $this->mgeneral->delete_record("users", $id);
            if ($deleted) {
                $msg = "The record has been deleted successfully";
                $this->users_default("success", $msg);
            } else {
                $msg = "Could not delete the record at this time. Please try again later";
                $this->users_default("failure", $msg);
            }
        } else {
            $msg = "Sorry, your role denies you this action";
            $this->users_default("failure", $msg);
        }
    }

    public function delete_video() {
        if (trim($this->session->userdata('urole')) != 'student') {
            $id = $this->uri->segment(3);
            $deleted = $this->mgeneral->delete_record("videos", $id);
            if ($deleted) {
                $msg = "The record has been deleted successfully";
                $this->video_default("success", $msg);
            } else {
                $msg = "Could not delete the record at this time. Please try again later";
                $this->video_default("failure", $msg);
            }
        } else {
            $msg = "Sorry, your role denies you this action";
            $this->video_default("failure", $msg);
        }
    }

    public function theory_default($msg_type = "", $msg = "", $data_other = array()) {
        if ($this->uri->segment(2) == 'edit_theory') {
            $url = base_url() . "index.php/welcome/edit_theory";
        } else {
            $url = base_url() . "index.php/welcome/theory";
        }
        $total_records = count($this->mtheory->get_theory());
        $config = $this->paginate($url, $total_records);
        $this->pagination->initialize($config);
        $data = $this->get_videos();
        $data["content"] = $data_other;
        $data['theory'] = $this->mtheory->get_theory($config['per_page'], $this->uri->segment(3));
        $data['user'] = $this->session->userdata('username');
        if ($msg_type == "success") {
            $data["success"] = $msg;
            $data["failure"] = "";
        } elseif ($msg_type == "failure") {
            $data["failure"] = $msg;
            $data["success"] = "";
        } else {
            $data["failure"] = "";
            $data["success"] = "";
        }
        //$this->session->set_userdata($data);
        $this->template->load('default', 'vtheory', $data);
    }

    public function theory($data = array()) {
        //print_r($data);exit;
        if ($this->input->post('add_content') || $this->input->post('edit_content')) {
            if ($this->session->userdata('urole') != 'student') {
                $th_subject = $this->input->post('th_subject');
                $th_topic = $this->input->post('th_topic');
                $th_overview = $this->input->post('th_overview');
                $th_userfile = $this->input->post('userfile');
                $th_type = $this->input->post('th_type');
                $th_subtopic = $this->input->post('th_subtopic');
                $th_term = $this->input->post('th_term');
                $th_class = $this->input->post('th_class');
                $th_level = $this->input->post('th_level');

                $this->form_validation->set_rules("th_subject", "Subject", "required");
                $this->form_validation->set_rules("th_topic", "Topic", "required");
                $this->form_validation->set_rules("th_overview", "Overview", "required");
                $this->form_validation->set_rules("th_type", "Category", "required");

                if ($this->form_validation->run() == TRUE) {
                    $subject = $this->msubject->get_subject_byId($th_subject);
                    $upload_path = FCPATH . "uploads/" . strtolower($subject) . "/";
                    //print_r($_FILES['theoryfile']);exit;
                    if (strlen($_FILES['theoryfile']['name'])) {
                        $fileName = $_FILES['theoryfile']['name'];
                        $tmpName = $_FILES['theoryfile']['tmp_name'];
                        $fileType = $_FILES['theoryfile']['type'];
                        $filePath = $upload_path . $fileName;
                        if (preg_match('/\\.(doc|docx|xls|pdf|csv|txt)$/i', $_FILES['theoryfile']['name'])) {
                            //die($file);
                            $result = move_uploaded_file($tmpName, $filePath);
                            
                            $data = array(
                                    "subjectid" => $th_subject,
                                    "topic" => $th_topic,
                                    "content" => $th_overview,
                                    "upload" => $fileName,
                                    "category" => $th_type,
                                    "subtopic" => $th_subtopic,
                                    "term" => $th_term,
                                    "class" => $th_class,
                                    "level" => $th_level
                            );
                            if ($this->uri->segment(2) == 'edit_theory') {
                                $action = "Edited";
                                $data['id'] = $this->session->userdata('et_id');
                                $theoryAdded = $this->mtheory->edit_theory($data);
                            } else {
                                $theoryAdded = $this->mtheory->add_theory($data);
                                $action = "Uploaded";
                            }
                            if ($theoryAdded) {
                                $msg = "The theory content has been $action successfully";
                                $this->theory_default("success", $msg);
                            } else {
                                $msg = "There was an error adding this content. Please try again later";
                                $this->theory_default("failure", $msg);
                            }
                        } else {
                            $msg = "Invalid File Type";
                            $this->theory_default("failure", $msg);
                        }
                    } else {
                        if ($this->uri->segment(2) == 'edit_theory') {
                            $info = array(
                                    "subjectid" => $this->input->post("th_subject"),
                                    "topic" => $this->input->post("th_topic"),
                                    "content" => $this->input->post("th_overview"),
                                    "category" => $this->input->post("th_type")
                            );
                            $info['id'] = $this->uri->segment(3);
                            $updated = $this->mtheory->edit_theory($info);
                            if ($updated) {
                                $this->theory_default("success", "Theory Updated Successfully", $data);
                            } else {
                                $this->theory_default("failure", "Cannot Update Theory Info now. Please try again Later", $data);
                            }
                        } else {
                            $this->theory_default("failure", "No Document has been selected", $data);
                        }
                    }
                } else {
                    $msg = validation_errors();
                    $this->theory_default("failure", $msg);
                }
            } else {
                $msg = "Sorry, you are not authorised to add content. Contact the system administrator";
                $this->theory_default("failure", $msg);
            }
        } else {
            $this->theory_default("", "", $data);
        }
    }

    public function get_videos() {
        $videos = $this->mvideo->get_videos();
        $data['videos'] = $videos;
        return $data;
    }

    public function get_videos_table($limit, $offset) {
        $videos = $this->mvideo->get_videos_table($limit, $offset);
        return $videos;
    }

    public function user_login() {


        $vid = $this->uri->segment(3);
        $data = $this->mvideo->get_video_detailsId($vid);
        if (is_array($data) && count($data)) {
            extract($data);
            $data1 = array(
                    "video_path" => $e_vpath,
                    "video_text" => $e_vdesc,
                    "user" => $this->session->userdata('username'),
                    "vsubject" => $e_vsubject
            );
            $this->index($data1);
        } else {
            $data1 = array("video_path" => "", "subject" => "", "video_text" => "");
            $data1['user'] = $this->session->userdata('username');
            $this->index($data1);
        }
    }

    public function paginate($url, $total_records) {
        $config['base_url'] = $url;
        $config['total_rows'] = $total_records;
        $config['per_page'] = 15;
        $config['num_links'] = ceil($config['total_rows'] / $config['per_page']);

        $config['full_tag_open'] = "<ul class='pagination'>";
        $config['full_tag_close'] = "</ul>";
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
        $config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";


        $config['next_tag_open'] = "<li>";
        $config['next_tagl_close'] = "</li>";
        $config['prev_tag_open'] = "<li>";
        $config['prev_tagl_close'] = "</li>";
        $config['first_tag_open'] = "<li>";
        $config['first_tagl_close'] = "</li>";
        $config['last_tag_open'] = "<li>";
        $config['last_tagl_close'] = "</li>";
        return $config;
    }

    public function users_default($msg_type = "", $msg = "") {

        $data = $this->get_videos();
        //$data['sys_users'] = $this->musers->get_users($config['per_page'], $this->uri->segment(3));
        $data['user'] = $this->session->userdata('username');

        if ($msg_type == "success") {
            $data["success"] = $msg;
            $data["failure"] = "";
        } elseif ($msg_type == "failure") {
            $data["failure"] = $msg;
            $data["success"] = "";
        } else {
            $data["failure"] = "";
            $data["success"] = "";
        }
        //$this->session->set_userdata($data);
        $this->template->load('default', 'users', $data);
    }

    public function users() {
        if ($this->input->post('add_user') || $this->input->post('edit_user')) {
            $status = $this->input->post('status');
            $fname = $this->input->post('fname');
            $lname = $this->input->post('lname');
            $uname = $this->input->post('uname');
            $user_role = $this->input->post('user_role');
            $class = $this->input->post('class');
            $psword = $this->input->post('psword');
            $cpsword = $this->input->post('cpsword');

//Set Validation rules
            $this->form_validation->set_rules('fname', 'First Name', 'required');
            $this->form_validation->set_rules('lname', 'Last Name', 'required');
            $this->form_validation->set_rules('uname', 'Username', 'required');
            $this->form_validation->set_rules('user_role', 'User Role', 'required');
            $this->form_validation->set_rules('status', 'Account Status', 'required');
            if (intval($user_role) == 1) {
                $this->form_validation->set_rules('class', 'Student Class', 'required');
            }
            $this->form_validation->set_rules('psword', 'Password', 'required');
            $this->form_validation->set_rules('cpsword', 'Confirm Password', 'required');

//execute the add user process
            if ($this->form_validation->run() == TRUE) {
                if ($cpsword != $psword) {
                    $msg = "Passwords donot match";
                    $this->users_default("failure", $msg);
                } else {
                    $psword = do_hash($psword);
                    $user = array(
                            "firstname" => $fname,
                            "lastname" => $lname,
                            "username" => $uname,
                            "password" => $psword,
                            "roleid" => $user_role,
                            "status" => $status,
                            "class" => $class
                    );

                    if ($this->uri->segment(2) == 'edit_user') {
                        $user['id'] = $this->uri->segment(3);
                        $userAdded = $this->musers->edit_user($user);
                        $action = "edited";
                    } else {
                        if ($this->musers->validate_username($uname)) {
                            $msg = "A user with this Username already exists. Choose a different Username";
                            $this->users_default('failure', $msg);
                        } else {
                            $userAdded = $this->musers->add_user($user);
                            $action = "added";
                        }
                    }
                    if ($userAdded) {
                        $msg = "$fname $lname has been $action successfully";
                        $this->users_default("success", $msg);
                    } else {
                        $msg = "Sorry! $fname $lname cannot be $action now. Try again Leter";
                        $this->users_default("failure", $msg);
                    }
                }
            } else {
                $msg = validation_errors();
                $this->users_default("failure", $msg);
            }
        } else {
            $this->users_default();
        }
    }

    public function getTeacherQuerries() {

        //$this->session->set_userdata($responses);
        $data = $this->get_videos();
        $teacher = $this->session->userdata('username');
        $data['teacher_qtns'] = $this->mqueries->get_queries_teacher($teacher);

        //$this->session->set_userdata($data);
        $this->template->load('default', 'get_teacher_querries', $data);
    }

    public function askTeacherDefault($msg_type = "", $msg = "") {
        $data = $this->get_videos();
        //$data['teacherNames'] = $this->uri->segment(3);
        $data['user'] = $this->session->userdata('username');
        //$data['student_qtns'] = $this->mqueries->get_queries_author($data['user']);
        if ($msg_type == "success") {
            $data["success"] = $msg;
            $data["failure"] = "";
        } elseif ($msg_type == "failure") {
            $data["failure"] = $msg;
            $data["success"] = "";
        } else {
            $data["failure"] = "";
            $data["success"] = "";
        }
        //$this->session->set_userdata($data);
        $this->template->load('default', 'ask_teacher', $data);
    }

    public function askTeacher() {
        if ($this->input->post('submit_query')) {
            $this->form_validation->set_rules('question', 'Question', 'required');
            $this->form_validation->set_rules('qsubject', 'Subject', 'required');
            $this->form_validation->set_rules('qtopic', 'Topic', 'required');
            if ($this->form_validation->run() == TRUE) {
                $lName = $this->input->post('t_lname');
                $fName = $this->input->post('t_fname');


                $rec_uname = $this->musers->getTeacherID($lName,$fName);
                if (is_string($rec_uname)) {
                    $teacher_uname = $rec_uname;
                } else {
                    $teacher_uname = '';
                }


                $arr = array(
                        "author_class" => $this->input->post('s_class'),
                        "author" => $this->input->post('s_name'),
                        "receipient" => $teacher_uname,
                        "question" => $this->input->post('question'),
                        "subject" => $this->input->post('qsubject'),
                        "term" => $this->session->userdata('current_term'),
                        "year" => $this->session->userdata('current_year'),
                        "topic" => $this->input->post('qtopic')
                );
                $qAdded = $this->mqueries->add_query($arr);
                if ($qAdded) {
                    $msg = "Your Question has been successfully posted.";
                    $this->askTeacherDefault("success", $msg);
                } else {
                    $msg = "Your question could not be posted at this time. Try again Later";
                    $this->askTeacherDefault("failure", $msg);
                }
            } else {
                $msg = validation_errors();
                $this->askTeacherDefault("failure", $msg);
            }
        } else {
            $this->askTeacherDefault();
        }
    }

    public function student_query_replies() {

        //Return a Json array including the Question asked, the replies and the date when the replies were sent form the teacher
        //The student replies if any
        $qtnid = $_GET['query'];

        $query = $this->mqueries->getQuestionInfo($qtnid);

        foreach($query as $teacherName) {
            $teacherName->receipient = $this->musers->getName($teacherName->receipient);
        }

        $data['qInfo'] = $query;
        $data['user'] = $this->session->userdata('username');
        $data['qReplies'] = $this->mqueries->get_query_replies($qtnid);


        echo json_encode($data);





        //$this->session->set_userdata($data);
        //$this->template->load("default", "student_query_replies", $data);
    }

    public function logout() {
        $this->session->sess_destroy();
        redirect('login');
    }

    public function video_default($err_type = "", $msg = "", $data_other = array()) {
        $url = base_url() . "index.php/welcome/videos";
        $total_records = $this->mvideo->get_video_rows();
        $config = $this->paginate($url, $total_records);
        $this->pagination->initialize($config);

        $data = $this->get_videos();
        $data["evideos"] = $data_other;
        $data['videos_table'] = $this->get_videos_table($config['per_page'], $this->uri->segment(3));

        $data['user'] = $this->session->userdata('username');
        if ($err_type == "success") {
            $data["success"] = $msg;
            $data["failure"] = "";
        } elseif ($err_type == "failure") {
            $data["failure"] = $msg;
            $data["success"] = "";
        } else {
            $data["failure"] = "";
            $data["success"] = "";
        }
        $this->template->load('default', 'manage_videos', $data);
    }

    public function videos($data = array()) {
         //die("Here 2");
        if ($this->input->post('submit_video') || $this->input->post('edit_video')) {
            $subject = $this->msubject->get_subject_byId($this->input->post("v_subject"));
            $upload_path = FCPATH . "videos/" . strtolower($subject) . "/";
            if (strlen($_FILES['userfile']['name'])) {
                //die("Here 1");
                $fileName = $_FILES['userfile']['name'];
                $tmpName = $_FILES['userfile']['tmp_name'];
                $fileType = $_FILES['userfile']['type'];
                $filePath = $upload_path . $fileName;
                if (strtolower($fileType) == "video/mp4") {
                    $result = move_uploaded_file($tmpName, $filePath);
                    if ($result) {
                        $info = array(
                                "path" => $fileName,
                                "subjectid" => $this->input->post("v_subject"),
                                "topic" => $this->input->post("v_topic"),
                                "description" => $this->input->post("v_desc"),
                                "subtopic" => $this->input->post("v_subtopic"),
                                "term" =>$this->input->post("v_term"),
                                "level" => $this->input->post("v_level"),
                                "class" => $this->input->post("v_class")
                        );
                        if ($this->uri->segment(2) == 'edit_video') {
                            $info['id'] = $this->uri->segment(3);
                            $insert = $this->mvideo->edit_video($info);
                            $action = "Updated";
                        } else {
                            $info['createdby'] = $this->musers->get_user_namesbyUsername($this->session->userdata('username'));
                            $insert = $this->mvideo->add_video($info);
                            $action = "Added";
                        }
                        if ($insert) {
                            $this->video_default("success", "Video $action Successfully");
                        } else {
                            $this->video_default("failure", "Video cannot be $action Now. Please try again later");
                        }
                    } else {
                        $this->video_default("failure", "Error Uploading video. Contact the system administrator");
                    }
                } else {
                    $this->video_default("failure", "Video Format not supported. Please use .mp4 files");
                }
            } else {
                if ($this->uri->segment(2) == 'edit_video') {
                    //die("Here");
                    $info = array(
                            "subjectid" => $this->input->post("v_subject"),
                            "topic" => $this->input->post("v_topic"),
                            "description" => $this->input->post("v_desc")
                    );
                    $info['id'] = $this->uri->segment(3);
                    $updated = $this->mvideo->edit_video($info);
                    if ($updated) {
                        $this->video_default("success", "Video Updated Successfully", $data);
                    } else {
                        $this->video_default("failure", "Cannot Update Video Info now. Please try again Later", $data);
                    }
                } else {
                    $this->video_default("failure", "No Video has been selected", $data);
                }
            }
        } else {
            //die("Here 3");
            $this->video_default("", "", $data);
        }
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */