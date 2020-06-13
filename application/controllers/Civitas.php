<?php

	class Civitas extends CI_Controller
	{	
		function __construct()
		{
			parent::__construct();
			$this->load->model('m_tulisan');
			$this->load->model('m_pengunjung');
			$this->load->model('m_portfolio');
			$this->load->model('m_siswa');
			$this->load->model('m_guru');
			$this->load->model('m_files');
			$this->load->model('m_alumni');
			$this->load->model('m_tautan');
        	$this->m_pengunjung->count_visitor();
		}

		function index()
		{
			$y['title'] = 'Peserta Didik';
			$x['tautan'] = $this->m_tautan->get_all_tautan();
			$x['data'] = $this->m_siswa->get_all_siswa();
			$this->load->view('v_header',$y);
			$this->load->view('v_sidebar',["side" => 2]);
			$this->load->view('v_murid',$x);
			$this->load->view('v_footer');

		}

		function guru()
		{
			$y['title'] = 'Guru dan Tenaga Kerja';
			$x['data'] = $this->m_guru->get_all_guru();
			$x['tautan'] = $this->m_tautan->get_all_tautan();
			$this->load->view('v_header',$y);
			$this->load->view('v_sidebar',["side" => 2]);
			$this->load->view('v_guru',$x);
			$this->load->view('v_footer');
		}

		function alumni()
		{

			$y['title'] = 'Alumni';
			$x['data']=$this->m_alumni->get_all_alumni();
			$x['tautan'] = $this->m_tautan->get_all_tautan();
			$this->load->view('v_header',$y);
			$this->load->view('v_sidebar',["side" => 2]);
			$this->load->view('v_alumni',$x);
			$this->load->view('v_footer');
		}

		function form_alumni()
		{

			$y['title'] = 'Form Alumni';
			$kode = 8;
			$x['tautan'] = $this->m_tautan->get_all_tautan();
			$x['portofolio']=$this->m_portfolio->get_portfolio_by_kode($kode);
			$x['visitor'] = $this->m_pengunjung->statistik_pengujung();
			$x['total'] = $this->m_pengunjung->get_all_pengunjung();
			$x['tautan'] = $this->m_tautan->get_all_tautan();
			$this->load->view('v_header',$y);
			$this->load->view('v_sidebar',["side" => 2]);
			$this->load->view('v_forms_alumni',$x);
			$this->load->view('v_footer');
		}

		function add_alumni(){

			
			$nama = $this->input->post('nama');
			$jenis_kelamin = $this->input->post('kelamin');
			$tempat_lahir = $this->input->post('tempat_lahir');
			$tanggal_lahir = $this->input->post('tanggal_lahir');
			$tahun_lulus = $this->input->post('tahun_lulus');
			$jurusan = $this->input->post('jurusan');
			$pendidikan_terakhir = $this->input->post('pendidikan');
			$check = $this->input->post('pekerjaan');
			$jabatan = $this->input->post('jabatan');
			$rumah = $this->input->post('rumah');
			$kantor = $this->input->post('kantor');
			$no_hp = $this->input->post('no_hp');
			$email = $this->input->post('email');
			$kesan = $this->input->post('kesan');

			$id_pekerjaan = $nama.$tanggal_lahir;
			$filter = str_replace(" ", "-",$id_pekerjaan);
			$filter1 = str_replace(",", "-",$filter);
			$filter2 = str_replace(".", "-", $filter1);
			$id_pekerjaan = strtolower($filter2);
			
			
			$wirausahawan = $this->input->post('wirausahawan');
			$swasta = $this->input->post('swasta');
			$pemerintah = $this->input->post('pemerintah');
			$mahasiswa = $this->input->post('mahasiswa');
			$belum_bekerja = $this->input->post("belum_bekerja");

			
			
			if($wirausahawan!=""){$wirausahawan = $wirausahawan."." ;}
			if($swasta!=""){$swasta = $swasta."." ;}
			if($pemerintah!=""){$pemerintah = $pemerintah.".";}	
			if($mahasiswa!=""){$mahasiswa = $mahasiswa.".";}	
			

			$pekerjaan1 = $wirausahawan.$swasta.$pemerintah.$mahasiswa.$belum_bekerja;	

			$this->m_alumni->simpan_alumni($nama,$jenis_kelamin,$tempat_lahir,$tanggal_lahir,$tahun_lulus,$jurusan,$pendidikan_terakhir,
											$id_pekerjaan,$jabatan,$rumah,$kantor,$no_hp,$email,$kesan);
			
		
			$this->m_alumni->simpan_pekerjaan($id_pekerjaan,$pekerjaan1);
		
			redirect('Civitas/alumni');
		}	

			function print_berita(){
				$x['title']='Cetak Artikel';
				$slug = $this->uri->segment(3);
				$x['data'] = $this->m_tulisan->get_berita_by_slug($slug);
				$this->load->view('v_cetak',$x);
			}

	}
?>
