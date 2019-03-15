<?php
 class Customermodel extends CI_Model {

 	public function display_customer() {

		$q=$this->db->get('customer');
		if($q->result_array()>0) {
			return $q->result(); 
		}
		else {
			return false;
		}		
 	}

 	public function customer_registration($post) {
 		$qry = $this->db->insert('customer',$post); 		
	}
	
	public function editcustomer(){
		$customer_id = $this->input->get('customer_id');
		$this->db->where('customer_id', $customer_id);
		$query = $this->db->get('customer');
		if($query->num_rows() > 0){
			return $query->row();
		}else{
			return false;
		}
	}
	public function updatecustomer($update_customer_info,$customer_id) {	
		
		$this->db->where('customer_id', $customer_id);
		$query=$this->db->update('customer',$update_customer_info);
		if($query){
			return true;
		}else{
			return false;
		}
	}

	// public function customer_payment() {
 		
	// 	$this->db->select('*');
	// 	$this->db->from('total_transact');
	// 	$this->db->join('sales_info', 'sales_info.sales_id = total_transact.total_transact_id');
		 
	// 	$query = $this->db->get();
	// 	if($query->num_rows()>0) {
	// 		return $query->result();
	// 	}
	// 	else {
	// 		return false;
	// 	}

 // 	}
	public function customer_payment() {
 		
		$this->db->select('*');
		$this->db->from('payment');
		$this->db->join('sales_info', 'sales_info.sales_id = payment.payment_id');
		 
		$query = $this->db->get();
		if($query->num_rows()>0) {
			return $query->result();
		}
		else {
			return false;
		}

 	}
 	public function get_payment($customer_id,$company_id,$sales_id) {
 		$this->db->where('customer_id',$customer_id);
 		$this->db->where('company_id',$company_id);
 		$this->db->where('sales_id',$sales_id);
 		$query=$this->db->get('payment');
 		if($query->num_rows()>0) {
 			return $query->row(); 
		}
		else {
			return false;
		}
 	}
 	function update_payment($onthisid,$actual_amount) {
 		$this->db->set('cr_amount',$actual_amount);
 		$this->db->where('payment_id', $onthisid);
 		$this->db->update('payment');
 		if($query){
			return true;
		}else{
			return false;
		}
 	}
 	public function insert_to_repayment($repayment) {
 		$qry = $this->db->insert('repayment',$repayment); 		
	} 	


}