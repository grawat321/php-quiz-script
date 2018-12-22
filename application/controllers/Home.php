<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form','url'));
		$this->load->library('session');
		$this->load->model('Model','a');
	}

	function index()
	{
		if($this->session->username) 		 
		{
		   	$this->load_view('dashboard');
		}
		else
		{
	            redirect('User/login');
		}
	}

	function load_view($current_page,$data=array())
	{
	      	$this->load->view('header');
	      	$this->load->view('left');
		$this->load->view($current_page,$data);
      		$this->load->view('footer');
	}
}

