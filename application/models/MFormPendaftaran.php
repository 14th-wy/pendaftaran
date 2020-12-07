<?php 
 
class MFormPendaftaran extends CI_Model{
	
	function getAll(){
		return $this->db->get('mata_pelajaran');
	}

	public function getSearch($key){
		$this->db->select('*');
		$this->db->from('mata_pelajaran');
		$this->db->where('kode_matpel', $key);
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


}