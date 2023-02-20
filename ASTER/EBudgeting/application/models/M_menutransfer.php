<?php defined('BASEPATH') OR exit('No direct script access allowed');

class M_menutransfer extends CI_Model
{
    

    public function rules()
    {
        return [
            ['field' => 'id_anggota',
            'label' => 'Id_anggota',
            'rules' => 'numeric'],
            
            ['field' => 'nama_pengirim',
            'label' => 'Nama_pengirim',
            'rules' => 'required'],
            
            ['field' => 'email',
            'label' => 'Email',
            'rules' => 'required'],

            ['field' => 'no_telp',
            'label' => 'No_telp',
            'rules' => 'numeric'],

            ['field' => 'no_rekening',
            'label' => 'No_rekening',
            'rules' => 'numeric'],
            
            ['field' => 'nama_bank',
            'label' => 'Nama_bank',
            'rules' => 'required'],
            
            ['field' => 'tgl_kirim',
            'label' => 'Tgl_kirim',
            'rules' => 'required'],

            ['field' => 'description',
            'label' => 'Description',
            'rules' => 'required'],
            
            ['field' => 'PPN',
            'label' => 'PPN',
            'rules' => 'numeric'],

            ['field' => 'PPH_21',
            'label' => 'PPH_21',
            'rules' => 'numeric'],

            ['field' => 'PPH_22',
            'label' => 'PPH_22',
            'rules' => 'numeric'],

            ['field' => 'PPH_23',
            'label' => 'PPH_23',
            'rules' => 'numeric'],

            ['field' => 'denda',
            'label' => 'Denda',
            'rules' => 'numeric'],

            ['field' => 'administrasi_bank',
            'label' => 'Administrasi_bank',
            'rules' => 'numeric'],

            ['field' => 'total_dibayar',
            'label' => 'Total_dibayar',
            'rules' => 'numeric'],

            ['field' => 'berita',
            'label' => 'Berita',
            'rules' => 'required'],

            ['field' => 'honor_asesmen',
            'label' => 'Honor_asesmen',
            'rules' => 'numeric'],

            ['field' => 'honor_evaluator',
            'label' => 'Honor_evaluator',
            'rules' => 'numeric'],

            ['field' => 'nilai_kontrak',
            'label' => 'Nilai_kontrak',
            'rules' => 'required'],

            ['field' => 'honor_tester',
            'label' => 'Honor_tester',
            'rules' => 'numeric'],

            ['field' => 'honor_feedback',
            'label' => 'Honor_feedback',
            'rules' => 'numeric'],

            ['field' => 'pekerjaan',
            'label' => 'Pekerjaan',
            'rules' => 'required'],

            ['field' => 'honor_pewawancara',
            'label' => 'Honor_pewawancara',
            'rules' => 'numeric'],

            ['field' => 'honor_korektor_pauli',
            'label' => 'Honor_korektor_pauli',
            'rules' => 'numeric'],

            ['field' => 'lumpsum_transport_bandara',
            'label' => 'Lumpsum_transport_bandara',
            'rules' => 'required'],

            ['field' => 'lumpsum_komsumsi',
            'label' => 'Lumpsum_komsumsi',
            'rules' => 'required'],

            ['field' => 'lumpsum_transpoet_lok',
            'label' => 'Lumpsum_transpoet_lok',
            'rules' => 'required'],

            ['field' => 'waktu_kerja',
            'label' => 'Waktu_kerja',
            'rules' => 'required'],

            ['field' => 'lumpsum_uang_cod',
            'label' => 'Lumpsum_uang_cod',
            'rules' => 'required']

        ];
    }

    public function getAll()
    {
        return $this->db->get('transfer')->result_array();
    }
    
    public function getById($id)
    {
        return $this->db->get_where('transfer', ["id_transfer" => $id])->result_array();
    }

