<?php 
class About extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('m_about');
       
	}
	function index(){
		$x['about']=$this->m_about->getDataAbout();
		$this->load->view('v_about',$x);
	}

}