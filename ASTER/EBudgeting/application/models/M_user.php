<?php defined('BASEPATH') or exit('NO direct script acces allowed');

class M_user extends CI_Model

{ 
    
    public function add_user()
    { 
        $data = array (
            'id_anggota' => '',
            'id_jabatan' => $this->input->post('id_jabatan'),
            'nama_anggota' => $this->input->post('nama_anggota'),
            'tgl_lahir' => $this->input->post('tgl_lahir'),
            'alamat' => $this->input->post('alamat'),
            'username' => $this->input->post('username'),
            'password' => $this->input->post('password')
        );
        $this->db->insert('pegawai', $data);

    }
    public function delete_user($id)
    { 
        $this->db->delete('pagu_anggaran', array('id_anggota' => $id));
        
        $this->db->delete('transfer', array('id_anggota' => $id));
        $ajuan = $this->db->get_where('pengajuan_anggaran', array('id_anggota' => $id))->result_array();
        foreach ($ajuan as $k) {
            $this->db->delete('detail_pengajuananggaran', array('id_pengajuan' => $k['id_pengajuan']));
        }
        $this->db->delete('pengajuan_anggaran', array('id_anggota' => $id));
        $this->db->delete('pegawai', array('id_anggota' => $id));

    }
    public function update_user()
    { 
        $id = $this->input->post('id_anggota');
        $data = array (
            'id_anggota' => $id,
            'id_jabatan' => $this->input->post('id_jabatan'),
            'nama_anggota' => $this->input->post('nama_anggota'),
            'tgl_lahir' => $this->input->post('tgl_lahir'),
            'alamat' => $this->input->post('alamat'),
            'username' => $this->input->post('username'),
            'password' => $this->input->post('password')
        );

        $this->db->update('pegawai', $data, array('id_anggota' => $id));


    }
    public function show_user($passw = null, $user = null)
    { 
        if (isset($passw) && isset($user)) {
            $username = $this->db->get_where('pegawai', array('username' => $user), 1)->num_rows();
            $password = $this->db->get_where('pegawai', array('password' => $passw), 1)->num_rows();
            if ($username == 1) {
                if ($password == 1) {
                    $query = $this->db->get_where('pegawai', array('username' => $user,'password' => $passw), 1);
                    return $query->result_array()[0];
                }
                else {
                    return array('password' => 'Password yang anda masukkan salah', 'status' => 0);
                }
            }
            else {
                return array('username' => 'Username yang anda masukkan salah' ,'password' => 'Password yang anda masukkan salah','status' => 0);
            }
            

          
        }
        
        else {
            $query = $this->db->get('pegawai');
            
            return $query->result();

        }


    }
    // tambahan
    public function show_user_id($id)
    {
        $query = $this->db->get_where('pegawai', array('id_anggota' => $id), 1);
     
        return $query->result();

    }
    
    
}
