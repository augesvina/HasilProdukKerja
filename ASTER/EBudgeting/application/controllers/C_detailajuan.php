<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_detailajuan extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_detailajuan');
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->load->library('user_agent');
		$this->load->model('M_paguanggaran');
	}

	public function add_detailanggaran()
	{
		$pagu = $this->M_paguanggaran->checkPagu(date('Y-m-d'));
		$id = $this->input->post('id_pengajuan');
		$nominal = $this->input->post('nominal');
		$nominalpengajuan = $this->M_detailajuan->hitunganggaran($id)[0]['nominal_pengajuan2'];

		
		$this->form_validation->set_rules('id_subpos2', 'Sub pos 2', 'required');
		$this->form_validation->set_rules('id_subpos', 'Sub pos', 'required');
		$this->form_validation->set_rules('id_pos', 'Pos', 'required');
		$this->form_validation->set_rules('nominal', 'Nominal Pengajuan', 'required');
		$this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');
		$this->form_validation->set_rules('kegiatan', 'Kegiatan', 'required');
		if (($nominalpengajuan+$pagu[0]['nominal_terpakai']+$nominal > $pagu[0]['nominal_pagu'])) {
			// Mengecheck apakah nominalpengajuan lebih besar dari pagu
			$pengajuan = $nominalpengajuan+$pagu[0]['nominal_terpakai'] - $pagu[0]['nominal_pagu'];
			$this->session->set_flashdata('pagu', $pengajuan);
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
				<h5><i class="icon fas fa-ban"></i> Perhatian!</h5> 
				Pengajuan lebih besar dari pagu anggaran, mohon untuk mengurangi nominal pengajuan lebih kecil!
			</div>');
			redirect($_SERVER['HTTP_REFERER']);
		}
		else {
			
			$this->M_detailajuan->add_detailanggaranM();
			redirect($_SERVER['HTTP_REFERER']);
		}


		
	}
	public function delete_detailanggaran($id)
	{
		$this->M_detailajuan->delete_detailanggaranM($id);
		redirect($_SERVER['HTTP_REFERER']);
	}
	public function update_detailanggaran($id = null)
	{
		$this->form_validation->set_rules('id_pengajuan', 'Id pengajuan', 'required');



		$this->M_detailajuan->update_detailanggaranM();
		redirect($_SERVER['HTTP_REFERER']);
	}
	public function show_detailanggaran()
	{
		echo json_encode($this->M_detailajuan->show_detailanggaranM());


		// $this->load->view('anggaran/ajuananggaran', $data);
	}
}
