<?php
if (strlen($success)) {
    echo "<div class='alert alert-success col-lg-12'>$success</div>";
} elseif (strlen($failure)) {
    echo "<div class='alert alert-danger col-lg-12'>$failure</div>";
} else {
    echo '';
}
?>
<?php

$quiz = $quizzes;
//print_r($quiz);exit;
 //$now = date("Y-m-d H:i");
 //echo $now;
if (is_array($quiz) && count($quiz)) {
    $html = '<table class="table table-responsive table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Expiry</th>
                <th>Title</th>
                <th>Questions</th>
                <th>Subject</th>
                <th>Year</th>                
                <th>Term</th>
                <th>Set by</th>';
    if($this->session->userdata("urole")!="student") {
        $html .= "<th>Results</th>";
    }
    $html .='</tr>
        </thead>
        <tbody>';
    $num=1;
    foreach($quiz as $id=>$info) {
        extract($info);
        $subjectName = $this->msubject->get_subject_byId($subject);
        $qtns = $this->mquiz->getNumberOfQuestions($id);
        $start_date = $date . " " . $start_time . ":00";
        $end_time = date("d Y m H:i:s", strtotime($start_date) + (intval($duration) * 3600));
        $creat = $this->musers->get_user_namesbyUsername($createdby);
        // $subject = $this->mgeneral->getSubject($subject);
        $html .= "<tr>
                        <td>$num</td>
                        <td><a class='timer' href = ".  base_url()."index.php/welcome/quiz/$id/$end_time"." value=".$end_time.">$end_time</a></td>
                        <td>$title</td>
                        <td>$qtns</td>
                        <td>$subjectName</td>
                        <td>$year</td>                        
                        <td>$term</td>
                        <td style='display:none' id='endTime'>$end_time</td>
                        <td>$creat</td>";
        if($this->session->userdata("urole") != "student") {
            $html .= "<td><a href='".  base_url()."index.php/welcome/quiz_results/$id'>View Results</a></td>";
        }
        $html .="</tr>";
        $num++;
    }
    $html .= "</tbody></table>";
    echo $html;
} else {
    echo '<div class="col-lg-12 alert alert-warning"><i class="fa fa-warning"></i> No quizzes set yet</div>';
}
?>
