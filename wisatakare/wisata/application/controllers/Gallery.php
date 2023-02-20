<?php 
class Gallery extends CI_Controller{
	function __construct(){
		parent::__construct();
        $this->load->model('m_gallery');
        $this->load->model('m_album');
       
	}
	function index(){
		$x['album']=$this->m_album->get_all_album();
        $x['data']=$this->m_gallery->get_all_gallery();
		$this->load->view('v_gallery',$x);
	}

}