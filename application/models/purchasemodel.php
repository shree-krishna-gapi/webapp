<?php
 class Purchasemodel extends CI_Model {

 	public function get_company(){
		//$this->db->order_by('created_at', 'desc');
		$query = $this->db->get('company');				
			return $query->result();
		
	}

	public function getProduct($company_id){
		$this->db->where('company_id', $company_id);
		$query = $this->db->get('product');
		if($query->num_rows() > 0){
			return $query->result_array();
		}else{
			return false;		
		}	  		
	}

	public function get_stock($company_id,$product_id_multiple) {
		$this->db->where('company_id',$company_id);
		$this->db->where('product_id',$product_id_multiple);
		$q = $this->db->get('product');
		return $q->result();
	}
	public function adding_product($company_id,$product_id_multiple,$new_product_data) {
		$this->db->where('company_id',$company_id);
		$this->db->where('product_id',$product_id_multiple);
		$this->db->update('product',$new_product_data);
	}
	
}