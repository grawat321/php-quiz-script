<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Front extends CI_Controller
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

	function index()
	{

		$this->load->view('front/index');	
							
	}

	function sets($id)
	{
		$data = array('id'=>$id);
		$this->load->view('front/sets',$data);	
							
	}

	function user($id)
	{
		if($_SERVER['REQUEST_METHOD'] == 'POST' && $this->input->post('name'))
		{	
			 $data= array(
			'username' => $this->test_input($this->input->post('name')),
			'emailid' => $this->test_input($this->input->post('email'))
			);

			$user_id = $this->a->add('phpuncle_user',$data);

			$this->session->user_id = $user_id;
			$this->session->username = $this->test_input($this->input->post('name'));
			$this->session->set = $id;
			$this->session->begin_time = date("Y-m-d h:i:s"); 
					
			$this->session->msg = "User added successfully.";	
			$this->session->msg_type = "success";							

			redirect('Front/questions');
		}
			
		$this->load->view('front/user');
	}

	function questions()
	{
		if($this->session->username) 		
		{
				if($_SERVER['REQUEST_METHOD'] == 'POST' && $this->input->post('questions'))
				{	

					$questions = $this->input->post('questions');
					$answers = $this->input->post('answers');
					$correct = $this->input->post('correct');

					$score = 0;

					if(!empty($answers))
					{
						for($i=0;$i<sizeof($questions);$i++)
						{
							if (!array_key_exists($questions[$i],$answers))
								continue;
							if($answers[$questions[$i]]==$correct[$questions[$i]])
								$score++;
						}
					}

					$this->session->score = $score;

					//Convert them to timestamps.
					$timestart = strtotime($this->session->begin_time);
					$timeend = strtotime(date("Y-m-d h:i:s"));	
 
					//Calculate the difference.
					$difference = $timeend - $timestart;

					$this->session->time =$difference;


					 $data= array(
					'userid' => $this->session->user_id,
					'setid' => $this->session->set,
					'questionid' => 0,
					'answerid' => 0,
					'timestart' => $timestart,
					'timend' => $timeend,
					'totalscore' => $score,
					'totalquestions' => sizeof($questions)
					);

					$this->a->add('phpuncle_quest_answers',$data);

					$this->session->msg = "Result updated successfully.";
					$this->session->msg_type = "success";							

					redirect('Front/result');
				}

				$this->load->view('front/questions');	
		}
		else
		{
	            redirect('Front');
		}	
	}

	function result()
	{
		if($this->session->username) 		
		{
			$data = array('time'=>$this->session->time, 'score'=>$this->session->score);

			$this->load->view('front/result',$data);	
		}
		else
		{
	            redirect('Front');
		}	
	}

}


