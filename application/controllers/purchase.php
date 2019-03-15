<?php
defined('BASEPATH') OR exit('No direct script access allowed');
	
class Purchase extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('purchasemodel', 'pm');
		if($this->session->userdata('user_id')==false) 
			return redirect('login');
	}
	
	public function index() {

		 $data['getCompany'] = $this->pm->get_company();	
		 $this->load->view('company/purchase',$data);		
	}
	public function getProduct($company_id){
		$result['company'] = $this->pm->getProduct($company_id);		
		echo json_encode($result);		
	}

	public function CompanyBill() {
		$product_name 	= $this->input->post('product_name');
		$product_id 	= $this->input->post('product_id');
		$company_name 	= $this->input->post('company_name');	
		$company_id 	= $this->input->post('companyid');

		$unit 			= $this->input->post('unit');
		$pic 			= $this->input->post('pic');
		$qty 			= $this->input->post('qty');
		$rate 			= $this->input->post('rate');
		$amount 		= $this->input->post('amount');			
		
		$count = count($product_id);	
		
		for($i=0; $i<$count; $i++) {
			$product_id_multiple = $product_id[$i];


			$checkStock=$this->pm->get_stock($company_id,$product_id_multiple);					
				

		
			if($checkStock){
				//$stock_qty=$checkStock['qty']+$qty[$i];
				foreach ($checkStock as $no => $p_qty) {
					$t_unit = $p_qty->unit;
				    $t_pic  = $p_qty->pic;
					$t_qty	= $p_qty->qty;
					
					// print_r($t_unit);
					// print_r($t_pic);
					// print_r($t_qty);
					// exit();
					$new_product_data = array(
						'unit' => $t_unit+$unit[$i],
						'pic' => $t_pic+$pic[$i],
						'qty' => $t_qty+$qty[$i]
					);
				// 	print_r("<pre>");
				// print_r($unit[$no]);	
				// print_r("</pre>");
					$this->pm->adding_product($company_id,$product_id_multiple,$new_product_data);
				}
				
			}
			else{
				//$stock_qty=$qty[$i];
				print_r("2 is");
			}
			

			// $stock_book = array(
			// 	'stock_name' =>$product_name[$i],
			// 	'stock_unit' =>$unit[$i],
			// 	'stock_pic'	 =>$pic[$i],
			// 	'stock_qty'  =>$stock_qty,			
			// 	'product_id' =>$product_id[$i],
			// 	'company_id' =>$company_id,
			// 	'company_name' =>$company_name
			// );

			
		//$this->companymodel->stock_book_record($stock_book,$product_id[$i]);
		
			//print_r($product_id);
		} 
		//exit();
		$test = 'hello';
		redirect('purchase',$test);
		
	}

}