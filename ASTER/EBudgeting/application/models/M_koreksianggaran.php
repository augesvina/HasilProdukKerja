<?php defined('BASEPATH') or exit('NO direct script acces allowed');

class M_koreksianggaran extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_detailajuan');
    }
    // Sub bidang


    public function update_koreksi()
    {

        $id = $this->input->post('id_pengajuan');
        $nominalpengajuan = $this->M_detailajuan->hitunganggaran($id)[0]['nominal_pengajuan2'];
        $data = array(
            'id_pengajuan' => $id,
            'id_anggota' => $this->input->post('id_anggota'),
            'catatan_dm2' => $this->input->post('catatan_dm2'),
            'total_pengajuan2' => $nominalpengajuan,
            'minggu2' => $this->input->post('minggu2'),
            'bulan2' => $this->input->post('bulan2'),
            'catatan_dmpau2' => $this->input->post('catatan_dmpau2'),
            'status2' => $this->input->post('status2'),
            'tanggal_mulai2' => $this->input->post('tanggal_mulai2'),
            'tanggal_sampai2' => $this->input->post('tanggal_sampai2'),
            'tgl_pengajuan2' => $this->input->post('tgl_pengajuan2'),
            'tahun' =>  $this->input->post('tahun')
        );

        $this->db->update('pengajuan_anggaran', $data, array('id_pengajuan' => $id));

        $id_detailpengajuan = $this->input->post('id_detailpengajuan');
		
		
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
}
