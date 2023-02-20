<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class M_paguanggaran extends CI_Model
{
    

    public function rules()
    {
        return [
            ['field' => 'id_anggota',
            'label' => 'Id_anggota',
            'rules' => 'numeric'],
            
            ['field' => 'nominal_pagu',
            'label' => 'Nominal_pagu',
            'rules' => 'required'],
            
            ['field' => 'nominal_terpakai',
            'label' => 'Nominal_terpakai',
            'rules' => 'required'],

            ['field' => 'bulan',
            'label' => 'Bulan',
            'rules' => 'required'],
            
            ['field' => 'tahun',
            'label' => 'Tahun',
            'rules' => 'required']

        ];
    }

    public function getAll()
    {
        return $this->db->get('pagu_anggaran')->result_array();
    }
    
    public function getById($id)
    {
        return $this->db->get_where('pagu_anggaran', ["id_paguanggaran" => $id])->result_array();
    }

    public function save()
    {
        $data = array(

            'id_paguanggaran' => '',
            'id_anggota' =>  $this->session->userdata('id_anggota'),
            'nominal_pagu' => $this->input->post('nominal_pagu'),
            'nominal_terpakai' =>'0',
            'bulan' => $this->input->post('bulan'),
            'tahun' => $this->input->post('tahun')

 
        );
       
        
        $this->db->insert('pagu_anggaran', $data);
    }

    public function update()
    {
        $id = $this->input->post('id_paguanggaran');
        
        
        
        $data = array(

            'id_paguanggaran' => $id,
            'id_anggota' => $this->input->post('id_anggota'),
            'nominal_pagu' => $this->input->post('nominal_pagu'),
            'nominal_terpakai' => $this->input->post('nominal_terpakai'),
            'bulan' => $this->input->post('bulan'),
            'tahun' => $this->input->post('tahun')

 
        );
       
        $this->db->update('pagu_anggaran', $data, array('id_paguanggaran' => $id));
    }
    public function checkPagu($tgl)

    {
        $tanggal = strtotime($tgl);
        $Convbulan = date('m', $tanggal);
        
        $bulan = array("01"=>'Januari', "02"=>'Februari', "03"=>'Maret', "04"=>'April', "05"=>'Mei', "06"=>'Juni', "07"=>'Juli', "08"=>'Agustus', "09"=>'September', "10"=>'Oktober', "11"=>'November', "12"=>'Desember');
       
        $tahun = date('Y', $tanggal);
        // Mencari Pagu yang sesuai tanggal yang ditentukan
        $pagu = $this->db->get_where('pagu_anggaran', array('bulan' => $bulan[$Convbulan],'tahun' => $tahun), 1)->result_array();
        return $pagu;
        
    }

    public function updatepagu($tgl)
    {
        $tanggal = strtotime($tgl);
        
        
        $Convbulan = date('m', $tanggal);
        
        
        $bulan = array("01"=>'Januari', "02"=>'Februari', "03"=>'Maret', "04"=>'April', "05"=>'Mei', "06"=>'Juni', "07"=>'Juli', "08"=>'Agustus', "09"=>'September', "10"=>'Oktober', "11"=>'November', "12"=>'Desember');
        
        
        $tahun = date('Y', $tanggal);
        // Mencari Pagu yang sesuai tanggal yang ditentukan
        $pagu = $this->db->get_where('pagu_anggaran', array('bulan' => $bulan[$Convbulan],'tahun' => $tahun), 1)->result_array();
        
        if (!empty($pagu)) {
            // Jumlah pengajuananggaran
            $bulansebelum = $tahun.'-'.str_pad($Convbulan-1, 2, '0', STR_PAD_LEFT).'-15';
            $bulansesudah = $tahun.'-'.$Convbulan.'-16';

            $ajuan = $this->db->query(sprintf("SELECT sum(total_pengajuan2) as totalpengajuanpagu FROM `pengajuan_anggaran` WHERE `status2` > 0 AND `tgl_pengajuan2` BETWEEN '%s' AND '%s'",$bulansebelum, $bulansesudah))->result_array();

            
            
            // Update pagu anggaran
            
        
            $data = array(

                'id_paguanggaran' => $pagu[0]['id_paguanggaran'],
                'id_anggota' => $pagu[0]['id_anggota'],
                'nominal_pagu' => $pagu[0]['nominal_pagu'],
                'nominal_terpakai' => $ajuan[0]['totalpengajuanpagu'],
                'bulan' => $pagu[0]['bulan'],
                'tahun' => $pagu[0]['tahun']

    
            );
        
            $this->db->update('pagu_anggaran', $data, array('id_paguanggaran' => $pagu[0]['id_paguanggaran']));
            $tersisa = floatval($pagu[0]['nominal_pagu'])-floatval($pagu[0]['nominal_terpakai']);
            return  array('paguanggaran' =>  floatval($pagu[0]['nominal_pagu']), 'paguterpakai' => floatval($pagu[0]['nominal_terpakai']), 'tersisa' => $tersisa);
        }
        else {
            return  array('paguanggaran' =>  0, 'paguterpakai' => 0,  'tersisa' => 0 );
            
        }

        
      
       
        
    }

    public function delete($id)
    {
        $this->db->delete('pagu_anggaran', array("id_paguanggaran" => $id));
    }
}
