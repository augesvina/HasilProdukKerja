<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_masterpos_subpos extends CI_Controller
{


	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_masterpos_subpos');
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
	}
	public function add_pos()
	{
		// cek apakah ada hak akses
		if (!in_array('masterpos', $this->session->userdata('hakakses'))) {



			redirect(site_url('C_login'));
		}
		$this->form_validation->set_rules('nama', 'Nama Pos', 'required|alpha_numeric_spaces|max_length[64]');
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('masterpos/addpos');
		} else {

			$this->M_masterpos_subpos->add_posM();
			$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
						<h5><i class="icon fas fa-check"></i> Tambah Data!</h5>
						Berhasil ditambahkan.
					</div>');
			redirect(site_url('C_masterpos_subpos/show_pos'));
		}
	}
	public function delete_pos($id)
	{
		// cek apakah ada hak akses
		if (!in_array('masterpos', $this->session->userdata('hakakses'))) {



			redirect(site_url('C_login'));
		}
		$this->M_masterpos_subpos->delete_posM($id);

		$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
							<h5><i class="icon fas fa-ban"></i> Data Dihapus!</h5>
							Berhasil dihapus.
						</div>');
		redirect(site_url('C_masterpos_subpos/show_pos'));
	}
	public function update_pos($id)
	{
		// cek apakah ada hak akses
		if (!in_array('masterpos', $this->session->userdata('hakakses'))) {



			redirect(site_url('C_login'));
		}



		$this->form_validation->set_rules('nama', 'Nama Pos', 'required|alpha_numeric_spaces|max_length[64]');


		if ($this->form_validation->run() == FALSE) {
			$data['pos'] = $this->M_masterpos_subpos->show_posM($id)[0];
			

			$this->load->view('masterpos/updatepos', $data);
		} else {

			$this->M_masterpos_subpos->update_posM();
			$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
			<h5><i class="icon fas fa-check"></i> Update Data!</h5>
			Berhasil diupdate.
			</div>');
			redirect(site_url('C_masterpos_subpos/show_pos'));
		}
	}
	public function show_pos()
	{
		// cek apakah ada hak akses
		if (!in_array('masterpos', $this->session->userdata('hakakses'))) {



			redirect(site_url('C_login'));
		}



		$data['pos'] = $this->M_masterpos_subpos->show_posM();
		$this->load->view('masterpos/pos', $data);
	}

	// sub Pos
	public function add_subpos()
	{
		// cek apakah ada hak akses
		if (!in_array('mastersubpos', $this->session->userdata('hakakses'))) {



			redirect(site_url('C_login'));
		}


		$this->form_validation->set_rules('nama', 'Nama Pos', 'required|alpha_numeric_spaces|max_length[64]');
		if ($this->form_validation->run() == FALSE) {

			$this->load->view('masterpos/addsubpos');
		} else {

			$this->M_masterpos_subpos->addsubposM();
			$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
						<h5><i class="icon fas fa-check"></i> Tambah Data!</h5>
						Berhasil ditambahkan.
					</div>');
			redirect(site_url('C_masterpos_subpos/show_subpos'));
		}
	}
	public function delete_subpos($id)
	{

		// cek apakah ada hak akses
		if (!in_array('mastersubpos', $this->session->userdata('hakakses'))) {



			redirect(site_url('C_login'));
		}


		$this->M_masterpos_subpos->delete_subposM($id);
		$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
							<h5><i class="icon fas fa-ban"></i> Data Dihapus!</h5>
							Berhasil dihapus.
						</div>');
		redirect(site_url('C_masterpos_subpos/show_subpos'));
	}
	public function update_subpos($id = null)
	{
		// cek apakah ada hak akses
		if (!in_array('mastersubpos', $this->session->userdata('hakakses'))) {



			redirect(site_url('C_login'));
		}

		$this->form_validation->set_rules('nama', 'Nama Pos', 'required|alpha_numeric_spaces|max_length[64]');


		if ($this->form_validation->run() == FALSE) {
			$data['sub_pos'] = $this->M_masterpos_subpos->show_subposM($id)[0];


			$this->load->view('masterpos/updatesubpos', $data);
		} else {

			$this->M_masterpos_subpos->update_subposM();
			$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
			<h5><i class="icon fas fa-check"></i> Update Data!</h5>
			Berhasil diupdate.
			</div>');
			redirect(site_url('C_masterpos_subpos/show_subpos'));
		}
	}
	public function show_subpos()
	{
		// cek apakah ada hak akses
		if (!in_array('mastersubpos', $this->session->userdata('hakakses'))) {



			redirect(site_url('C_login'));
		}


		$data['sub_pos'] = $this->M_masterpos_subpos->show_subposM();

		$this->load->view('masterpos/subpos', $data);
	}

	// sub pos 2

	public function add_subpos2()
	{

		// cek apakah ada hak akses
		if (!in_array('mastersubpos2', $this->session->userdata('hakakses'))) {



			redirect(site_url('C_login'));
		}


		$this->form_validation->set_rules('nama', 'Nama Pos', 'required|alpha_numeric_spaces|max_length[64]');
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('masterpos/addsubpos2');
		} else {

			$this->M_masterpos_subpos->addsubpos2M();
			$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
						<h5><i class="icon fas fa-check"></i> Tambah Data!</h5>
						Berhasil ditambahkan.
					</div>');
			redirect(site_url('C_masterpos_subpos/show_subpos2'));
		}
	}
	public function delete_subpos2($id)
	{

		// cek apakah ada hak akses
		if (!in_array('mastersubpos2', $this->session->userdata('hakakses'))) {



			redirect(site_url('C_login'));
		}

		$this->M_masterpos_subpos->delete_subpos2M($id);
		$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
							<h5><i class="icon fas fa-ban"></i> Data Dihapus!</h5>
							Berhasil dihapus.
						</div>');
		redirect(site_url('C_masterpos_subpos/show_subpos2'));
	}
	public function update_subpos2($id = null)
	{

		// cek apakah ada hak akses
		if (!in_array('mastersubpos2', $this->session->userdata('hakakses'))) {



			redirect(site_url('C_login'));
		}

		$this->form_validation->set_rules('nama', 'Nama Pos', 'required|alpha_numeric_spaces|max_length[64]');


		if ($this->form_validation->run() == FALSE) {
			$data['sub_pos2'] = $this->M_masterpos_subpos->show_subpos2M($id)[0];


			$this->load->view('masterpos/updatesubpos2', $data);
		} else {

			$this->M_masterpos_subpos->update_subpos2M();
			$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
			<h5><i class="icon fas fa-check"></i> Update Data!</h5>
			Berhasil diupdate.
			</div>');
			redirect(site_url('C_masterpos_subpos/show_subpos2'));
		}
	}
	public function show_subpos2()
	{

		// cek apakah ada hak akses
		if (!in_array('mastersubpos2', $this->session->userdata('hakakses'))) {



			redirect(site_url('C_login'));
		}


		$data['sub_pos2'] = $this->M_masterpos_subpos->show_subpos2M();

		$this->load->view('masterpos/subpos2', $data);
	}
}
