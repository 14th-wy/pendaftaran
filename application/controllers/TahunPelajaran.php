<?php


class TahunPelajaran extends CI_Controller{

    function __construct(){
        parent::__construct();
        $this->load->library('pdftc');
        $this->load->model('MTahunPelajaran');
        $this->load->model('MFormPendaftaran');
        $this->load->helper('url');
        $this->load->library('session');
    }

    function report(){
        $data['data'] = $this->MTahunPelajaran->getAll()->result();
        $this->load->view('', $data);
    }

    function index(){

        $data['data'] = $this->MTahunPelajaran->getAll()->result();


        // var_dump($data); exit;

        $this->load->view('header');
        $this->load->view('tahunpelajaran', $data);
        $this->load->view('footer');
    }

    function save(){
        $data = array(
            'kode_tahun' => $this->input->post('kode_tahun'),
            'tahun_pelajaran' => $this->input->post('tahun_pelajaran'),
            'semester' => $this->input->post('semester')
        );

        // var_dump($data); exit;

        if($this->input->post('modeEdit') != ""){
            $this->MTahunPelajaran->replace("tahun_pelajaran", $data);
        }else{
            $this->MTahunPelajaran->save("tahun_pelajaran", $data);
        }

        redirect('tahunpelajaran');
    }

    function delete(){
        $this->MTahunPelajaran->delete("tahun_pelajaran", "kode_tahun", $this->input->get('kode_tahun') );
        redirect('tahunpelajaran');
    }

}