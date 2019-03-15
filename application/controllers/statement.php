<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Statement extends CI_Controller {
	function __construct(){
		parent:: __construct();
		$this->load->model('statementmodel','statementmodel');
	}

	public function index() {	

		$data['records'] = $this->statementmodel->display_customer();
		$this->load->view('statement/statement',$data);	

	}
	
	public function company_info() {
		$customer_id = $this->input->get('customer_id');
		$result['company_info'] = $this->statementmodel->get_company_info($customer_id);
		 echo json_encode($result);

	}
	
	public function sales_transact() {
		$sales_id = $this->input->get('sales_id');		
		$result['sales_transact'] = $this->statementmodel->get_sales_transact($sales_id);
		 echo json_encode($result);

	}

	public function sales_item_details_statement() {
	
		
		$sales_id = $this->input->get('sales_id');
		$dateid = $this->input->get('dateid');
		$result['sales_item_details_statement'] = $this->statementmodel->get_sales_item_details_statement($sales_id,$dateid);
		 echo json_encode($result);
	}

	public function sales_transact_statement() {
		$sales_id = $this->input->get('sales_id');
		$dateid = $this->input->get('dateid');		
		$result['sales_transact_statement'] = $this->statementmodel->sales_transact_statement($sales_id,$dateid);
		 echo json_encode($result['sales_transact_statement']);

	}

	public function company_info_statement() {
		$cid = $this->input->get('c_id');	
		$result['company_info_statement'] = $this->statementmodel->company_info_statement($c_id);
		 echo json_encode($result['company_info_statement']);

	}




}