<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Category extends CI_Controller
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
			if($this->session->type==1) 		
			{
				$id = $this->uri->segment(3);

				$this->load_view('category/view');	
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
        			if($_SERVER['REQUEST_METHOD'] == 'POST' && $this->input->post('name'))
				{	
					 $data= array(
					'name' => $this->test_input($this->input->post('name'))
					);

					$this->a->add('phpuncle_category',$data);
					
					$this->session->msg = "Category added successfully.";	
					$this->session->msg_type = "success";							

					redirect('Category/view');
				}
					
				$this->load_view('category/add');
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
				redirect('Category/view');

				$data=array('id'=>$id);

	        		if($_SERVER['REQUEST_METHOD'] == 'POST' && $this->input->post('name'))
				{	
					 $data= array(
					'name' => $this->test_input($this->input->post('name'))
					);

					$this->a->update('phpuncle_category',$id,$data);

					$this->session->msg = "Category updated successfully.";
					$this->session->msg_type = "success";							

					redirect('Category/view');
				}

				$data0=$this->a->id_view('phpuncle_category',$id);
				if($data0==NULL) redirect('Category/view');
				$data0['id']=$id;

				$this->load_view('category/edit',$data0);	
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
				$this->a->delete('phpuncle_category',$id);
				
				$this->session->msg = "Category deleted successfully.";
				$this->session->msg_type = "success";							

				redirect('Category/view');
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


