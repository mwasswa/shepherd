<div class="col-lg-12 bpm-bottom">
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
    <div class="col-lg-12">
        <fieldset>
            <legend><font color="green"><i class="fa fa-gears"></i> Settings</font></legend>
            <form class="form-inline" role="form" method="POST">
                <div class="form-group margin-10">
                    <input type="text" class="form-control" id="email" placeholder="Current Year" name="current_year"/>
                </div>
                <div class="form-group margin-10">
                    <!--<label for="pwd">Password:</label>-->
                    <input type="text" class="form-control" id="pwd" placeholder="Current Term" name="current_term"/>
                </div>
                <div class="margin-10">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i>Save</button>
                </div>
            </form>
        </fieldset>
    </div>
</div>

<div class="row">
    <div class="col-lg-4">
        
        <div class="row">
            <div class="col-lg-12">
                <a  class="btn btn-default col-lg-6" href="#"><i class="fa fa-sort"></i>Make Grading system</a>
      
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <a  class="btn btn-default col-lg-6" href="#"><i class="fa fa-sort"></i>Make announcement</a>

            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <a  class="btn btn-default col-lg-6" href="#"><i class="fa fa-sort"></i>Other activity</a>

            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <a  class="btn btn-default col-lg-6" href="#"><i class="fa fa-sort"></i>Other activity</a>

            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <a  class="btn btn-default col-lg-6" href="#"><i class="fa fa-sort"></i>Other activity</a>

            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <a  class="btn btn-default col-lg-6" href="#"><i class="fa fa-sort"></i>Other activity</a>

            </div>
        </div>

    </div>

</div>