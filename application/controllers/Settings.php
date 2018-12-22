<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class settings extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form','url'));
		$this->load->library('session');
		$this->load->library('upload');
		$this->load->model('Model','model');
	}

	function load_view($current_page,$data=array())
	{
       		$parts = array('header', 'left', $current_page, 'footer');
      		foreach($parts as $part)
	        {
	      		$this->load->view($part,$data);
	   	}
	}

	function test_input($data) 
	{
 	 $data = trim($data);
 	 $data = stripslashes($data);
 	 $data = htmlspecialchars($data);
 	 return $data;
	}

	function change_password()
	{
		if($this->session->username && $this->session->user_id) 		
		{
			$id=$this->session->user_id;

        		if($_SERVER['REQUEST_METHOD'] == 'POST' && $this->input->post('previous') && $this->input->post('new') && $this->input->post('confirm'))
			{				
				if($this->input->post('previous') == $this->model->id_column('phpuncle_admin','password',$id))
				{
					if($_POST['new']==$_POST['confirm'])
					{
						$password = $this->input->post('new');
						$this->model->update_password('phpuncle_admin',$id,$password);
						$this->session->msg="Password changed successfully";	
						$this->session->msg_type = "success";	
					}
					else
					{
						$this->session->msg="New password and Confirm password do not match";
						$this->session->msg_type = "info";	
					}
				}
				else
				{
					$this->session->msg="Previous Password Wrong";
					$this->session->msg_type = "danger";	
				}
			}
			
			$this->load_view("settings/change_password");
			$this->session->msg = "";
			$this->session->msg_type = "";								
		}		      					
		else
		{
	            redirect('user/login');
		}	
	}
}


