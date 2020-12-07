<?php

class Logout extends CI_Controller {

    function __construct(){
		parent::__construct();		
		$this->load->helper('url');
		$this->load->model('MMasuk');
		$this->load->library('session');
    }
    
	public function index()
	{
		$this->session->username = "";
		redirect('login');
    }
    

}
