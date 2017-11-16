<?php

class User extends MY_Controller {

    public function index() {

      $this->load->model('Articlesmodel', 'articles');

      $this->load->library('pagination');

      $config = [
        'base_url' => base_url('User/index'),
        'per_page' => 5,
        'total_rows' => $this->articles->count_of_all_articles(),
        'full_tag_open' => "<ul class='pagination'>",
        'full_tag_close' => "/ul",
        'first_tag_open' => "<li>",
        'first_tag_close' => "</li>",
        'prev_tag_open' => "<li>",
        'prev_tag_close' => "</li>",
        'next_tag_open' => "<li>",
        'next_tag_close' => "</li>",
        'num_tag_open' => "<li>",
        'num_tag_close' => "</li>",
        'cur_tag_open' => "<li class='active'><a>",
        'cur_tag_close' => "</a></li>",
      ];

      $this->pagination->initialize($config);

      $articleslist = $this->articles->list_all_articles( $config['per_page'], $this->uri->segment(3));

      //moved autoload helper url, html in config
      //$this->load->helper('url');
      //$this->load->helper('html');
      $this->load->view('user/articles_list', compact('articleslist'));
    }

    public function search() {
      //$this->load->library('form_validation');
      //$this->form_validation->set_rules('query', 'Query');

      //if ( !$this->form_validation->run() ) {
        //$this->index() ;
      //}
      $query = $this->input->post('query');

      $this->load->model('Articlesmodel', 'articles');
      $articleslist = $this->articles->search($query);
      $this->load->view('user/search_results', compact('articleslist'));

    }
}
?>
