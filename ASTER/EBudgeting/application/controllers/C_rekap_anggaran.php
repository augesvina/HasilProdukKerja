<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_rekap_anggaran extends CI_Controller
{

    public function __construct()
	{
		parent::__construct();
		$this->load->model('M_ajuananggaran');
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->load->model('M_masterpos_subpos');
		$this->load->model('M_detailajuan');
		$this->load->model('M_rekapanggaran');
	}
    public function index()
    {
        $data['pos'] = $this->M_masterpos_subpos->show_posM();
		$pos = $data['pos'];
		$hitungajuan = array ();
		$data['totalkeseluruhan'] = 0;
		for ($i=0; $i < count($pos) ; $i++) { 
			$hitungajuan[$i] = $this->M_rekapanggaran->show_rekapanggaran($pos[$i]['id_pos']);
			$data['totalkeseluruhan'] += $hitungajuan[$i]['total'];
			
		}
		$data['hitungajuan'] = $hitungajuan;
		print_r($hitungajuan);
		
  
    
        $this->load->view('rekapitulasi/rekap_anggaran.php', $data);
        $this->load->view('dashboard/_part/footer');
    }
}
