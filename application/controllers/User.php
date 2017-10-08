<?php

class User extends CI_Controller {

    public function index() {

        //moved autoload helper url, html in config
        //$this->load->helper('url');
        //$this->load->helper('html');
        $this->load->view('user/articles_list');
    }
}
?>
