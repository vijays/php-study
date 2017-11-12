<?php

  class Loginmodel extends CI_Model{

    public function login_validation ($userid, $passwd){
      //$q = $this->db->query('Select ...');
      $q = $this->db->where(['uid'=>$userid,'pwd'=>$passwd])
                    ->get('users');

      if ( $q->num_rows() ){
        return TRUE;
      } else{
        return FALSE;
      }
    }
  }

?>
