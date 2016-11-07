<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

?>
<div class="row">
    <div class="col-lg-12">
        <div class="row" id="editingStuff">
            <div class="col-md-12">

        <?php foreach($quiz as $setup){
            $attributes = array('class'=>'form-blockzz col-lg-6 col-lg-push-3','role=form',
                'enctype'=>'multipart/form-data');
            
            echo form_open('quiz/updateQiz',$attributes);
            
            ?>
        
                <input type ="hidden" name="id" value="<?php echo $qid?>">
                <div class="form-group margin-10">
                    <input type="text" class="form-control" id="email" placeholder="Title" name="title" value="<?php echo $setup->title;?>"/>
                </div>
                <div class="form-group margin-10">
                    <!--<label for="pwd">Password:</label>-->
                    <input type="text" class="form-control" id="pwd" placeholder="Duration in hours" name="duration" value="<?php echo $setup->duration;?>"/>
                </div>
                <div class="form-group margin-10">
                    <div class='input-group date' id='datetimepicker1'>
                        <input id="quiz_date" type='text' name="qdate" class="form-control" placeholder="Date" value="<?php echo $setup->date;?>"/>
                        <span class="input-group-addon">
                            <span class="fa fa-calendar"></span>
                        </span>
                    </div>
                </div>
                <div class="form-group margin-10">
                    <!--<label for="pwd">Password:</label>-->
                    <input type="text" class="form-control" id="pwd" placeholder="Start Time" name="start_time" value="<?php echo $setup->start_time;?>" />
                </div>
                <div class="form-group margin-10">
                    <input type="text" class="form-control" id="pwd" placeholder="Marks per Question" name="qweight" value="<?php echo $setup->weight;?>" />
                </div>
                <div class="form-group margin-10">
                    <input type="text" class="form-control" id="pwd" placeholder="Year" name="qyear" value="<?php echo $setup->year;?>" />
                </div>
                <div class="form-group margin-10">
                    <select name="qterm" class="form-control">
                        <option value="">-Select Term-</option>
                        <option value="I">I</option>
                        <option value="II">II</option>
                        <option value="III">III</option>
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
                    <select name="qclass" class="form-control" value="s3">
                        <option value="">-Select Class-</option>
                        <option value="all">All</option>
                        <option value="s1">S1</option>
                        <option value="s2">S2</option>
                        <option value="s3">S3</option>
                        <option value="s4">S4</option>
                        <option value="s5">S5</option>
                        <option value="s6">S6</option>
                    </select>
                </div>
                <div class="form-group margin-10">
                    <select name="qstatus" class="form-control" value="c">
                        <option value="">-Select Status-</option>
                        <option value="o">Open</option>
                        <option value="c">Closed</option>
                    </select>
                </div>
               <input type="hidden" value="<?php echo $setup->id;?>">
                <div class="margin-10">
                    <input type="submit" class="btn btn-primary" name="editQuizSetup" value="Update"/>
                    <a href="#" class="btn btn-default cancelQuizEdit">Cancel</a>
                </div>
            
        <?php echo form_close();}?>
            </div>
        </div>
        <div class="row" id="summaryForQuiz">
            <div class="col-lg-6 col-lg-push-3">
                <?php foreach($quiz as $setup){ ?>
                <div class="row">
                    <div class="col-lg-4">
                        <strong>Title :</strong>
                    </div>
                    <div class="col-lg-8">
                        <?php echo $setup->title;?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <strong>Duration :</strong>
                    </div>
                    <div class="col-lg-8">
                        <?php echo $setup->duration;?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <strong>Date :</strong>
                    </div>
                    <div class="col-lg-8">
                        <?php echo $setup->date;?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <strong>Start Time :</strong>
                    </div>
                    <div class="col-lg-8">
                        <?php echo $setup->start_time;?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <strong>Year :</strong>
                    </div>
                    <div class="col-lg-8">
                        <?php echo $setup->year;?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <strong>Weight :</strong>
                    </div>
                    <div class="col-lg-8">
                        <?php echo $setup->weight;?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <strong>Subject :</strong>
                    </div>
                    <div class="col-lg-8">
                        <?php echo $setup->subject;?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <strong>Class :</strong>
                    </div>
                    <div class="col-lg-8">
                        <?php echo $setup->class;?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <strong>Status :</strong>
                    </div>
                    <div class="col-lg-8">
                        <?php if($setup->status == 'c'){
                            echo 'Closed';
                        }else{
                            echo 'Open';  }
                        ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <strong>Active Status :</strong>
                    </div>
                    <div class="col-lg-8">
                        <?php if($setup->active == 1){
                            echo 'Active';
                        }else{
                            echo 'Inactive';
                        }
                            ?>

                    </div>
                </div>
                <?php }?>
                <div class="row">
                    <div class="col-lg-12">
                        <a href="#" class="editQuizlink btn btn-default">Edit this Quiz</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>