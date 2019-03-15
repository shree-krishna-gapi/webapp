<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	function __construct() {
		parent::__construct();
			if($this->session->userdata('user_id')>=1)
				return redirect('dashboard');
			} // if user is log in then not goes to sign in page without logout
	public function index()
	{
		
		//$this->load->library('form_validation');
		$this->form_validation->set_rules('username', 'Username', 'trim|required|alpha|min_length[5]');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[5]');

		if($this->form_validation->run()) {
			$uname=$this->input->post('username');
			$pass=$this->input->post('password');
			$this->load->model('loginmodel');
		/*	$s=$this->loginmodel->valid_login($uname,$pass);
			echo $s;  for print the id
			exit;*/
			if($this->loginmodel->valid_login($uname,$pass)) {
				$this->load->library('session');
				$this->session->set_userdata('user_id',$uname);
				return redirect('dashboard');
				if($this->session->set_userdata('last_time') > 60 ) {
					return redirect('login');
				}
			}
			else {
				$this->session->set_flashdata('Login_failed', '<b>Sorry, </b> Invalid Username/Password');
				return redirect('login');
			}
		}
		else {
			$this->load->view('login');
			//$error = validation_errors();
			
			
		}
	}

	public function logout() {
		$this->session->unset_userdata('user_id');
		return redirect('login/index');
	}

}
