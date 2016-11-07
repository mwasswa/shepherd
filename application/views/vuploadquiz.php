<?php
if (strlen($success)) {
    echo "<div class='alert alert-success col-lg-12'>$success</div>";
} elseif (strlen($failure)) {
    echo "<div class='alert alert-danger col-lg-12'>$failure</div>";
} else {
    echo '';
}
?>

<div class="col-lg-12 bpm-bottom">
    <fieldset>
        <legend><font color="green"><i class="fa fa-folder-open"></i> Upload questions file</font></legend>
        <form class="form-inline" role="form" method="POST">
            <div class="form-group margin-10">
                <input type="file" class="form-control" id="email" name="quizfile"/>
            </div>
            <div class="margin-10">
                <input type="submit" class="btn btn-primary" name="quiz_fin_btn" value="Finish"/>
            </div>
        </form>
    </fieldset>
</div>