    public function save()
    {
        print_r($_POST);
        $data = array(

            'id_transfer' => '',
            'id_anggota' => $this->session->userdata('id_anggota'),
            'nama_pengirim' => $this->input->post('nama_pengirim'),
            'email' => $this->input->post('email'),
            'no_telp' => $this->input->post('no_telp'),
            'no_rekening' => $this->input->post('no_rekening'),
            'nama_bank' => $this->input->post('nama_bank'),
            'tgl_kirim' => $this->input->post('tgl_kirim'),
            'kategori' => $this->input->post('kategori'),
            'PPN' => $this->input->post('PPN'),
            'PPH_21' => $this->input->post('PPH_21'),
            'PPH_22' => $this->input->post('PPH_22'),
            'PPH_23' => $this->input->post('PPH_23'),
            'denda' => $this->input->post('denda'),
            'administrasi_bank' => $this->input->post('administrasi_bank'),
            'total_dibayar' => $this->input->post('total_dibayar'),
            'berita' => $this->input->post('berita'),
            'honor_asesmen' => $this->input->post('honor_asesmen'),
            'honor_evaluator' => $this->input->post('honor_evaluator'),
            'nilai_kontrak' => $this->input->post('nilai_kontrak'),
            'honor_tester' => $this->input->post('honor_tester'),
            'honor_feedback' => $this->input->post('honor_feedback'),
            'pekerjaan' => $this->input->post('pekerjaan'),
            'honor_pewawancara' => $this->input->post('honor_pewawancara'),
            'honor_korektor_pauli' => $this->input->post('honor_korektor_pauli'),
            'lumpsum_transport_bandara' => $this->input->post('lumpsum_transport_bandara'),
            'lumpsum_komsumsi' => $this->input->post('lumpsum_komsumsi'),
            'lumpsum_transpoet_lok' => $this->input->post('lumpsum_transpoet_lok'),
            'waktu_kerja' => $this->input->post('waktu_kerja'),
            'lumpsum_uang_cod' => $this->input->post('lumpsum_uang_cod')

 
        );
       
        
        $this->db->insert('transfer', $data);
    }

    public function update($id)
    {
        $post = $this->input->post();
        $data = array(

            'id_transfer' => $id,
            'id_anggota' => $this->input->post('id_anggota'),
            'nama_pengirim' => $this->input->post('nama_pengirim'),
            'email' => $this->input->post('email'),
            'no_telp' => $this->input->post('no_telp'),
            'no_rekening' => $this->input->post('no_rekening'),
            'nama_bank' => $this->input->post('nama_bank'),
            'tgl_kirim' => $this->input->post('tgl_kirim'),
            'kategori' => $this->input->post('kategori'),
            'PPN' => $this->input->post('PPN'),
            'PPH_21' => $this->input->post('PPH_21'),
            'PPH_22' => $this->input->post('PPH_22'),
            'PPH_23' => $this->input->post('PPH_23'),
            'denda' => $this->input->post('denda'),
            'administrasi_bank' => $this->input->post('administrasi_bank'),
            'total_dibayar' => $this->input->post('total_dibayar'),
            'berita' => $this->input->post('berita'),
            'honor_asesmen' => $this->input->post('honor_asesmen'),
            'honor_evaluator' => $this->input->post('honor_evaluator'),
            'nilai_kontrak' => $this->input->post('nilai_kontrak'),
            'honor_tester' => $this->input->post('honor_tester'),
            'honor_feedback' => $this->input->post('honor_feedback'),
            'pekerjaan' => $this->input->post('pekerjaan'),
            'honor_pewawancara' => $this->input->post('honor_pewawancara'),
            'honor_korektor_pauli' => $this->input->post('honor_korektor_pauli'),
            'lumpsum_transport_bandara' => $this->input->post('lumpsum_transport_bandara'),
            'lumpsum_komsumsi' => $this->input->post('lumpsum_komsumsi'),
            'lumpsum_transpoet_lok' => $this->input->post('lumpsum_transpoet_lok'),
            'waktu_kerja' => $this->input->post('waktu_kerja'),
            'lumpsum_uang_cod' => $this->input->post('lumpsum_uang_cod')

 
        );
       
        $this->db->update('transfer', $data, array('id_transfer' => $id));
    }

    public function delete($id)
    {
        $this->db->delete('transfer', array("id_transfer" => $id));
    }
}
