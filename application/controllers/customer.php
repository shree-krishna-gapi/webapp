<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer extends CI_Controller {
	function __construct(){
		parent:: __construct();
		$this->load->model('customermodel','customermodel');
	}

	public function index() {
		//$ans = $this->companymodel->display_company();		
		$data['records'] = $this->customermodel->display_customer();			
		$this->load->view('customer/customer',$data);	

	}
	public function showAllCustomer() {
		//$ans = $this->companymodel->display_company();		
		 // $this->load->view('company/company',['records'=>$ans]);		

		$data['customers'] = $this->cm->showAllCustomer();
		echo json_encode($data);
		//print_r($data); exit();
		//$this->load->view( 'customer/customer', $data);

		
	}
	public function register() { 
		$this->load->view('customer/register');			
	}
	public function customer_registration() {
		$this->form_validation->set_rules('customer_name', 'Customer Name', 'trim|required|is_unique[customer.customer_name]');
		$this->form_validation->set_rules('customer_address', 'Customer Address', 'trim|required');
		$this->form_validation->set_rules('customer_contact', 'Customer Contact', 'trim|required|is_unique[customer.customer_contact]');
		$this->form_validation->set_rules('customer_date', 'Date', 'required');
		if($this->form_validation->run()==false) {
			
			echo validation_errors();
		}		

		else if ($this->form_validation->run()==true) {
			$post=$this->input->post();
			$this->customermodel->customer_registration($post);			
			redirect('customer/register');
		}
	}

	public function editcustomer(){
		$result = $this->customermodel->editcustomer();
		echo json_encode($result);
	}
	public function updatecustomer(){
		$customer_id = $this->input->post('customer_id');
		$customer_name = $this->input->post('customer_name');
		$customer_address = $this->input->post('customer_address');
		$customer_contact = $this->input->post('customer_contact');
		$update_customer_info=$this->input->post();
		$rr = $this->customermodel->updatecustomer($update_customer_info,$customer_id);
			redirect('customer');


	}



	//payment
	public function payment() {
		$data['hey'] = $this->customermodel->customer_payment();			
			$this->load->view('customer/payment',$data);	
			
		
	}

	public function repaid_payment() {
 		 $repayment_date = $this->input->post('repayment_date');
 		 $company_id = $this->input->post('company_id');
 		 $customer_id = $this->input->post('customer_id');
 		 $repaid_amount = $this->input->post('repaid');
 		 $sales_id = $this->input->post('sales_id');

 		 $repayment = array(
 		 	'date' => $repayment_date,
 		 	'company_id' => $company_id,
 		 	'customer_id' => $customer_id,
 		 	'repaid_amount' => $repaid_amount,
 		 	'sales_id' => $sales_id
 		 );
 		// print_r($repayment); exit();
 		$this->customermodel->insert_to_repayment($repayment);

 		$data=$this->customermodel->get_payment($customer_id,$company_id,$sales_id);

       
           
        
        $actual_amount = $data->cr_amount-$repaid_amount;
        $onthisid = $data->payment_id;

        $this->customermodel->update_payment($onthisid,$actual_amount);
          
 		
 		 
 		 redirect('customer/payment');
 	}	

}