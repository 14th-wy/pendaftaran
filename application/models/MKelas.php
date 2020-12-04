<?php 
 
class MKelas extends CI_Model{
	
	function getAll(){
		return $this->db->get('datakelas');
	}

	public function getSearch($key){
		$this->db->select('*');
		$this->db->from('datakelas');
		$this->db->where('kode_kelas', $key);
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
		return $this->db->query("select * from jurusan where TANGGAL_PENDAFTARAN BETWEEN '".$start."' and '".$end."'");
	}

	function getDistinctKodeKelas(){
		return $this->db->query("select kode_kelas from kelas");
	}

}