<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sales extends CI_Controller {
	function __construct(){
		parent:: __construct();
		$this->load->model('salesmodel','sm');
	}

	public function index() {
		$data['allCustomer'] = $this->sm->display_customer();	
		$data['allCompany'] = $this->sm->display_company();	
		$this->load->view('sales/sales',$data);	

	}

	public function getProduct($company_id) {
		$result['customers'] = $this->sm->getProduct($company_id);
		
		echo json_encode($result);
		
	}
	public function stockDataCheck() {
		$company_id = $this->input->get('company_id');		
		$product_id = $this->input->get('pid');		
		$result['stockData']=$this->sm->stockDataCheck($company_id,$product_id);
		echo json_encode($result['stockData']);
	}
	public function salesBill() {

		// $time = $this->input->post('time');
		$time = date('Y-m-d H:i:s');

		//print_r($time); exit();
		$company_id = $this->input->post('co_id');
		
		$company_name = $this->input->post('co_name');
		$customer_id = $this->input->post('cu_id');
		$customer_name = $this->input->post('cu_name');
		$customer_address = $this->input->post('cu_address');
		$customer_contact = $this->input->post('cu_contact');
		$bill_date = $this->input->post('bill_date');		

		$sub_total = $this->input->post('sub_total');
		$discount = $this->input->post('discount');
		$paid = $this->input->post('paid_amount');
		$unpaid = $this->input->post('unpaid_amount');
		$grand_total = $this->input->post('grand_total');
		$balanced = $this->input->post('balanced');

		$product_name = $this->input->post('product_name');
		$product_id = $this->input->post('product_id');	
		$unit = $this->input->post('unit');
		$pic = $this->input->post('pic');
		$qty = $this->input->post('qty');
		$rate = $this->input->post('rate');
		$amount = $this->input->post('amount');
		$sales_info = array(
			'company_id' 	=>$company_id,
			'company_name'	=>$company_name,
			'customer_id'	=>$customer_id,
			'customer_name' =>$customer_name,
			'time' =>$time
		);
		$last_id=$this->sm->sales_info_model($sales_info,$company_id,$customer_id);		
		
	
		$sales_transact = array(			
			'sales_id' 		=>$last_id,
			'sales_date' 	=>$bill_date,
			'sub_total' 	=>$sub_total,
			'discount' 		=>$discount,
			'paid' 			=>$paid,
			'unpaid' 		=>$unpaid,
			'grand_total' 	=>$grand_total,
			'balanced' 		=>$balanced,
			'company_id' 	=>$company_id,
			'customer_id' 	=>$customer_id,
			'date' 	=>$time
		);
			$this->sm->sales_transact_model($sales_transact);

			

		$count = count($rate);
		for($i=0; $i<$count; $i++) {
			$sales_item_details = array(
				'product_name' => $product_name[$i],
				'unit' => $unit[$i], 
				'pic' => $pic[$i],
				'qty' => $qty[$i],
				'rate' => $rate[$i],
				'amount' => $amount[$i],
				'sales_id' => $last_id,
				'time' => $time
			);
		
			$this->sm->sales_item_details($sales_item_details);

			

		}
		$stock_item= $this->sm->sales_stock($product_id);
		
		foreach ($stock_item as $k => $stock_product) {
			$sid 	= $stock_product->product_id;
			$u 		= $stock_product->unit;
			$p 		= $stock_product->pic;
			$q 		= $stock_product->qty;
		
			$m_data = array(				
				'product_id' => $product_id[$k],
				'unit' => $u-$unit[$k],
				'pic' => $p-$pic[$k],
				'qty' => $q-$qty[$k]

			);
			//print_r($sid);
			$this->sm->minus_stock($m_data ,$sid);
		}
		
		
		//exit();
		//exit();
		$payment_detail = array(	
			'customer_id' 	=>$customer_id,
			'company_id' 	=>$company_id,			
			'discount' 		=>$discount,
			'dr_amount' 	=>$paid,
			'cr_amount' 	=>$unpaid,		
			'balanced' 		=>$balanced,
			'sales_id' 		=>$last_id,
			'time' 			=>$time

			
		);
		$this->sm->payment_at_sales($payment_detail);
		
		
		redirect('sales');
	}


}