<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Stock extends CI_Controller {
	function __construct(){
		parent:: __construct();
		$this->load->model('stockmodel','stockmodel');
	}

	public function index() {		
		$data['records'] = $this->stockmodel->display_stock();			
		$this->load->view('stock/stock',$data);	

	}



}