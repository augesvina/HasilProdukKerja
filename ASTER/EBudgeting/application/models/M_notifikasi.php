<?php defined('BASEPATH') or exit('NO direct script acces allowed');

class M_notifikasi extends CI_Model

{
    public function id_generator() {
        $numrows = $this->db->get('notifikasi')->num_rows();
        $generateid = date('ymd') .  str_pad($numrows,1,STR_PAD_LEFT);
        return $generateid;

    }

    public function add_notifikasi($jenis_notifikasi, $status)
    {
        $query = $this->db->get_where('notifikasi', array('id_pengajuan' => $this->input->post('id_pengajuan')), 1);
        if ($query->num_rows() == 0) {
            $data = array(
                'id_notifikasi' => $this->id_generator(),
                'id_anggota' => $this->session->userdata('id_anggota'),
                'jenis_notifikasi' => $jenis_notifikasi,
                'id_pengajuan' => $this->input->post('id_pengajuan'),
                'tipe_notifikasi' => $status,
                'sudah_dibaca' => '0',

            );


            $this->db->insert('notifikasi', $data);
        }else {
            $notification = $query->result_array()[0];

            $this->update_notifikasi($notification['id_anggota'], $notification['id_notifikasi'], $jenis_notifikasi,$status);
        }
    }
    public function hapus_notifikasi($id)
    {
     
        $this->db->delete('notifikasi', array('id_pengajuan' => $id));
    
    }
    public function update_notifikasi($id_anggota ,$id, $jenis_notifikasi,$status)
    {
   

     
        $data = array(
            'id_notifikasi' => $id,
            'id_anggota' => $id_anggota,
            'jenis_notifikasi' => $jenis_notifikasi,
            'id_pengajuan' => $this->input->post('id_pengajuan'),
            'tipe_notifikasi' => $status,
            'sudah_dibaca' => '0',

        );
        
     

        $this->db->update('notifikasi', $data, array('id_notifikasi' => $id));
    }
    
}
