<?php


class Kelas extends CI_Controller{
 
	function __construct(){
		parent::__construct();		
		$this->load->model('MJurusan');
		$this->load->model('MFormPendaftaran');
		$this->load->model('MKelas');
		$this->load->helper('url');
		$this->load->library('pdftc');
	}
	function laporan(){
		$data['data'] = $this->MKelas->getAll()->result();
		$this->load->view('kelas_laporan', $data);
	}

	function index(){

		$data['data'] = $this->MKelas->getAll()->result();
		$data['kodeProgramKeahlian'] = $this->MJurusan->getDistinct()->result();

		// var_dump($data); exit;

		$this->load->view('header');
		$this->load->view('kelas_home', $data);
		$this->load->view('footer');
	}

	function save(){
		$data = array(
			'kode_kelas' => $this->input->post('kode_kelas'),
			'nama_kelas' => $this->input->post('nama_kelas'),
			'nama_jurusan' => $this->input->post('nama_jurusan'),
			'kode_jurusan' => $this->input->post('kode_jurusan')
		);

		// var_dump($data); exit;

		if($this->input->post('modeEdit') != ""){
			$this->MKelas->replace("datakelas", $data);
		}else{
			$this->MKelas->save("datakelas", $data);
		}

		redirect('kelas');
	}

	function delete(){

		// var_dump($this->input->post('delete_kodeKelas')); exit;

		$this->MKelas->delete("datakelas", "kode_kelas", $this->input->post('delete_kodeKelas') );
		redirect('kelas');
	}

	function getNamaByNo(){
		echo json_encode($this->MJurusan->getNamaByNo($this->input->get('noPendaftaran'))->result());
	}

	

}