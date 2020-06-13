<?php
	
	/**
	* 
	*/
	class Ppdb extends CI_Controller
	{
		
		function __construct()
		{
			parent::__construct();
			$this->load->model('m_tulisan');
			$this->load->model('m_pengunjung');
			$this->load->model('m_files');
			$this->load->model('m_portfolio');
			$this->load->model('m_kontak');
			$this->load->model('m_galeri');
			$this->load->model('m_album');
			$this->load->model('m_pengumuman');
			$this->load->model('m_tautan');
			$this->load->library('upload');
        	$this->m_pengunjung->count_visitor();		
    	}

		function index()
		{
			$kode=8;
			$y['title'] = 'Pendaftaran Peserta Didik Baru (PPDB)';
			$x['data']=$this->m_pengumuman->get_all_pengumuman();
			$x['portofolio']=$this->m_portfolio->get_portfolio_by_kode($kode);
			$x['visitor'] = $this->m_pengunjung->statistik_pengujung();
			$x['total'] = $this->m_pengunjung->get_all_pengunjung();
			$x['tautan'] = $this->m_tautan->get_all_tautan();
			$this->load->view('v_header',$y);
			$this->load->view('v_sidebar',["side" => 6]);
			$this->load->view('v_ppdb.php',$x);
			$this->load->view('v_footer');
		}

	
	}
?>