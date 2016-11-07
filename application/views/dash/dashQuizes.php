<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

?>
<legend><font class="myColor"><i class="fa fa-dashboard"></i>Dashboard</font></legend>
<div class="row">
    <div class="col-md-12">
        <a href="<?php echo base_url() ?>/index.php/dash/dashBoard"><-Back</a>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <?php
            if($quizes == 'false'){
                echo '<h4>No quizes set for subject</h4>';
            }else{
                $html = '<table class="table table-striped">';
                foreach($quizes as $quiz){
                    $url = base_url().'/index.php/dash/getQuizStats/'.$quiz->id;
                    $html .='<tr><td><a href="'.$url.'">'.$quiz->title.'</a></td></tr>';
                }
                $html.='</table>';

                echo $html;
            }
        ?>

    </div>
</div>