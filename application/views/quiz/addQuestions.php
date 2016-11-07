<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
//echo $quizName;
?>
<div class="row">
    <div class="col-lg-12">
    <fieldset>
        <legend><font color="green"><i class="fa fa-edit"></i><span style="text-align:center">Questions in <?php echo $quizName;?> Quiz</span></font></legend>
       <div class="row">
        <div class="col-lg-1">
            <a class="btn btn-default" href='<?php echo base_url();?>index.php/quiz/addQuestion/<?php echo $quiz_id;?>' id="addQuestion">Add Question</a>
        </div>
    </div>    
        <div class="col-lg-12">
           <table class='table table-responsive table-striped' id="displayQuestions">
            <thead>
            <th>Question</th>
            <th>Options</th>
            <th>Correct option</th>
            <th>Marks</th>
            <th colspan="2">Operations</th>
            </thead>
       
            <tbody>
                <?php
                if($questions){
                foreach($questions as $question){ ?>
                                <tr>
                    <td class="col-lg-4"><?php echo $question->question;?></td>
                    <td class="col-lg-4"><?php
                    $info = explode(":", $question->options);
                     //count($info);
                    echo '<ol>';
                     for($i=0;$i<count($info);$i++){
                         echo '<li>'.$info[$i].'</li>';
                     }

                     echo '</ol>';
                    
                    ?></td>
                    <td><?php echo $question->correct_answer;?></td>
                    <td><?php echo $question->weight;?></td>
                    <td><a href='<?php echo base_url();?>index.php/quiz/editQuestion/<?php echo $question->id;?>' title="Edit Question"><li class="fa fa-edit"></li></a></td>
                    <td><a href='<?php echo base_url();?>index.php/quiz/deleteQuestion/<?php echo $question->id."/".$question->titleid;?>' title="Delete Question"><li class="fa fa-trash"></li></a></td>
                </tr>
               <?php }}else{
                   redirect('/quiz/addQuestion/'.$quiz_id);}?>

            </tbody>
             </table>
        </div>
    
</fieldset>
</div>
</div>
