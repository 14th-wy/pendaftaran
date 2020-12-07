<?php

class Login extends CI_Controller {

    function __construct(){
		parent::__construct();		
		$this->load->helper('url');
		$this->load->model('MMasuk');
		$this->load->library('session');
    }
    
	public function index()
	{
		//$this->session->username = "Dimas Bro";
		$this->load->view('login');
		$this->session->msg = "";
		$this->session->type = "";
	}
	
	public function register()
	{
		$this->load->view('register');
		$this->session->msg = "";
		$this->session->type = "";
	}
	
	public function postRegister(){
		$data = array(
			'KODE_USER' => $this->input->post('KODE_SISWA'),
			'NAMA_USER' => $this->input->post('NAMA_SISWA'),
			'PASSWORD' => $this->input->post('password'),
			'TIPE' => "siswa"
		);

		$this->MMasuk->save("masuk", $data);
		$this->session->msg = "Berhasil Register, Silahkan login!";
		$this->session->type = "alert-success";

		redirect('login');

	}
	
	public function check(){
		$cek = $this->MMasuk->isValid(
			$this->input->post('username'),
			$this->input->post('password')
		);

		// var_dump($cek); exit;

		if($cek != null){
			$this->session->msg = "";
			$this->session->username = $cek[0]->KODE_USER;
			$this->session->type = $cek[0]->TIPE;
			$this->session->nama = $cek[0]->NAMA_USER;
			redirect('home');
		}else{
			$this->session->msg = "Kombinasi Username dan Password Salah!";
			redirect('login');
		}

		
	}

}
