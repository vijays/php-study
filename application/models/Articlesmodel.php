<?php

class Articlesmodel extends CI_Model {

  private $_num_rows = 0;
  private $_count_of_all_articles = 0;

  function list_articles( $limit, $offset ) {

    $user_id = $this->session->userdata('user_id');

    $query = $this->db
                      ->select('id, title')
                      ->from('articles')
                      ->where('uid', $user_id)
                      ->limit($limit, $offset)
                      ->get();

    $this->_num_rows = $query->num_rows();

    return $query->result();
  }

  public function add_article($array) {
    return $this->db->insert('articles', $array);
  }

  public function find_article($article_id) {
    $q = $this->db->select('id, title, body')
                  ->where('id',$article_id)
                  ->get('articles');
    return $q->row();
  }

  public function update_article( $article_id, $article) {
    return $this->db->update('articles', $article, "id=$article_id");
  }

  public function delete_article( $article_id) {
    return $this->db->delete('articles', "id=$article_id");
  }

  public function num_rows() {
    return $this->_num_rows;
  }

  function list_all_articles( $limit, $offset ) {

    $query = $this->db
                      ->select('id, title')
                      ->from('articles')
                      ->limit($limit, $offset)
                      ->get();

    $this->_count_of_all_articles = $query->num_rows();

    return $query->result();
  }

  public function count_of_all_articles() {
    return $this->_count_of_all_articles;
  }

  public function search($query) {
    $q = $this->db->from('articles')
                  ->like('title', $query)
                  ->get();
    return $q->result();
  }
}

?>
