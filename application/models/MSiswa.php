<?php 
 
class MSiswa extends CI_Model{
	
	function getAll(){
		return $this->db->get('siswa');
	}

	public function getSearch($key){
		$this->db->select('*');
		$this->db->from('siswa');
		$this->db->where('KODE_SISWA', $key);
		return $this->db->get()->result();
	}

	public function getSearchNama($key){
		$this->db->select('*');
		$this->db->from('siswa');
		$this->db->where('NAMA_SISWA', $key);
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

	function getMaxNo(){
		return $this->db->query("select max(KODE_SISWA) as no from siswa ");
	}

}