<?php
class Dashboard extends CI_Controller{
	function __construct(){
		parent::__construct();
		if($this->session->userdata('masuk') !=TRUE){
            $url=base_url('Administrator');
            redirect($url);
        };
		$this->load->model('m_pengunjung');
	}
	function index(){
		if($this->session->userdata('akses')=='1'){
			$x['visitor'] = $this->m_pengunjung->statistik_pengujung1();
			$y['title'] = 'SMK Negeri PP Sembawa';
			$this->load->view('admin/v_header',$y);
			$this->load->view('admin/v_sidebar',["side" => 1]);
			$this->load->view('admin/v_dashboard',$x);
		}else{
			redirect('Administrator');
		}
	}
	
}