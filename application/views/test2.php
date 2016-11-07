<?php

$videos = array(
    "Finance" => array(
        "Invoices" => array(
            "Test" => array(
                "TestItem" => "TestItems"
            )
        )
    )
);
foreach ($videos as $subject => $info) {
    $menu = '<h3>' . strtoupper($subject) . '</h3><div>';
    foreach ($info as $topic => $info2) {
        $menu .= '<ul class="collapsibleList"><li>' . ucfirst($topic) . '<ul>';
        foreach ($info2 as $id => $info3) {
            foreach ($info3 as $desc => $path) {
                $subject = strtolower($subject);
                $video = array("video_selected_" . "$id" => TRUE, "vpath_$id" => $path, "vsub_$id" => $subject, "vdesc_$id" => $desc);
                //$this->session->set_userdata($video);
                $menu .="<li><a href='index.php/welcome/user_login/$id'>" . $path . '</a></li>';
            }
        }
        $menu .= '</ul></li></ul>';
    }
    $menu .='</div>';
    echo $menu;
}
?>