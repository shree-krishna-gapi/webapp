<?php
 class Paymentmodel extends CI_Model {

 	public function customer() {
 		
		$this->db->select('*');
		$this->db->from('total_transact');
		$this->db->join('sales_info', 'sales_info.sales_id = total_transact.total_transact_id');
		 
		$query = $this->db->get();
		if($query->num_rows()>0) {
			return $query->result();
		}
		else {
			return false;
		}

 	}
 	
 	public function pre_paid_data($pre_paid_data) {
 		$this->db->where('total_transact_id',$pre_paid_data);
 		$query = $this->db->get('total_transact');	
 		if($query->num_rows()>0) {
 			return $query->row();
 		}
 		else {
 			return false;
 		}
 	
 	}
 	public function update_payment($pre_paid_data,$autual_data) {
 		$this->db->where('total_transact_id',$pre_paid_data);
 		$this->db->update('total_transact',$autual_data);
 	}

 	
 	public function insert_to_repayment($repayment) {
 		$this->db->insert('repayment',$repayment);
 	}


}

