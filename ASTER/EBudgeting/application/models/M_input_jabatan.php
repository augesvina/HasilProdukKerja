<?php defined('BASEPATH') or exit('NO direct script acces allowed');

class M_input_jabatan extends CI_Model

{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_user');
       
        
    }
    public function add_jabatanM()
    {
        $data = array(
            'id_jabatan' => '',
            'nama_jabatan' => $this->input->post('nama'),
            'tingkatan_user' => $this->input->post('tingkat'),
            'sub_jabatan' => $this->input->post('sub_jabatan')
        );
        $this->db->insert('jabatan', $data);
    }
    public function delete_jabatanM($id)
    {   $a = $this->db->get_where('pegawai', array('id_jabatan' => $id))->result_array();
        foreach ($a as $k) {
           $this->M_user->delete_user($k['id_anggota']);
        }
        $this->db->delete('jabatan', array('id_jabatan' => $id));

    }
    public function update_jabatanM()
    {
        $id = $this->input->post('id_jabatan');
        $data = array(
            'id_jabatan' => $id,
            'nama_jabatan' => $this->input->post('nama'),
            'tingkatan_user' => $this->input->post('tingkat'),
            'hakakses' =>  $this->input->post('hakakses'),
            'sub_jabatan' => $this->input->post('sub_jabatan')
        );

        $this->db->update('jabatan', $data, array('id_jabatan' => $id));
    }
    public function show_jabatanM($id = null)
    {
        if (isset($id)) {
            $query = $this->db->get_where('jabatan', array('id_jabatan' => $id));
            return $query->result_array();
        } else {
            $query = $this->db->get('jabatan');
            return $query->result_array();
        }
    }

    public function hakakses()
    {
        $id = $this->input->post('id_jabatan');

        $hakakses = implode(" , ", $this->input->post('hakakses'));

        $data = array(
            'id_jabatan' => $id,
            'nama_jabatan' => $this->input->post('nama'),
            'tingkatan_user' => $this->input->post('tingkat'),
            'hakakses' =>  $hakakses
        );

        $this->db->update('jabatan', $data, array('id_jabatan' => $id));
    }

    public function cekhakakses($id)
    {
        // Mengecheck hak akses


        $query = $this->db->get_where('jabatan', array('id_jabatan' => $id));
        return explode(' , ', $query->result_array()[0]['hakakses']);
    }

    public function subjabatan($id = null)
    {
        if (!isset($id)) {
            $arr = array();
            $query = $this->db->query("SELECT `sub_jabatan` FROM `jabatan` WHERE `sub_jabatan` != '' AND `tingkatan_user` = 'dm'");
    
            foreach ($query->result_array() as $key) :
                foreach ($key as $a) {
    
                    foreach (explode(', ', $a) as $k) {
    
                        $arr[] = $k;
                        
                    }
                }
    
    
    
            endforeach;
            
        }
        else {
            $arr = array();
            $this->db->select('sub_jabatan');
            $this->db->from('jabatan');
            $this->db->where('id_jabatan', $id);

            $query = $this->db->get();
         
    
            foreach ($query->result_array() as $key) :
                foreach ($key as $a) {
    
                    foreach (explode(', ', $a) as $k) {
    
                        $arr[] = $k;
                        
                    }
                }
    
    
    
            endforeach;

        }
      

        return $arr;
    }
}
