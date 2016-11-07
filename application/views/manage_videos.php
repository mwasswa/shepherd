<div class="col-lg-12" id='videoUpload'>
    <div class="col-lg-12">
        <?php
        if (strlen($success)) {
            echo "<div class='alert alert-success col-lg-12'>$success</div>";
        } elseif (strlen($failure)) {
            echo "<div class='alert alert-danger col-lg-12'>$failure</div>";
        } else {
            echo '';
        }

        if ($this->uri->segment(2) == 'edit_video') {
            extract($evideos);
            $topic = $e_vtopic;
            $overview = $e_vdesc;
            $path = $e_vpath;

            $subject = $e_vsubject;
            $arr = explode(",", $subject);
            //print_r($arr);exit;
            $subject = $arr[0];
            if($subject == "physics"){
                $subjectid = 1;
            }
            
            if($subject == "chemistry"){
                $subjectid = 2;
            }
            
            if($subject == "biology"){
                $subjectid = 3;
            }
            
            if($subject == "mathematics"){
                $subjectid = 4;
            }
            
            if($subject == "icts"){
                $subjectid = 5;
            }
            //$subjectid = $arr[1];
            $subjects = "<select name='v_subject' class='form-control'>";
            $subjects .= "<option value='" . $subjectid . "'>" . ucfirst($subject) . "</option>";
            $subject_arr = array(
                "1" => "Physics",
                "2" => "Chemistry",
                "3" => "Biology",
                "4" => "Mathematics",
                "5" => "ICTs"
            );
            unset($subject_arr[$subjectid]);
            foreach ($subject_arr as $key => $val) {
                $subjects .= "<option value='" . $key . "'>" . $val . "</option>";
            }
            $subjects .= "</select>";

            $form = "<fieldset>
            <legend ><font color='green'><i class='fa fa-user-plus'></i> Edit Video</font></legend>
            <form method='POST' class='form-inline' role='form' enctype='multipart/form-data'>
                <div class='form-group margin-10'>
                    $subjects
                </div>
                <div class='form-group margin-10'>
                    <!--<label for='pwd'>Password:</label>-->
                    <input type='text' class='form-control' id='pwd' placeholder='Topic' name='v_topic' value='" . $topic . "'/>
                </div>
                <div class='form-group margin-10'>
                    <!--<label for='pwd'>Password:</label>-->
                    <input type='textarea' class='form-control' placeholder='Sub Topic' name='v_subtopic'>
                </div>
                      
                <div class='form-group margin-10'>
                    <select name='v_level' class='form-control'>
                        <option value=''>-Select Level-</option>
                        <option value='1'>O-Level</option>
                        <option value='2'>A-Level</option>
                    </select>
                </div>
                <div class='form-group margin-10'>
                    <select name='v_class' class='form-control'>
                        <option value=''>-Select Class-</option>
                        <option value='Senior 1'>S1</option>
                        <option value='Senior 2'>S2</option>
                        <option value='Senior 3'>S3</option>
                        <option value='Senior 4'>S4</option>
                        <option value='Senior 5'>S5</option>
                        <option value='Senior 6'>S6</option>
                    </select>
                </div>
                <div class='form-group margin-10'>
                    <select name='v_term' class='form-control'>
                        <option value=''>-Select Term-</option>
                        <option value='Term I'>Term I</option>
                        <option value='Term II'>Term II</option>
                        <option value='Term III'>Term III</option>
                    </select>
                </div>


                <div class='form-group margin-10'>
                    <!--<label for='pwd'>Password:</label>-->
                    <input type='textarea' class='form-control' placeholder='Description' name='v_desc' value='" . $overview . "'/>
                </div>
                <div class='form-group margin-10'>
                    <!--<label for='pwd'>Password:</label>-->
                    <input type='file' class='form-control' id='pwd' placeholder='Browse' name='userfile'/><br/>
                    <i><font color=green>Leaving this blank leaves former video</font></i>
                </div>
                <div class='form-group margin-10'>
                    <input type='submit' value='Update' name='edit_video' class='btn btn-primary'/>
                </div>
            </form>
        </fieldset>";
        } else {
            $form = '<fieldset>
            <legend><font color="green"><i class="fa fa-video-camera"></i> Add Video</font></legend>
            <form method="POST" class="form-inline" role="form" enctype="multipart/form-data">
                <div class="form-group margin-10">
                    <select name="v_subject" class="form-control">
                        <option value="">-Select Subject-</option>
                        <option value="1">Physics</option>
                        <option value="2">Chemistry</option>
                        <option value="3">Biology</option>
                        <option value="4">Mathematics</option>
                        <option value="5">ICTs</option>
                    </select>
                </div>
                <div class="form-group margin-10">
                    <!--<label for="pwd">Password:</label>-->
                    <input type="text" class="form-control" id="pwd" placeholder="Topic" name="v_topic">
                </div>
                <div class="form-group margin-10">
                    <!--<label for="pwd">Password:</label>-->
                    <input type="textarea" class="form-control" placeholder="Sub Topic" name="v_subtopic">
                </div>
                <div class="form-group margin-10">
                    <select name="v_level" class="form-control">
                        <option value="">-Select Level-</option>
                        <option value="O-Level">O-Level</option>
                        <option value="A-Level">A-Level</option>
                    </select>
                </div>
                <div class="form-group margin-10">
                    <select name="v_class" class="form-control">
                        <option value="">-Select Class-</option>
                        <option value="Senior 1">S1</option>
                        <option value="Senior 2">S2</option>
                        <option value="Senior 3">S3</option>
                        <option value="Senior 4">S4</option>
                        <option value="Senior 5">S5</option>
                        <option value="Senior 6">S6</option>
                    </select>
                </div>
                <div class="form-group margin-10">
                    <select name="v_term" class="form-control">
                        <option value="">-Select Term-</option>
                        <option value="Term I">Term I</option>
                        <option value="Term II">Term II</option>
                        <option value="Term III">Term III</option>
                    </select>
                </div>
                <div class="form-group margin-10">
                    <!--<label for="pwd">Password:</label>-->
                    <input type="textarea" class="form-control" placeholder="Description" name="v_desc">
                </div>
                <div class="form-group margin-10">
                    <!--<label for="pwd">Password:</label>-->
                    <input type="file" class="form-control" id="pwd" placeholder="Browse" name="userfile">
                </div>
                <div class="form-group margin-10">
                    <input type="submit" value="Save" name="submit_video" class="btn btn-primary"/>
                </div>
            </form>
        </fieldset>';
        }
        ?>
    </div>
    <div class="col-lg-12 bpm-bottom">
        <?php echo $form; ?>
    </div>
