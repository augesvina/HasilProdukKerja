<?php
defined('BASEPATH') or exit('No direct script access allowed');

class SearchController2 extends CI_Controller
{

    public function index()
    {
        $this->load->model('SearchModel');
        $keyword = $this->input->get('keyword');
        $data = $this->SearchModel->ambil_data2($keyword);
        $data = array(
            'keyword'    => $keyword,
            'data'        => $data
        );
        $this->load->view('cari/search2', $data);
    }
}
