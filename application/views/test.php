
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Shepherd</title>
        <link href="http://localhost/shephered/assets/jquery-ui/jquery-ui.min.css" type="text/css" rel="stylesheet" />
        <link href="http://localhost/shephered/assets/styles/bootstrap.min.css" type="text/css" rel="stylesheet" />
        <link href="http://localhost/shephered/assets/styles/lightness_jquery-ui.css" type="text/css" rel="stylesheet" />
        <link href="http://localhost/shephered/assets/styles/style.css" type="text/css" rel="stylesheet" />
        <link href="http://localhost/shephered/assets/fa/css/font-awesome.min.css" type="text/css" rel="stylesheet" />

        <script type="text/javascript" src="http://localhost/shephered/assets/js/CollapsibleLists.js"></script>
        <script type="text/javascript" src="http://localhost/shephered/assets/js/jquery.js"></script>
        <script type="text/javascript" src="http://localhost/shephered/assets/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="http://localhost/shephered/assets/js/javascript.js"></script>


        <!--<link href="http://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css" rel="stylesheet">
        <script src="http://code.jquery.com/jquery-1.10.2.js"></script>-->
        <!--<script src="http://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>-->
        <script type="text/javascript" src="http://localhost/shephered/assets/js/jquery-ui.js"></script>

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
                        <span>mwasswa</span>
                        <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
                        <li role="presentation"><i class="fa fa-user"></i><span><a role="menuitem" tabindex="-1" href="profile"> My Profile</a></span></li>
                        <li role="presentation"><i class="fa fa-power-off"></i><span><a role="menuitem" tabindex="-1" href='http://localhost/shephered/index.php/welcome/logout'> Logout</a></span></li>
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
                                        <li><a href="#">Mrs. Gladys</a></li>                                    </ul>
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
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i clas="fa fa-download">Downloads</i> <span class="caret"></span></a>
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
                        <h3>PHYSICS</h3><div><ul class="collapsibleList"><li>Mechanics<ul><li><a href='http://localhost/shephered/index.php/welcome/user/1'>clip.mp4</a></li></ul></li></ul><ul class="collapsibleList"><li>Magnetism<ul><li><a href='http://localhost/shephered/index.php/welcome/user/6'>Gauss.mp4</a></li><li><a href='http://localhost/shephered/index.php/welcome/user/7'>induction.mp4</a></li></ul></li></ul></div><h3>BIOLOGY</h3><div><ul class="collapsibleList"><li>Human actions<ul><li><a href='http://localhost/shephered/index.php/welcome/user/2'>coordination.mp4</a></li></ul></li></ul></div><h3>ICTS</h3><div><ul class="collapsibleList"><li>Intro to computers<ul><li><a href='http://localhost/shephered/index.php/welcome/user/3'>computers.mp4</a></li></ul></li></ul></div><h3>CHEMISTRY</h3><div><ul class="collapsibleList"><li>Physical States<ul><li><a href='http://localhost/shephered/index.php/welcome/user/4'>matter.mp4</a></li></ul></li></ul></div><h3>MATHEMATICS</h3><div><ul class="collapsibleList"><li>Algebra<ul><li><a href='http://localhost/shephered/index.php/welcome/user/5'>algebra.mp4</a></li></ul></li></ul></div>                    </div>
                </div>
                <div class="col-lg-8 border-left-content border-right-content main-content">
                    <div class="panel panel-primary">
                        <div class="panel panel-heading">
                            <h3 class="panel-title">Selected Video: Physics > Heat Transfer</h3>
                        </div>
                        <div class="panel-body">
                            <div class="col-lg-12"><video width="100%" height="340" controls><source src="http://localhost/shephered/videos/physics/clip.mp4"type='video/mp4;'codecs='avc1.42E01E, mp4a.40.2'><div class='video-text col-lg-12'>
                                                        This is sample video Text! This is sample video Text!
                                                        This is sample video Text! This is sample video Text!
                                                        This is sample video Text! This is sample video Text!
                                                        This is sample video Text! This is sample video Text!
                                                        This is sample video Text! This is sample video Text!
                                                        This is sample video Text! This is sample video Text!
                                                        This is sample video Text! This is sample video Text!
                                                        This is sample video Text! This is sample video Text!
                                                        This is sample video Text! This is sample video Text!
                                                        This is sample video Text! This is sample video Text!
                                                   </div></video></div>                        </div>
                    </div>

                </div>
                <div class="col-lg-1 sidebar-right">

                </div>
            </div>
            <div class="footer col-lg-12">
                <p>&copy;2015 | <a href="#">Marble Uganda</a>| <a href="#">Terms & Conditions</a> | Page rendered in <strong>0.1060</strong> seconds</p>
            </div>
        </div>

    </body>
</html>