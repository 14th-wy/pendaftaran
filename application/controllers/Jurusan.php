<?php


class Jurusan extends CI_Controller{
 
	function __construct(){
		parent::__construct();		
		$this->load->model('MJurusan');
		$this->load->model('MFormPendaftaran');
		$this->load->helper('url');
	}

	function index(){

		$data['data'] = $this->MJurusan->getAll()->result();
		$data['noPendaftaran'] = $this->MFormPendaftaran->getDistinctNoPendaftaran()->result();

		// var_dump($data); exit;

		$this->load->view('header');
		$this->load->view('jurusan_home', $data);
		$this->load->view('footer');
	}

	function save(){
		$data = array(
			'kode_jurusan' => $this->input->post('kode_jurusan'),
			'nama_jurusan' => $this->input->post('nama_jurusan'),
		);

		// var_dump($data); exit;

		if($this->input->post('modeEdit') != ""){
			$this->MJurusan->replace("jurusan", $data);
		}else{
			$this->MJurusan->save("jurusan", $data);
		}

		redirect('jurusan');
	}

	function delete(){
		$this->MJurusan->delete("jurusan", "kode_jurusan", $this->input->get('kodeProgramKeahlian') );
		redirect('jurusan');
	}

	function getNamaByNo(){
		echo json_encode($this->MJurusan->getNamaByNo($this->input->get('q'))->result());
	}

}