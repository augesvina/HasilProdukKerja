<?php defined('BASEPATH') or exit('NO direct script acces allowed');

class M_chartgrafik extends CI_Model
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('M_input_jabatan', 'jabatan');
    }
    public function querytotalajuan($bulan, $tahun, $status = null, $id_anggota = null)
    {

        
        if ($status == 'dmpau') {
            
           
            $this->db->select('count(id_anggota) as totalajuan');
            $this->db->from('pengajuan_anggaran');
            
            $this->db->where('bulan2', $bulan);
            $this->db->where('status2>', '0');
            $this->db->where('tahun', $tahun);
            $query = $this->db->get()->result_array()[0]['totalajuan'];
            return $query;
           
            // return $query;
            # code...
        } else {
            $this->db->select('count(id_anggota) as totalajuan');
            $this->db->from('pengajuan_anggaran');
            $this->db->where('id_anggota', $id_anggota);
            $this->db->where('bulan2', $bulan);
            $this->db->where('status2>', '0');
            $this->db->where('tahun', $tahun);

            $query = $this->db->get()->result_array()[0]['totalajuan'];


            return $query;
        }
    }
    public function querytotalajuandisetujui($bulan, $tahun, $status = null, $id_anggota = null)
    {
        
        $this->db->select('count(id_anggota) as totalajuan');
        $this->db->from('pengajuan_anggaran');
        $this->db->where('id_anggota', $id_anggota);
        $this->db->where('bulan2', $bulan);
        $this->db->where('status2', '3');
        $this->db->where('tahun', $tahun);

        $query = $this->db->get()->result_array()[0]['totalajuan'];


        return $query;
    }
    public function subbidangajuandisetujui($date, $id_jabatan)
    {

        // Cari nama sub jabatan dari subbidang ke dm
        $namajabatan = $this->db->get_where('jabatan', array('id_jabatan' => $id_jabatan), 1)->result_array();
        
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
        $januari = 0;
        $februari = 0;
        $maret = 0;
        $april = 0;
        $mei = 0;
        $juni = 0;
        $juli = 0;
        $agustus = 0;
        $september = 0;
        $oktober = 0;
        $november = 0;
        $desember = 0;





        $tahun = date('Y', strtotime($date));



        foreach ($idsubbidang as $key) {

            $januari += $this->querytotalajuandisetujui('01', $tahun, '', $key['id_anggota']);

            $februari += $this->querytotalajuandisetujui('02', $tahun, '', $key['id_anggota']);
            $maret += $this->querytotalajuandisetujui('03', $tahun, '', $key['id_anggota']);
            $april += $this->querytotalajuandisetujui('04', $tahun, '', $key['id_anggota']);
            $mei += $this->querytotalajuandisetujui('05', $tahun, '', $key['id_anggota']);
            $juni += $this->querytotalajuandisetujui('06', $tahun, '', $key['id_anggota']);


            $juli += $this->querytotalajuandisetujui('07', $tahun, '', $key['id_anggota']);
            $agustus += $this->querytotalajuandisetujui('08', $tahun, '', $key['id_anggota']);
            $september += $this->querytotalajuandisetujui('09', $tahun, '', $key['id_anggota']);
            $oktober += $this->querytotalajuandisetujui('10', $tahun, '', $key['id_anggota']);
            $november += $this->querytotalajuandisetujui('11', $tahun, '', $key['id_anggota']);
            $desember += $this->querytotalajuandisetujui('12', $tahun, '', $key['id_anggota']);
        }







        return array($januari, $februari, $maret, $april, $mei, $juni, $juli, $agustus, $september, $oktober, $november, $desember);
    }
    public function subbidangtotalajuan($date, $id_jabatan = null)
    {


        // Cari nama sub jabatan dari subbidang ke dm
        $namajabatan = $this->db->get_where('jabatan', array('id_jabatan' => $id_jabatan), 1)->result_array();

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
        $januari = 0;
        $februari = 0;
        $maret = 0;
        $april = 0;
        $mei = 0;
        $juni = 0;
        $juli = 0;
        $agustus = 0;
        $september = 0;
        $oktober = 0;
        $november = 0;
        $desember = 0;





        $tahun = date('Y', strtotime($date));



        foreach ($idsubbidang as $key) {

            $januari += $this->querytotalajuan('01', $tahun, '', $key['id_anggota']);

            $februari += $this->querytotalajuan('02', $tahun, '', $key['id_anggota']);
            $maret += $this->querytotalajuan('03', $tahun, '', $key['id_anggota']);
            $april += $this->querytotalajuan('04', $tahun, '', $key['id_anggota']);
            $mei += $this->querytotalajuan('05', $tahun, '', $key['id_anggota']);
            $juni += $this->querytotalajuan('06', $tahun, '', $key['id_anggota']);


            $juli += $this->querytotalajuan('07', $tahun, '', $key['id_anggota']);
            $agustus += $this->querytotalajuan('08', $tahun, '', $key['id_anggota']);
            $september += $this->querytotalajuan('09', $tahun, '', $key['id_anggota']);
            $oktober += $this->querytotalajuan('10', $tahun, '', $key['id_anggota']);
            $november += $this->querytotalajuan('11', $tahun, '', $key['id_anggota']);
            $desember += $this->querytotalajuan('12', $tahun, '', $key['id_anggota']);
        }







        return array($januari, $februari, $maret, $april, $mei, $juni, $juli, $agustus, $september, $oktober, $november, $desember);








        // //   Januari
        // $januaridate = array();
        // $januaridate[0] = (floatval(date('Y', strtotime($date))) - 1) . '-12-31';
        // $januaridate[1] = (floatval(date('Y', strtotime($date)))) . '-02-01';
        // $query = sprintf("SELECT COUNT(id_pengajuan) as total FROM `pengajuan_anggaran` WHERE tgl_pengajuan2 BETWEEN '%s' AND '%s'", $januaridate[0], $januaridate[1]);
        // $januari = $this->db->query($query)->result_array();
        // // februari
        // $februaridate = array();
        // $februaridate[0] = (floatval(date('Y', strtotime($date)))) . '-01-31';
        // $februaridate[1] = (floatval(date('Y', strtotime($date)))) . '-03-01';
        // $query = sprintf("SELECT COUNT(id_pengajuan) as total FROM `pengajuan_anggaran` WHERE tgl_pengajuan2 BETWEEN '%s' AND '%s'", $februaridate[0], $februaridate[1]);
        // $februari = $this->db->query($query)->result_array();
        // // Maret
        // if (floatval(date('Y', strtotime($date))) % 4 == 0) {
        //     $maretdate[0] = (floatval(date('Y', strtotime($date)))) . '-02-29';
        // } else {
        //     $maretdate[0] = (floatval(date('Y', strtotime($date)))) . '-02-28';
        // }
        // $maretdate[1] = (floatval(date('Y', strtotime($date)))) . '-04-01';
        // $query = sprintf("SELECT COUNT(id_pengajuan) as total FROM `pengajuan_anggaran` WHERE tgl_pengajuan2 BETWEEN '%s' AND '%s'", $maretdate[0], $maretdate[1]);
        // $maret = $this->db->query($query)->result_array();
        // // April
        // $aprildate = array();
        // $aprildate[0] = (floatval(date('Y', strtotime($date)))) . '-03-31';
        // $aprildate[1] = (floatval(date('Y', strtotime($date)))) . '-05-01';
        // $query = sprintf("SELECT COUNT(id_pengajuan) as total FROM `pengajuan_anggaran` WHERE tgl_pengajuan2 BETWEEN '%s' AND '%s'", $aprildate[0], $aprildate[1]);
        // $april = $this->db->query($query)->result_array();
        // // Mei
        // $meidate = array();
        // $meidate[0] = (floatval(date('Y', strtotime($date)))) . '-04-30';
        // $meidate[1] = (floatval(date('Y', strtotime($date)))) . '-06-01';
        // $query = sprintf("SELECT COUNT(id_pengajuan) as total FROM `pengajuan_anggaran` WHERE tgl_pengajuan2 BETWEEN '%s' AND '%s'", $meidate[0], $meidate[1]);
        // $mei = $this->db->query($query)->result_array();
        // // Juni
        // $junidate = array();
        // $junidate[0] = (floatval(date('Y', strtotime($date)))) . '-05-31';
        // $junidate[1] = (floatval(date('Y', strtotime($date)))) . '-07-01';
        // $query = sprintf("SELECT COUNT(id_pengajuan) as total FROM `pengajuan_anggaran` WHERE tgl_pengajuan2 BETWEEN '%s' AND '%s'", $junidate[0], $junidate[1]);
        // $juni = $this->db->query($query)->result_array();
        // // Juli
        // $julidate = array();
        // $julidate[0] = (floatval(date('Y', strtotime($date)))) . '-06-30';
        // $julidate[1] = (floatval(date('Y', strtotime($date)))) . '-08-01';
        // $query = sprintf("SELECT COUNT(id_pengajuan) as total FROM `pengajuan_anggaran` WHERE tgl_pengajuan2 BETWEEN '%s' AND '%s'", $julidate[0], $julidate[1]);
        // $juli = $this->db->query($query)->result_array();
        // // Agustus
        // $agustusdate = array();
        // $agustusdate[0] = (floatval(date('Y', strtotime($date)))) . '-07-31';
        // $agustusdate[1] = (floatval(date('Y', strtotime($date)))) . '-09-01';
        // $query = sprintf("SELECT COUNT(id_pengajuan) as total FROM `pengajuan_anggaran` WHERE tgl_pengajuan2 BETWEEN '%s' AND '%s'", $agustusdate[0], $agustusdate[1]);
        // $agustus = $this->db->query($query)->result_array();
        // // September
        // $septemberdate = array();
        // $septemberdate[0] = (floatval(date('Y', strtotime($date)))) . '-08-31';
        // $septemberdate[1] = (floatval(date('Y', strtotime($date)))) . '-10-01';
        // $query = sprintf("SELECT COUNT(id_pengajuan) as total FROM `pengajuan_anggaran` WHERE tgl_pengajuan2 BETWEEN '%s' AND '%s'", $septemberdate[0], $septemberdate[1]);
        // $september = $this->db->query($query)->result_array();

        // // Oktober
        // $oktoberdate = array();
        // $oktoberdate[0] = (floatval(date('Y', strtotime($date)))) . '-09-30';
        // $oktoberdate[1] = (floatval(date('Y', strtotime($date)))) . '-11-01';
        // $query = sprintf("SELECT COUNT(id_pengajuan) as total FROM `pengajuan_anggaran` WHERE tgl_pengajuan2 BETWEEN '%s' AND '%s'", $oktoberdate[0], $oktoberdate[1]);
        // $oktober = $this->db->query($query)->result_array();
        // // November 
        // $novemberdate = array();
        // $novemberdate[0] = (floatval(date('Y', strtotime($date)))) . '-10-31';
        // $novemberdate[1] = (floatval(date('Y', strtotime($date)))) . '-12-01';
        // $query = sprintf("SELECT COUNT(id_pengajuan) as total FROM `pengajuan_anggaran` WHERE tgl_pengajuan2 BETWEEN '%s' AND '%s'", $novemberdate[0], $novemberdate[1]);
        // $november = $this->db->query($query)->result_array();

        // // Desember
        // $desemberdate = array();
        // $desemberdate[0] = (floatval(date('Y', strtotime($date)))) . '-11-30';
        // $desemberdate[1] = (floatval(date('Y', strtotime($date))) +1). '-01-01';
        // $query = sprintf("SELECT COUNT(id_pengajuan) as total FROM `pengajuan_anggaran` WHERE tgl_pengajuan2 BETWEEN '%s' AND '%s'", $desemberdate[0], $desemberdate[1]);
        // $desember = $this->db->query($query)->result_array();









        // //   Januari
        // $januaridate = array();
        // $januaridate[0] = (floatval(date('Y', strtotime($date))) - 1) . '-12-31';
        // $januaridate[1] = (floatval(date('Y', strtotime($date)))) . '-02-01';
        // $query = sprintf("SELECT COUNT(id_pengajuan) as total FROM `pengajuan_anggaran` WHERE tgl_pengajuan2 BETWEEN '%s' AND '%s'", $januaridate[0], $januaridate[1]);
        // $januari = $this->db->query($query)->result_array();
        // // februari
        // $februaridate = array();
        // $februaridate[0] = (floatval(date('Y', strtotime($date)))) . '-01-31';
        // $februaridate[1] = (floatval(date('Y', strtotime($date)))) . '-03-01';
        // $query = sprintf("SELECT COUNT(id_pengajuan) as total FROM `pengajuan_anggaran` WHERE tgl_pengajuan2 BETWEEN '%s' AND '%s'", $februaridate[0], $februaridate[1]);
        // $februari = $this->db->query($query)->result_array();
        // // Maret
        // if (floatval(date('Y', strtotime($date))) % 4 == 0) {
        //     $maretdate[0] = (floatval(date('Y', strtotime($date)))) . '-02-29';
        // } else {
        //     $maretdate[0] = (floatval(date('Y', strtotime($date)))) . '-02-28';
        // }
        // $maretdate[1] = (floatval(date('Y', strtotime($date)))) . '-04-01';
        // $query = sprintf("SELECT COUNT(id_pengajuan) as total FROM `pengajuan_anggaran` WHERE tgl_pengajuan2 BETWEEN '%s' AND '%s'", $maretdate[0], $maretdate[1]);
        // $maret = $this->db->query($query)->result_array();
        // // April
        // $aprildate = array();
        // $aprildate[0] = (floatval(date('Y', strtotime($date)))) . '-03-31';
        // $aprildate[1] = (floatval(date('Y', strtotime($date)))) . '-05-01';
        // $query = sprintf("SELECT COUNT(id_pengajuan) as total FROM `pengajuan_anggaran` WHERE tgl_pengajuan2 BETWEEN '%s' AND '%s'", $aprildate[0], $aprildate[1]);
        // $april = $this->db->query($query)->result_array();
        // // Mei
        // $meidate = array();
        // $meidate[0] = (floatval(date('Y', strtotime($date)))) . '-04-30';
        // $meidate[1] = (floatval(date('Y', strtotime($date)))) . '-06-01';
        // $query = sprintf("SELECT COUNT(id_pengajuan) as total FROM `pengajuan_anggaran` WHERE tgl_pengajuan2 BETWEEN '%s' AND '%s'", $meidate[0], $meidate[1]);
        // $mei = $this->db->query($query)->result_array();
        // // Juni
        // $junidate = array();
        // $junidate[0] = (floatval(date('Y', strtotime($date)))) . '-05-31';
        // $junidate[1] = (floatval(date('Y', strtotime($date)))) . '-07-01';
        // $query = sprintf("SELECT COUNT(id_pengajuan) as total FROM `pengajuan_anggaran` WHERE tgl_pengajuan2 BETWEEN '%s' AND '%s'", $junidate[0], $junidate[1]);
        // $juni = $this->db->query($query)->result_array();
        // // Juli
        // $julidate = array();
        // $julidate[0] = (floatval(date('Y', strtotime($date)))) . '-06-30';
        // $julidate[1] = (floatval(date('Y', strtotime($date)))) . '-08-01';
        // $query = sprintf("SELECT COUNT(id_pengajuan) as total FROM `pengajuan_anggaran` WHERE tgl_pengajuan2 BETWEEN '%s' AND '%s'", $julidate[0], $julidate[1]);
        // $juli = $this->db->query($query)->result_array();
        // // Agustus
        // $agustusdate = array();
        // $agustusdate[0] = (floatval(date('Y', strtotime($date)))) . '-07-31';
        // $agustusdate[1] = (floatval(date('Y', strtotime($date)))) . '-09-01';
        // $query = sprintf("SELECT COUNT(id_pengajuan) as total FROM `pengajuan_anggaran` WHERE tgl_pengajuan2 BETWEEN '%s' AND '%s'", $agustusdate[0], $agustusdate[1]);
        // $agustus = $this->db->query($query)->result_array();
        // // September
        // $septemberdate = array();
        // $septemberdate[0] = (floatval(date('Y', strtotime($date)))) . '-08-31';
        // $septemberdate[1] = (floatval(date('Y', strtotime($date)))) . '-10-01';
        // $query = sprintf("SELECT COUNT(id_pengajuan) as total FROM `pengajuan_anggaran` WHERE tgl_pengajuan2 BETWEEN '%s' AND '%s'", $septemberdate[0], $septemberdate[1]);
        // $september = $this->db->query($query)->result_array();

        // // Oktober
        // $oktoberdate = array();
        // $oktoberdate[0] = (floatval(date('Y', strtotime($date)))) . '-09-30';
        // $oktoberdate[1] = (floatval(date('Y', strtotime($date)))) . '-11-01';
        // $query = sprintf("SELECT COUNT(id_pengajuan) as total FROM `pengajuan_anggaran` WHERE tgl_pengajuan2 BETWEEN '%s' AND '%s'", $oktoberdate[0], $oktoberdate[1]);
        // $oktober = $this->db->query($query)->result_array();
        // // November 
        // $novemberdate = array();
        // $novemberdate[0] = (floatval(date('Y', strtotime($date)))) . '-10-31';
        // $novemberdate[1] = (floatval(date('Y', strtotime($date)))) . '-12-01';
        // $query = sprintf("SELECT COUNT(id_pengajuan) as total FROM `pengajuan_anggaran` WHERE tgl_pengajuan2 BETWEEN '%s' AND '%s'", $novemberdate[0], $novemberdate[1]);
        // $november = $this->db->query($query)->result_array();

        // // Desember
        // $desemberdate = array();
        // $desemberdate[0] = (floatval(date('Y', strtotime($date)))) . '-11-30';
        // $desemberdate[1] = (floatval(date('Y', strtotime($date))) +1). '-01-01';
        // $query = sprintf("SELECT COUNT(id_pengajuan) as total FROM `pengajuan_anggaran` WHERE tgl_pengajuan2 BETWEEN '%s' AND '%s'", $desemberdate[0], $desemberdate[1]);
        // $desember = $this->db->query($query)->result_array();


















    }

    public function dmtotalajuan($date, $id_jabatan = null)
    {
        // Memecah sub jabatan DM
        $pecahsubjabatan = $this->jabatan->subjabatan($id_jabatan);


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
        $januari = 0;
        $februari = 0;
        $maret = 0;
        $april = 0;
        $mei = 0;
        $juni = 0;
        $juli = 0;
        $agustus = 0;
        $september = 0;
        $oktober = 0;
        $november = 0;
        $desember = 0;





        $tahun = date('Y', strtotime($date));



        foreach ($idsubbidang as $key) {

            $januari += $this->querytotalajuan('01', $tahun, '', $key['id_anggota']);

            $februari += $this->querytotalajuan('02', $tahun, '', $key['id_anggota']);
            $maret += $this->querytotalajuan('03', $tahun, '', $key['id_anggota']);
            $april += $this->querytotalajuan('04', $tahun, '', $key['id_anggota']);
            $mei += $this->querytotalajuan('05', $tahun, '', $key['id_anggota']);
            $juni += $this->querytotalajuan('06', $tahun, '', $key['id_anggota']);


            $juli += $this->querytotalajuan('07', $tahun, '', $key['id_anggota']);
            $agustus += $this->querytotalajuan('08', $tahun, '', $key['id_anggota']);
            $september += $this->querytotalajuan('09', $tahun, '', $key['id_anggota']);
            $oktober += $this->querytotalajuan('10', $tahun, '', $key['id_anggota']);
            $november += $this->querytotalajuan('11', $tahun, '', $key['id_anggota']);
            $desember += $this->querytotalajuan('12', $tahun, '', $key['id_anggota']);
        }







        return array($januari, $februari, $maret, $april, $mei, $juni, $juli, $agustus, $september, $oktober, $november, $desember);







        return array($januari, $februari, $maret, $april, $mei, $juni, $juli, $agustus, $september, $oktober, $november, $desember);
    }
    public function dmdisetujui($date, $id_jabatan = null)
    {
   
        // Memecah sub jabatan DM
        $pecahsubjabatan = $this->jabatan->subjabatan($id_jabatan);


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
        $januari = 0;
        $februari = 0;
        $maret = 0;
        $april = 0;
        $mei = 0;
        $juni = 0;
        $juli = 0;
        $agustus = 0;
        $september = 0;
        $oktober = 0;
        $november = 0;
        $desember = 0;





        $tahun = date('Y', strtotime($date));



        foreach ($idsubbidang as $key) {

            $januari += $this->querytotalajuandisetujui('01', $tahun, '', $key['id_anggota']);

            $februari += $this->querytotalajuandisetujui('02', $tahun, '', $key['id_anggota']);
            $maret += $this->querytotalajuandisetujui('03', $tahun, '', $key['id_anggota']);
            $april += $this->querytotalajuandisetujui('04', $tahun, '', $key['id_anggota']);
            $mei += $this->querytotalajuandisetujui('05', $tahun, '', $key['id_anggota']);
            $juni += $this->querytotalajuandisetujui('06', $tahun, '', $key['id_anggota']);


            $juli += $this->querytotalajuandisetujui('07', $tahun, '', $key['id_anggota']);
            $agustus += $this->querytotalajuandisetujui('08', $tahun, '', $key['id_anggota']);
            $september += $this->querytotalajuandisetujui('09', $tahun, '', $key['id_anggota']);
            $oktober += $this->querytotalajuandisetujui('10', $tahun, '', $key['id_anggota']);
            $november += $this->querytotalajuandisetujui('11', $tahun, '', $key['id_anggota']);
            $desember += $this->querytotalajuandisetujui('12', $tahun, '', $key['id_anggota']);
        }







        return array($januari, $februari, $maret, $april, $mei, $juni, $juli, $agustus, $september, $oktober, $november, $desember);

    }



    public function dmpautotalajuan($date)
    {
        
        
        $tahun = date('Y', strtotime($date));


        $januari = $this->querytotalajuan('01', $tahun,'dmpau');

        $februari = $this->querytotalajuan('02', $tahun, 'dmpau');
        $maret = $this->querytotalajuan('03', $tahun, 'dmpau');
        $april = $this->querytotalajuan('04', $tahun, 'dmpau');
        $mei = $this->querytotalajuan('05', $tahun, 'dmpau');
        $juni = $this->querytotalajuan('06', $tahun, 'dmpau');
        

        $juli = $this->querytotalajuan('07', $tahun, 'dmpau');
        
        $agustus = $this->querytotalajuan('08' , $tahun, 'dmpau');
      
        $september = $this->querytotalajuan('09', $tahun, 'dmpau');
        $oktober = $this->querytotalajuan('10', $tahun, 'dmpau');
        $november = $this->querytotalajuan('11', $tahun, 'dmpau');
        $desember = $this->querytotalajuan('12', $tahun, 'dmpau');
        // return array( $juni, $juli, $agustus, $september, $oktober, $november, $desember);
        
        return array($januari, $februari, $maret, $april, $mei, $juni, $juli, $agustus, $september, $oktober, $november, $desember);

    }
    public function dmpaudisetujui($date)
    {
        $tahun = date('Y', strtotime($date));


        $januari = $this->querytotalajuan('01', $tahun,'dmpau');

        $februari = $this->querytotalkeseluruhandisetujui('02', $tahun, 'dmpau');
        $maret = $this->querytotalkeseluruhandisetujui('03', $tahun, 'dmpau');
        $april = $this->querytotalkeseluruhandisetujui('04', $tahun, 'dmpau');
        $mei = $this->querytotalkeseluruhandisetujui('05', $tahun, 'dmpau');
        $juni = $this->querytotalkeseluruhandisetujui('06', $tahun, 'dmpau');
        

        $juli = $this->querytotalkeseluruhandisetujui('07', $tahun, 'dmpau');
        
        $agustus = $this->querytotalkeseluruhandisetujui('08' , $tahun, 'dmpau');
      
        $september = $this->querytotalkeseluruhandisetujui('09', $tahun, 'dmpau');
        $oktober = $this->querytotalkeseluruhandisetujui('10', $tahun, 'dmpau');
        $november = $this->querytotalkeseluruhandisetujui('11', $tahun, 'dmpau');
        $desember = $this->querytotalkeseluruhandisetujui('12', $tahun, 'dmpau');
        // return array( $juni, $juli, $agustus, $september, $oktober, $november, $desember);
        
        return array($januari, $februari, $maret, $april, $mei, $juni, $juli, $agustus, $september, $oktober, $november, $desember);
        
    }
    public function querytotalkeseluruhandisetujui($bulan, $tahun)
    {
        $this->db->select('count(id_anggota) as totalajuan');
        $this->db->from('pengajuan_anggaran');
        
        $this->db->where('bulan2', $bulan);
        $this->db->where('status2', '3');
        $this->db->where('tahun', $tahun);
        $query = $this->db->get()->result_array()[0]['totalajuan'];
        return $query;

    }
}
