<?php defined('BASEPATH') OR exit('No direct script access allowed');

class M_pegawai extends CI_Model
{
    

    public function rules()
    {
        return [
            ['field' => 'id_jabatan',
            'label' => 'Id_jabatan',
            'rules' => 'numeric'],
            
            ['field' => 'nama_anggota',
            'label' => 'Nama_anggota',
            'rules' => 'required'],
            
            ['field' => 'tgl_lahir',
            'label' => 'Tgl_lahir',
            'rules' => 'required'],

            ['field' => 'alamat',
            'label' => 'Alamat',
            'rules' => 'required'],
            
            ['field' => 'jabatan',
            'label' => 'Jabatan',
            'rules' => 'required'],

            ['field' => 'username',
            'label' => 'Username',
            'rules' => 'required'],
            
            ['field' => 'password',
            'label' => 'Password',
            'rules' => 'required']

        ];
    }

    public function getAll()
    {
        return $this->db->get('pegawai')->result_array();
    }
    
    public function getById($id)
    {
        return $this->db->get_where('pegawai', ["id_anggota" => $id])->result_array();
    }

    public function save()
    {
        print_r($_POST);
        $data = array(

            'id_anggota' => '',
            'id_jabatan' => '2',
            'nama_anggota' => $this->input->post('nama_anggota'),
            'tgl_lahir' => $this->input->post('tgl_lahir'),
            'alamat' => $this->input->post('alamat'),
            'jabatan' => $this->input->post('jabatan'),
            'username' => $this->input->post('username'),
            'password' => $this->input->post('password')

 
        );
       
        
        $this->db->insert('pegawai', $data);
    }

    public function update()
    {
        $id = $this->input->post('id_anggota');
        
        
        $data = array(

            'id_anggota' => $id,
            'id_jabatan' => $this->input->post('id_jabatan'),
            'nama_anggota' => $this->input->post('nama_anggota'),
            'tgl_lahir' => $this->input->post('tgl_lahir'),
            'alamat' => $this->input->post('alamat'),
            'jabatan' => $this->input->post('jabatan'),
            'username' => $this->input->post('username'),
            'password' => $this->input->post('password')

 
        );
       
        $this->db->update('pegawai', $data, array('id_anggota' => $id));
    }

    public function delete($id)
    {
        $this->db->delete('pegawai', array("id_anggota" => $id));
    }
}
