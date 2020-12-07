<?php


class FormPendaftaran extends CI_Controller{
 
	function __construct(){
		parent::__construct();	
		$this->load->library('pdftc');	
		$this->load->model('MFormPendaftaran');
		$this->load->helper('url');
		$this->load->library('session');
	}

	function getno(){
		$no = $this->MFormPendaftaran->getMaxNo()->result();
		// echo $no[0]->no;
		$urutan = (int) substr($no[0]->no, 2, 2);

		$urutan++;

		$huruf = "NP";
		$kode = $huruf . sprintf("%02s", $urutan);

		echo json_encode($kode);
	}

	function report(){

		$start = $this->input->get('startDate');
		$end = $this->input->get('endDate');

		$data['data'] = $this->MFormPendaftaran->getBetween($start, $end)->result();

		$this->load->library('pdf');
		$this->pdf->setPaper('A4', 'landscape');
		$this->pdf->filename = "laporan-pendaftaran.pdf";

		// $this->pdf->load_view('header');
		$this->pdf->load_view('form_pendaftaran_report', $data);
		// $this->pdf->load_view('footer');

	}

	function report2(){
		$data['data'] = $this->MFormPendaftaran->getAll()->result();
		$this->load->view('form_pendaftaran_report2', $data);
	}
 
	function index(){

		// var_dump($this->session->username); exit;

		if($this->session->type == "siswa"){
			$data['data'] = $this->MFormPendaftaran->getFindSiswa($this->session->username);
		}else{
			$data['data'] = $this->MFormPendaftaran->getAll()->result();
		}

		$this->load->view('header');
		$this->load->view('form_pendaftaran_home', $data);
		$this->load->view('footer');
	}

	function save(){
		$data = array(
			'NO_PENDAFTARAN' => $this->input->post('noPendaftaran'),
			'NAMA_CALON_SISWA' => $this->session->username, //$this->input->post('namaCalonSiswa'),
			'JENIS_KELAMIN' => $this->input->post('jenisKelamin'),
			'TEMPAT' => $this->input->post('tempatLahir'),
			'TANGGAL_LAHIR' => $this->input->post('tanggalLahir'),
			'AGAMA' => $this->input->post('agama'),
			'SEKOLAH_ASAL' => $this->input->post('sekolahAsal'),
			'TAHUN_IJAZAH' => $this->input->post('tahunIjazah'),
			'NOMOR_IJAZAH' => $this->input->post('noIjazah'),
			'NISN' => $this->input->post('nisn'),
			'JURUSAN' => $this->input->post('jurusan'),
			'ALAMAT' => $this->input->post('alamat'),
			'NAMA_ORANGTUA' => $this->input->post('namaOrangTua'),
			'ALAMAT_ORANGTUA' => $this->input->post('alamatOrangTua'),
			'TELEPON' => $this->input->post('telepon'),
			'C_IJAZAH' => $this->input->post('ijazah'),
			'C_KK' => $this->input->post('kartuKeluarga'),
			'C_SKHUN' => $this->input->post('skhun'),
			'C_NISN' => $this->input->post('cnisn'),
			'TANGGAL_PENDAFTARAN' => $this->input->post('tanggalPendaftaran')
		);

		// var_dump($data); exit;

		if($this->input->post('modeEdit') != ""){
			$this->MFormPendaftaran->replace("pendaftaran", $data);
		}else{
			$this->MFormPendaftaran->save("pendaftaran", $data);
		}

		redirect('formpendaftaran');
	}

	function delete(){
		$this->MFormPendaftaran->delete("pendaftaran", "NO_PENDAFTARAN", $this->input->get('noPendaftaran') );
		redirect('formpendaftaran');
	}

	function getDistinctNoPendaftaran(){
		echo json_encode($this->MFormPendaftaran->getDistinctNoPendaftaran()->result());
	}

	function getNamaByNo(){
		echo json_encode($this->MFormPendaftaran->getNamaByNo($this->input->get('noPendaftaran'))->result());
	}

}