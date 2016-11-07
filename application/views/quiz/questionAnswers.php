<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
*/


$header= json_decode($information,TRUE);

?>
<div class="row">
    <div class="col-lg-12">
        <legend><font class="myColor"><i class="fa fa-users"></i>Test quiz: <?php echo $header['header']['quiz'];?> , Answers by :<?php echo $header['header']['participant'];?></font></legend>

        <table class="table table-responsive table-bordered table-striped">
            <thead>
            <th>Question</th>
            <th>Answer given</th>
            <th>Correct option</th>
            <th></th>
            </thead>
            <tbody>
                <?php for($i=0; $i<count($header['body']);$i++) {
                    $question = preg_replace( "/\r|\n/", "<br>", $header['body'][$i]['question']);
                    $answer = preg_replace( "/\r|\n/", "", $header['body'][$i]['answer']);
                    $correct = preg_replace( "/\r|\n/", "", $header['body'][$i]['correct']);

                      $true =  strcmp($answer,$correct);
                    ?>
                <tr>
                    <td style="max-width: 150px;"><?php echo $question?></td>
                    <td><?php echo $answer;?></td>
                    <td><?php echo $correct;?></td>
                    <td><?php
                        if($true == 0){
                            echo '<span class="fa fa-check"></span>';
                        }else{
                            echo '<span class="fa fa-close"></span>';
                        }
                    ?></td>
                </tr>



                    <?php }?>
            </tbody>
        </table>
    </div>
</div>
