<?php


class Siswa extends CI_Controller{
 
	function __construct(){
		parent::__construct();		
		$this->load->model('MJurusan');
		$this->load->model('MFormPendaftaran');
		$this->load->model('MKelas');
		$this->load->model('MSiswa');
		$this->load->model('MFormPembayaran');
		$this->load->helper('url');
	}

	function index(){

		$data['data'] = $this->MSiswa->getAll()->result();
		$data['kodeKelas'] = $this->MSiswa->getAll()->result();
		// var_dump($data); exit;

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
			'status_dalamkeluarga' => $this->input->post('status_dalamkeluarga'),
			'anak_ke' => $this->input->post('anak_ke'),
			'alamat_siswa' => $this->input->post('alamat_siswa'),
			'no_telponsiswa' => $this->input->post('no_telponsiswa'),
			'sekolah_asal' => $this->input->post('sekolah_asal'),
			'diterima_dikelas' => $this->input->post('diterima_dikelas'),
			'pada_tanggal' => $this->input->post('pada_tanggal'),
			'nama_ayah' => $this->input->post('nama_ayah'),
			'nama_ibu' => $this->input->post('nama_ibu'),
			'alamat_ortu' => $this->input->post('alamat_ortu'),
			'no_telponortu' => $this->input->post('no_telponortu'),
			'pekerjaan_ayah' => $this->input->post('pekerjaan_ayah'),
			'pekerjaan_ibu' => $this->input->post('pekerjaan_ibu'),
			'nama_walisiswa' => $this->input->post('nama_walisiswa'),
			'alamat_walisiswa' => $this->input->post('alamat_walisiswa'),
			'no_teleponrumah' => $this->input->post('no_teleponrumah'),
			'pekerjaan_walisiswa' => $this->input->post('pekerjaan_walisiswa'),
			'kode_kelas' => $this->input->post('kode_kelas'),
			'kode_tahun' => $this->input->post('kode_tahun'),
		);

		// var_dump($data); exit;

		if($this->input->post('modeEdit') != ""){
			$this->MSiswa->replace("siswa", $data);
		}else{
			$this->MSiswa->save("siswa", $data);
		}

		redirect('siswa');
	}

	function delete(){

		// var_dump($this->input->post('delete_kodeKelas')); exit;

		$this->MSiswa->delete("siswa", "nisn", $this->input->post('delete_kodeKelas') );
		redirect('siswa');
	}

	function getNamaByNo(){
		echo json_encode($this->MJurusan->getNamaByNo($this->input->get('noPendaftaran'))->result());
	}

	

}