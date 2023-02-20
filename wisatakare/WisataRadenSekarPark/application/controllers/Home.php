<?php 
class Home extends CI_Controller{
	function __construct(){
		parent::__construct();
        $this->load->model('m_admin');
        $this->load->model('m_album');
       
	}
	function index(){
		$x['album']=$this->m_album->get_all_album();
		$this->load->view('v_home',$x);
	}

}