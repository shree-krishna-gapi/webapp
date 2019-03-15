<?php
 class Loginmodel extends CI_Model {

 	public function valid_login( $uname, $pass ) {
 		$query = $this->db->where(['username'=>$uname, 'password'=>$pass])
 							->get('users');
		if($query->num_rows()) {
			return $query->row()->user_id; // only fix data provide
		}
		else {
			return FALSE;
		}
 	}
 }