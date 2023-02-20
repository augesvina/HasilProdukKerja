<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_user extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_user');
		$this->load->library('form_validation');
		$this->load->helper(array('form', 'url'));
		$this->load->model('M_input_jabatan');
		$this->load->helper('security');
		$this->load->model('M_input_jabatan');
	}


	public function add_user()
	{
		// Check akses dmpau
        if ($this->session->userdata('jabatan') != "dmpau") {
            redirect(site_url('C_login'));
        }

		$this->form_validation->set_rules('nama_anggota', 'Nama Pegawai', 'required|regex_match[/^[a-zA-Z ]*$/]|max_length[80]', array('max_length' => 'Batas input maksimal 80 karakter', 'regex_match' => '{field} tidak boleh mengandung simbol dan angka'));
		$this->form_validation->set_rules('tgl_lahir', 'Tanggal lahir', 'required');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required|regex_match[/^[a-zA-Z0-9\.\, ]*$/]', array('regex_match' => '{field} tidak boleh mengandung simbol kecuali , dan .'));
		$this->form_validation->set_rules('id_jabatan', 'Jabatan', 'required');
		$this->form_validation->set_rules('username', 'Username', 'required|regex_match[/^[A-Za-z][A-Za-z0-9_]{7,29}$/]', array('regex_match' => '<ul>
		<li>A valid username should start with an alphabet.</li>
		<li>All other characters can be alphabets, numbers or an underscore</li>
		<li>Minimum eight in length</li>
		</ul>'));
		$this->form_validation->set_rules('password', 'Password', 'required|regex_match[/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/]', array('regex_match' => '<ul>
		<li>At least one upper case </li>
		<li>At least one lower case English letter</li>
		<li>At least one digit</li>
		<li>At least one special character (#?!@$%^&*-)</li>
		<li>Minimum eight in length</li>
		</ul>'));


		if ($this->form_validation->run() == FALSE) {
			$data['jabatan'] = $this->M_input_jabatan->show_jabatanM();


			$this->load->view('user/input_pegawai.php', $data);
		} else {

			$this->M_user->add_user();
			$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
						<h5><i class="icon fas fa-check"></i> Tambah Data!</h5>
						Berhasil ditambahkan.
					</div>');
			redirect(site_url('C_user/show_user'));
		}
	}
	public function delete_user($id)
	{
		// Check akses dmpau
        if ($this->session->userdata('jabatan') != "dmpau") {
            redirect(site_url('C_login'));
        }

		$this->M_user->delete_user($id);
		$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
							<h5><i class="icon fas fa-ban"></i> Data Dihapus!</h5>
							Berhasil dihapus.
						</div>');
		redirect(site_url('C_user/show_user'));
	}
	public function update_user($id = null)
	{
		// Check akses dmpau
        if ($this->session->userdata('jabatan') != "dmpau") {
            redirect(site_url('C_login'));
        }

		$this->form_validation->set_rules('nama_anggota', 'Nama Pegawai', 'required|regex_match[/^[a-zA-Z ]*$/]|max_length[80]', array('max_length' => 'Batas input maksimal 80 karakter', 'regex_match' => '{field} tidak boleh mengandung simbol dan angka'));
		$this->form_validation->set_rules('tgl_lahir', 'Tanggal lahir', 'required');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required|regex_match[/^[a-zA-Z0-9\.\, ]*$/]', array('regex_match' => '{field} tidak boleh mengandung simbol kecuali , dan .'));
		$this->form_validation->set_rules('id_jabatan', 'Jabatan', 'required');
		$this->form_validation->set_rules('username', 'Username', 'required|regex_match[/^[A-Za-z][A-Za-z0-9_]{7,29}$/]', array('regex_match' => '<ul>
		<li>A valid username should start with an alphabet.</li>
		<li>All other characters can be alphabets, numbers or an underscore</li>
		<li>Minimum eight in length</li>
		</ul>'));
		$this->form_validation->set_rules('password', 'Password', 'required|regex_match[/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/]', array('regex_match' => '<ul>
		<li>At least one upper case </li>
		<li>At least one lower case English letter</li>
		<li>At least one digit</li>
		<li>At least one special character (#?!@$%^&*-)</li>
		<li>Minimum eight in length</li>
		</ul>'));

		if ($this->form_validation->run() == FALSE) {
			$data['pegawai'] = $this->M_user->show_user_id($id);
			$data['jabatan'] = $this->M_input_jabatan->show_jabatanM();

			$data['id'] = $id;

			$this->load->view('user/update_pegawai', $data);
		} else {
			print_r("meong");
			$this->M_user->update_user();
			$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
			<h5><i class="icon fas fa-check"></i> Update Data!</h5>
			Berhasil diupdate.
			</div>');

			redirect(site_url('C_user/show_user'));
		}
	}
	public function show_user()
	{
		// Check akses dmpau
        if ($this->session->userdata('jabatan') != "dmpau") {
            redirect(site_url('C_login'));
        }


		$data['pegawai'] = $this->M_user->show_user();
		$jabatan = array();
		$datajabatan = $this->M_input_jabatan->show_jabatanM();
	
		foreach ($datajabatan as $key) {
			
			$jabatan[$key['id_jabatan']] = $key['tingkatan_user'];
				
			
		}

		$data['status'] = $jabatan;
	
		$this->load->view('user/rekap_pegawai.php', $data);
	}
}
