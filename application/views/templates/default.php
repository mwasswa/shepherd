<!DOCTYPE html>
<?php
//include FCPATH."PHPExcel/Classes/PHPExcel.php";
//include FCPATH."PHPExcel/Classes/PHPExcel/IOFactory.php";
?>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Shepherd</title>
        <script type="text/javascript" src="<?php echo base_url('assets/js/date.js'); ?>"></script>
        <link href="<?php echo base_url('assets/jquery-ui/jquery-ui.min.css'); ?>" type="text/css" rel="stylesheet" />
        <link href="<?php echo base_url('assets/styles/bootstrap.min.css'); ?>" type="text/css" rel="stylesheet" />
        <link href="<?php echo base_url('assets/styles/lightness_jquery-ui.css'); ?>" type="text/css" rel="stylesheet" />
        <link href="<?php echo base_url('assets/styles/style.css'); ?>" type="text/css" rel="stylesheet" />
        <link href="<?php echo base_url('assets/fa/css/font-awesome.min.css'); ?>" type="text/css" rel="stylesheet" />


        <script type="text/javascript" src="<?php echo base_url('assets/js/CollapsibleLists.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url('assets/js/jquery.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>

        <script type="text/javascript" src="<?php echo base_url('assets/js/jquery-ui.js'); ?>"></script>

        <!--For the notificaitons bubble-->
        <script type="text/javascript" src="<?php echo base_url('assets/js/notifications.js'); ?>"></script>
        <!--End notifications bubble script-->
        <script type="text/javascript" src="<?php echo base_url('assets/js/custom.js'); ?>"></script>
        <!-- For the carts display -->
        <script type="text/javascript" src="<?php echo base_url('assets/js/js/highcharts.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url('assets/js/js/modules/data.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url('assets/js/js/modules/exporting.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url('assets/js/charts.js'); ?>"></script>


        <!-- end carts display -->

        <script>
            $(function () {
                $("#accordion-2").accordion({
                    collapsible: true
                });
            });
        </script>
        <style type="text/css">
            body{
                margin: 0px;
            }
            b{
                font-size: 20px;
            }
        </style>


    </head>
    <body>
        <header class="col-xs-12 navbar-header navbar-fixed-top navbar-inverse">
            <div class="row">
                <div class="col-xs-12 col-sm-3">
                    <button id="left-menu" style="margin-top: 7px;" class="hidden-lg hidden-md hidden-sm btn btn-primary pull-left">
                        <i class="fa fa-th-list"></i>
                    </button>
                    <button type="button" class="navbar-toggle collapsed pull-right" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <div class="navbar-brand">
                        <i class="fa fa-graduation-cap hidden-xs"></i> <b>SHEPHERD</b>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-9">
                    <div class="navbar-header">

                    </div>
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav navbar-right">
                            <li class="active">
                                <a href="<?php echo base_url() ?>index.php/dash/dashBoard">Statistics<span class="sr-only">(current)</span></a>
                            </li>
                            <?php
                            if ($this->session->userdata('urole') != "student") {
                                $mvideo = '<li><a href="' . base_url() . 'index.php/welcome/videos">Videos</a></li>';
                            } else {
                                $mvideo = "";
                            }
                            echo $mvideo;

                            if ($this->session->userdata('urole') != "student") {
                                $sub = '<li><a href="' . base_url() . 'index.php/welcome/subjects">Subjects</a></li>';
                            } else {
                                $sub = "";
                            }
                            echo $sub;
                            
                            
                            echo $theory = '<li><a href="' . base_url() . 'index.php/welcome/theory">Documents</a></li>';
                            
                            ?>
                            <!--Id having the notifications
                            <li  id="notification_li">
                                <span id="notification_count"></span>
                                <a href="<?php //echo base_url(); ?>index.php/welcome/theory" id="notificationLink">Theory</a>
                                <!--<div id="notificationContainer">
                                    <div id="notificationTitle">Theory</div>                                
                                    <div id="notificationsBody" class="notifications">

                                    </div>
                                    <div id="notificationFooter"><a href="<?php echo base_url(); ?>index.php/welcome/theory">View all</a></div>
                                </div>-->


                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Quiz <span class="caret"></span></a>
                                <ul class="dropdown-menu" role="menu">
                                    <?php
                                    if (($this->session->userdata('urole') == 'teacher') || ($this->session->userdata('urole') == 'admin')) {
                                        $quiz = "<li><a href='" . base_url() . "index.php/welcome/set_quiz'>Set Quiz</a></li>";
                                        $quiz .= "<li><a href='" . base_url() . "index.php/quiz/editQuiz'>Edit Quiz</a></li>";
                                        $quiz .= "<li><a href='" . base_url() . "index.php/welcome/attempt_quiz'>Attempt Quiz</a></li>";
                                    } else {
                                        $quiz = "<li><a href='" . base_url() . "index.php/welcome/attempt_quiz'>Attempt Quiz</a></li>";
                                    }
                                    echo $quiz;
                                    ?>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <?php
                                if ($this->session->userdata('urole') == 'student') {
                                    $askteacher = "Questions";
                                } else {
                                    $askteacher = "Questions";
                                }
                                ?>
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><?php echo $askteacher; ?><span class="caret"></span></a>
                                <ul class="dropdown-menu" role="menu">
                                    <?php
                                    if ($this->session->userdata('urole') == 'student') {
                                        $teacher = '<li><a href="' . base_url() . 'index.php/welcome/askTeacher/">Ask Question</a></li><li><a href="' . base_url() . 'index.php/questions/myQuestions/">My Questions</a></li>';
                                    } elseif ($this->session->userdata('urole') == 'teacher' || $this->session->userdata('urole') == 'admin') {
                                        $teacher = '<li><a href="' . base_url() . 'index.php/welcome/getTeacherQuerries">Questions - ' . ucfirst($this->session->userdata('username')) . '</a></li>'
                                        ; //access allowed only to the teacher subjects
                                    } else {
                                        $teacher = "";
                                    }
                                    echo $teacher;
                                    ?>
                                </ul>
                            </li>


                            <?php
                            if ($this->session->userdata('urole') == 'teacher') {
                                $menu_plus = '';
                            } elseif ($this->session->userdata('urole') == 'admin') {
                                $menu_plus = '<li class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Users<span class="caret"></span></a>
                                                 <ul class="dropdown-menu" role="menu">
                                                     <li><a href="' . base_url("index.php/welcome/users") . '">Add user</a></li>
                                                     <li><a href="' . base_url("index.php/users") . '">Edit users</a></li>
                                                  </ul>
                                               </li>';
                            } else {
                                $menu_plus = "";
                            }
                            echo $menu_plus;
                            ?>
                            <?php
                            if ($this->session->userdata('urole') == 'admin') {
                                $settings = '<li><a href="' . base_url("index.php/welcome/settings") . '">Settings</a></li>';
                            } else {
                                $settings = "";
                            }
                            echo $settings;
                            ?>
                            <li>
                                <button class="btn btn-primary btn-xs dropdown-toggle" type="button" id="dropdownMenu1"
                                        data-toggle="dropdown" aria-expanded="true">
                                    <span><?php echo $this->session->userdata('username'); ?></span>
                                    <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
                                    <li role="presentation"><i class="fa fa-user"></i><span><a role="menuitem" tabindex="-1" href='<?php echo base_url() . "index.php/welcome/change_password" ?>'> My Profile</a></span></li>
                                    <li role="presentation"><i class="fa fa-power-off"></i><span><a role="menuitem" tabindex="-1" href='<?php echo base_url() . "index.php/welcome/logout" ?>'> Logout</a></span></li>
                                </ul>
                            </li>

                        </ul>
                    </div>
                </div>
            </div>
        </header>

        <div class="col-xs-12">
            <div class="row">

                <div class="col-xs-12 col-sm-4 col-md-3" id="sidebar">
                    <div class="content-wrapper" id="">
                        <?php
                        $videos = $this->mvideo->get_sidebar_videos();
                        //print_r($videos);exit;
                        if (is_array($videos) && count($videos)) {
                            foreach ($videos as $level => $info) {
                                foreach ($info as $class => $info1) {
                                    foreach ($info1 as $subj => $info2) {
                                        foreach ($info2 as $term => $info3) {
                                            foreach ($info3 as $topic => $info4) {
                                                foreach ($info4 as $subtopic => $clips) {
                                                    $level = strtolower($level);
                                                    $class = strtolower($class);
                                                    $subj = strtolower($subj);
                                                    $term = strtolower($term);
                                                    $topic = strtolower($topic);
                                                    $subtopic = strtolower($subtopic);
                                                    $topics[$level][$class][$subj][$term][$topic][$subtopic]['clip'] = $clips['clip'];
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                        }
                        $theory = $this->mtheory->get_sidebar_theory();
                        //print_r($theory);exit;
                        if (is_array($theory) && count($theory)) {
                            foreach ($theory as $level => $info) {
                                foreach ($info as $class => $info1) {
                                    foreach ($info1 as $subj => $info2) {
                                        foreach ($info2 as $term => $info3) {
                                            foreach ($info3 as $topic => $info4) {
                                                foreach ($info4 as $subtopic => $clips) {
                                                    if (array_key_exists('documents', $clips)) {
                                                        if (array_key_exists('notes', $clips['documents'])) {
                                                            $level = strtolower($level);
                                                            $class = strtolower($class);
                                                            $subj = strtolower($subj);
                                                            $term = strtolower($term);
                                                            $topic = strtolower($topic);
                                                            $subtopic = strtolower($subtopic);
                                                            $topics[$level][$class][$subj][$term][$topic][$subtopic]['documents']['notes'] = $clips['documents']['notes'];
                                                        }
                                                    }

                                                    if (array_key_exists('documents', $clips)) {
                                                        if (array_key_exists('texts', $clips['documents'])) {
                                                            $level = strtolower($level);
                                                            $class = strtolower($class);
                                                            $subj = strtolower($subj);
                                                            $term = strtolower($term);
                                                            $topic = strtolower($topic);
                                                            $subtopic = strtolower($subtopic);
                                                            $topics[$level][$class][$subj][$term][$topic][$subtopic]['documents']['texts'] = $clips['documents']['texts'];
                                                        }
                                                    }

                                                    if (array_key_exists('documents', $clips)) {
                                                        if (array_key_exists('pastpapers', $clips['documents'])) {
                                                            $level = strtolower($level);
                                                            $class = strtolower($class);
                                                            $subj = strtolower($subj);
                                                            $term = strtolower($term);
                                                            $topic = strtolower($topic);
                                                            $subtopic = strtolower($subtopic);
                                                            $topics[$level][$class][$subj][$term][$topic][$subtopic]['documents']['pastpapers'] = $clips['documents']['pastpapers'];
                                                        }
                                                    }

                                                    //$topics[$level][$class][$subj][$term][$topic][$subtopic]['documents']['pastpapers'] = $clips['documents']['pastpapers'];
                                                    //$topics[$level][$class][$subj][$term][$topic][$subtopic]['documents']['texts'] = $clips['documents']['texts'];
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                        }
                        $quizzes = $this->mquiz->get_sidebar_quizzes();
                        //print_r($quizzes);exit;
                        if (is_array($quizzes) && count($quizzes)) {
                            foreach ($quizzes as $level => $info) {
                                foreach ($info as $class => $info1) {
                                    foreach ($info1 as $subj => $info2) {
                                        foreach ($info2 as $term => $info3) {
                                            foreach ($info3 as $topic => $info4) {
                                                foreach ($info4 as $subtopic => $quiz) {
                                                    //print_r($quiz);exit;
                                                    $level =  strtolower($level);
                                                    $class =  strtolower($class);
                                                    $subj =  strtolower($subj);
                                                    $term =  strtolower($term);
                                                    $topic =  strtolower($topic);
                                                    $subtopic =  strtolower($subtopic);
                                                    $topics[$level][$class][$subj][$term][$topic][$subtopic]['quiz'] = $quiz['quiz'];
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                        }
                        //$topics = array_merge_recursive($videos, $theory, $quizzes);
                        //print_r($topics);exit;


                        /* $topics = array(
                          '0-level' => array(
                          'senior one' => array(
                          'physics' => array(
                          'termI' => array(
                          'heat' => array(
                          'thermometry' => array(
                          'clip' => array('path1', 'path2'),
                          'documents' => array(
                          'notes' => array(
                          'notespath1', 'notespath2', 'notespath3'
                          ),
                          'pastpapers' => array(
                          'paperspath1', 'paperspath2', 'paperspath3'
                          ),
                          'texts' => array(
                          'textpath1', 'textpath2', 'textpath3'
                          ),
                          ),
                          'quiz' => array('quiz1', 'quiz2')
                          ),
                          'heat transfer' => array(
                          'clip' => array('path1', 'path2'),
                          'documents' => array(
                          'notes' => array(
                          'notespath1', 'notespath2', 'notespath3'
                          ),
                          'pastpapers' => array(
                          'paperspath1', 'paperspath2', 'paperspath3'
                          ),
                          'texts' => array(
                          'textpath1', 'textpath2', 'textpath3'
                          ),
                          ),
                          'quiz' => array('quiz1', 'quiz2')
                          )
                          )
                          )
                          ),
                          'chemistry' => array(
                          'termI' => array(
                          'introduction' => array(
                          'definition' => array(
                          'clip' => array('path1', 'path2'),
                          'documents' => array(
                          'notes' => array(
                          'notespath1', 'notespath2', 'notespath3'
                          ),
                          'pastpapers' => array(
                          'paperspath1', 'paperspath2', 'paperspath3'
                          ),
                          'texts' => array(
                          'textpath1', 'textpath2', 'textpath3'
                          ),
                          ),
                          'quiz' => array('quiz1', 'quiz2')
                          ),
                          'apparatus' => array(
                          'clip' => array('path1', 'path2'),
                          'documents' => array(
                          'notes' => array(
                          'notespath1', 'notespath2', 'notespath3'
                          ),
                          'pastpapers' => array(
                          'paperspath1', 'paperspath2', 'paperspath3'
                          ),
                          'texts' => array(
                          'textpath1', 'textpath2', 'textpath3'
                          ),
                          ),
                          'quiz' => array('quiz1', 'quiz2')
                          )
                          )
                          )
                          ),
                          'biology' => array(
                          'termI' => array(
                          'diversity' => array(
                          'classification' => array(
                          'clip' => array('path1', 'path2'),
                          'documents' => array(
                          'notes' => array(
                          'notespath1', 'notespath2', 'notespath3'
                          ),
                          'pastpapers' => array(
                          'paperspath1', 'paperspath2', 'paperspath3'
                          ),
                          'texts' => array(
                          'textpath1', 'textpath2', 'textpath3'
                          ),
                          ),
                          'quiz' => array('quiz1', 'quiz2')
                          ),
                          'features of plants' => array(
                          'clip' => array('path1', 'path2'),
                          'documents' => array(
                          'notes' => array(
                          'notespath1', 'notespath2', 'notespath3'
                          ),
                          'pastpapers' => array(
                          'paperspath1', 'paperspath2', 'paperspath3'
                          ),
                          'texts' => array(
                          'textpath1', 'textpath2', 'textpath3'
                          ),
                          ),
                          'quiz' => array('quiz1', 'quiz2')
                          )
                          )
                          )
                          ),
                          'mathematics' => array(
                          'termI' => array(
                          'algebra' => array(
                          'number lines' => array(
                          'clip' => array('path1', 'path2'),
                          'documents' => array(
                          'notes' => array(
                          'notespath1', 'notespath2', 'notespath3'
                          ),
                          'pastpapers' => array(
                          'paperspath1', 'paperspath2', 'paperspath3'
                          ),
                          'texts' => array(
                          'textpath1', 'textpath2', 'textpath3'
                          ),
                          ),
                          'quiz' => array('quiz1', 'quiz2')
                          ),
                          'bearings' => array(
                          'clip' => array('path1', 'path2'),
                          'documents' => array(
                          'notes' => array(
                          'notespath1', 'notespath2', 'notespath3'
                          ),
                          'pastpapers' => array(
                          'paperspath1', 'paperspath2', 'paperspath3'
                          ),
                          'texts' => array(
                          'textpath1', 'textpath2', 'textpath3'
                          ),
                          ),
                          'quiz' => array('quiz1', 'quiz2')
                          )
                          )
                          )
                          ),
                          'computers' => array(
                          'termI' => array(
                          'introduction' => array(
                          'definition and types' => array(
                          'clip' => array('path1', 'path2'),
                          'documents' => array(
                          'notes' => array(
                          'notespath1', 'notespath2', 'notespath3'
                          ),
                          'pastpapers' => array(
                          'paperspath1', 'paperspath2', 'paperspath3'
                          ),
                          'texts' => array(
                          'textpath1', 'textpath2', 'textpath3'
                          ),
                          ),
                          'quiz' => array('quiz1', 'quiz2')
                          ),
                          'history' => array(
                          'clip' => array('path1', 'path2'),
                          'documents' => array(
                          'notes' => array(
                          'notespath1', 'notespath2', 'notespath3'
                          ),
                          'pastpapers' => array(
                          'paperspath1', 'paperspath2', 'paperspath3'
                          ),
                          'texts' => array(
                          'textpath1', 'textpath2', 'textpath3'
                          ),
                          ),
                          'quiz' => array('quiz1', 'quiz2')
                          )
                          )
                          )
                          )
                          )
                          ),
                          'a-level' => array(
                          )
                          );
                         */
                        //print_r($topics);exit;
                        if (is_array($topics) && count($topics)) {
                            foreach ($topics as $level => $info) {
                                $menu = '<h3>' . strtoupper($level) . '</h3><div>';
                                foreach ($info as $class => $info2) {
                                    $menu .= '<ul class="collapsibleList"><li>' . strtoupper($class) . '<ul>';
                                    foreach ($info2 as $subject => $info3) {
                                        $menu .= '<ul class="collapsibleList"><li>' . strtoupper($subject) . '<ul>';
                                        foreach ($info3 as $term => $info4) {
                                            $menu .= '<ul class="collapsibleList"><li>' . strtoupper($term) . '<ul>';
                                            foreach ($info4 as $topic => $info5) {
                                                $menu .= '<ul class="collapsibleList"><li>' . strtoupper($topic) . '<ul>';
                                                foreach ($info5 as $subtopic => $content) {
                                                    $menu .= '<ul class="collapsibleList"><li>' . ucfirst($subtopic) . '<ul>';

                                                    foreach ($content as $title => $cont) {
                                                        if ($title == 'clip') {
                                                            $menu .= '<ul class="collapsibleList"><li>' . ucfirst('Video clips') . '<ul>';
                                                            //$clips = $content['clip'];
                                                            foreach ($cont as $id => $clip) {
                                                                $video = array("video_selected_" . "$id" => TRUE, "vpath_$id" => $clip, "vsub_$id" => $subject, "vdesc_$id" => "This is a test description");
                                                                $menu .='<li><a href="' . base_url() . 'index.php/welcome/user_login/' . $id . '">' . $clip . '</a></li>';
                                                            }
                                                            $menu .= "</ul></li></ul>";
                                                        }
                                                        if ($title == 'quiz') {
                                                            $menu .= '<ul class="collapsibleList"><li>' . ucfirst('Assessments') . '<ul>';
                                                            //$clips = $content['clip'];
                                                            foreach ($cont as $id => $quiz) {
                                                                $menu .='<li><a href="' . base_url() . 'index.php/welcome/quiz/' . $id . '">' . $quiz . '</a></li>';
                                                            }
                                                            $menu .= "</ul></li></ul>";
                                                        }
                                                        if (array_key_exists("notes", $cont)) {
                                                            $notes = $cont['notes'];
                                                            $menu .= '<ul class="collapsibleList"><li>' . ucfirst('notes') . '<ul>';
                                                            foreach ($notes as $note) {
                                                                $menu .='<li><a href="' . base_url() . 'uploads/' . $subject . '/' . $note . '">' . $note . '</a></li>';
                                                            }
                                                            $menu .= "</ul></li></ul>";
                                                        } if (array_key_exists("pastpapers", $cont)) {
                                                            $notes = $cont['pastpapers'];
                                                            $menu .= '<ul class="collapsibleList"><li>' . ucfirst('pastpapers') . '<ul>';
                                                            foreach ($notes as $note) {
                                                                $menu .='<li><a href="' . base_url() . 'uploads/' . $subject . '/' . $note . '">' . $note . '</a></li>';
                                                            }
                                                            $menu .= "</ul></li></ul>";
                                                        } if (array_key_exists("texts", $cont)) {
                                                            $notes = $cont['texts'];
                                                            $menu .= '<ul class="collapsibleList"><li>' . ucfirst('books') . '<ul>';
                                                            foreach ($notes as $note) {
                                                                $menu .='<li><a href="' . base_url() . 'uploads/' . $subject . '/' . $note . '">' . $note . '</a></li>';
                                                            }
                                                            $menu .= "</ul></li></ul>";
                                                        }
                                                    }
                                                    $menu .= "</ul></li></ul>";
                                                }
                                                $menu .= "</ul></li></ul>";
                                            }
                                            $menu .= "</ul></li></ul>";
                                        }
                                        $menu .= "</ul></li></ul>";
                                    }
                                    $menu .= "</ul></li></ul>";
                                }
                                $menu .= "</div>";
                                echo $menu;
                            }
                        }
                        //this foreach loop will change

                        /*
                          foreach ($videos as $subject => $info) {
                          $menu = '<h3>' . strtoupper($subject) . '</h3><div>';
                          foreach ($info as $topic => $info2) {
                          $menu .= '<ul class="collapsibleList"><li>' . ucfirst($topic) . '<ul>';
                          foreach ($info2 as $id => $info3) {
                          foreach ($info3 as $desc => $path) {
                          $subject = strtolower($subject);
                          $video = array("video_selected_" . "$id" => TRUE, "vpath_$id" => $path, "vsub_$id" => $subject, "vdesc_$id" => $desc);
                          //$this->session->set_userdata($video);
                          $menu .="<li><a href='" . base_url() . "index.php/welcome/user_login/" . $id . "'>" .
                          $path . '</a></li>';
                          }
                          }
                          $menu .= '</ul></li></ul>';
                          }
                          $menu .='</div>';
                          echo $menu;
                          }
                         * 
                         */
                        ?>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-8 col-md-9 content-wrapper">
                    <div class="panel panel-primary">
                        <div class="panel panel-heading">
                            <h3 class="panel-title">Selected Content</h3>
                        </div>
                        <div class="panel-body">
                            <?php
                            if (!empty($body)) {
                                echo $body;
                            } else {
                                if (strlen($video_path)) {
                                    $vdpath = "videos" . "/" . $vsubject . "/" . $video_path;
                                    $selected_video = base_url("$vdpath");
                                } else {
                                    $selected_video = base_url("videos/default/shepherd.mp4");
                                }
                                $vhtml = '<div class="col-lg-12"><video width="100%" height="340" controls autoplay><source src="' . $selected_video . '"' . "type='video/mp4;video/ogg;'" . "codecs='avc1.42E01E, mp4a.40.2'" . ">" . "</video></div>";

                                echo $vhtml . "<div class='video-text col-lg-12'>" . $video_text . "</div>";
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer col-xs-12">
            <p>&copy;<?php echo date('Y'); ?> | <a href="#">Science Media Limited</a>| <a href="#">Terms & Conditions</a> | Page rendered in <strong>{elapsed_time}</strong> seconds</p>
        </div>
    </body>
    <script type="text/javascript" src="<?php echo base_url('assets/js/javascript.js'); ?>"></script>
    <script>
            $(function () {
                //$("#sidebar").hide();
                $("#left-menu").click(function () {
                    $("#sidebar").slideToggle('fast');
                });

                $("#sidebar h3").click(function () {
                    $("#sidebar > div > div").slideUp();
                    $("+ div", this).slideToggle();
                });

                $('#datetimepicker1').datetimepicker();

            });

            $("input:checkbox").on('click', function () {
                // in the handler, 'this' refers to the box clicked on
                var $box = $(this);
                if ($box.is(":checked")) {
                    // the name of the box is retrieved using the .attr() method
                    // as it is assumed and expected to be immutable
                    var group = "input:checkbox[name='" + $box.attr("name") + "']";
                    // the checked state of the group/box on the other hand will change
                    // and the current value is retrieved using .prop() method
                    $(group).prop("checked", false);
                    $box.prop("checked", true);
                } else {
                    $box.prop("checked", false);
                }
            });

    </script>

    <?php $this->load->view('special/readfile'); ?>
</html>