<?php

class Admin extends MY_Controller {

  public function __construct(){
    parent::__construct();

    if ( !$this->session->userdata('user_id') )
      return redirect('Login');

    $this->load->model('Articlesmodel', 'articles');
    $this->load->helper('form');
  }

  public function index() {
      echo "in Admin";
  }

  public function login(){
    $this->load->view('admin/admin_login');
  }

  public function dashboard(){

    $this->load->library('pagination');

    $config = [
      'base_url' => base_url('Admin/dashboard'),
      'per_page' => 5,
      'total_rows' => $this->articles->num_rows(),
    ];

    $this->pagination->initialize($config);

    $articleslist = $this->articles->list_articles( $config['per_page'], $this->uri->segment(3) );

    $this->load->view('admin/dashboard', ['articleslist'=>$articleslist]);
  }

  public function add_article() {
    //if ( $this->input->post() ){
      //form validation
    //}
    //else {
      $this->load->view('admin/add_article');
    //}
  }

  public function store_article() {
    $this->load->library('form_validation');
    if ( $this->form_validation->run('add_article_rules')) {
      $posted_vars = $this->input->post();
      unset($posted_vars['submit']);

      $this->_flashdata_and_redirect(
        $this->articles->add_article($posted_vars),
        'Article added successfully.',
        'Failed to insert article, please try again.'
      );

    }
    else {
      return redirect('Admin/add_article');
    }
  }

  public function edit_article($article_id) {
    $data['article'] = $this->  articles->find_article($article_id);
    //echo "<pre>";
    //print_r($article);
    //$this->load->view('admin/edit_article', ['article', $article]);
    $this->load->view('admin/edit_article',$data);
  }

  public function delete_article() {
    $article_id = $this->input->post('article_id');

    $this->_flashdata_and_redirect(
      $this->articles->delete_article($article_id),
      'Article deleted successfully.',
      'Failed to delete article, please try again.'
    );

  }

  public function update_article() {
    $this->load->library('form_validation');
    if ( $this->form_validation->run('add_article_rules')) {
      $posted_data = $this->input->post();
      $article_id = $posted_data['article_id'];
      unset($posted_data['submit'], $posted_data['article_id']);

      $this->_flashdata_and_redirect(
        $this->articles->update_article($article_id, $posted_data),
        'Article updated successfully.',
        'Failed to update article, please try again.'
      );

    }
    else {
      return redirect('Admin/edit_article'.$article_id);
    }
  }

  private function _flashdata_and_redirect($operation, $successMessage, $failureMessage) {
    if ($operation) {
      $this->session->set_flashdata('feedback', $successMessage);
      $this->session->set_flashdata('feedback_class', 'alert-success');
    }
    else {
      $this->session->set_flashdata('feedback', $failureMessage);
      $this->session->set_flashdata('feedback_class', 'alert-danger');
    }
    return redirect('Admin/dashboard');
  }
}

?>
