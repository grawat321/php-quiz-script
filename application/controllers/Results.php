<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Results extends CI_Controller
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

				if($id!=NULL && is_numeric($id))
				{				
					$data0['id']=$id;

					$this->load_view('results/detail_view',$data0);
					return ;
				}
	
				$this->load_view('results/view');	
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

	function show($id)
	{
		if($this->session->username) 		
		{
			if($this->session->type==1) 		
			{
				if($id!=NULL && is_numeric($id))
				{				
					$data0=$this->a->id_view('phpuncle_quest_answers',$id);
					if($data0==NULL) redirect('Results/view');
					$data0['id']=$id;

					$this->load_view('results/result',$data0);
				}
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
        			if($_SERVER['REQUEST_METHOD'] == 'POST' && $this->input->post('question'))
				{	
					 $data= array(
					'set_id' => $this->test_input($this->input->post('set')),
					'question' => $this->test_input($this->input->post('question')),
					'option1' => $this->test_input($this->input->post('option1')),
					'option2' => $this->test_input($this->input->post('option2')),				
					'option3' => $this->test_input($this->input->post('option3')),				
					'option4' => $this->test_input($this->input->post('option4')),				
					'correct' => $this->test_input($this->input->post('correct'))			
					);

					$this->a->add('phpuncle_question',$data);
					
					$this->session->msg = "Question added successfully.";	
					$this->session->msg_type = "success";							

					redirect('Results/view');
				}
					
				$this->load_view('results/add');
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

	function send($id)
	{
		if($this->session->username) 		
		{
			if($this->session->type==1) 		
			{
				if(!is_numeric($id)) 
				redirect('Results/view');
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
				$this->a->delete('phpuncle_user',$id);
				
				$this->session->msg = "User deleted successfully.";
				$this->session->msg_type = "success";							

				redirect('Results/view');
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


