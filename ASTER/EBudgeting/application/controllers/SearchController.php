<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SearchController extends CI_Controller {

	public function index()
	{
		$this->load->model('SearchModel');
		$keyword = $this->input->get('keyword');
		$data = $this->SearchModel->ambil_data($keyword);
		$data = array(
			'keyword'	=> $keyword,
			'data'		=> $data
		);
		$this->load->view('cari/search',$data);
	}

}