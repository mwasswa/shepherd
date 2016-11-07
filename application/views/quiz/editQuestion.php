<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

?>
<div class="row">
    <div class="col-lg-12 bpm-bottom">
    <fieldset>
        <?php foreach($question as $qtn){?>
        <legend><font color="green"><i class="fa fa-folder-open"></i>Editing : <?php echo $qtn->question;?></font></legend>
        <?php
            $attributes = array('class'=>'form-block col-lg-6 col-lg-push-3','id'=>'','role'=>'form');
            echo form_open('quiz/postQuestionEdit',$attributes);
        ?>

            <div class="form-group margin-10" id="questionError">
                <input type="text" class="form-control" id="question" name="question" placeholder="Question" value="<?php echo $qtn->question;?>"/>
                <input type="hidden" name="qtnid" value="<?php echo $qtn->id;?>">
                <input type="hidden" name="quizid" value="<?php echo $qtn->titleid;?>">
            </div>
            <div class="form-group margin-10" id="optionsError">
            <textarea class="form-control" placeholder="Question options, Press Enter key after Each option" name="options" cols="60" rows="6" id="options"><?php echo $qtn->options;?></textarea>
            </div>
           <div class="form-group margin-10" id="ansError">
                <input type="text" class="form-control" id="correctOption" name="correctOption" placeholder="Correct Option" value="<?php echo $qtn->correct_answer;?>"/>
            </div>
         <div class="form-group margin-10" id="weightError">
                <input type="text" class="form-control" id="weight" name="weight" placeholder="Marks for the question" value="<?php echo $qtn->weight;?>"/>
            </div>
            <div class="margin-10">
                <input type="submit" class="btn btn-primary" name="addQuestion" value="Update" id="addQuestion"/><a href='<?php echo base_url();?>index.php/quiz/addQuestions/<?php echo $qtn->titleid;?>' class="btn btn-default">Cancel</a>
            </div>
        <?php echo form_close();?>
        <?php }?>
    </fieldset>
</div>
</div>

