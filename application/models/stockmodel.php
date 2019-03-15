<?php
 class Stockmodel extends CI_Model {

 	public function display_stock() {

		$q=$this->db->get('product');
		if($q->result_array()>0) {
			return $q->result(); 
		}
		else {
			return false;
		}		
 	}

 



 	
}