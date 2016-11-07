<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

?>
<div class="row">
    <div class="col-lg-12 bpm-bottom">
    <fieldset>
        <legend><font color="green"><i class="fa fa-folder-open"></i>Add question to <?php echo $qtnName;?> quiz</font></legend>
        <?php
            $attributes = array('class'=>'form-block col-lg-6 col-lg-push-3','id'=>'','role'=>'form');
            echo form_open('quiz/postQuestion',$attributes);
        ?>

            <div class="form-group margin-10" id="questionError">
                <input type="text" class="form-control" id="question" name="question" placeholder="Question"/>
                <input type="hidden" name="quizid" value="<?php echo $qid;?>">
            </div>
            <div class="form-group margin-10" id="optionsError">
            <textarea class="form-control" placeholder="Question options, Press Enter key after Each option" name="options" cols="60" rows="6" id="options"></textarea>
            </div>
           <div class="form-group margin-10" id="ansError">
                <input type="text" class="form-control" id="correctOption" name="correctOption" placeholder="Correct Option"/>
            </div>
        <div class="form-group margin-10" id="weightError">
                <input type="text" class="form-control" id="weight" name="weight" placeholder="Marks for the question"/>
            </div>
            <div class="margin-10">
                <input type="submit" class="btn btn-primary" name="addQuestion" value="Add Question" id="addQuestion"/><a href='<?php echo base_url();?>index.php/quiz/addQuestions/<?php echo $qid;?>' class="btn btn-default">Cancel</a>
            </div>
        <?php echo form_close();?>
    </fieldset>
</div>
</div>