<?php
if (strlen($success)) {
    echo "<div class='alert alert-success col-xs-12'>$success</div>";
} elseif (strlen($failure)) {
    echo "<div class='alert alert-danger col-xs-12'>$failure</div>";
} else {
    echo '';
}
?>
<div class="col-lg-12 bpm-bottom">
    <fieldset>
        <legend><font class="myColor"><i class="fa fa-pencil"></i> Set Quiz</font></legend>
        <div class="row">
            <div class="col-lg-6" id="quizSetupResult">

            </div>
        </div>

        <div class="row setQuizWithTheFoam">
            <div class="col-lg-12">

                <form class="form-block col-lg-6 col-lg-push-3" role="form" method="POST" enctype="multipart/form-data">
                    <div class="form-group margin-10  titleError">
                        <input type="text" class="form-control title has-warning " id="Ftitle" placeholder="Title" name="Ftitle"/>
                    </div>
                    <div class="form-group margin-10 durationError">
                        <!--<label for="pwd">Password:</label>-->
                        <input type="text" class="form-control duration" id="Fduration" placeholder="Duration in hours" name="Fduration" />
                    </div>
                    <div class="form-group margin-10">
                        <div class='input-group date' id='datetimepicker2'>
                            <input id="quiz_date_2" type='text' name="qFdate"  class="form-control date" placeholder="Date"/>
                            <span class="input-group-addon">
                                <span class="fa fa-calendar"></span>
                            </span>
                        </div>
                    </div>
                    <div class="form-group margin-10 startingTimeError">
                        <!--<label for="pwd">Password:</label>-->
                        <input type="text" class="form-control startTime" id="Ftime" placeholder="Start Time" name="Fstart_time" />
                    </div>
                   
                    
                    
                    <div class="margin-10">
                        <input type="submit" class="btn btn-primary setQuiz" name="setQuiz" value="Save"/>
                    </div>
                </form>

                

            </div>
        </div>


        <a class="btn btn-default showQuizUploadFileFoam" href="#">Set quiz using a File Uplaod</a>

        <!-- Show up when someone wats to setup a quiz using a file Upload -->
        <div class="quizUploadFileFoam">
            <div class='alert alert-success col-xs-12'>File Format => Question,option1:option2:option3:option4,correct_option</div>
            <form class="form-inline" role="form" method="POST" enctype="multipart/form-data">
                <div class="form-group margin-10">
                    <input type="text" class="form-control" id="email" placeholder="Title" name="title"/>
                </div>
                <div class="form-group margin-10">
                    <input type="text" class="form-control" id="email" placeholder="Sub Topic" name="qsubtopic"/>
                </div>
                <div class="form-group margin-10">
                    <input type="text" class="form-control" id="email" placeholder="Topic" name="qtopic"/>
                </div>
                <!--
                <div class="form-group margin-10">
                    <!--<label for="pwd">Password:</label>
                    <input type="text" class="form-control" id="pwd" placeholder="Duration in hours" name="duration" />
                </div>
                <div class="form-group margin-10">
                    <div class='input-group date' id='datetimepicker1'>
                        <input id="quiz_date" type='text' name="qdate" class="form-control" placeholder="Date"/>
                        <span class="input-group-addon">
                            <span class="fa fa-calendar"></span>
                        </span>
                    </div>
                </div>
                <div class="form-group margin-10">
                    <!--<label for="pwd">Password:</label>
                    <input type="text" class="form-control" id="pwd" placeholder="Start Time" name="start_time" />
                </div>-->
                <div class="form-group margin-10">
                    <input type="text" class="form-control" id="pwd" placeholder="Marks per Question" name="qweight" />
                </div>
                <div class="form-group margin-10">
                    <input type="text" class="form-control" id="pwd" placeholder="Number of Questions" name="num_of_qtns" />
                </div>
                    <!--
                <div class="form-group margin-10">
                    <input type="text" class="form-control" id="pwd" placeholder="Year" name="qyear" />
                </div>-->
                <div class="form-group margin-10">
                    <select name="qterm" class="form-control">
                        <option value="">-Select Term-</option>
                        <option value="Term I">I</option>
                        <option value="term II">II</option>
                        <option value="Term III">III</option>
                    </select>
                </div>
                <div class="form-group margin-10">
                    <select name="qsubject" class="form-control">
                        <option value="">-Select Subject-</option>
                        <option value="1">Physics</option>
                        <option value="2">Chemistry</option>
                        <option value="3">Biology</option>
                        <option value="4">Mathematics</option>
                        <option value="5">ICTs</option>
                    </select>
                </div>
                <div class="form-group margin-10">
                    <select name="qclass" class="form-control">
                        <option value="">-Select Class-</option>
                        <option value="all">All</option>
                        <option value="Senior 1">S1</option>
                        <option value="Senior 2">S2</option>
                        <option value="Senior 3">S3</option>
                        <option value="Senior 4">S4</option>
                        <option value="Senior 5">S5</option>
                        <option value="Senior 6">S6</option>
                    </select>
                </div>
                <div class="form-group margin-10">
                    <select name="qlevel" class="form-control">
                        <option value="">-Select Level-</option>
                        <option value="O-Level">O-Level</option>
                        <option value="A-Level">A-Level</option>
                    </select>
                </div>
                    <!--
                <div class="form-group margin-10">
                    <select name="qstatus" class="form-control">
                        <option value="">-Select Status-</option>
                        <option value="o">Open</option>
                        <option value="c">Closed</option>
                    </select>
                </div>-->
                <div class="form-group margin-10">
                    <input type="file" class="form-control" id="email" name="quizfile"/>
                </div>
                <div class="margin-10">
                    <input type="submit" class="btn btn-primary" name="set_quiz_btn" value="Save"/>
                </div>
            </form>
        </div>
    </fieldset>
</div>