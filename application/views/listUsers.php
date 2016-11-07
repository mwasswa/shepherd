<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */


?>
<div class="col-lg-12 bpm-bottom">
        <?php //echo $form;
        $this->load->view('special/searchUsers');;?>
    </div>

<div class="row">
<div class="col-lg-12">
    <?php
    $users_arr = $sys_users;
    //$data[$id][$username][$firstname][$role]= $lastname;
    $users = '<table class="table table-responsive table-bordered table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Username</th>
                <th>Name</th>
                <th>Role</th>
                <th colspan="2">Actions</th>
                <!--<th><i class="fa fa-plus-circle"></i></th>-->
            </tr>
        </thead>
        <tbody>';
    if (is_array($users_arr) && count($users_arr)) {
        foreach ($users_arr as $id => $info) {
            foreach ($info as $uname => $info1) {
                foreach ($info1 as $fname => $info2) {
                    foreach ($info2 as $role => $lname) {
                        $users .= "<tr>
                <td>$id</td>
                <td>$uname</td>
                <td>" . ucfirst($fname) . " " . ucfirst($lname) . "</td>
                <td>$role</td>
                <td class='green-font'><a href='" . base_url() . "index.php/welcome/edit_user/$id'><i class='fa fa-edit'></i></a></td>
                <td class='red-font'><a href='" . base_url() . "index.php/welcome/delete_user/$id'><i class='fa fa-trash'></i></a></td>
            </tr>";
                    }
                }
            }
        }
        $users .="</tbody></table>";
        echo $users;
    }
    ?>
</div>
</div>
<?php
echo "<div>" . $this->pagination->create_links() . "</div>";
?>