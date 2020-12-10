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


	function laporan(){
		$this->load->view('header');
		$this->load->view('laporan_all');
		$this->load->view('footer');
	}

//	function cetaklaporan(){
//		$laporan = $this->input->post('laporan');
//
//		if($laporan == "Laporan Siswa"){
//
//			if($this->session->username == "tu" || $this->session->username == "admin"){
//				$data['data'] = $this->MSiswa->getAll()->result();
//			}else{
//				$data['data'] = $this->MSiswa->getSearchNama( $this->session->username );
//			}
//
//			$this->load->view('siswa_report', $data);
//		}else if ($laporan == "Laporan Kelas"){
//
//			if($this->session->username == "tu" || $this->session->username == "admin"){
//				$data['data'] = $this->MKelas->getAll()->result();
//			}else{
//
//				$cek = $this->MSiswa->getSearchNama( $this->session->username );
//
//				$data['data'] = $this->MKelas->getSearch($cek[0]->KODE_KELAS);
//
//			}
//
//			$this->load->view('kelas_report', $data);
//		}else if ($laporan == "Laporan Pembayaran"){
//
//			$data['data'] = $this->MFormPembayaran->getFindNama($this->session->username);
//
//			// var_dump($data); exit;
//
//			$data['jurusan'] = $this->MJurusan->getSearch($data['data'][0]->JURUSAN);
//
//			$this->load->view('form_pembayaran_faktur', $data);
//
//		}else if ($laporan == "Laporan Pendaftaran"){
//
//			$data['data'] = $this->MFormPendaftaran->getFindSiswa($this->session->username);
//			$this->load->view('form_pendaftaran_report2', $data);
//
//		}else if ($laporan == "Laporan Jurusan"){
//
//			if($this->session->username == "tu" || $this->session->username == "admin"){
//				$data['data'] = $this->MJurusan->getAll()->result();
//			}else{
//				$data['data'] = $this->MJurusan->getFindSiswa($this->session->username);
//			}
//
//			$this->load->view('jurusan_report', $data);
//
//		}else if($laporan == "Laporan Pembayaran TU"){
//
//			$data['data'] = $this->MFormPembayaran->getAllFaktur();
//			$this->load->view('form_pembayaran_faktur_all', $data);
//		}
//
//	}

	function report(){
		$data['data'] = $this->MSiswa->getAll()->result();
		$this->load->view('siswa_report', $data);
	}

	function index(){

		$data['data'] = $this->MSiswa->getAll()->result();

		//var_dump($data); exit;

		$this->load->view('header');
		$this->load->view('siswa_home', $data);
		$this->load->view('footer');
	}

	function save(){
		$data = array(
			'nisn' => $this->input->post('nisn'),
			'nama_siswa' => $this->input->post('nama_siswa'),
			'tempat_lahir' => $this->input->post('tempat_lahir'),
			'tanggal_lahir' => $this->input->post('tanggal_lahir'),
			'jenis_kelamin' => $this->input->post('jenis_kelamin'),
			'agama' => $this->input->post('agama'),
			'status_dalam_keluarga' => $this->input->post('status_dalam_keluarga'),
			'anak_ke' => $this->input->post('anak_ke'),
			'alamat_siswa' => $this->input->post('alamat_siswa'),
			'no_telepon_siswa' => $this->input->post('no_telepon_siswa'),
			'sekolah_asal' => $this->input->post('sekolah_asal'),
			'diterima_dikelas' => $this->input->post('diterima_dikelas'),
			'pada_tanggal' => $this->input->post('pada_tanggal'),
			'nama_ayah' => $this->input->post('nama_ayah'),
			'nama_ibu' => $this->input->post('nama_ibu'),
			'alamat_orangtua' => $this->input->post('alamat_orangtua'),
			'pekerjaan_ayah' => $this->input->post('pekerjaan_ayah'),
			'pekerjaan_ibu' => $this->input->post('pekerjaan_ibu'),
			'nama_walisiswa' => $this->input->post('nama_walisiswa'),
			'alamat_walisiswa' => $this->input->post('alamat_walisiswa'),
			'no_telepon_rumah' => $this->input->post('no_telepon_rumah'),
			'pekerjaan_walisiswa' => $this->input->post('pekerjaan_walisiswa')
		);

		$data2 = array(
			'KODE_USER' => $this->input->post('KODE_SISWA'),
			'NAMA_USER' => $this->input->post('NAMA_SISWA'),
			'PASSWORD' => "123",
			'TIPE' => "siswa"
		);

		//var_dump($data); exit;

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

		$this->MSiswa->delete("siswa", "nisn", $this->input->post('deleteId') );
		redirect('siswa');
	}

}