<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_ajuananggaran extends CI_Controller
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
		$this->load->model('M_notifikasi', 'notifikasi');
	}

	public function add_datapengajuan()
	{
		if ($this->session->userdata('jabatan') != "subbidang") {
			redirect(site_url('C_login'));
		}
		$this->M_ajuananggaran->add_pengajuan();
		$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
						<h5><i class="icon fas fa-check"></i> Tambah Data!</h5>
						Berhasil ditambahkan.
					</div>');
		

		redirect(site_url('C_ajuananggaran/show_datapengajuan'));
	}
	public function delete_datapengajuan($id)
	{
		if ($this->session->userdata('jabatan') != "subbidang") {
			redirect(site_url('C_login'));
		}
		$this->M_detailajuan->delete_alldetailanggaranM($id);
		$this->M_ajuananggaran->delete_pengajuan($id);
		$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
							<h5><i class="icon fas fa-ban"></i> Data Dihapus!</h5>
							Berhasil dihapus.
						</div>');
		redirect(site_url('C_ajuananggaran/show_datapengajuan'));
	}
	public function update_datapengajuan($id = null)
	{
		if ($this->session->userdata('jabatan') != "subbidang") {
			redirect(site_url('C_login'));
		}
		$this->form_validation->set_rules('id_pengajuan', 'Id pengajuan', 'required');



		if ($this->form_validation->run() == FALSE) {
			$data['ajuan'] = $this->M_ajuananggaran->show_pengajuan($id)[0];
			$data['pos'] = $this->M_masterpos_subpos->show_posM();
			$data['subpos'] = $this->M_masterpos_subpos->show_subposM();
			$data['subpos2'] = $this->M_masterpos_subpos->show_subpos2M();
			$data['detailajuan'] = $this->M_detailajuan->showbyid_detailanggaranM($id);
			$data['id'] = $id;
			$data['bulan'] = array('01' => 'Januari', '02' => 'Februari', '03' => 'Maret', '04' => 'April', '05' => 'Mei', '06' => 'Juni', '07' => 'Juli', '08' => 'Agustus', '09' => 'September', '10' => 'Oktober', '11' => 'November', '12' => 'Desember');
			$data['minggu'] = array('1', '2', '3', '4');





			$this->load->view('anggaran/addajuananggaran', $data);
		} else {
			// $pagu = $this->M_paguanggaran->checkPagu(date('Y-m-d'));
			$id = $this->input->post('id_pengajuan');
			$status = $this->input->post('status2');
			$item = $this->M_detailajuan->item($id);
			// $nominalpengajuan = $this->M_detailajuan->hitunganggaran($id)[0]['nominal_pengajuan2'];
			if ($status == 1 && $item < 1) {
				$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
				<h5><i class="icon fas fa-ban"></i> Perhatian!</h5>
				Masukkan detail ajuan paling sedikit 1 data!
			</div>');

				redirect($_SERVER['HTTP_REFERER']);
			}


			$this->notifikasi->add_notifikasi('subbidang', $this->input->post('status2'));
			$this->M_ajuananggaran->update_pengajuan();
			redirect(site_url('C_ajuananggaran/show_datapengajuan'));


			// if (($nominalpengajuan + $pagu[0]['nominal_terpakai'] > $pagu[0]['nominal_pagu'])) {
			// 	// Mengecheck apakah nominalpengajuan lebih besar dari pagu
			// 	$pengajuan = $nominalpengajuan + $pagu[0]['nominal_terpakai'] - $pagu[0]['nominal_pagu'];
			// 	$this->session->set_flashdata('pagu', $pengajuan);

			// } else {


			// }
		}
	}

	public function view_transfer()
	{
		$bulan2 = $this->input->post('bulan2');
		$minggu2 = $this->input->post('minggu2');

		if (isset($bulan2)) {
			$data['bulan2'] = $bulan2;
			$data['pengajuan_anggaran'] = $this->db->query("SELECT * FROM pengajuan_anggaran WHERE bulan2='$bulan2' ")->result_array();
		} elseif (isset($minggu2)) {
			$data['minggu2'] = $minggu2;
			$data['pengajuan_anggaran'] = $this->db->query("SELECT * FROM pengajuan_anggaran WHERE minggu2='$minggu2' ")->result_array();
		}

		$data['bulan'] = $this->db->query("SELECT DISTINCT bulan2 FROM pengajuan_anggaran")->result_array();
		$data['minggu'] = $this->db->query("SELECT DISTINCT minggu2 FROM pengajuan_anggaran")->result_array();

		$this->load->view("anggaran/ajuananggaran", $data);
	}

	public function show_datapengajuan()
	{

		if ($this->session->userdata('jabatan') != "subbidang") {
			redirect(site_url('C_login'));
		}
		$data['pengajuan_anggaran'] = $this->M_ajuananggaran->show_pengajuan();
		$data['status'] = array(
			'0' => '<span class="btn btn-danger"><i class="fa fa-fw fa-warning"></i>Draft</span>',
			'1' => '<span class="btn btn-info"><i class="fa fa-fw fa-thumbs-up"></i> Telah diajukan oleh subidang</span>',
			'2' => '<span class="btn btn-warning"><i class="fa fa-fw fa-check"></i> Telah disetujui oleh DM</span>',
			'3' => '<span class="btn btn-success"><i class="fa fa-fw fa-check"></i> Telah disetujui oleh DMPAU</span>',

			'5' => '<span class="btn btn-warning"><i class="fa fa-fw fa-check"></i> Koreksi Anggaran oleh DM</span>',
			'6' => '<span class="btn btn-warning"><i class="fa fa-fw fa-check"></i> Koreksi Anggaran oleh DMPAU</span>',

			'7' => '<span class="btn btn-warning"><i class="fa fa-fw fa-check"></i> Anggaran telah dikoreksi [DM]</span>',
			'8' => '<span class="btn btn-warning"><i class="fa fa-fw fa-check"></i> Anggaran telah dikoreksi [DMPAU]</span>'



		);
		$data['bulan'] = array('01' => 'Januari', '02' => 'Februari', '03' => 'Maret', '04' => 'April', '05' => 'Mei', '06' => 'Juni', '07' => 'Juli', '08' => 'Agustus', '09' => 'September', '10' => 'Oktober', '11' => 'November', '12' => 'Desember');
		$data['minggu'] = array('1', '2', '3', '4');

		$this->load->view('anggaran/ajuananggaran', $data);
	}

	public function show_koreksidata()
	{
	}
	public function show_rekapanggaran($id)
	{

	
		$data['ajuan'] = $this->M_ajuananggaran->show_pengajuan($id)[0];
		$data['pos'] = $this->M_masterpos_subpos->show_posM();
		$data['subpos'] = $this->M_masterpos_subpos->show_subposM();
		$data['subpos2'] = $this->M_masterpos_subpos->show_subpos2M();
		$data['detailajuan'] = $this->M_detailajuan->showbyid_detailanggaranM($id);
		$data['id'] = $id;
		$data['total'] = $this->M_detailajuan->hitunganggaran($id)[0];




		$this->load->view('anggaran/rekapdraftanggaran', $data);
	}

	public function show_rekapitulasianggaran()
	{
		if (!in_array('rekapanggaran', $this->session->userdata('hakakses'))) {


			redirect(site_url('C_login'));
		}

		$data['pos'] = $this->M_masterpos_subpos->show_posM();
		$pos = $data['pos'];
		
		$hitungajuan = array();
		$data['totalkeseluruhan'] = 0;
		for ($i = 0; $i < count($pos); $i++) {
			
			$hitungajuan[$i] = $this->M_rekapanggaran->show_rekapanggaran($pos[$i]['id_pos']);
			
			$data['totalkeseluruhan'] += $hitungajuan[$i]['total'];
		}
		$data['hitungajuan'] = $hitungajuan;
		




		$this->load->view('rekapitulasi/rekap_anggaran.php', $data);
	}

	public function show_rekapposanggaran()
	{
		if (!in_array('rekapanggaran', $this->session->userdata('hakakses'))) {


			redirect(site_url('C_login'));
		}
		$data['subpos'] = $this->M_masterpos_subpos->show_subposM();
		$subpos = $data['subpos'];
		$hitungajuan = array();
		$data['totalkeseluruhan'] = 0;
		for ($i = 0; $i < count($subpos); $i++) {
			$bulan = $this->input->get('bln');
			$hitungajuan[$i] = $this->M_rekapanggaran->show_rekapposanggaran($subpos[$i]['id_subpos'], $bulan);
			$data['totalkeseluruhan'] += $hitungajuan[$i]['total'];
		}
		$data['hitungajuan'] = $hitungajuan;

		$this->load->view('rekapitulasi/rekap_pos.php', $data);
	}
}
