<?php defined('BASEPATH') or exit('NO direct script acces allowed');

class M_ajuananggaran extends CI_Model

{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_detailajuan');
        $this->load->model('M_paguanggaran');
        $this->load->model('M_input_jabatan', 'jabatan');
    }
    // Sub bidang
    public function add_pengajuan()
    {

        if (date("d") > 14) {
            date_default_timezone_set("Asia/Bangkok");

            $tanggal = date('Y-m-d');


            $tglpengajuan =  date('Y-m-d', strtotime('+1 months', strtotime(date('Y-m-d', strtotime($tanggal)))));
            $bulan = date('m', strtotime($tglpengajuan));
            $tahun = date('Y', strtotime($tglpengajuan));
        } else {
            date_default_timezone_set("Asia/Bangkok");
            $tanggal = date('Y-m-d');

            $bulan = date('m', strtotime($tanggal));
            $tahun = date('Y', strtotime($tanggal));
        }


        $data = array(
            'id_pengajuan' => '',
            'id_anggota' => $this->session->userdata('id_anggota'),
            'catatan_dm2' => '',
            'total_pengajuan2' => '',
            'minggu2' => $this->input->post('minggu2'),
            'bulan2' => $bulan,
            'catatan_dmpau2' => '',
            'status2' => '0',
            'tanggal_mulai2' => $this->input->post('tanggal_mulai2'),
            'tanggal_sampai2' => $this->input->post('tanggal_sampai2'),
            'tgl_pengajuan2' => $tanggal,
            'tahun' => $tahun
        );
        $this->db->insert('pengajuan_anggaran', $data);
    }
    public function delete_pengajuan($id)
    {
        $this->db->delete('pengajuan_anggaran', array('id_pengajuan' => $id));
    }
    public function show_pengajuan($id = null)
    {
        if (isset($id)) {
            $query = $this->db->get_where('pengajuan_anggaran', array('id_pengajuan' => $id));
            return $query->result_array();
        } else {
            $query = $this->db->get_where('pengajuan_anggaran', array('id_anggota' => $this->session->userdata('id_anggota')));
            return $query->result();
        }
    }

    public function koreksi_data()
    {
        $this->db->select('*');
        $this->db->from('pengajuan_anggaran');
        $this->db->where('id_anggota',  $this->session->userdata('id_anggota'));
        $this->db->where('status2', '5');
        $this->db->or_where('status2', '6');
        $this->db->or_where('status2', '7');
        $this->db->or_where('status2', '8');
        $query = $this->db->get()->result();
        return $query;
    }

    public function update_pengajuan()
    {
        $pagu = $this->M_paguanggaran->checkPagu(date('Y-m-d'));


        $id = $this->input->post('id_pengajuan');
        $nominalpengajuan = $this->M_detailajuan->hitunganggaran($id)[0]['nominal_pengajuan2'];



        $data = array(
            'id_pengajuan' => $id,
            'id_anggota' => $this->input->post('id_anggota'),
            'catatan_dm2' => '',
            'total_pengajuan2' => $nominalpengajuan,
            'minggu2' => $this->input->post('minggu2'),
            'bulan2' => $this->input->post('bulan2'),
            'catatan_dmpau2' => '',
            'status2' => $this->input->post('status2'),
            'tanggal_mulai2' => $this->input->post('tanggal_mulai2'),
            'tanggal_sampai2' => $this->input->post('tanggal_sampai2'),
            'tgl_pengajuan2' => $this->input->post('tgl_pengajuan2'),
            'tahun' =>  $this->input->post('tahun')
        );

        $this->db->update('pengajuan_anggaran', $data, array('id_pengajuan' => $id));
    }
    public function showbyid_pengajuansub($id, $id_anggota)
    {
        // Cari nama sub jabatan dari subbidang ke dm
        $namajabatan = $this->db->get_where('jabatan', array('id_jabatan' => $id), 1)->result_array();

        // Mencari DM yang memiliki sub tersebut
        $this->db->select('*');
        $this->db->from('jabatan');
        $this->db->like('sub_jabatan', $namajabatan[0]['nama_jabatan'], 'both');
        $subjabatan = $this->db->get()->result_array();

        // Memecah sub jabatan DM
        $pecahsubjabatan = $this->jabatan->subjabatan($subjabatan[0]['id_jabatan']);


        // Mencari id jabatan yang termasuk pada sub jabatan
        $subbidang = array();
        foreach ($pecahsubjabatan as $key) {

            $this->db->select('id_jabatan');
            $this->db->from('jabatan');
            $this->db->where('nama_jabatan', $key);
            foreach ($this->db->get()->result_array() as $k) {
                $subbidang[] = $k;
            }
        }



        // Mencari id pegawai berdasarkan pencarian id jabatan
        $idsubbidang = array();
        foreach ($subbidang as $key) {

            $this->db->select('id_anggota');
            $this->db->from('pegawai');
            $this->db->where('id_jabatan', $key['id_jabatan']);
            foreach ($this->db->get()->result_array() as $j) {

                $idsubbidang[] = $j;
            }
        }





        // Mencari ajuan yang memiliki id anggota yang telah tertulis dan menghitung total ajuan
        $totalanggaran = 0;
        $bulan = date('m');
        foreach ($idsubbidang as $key) {


            $this->db->select('count(id_anggota) as totalajuan');
            $this->db->from('pengajuan_anggaran');
            $this->db->where('id_anggota', $key['id_anggota']);
            $this->db->where('bulan2', $bulan);
            $this->db->where('status2>', '0');


            foreach ($this->db->get()->result_array() as $j) {


                $totalanggaran += $j['totalajuan'];
            }
        }


        // Menghitung ajuan yang disetujui
        $anggarandisetujui = 0;
        $bulan = date('m');
        foreach ($idsubbidang as $key) {


            $this->db->select('count(id_anggota) as totalsetuju');
            $this->db->from('pengajuan_anggaran');
            $this->db->where('id_anggota', $key['id_anggota']);
            $this->db->where('bulan2', $bulan);
            $this->db->where('status2', '3');


            foreach ($this->db->get()->result_array() as $j) {


                $anggarandisetujui += $j['totalsetuju'];
            }
        }


        // Menghitung ajuan yang memerlukan koreksi
        $revisi = 0;
        $bulan = date('m');
        foreach ($idsubbidang as $key) {


            $this->db->select('count(id_anggota) as totalrevisi');
            $this->db->from('pengajuan_anggaran');
            $this->db->where('id_anggota', $key['id_anggota']);
            $this->db->where('bulan2', $bulan);
            $this->db->where("status2 BETWEEN '5' AND '6'");


            foreach ($this->db->get()->result_array() as $j) {



                $revisi += $j['totalrevisi'];
            }
        }





        // Notifikasi DM
        $dm = $this->db->get_where('notifikasi', array('id_anggota' => $id_anggota, 'tipe_notifikasi' => '2'));
        // $dm = $this->db->get_where('pengajuan_anggaran', array('id_anggota' => $id_anggota, 'status2' => '2'));

        // Notifikasi DMPAU
        $dmpau = $this->db->get_where('notifikasi', array('id_anggota' => $id_anggota, 'tipe_notifikasi' => '3'));
        // $dmpau = $this->db->get_where('pengajuan_anggaran', array('id_anggota ' => $id_anggota, 'status2' => '3'));

        // NotifikasiKoreksi
        $this->db->select('*');
        $this->db->from('notifikasi');
        $this->db->where("`tipe_notifikasi` BETWEEN '4' and '7'");
        $this->db->where('id_anggota', $id_anggota);


       
        $koreksi = $this->db->query(sprintf("SELECT * FROM `notifikasi` WHERE `id_anggota`= '%s' AND `tipe_notifikasi` BETWEEN '5' AND '6'",$id_anggota));
    

        // $koreksi = $this->db->query(sprintf("SELECT * FROM `pengajuan_anggaran` WHERE `status2` = '5' OR `status2`='6' AND id_anggota=%s", $id_anggota));

        // Total notifikasi
        $totalnotifikasi = $dm->num_rows() + $dmpau->num_rows() + $koreksi->num_rows();

        return  array('totalnotifikasi' => $totalnotifikasi, 'dm' => $dm->result_array(), 'dmpau' => $dmpau->result_array(), 'koreksi' => $koreksi->result_array(), 'totalanggaran' => $totalanggaran, 'totaldisetujui' => $anggarandisetujui, 'totalrevisi' => $revisi);





        // $totalanggaran = $this->db->get_where('pengajuan_anggaran', array('id_anggota ' => $id))->num_rows();

        // $anggarandisetujui = $this->db->query(sprintf("SELECT * FROM `pengajuan_anggaran` WHERE status2='3' AND id_anggota=%s",$id))->num_rows();
        // $revisi = $this->db->query(sprintf("SELECT * FROM `pengajuan_anggaran` WHERE `status2` = '5' OR `status2`='6' AND id_anggota=%s",$id))->num_rows();


        // $dm = $this->db->get_where('pengajuan_anggaran', array('id_anggota' => $id, 'status2' => '2'));
        // $dmpau = $this->db->get_where('pengajuan_anggaran', array('id_anggota ' => $id, 'status2' => '3'));
        // $koreksi = $this->db->query(sprintf("SELECT * FROM `pengajuan_anggaran` WHERE `status2` = '5' OR `status2`='6' AND id_anggota=%s",$id));
        // $totalnotifikasi = $dm->num_rows() + $dmpau->num_rows() + $revisi;




        // return  array('totalnotifikasi' => $totalnotifikasi, 'dm' => $dm->result_array(), 'dmpau' => $dmpau->result_array(), 'totalanggaran' => $totalanggaran, 'totalrevisi' => $revisi, 'totaldisetujui' => $anggarandisetujui, 'koreksi' => $koreksi->result_array());
    }


    public function showbyid_pengajuandm($id, $id_anggota)
    {
        // Memecah sub jabatan DM
        $pecahsubjabatan = $this->jabatan->subjabatan($id);


        // Mencari id jabatan yang termasuk pada sub jabatan
        $subbidang = array();
        foreach ($pecahsubjabatan as $key) {

            $this->db->select('id_jabatan');
            $this->db->from('jabatan');
            $this->db->where('nama_jabatan', $key);
            foreach ($this->db->get()->result_array() as $k) {
                $subbidang[] = $k;
            }
        }




        // Mencari id pegawai berdasarkan pencarian id jabatan
        $idsubbidang = array();
        foreach ($subbidang as $key) {

            $this->db->select('id_anggota');
            $this->db->from('pegawai');
            $this->db->where('id_jabatan', $key['id_jabatan']);
            foreach ($this->db->get()->result_array() as $j) {

                $idsubbidang[] = $j;
            }
        }





        // Mencari ajuan yang memiliki id anggota yang telah tertulis dan menghitung total ajuan
        $totalanggaran = 0;
        $bulan = date('m');
        $tahun = date('Y');
        foreach ($idsubbidang as $key) {


            $this->db->select('count(id_anggota) as totalajuan');
            $this->db->from('pengajuan_anggaran');
            $this->db->where('id_anggota', $key['id_anggota']);
            $this->db->where('bulan2', $bulan);
            $this->db->where('status2>', '0');
            $this->db->where('tahun', $tahun);


            foreach ($this->db->get()->result_array() as $j) {


                $totalanggaran += $j['totalajuan'];
            }
        }


        // Menghitung ajuan yang disetujui
        $anggarandisetujui = 0;
        $bulan = date('m');
        $tahun = date('Y');
        foreach ($idsubbidang as $key) {


            $this->db->select('count(id_anggota) as totalsetuju');
            $this->db->from('pengajuan_anggaran');
            $this->db->where('id_anggota', $key['id_anggota']);
            $this->db->where('bulan2', $bulan);
            $this->db->where('status2', '3');
            $this->db->where('tahun', $tahun);


            foreach ($this->db->get()->result_array() as $j) {



                $anggarandisetujui += $j['totalsetuju'];
            }
        }


        // Menghitung ajuan yang memerlukan koreksi
        $revisi = 0;
        $bulan = date('m');
        
    
       
        foreach ($idsubbidang as $key) {


            $this->db->select('count(id_anggota) as totalrevisi');
            $this->db->from('pengajuan_anggaran');
            $this->db->where('id_anggota', $key['id_anggota']);
            $this->db->where('bulan2', $bulan);
            $this->db->where("status2 BETWEEN '5' AND '6'");
            $this->db->where('tahun', $tahun);


            foreach ($this->db->get()->result_array() as $j) {



                $revisi += $j['totalrevisi'];
            }
        }





        // Notifikasi Sub bidang
        $sub = $this->db->get_where('notifikasi', array('tipe_notifikasi' => '1'));
        // Notifikasi DMPAU
        // $dmpau = $this->db->get_where('notifikasi', array('tipe_notifikasi' => '3'));


        // NotifikasiKoreksi
        $this->db->select('*');
        $this->db->from('notifikasi');
        $this->db->where("tipe_notifikasi", '7');
        
        $koreksi = $this->db->get();
       


        // Total notifikasi
       
        $totalnotifikasi = $sub->num_rows()  + $koreksi->num_rows();
     



        return  array('totalnotifikasi' => $totalnotifikasi, 'sub' => $sub->result_array(), 'totalanggaran' => $totalanggaran, 'totalrevisi' => $revisi, 'totaldisetujui' => $anggarandisetujui, 'koreksi' => $koreksi->result_array());


        // // Notifikasi Koreksi
        // $koreksi = $this->db->query(sprintf("SELECT * FROM `pengajuan_anggaran` WHERE `status2` = '5' OR `status2`='6' AND id_anggota=%s", $id_anggota));




        // $totalanggaran = $this->db->get_where('pengajuan_anggaran', array('status2>' => '1'))->num_rows();
        // $anggarandisetujui = $this->db->query("SELECT * FROM `pengajuan_anggaran` WHERE status2='3'")->num_rows();
        // $revisi = $this->db->query("SELECT * FROM `pengajuan_anggaran` WHERE `status2` = '5' OR `status2`='6'")->num_rows();


        // // Notifikasi
        // $sub = $this->db->get_where('pengajuan_anggaran', array('status2' => '1'));

        // $koreksi = $this->db->query("SELECT * FROM `pengajuan_anggaran` WHERE `status2` = '7'");
        // $totalnotifikasi = $sub->num_rows()  + $koreksi->num_rows();



    }

    public function showbyid_pengajuandmpau($id = null, $id_anggota = null)
    {


        $bulan = date('m');
        $tahun = date('Y');

        $totalanggaran = $this->db->get_where('pengajuan_anggaran', array( 'bulan2' => $bulan, 'status2>=' => '1', 'tahun' => $tahun))->num_rows();
       
        $anggarandisetujui = $this->db->get_where('pengajuan_anggaran', array( 'bulan2' => $bulan,'status2' => '3', 'tahun' => $tahun))->num_rows();
  
        $revisi = $this->db->query(sprintf("SELECT * FROM `pengajuan_anggaran` WHERE  'bulan2' = '%s' and 'tahun' = '%s' and `status2` BETWEEN '5' AND '6' ",$bulan, $tahun))->num_rows();




        $dm = $this->db->get_where('notifikasi', array('tipe_notifikasi' => '2'));

        $koreksi = $this->db->get_where('notifikasi', array('tipe_notifikasi' => '8'));

        $totalnotifikasi = $dm->num_rows()  + $koreksi->num_rows();


        return  array('totalnotifikasi' => $totalnotifikasi, 'dm' => $dm->result_array(), 'totalanggaran' => $totalanggaran, 'totalrevisi' => $revisi, 'totaldisetujui' => $anggarandisetujui, 'koreksi' => $koreksi->result_array());
    }



    public function show_pengajuan_sub()
    {
        $this->db->select('*');

        $this->db->from('pengajuan_anggaran');
        $this->db->where('status2 >=', '1');

        $query = $this->db->get();

        return $query->result_array();
    }
    // New persetujuan DMPAU
    public function show_persetujuanDMPAU()
    {
        $this->db->select('*');
        $this->db->from('pengajuan_anggaran');
        $this->db->where('status2 >=', '2');

        $query = $this->db->get();
        return $query->result_array();
    }

    public function update_pengajuanDM()
    {

        $id = $this->input->post('id_pengajuan');
        $nominalpengajuan = $this->M_detailajuan->hitunganggaran($id)[0]['nominal_pengajuan2'];

        $data = array(
            'id_pengajuan' => $id,
            'id_anggota' => $this->input->post('id_anggota'),
            'catatan_dm2' => $this->input->post('catatan_dm2'),
            'total_pengajuan2' => $nominalpengajuan,
            'minggu2' => $this->input->post('minggu2'),
            'bulan2' => $this->input->post('bulan2'),
            'catatan_dmpau2' => '',
            'status2' => $this->input->post('status2'),
            'tanggal_mulai2' => $this->input->post('tanggal_mulai2'),
            'tanggal_sampai2' => $this->input->post('tanggal_sampai2'),
            'tgl_pengajuan2' => $this->input->post('tgl_pengajuan2'),
            'tahun' =>  $this->input->post('tahun')
        );


        $this->db->update('pengajuan_anggaran', $data, array('id_pengajuan' => $id));
    }
    public function update_pengajuanDMPAU()
    {


        $id = $this->input->post('id_pengajuan');
        $nominalpengajuan = $this->M_detailajuan->hitunganggaran($id)[0]['nominal_pengajuan2'];
        $data = array(
            'id_pengajuan' => $id,
            'id_anggota' => $this->input->post('id_anggota'),
            'catatan_dm2' => $this->input->post('catatan_dm2'),
            'total_pengajuan2' => $nominalpengajuan,
            'minggu2' => $this->input->post('minggu2'),
            'bulan2' => $this->input->post('bulan2'),
            'catatan_dmpau2' => $this->input->post('catatan_dmpau2'),
            'status2' => $this->input->post('status2'),
            'tanggal_mulai2' => $this->input->post('tanggal_mulai2'),
            'tanggal_sampai2' => $this->input->post('tanggal_sampai2'),
            'tgl_pengajuan2' => $this->input->post('tgl_pengajuan2'),
            'tahun' =>  $this->input->post('tahun')
        );


        $this->db->update('pengajuan_anggaran', $data, array('id_pengajuan' => $id));
    }
}
