<?php
	class Home extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('m_tulisan');
		$this->load->model('m_pengunjung');
		$this->load->model('m_portfolio');
		$this->load->model('m_jejak_pendapat');
		$this->load->model('m_tautan');
        $this->m_pengunjung->count_visitor();
	}
	function index(){
		$kode = 8;
		$y['title'] = 'SMK Negeri SPP Sembawa';
		$x['headline']=$this->m_tulisan->get_post_home();
		$x['jadwal'] = $this->m_tulisan->get_kategori_jadwal();
		$x['kampusku'] = $this->m_tulisan->get_kategori_kampusku();
		$x['minggu'] = $this->m_tulisan->get_kategori_kegiatanminggu();
		$x['kerjasama'] = $this->m_tulisan->get_kategori_kerjasama();
		$x['pengumuman'] = $this->m_tulisan->get_kategori_pengumuman();
		$x['agenda'] = $this->m_tulisan->get_kategori_agenda();
		$x['kat']=$this->m_tulisan->get_kategori_for_blog();
		$x['portofolio']=$this->m_portfolio->get_portfolio_by_kode($kode);
		$x['visitor'] = $this->m_pengunjung->statistik_pengujung();
		$x['total'] = $this->m_pengunjung->get_all_pengunjung();
		$x['tautan'] = $this->m_tautan->get_all_tautan();
		$this->load->view('v_header',$y);
		$this->load->view('v_sidebar',["side" => 1]);
		$this->load->view('v_home',$x);
		$this->load->view('v_footer');
	}

	function profil()
	{
		$y['title'] = 'SMK Negeri SPP Palembang | Profil';
		$this->m_portfolio->count_views(9);
		$x['portofolio1']=$this->m_portfolio->get_portfolio_by_kode(8);
		$x['portofolio']=$this->m_portfolio->get_portfolio_by_kode(9);
		$x['visitor'] = $this->m_pengunjung->statistik_pengujung();
		$x['total'] = $this->m_pengunjung->get_all_pengunjung();
		$x['tautan'] = $this->m_tautan->get_all_tautan();
		$this->load->view('v_header',$y);
		$this->load->view('v_sidebar',["side" => 1]);
		$this->load->view('v_profil',$x);
		$this->load->view('v_footer');
	}

	function kataSambutan()
	{
		$y['title'] = 'SMK Negeri SPP Palembang | Kata Sambutan';
		$this->m_portfolio->count_views(8);
		$x['tautan'] = $this->m_tautan->get_all_tautan();
		$x['portofolio']=$this->m_portfolio->get_portfolio_by_kode(8);
		$x['visitor'] = $this->m_pengunjung->statistik_pengujung();
		$x['total'] = $this->m_pengunjung->get_all_pengunjung();
		$this->load->view('v_header',$y);
		$this->load->view('v_sidebar',["side" => 1]);
		$this->load->view('v_katasambutan',$x);
		$this->load->view('v_footer');
	}

	function kirim_pendapat()
	{
		$this->m_jejak_pendapat->kirim_pendapat();
		echo $this->session->set_flashdata('msg','<div class="alert alert-success"><p><strong> NB: </strong> Terima Kasih telah memberikan pendapat.</p></div>');
		redirect('Home');
	}

	function lihat_hasil(){
		$x['visitor1'] = $this->m_jejak_pendapat->get_pendapat_perhari();
		$x['portofolio']=$this->m_portfolio->get_portfolio_by_kode(8);
		$x['visitor'] = $this->m_pengunjung->statistik_pengujung();
		$x['total'] = $this->m_pengunjung->get_all_pengunjung();
		$y['title'] = 'SMK Negeri PP Sembawa | Lihat Hasil ';
		$this->load->view('v_header',$y);
		$this->load->view('v_sidebar',["side" => 1]);
		$this->load->view('v_lihat_hasil',$x);
	}
}
