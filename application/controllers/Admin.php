<?php

class Admin extends MY_Controller {

    public function index() {
        echo "in Admin";
    }

    public function dashboard(){
      $this->load->view('admin/dashboard');
    }
    public function login(){
      $this->load->view('admin/admin_login');
    }
}

?>
