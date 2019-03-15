<?php
 class Salesmodel extends CI_Model {

 	public function display_customer() {
		$query = $this->db->get('customer');
		if($query->result_array()>0){
			return $query->result();
		}
		else {
			return false;
		}
		
 	}
 	public function display_company() {
		$query = $this->db->get('company');
		if($query->result_array()>0){
			return $query->result();
		}
		else {
			return false;
		}
		
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
	public function stockDataCheck($company_id,$product_id) {
		$this->db->where('company_id', $company_id);
		$this->db->where('product_id', $product_id);
		$query = $this->db->get('product');
		if($query->num_rows()>0) {
			return $query->row();
		}else {
			return false;
		}

	}
	// if customer id && company id is = then sales_info not insert again
	public function sales_info_model($sales_info,$company_id,$customer_id){
		$this->db->where('company_id',$company_id);
		$this->db->where('customer_id',$customer_id);
		$get_sales_info = $this->db->get('sales_info');
		if($get_sales_info->num_rows()>0) {
			$result = $get_sales_info->row();
			return $result->sales_id; 
		}
		else {
			$this->db->insert('sales_info',$sales_info);
			$last_sales_id = $this->db->insert_id();
			return $last_sales_id;
		}
	}

	public function sales_transact_model($sales_transact){
		$this->db->insert('sales_transact',$sales_transact);
	}

	public function total_transact($cr_transact) {
		$this->db->insert('total_transact',$cr_transact);
		
	}

	public function sales_item_details($sales_item_details){
		$this->db->insert('sales_item_details',$sales_item_details);
		
	}
	

	public function sales_stock($product_id){
		$this->db->where_in('product_id',$product_id);
		$get_stock=$this->db->get('product');
		if($get_stock->num_rows()>0) {			
			return $get_stock->result();	 
		}
	}
	public function minus_stock($m_data,$sid){
		$this->db->where_in('product_id',$sid);
		$update_query= $this->db->update('product',$m_data);
		if($update_query) {
			return true;
		}
		else {
			return false;
		}
		//$this->db->insert('stock',$m_data);
	}
	public function payment_at_sales($payment_detail) {
		$this->db->insert('payment',$payment_detail);
	}
}