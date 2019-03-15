<?php
 class Companymodel extends CI_Model {

 	public function display_company() {

		$q=$this->db->get('company');
		if($q->result_array()>0) {
			return $q->result(); 
		}
		else {
			return false;
		}		
 	}

 	public function company_registration($post) {
 		$qry = $this->db->insert('company',$post); 		
	 } 
	public function product_registration($data) {
		$this->db->insert('product',$data);
	}

	public function editcompany(){
		$company_id = $this->input->get('company_id');
		$this->db->where('company_id', $company_id);
		$query = $this->db->get('company');
		if($query->num_rows() > 0){
			return $query->row();
		}else{
			return false;
		}
	}
	public function updatecompany($update_company_info,$company_id){
	
		
		$this->db->where('company_id', $company_id);
		$query=$this->db->update('company',$update_company_info);
		if($query){
			return true;
		}else{
			return false;
		}
	}
 	// public function updatecompany($update_company_info,$company_id){		
	// 	$this->db->where('company_id', $company_id);
	// 	$query=$this->db->update('company',$update_company_info);
	// 	if($query){
	// 		return true;
	// 	}else{
	// 		return false;
	// 	}
	// }
	// public function check_product($company_id,$product_id) {
	// 			return $this->db->select('*')->where(['company_id'=>$company_id,'product_id'=>$product_id])
	// 							->get('product')
	// 							->row_array();	
	// }

	// public function stock_book_record($stock_book,$product_id) {		
	// 	$this->db->where('product_id', $product_id);
	// 	$query=$this->db->update('product',$stock_book);		
	// 	if($query) {
	// 		//$this->db->query($sql, array($value, $id));
	// 		return true;
	// 	}
	// 	else {
	// 		return false;
	// 	}	
	// }

	// public function editcompany(){
	// 	$company_id = $this->input->get('company_id');
	// 	$this->db->where('company_id', $company_id);
	// 	$query = $this->db->get('company');
	// 	if($query->num_rows() > 0){
	// 		return $query->row();
	// 	}else{
	// 		return false;
	// 	}
	// }

	// public function get_company_info($company_id) { 		
	// 	$this->db->where("company_id",$company_id);		
	// 	$query = $this->db->get('company');	
  	// 	return $row=$query->row_array();	
	// }

	// public function get_product_item($company_id) { 		
	// 	$this->db->where("company_id",$company_id);		
	// 	$queryy = $this->db->get('product');	
  	// 	if($queryy->num_rows() > 0){
	// 		return $queryy->result_array();  //for multiple selected row get by id
	// 	}else{
	// 		return false;
	// 	}
	// }
	// public function get_product_itemm(){ 
		
			
	// 	$queryy = $this->db->get('product');
	
 //  		if($queryy->num_rows() > 0){
	// 		return $queryy->result_array();  //for multiple selected row get by id
	// 	}else{
	// 		return false;
	// 	}

	// }
	// public function product_register_model($post_data) {
	// 	$this->db->insert('product',$post_data);
	// 	//$last_id=$this->db->insert_id();
	// 	//return $last_id;

	// }

	// public function product_stock_register($post_product_into_stock) {
	// 	$this->db->insert('stock',$post_product_into_stock);
	// }
	


	 // Get Data By Using Ajax
	//  public function getStockData() {
	//  	//$company_id = $this->input->get($product_id);
	//  	$this->db->where('product_id',$company_id);
	//  	$this->db->get('product');
	//  	if($query->num_rows()>0){
	//  		return $query->row();
	//  	}
	//  	else {
	//  		return false;
	//  	}


	//  }

	// public function ggggg($company_id,$rr) {
	// 	$this->db->where('company_id',$company_id);
	// 	$this->db->where('product_id',$rr);
	// 	$q = $this->db->get('product');
	// 	return $q->result();
	// }
	// public function adding_product($company_id,$rr,$new_product_data) {
	// 	$this->db->where('company_id',$company_id);
	// 	$this->db->where('product_id',$rr);
	// 	$this->db->update('product',$new_product_data);
	// }
	  // public function getComplexData() {
	 	// $product_id = $this->input->get('product_id');
	 	// $this->db->where('stock_id',$product_id);
	 	// $query = $this->db->get('stock');
	 	// if($query->num_rows() > 0){
	 	// 	return $query->row();
	 	// }

	 	// else {
	 	// 	return false;
	 	// }


	 
	
  		//return $row=$query->row_array();


	 //}
	// public function new_product_register($data) {
	// 	$this->db->insert('product',$data);
	// }

 }