<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 * Created by Joshua Waiswa
 * jwaiswa7@gmail.com
*/
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class users extends CI_Controller {

    function index() {
        //Lists all users of the system
        $url = base_url() . "index.php/users";
        $total_records = count($this->musers->get_users());
        $config = $this->paginate($url, $total_records);
        $this->pagination->initialize($config);
        $data = $this->get_videos();
        $data['sys_users'] = $this->musers->get_users($config['per_page'], $this->uri->segment(3));
        $this->template->load('default', 'listUsers', $data);
    }
    public function paginate($url, $total_records) {
        $config['base_url'] = $url;
        $config['total_rows'] = $total_records;
        $config['per_page'] = 20;
        $config['num_links'] = ceil($config['total_rows'] / $config['per_page']);

        $config['full_tag_open'] = "<ul class='pagination'>";
        $config['full_tag_close'] = "</ul>";
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
        $config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";


        $config['next_tag_open'] = "<li>";
        $config['next_tagl_close'] = "</li>";
        $config['prev_tag_open'] = "<li>";
        $config['prev_tagl_close'] = "</li>";
        $config['first_tag_open'] = "<li>";
        $config['first_tagl_close'] = "</li>";
        $config['last_tag_open'] = "<li>";
        $config['last_tagl_close'] = "</li>";
        return $config;
    }
    public function get_videos() {
        $videos = $this->mvideo->get_videos();
        $data['videos'] = $videos;
        return $data;
    }

}
?>
