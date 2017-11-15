<?php

class Admin extends MY_Controller {

  public function __construct(){
    parent::__construct();

    if ( !$this->session->userdata('user_id') )
      return redirect('Login');
  }

  public function index() {
      echo "in Admin";
  }

  public function login(){
    $this->load->view('admin/admin_login');
  }

  public function dashboard(){

    $this->load->model('Articlesmodel', 'articles');
    $articleslist = $this->articles->list_articles();

    $this->load->view('admin/dashboard', ['articleslist'=>$articleslist]);
  }

  public function add_article() {
    //if ( $this->input->post() ){
      //form validation
    //}
    //else {
      $this->load->helper('form');
      $this->load->view('admin/add_article');
    //}
  }

  public function store_article() {
    $this->load->library('form_validation');
    if ( $this->form_validation->run('add_article_rules')) {
      $posted_vars = $this->input->post();
      unset($posted_vars['submit']);
      $this->load->model('Articlesmodel', 'articles');
      if ($this->articles->add_article($posted_vars)) {
        //insert successful
        echo "Insert successful" ;
      }
      else {
        //insert failed
        echo "Insert failed" ;
      }
    }
    else {
      return redirect('Admin/add_article');
    }
  }

  public function edit_article() {

  }

  public function delete_article() {

  }
}

?>
