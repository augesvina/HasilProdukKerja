<?php 
class Tiket extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('m_tiket');
       
	}
	function index(){
		$x['tiket']=$this->m_tiket->getDataTiket();
		$this->load->view('v_tiket',$x);
	}

}