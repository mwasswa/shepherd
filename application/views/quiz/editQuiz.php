<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

?>
<div class="col-lg-12">
     <fieldset>
         <div class="col-lg-12 bpm-bottom">
   <?php $this->load->view('special/questionsSearch');?>
         </div>
        <table class='table table-responsive table-striped' id="displayQuestions">
            <thead>
                <tr>
                    <th>Expiary</th>
                    <th>Title</th>
                    <th>Subject</th>
                    <th>Created by</th>
                    <th>Status</th>
                    <th colspan="3">Operations</th>
                </tr>
            </thead>
            <tbody>

                <?php
                if($results){
                foreach($results as $question) {?>
                <tr>
                    <td style="max-width: 300px"><?php echo $question->date;?></td>
                    <td><?php echo $question->title;?></td>
                    <td><?php echo $this->msubject->get_subject_byId($question->subject);?></td>
                    <td><?php echo $question->createdby;?></td>
                    <td>
                        <?php
                        if ($question->active){ ?>
                        <a href='<?php echo base_url();?>index.php/quiz/changeActive/<?php echo $question->id;?>'>Deactivate</a>
                       <?php }else{ ?>
                        <a href='<?php echo base_url();?>index.php/quiz/changeActive/<?php echo $question->id;?>'>Activate</a>
                      <?php  }
                        ?>
                    </td>
                    <td style="max-width: 5px"><a   href='<?php echo base_url();?>index.php/quiz/editQuizSetup/<?php echo $question->id;?>'><li class="fa fa-edit" title="Edit Quiz"></li></a></td>
                    <td style="max-width: 5px"><a href='<?php echo base_url();?>index.php/quiz/addQuestions/<?php echo $question->id;?>'><li class="fa fa-plus" title="Add questions to Quiz"></li></a></td>
                                        <td style="max-width: 5px"><a href='<?php echo base_url();?>index.php/quiz/deleteQuiz/<?php echo $question->id;?>'><li class="fa fa-trash" title="Delete Quiz"></li></a></td>
                </tr>
                    <?php } }else{?>
                <tr><td colspan="5"><font color ="blue">No quiz set yet</font></td></tr>
                <?php }?>
            </tbody>
        </table>

        
    </fieldset>
</div>
