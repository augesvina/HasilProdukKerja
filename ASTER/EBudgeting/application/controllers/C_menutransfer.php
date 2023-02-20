<?php

defined('BASEPATH') or exit('No direct script access allowed');

class C_menutransfer extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("M_menutransfer");
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');

        
        // cek apakah ada hak akses
		if (!in_array('menutransfer',$this->session->userdata('hakakses'))) {
		
			
			
			redirect(site_url('C_login'));
		}
    }

    public function index()
    {
        $data["transfer"] = $this->M_menutransfer->getAll();
        $data['bank'] = $this->db->query("SELECT DISTINCT nama_bank FROM transfer")->result_array();
        $this->load->view("transfers/menutransfer", $data);
    }

    public function view_transfer()
    {
        $dari =$this->input->post('dari');
        $sampai =$this->input->post('sampai');
        $nama_bank =$this->input->post('nama_bank');

        if(isset($dari) && isset($sampai)){
            $data['dari'] = $dari;
            $data['sampai'] = $sampai;
            $data['transfer'] = $this->db->query("SELECT * FROM transfer WHERE date(transfer.tgl_kirim) >= '$dari' AND date(transfer.tgl_kirim) <= '$sampai' ORDER BY transfer.tgl_kirim DESC")->result_array();
        }elseif(isset($nama_bank)){
            $data['nama_bank'] = $nama_bank;
            $data['transfer'] = $this->db->query("SELECT * FROM transfer WHERE nama_bank='$nama_bank' ")->result_array();
        }

        $data['bank'] = $this->db->query("SELECT DISTINCT nama_bank FROM transfer")->result_array();

        $this->load->view("transfers/view_menutransfer", $data);
    }

    public function print()
    {
        $data['title'] = 'Data Transfer';
        $data["transfer"] = $this->M_menutransfer->getAll();
        $this->load->view("transfers/print", $data);
    }

    public function add()
    {


        $this->form_validation->set_rules('nama_pengirim', 'Nama Pengirim', 'required|alpha_numeric_spaces|max_length[64]');
        echo $this->form_validation->run();
        if ($this->form_validation->run()) {

            $email = $this->input->post('email');


            // Konfigurasi email
            $config = [
                'mailtype'  => 'html',
                'charset'   => 'utf-8',
                'protocol'  => 'smtp',
                'smtp_host' => 'smtp.gmail.com',
                'smtp_user' => 'xxxxx@gmail.com',  // Email gmail
                'smtp_pass'   => 'xxxxx',  // Password gmail
                'smtp_crypto' => 'ssl',
                'smtp_port'   => 465,
                'crlf'    => "\r\n",
                'newline' => "\r\n"
            ];

            // Load library email dan konfigurasinya
            $this->load->library('email', $config);

            // Email dan nama pengirim
            $this->email->from('xxxx@gmail.com', 'PLN ASTER');

            // Email penerima
            $this->email->to($email); // Ganti dengan email tujuan

            // Lampiran email, isi dengan url/path file
            // $this->email->attach('https://images.pexels.com/photos/169573/pexels-photo-169573.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940');

            // Subject email
            $this->email->subject('REKAP TRANSFER');

            // Isi email

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

            $this->email->message("<html>
                <head>
                <title>Rekap Transfer</title>
                </head>
                <body>
                <p>Rekap Transfer</p>
                <table>
                <tr>
                <td>Id Anggota</td><td>" . "<td>:</td>" .  $data['id_anggota']  . "</td></tr>
                <tr>
                <td>Nama Pengirim</td><td>" . "<td>:</td>" .  $data['nama_pengirim']   . "</td></tr>
                <tr>
                <td>Email</td><td>" . "<td>:</td>" .  $data['email']   . "</td></tr>
                <tr>
                <td>No Telp </td><td>" . "<td>:</td>" .  $data['no_telp']     . "</td></tr>
                <tr>
                <td>No Rekening </td><td>" . "<td>:</td>" .  $data['no_rekening']     . "</td></tr>
                <tr>
                <td>Nama Bank</td><td>" . "<td>:</td>" .  $data['nama_bank']   . "</td></tr>
                <tr>
                <td>Tgl Kirim</td><td>" . "<td>:</td>" .  $data['tgl_kirim']   . "</td></tr>
                <tr>
                <td>Kategori</td><td>" . "<td>:</td>" .  $data['kategori']    . "</td></tr>
                <tr>
                <td>PPN </td><td>" . "<td>:</td>" .  $data['PPN']     . "</td></tr>
                <tr>
                <td>PPN </td><td>" . "<td>:</td>" .  $data['PPH_21']  . "</td></tr>
                <tr>
                <td>PPN </td><td>" . "<td>:</td>" .  $data['PPH_22']  . "</td></tr>
                <tr>
                <td>PPN </td><td>" . "<td>:</td>" .  $data['PPH_23']  . "</td></tr>
                <tr>
                <td>Denda</td><td>" . "<td>:</td>" .  $data['denda']   . "</td></tr>
                <tr>
                <td>Administrasi Bank</td><td>" . "<td>:</td>" .  $data['administrasi_bank']   . "</td></tr>
                <tr>
                <td>Total Dibayar</td><td>" . "<td>:</td>" .  $data['total_dibayar']   . "</td></tr>
                <tr>
                <td>Berita</td><td>" . "<td>:</td>" .  $data['berita']  . "</td></tr>
                <tr>
                <td>Honor Asesmen</td><td>" . "<td>:</td>" .  $data['honor_asesmen']   . "</td></tr>
                <tr>
                <td>Honor Evaluator </td><td>" . "<td>:</td>" .  $data['honor_evaluator']     . "</td></tr>
                <tr>
                <td>Nilai Kontrak</td><td>" . "<td>:</td>" .  $data['nilai_kontrak']   . "</td></tr>
                <tr>
                <td>Honor Tester</td><td>" . "<td>:</td>" .  $data['honor_tester']    . "</td></tr>
                <tr>
                <td>Honor Feedback</td><td>" . "<td>:</td>" .  $data['honor_feedback']  . "</td></tr>
                <tr>
                <td>Pekerjaan</td><td>" . "<td>:</td>" .  $data['pekerjaan']   . "</td></tr>
                <tr>
                <td>Honor Pewawancara</td><td>" . "<td>:</td>" .  $data['honor_pewawancara']   . "</td></tr>
                <tr>
                <td>Honor Korektor Pauli</td><td>" . "<td>:</td>" .  $data['honor_korektor_pauli']    . "</td></tr>
                <tr>
                <td>Lumpsum Transport Bandara</td><td>" . "<td>:</td>" .  $data['lumpsum_transport_bandara']   . "</td></tr>
                <tr>
                <td>Lumpsum Komsumsi</td><td>" . "<td>:</td>" .  $data['lumpsum_komsumsi']    . "</td></tr>
                <tr>
                <td>Lumpsum Transpoet Lok</td><td>" . "<td>:</td>" .  $data['lumpsum_transpoet_lok']   . "</td></tr>
                <tr>
                <td>Waktu Kerja </td><td>" . "<td>:</td>" .  $data['waktu_kerja']     . "</td></tr>
                <tr>
                <td>Lumpsum Uang Cod</td><td>" . "<td>:</td>" .  $data['lumpsum_uang_cod']    . "</td></tr>


                </table>
                </body>
                </html>");

            // Tampilkan pesan sukses
            if ($this->email->send()) {
                echo 'Sukses! email berhasil dikirim.';
                $this->session->set_flashdata('success', 'Sukses! email berhasil dikirim.');
            }

            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
						<h5><i class="icon fas fa-check"></i> Tambah Data!</h5>
						Berhasil ditambahkan.
					</div>');
            $this->M_menutransfer->save();
            redirect(site_url('C_menutransfer'));
        } else {
            $this->load->view("transfers/addtransfer");
        }
    }

    public function edit($id = null)
    {


        $transfers = $this->M_menutransfer;
        $validation = $this->form_validation;
        $validation->set_rules('nama_pengirim', 'Nama Pengirim', 'required|alpha_numeric_spaces|max_length[64]');

        if ($validation->run()) {
            $transfers->update($id);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
			<h5><i class="icon fas fa-check"></i> Update Data!</h5>
			Berhasil diupdate.
			</div>');

            redirect(site_url('C_menutransfer'));
        } else {

            $data["transfers"] = $transfers->getById($id);

            $this->load->view("transfers/updatetransfer", $data);
        }
    }

    public function delete($id = null)
    {

        if (isset($id)) {
            $this->M_menutransfer->delete($id);
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h5><i class="icon fas fa-ban"></i> Data Dihapus!</h5>
            Berhasil dihapus.
        </div>');
            redirect(site_url('C_menutransfer'));
        } else {
            show_error('Invalid Action has been detected please back to previous page', 404, "Invalid Action Error 404");
        }
    }
}
