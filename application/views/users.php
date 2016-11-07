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
        if ($this->uri->segment(2) == "edit_user") {
            $title = "Edit User Details";
            $readonly = "readonly='readonly'";

            $class = $this->session->userdata('e_class');
            if (strlen($class)) {
                $classes = "<select name='class' class='form-control'>";
                $classes .= "<option value='" . strtolower($class) . "'>" . strtoupper($class) . "</option>";
                $class_arr = array(
                    "s1" => "S1",
                    "s2" => "S2",
                    "s3" => "S3",
                    "s4" => "S4",
                    "s5" => "S5",
                    "s6" => "S6",
                );
                unset($class_arr[$class]);
                foreach ($class_arr as $key => $val) {
                    $classes .= "<option value='" . strtolower($key) . "'>" . strtoupper($key) . "</option>";
                }
                $classes .= "</select>";
            } else {
                $classes = '<select name="class" class="form-control">
                        <option value="">-Select Class-</option>
                        <option value="s1">S1</option>
                        <option value="s2">S2</option>
                        <option value="s3">S3</option>
                        <option value="s4">S4</option>
                        <option value="s5">S5</option>
                        <option value="s6">S6</option>
                    </select>';
            }

            if (strlen($this->session->userdata('e_role'))) {
                $role = $this->session->userdata('e_role');
                $arr = explode(",", $role);
                $role = $arr[0];
                $roleid = $arr[1];
                $roles = "<select name='user_role' class='form-control'>";
                $roles .= "<option value='" . $roleid . "'>" . $role . "</option>";
                $role_arr = array(
                    "1" => "Student",
                    "2" => "Teacher",
                    "3" => "Admin",
                );
                unset($role_arr[$roleid]);
                foreach ($role_arr as $key => $val) {
                    $roles .= "<option value='" . $key . "'>" . $val . "</option>";
                }
                $roles .= "</select>";
            }
            $status = '<select name="status" class="form-control">
                        <option value="">-Select Status-</option>
                        <option value="active">Active</option>
                        <option value="inactive">Inactive</option>
                    </select>';
            $btn_val = "Update";
            $btn_name = "edit_user";
        } else {
            $btn_val = "Save";
            $btn_name = "add_user";
            $roles = '<select name="user_role" class="form-control">
                        <option value="">-Select Role-</option>
                        <option value="1">Student</option>
                        <option value="2">Teacher</option>
                        <option value="3">Admin</option>
                    </select>';

            $status = '<select name="status" class="form-control">
                        <option value="">-Select Status-</option>
                        <option value="active">Active</option>
                        <option value="inactive">Inactive</option>
                    </select>';

            $classes = '<select name="class" class="form-control">
                        <option value="">-Select Class-</option>
                        <option value="s1">S1</option>
                        <option value="s2">S2</option>
                        <option value="s3">S3</option>
                        <option value="s4">S4</option>
                        <option value="s5">S5</option>
                        <option value="s6">S6</option>
                    </select>';

            $title = "Register User";
            $readonly = "";
            $data['e_fname'] = "";
            $data['e_lname'] = "";
            $data['e_uname'] = "";
            $data['e_psword'] = "";

            $this->session->set_userdata($data);
        }
        ?>
    </div>
    <div class="col-lg-12 bpm-bottom">
        <fieldset>
            <legend><font color="green"><i class="fa fa-user-plus"></i> <?php echo $title; ?></font></legend>
            <form class="form-block col-lg-6 col-lg-push-3" role="form" method="POST">
                <div class="form-group margin-10">
                    <input type="text" class="form-control" id="email" placeholder="First Name" name="fname" value="<?php echo $this->session->userdata('e_fname'); ?>"/>
                </div>
                <div class="form-group margin-10">
                    <!--<label for="pwd">Password:</label>-->
                    <input type="text" class="form-control" id="pwd" placeholder="Last Name" name="lname" value="<?php echo $this->session->userdata('e_lname'); ?>"/>
                </div>
                <div class="form-group margin-10">
                    <!--<label for="pwd">Password:</label>-->
                    <input <?php echo $readonly; ?> type="text" class="form-control" id="pwd" placeholder="Username" name="uname" value="<?php echo $this->session->userdata('e_uname'); ?>"/>
                </div>
                <div class="form-group margin-10">
                    <?php echo $roles; ?>
                </div>
                <div class="form-group margin-10">
                    <?php echo $classes; ?>
                </div>
                <div class="form-group margin-10">
                    <input type="password" class="form-control" id="email" placeholder="Password" name="psword" value="<?php echo $this->session->userdata('e_psword'); ?>"/>
                </div>
                <div class="form-group margin-10">
                    <input type="password" class="form-control" id="email" placeholder="Confirm Password" name="cpsword" value="<?php echo $this->session->userdata('e_psword'); ?>"/>
                </div>
                <div class="form-group margin-10">
                    <?php echo $status; ?>
                </div>
                <div class="margin-10">
                    <input type="submit" class="btn btn-primary" value="<?php echo $btn_val; ?>" name="<?php echo $btn_name; ?>"/>
                </div>
            </form>
        </fieldset>
    </div>
</div>


