<div class="col-lg-12">
    <div class="col-lg-12" id="upload">
        <?php
        if (strlen($success)) {
            echo "<div class='alert alert-success col-lg-12'>$success</div>";
        } elseif (strlen($failure)) {
            echo "<div class='alert alert-danger col-lg-12'>$failure</div>";
        } else {
            echo '';
        }

        if ($this->uri->segment(2) == 'edit_theory') {
            /*
             * Called when a document is to be edited.
             * Now Called through Java script
             * Edited by Joshua Waiswa
             * jwaiswa7@gmail.com
            */
          

      
        } else {
            $form = '<form class="form-inline" role="form" method="POST" enctype="multipart/form-data">
                <!--<div class="form-group margin-10">-->
                
                    <div class="form-group margin-10">
                        <select name="th_level" class="form-control">
                            <option value=""><b>-Select Level-</b></option>
                            <option value="O-Level">O-Level</option>
                            <option value="A-Level">A-Level</option>
                        </select>
                    </div>
                    <div class="form-group margin-10">
                        <select name="th_term" class="form-control">
                            <option value=""><b>-Select Term-</b></option>
                            <option value="Term I">Term I</option>
                            <option value="Term II">Term II</option>
                            <option value="Term III">Term III</option>
                        </select>
                    </div>
                    <div class="form-group margin-10">
                        <select name="th_class" class="form-control">
                            <option value=""><b>-Select Class-</b></option>
                            <option value="Senior 1">S1</option>
                            <option value="Senior 2">S2</option>
                            <option value="Senior 3">S3</option>
                            <option value="Senior 4">S4</option>
                            <option value="Senior 5">S5</option>
                            <option value="Senior 6">S6</option>
                        </select>
                    </div>
                    <div class="form-group margin-10">
                    <select name="th_subject" class="form-control">
                        <option value=""><b>-Select Subject-</b></option>
                        <option value="1">Physics</option>
                        <option value="2">Chemistry</option>
                        <option value="3">Biology</option>
                        <option value="4">Mathematics</option>
                        <option value="5">ICTs</option>
                    </select>
                    </div>
                <!--</div>-->
                <div class="form-group margin-10">
                    <input type="text" class="form-control" id="email" placeholder="Topic" name="th_topic"/>
                </div>
                
                <div class="form-group margin-10">
                    <input type="text" class="form-control" id="email" placeholder="Sub Topic" name="th_subtopic"/>
                </div>
                <div class="form-group margin-10">
                    <select name="th_type" class="form-control">
                        <option value=""><b>-Select Type-</b></option>
                        <option value="notes">Class Notes</option>
                        <option value="assignment">Assignment</option>
                        <option value="textbook">Text Book</option>
                        <option value="pastpaper">Past Paper</option>
                    </select>
                </div>
                <div class="form-group margin-10">
                    <label for="th_overview">Over View</label>
                    <textarea class="form-control" cols="70" rows="4" name="th_overview">Simple description of the upload</textarea>
                    <!-- <input type="text" class="form-control" id="pwd" placeholder="Overview" name="th_overview"/>-->
                </div>
                <div class="form-group margin-10">
                    <input type="file" class="form-control" id="pwd" name="theoryfile"/>
                </div>
                <div class="margin-10">
                    <input type="submit" class="btn btn-primary" value="Save" name="add_content"/>
                </div>
            </form>';
        }
        ?>
    </div>
    <div class="col-lg-12 bpm-bottom">
        <?php //echo $form;
        $this->load->view('special/search_form');?>
    </div>
</div>


