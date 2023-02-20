<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SearchModel extends CI_Model {

	public function ambil_data($keyword=null){
		$this->db->select('*');
		$this->db->from('pengajuan_anggaran');
		if(!empty($keyword)){
			$this->db->like('bulan2',$keyword);
		}
		return $this->db->get()->result_array();
	}

		public function ambil_data2($keyword=null){
		$this->db->select('*');
		$this->db->from('pengajuan_anggaran');
		if(!empty($keyword)){
			$this->db->like('minggu2',$keyword);
		}
		return $this->db->get()->result_array();
	}

}