</div>

<div class="row" id="videosSearch">
    <div class="col-lg-12 bpm-bottom">
<?php $this->load->view('special/searchVideos');?>
    </div>

</div>

<div class="col-lg-12">
    <?php
    //$vdata[$sub_name][$topic][$id][$description] = $path
    $videos_arr = $videos_table;
    $table = "<table class='table table-responsive table-striped table-bordered' id='videosTable'>
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Subject</th>
                                <th>Topic</th>
                                <th>S-Topic</th>
                                <th>Level</th>
                                <th>Class</th>
                                <th>Term</th>
                                <th>Brief</th>
                                <!--<th>Created By</th>
                                <th>Date Created</th>-->
                                <th colspan='2'>Actions</th>
                            </tr>
                        </thead>
                        <tbody>";
                            $count = 1;
        foreach ($videos_arr as $vsub => $info1) {
            foreach ($info1 as $vtopic => $info2) {
                foreach ($info2 as $vid => $info3) {
                    foreach ($info3 as $vdesc => $info4) {
                        foreach ($info4 as $created => $info5) {
                            foreach ($info5 as $createdby => $vpath) {
                                $arr = explode('-:',$vpath);
                                $vpath = $arr[0];
                                $vlevel = $arr[1];
                                $vclass = $arr[2];
                                $vterm = $arr[3];
                                $vsubtopic = $arr[4];
                                $table .= "<tr>
                                    <td>$count</td>
                                    <td><a href='".base_url()."index.php/welcome/user_login/$vid"."'>$vpath</a></td>
                                    <td>$vsub</td>
                                    <td>$vtopic</td>
                                    <td>$vsubtopic</td>
                                    <td>$vlevel</td>
                                    <td>$vclass</td>
                                    <td>$vterm</td>
                                    <td>$vdesc</td>
                                    <!--<td>$createdby</td>
                                    <td>$created</td>-->
                                    <td class='green-font'><a href='" . base_url() . "index.php/welcome/edit_video/$vid'><i class='fa fa-edit'></i></a></td>
                                    <td class='red-font'><a href='" . base_url() . "index.php/welcome/delete_video/$vid'><i class='fa fa-trash'></i></a></td>
                                </tr>";
                                $count++;
                            }
                        }
                    }
                }
            }
        }
    
    $table .= "</tbody></table>";
    echo $table;
     $this->load->view('special/videoSearchResultTable');
    ?>
</div>
<?php
echo "<div class='col-lg-12' id='videoPaginaiton'>" . $this->pagination->create_links() . "</div>";
?>




