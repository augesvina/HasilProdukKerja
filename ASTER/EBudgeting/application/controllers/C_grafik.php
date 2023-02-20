<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_grafik extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_chartgrafik','grafik');
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
    }

    public function subbidanggrafik()
    {
        $id_jabatan = $this->session->userdata('id_jabatan');
        
        echo json_encode($this->grafik->subbidangtotalajuan(date('Y-m-d'), $id_jabatan));
    }
    public function subbidangdisetujui()
    {
        $id_jabatan = $this->session->userdata('id_jabatan');
        echo json_encode($this->grafik->subbidangajuandisetujui(date('Y-m-d'), $id_jabatan));
    }
    public function dmgrafik()
    {
        $id_jabatan = $this->session->userdata('id_jabatan');
        echo json_encode($this->grafik->dmtotalajuan(date('Y-m-d'), $id_jabatan));
    }
    public function dmdisetujui()
    {
        $id_jabatan = $this->session->userdata('id_jabatan');
        echo json_encode($this->grafik->dmdisetujui(date('Y-m-d'), $id_jabatan));
    }
    public function dmpautotal()
    {
        
        echo json_encode($this->grafik->dmpautotalajuan(date('Y-m-d')));

    }
    public function dmpaudisetujui()
    {
        echo json_encode($this->grafik->dmpaudisetujui(date('Y-m-d')));
        
    }
   
   
}
