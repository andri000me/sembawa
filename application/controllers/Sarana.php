<?php
	/**
	* 
	*/
	class Sarana extends CI_Controller
	{
		
		function __construct()
		{
			parent::__construct();
			$this->load->model('m_files');
			$this->load->model('m_pengunjung');
			$this->load->model('m_portfolio');
			$this->load->model('m_tulisan');
			$this->load->model('m_galeri');
			$this->load->model('m_album');
			$this->load->model('m_tautan');
			$this->m_pengunjung->count_visitor();
		}

			function index()
			{
				$jum = $this->m_galeri->get_galeri_by_album_id(5);
				$page=$this->uri->segment(3);
		        if(!$page):
		            $offset = 0;
		        else:
		            $offset = $page;
		        endif;
		        $limit=6;
		        $config['base_url'] = base_url() . 'Sarana/index';
		        $config['total_rows'] = $jum->num_rows();
		        $config['per_page'] = $limit;
		        $config['uri_segment'] = 3;
		        $config['full_tag_open'] = "<ul class='pagination'>";
			    $config['full_tag_close'] = '</ul>';
			    $config['num_tag_open'] = '<li>';
			    $config['num_tag_close'] = '</li>';
			    $config['cur_tag_open'] = '<li class="active"><a href="#">';
			    $config['cur_tag_close'] = '</a></li>';
			    $config['prev_tag_open'] = '<li>';
			    $config['prev_tag_close'] = '</li>';
			    $config['first_tag_open'] = '<li>';
			    $config['first_tag_close'] = '</li>';
			    $config['last_tag_open'] = '<li>';
			    $config['last_tag_close'] = '</li>';
			    
			    $config['prev_link'] = 'Previous Page';
			    $config['prev_tag_open'] = '<li>';
			    $config['prev_tag_close'] = '</li>';

			    $config['next_link'] = 'Next Page';
			    $config['next_tag_open'] = '<li>';
			    $config['next_tag_close'] = '</li>';
		        $this->pagination->initialize($config);
		        $x['page'] =$this->pagination->create_links();
				$x['data']=$this->m_galeri->gallery_perpage_by_id($offset,$limit,5);
				$x['alb']=$this->m_album->get_all_album();
				$x['tautan'] = $this->m_tautan->get_all_tautan();
		        $y['title'] = 'Sapras_sekolah';
				$this->load->view('v_header',$y);
				$this->load->view('v_sidebar',["side" => 8]);
				$this->load->view('v_sapras_sekolah.php',$x);
				$this->load->view('v_footer');
			}
			
			function tuk()
			{
				$y['title'] = 'TUK';
				$x['portofolio']=$this->m_portfolio->get_portfolio_by_kode(8);
				$x['visitor'] = $this->m_pengunjung->statistik_pengujung();
				$x['total'] = $this->m_pengunjung->get_all_pengunjung();
				$x['tautan'] = $this->m_tautan->get_all_tautan();
				$this->load->view('v_header',$y);
				$this->load->view('v_sidebar',["side" => 8]);
				$this->load->view('v_tuk.php',$x);
				$this->load->view('v_footer');
			}
			
			function gedung()
			{
				$y['title'] = 'Gedung';
				$x['portofolio']=$this->m_portfolio->get_portfolio_by_kode(8);
				$x['visitor'] = $this->m_pengunjung->statistik_pengujung();
				$x['total'] = $this->m_pengunjung->get_all_pengunjung();
				$x['tautan'] = $this->m_tautan->get_all_tautan();
				$this->load->view('v_header',$y);
				$this->load->view('v_sidebar',["side" => 8]);
				$this->load->view('v_gedung.php',$x);
				$this->load->view('v_footer');
			}

			function laboratorium()
			{
				$y['title'] = 'Laboratorium';
				$x['portofolio']=$this->m_portfolio->get_portfolio_by_kode(8);
				$x['visitor'] = $this->m_pengunjung->statistik_pengujung();
				$x['total'] = $this->m_pengunjung->get_all_pengunjung();
				$x['tautan'] = $this->m_tautan->get_all_tautan();
				$this->load->view('v_header',$y);
				$this->load->view('v_sidebar',["side" => 8]);
				$this->load->view('v_laboratorium.php',$x);
				$this->load->view('v_footer');
			}

			function lahan_praktikum()
			{
				$y['title'] = 'Lahan Praktikum';
				$x['portofolio']=$this->m_portfolio->get_portfolio_by_kode(8);
				$x['visitor'] = $this->m_pengunjung->statistik_pengujung();
				$x['total'] = $this->m_pengunjung->get_all_pengunjung();
				$x['tautan'] = $this->m_tautan->get_all_tautan();
				$this->load->view('v_header',$y);
				$this->load->view('v_sidebar',["side" => 8]);
				$this->load->view('v_lahan_praktikum.php',$x);
				$this->load->view('v_footer');
			}

		// function kategori(){
		// 	$kategori_id=$this->uri->segment(3);
		// 	$jum=$this->m_tulisan->get_tulisan_by_kategori($kategori_id);
	 //        $page=$this->uri->segment(4);
	 //        if(!$page):
	 //            $offset = 0;
	 //        else:
	 //            $offset = $page;
	 //        endif;
	 //        $limit=3;
	 //        $config['base_url'] = base_url() . 'Sarana/kategori/'.$kategori_id.'/';
	 //        $config['total_rows'] = $jum->num_rows();
	 //        $config['per_page'] = $limit;
	 //        $config['uri_segment'] = 4;
		// 	$config['full_tag_open'] = "<ul class='pagination'>";
		// 	$config['full_tag_close'] = '</ul>';
		// 	$config['num_tag_open'] = '<li>';
		// 	$config['num_tag_close'] = '</li>';
		// 	$config['cur_tag_open'] = '<li class="active"><a href="#">';
		// 	$config['cur_tag_close'] = '</a></li>';
		// 	$config['prev_tag_open'] = '<li>';
		// 	$config['prev_tag_close'] = '</li>';
		// 	$config['first_tag_open'] = '<li>';
		// 	$config['first_tag_close'] = '</li>';
		// 	$config['last_tag_open'] = '<li>';
		// 	$config['last_tag_close'] = '</li>';
			    
		// 	$config['prev_link'] = 'Previous Page';
		// 	$config['prev_tag_open'] = '<li>';
		// 	$config['prev_tag_close'] = '</li>';

		// 	$config['next_link'] = 'Next Page';
		// 	$config['next_tag_open'] = '<li>';
		// 	$config['next_tag_close'] = '</li>';
		// 	$y['title'] = 'Artikel';
	 //        $this->pagination->initialize($config);
	 //        $x['populer']=$this->m_tulisan->get_tulisan_populer();
		// 	$x['terbaru']=$this->m_tulisan->get_tulisan_terbaru();
		// 	$x['kat']=$this->m_tulisan->get_kategori_for_blog();
	 //        $x['page'] =$this->pagination->create_links();
		// 	$x['data']=$this->m_tulisan->get_tulisan_by_kategori_perpage($kategori_id,$offset,$limit);
		// 	$this->load->view('v_header',$y);
		// 	$this->load->view('v_artikel1',$x);
		// 	$this->load->view('v_footer');
		// }

		// function detail($slug)
	 // 	{
	 // 		$y['title'] = 'Artikel';
		// 	$data=$this->m_tulisan->get_berita_by_slug($slug);
		// 	$q=$data->row_array();
		// 	$kode=$q['tulisan_id'];
		// 	$this->m_tulisan->count_views($kode);
		// 	$x['rate']=$this->m_tulisan->cek_ip_rate($kode);
		// 	$x['data']=$this->m_tulisan->get_berita_by_slug($slug);
		// 	$x['populer']=$this->m_tulisan->get_tulisan_populer();
		// 	$x['terbaru']=$this->m_tulisan->get_tulisan_terbaru();
		// 	$x['kat']=$this->m_tulisan->get_kategori_for_blog();
		// 	$this->load->view('v_artikel_detail1',$x);
		// }				
	}
?>