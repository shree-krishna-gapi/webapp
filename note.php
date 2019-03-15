<?php
// Insert Data Controller
public function company_registration() {
	$company_name 		= $this->input->post('company_name');
	$company_address 	= $this->input->post('company_address');
	$company_contact 	= $this->input->post('company_contact');
	$post=$this->input->post();
	$this->load->model('companymodel','asd');

	if ($this->asd->company_registration_model($post)== TRUE) {
		echo "sucess";
	}
	else {
		redirect('company');
	}
}
public function company_registration_model($post) {
	$qry = $this->db->insert('company',$post);
	//$name=array['company_name'];
}

// end of Insert Data



//update talbe
public function updatecompany(){
		$company_id = $this->input->post('company_id');
		$company_name = $this->input->post('company_name');
		$company_address = $this->input->post('company_address');
		$company_contact = $this->input->post('company_contact');
		$update_company_info=$this->input->post();
		$rr = $this->companymodel->updatecompany($update_company_info,$company_id);
			redirect('company');


	}

public function updatecompany($update_company_info,$company_id){
		//$companyu_id = $this->input->post('company_id');
		
		$this->db->where('company_id', $company_id);
		$this->db->update('company',$update_company_info);
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}

//end of update table