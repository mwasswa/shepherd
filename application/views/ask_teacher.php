<div class="col-lg-12">
    <div class="col-lg-12">
        <?php
        if (strlen($success)) {
            echo "<div class='alert alert-success col-lg-12'>$success</div>";
        } elseif (strlen($failure)) {
            echo "<div class='alert alert-danger col-lg-12'>$failure</div>";
        } else {
            echo '';
        }
        ?>
    </div>
    <div class="col-lg-12">
        <fieldset>
            <legend><font color="green"><i class="fa fa-user-plus"></i> Add Question</font></legend>
            <form method="POST" class="form-block col-lg-6 col-md-push-3" role="form">
                <div class="form-group margin-10">
                    <input type="text" class="form-control" name="teacherName" autocomplete="off" id="teacherName" placeholder="Search for the teacher's name">
                </div>
                <div id="teahcerSearchResult">
                    
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
                    <input type="textarea" class="form-control" placeholder="Topic" name="qtopic">
                </div>
                <div class="form-group margin-10">
                    <textarea class="form-control" placeholder="Write your question here to teacher" name="question" cols="60" rows="10"></textarea>
                   
                </div>
                <div class="form-group margin-10">
                    <input type="hidden" readonly="readonly" class="form-control" value="" name="t_fname" id="t_fname"/>
                    <input type="hidden" readonly="readonly" class="form-control" value="" name="t_lname" id="t_lname"/>

                </div>
                <div class="form-group margin-10">
                    <input type="hidden" readonly="readonly" class="form-control" value="<?php echo $this->session->userdata('username'); ?>" name="s_name"/>
                </div>
                <div class="form-group margin-10">
                    <input type="hidden" readonly="readonly" class="form-control" value="<?php echo $this->session->userdata('class'); ?>" name="s_class"/>
                </div>
                <div class="form-group margin-10">
                    <input type="hidden" readonly="readonly" class="form-control" name="q_date" value="<?php echo date("Y-m-d H:m:s"); ?>"/>
                </div>
                <div class="form-group margin-10">
                   <!-- <button class="btn btn-primary" name="submit_query"><li class="fa fa-send"></li> Send</button> -->
                   <input type="submit" value="Send" name="submit_query" class="btn btn-primary">
                </div>
            </form>
        </fieldset>
    </div>
</div>

    