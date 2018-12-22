<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form','url'));
		$this->load->library('session');
		$this->load->library('upload');
		$this->load->model('Model','a');
	}

	function login($msg="")
	{
		$data=array('msg'=>"");
		if($msg=="out")
		$data['msg'] = "You have been logged out";
	
		if($_SERVER['REQUEST_METHOD'] == 'POST')    		
		{
			$arr=array('email'=> $this->input->post('username') , 'password'=>$this->input->post('password') );
			if($check = $this->a->get_rows('phpuncle_admin',$arr))
			{
				$this->session->username = $check['username'];
				$this->session->type = 1;	
				$this->session->msg = "";				
				$this->session->user_id = $check['id'];

				redirect('Home');
			}
			else
			{
				$data['msg']="Wrong details";	
			}
		}

		$this->load->view('login',$data);
	}
	
	function logout()
	{
		unset($_SESSION['username']);
		unset($_SESSION['type']);
		unset($_SESSION['user_id']);
		unset($_SESSION['msg']);
		session_destroy();
		redirect('User/login/out');
	}

}
?>
