<?php

defined('BASEPATH') or exit('No direct script access allowed');

class C_paguanggaran extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("M_paguanggaran");
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');

        // cek jabatan user login
        if ($this->session->userdata('jabatan') != 'dmpau') {


            redirect(site_url('C_login'));
        }
    }

    public function index()
    {
        $data["pagu_anggaran"] = $this->M_paguanggaran->getAll();
        $this->load->view("paguanggaran/menupagu", $data);
    }

    public function add()
    {


        $this->form_validation->set_rules('nominal_pagu', 'Nominal Pagu', 'required|min_length[3]|max_length[64]');

        $this->form_validation->set_rules('bulan', 'Bulan', 'required|min_length[3]|max_length[64]');
        $this->form_validation->set_rules('tahun', 'Tahun', 'required|min_length[3]|max_length[64]');
        echo $this->form_validation->run();
        if ($this->form_validation->run()) {

            $this->M_paguanggaran->save();
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
						<h5><i class="icon fas fa-check"></i> Tambah Data!</h5>
						Berhasil ditambahkan.
					</div>');
            redirect(site_url('C_paguanggaran'));
        } else {
            $data['bulan'] = array("01" => "Januari", "02" => "Februari", "03" => "Maret", "04" => "April", "05" => "Mei", "06" => "Juni", "07" => "Juli", "08" => "Agustus", "09" => "September", "10" => "Oktober", "11" => "November", "12" => "Desember");
            $this->load->view("paguanggaran/addpagu", $data);
        }
    }

    public function edit($id = null)
    {

        $this->form_validation->set_rules('nominal_pagu', 'Nominal Pagu', 'required|min_length[3]|max_length[64]');

        $this->form_validation->set_rules('bulan', 'Bulan', 'required|min_length[3]|max_length[64]');
        $this->form_validation->set_rules('tahun', 'Tahun', 'required|min_length[3]|max_length[64]');

        if ($this->form_validation->run()) {
            $this->M_paguanggaran->update($id);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
			<h5><i class="icon fas fa-check"></i> Update Data!</h5>
			Berhasil diupdate.
			</div>');
            redirect(site_url('C_paguanggaran'));
        } else {


            $data["paguanggaran"] = $this->M_paguanggaran->getById($id);
            $data['id'] = $id;
            $data['bulan'] = array("01" => "Januari", "02" => "Februari", "03" => "Maret", "04" => "April", "05" => "Mei", "06" => "Juni", "07" => "Juli", "08" => "Agustus", "09" => "September", "10" => "Oktober", "11" => "November", "12" => "Desember");
            $this->load->view("paguanggaran/updatepagu", $data);
        }
    }

    public function delete($id = null)
    {

        if (isset($id)) {
            $this->M_paguanggaran->delete($id);
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
							<h5><i class="icon fas fa-ban"></i> Data Dihapus!</h5>
							Berhasil dihapus.
						</div>');

            redirect(site_url('C_paguanggaran'));
        } else {
            show_error('Invalid Action has been detected please back to previous page', 404, "Invalid Action Error 404");
        }
    }
}
