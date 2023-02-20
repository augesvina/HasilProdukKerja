<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_rekapanggaran extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_detailajuan');
        $this->load->model('M_ajuananggaran');
    }
    public function show_rekapposanggaran($id, $bulan = null)
    {
        if ($bulan != null) {

            $months = [
                'January',
                'February',
                'March',
                'April',
                'May',
                'June',
                'July',
                'August',
                'September',
                'October',
                'November',
                'December'
            ];


            $saatini = date('m', strtotime($months[$bulan - 1]));
        } else {
            $saatini = date('m');
        }



        $arrbulan = array("01" => 'Januari', "02" => 'Februari', "03" => 'Maret', "04" => 'April', "05" => 'Mei', "06" => 'Juni', "07" => 'Juli', "08" => 'Agustus', "09" => 'September', "10" => 'Oktober', "11" => 'November', "12" => 'Desember');
        $tahun = date('Y');
        $minggu1 = $this->db->query(sprintf("SELECT  SUM(detail_pengajuananggaran.nominal_pengajuan2) as nominal FROM pengajuan_anggaran
INNER JOIN detail_pengajuananggaran ON pengajuan_anggaran.id_pengajuan=detail_pengajuananggaran.id_pengajuan WHERE pengajuan_anggaran.minggu2 = '%s' AND detail_pengajuananggaran.id_subpos = '%s' AND  pengajuan_anggaran.status2='3' AND pengajuan_anggaran.bulan2= '%s'  AND pengajuan_anggaran.tahun= '%s'", '1', $id, $saatini, $tahun))->result_array();
      
        $minggu2 = $this->db->query(sprintf("SELECT  SUM(detail_pengajuananggaran.nominal_pengajuan2) as nominal FROM pengajuan_anggaran
INNER JOIN detail_pengajuananggaran ON pengajuan_anggaran.id_pengajuan=detail_pengajuananggaran.id_pengajuan WHERE pengajuan_anggaran.minggu2 = '%s' AND detail_pengajuananggaran.id_subpos = '%s' AND  pengajuan_anggaran.status2='3' AND pengajuan_anggaran.bulan2= '%s'  AND pengajuan_anggaran.tahun= '%s'", '2', $id, $saatini, $tahun))->result_array();
        
        $minggu3 = $this->db->query(sprintf("SELECT  SUM(detail_pengajuananggaran.nominal_pengajuan2) as nominal FROM pengajuan_anggaran
INNER JOIN detail_pengajuananggaran ON pengajuan_anggaran.id_pengajuan=detail_pengajuananggaran.id_pengajuan WHERE pengajuan_anggaran.minggu2 = '%s' AND detail_pengajuananggaran.id_subpos = '%s' AND  pengajuan_anggaran.status2='3' AND pengajuan_anggaran.bulan2= '%s'  AND pengajuan_anggaran.tahun= '%s'", '3', $id, $saatini, $tahun))->result_array();
        $minggu4 = $this->db->query(sprintf("SELECT  SUM(detail_pengajuananggaran.nominal_pengajuan2) as nominal FROM pengajuan_anggaran
INNER JOIN detail_pengajuananggaran ON pengajuan_anggaran.id_pengajuan=detail_pengajuananggaran.id_pengajuan WHERE pengajuan_anggaran.minggu2 = '%s' AND detail_pengajuananggaran.id_subpos = '%s' AND  pengajuan_anggaran.status2='3' AND pengajuan_anggaran.bulan2= '%s'  AND pengajuan_anggaran.tahun= '%s'", '4', $id, $saatini, $tahun))->result_array();
        $total = $minggu1[0]['nominal'] + $minggu2[0]['nominal'] + $minggu3[0]['nominal'] + $minggu4[0]['nominal'];


        return array('minggu1' => $minggu1[0], 'minggu2' => $minggu2[0], 'minggu3' => $minggu3[0], 'minggu4' => $minggu4[0], 'total' => $total, 'bulan' => $arrbulan[$saatini]);
    }

    public function show_rekapanggaran($id, $bulan = null)

    {
        if ($bulan != null) {
            $months = [
                'January',
                'February',
                'March',
                'April',
                'May',
                'June',
                'July',
                'August',
                'September',
                'October',
                'November',
                'December'
            ];


            $saatini = date('m', strtotime($months[$bulan - 1]));
        } else {
            $saatini = date('m');
        }


        $arrbulan = array("01" => 'Januari', "02" => 'Februari', "03" => 'Maret', "04" => 'April', "05" => 'Mei', "06" => 'Juni', "07" => 'Juli', "08" => 'Agustus', "09" => 'September', "10" => 'Oktober', "11" => 'November', "12" => 'Desember');
        $tahun = date('Y');
        $minggu1 = $this->db->query(sprintf("SELECT  SUM(detail_pengajuananggaran.nominal_pengajuan2) as nominal FROM pengajuan_anggaran
    INNER JOIN detail_pengajuananggaran ON pengajuan_anggaran.id_pengajuan=detail_pengajuananggaran.id_pengajuan WHERE pengajuan_anggaran.minggu2 = '%s' AND detail_pengajuananggaran.id_pos = '%s' AND  pengajuan_anggaran.status2='3' AND pengajuan_anggaran.bulan2= '%s'  AND pengajuan_anggaran.tahun= '%s'", '1',  $id,$saatini, $tahun))->result_array();
        $minggu2 = $this->db->query(sprintf("SELECT  SUM(detail_pengajuananggaran.nominal_pengajuan2) as nominal FROM pengajuan_anggaran
     INNER JOIN detail_pengajuananggaran ON pengajuan_anggaran.id_pengajuan=detail_pengajuananggaran.id_pengajuan WHERE pengajuan_anggaran.minggu2 = '%s' AND detail_pengajuananggaran.id_pos = '%s' AND  pengajuan_anggaran.status2='3' AND pengajuan_anggaran.bulan2= '%s'  AND pengajuan_anggaran.tahun= '%s'", '2', $id,$saatini, $tahun))->result_array();
        $minggu3 = $this->db->query(sprintf("SELECT  SUM(detail_pengajuananggaran.nominal_pengajuan2) as nominal FROM pengajuan_anggaran
INNER JOIN detail_pengajuananggaran ON pengajuan_anggaran.id_pengajuan=detail_pengajuananggaran.id_pengajuan WHERE pengajuan_anggaran.minggu2 = '%s' AND detail_pengajuananggaran.id_pos = '%s' AND  pengajuan_anggaran.status2='3' AND pengajuan_anggaran.bulan2= '%s' AND pengajuan_anggaran.tahun= '%s'", '3', $id,$saatini, $tahun))->result_array();
        $minggu4 = $this->db->query(sprintf("SELECT  SUM(detail_pengajuananggaran.nominal_pengajuan2) as nominal FROM pengajuan_anggaran
 INNER JOIN detail_pengajuananggaran ON pengajuan_anggaran.id_pengajuan=detail_pengajuananggaran.id_pengajuan WHERE pengajuan_anggaran.minggu2 = '%s' AND detail_pengajuananggaran.id_pos = '%s' AND  pengajuan_anggaran.status2='3' AND pengajuan_anggaran.bulan2= '%s'  AND pengajuan_anggaran.tahun= '%s'", '4', $id,$saatini, $tahun))->result_array();
        $total = $minggu1[0]['nominal'] + $minggu2[0]['nominal'] + $minggu3[0]['nominal'] + $minggu4[0]['nominal'];


        return array('minggu1' => $minggu1[0], 'minggu2' => $minggu2[0], 'minggu3' => $minggu3[0], 'minggu4' => $minggu4[0], 'total' => $total, 'bulan' => $arrbulan[$saatini]);
    }
}
