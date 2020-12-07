<?php


class Home extends CI_Controller{
 
	function __construct(){
		parent::__construct();		
		$this->load->helper('url');
		$this->load->library('session');
	}
 
	function index(){
		$this->load->view('header');
		$this->load->view('home');
		$this->load->view('footer');
	}	


}