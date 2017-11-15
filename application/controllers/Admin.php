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
        $this->session->set_flashdata('feedback','Article added successfully.');
      }
      else {
        //insert failed
        $this->session->set_flashdata('feedback','Failed to insert article, please try again.');
      }
      return redirect('Admin/dashboard');
    }
    else {
      return redirect('Admin/add_article');
    }
  }

  public function edit_article($article_id) {
    $this->load->model('Articlesmodel', 'articles');
    $data['article'] = $this->  articles->find_article($article_id);
    //echo "<pre>";
    //print_r($article);
    $this->load->helper('form');
//    $this->load->view('admin/edit_article', ['article', $article]);
    $this->load->view('admin/edit_article',$data);
  }

  public function delete_article() {
    $article_id = $this->input->post('article_id');
    $this->load->model('Articlesmodel', 'articles');

    if ($this->articles->delete_article($article_id)) {
      //delete successful
      $this->session->set_flashdata('feedback','Article deleted successfully.');
    }
    else {
      //delete failed
      $this->session->set_flashdata('feedback','Failed to delete article, please try again.');
    }
    return redirect('Admin/dashboard');

  }

  public function update_article() {
    $this->load->library('form_validation');
    if ( $this->form_validation->run('add_article_rules')) {
      $posted_data = $this->input->post();
      $article_id = $posted_data['article_id'];
      unset($posted_data['submit'], $posted_data['article_id']);
      $this->load->model('Articlesmodel', 'articles');
      if ($this->articles->update_article($article_id, $posted_data)) {
        //insert successful
        $this->session->set_flashdata('feedback','Article updated successfully.');
      }
      else {
        //insert failed
        $this->session->set_flashdata('feedback','Failed to update article, please try again.');
      }
      return redirect('Admin/dashboard');
    }
    else {
      return redirect('Admin/edit_article'.$article_id);
    }
  }
}

?>
