<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sets extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form','url'));
		$this->load->library('session');
		$this->load->library('upload');
		$this->load->model('Model','a');
	}

	function load_view($current_page,$data=array())
	{
		if($this->session->username) 		
		{
	       		$this->load->view('header');
	    	  	$this->load->view('left');
			$this->load->view($current_page,$data);
      			$this->load->view('footer');
		}
		else
		{
	            redirect('User/login');
		}
	}

	function test_input($data) 
	{
 	 $data = trim($data);
 	 $data = stripslashes($data); // (strips backslash \)
 	 $data = htmlspecialchars($data);
 	 return $data;
	}

	function view()
	{
		if($this->session->username) 		
		{
			if($this->session->type==1 || $this->session->type==2) 		
			{
				$id = $this->uri->segment(3);

				$this->load_view('sets/view');	
				$this->session->msg = "";	
				$this->session->msg_type = "";		//success info warning danger					
			}
			else
			{
           		 redirect('Home');
			}
		}
		else
		{
	            redirect('User/login');
		}	
	}

	function add()
	{
		if($this->session->username) 		
		{
			if($this->session->type==1) 		
			{
        			if($_SERVER['REQUEST_METHOD'] == 'POST' && $this->input->post('set'))
				{	
					 $data= array(
					'category' => $this->test_input($this->input->post('category')),
					'nameofset' => $this->test_input($this->input->post('set'))
					);

					$this->a->add('phpuncle_sets',$data);
					
					$this->session->msg = "Set added successfully.";	
					$this->session->msg_type = "success";							

					redirect('Sets/view');
				}
					
				$this->load_view('sets/add');
			}
			else
			{
	           	 redirect('Home');
			}						
		}
		else
		{
	            redirect('User/login');
		}	
	}

	function edit($id)
	{
		if($this->session->username) 		
		{
			if($this->session->type==1) 		
			{
				if(!is_numeric($id)) 
				redirect('Sets/view');

				$data=array('id'=>$id);

	        		if($_SERVER['REQUEST_METHOD'] == 'POST' && $this->input->post('set'))
				{	
					 $data= array(
					'category' => $this->test_input($this->input->post('category')),
					'nameofset' => $this->test_input($this->input->post('set'))
					);

					$this->a->update('phpuncle_sets',$id,$data);

					$this->session->msg = "Set updated successfully.";
					$this->session->msg_type = "success";							

					redirect('Sets/view');
				}

				$data0=$this->a->id_view('phpuncle_sets',$id);
				if($data0==NULL) redirect('Sets/view');
				$data0['id']=$id;

				$this->load_view('sets/edit',$data0);	
			}
			else
			{
	           	 redirect('Home');
			}
		}
		else
		{
	            redirect('User/login');
		}	
	}

	function delete($id)
	{
		if($this->session->username) 		
		{
			if($this->session->type==1 && is_numeric($id)) 		
			{	
				$this->a->delete('phpuncle_sets',$id);
				
				$this->session->msg = "Set deleted successfully.";
				$this->session->msg_type = "success";							

				redirect('Sets/view');
			}
			else
			{
	           	 redirect('Home');
			}		
		}
		else
		{
	            redirect('User/login');
		}	
	}

}


