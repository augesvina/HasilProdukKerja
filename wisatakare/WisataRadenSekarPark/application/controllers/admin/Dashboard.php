<?php
class Dashboard extends CI_Controller{
	function __construct(){
		parent::__construct();
		if(!isset($_SESSION['logged_in'])){
            $url=base_url('administrator');
            redirect($url);
        };
		$this->load->model('m_admin');
	}
	function index(){
			$x['visitor'] = $this->m_admin->statistik_admin();
			$this->load->view('admin/v_dashboard',$x);
	
	}
	
}