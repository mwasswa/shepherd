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
                    <th>Quesiton</th>
                    <th>Topic</th>
                    <th>Teahcer asked</th>
                    <th>Last Response</th>
                    <th>Open</th>
                </tr>
            </thead>
            <tbody>

                <?php
                foreach($myQuestions as $question) {?>
                <tr>
                    <td style="max-width: 300px"><?php echo $question->question;?></td>
                    <td><?php echo $question->topic;?></td>
                    <td><?php echo $question->receipient;?></td>
                    <td><?php echo $question->created;?></td>
                    <td><a class="btn btn-defaulf questionResponse" href="<?php echo $question->id;?>"><li class="fa fa-folder-open"></li></a><!--<span class="alertQuestion" >3</span> --> </td>
                </tr>
                    <?php } ?>
            </tbody>
        </table>

        <div class="row " id="questionReplies">
            <div class="col-md-12">
                <div class="row" id="questionResponseResults">
                    
                </div>
                
                <div class="row" style="margin-top:10px;">

                    <div class="col-lg-6">
                        <div class="row">
                            <div classs="col-lg-6">
                                <textarea class="form-control" id="responseText" placeholder="Respond to Quesiton" cols="120" rows="4" name="questionResponse"></textarea>
                                <input type="hidden" id="qid" name="">
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-lg-1">
                                <a class="btn btn-default backQuestionLink" href="#"><li class="fa fa-arrow-left"></li> Back</a>
                            </div>
                            <div class="col-lg-1 col-lg-push-6">
                                <a class="btn btn-default respondQuestionLink" id="respondQuestionLink" href="#">Send Response <li class="fa fa-arrow-right"></li></a>
                            </div>

                        </div>


                    </div>

                </div>

            </div>

        </div>
    </fieldset>
</div>
