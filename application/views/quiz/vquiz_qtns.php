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
$settings = $this->mquiz->get_quiz_titleid($this->uri->segment(3));
$set = "";
if (is_array($settings) && count($settings)) {
    $html = '<table class="table table-responsive table-striped" id="quizTable">
        <thead>
            <tr>
                <th>Title</th>
                <th>Subject</th>
                <th>Question Count</th>
                <th>Marks per Question</th>
                <th>Start Time</th>
                <th>Duration</th>
                <th>Author</th>
                <th>End Date</th>
                <th>Minutes Left</th>
            </tr>
        </thead>
        <tbody>';
    foreach ($settings as $id => $info) {
        extract($info);
        $subject = $this->msubject->get_subject_byId($subject);
        $html .= "<tr>
                        <td>$title</a></td>
                        <td>$subject</td>
                        <td>$qtnCount</td>
                        <td>Variable</td>
                        <td>$start_time</td>
                        <td>$duration</td>
                        <td>$createdby</td>
                        <td id='endTime'>" . $this->session->userdata("qend_time") . "</td>
                        <td><p id='due_mins'></p></td>
                 </tr>";
    }
    $html .= "</tbody></table>";
    echo $html;
}
//$qtns = $this->session->userdata("q_qtns");
$qtns = $q_qtns;
//print_r($qtns);exit;
if (is_array($qtns) && count($qtns)) {
    $quiz = "";
    $count = 1;
    foreach ($qtns as $id => $data) {
        extract($data);
        $quiz .= "<form method='POST'>
                   <div class='alert alert-info'>$count." . " " . "$question"." ("."$weight"." marks)";
        $options = explode(":", $options);
        $quiz .= "<div>";
        foreach ($options as $option) {
            $quiz .= "<input type='checkbox'  name='option[" . $count . "][]' value='$option" . "_" . "$correct_answer"."_"."$weight"."_"."$id.'/>" . $option . "</br>";
        }
        $quiz .= "<input type='checkbox' checked='true'  name='option[" . $count . "][]' value='NULL" . "_" . "$correct_answer"."_"."$weight.'/>Not Answered</br>";
        $quiz .= "</div>";
        $quiz .= "</div>";
        $count++;
    }
    $quiz .="<input type='hidden' name='quizid' value='$quizid'/>";
    $quiz .= "<input type='submit' name='answer_quiz' value='Answer' class='btn btn-primary'/>";
    $quiz .= "</form>";
    echo $quiz;
} else {
    $failed = $failed["quiz_failed"];
    if (is_array($failed) && count($failed)) {
        $fail_html = '<table class="table table-responsive table-bordered table-striped">
        <thead>
            <tr>
                <th>Question</th>
                <th>Your Answer</th>
                <th>Correct Answer</th>
            </tr>
        </thead>
        <tbody>';
        foreach ($failed as $qtn => $fail_info) {
            foreach ($fail_info as $your_ans => $corr_ans) {
                $fail_html .= "<tr><td>$qtn</td><td>$your_ans</td><td>$corr_ans</td></tr>";
            }
        }
        $fail_html .= "</tbody></table>";
        echo $fail_html;
    }
}
?>

<script type="text/javascript">
        $(document).ready(function () {
        endtime = $("#endTime").html();
        end = endtime.split(" ")
        day = end[0]
        year = end[1]
        month = end[2]
        tym = end[3]
        dat = year + "/" + month + "/" + day + " " + tym
        //alert(dat)
        time = (new Date(dat).getTime()) / 1000;
        currentTime = Math.floor(jQuery.now() / 1000);
        timeRemaining = time - currentTime;
        dueMinutes = Math.ceil(timeRemaining / 60);
        var dueSeconds = 60 * dueMinutes,
                display = $('#due_mins');
        startTimer(dueSeconds, display);
        function startTimer(duration, display) {
            var timer = duration, minutes, seconds;
            setInterval(function () {
                minutes = parseInt(timer / 60, 10);
                seconds = parseInt(timer % 60, 10);

                minutes = minutes < 0 ? "0" : minutes;
                seconds = seconds < 0 ? "0" : seconds;
                dueText = minutes + ":" + seconds
                //if(dueText == "0:0"){
                //$('#elapsed').modal('show');
                //return false;
                //}
                display.text(dueText);

                if (--timer < 0) {
                    timer = duration;
                }
            }, 1000);
        }
    });
</script>

<!-- For a more detailed File Search -->
<div class="modal fade" id="elapsed" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close expiredQuizClose" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel"><font color="blue"><span class="fa fa-exclamation-circle"></span> Quiz expired</font></h4>
            </div>
            <div class="modal-body" id="myFileEditReturned">
                Sorry, the Quiz has expired, kindly contact the person that set it... 

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default expiredQuizClose" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>




