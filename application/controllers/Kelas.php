<?php


class Kelas extends CI_Controller{
 
	function __construct(){
		parent::__construct();		
		$this->load->library('pdftc');
		$this->load->model('MJurusan');
		$this->load->model('MFormPendaftaran');
		$this->load->model('MKelas');
		$this->load->helper('url');
		$this->load->library('session');
	}

	function getno(){
		$no = $this->MKelas->getMaxNo()->result();
		$urutan = (int) substr($no[0]->no, 2, 2);

		$urutan++;

		$huruf = "KK";
		$kode = $huruf . sprintf("%02s", $urutan);

		echo json_encode($kode);
	}

	function report(){
		$data['data'] = $this->MKelas->getAll()->result();
		$this->load->view('kelas_report', $data);
	}

	function index(){

		$data['data'] = $this->MKelas->getAll()->result();
		$data['kodeProgramKeahlian'] = $this->MJurusan->getDistinct()->result();

		//var_dump($data); exit;

		$this->load->view('header');
		$this->load->view('kelas_home', $data);
		$this->load->view('footer');
	}

	function save(){
		$data = array(
			'KODE_KELAS' => $this->input->post('KODE_KELAS'),
			'NAMA_KELAS' => $this->input->post('NAMA_KELAS'),
			'NAMA_JURUSAN' => $this->input->post('NAMA_JURUSAN'),
			'KODE_PROGRAM_KEAHLIAN' => $this->input->post('KODE_PROGRAM_KEAHLIAN')
		);

		//var_dump($data); exit;

		if($this->input->post('modeEdit') != ""){
			$this->MKelas->replace("kelas", $data);
		}else{
			$this->MKelas->save("kelas", $data);
		}

		redirect('kelas');
	}

	function delete(){

		// var_dump($this->input->post('delete_kodeKelas')); exit;

		$this->MKelas->delete("kelas", "KODE_KELAS", $this->input->post('delete_kodeKelas') );
		redirect('kelas');
	}

	function getNamaByNo(){
		echo json_encode($this->MJurusan->getNamaByNo($this->input->get('noPendaftaran'))->result());
	}

	function getSearch(){
		echo json_encode($this->MKelas->getSearch( $this->input->get('noPendaftaran') ));
	}
	

}