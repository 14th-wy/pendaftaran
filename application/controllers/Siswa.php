<?php


class Siswa extends CI_Controller{
 
	function __construct(){
		parent::__construct();		
		$this->load->library('pdftc');
		$this->load->model('MJurusan');
		$this->load->model('MMasuk');
		$this->load->model('MFormPendaftaran');
		$this->load->model('MKelas');
		$this->load->model('MSiswa');
		$this->load->model('MFormPembayaran');
		$this->load->helper('url');
		$this->load->library('session');
	}

	function getno(){
		$no = $this->MSiswa->getMaxNo()->result();
		$urutan = (int) substr($no[0]->no, 2, 2);

		$urutan++;

		$huruf = "KS";
		$kode = $huruf . sprintf("%02s", $urutan);

		echo json_encode($kode);
	}

	function laporan(){
		$this->load->view('header');
		$this->load->view('laporan_all');
		$this->load->view('footer');
	}

	function cetaklaporan(){
		$laporan = $this->input->post('laporan');

		if($laporan == "Laporan Siswa"){

			if($this->session->username == "tu" || $this->session->username == "admin"){
				$data['data'] = $this->MSiswa->getAll()->result();
			}else{
				$data['data'] = $this->MSiswa->getSearchNama( $this->session->username );
			}

			$this->load->view('siswa_report', $data);
		}else if ($laporan == "Laporan Kelas"){

			if($this->session->username == "tu" || $this->session->username == "admin"){
				$data['data'] = $this->MKelas->getAll()->result();
			}else{

				$cek = $this->MSiswa->getSearchNama( $this->session->username );
	
				$data['data'] = $this->MKelas->getSearch($cek[0]->KODE_KELAS);

			}

			$this->load->view('kelas_report', $data);
		}else if ($laporan == "Laporan Pembayaran"){

			$data['data'] = $this->MFormPembayaran->getFindNama($this->session->username);

			// var_dump($data); exit;

			$data['jurusan'] = $this->MJurusan->getSearch($data['data'][0]->JURUSAN);

			$this->load->view('form_pembayaran_faktur', $data);

		}else if ($laporan == "Laporan Pendaftaran"){

			$data['data'] = $this->MFormPendaftaran->getFindSiswa($this->session->username);
			$this->load->view('form_pendaftaran_report2', $data);

		}else if ($laporan == "Laporan Jurusan"){

			if($this->session->username == "tu" || $this->session->username == "admin"){
				$data['data'] = $this->MJurusan->getAll()->result();
			}else{
				$data['data'] = $this->MJurusan->getFindSiswa($this->session->username);
			}

			$this->load->view('jurusan_report', $data);

		}else if($laporan == "Laporan Pembayaran TU"){

			$data['data'] = $this->MFormPembayaran->getAllFaktur();
			$this->load->view('form_pembayaran_faktur_all', $data);
		}

	}

	function report(){
		$data['data'] = $this->MSiswa->getAll()->result();
		$this->load->view('siswa_report', $data);
	}

	function index(){

		$data['data'] = $this->MSiswa->getAll()->result();
		$data['kodeKelas'] = $this->MKelas->getDistinctKodeKelas()->result();
		$data['noPembayaran'] = $this->MFormPembayaran->getDistinctNoPembayaran()->result();

		// var_dump($data); exit;

		$this->load->view('header');
		$this->load->view('siswa_home', $data);
		$this->load->view('footer');
	}

	function save(){
		$data = array(
			'NO_PEMBAYARAN' => $this->input->post('NO_PEMBAYARAN'),
			'KODE_SISWA' => $this->input->post('KODE_SISWA'),
			'NAMA_SISWA' => $this->input->post('NAMA_SISWA'),
			'KODE_KELAS' => $this->input->post('KODE_KELAS'),
			'NAMA_JURUSAN' => $this->input->post('NAMA_JURUSAN')
		);

		$data2 = array(
			'KODE_USER' => $this->input->post('KODE_SISWA'),
			'NAMA_USER' => $this->input->post('NAMA_SISWA'),
			'PASSWORD' => "123",
			'TIPE' => "siswa"
		);

		// var_dump($data); exit;

		if($this->input->post('modeEdit') != ""){
			$this->MSiswa->replace("siswa", $data);
		}else{
			$this->MSiswa->save("siswa", $data);
			//$this->MMasuk->save("masuk", $data2);
		}

		redirect('siswa');
	}

	function delete(){

		// var_dump($this->input->post('delete_kodeKelas')); exit;

		$this->MSiswa->delete("siswa", "KODE_SISWA", $this->input->post('deleteId') );
		redirect('siswa');
	}

	function getNamaByNo(){
		echo json_encode($this->MJurusan->getNamaByNo($this->input->get('noPendaftaran'))->result());
	}

	

}