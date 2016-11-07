<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Shepherd</title>
        <link href="<?php echo base_url('assets/jquery-ui/jquery-ui.min.css'); ?>" type="text/css" rel="stylesheet" />
        <link href="<?php echo base_url('assets/styles/bootstrap.min.css'); ?>" type="text/css" rel="stylesheet" />
        <link href="<?php echo base_url('assets/styles/lightness_jquery-ui.css'); ?>" type="text/css" rel="stylesheet" />
        <link href="<?php echo base_url('assets/styles/style.css'); ?>" type="text/css" rel="stylesheet" />
        <link href="<?php echo base_url('assets/fa/css/font-awesome.min.css'); ?>" type="text/css" rel="stylesheet" />

        <script type="text/javascript" src="<?php echo base_url('assets/js/CollapsibleLists.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url('assets/js/jquery.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url('assets/js/javascript.js'); ?>"></script>


        <!--<link href="http://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css" rel="stylesheet">
        <script src="http://code.jquery.com/jquery-1.10.2.js"></script>-->
        <!--<script src="http://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>-->
        <script type="text/javascript" src="<?php echo base_url('assets/js/jquery-ui.js'); ?>"></script>

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

        <div class="col-md-12 container_welcome">
            <div class="col-lg-12 margin-top-0 padding-top-0 top-strip">
                <div class="margin-left-20 logo-color col-md-11 margin-top-4 padding-top-0 pull-left">
                    <i class="fa fa-graduation-cap fa-2x"></i><b>SHEPHERD</b>
                </div>
                <div class="margin-right-0 col-lg-1 dropdown pull-right margin-top-5">
                    <button class="btn btn-primary btn-xs dropdown-toggle" type="button" id="dropdownMenu1" 
                            data-toggle="dropdown" aria-expanded="true">
                        <span><?php echo $user; ?></span>
                        <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
                        <li role="presentation"><i class="fa fa-user"></i><span><a role="menuitem" tabindex="-1" href="profile"> My Profile</a></span></li>
                        <li role="presentation"><i class="fa fa-power-off"></i><span><a role="menuitem" tabindex="-1" href='<?php echo base_url()."index.php/welcome/logout"?>'> Logout</a></span></li>
                    </ul>
                </div>
            </div>

            <!-- Nav Bar In Main header-->

            <div class="col-lg-12 header-main">
                <nav class="navbar navbar-default col-lg-8 pull-left margin-top-15">
                    <div class="container-fluid">
                        <!-- Brand and toggle get grouped for better mobile display -->
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <a class="navbar-brand" href="#">Video</a>
                        </div>

                        <!-- Collect the nav links, forms, and other content for toggling -->
                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                            <ul class="nav navbar-nav">
                                <li class="active"><a href="#">Theory <span class="sr-only">(current)</span></a></li>
                                <li><a href="#">Quiz</a></li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Teacher <span class="caret"></span></a>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="#">Mr. Busuulwa</a></li>
                                        <li><a href="#">Mrs. Gladys</a></li>
                                        <li><a href="#">Mr. Moses</a></li>
                                        <li class="divider"></li>
                                        <li><a href="#">Mrs. Muyanja</a></li>
                                        <li class="divider"></li>
                                        <li><a href="#">Mr. George</a></li>
                                    </ul>
                                </li>
                            </ul>
                            <!--
                            <form class="navbar-form navbar-left" role="search">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Search">
                                </div>
                                <button type="submit" class="btn btn-default">Submit</button>
                            </form>
                            -->
                            <ul class="nav navbar-nav">
                                <li><a href="#">Forum</a></li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Downloads <span class="caret"></span></a>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="#">Documents</a></li>
                                        <li><a href="#">Videos</a></li>
                                        <li><a href="#">Home work</a></li>
                                        <li class="divider"></li>
                                        <li><a href="#">Separated link</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div><!-- /.navbar-collapse -->
                    </div><!-- /.container-fluid -->
                </nav>
            </div>
            <div class="col-lg-12 top-gray-strip">

            </div>
            <div class="col-lg-12">
                <div class="col-lg-3 sidebar-left">
                    <div id="accordion-2" class="col-lg-12">
                        <?php
                        foreach ($videos as $subject => $info) {
                            $menu ='<h3>'.strtoupper($subject).'</h3><div>';
                            foreach ($info as $topic => $info2) {
                                $menu .= '<ul class="collapsibleList"><li>'.ucfirst($topic).'<ul>';
                                foreach($info2 as $id=>$path){
                                    $subject = strtolower($subject);
                                    $video = array("video_selected$id"=>TRUE,"vpath$id"=>$path,"vsub$id"=>$subject);
                                    $this->session->set_userdata($video);
                                    $menu .="<li><a href='".base_url()."index.php/welcome/student/".$id."'>".
                                            $path.'</a></li>';
                                }
                                $menu .= '</ul></li></ul>';
                            }
                            $menu .='</div>';
                            echo $menu;
                        }
                        ?>
                    </div>
                </div>
                <div class="col-lg-8 border-left-content border-right-content main-content">
                    <div class="panel panel-primary">
                        <div class="panel panel-heading">
                            <h3 class="panel-title">Selected Video: Physics > Heat Transfer</h3>
                        </div>
                        <div class="panel-body">
                            <video width="100%" height="340" controls>
                                <?php
                                //$subj = $this->session->userdata("subject");
                                //$vdpath = $this->session->userdata("video_path");
                                if (strlen($video_path)) {
                                    $vdpath = "videos/$vsubject/$video_path";
                                    $selected_video = base_url("$vdpath");
                                } else {
                                    $selected_video = ""; //this shall later be our default clip
                                }
                                ?>
                                <source src="<?php echo $selected_video//echo base_url('videos/physics/clip.mp4');  ?>" type='video/mp4; codecs="avc1.42E01E, mp4a.40.2"'>
                            </video>
                            <div class="video-text">
                                This is sample video Text! This is sample video Text!This is sample video Text!This is sample video Text!
                                This is sample video Text!This is sample video Text!This is sample video Text!This is sample video Text!
                                This is sample video Text!This is sample video Text!This is sample video Text!This is sample video Text!
                                This is sample video Text!This is sample video Text!This is sample video Text!This is sample video Text!
                                This is sample video Text!This is sample video Text!This is sample video Text!This is sample video Text!
                                This is sample video Text!This is sample video Text!This is sample video Text!This is sample video Text!
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-lg-1 sidebar-right">

                </div>
            </div>
            <div class="footer col-lg-12">
                <p>&copy;<?php echo date('Y'); ?> | <a href="#">Marble Uganda</a>| <a href="#">Terms & Conditions</a> | Page rendered in <strong>{elapsed_time}</strong> seconds</p>
            </div>
        </div>

    </body>
</html>