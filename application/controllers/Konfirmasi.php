<?php


class Konfirmasi extends CI_Controller{
 
	function __construct(){
		parent::__construct();		
		$this->load->library('pdftc');
		$this->load->model('MJurusan');
		$this->load->model('MFormPendaftaran');
		$this->load->model('MFormPembayaran');	
		$this->load->model('MKelas');
		$this->load->helper('url');
		$this->load->library('session');
	}

    function index(){

		$siswa = $this->session->username;
		$data['data'] = $this->MFormPendaftaran->getDistinctNoPendaftaranBySiswa( $siswa )->result();

		// var_dump($data); exit;

		$this->load->view('header');
		$this->load->view('konfirmasi_pembayaran', $data);
		$this->load->view('footer');
	}

	// Fungsi untuk melakukan proses upload file
	public function upload(){

        $no = $this->MFormPembayaran->getMaxNo()->result();
		$urutan = (int) substr($no[0]->no, 2, 2);

		$urutan++;

		$huruf = "NB";
		$kode = $huruf . sprintf("%02s", $urutan);

		$config['upload_path'] = './public/';
		$config['allowed_types'] = 'jpg|png|jpeg';
		$config['max_size']  = '2048';
        $config['remove_space'] = TRUE;
        $config['file_name'] = $kode;
	  
		$this->load->library('upload', $config); // Load konfigurasi uploadnya
		if($this->upload->do_upload('berkas')){ // Lakukan upload dan Cek jika proses upload berhasil
          // Jika berhasil :
          
          $data = array(
                'NO_PEMBAYARAN' => $kode,
                'JURUSAN' => "",
                'NO_PENDAFTARAN' => $this->input->post('noPendaftaran'),
                'NAMA_CALON_SISWA' => $this->session->username,
                'UNTUK_PEMBAYARAN' => "",
                'JUMLAH' => "0",
                'TANGGAL_PEMBAYARAN' => "",
                'KETERANGAN' => "",
                'BUKTI_TF' => $this->upload->data()['orig_name'],
                'BENDAHARA' => ""
            );
            
            $this->MFormPembayaran->save("pembayaran", $data);

            $return = array('result' => 'success', 'file' => $this->upload->data(), 'error' => '');
			// echo json_encode($return);
			redirect('home');
		}else{
            // Jika gagal :
            $return = array('result' => 'failed', 'file' => '', 'error' => $this->upload->display_errors());
            echo json_encode($return);
        }
        // echo "OKE";
	}

	// Fungsi untuk menyimpan data ke database
	public function save($upload){
		$data = array(
		  'deskripsi'=>$this->input->post('input_deskripsi'),
		  'nama_file' => $upload['file']['file_name'],
		  'ukuran_file' => $upload['file']['file_size'],
		  'tipe_file' => $upload['file']['file_type']
		);
		
		$this->db->insert('gambar', $data);
    }
    
}