<div class="col-lg-12">
    <?php
    //$theory = $this->session->userdata("theory");
    $html = '<table class="table table-responsive table-striped" id="theoryDefault">
        <thead>
            <tr>
                <th>#</th>
                <th><a href="#" id="upload" id="my_link">Document name</a></th>
                <th>Subjectid</th>
                <th>Topic</th>
                <th>Sub Topic</th>
                <th>Level</th>
                <th>Term</th>
                <th>Class</th>
                <th>Overview</th>
                <th>Category</th>
                <th colspan="2">Actions</th>
                <!--<th><i class="fa fa-plus-circle"></i></th>-->
            </tr>
        </thead>
        <tbody>';
    //$vdata[$id][$sub_name][$topic][$content][$category] = $upload;
    //print_r($theory);exit;
    if (is_array($theory) && count($theory)) {
        $count = 1;
        foreach ($theory as $id => $info) {
            foreach ($info as $subject => $info1) {
                foreach ($info1 as $topic => $info2) {
                    foreach ($info2 as $content => $info3) {
                        foreach ($info3 as $category => $upload) {
                            $arr = explode("-:",$upload);
                            $upload = $arr[0];
                            $level = $arr[1];
                            $class = $arr[2];
                            $term = $arr[3];
                            $subtopic = $arr[4];
                            $html .= "<tr>
                <td>$count</td>
                <td><a class='fileClicked' href='" . base_url() . "uploads/" . strtolower($subject) . "/" . $upload . "' target='iframe_a' class='docs'>$upload</a></td>
                <td>$subject</td>
                <td>$topic</td>
                <td>$subtopic</td>
                <td>$level</td>
                <td>$term</td>
                <td>$class</td>
                <td>$content</td>
                <td>$category</td>
                <td class='green-font'><a href='" . base_url() . "index.php/welcome/edit_theory/$id' class='editfileLink'><i class='fa fa-edit'></i></a></td>
                <td class='red-font'><a href='" . base_url() . "index.php/welcome/delete_theory/$id'><i class='fa fa-trash'></i></a></td>
                </tr>";
                            $count++;
                        }
                    }
                }
            }
        }
        $html .="</tbody></table>";
        echo $html;
        $this->load->view('special/fileSearchResultTable');
    }
    ?>
</div>
<?php
echo "<div>" . $this->pagination->create_links() . "</div>";
?>


<script>
    $(".docs").click(function () {
        $("iframe").height(526);
        $("iframe").css('visibility', 'visible');

    });
</script>


<!--- Pops up once a file is to be edited -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel"><font color="green"><i class="fa fa-user-plus"></i> Add Content</font></h4>
            </div>
            <div class="modal-body">
                <?php echo $form; ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel"><font color="green"><i class="fa fa-user-plus"></i>Edit file</font></h4>
            </div>
            <div class="modal-body" id="myFileEditReturned">

                <form class='form-inline' role='form' method='POST' enctype='multipart/form-data'>
                    <div class='form-group margin-10'>
                        <select name='th_level' class='form-control'>
                            <option value=''><b>-Select Level-</b></option>
                            <option value='O-Level'>O-Level</option>
                            <option value='A-Level'>A-Level</option>
                        </select>
                    </div>
                    <div class='form-group margin-10'>
                        <select name='th_term' class='form-control'>
                            <option value=''><b>-Select Term-</b></option>
                            <option value='Term I'>Term I</option>
                            <option value='Term II'>Term II</option>
                            <option value='Term III'>Term III</option>
                        </select>
                    </div>
                    <div class='form-group margin-10'>
                        <select name='th_class' class='form-control'>
                            <option value=''><b>-Select Class-</b></option>
                            <option value='Senior 1'>S1</option>
                            <option value='Senior 2'>S2</option>
                            <option value='Senior 3'>S3</option>
                            <option value='Senior 4'>S4</option>
                            <option value='Senior 5'>S5</option>
                            <option value='Senior 6'>S6</option>
                        </select>
                    </div>
                    <div class='form-group margin-10'>
                        <select name='th_subject' class='form-control'>
                            <option value=''><b>-Select Subject-</b></option>
                            <option value='1'>Physics</option>
                            <option value='2'>Chemistry</option>
                            <option value='3'>Biology</option>
                            <option value='4'>Mathematics</option>
                            <option value='5'>ICTs</option>
                        </select>
                    </div>
                    <div class='form-group margin-10'>
                        <input type='text' class='form-control' id='fileTopic' placeholder='Topic' name='th_topic' value=''/>
                    </div>
                    <div class='form-group margin-10'>
                        <input type='text' class='form-control' id='fileTopic' placeholder='Topic' name='th_subtopic' value=''/>
                    </div>
                    <div class='form-group margin-10'>
                        <select name='th_type' class='form-control' id="selectType">
                            <option value=''><b>-Select Type-</b></option>
                            <option value='notes'>Class Notes</option>
                            <option value='assignment'>Assignment</option>
                            <option value='textbook'>Text Book</option>
                            <option value='pastpaper'>Past Paper</option>
                        </select>
                    </div>
                    <div class='form-group margin-10'>
                        <textarea class="form-control" cols="70" rows="4" name="th_overview" id="description">Simple description of the upload</textarea>

                    </div>
                    <div class='form-group margin-10'>
                        <input type='file' class='form-control' id='fileName' name='theoryfile'/>
                    </div>
                    <div class='margin-10'>
                        <input type='submit' class='btn btn-primary' value='Update' name='edit_content'/>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>