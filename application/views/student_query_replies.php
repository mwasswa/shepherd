<div class="col-lg-12 bpm-bottom">
    <fieldset>
        <legend><font color="green"><i class="fa fa-pencil"></i> Question Responses</font></legend>
            <?php
                $qtn = $stdQtn;
                echo "<div class='alert alert-info col-lg-12'>$qtn</div>";
            ?>
    </fieldset>
</div>
<?php
$stdQueryReplies = $qReplies;
if (is_array($stdQueryReplies) && count($stdQueryReplies)) {
    //$data[$id][$created] = $reply;
    $html = "";
    foreach ($stdQueryReplies as $id => $info) {
        foreach ($info as $created => $response) {
            $html .="<div class='alert alert-success col-lg-12'>$created - $response</div>";
        }
    }
} else {
    $html = "<div class='alert alert-warning col-lg-12'>No responses have been posted for this query yet</div>";
}
echo $html;
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

