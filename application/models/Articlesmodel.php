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
}

?>
