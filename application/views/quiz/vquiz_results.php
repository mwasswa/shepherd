<?php
$general=$this->mquiz->get_quiz_titleid($this->uri->segment(3));
foreach($general as $id=>$data){
    extract($data);
}
echo "<div class='col-lg-12 alert alert-success'>Results for $title</div>";
if (is_array($results) && count($results)) {
    $html = '<table class="table table-responsive table-bordered table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Score</th>
                <th>Attempted on</th>
                <th>Attempt</th>
            </tr>
        </thead>
        <tbody>';
    $num=1;
    foreach($results as $id=>$info){
        extract($info);
        $link = "href='".base_url()."index.php/quiz/questionAnswers/$quiz_id-$attempt-$user'";
        $name = $this->musers->get_user_namesbyUsername($user);
        $html .= "<tr>
                        <td>$num</td>
                        <td>$name</td>
                        <td>$score%</td>
                        <td><a $link>$date</a></td>
                        <td>$attempt</td>
                        
                 </tr>";
        $num++;
    }
    $html .= "</tbody></table>";
    echo $html;
} else {
    echo '<div class="col-lg-12 alert alert-warning"><i class="fa fa-warning"></i> No one has attempted this quiz yet</div>';
}
?>


