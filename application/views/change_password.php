<div class="col-lg-12">
    <div class="col-lg-12">
        <?php
        if (strlen($success)) {
            echo "<div class='alert alert-success col-lg-12'>$success</div>";
        } elseif (strlen($failure)) {
            echo "<div class='alert alert-danger col-lg-12'>$failure</div>";
        } else {
            echo '';
        }
        ?>
    </div>
    <div class="col-lg-12 bpm-bottom">
        <fieldset>
            <legend><font color="green"><i class="fa fa-pencil"></i> Change Password</font></legend>
            <form class="form-inline" role="form" method="POST">
                <div class="form-group margin-10">
                    <input type="password" class="form-control" id="email" placeholder="Current Password" name="old_psword"/>
                </div>
                <div class="form-group margin-10">
                    <input type="password" class="form-control" id="pwd" placeholder="New Password" name="new_psword"/>
                </div>
                <div class="form-group margin-10">
                    <input type="password" class="form-control" id="pwd" placeholder="Re-type New Password" name="cnew_psword"/>
                </div>
                <div class="margin-10">
                    <input type="submit" class="btn btn-primary" value="Change Password" name="change_password"/>
                </div>
            </form>
        </fieldset>
    </div>
</div>

