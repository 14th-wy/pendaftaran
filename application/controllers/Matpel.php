<?php


class Jurusan extends CI_Controller{
 
	function __construct(){
		parent::__construct();		
		$this->load->library('pdftc');
		$this->load->model('MMatpel');
		$this->load->helper('url');
		$this->load->library('session');
	}

	function report(){
		$data['data'] = $this->MMatpel->getAll()->result();
		$this->load->view('', $data);
	}

	function index(){

		$data['data'] = $this->MMatpel->getAll()->result();
		// var_dump($data); exit;

		$this->load->view('header');
		$this->load->view('matpel_home', $data);
		$this->load->view('footer');
	}

	function save(){
		$data = array(
			'kode_matpel' => $this->input->post('kode_matpel'),
			'nama_matpel' => $this->input->post('nama_matpel'),
			'kb' => $this->input->post('kb')
		);

		// var_dump($data); exit;

		if($this->input->post('modeEdit') != ""){
			$this->MMatpel->replace("mata_pelajaran", $data);
		}else{
			$this->MMatpel->save("mata_pelajaran", $data);
		}

		redirect('mata_pelajaran');
	}

	function delete(){
		$this->MMatpel->delete("mata_pelajaran", "KODE_PROGRAM_KEAHLIAN", $this->input->get('kodeProgramKeahlian') );
		redirect('mata_pelajaran');
	}

}