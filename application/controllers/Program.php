<?php
	class Program extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('m_tulisan');
		$this->load->model('m_pengunjung');
		$this->load->model('m_portfolio');
		$this->load->model('m_jejak_pendapat');
		$this->load->model('m_tautan');
		$this->load->model('m_files');
        $this->m_pengunjung->count_visitor();
	}

	function dipa()
	{
		$y['title'] = 'SMK Negeri SPP Palembang | Profil';
		$this->m_portfolio->count_views(9);
		$x['portofolio1']=$this->m_portfolio->get_portfolio_by_kode(8);
		$x['portofolio']=$this->m_portfolio->get_portfolio_by_kode(9);
		$x['visitor'] = $this->m_pengunjung->statistik_pengujung();
		$x['total'] = $this->m_pengunjung->get_all_pengunjung();
		$x['tautan'] = $this->m_tautan->get_all_tautan();
		$x['files'] = $this->m_files->get_all_files_by_kategori(6);
		$this->load->view('v_header',$y);
		$this->load->view('v_sidebar',["side" => 3]);
		$this->load->view('v_dipa',$x);
		$this->load->view('v_footer');
	}

	function renstra()
	{
		$y['title'] = 'SMK Negeri SPP Palembang | Profil';
		$this->m_portfolio->count_views(9);
		$x['portofolio1']=$this->m_portfolio->get_portfolio_by_kode(8);
		$x['portofolio']=$this->m_portfolio->get_portfolio_by_kode(9);
		$x['visitor'] = $this->m_pengunjung->statistik_pengujung();
		$x['total'] = $this->m_pengunjung->get_all_pengunjung();
		$x['tautan'] = $this->m_tautan->get_all_tautan();
		$x['files'] = $this->m_files->get_all_files_by_kategori(7);
		$this->load->view('v_header',$y);
		$this->load->view('v_sidebar',["side" => 3]);
		$this->load->view('v_renstra',$x);
		$this->load->view('v_footer');
	}

	function renja()
	{
		$y['title'] = 'SMK Negeri SPP Palembang | Profil';
		$this->m_portfolio->count_views(9);
		$x['portofolio1']=$this->m_portfolio->get_portfolio_by_kode(8);
		$x['portofolio']=$this->m_portfolio->get_portfolio_by_kode(9);
		$x['visitor'] = $this->m_pengunjung->statistik_pengujung();
		$x['total'] = $this->m_pengunjung->get_all_pengunjung();
		$x['tautan'] = $this->m_tautan->get_all_tautan();
		$x['files'] = $this->m_files->get_all_files_by_kategori(8);
		$this->load->view('v_header',$y);
		$this->load->view('v_sidebar',["side" => 3]);
		$this->load->view('v_renja',$x);
		$this->load->view('v_footer');
	}

	function cetak(){

		$id = $this->uri->segment(4);
		$x['files'] = $this->m_files->get_all_files_by_kategori($id);
		$this->load->view('v_cetak',$x);
	}



}
