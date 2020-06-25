<?php
	class Profil extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('m_tulisan');
		$this->load->model('m_pengunjung');
		$this->load->model('m_portfolio');
		$this->load->model('m_jejak_pendapat');
		$this->load->model('m_tautan');
        $this->m_pengunjung->count_visitor();
	}


	function sejarah()
	{
		$y['title'] = 'SMK Negeri SPP Palembang | Profil';
		$this->m_portfolio->count_views(10);
		$x['portofolio1']=$this->m_portfolio->get_portfolio_by_kode(8);
		$x['portofolio']=$this->m_portfolio->get_portfolio_by_ket('sejarah');
		$a=$this->m_portfolio->get_portfolio_by_ket('sejarah')->row_array();
		$x['title'] = $a['port_judul'];
		$x['visitor'] = $this->m_pengunjung->statistik_pengujung();
		$x['total'] = $this->m_pengunjung->get_all_pengunjung();
		$x['tautan'] = $this->m_tautan->get_all_tautan();
		$this->load->view('v_header',$y);
		$this->load->view('v_sidebar',["side" => 2]);
		$this->load->view('v_sejarah',$x);
		$this->load->view('v_footer');
	}

	

	function visi()
	{
		$y['title'] = 'SMK Negeri SPP Palembang | Profil';
		$this->m_portfolio->count_views(11);
		$x['portofolio1']=$this->m_portfolio->get_portfolio_by_kode(8);
		$x['portofolio']=$this->m_portfolio->get_portfolio_by_ket('visi');
		$a=$this->m_portfolio->get_portfolio_by_ket('visi')->row_array();
		$x['title'] = $a['port_judul'];
		$x['visitor'] = $this->m_pengunjung->statistik_pengujung();
		$x['total'] = $this->m_pengunjung->get_all_pengunjung();
		$x['tautan'] = $this->m_tautan->get_all_tautan();
		$this->load->view('v_header',$y);
		$this->load->view('v_sidebar',["side" => 2]);
		$this->load->view('v_visi',$x);
		$this->load->view('v_footer');
	}

	function tugas()
	{
		$y['title'] = 'SMK Negeri SPP Palembang | Profil';
		$this->m_portfolio->count_views(9);
		$x['portofolio1']=$this->m_portfolio->get_portfolio_by_kode(8);
		$x['portofolio']=$this->m_portfolio->get_portfolio_by_ket('tugas');
		$a=$this->m_portfolio->get_portfolio_by_ket('tugas')->row_array();
		$x['title'] = $a['port_judul'];
		$x['visitor'] = $this->m_pengunjung->statistik_pengujung();
		$x['total'] = $this->m_pengunjung->get_all_pengunjung();
		$x['tautan'] = $this->m_tautan->get_all_tautan();
		$this->load->view('v_header',$y);
		$this->load->view('v_sidebar',["side" => 2]);
		$this->load->view('v_tugas',$x);
		$this->load->view('v_footer');
	}

	function struktur_organisasi()
	{
		$y['title'] = 'SMK Negeri SPP Palembang | Profil';
		$this->m_portfolio->count_views(13);
		$x['portofolio1']=$this->m_portfolio->get_portfolio_by_kode(8);
		$x['portofolio']=$this->m_portfolio->get_portfolio_by_ket('struktur_organisasi');
		$a=$this->m_portfolio->get_portfolio_by_ket('struktur_organisasi')->row_array();
		$x['title'] = $a['port_judul'];
		$x['visitor'] = $this->m_pengunjung->statistik_pengujung();
		$x['total'] = $this->m_pengunjung->get_all_pengunjung();
		$x['tautan'] = $this->m_tautan->get_all_tautan();
		$this->load->view('v_header',$y);
		$this->load->view('v_sidebar',["side" => 2]);
		$this->load->view('v_struktur_organisasi',$x);
		$this->load->view('v_footer');
	}

	function sambutan()
	{
		$y['title'] = 'SMK Negeri SPP Palembang | Profil';
		$this->m_portfolio->count_views(8);
		$x['portofolio1']=$this->m_portfolio->get_portfolio_by_kode(8);
		$x['portofolio']=$this->m_portfolio->get_portfolio_by_ket('kepala_sekolah');
		$a=$this->m_portfolio->get_portfolio_by_ket('kepala_sekolah')->row_array();
		$x['title'] = $a['port_judul'];
		$x['visitor'] = $this->m_pengunjung->statistik_pengujung();
		$x['total'] = $this->m_pengunjung->get_all_pengunjung();
		$x['tautan'] = $this->m_tautan->get_all_tautan();
		$this->load->view('v_header',$y);
		$this->load->view('v_sidebar',["side" => 2]);
		$this->load->view('v_katasambutan',$x);
		$this->load->view('v_footer');
	}

	function layanan()
	{
		$y['title'] = 'SMK Negeri SPP Palembang | Jenis Layanan';
		$this->m_portfolio->count_views(9);
		$x['portofolio1']=$this->m_portfolio->get_portfolio_by_kode(8);
		$x['portofolio']=$this->m_portfolio->get_portfolio_by_kode(9);
		$x['data']=$this->m_portfolio->get_jenis_layanan();
		$x['visitor'] = $this->m_pengunjung->statistik_pengujung();
		$x['total'] = $this->m_pengunjung->get_all_pengunjung();
		$x['tautan'] = $this->m_tautan->get_all_tautan();
		$this->load->view('v_header',$y);
		$this->load->view('v_sidebar',["side" => 2]);
		$this->load->view('v_layanan',$x);
		$this->load->view('v_footer');
	}

	function kirim_pendapat()
	{
		$this->m_jejak_pendapat->kirim_pendapat();
		echo $this->session->set_flashdata('msg','<div class="alert alert-success"><p><strong> NB: </strong> Terima Kasih telah memberikan pendapat.</p></div>');
		redirect('Home');
	}

	function daftar_nama(){
	
		$y['title'] = 'SMK Negeri SPP Palembang | Pejabat';
		$this->m_portfolio->count_views(9);
		$x['data'] = $this->m_portfolio->get_pejabat();
		
		$x['title'] = "Data Pejabat";
		$x['portofolio1']=$this->m_portfolio->get_portfolio_by_kode(8);
		$x['portofolio']=$this->m_portfolio->get_portfolio_by_kode(9);
		$x['title'] = "Daftar Nama / Alamat Pejabat";
		$x['visitor'] = $this->m_pengunjung->statistik_pengujung();
		$x['total'] = $this->m_pengunjung->get_all_pengunjung();
		$x['tautan'] = $this->m_tautan->get_all_tautan();
		$this->load->view('v_header',$y);
		$this->load->view('v_sidebar',["side" => 2]);
		$this->load->view('v_daftar_nama',$x);
		$this->load->view('v_footer');
	}



}
