<?php
class M_admin extends CI_Model{

	function set_admin($user_ip){
		$hsl=$this->db->query("INSERT INTO tbl_admin (admin_ip) VALUES ('$user_ip')");
		return $hsl;
	}

	function statistik_admin(){
        $query = $this->db->query("SELECT DATE_FORMAT(admin_tanggal,'%d') AS tgl,COUNT(admin_ip) AS jumlah FROM tbl_admin WHERE MONTH(admin_tanggal)=MONTH(CURDATE()) GROUP BY DATE(admin_tanggal)");
         
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }

	
}