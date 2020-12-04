<?php 
 
class MFormPendaftaran extends CI_Model{
	
	function getAll(){
		return $this->db->get('jurusan');
	}

	public function getSearch($key){
		$this->db->select('*');
		$this->db->from('jurusan');
		$this->db->where('kode_jurusan', $key);
		return $this->db->get()->result();
	}

	function save($table, $data){
		$this->db->insert($table,$data);
	}

	function replace($table, $data){
		$this->db->replace($table,$data);
	}

	function delete($table, $field, $id){
		$this->db->where($field, $id);
		$this->db->delete($table);
	}

	function getBetween($start, $end){
		return $this->db->query("select * from pendaftaran where TANGGAL_PENDAFTARAN BETWEEN '".$start."' and '".$end."'");
	}

	function getDistinctNoPendaftaran(){
		return $this->db->query("select nama_jurusan from jurusan ");
	}

	function getNamaByNo($no){
		return $this->db->query("select NAMA_CALON_SISWA from pendaftaran where NO_PENDAFTARAN = '".$no."' ");
	}

}