<?php
	class Kinerja extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('m_tulisan');
		$this->load->model('m_pengunjung');
		$this->load->model('m_portfolio');
		$this->load->model('m_jejak_pendapat');
		$this->load->model('m_tautan');
		$this->load->model('m_files');
		$this->load->model('m_kinerja');
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
		$x['files'] = $this->m_files->get_all_files_by_kategori(9);
		$this->load->view('v_header',$y);
		$this->load->view('v_sidebar',["side" => 4]);
		$this->load->view('v_laporan_tahunan',$x);
		$this->load->view('v_footer');
	}

	function laporan_tahunan()
	{
		$y['title'] = 'SMK Negeri SPP Palembang | Profil';
		$this->m_portfolio->count_views(9);
		$x['portofolio1']=$this->m_portfolio->get_portfolio_by_kode(8);
		$x['portofolio']=$this->m_portfolio->get_portfolio_by_kode(9);
		$x['visitor'] = $this->m_pengunjung->statistik_pengujung();
		$x['total'] = $this->m_pengunjung->get_all_pengunjung();
		$x['tautan'] = $this->m_tautan->get_all_tautan();
		$x['files'] = $this->m_files->get_all_files_by_kategori(9);
		$x['kataPengantar'] = $this->m_kinerja->get_kataPengantar(9);
		$this->load->view('v_header',$y);
		$this->load->view('v_sidebar',["side" => 4]);
		$this->load->view('v_laporan_tahunan',$x);
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
		$this->load->view('v_sidebar',["side" => 4]);
		$this->load->view('v_renja',$x);
		$this->load->view('v_footer');
	}

	function laporan_tahunan_ppid()
	{
		$y['title'] = 'SMK Negeri SPP Palembang | Profil';
		$this->m_portfolio->count_views(9);
		$x['portofolio1']=$this->m_portfolio->get_portfolio_by_kode(8);
		$x['portofolio']=$this->m_portfolio->get_portfolio_by_kode(9);
		$x['visitor'] = $this->m_pengunjung->statistik_pengujung();
		$x['total'] = $this->m_pengunjung->get_all_pengunjung();
		$x['tautan'] = $this->m_tautan->get_all_tautan();
		$x['files'] = $this->m_files->get_all_files_by_kategori(10);
		$x['kataPengantar'] = $this->m_kinerja->get_kataPengantar(10);
		$this->load->view('v_header',$y);
		$this->load->view('v_sidebar',["side" => 4]);
		$this->load->view('v_laporan_tahunan_ppid',$x);
		$this->load->view('v_footer');
	}


	function laporan_masyarakat()
	{
		$y['title'] = 'SMK Negeri SPP Palembang | Profil';
		$this->m_portfolio->count_views(9);
		$x['portofolio1']=$this->m_portfolio->get_portfolio_by_kode(8);
		$x['portofolio']=$this->m_portfolio->get_portfolio_by_kode(9);
		$x['visitor'] = $this->m_pengunjung->statistik_pengujung();
		$x['total'] = $this->m_pengunjung->get_all_pengunjung();
		$x['tautan'] = $this->m_tautan->get_all_tautan();
		$x['files'] = $this->m_files->get_all_files_by_kategori(11);
		$x['kataPengantar'] = $this->m_kinerja->get_kataPengantar(11);
		$this->load->view('v_header',$y);
		$this->load->view('v_sidebar',["side" => 4]);
		$this->load->view('v_laporan_masyarakat',$x);
		$this->load->view('v_footer');
	}

	function laporan_keuangan()
	{
		$y['title'] = 'SMK Negeri SPP Palembang | Profil';
		$this->m_portfolio->count_views(9);
		$x['portofolio1']=$this->m_portfolio->get_portfolio_by_kode(8);
		$x['portofolio']=$this->m_portfolio->get_portfolio_by_kode(9);
		$x['visitor'] = $this->m_pengunjung->statistik_pengujung();
		$x['total'] = $this->m_pengunjung->get_all_pengunjung();
		$x['tautan'] = $this->m_tautan->get_all_tautan();
		$x['files'] = $this->m_files->get_all_files_by_kategori(12);
		$x['kataPengantar'] = $this->m_kinerja->get_kataPengantar(4);
		$this->load->view('v_header',$y);
		$this->load->view('v_sidebar',["side" => 4]);
		$this->load->view('v_laporan_keuangan',$x);
		$this->load->view('v_footer');
	}

	function lakin()
	{
		$y['title'] = 'SMK Negeri SPP Palembang | Profil';
		$this->m_portfolio->count_views(9);
		$x['portofolio1']=$this->m_portfolio->get_portfolio_by_kode(8);
		$x['portofolio']=$this->m_portfolio->get_portfolio_by_kode(9);
		$x['visitor'] = $this->m_pengunjung->statistik_pengujung();
		$x['total'] = $this->m_pengunjung->get_all_pengunjung();
		$x['tautan'] = $this->m_tautan->get_all_tautan();
		$x['files'] = $this->m_files->get_all_files_by_kategori(13);
		$x['kataPengantar'] = $this->m_kinerja->get_kataPengantar(5);
		$this->load->view('v_header',$y);
		$this->load->view('v_sidebar',["side" => 4]);
		$this->load->view('v_lakin',$x);
		$this->load->view('v_footer');
	}

	function capaian_kinerja()
	{
		$y['title'] = 'SMK Negeri SPP Palembang | Profil';
		$this->m_portfolio->count_views(9);
		$x['portofolio1']=$this->m_portfolio->get_portfolio_by_kode(8);
		$x['portofolio']=$this->m_portfolio->get_portfolio_by_kode(9);
		$x['visitor'] = $this->m_pengunjung->statistik_pengujung();
		$x['total'] = $this->m_pengunjung->get_all_pengunjung();
		$x['tautan'] = $this->m_tautan->get_all_tautan();
		$x['files'] = $this->m_files->get_all_files_by_kategori(14);
		$x['kataPengantar'] = $this->m_kinerja->get_kataPengantar(6);
		$this->load->view('v_header',$y);
		$this->load->view('v_sidebar',["side" => 4]);
		$this->load->view('v_capaian_kinerja',$x);
		$this->load->view('v_footer');
	}

	function realisasi_anggaran()
	{
		$y['title'] = 'SMK Negeri SPP Palembang | Profil';
		$this->m_portfolio->count_views(9);
		$x['portofolio1']=$this->m_portfolio->get_portfolio_by_kode(8);
		$x['portofolio']=$this->m_portfolio->get_portfolio_by_kode(9);
		$x['visitor'] = $this->m_pengunjung->statistik_pengujung();
		$x['total'] = $this->m_pengunjung->get_all_pengunjung();
		$x['tautan'] = $this->m_tautan->get_all_tautan();
		$x['files'] = $this->m_files->get_all_files_by_kategori(15);
		$x['kataPengantar'] = $this->m_kinerja->get_kataPengantar(7);
		$this->load->view('v_header',$y);
		$this->load->view('v_sidebar',["side" => 4]);
		$this->load->view('v_realisasi_anggaran',$x);
		$this->load->view('v_footer');
	}

	function neraca_keuangan()
	{
		$y['title'] = 'SMK Negeri SPP Palembang | Profil';
		$this->m_portfolio->count_views(9);
		$x['portofolio1']=$this->m_portfolio->get_portfolio_by_kode(8);
		$x['portofolio']=$this->m_portfolio->get_portfolio_by_kode(9);
		$x['visitor'] = $this->m_pengunjung->statistik_pengujung();
		$x['total'] = $this->m_pengunjung->get_all_pengunjung();
		$x['tautan'] = $this->m_tautan->get_all_tautan();
		$x['files'] = $this->m_files->get_all_files_by_kategori(16);
		$x['kataPengantar'] = $this->m_kinerja->get_kataPengantar(8);
		$this->load->view('v_header',$y);
		$this->load->view('v_sidebar',["side" => 4]);
		$this->load->view('v_neraca_keuangan',$x);
		$this->load->view('v_footer');
	}


}
