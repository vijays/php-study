<?php

class Login extends MY_Controller {

    public function index() {

      if ( $this->session->userdata('user_id') )
        return redirect('Admin/dashboard');

      $this->load->helper('form');
      $this->load->view('admin/admin_login');
    }

    public function admin_login(){
      $this->load->library('form_validation');

      $this->form_validation->set_rules('uid','User Id','required|alpha|min_length[5]|max_length[8]');
      $this->form_validation->set_rules('pwd','Password','required');

      $this->form_validation->set_error_delimiters("<p class='text-danger'>","</p>");

      if ( $this->form_validation->run() ){
        //Success
        $userid = $this->input->post('uid');
        $passwd = $this->input->post('pwd');
        //echo "userid: $userid and passwd: $passwd";

        $this->load->model('Loginmodel');

        $login_id = $this->Loginmodel->login_validation($userid, $passwd);

        if ( $login_id ) {
          //success
          //echo "Password match";
          //$this->load->library('session');
          $this->session->set_userdata('user_id', $login_id);
          //$this->load->view('admin/dashboard');
          return redirect('Admin/dashboard');
        }
        else {
          //failed
          //echo "Password does not match";
          $this->session->set_flashdata('login_failed', 'Invalid user id / password');
          return redirect('Login');
        }
      }
      else{
        //Fail
        //echo validation_errors();
        $this->load->view('admin/admin_login');
      }
    }

    public function admin_logout() {
      $this->session->unset_userdata('user_id');
      return redirect('Login');
    }
}

?>
