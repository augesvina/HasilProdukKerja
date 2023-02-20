<?php defined('BASEPATH') or exit('NO direct script acces allowed');

class M_detailajuan extends CI_Model

{
    public function add_detailanggaranM()
    {
        
        $data = array(
            'id_detailpengajuan' => '',
            'id_subpos2' => $this->input->post('id_subpos2'),
            'id_pengajuan' => $this->input->post('id_pengajuan'),
            'id_subpos' => $this->input->post('id_subpos'),
            'id_pos' => $this->input->post('id_pos'),
            'nominal_pengajuan2' => $this->input->post('nominal'),
            'nominal_persetujuan2' => '',
            'deskripsi2' => $this->input->post('deskripsi'),
            'kegiatan2' => $this->input->post('kegiatan')
        );
        $this->db->insert('detail_pengajuananggaran', $data);
    }
    public function delete_detailanggaranM($id)
    {
        $this->db->delete('detail_pengajuananggaran', array('id_detailpengajuan' => $id));
    }

    // New 
    public function delete_alldetailanggaranM($id)
    {
        $this->db->delete('detail_pengajuananggaran', array('id_pengajuan' => $id));
    }

    
    public function update_detailanggaranM()
    {
        $id_detailpengajuan = $this->input->post('id_detailpengajuan');
		
		
		$id_pengajuan =$this->input->post('id_pengajuan');
		$data = array(
            'id_detailpengajuan' => $id_detailpengajuan,
            'id_subpos2' => $this->input->post('id_subpos2'),
            'id_pengajuan' => $id_pengajuan,
            'id_subpos' => $this->input->post('id_subpos'),
            'id_pos' => $this->input->post('id_pos'),
            'nominal_pengajuan2' => $this->input->post('nominal'),
            'nominal_persetujuan2' => '',
            'deskripsi2' => $this->input->post('deskripsi'),
            'kegiatan2' => $this->input->post('kegiatan')
        );
        echo "\n";
        print_r($data);
        $this->db->update('detail_pengajuananggaran', $data, array('id_detailpengajuan' => $id_detailpengajuan));

      
    }

    public function update_pengajuanDM()
    {
        $id_detailpengajuan = $this->input->post('id_detailpengajuan');
		
		print_r($_POST);
		$id_pengajuan = $this->input->post('id_pengajuan');
		for ($i=0; $i < count($id_detailpengajuan); $i++) { 
			$data = array(
				'id_detailpengajuan' => $id_detailpengajuan[$i],
				'id_subpos2' => $this->input->post('id_subpos2')[$i],
				'id_pengajuan' => $id_pengajuan,
				'id_subpos' => $this->input->post('id_subpos')[$i],
				'id_pos' => $this->input->post('id_pos')[$i],
				'nominal_pengajuan2' => $this->input->post('nominal')[$i],
				'nominal_persetujuan2' => $this->input->post('nominal_persetujuan2')[$i],
				'deskripsi2' => $this->input->post('deskripsi')[$i],
				'kegiatan2' => $this->input->post('kegiatan')[$i]
			);
    
            $this->db->update('detail_pengajuananggaran', $data, array('id_detailpengajuan' => $id_detailpengajuan[$i]));
			
		}

    

    }
    public function show_detailanggaranM()
    {

        $query = $this->db->get('detail_pengajuananggaran');
        return $query->result();
    }
    public function showbyid_detailanggaranM($id)
    {
        $this->db->select('*');
        $this->db->from('detail_pengajuananggaran');
        $this->db->join('pos', 'detail_pengajuananggaran.id_pos = pos.id_pos');
        $this->db->join('sub_pos', 'detail_pengajuananggaran.id_subpos = sub_pos.id_subpos');
        $this->db->join('sub_pos2', 'detail_pengajuananggaran.id_subpos2 = sub_pos2.id_subpos2');
        $this->db->where('id_pengajuan ', $id);
        $query = $this->db->get();


        // Produces:
        // SELECT * FROM blogs JOIN comments ON comments.id = blogs.id
        // $query = $this->db->get_where('detail_pengajuananggaran', array('id_pengajuan' => $id));
        return $query->result_array();
    }
    // Penambahan Fungsi
    public function hitunganggaran($id)
    {
        $this->db->select_sum('nominal_pengajuan2');
        $this->db->select_sum('nominal_persetujuan2');
        $query = $this->db->get_where('detail_pengajuananggaran', array('id_pengajuan' => $id));
        return $query->result_array();
    }
    public function item($id)
    {
        
        $query = $this->db->get_where('detail_pengajuananggaran', array('id_pengajuan' => $id));
        return $query->num_rows();
    }
  
}
