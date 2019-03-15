<?php
defined('BASEPATH') OR exit('No direct script access allowed');
	
class Company extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('companymodel', 'companymodel');
		if($this->session->userdata('user_id')==false) 
			return redirect('login');
	}
	
	public function index() {

		 $data['records'] = $this->companymodel->display_company();	
		 $this->load->view('company/company',$data);		
	}
	public function register() {	
		$ans['records'] = $this->companymodel->display_company();	

	   $this->load->view('company/register',$ans);		

   }
   public function company_registration() {
		$this->form_validation->set_rules('company_name', 'Company Name', 'trim|required|is_unique[company.company_name]');
		$this->form_validation->set_rules('company_address', 'Address', 'trim|required');
		$this->form_validation->set_rules('company_date', 'Date', 'required');
		if($this->form_validation->run()==false) {
			
			echo validation_errors();
		}
		

		//$post['date']=date('Y-m-d');
		

		else if ($this->form_validation->run()==true) {

			$post=$this->input->post();
			//print_r($post); die();
			$this->companymodel->company_registration($post);
			
			redirect('company/register');
			//$reg_sucess = "sucess";
		}
	

	}

	public function product_registration() {
	
		
		$this->form_validation->set_rules('company_id', 'Company Name', 'required');

		$this->form_validation->set_rules('product_name', 'Product Name', 'trim|required|is_unique[product.product_name]');

		$this->form_validation->set_rules('product_catagory', 'Product Catagory', 'trim|required');
		$this->form_validation->set_rules('product_code', 'Product Code', 'trim|required|is_unique[product.product_code]');
		$this->form_validation->set_rules('product_particular', 'Particular', 'trim|required');		
		$this->form_validation->set_rules('product_date', 'Date', 'required');
		if($this->form_validation->run()==false) {
			
			echo validation_errors();
		}
		

		//$post['date']=date('Y-m-d');
		

		else if ($this->form_validation->run()==true) {

			$data=$this->input->post();
			$this->companymodel->product_registration($data);	
			redirect('company/register');
		}
	}

	public function editcompany(){
		$result = $this->companymodel->editcompany();
		echo json_encode($result);
	}
	public function updatecompany(){
		$company_id = $this->input->post('company_id');
		$company_name = $this->input->post('company_name');
		$company_address = $this->input->post('company_address');
		$company_contact = $this->input->post('company_contact');
		$update_company_info=$this->input->post();
		$rr = $this->companymodel->updatecompany($update_company_info,$company_id);
			redirect('company');


	}


}