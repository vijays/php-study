<?php

class Articlesmodel extends CI_Model {

  function list_articles() {

    $user_id = $this->session->userdata('user_id');

    $query = $this->db
                      ->select('id, title')
                      ->from('articles')
                      ->where('uid', $user_id)
                      ->get();

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
}

?>
