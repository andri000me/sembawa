<?php
	/**
	* 
	*/
	class Informasi extends CI_Controller
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
			$this->load->model('m_tautan');
        	$this->m_pengunjung->count_visitor();		
    }

	function informasi_publik_berkala()
	{
		$y['title'] = 'Informasi Publik Berkala';
		$key = 1;
		$x['kontak'] =$this->m_files->get_file_by_name(4);
		$x['data']=$this->m_files->get_file_by_name($key);
		$x['tautan'] = $this->m_tautan->get_all_tautan();
		$this->load->view('v_header',$y);
		$this->load->view('v_sidebar',["side" => 10]);
		$this->load->view('v_i_p_berkala',$x);
		$this->load->view('v_footer');
	}

	function informasi_publik_setiap_saat()
	{
		$y['title'] = 'Informasi Publik Setiap Saat';
		$key = 2;
		$x['data']=$this->m_files->get_file_by_name($key);
		$x['tautan'] = $this->m_tautan->get_all_tautan();
		$this->load->view('v_header',$y);
		$this->load->view('v_sidebar',["side" => 10]);
		$this->load->view('v_i_p_setiap_saat',$x);
		$this->load->view('v_footer');
	}

	function serta_merta()
	{
		
		$y['title'] = 'Serta Merta';
		$kode = 8;
		$x['portofolio']=$this->m_portfolio->get_portfolio_by_kode($kode);
		$x['visitor'] = $this->m_pengunjung->statistik_pengujung();
		$x['total'] = $this->m_pengunjung->get_all_pengunjung();
		$x['tautan'] = $this->m_tautan->get_all_tautan();
		$this->load->view('v_header',$y);
		$this->load->view('v_sidebar',["side" => 10]);
		$this->load->view('v_serta_merta',$x);
		$this->load->view('v_footer');
	}
	
	function setiap_saat()
	{
		$y['title'] = 'Setiap Saat';
		$kode = 8;
		$x['portofolio']=$this->m_portfolio->get_portfolio_by_kode($kode);
		$x['visitor'] = $this->m_pengunjung->statistik_pengujung();
		$x['total'] = $this->m_pengunjung->get_all_pengunjung();
		$x['tautan'] = $this->m_tautan->get_all_tautan();
		$this->load->view('v_header',$y);
		$this->load->view('v_sidebar',["side" => 10]);
		$this->load->view('v_setiap_saat',$x);
		$this->load->view('v_footer');
	}

	function form_permintaan()
	{
		$kode=8;
		$y['title'] = 'Form Permintaan Informasi Publik';
		$x['portofolio']=$this->m_portfolio->get_portfolio_by_kode($kode);
		$x['visitor'] = $this->m_pengunjung->statistik_pengujung();
		$x['total'] = $this->m_pengunjung->get_all_pengunjung();
		$x['tautan'] = $this->m_tautan->get_all_tautan();
		$this->load->view('v_header',$y);
		$this->load->view('v_sidebar',["side" => 10]);
		$this->load->view('v_form_permintaan',$x);
		$this->load->view('v_footer');
	}

	function kirim_form_permintaan(){
            $nama=str_replace("'", "", $this->input->post('xnama',TRUE));
            $ktp=str_replace("'", "", $this->input->post('xnoktp',TRUE));
            $alamat=str_replace("'", "", $this->input->post('xalamat',TRUE));
            $email=str_replace("'", "", $this->input->post('xemail',TRUE));
            $kontak=str_replace("'", "", $this->input->post('xkontak',TRUE));
            $pertanyaan=str_replace("'", "", $this->input->post('xpertanyaan',TRUE));
            $tujuan=str_replace("'", "", $this->input->post('xtujuan',TRUE));
            $memperoleh=$this->input->post('xmemperoleh');
            $mendapat=$this->input->post('xmendapat');
            $mendapatkan=$this->input->post('xmendapatkan');
                $this->m_kontak->kirim_form($nama,$ktp,$alamat,$email,$kontak,$pertanyaan,$tujuan,$memperoleh,$mendapat,$mendapatkan);
                echo $this->session->set_flashdata('msg','<div class="alert alert-success"><p><strong> NB: </strong> Terima Kasih telah memberikan permintaan informasi publik.</p></div>');
                redirect('Informasi/form_permintaan');
        }

	function sitemap()
	{
		$y['title'] = 'Sitemap';
		$kode = 8;
		$x['portofolio']=$this->m_portfolio->get_portfolio_by_kode($kode);
		$x['visitor'] = $this->m_pengunjung->statistik_pengujung();
		$x['total'] = $this->m_pengunjung->get_all_pengunjung();
		$x['tautan'] = $this->m_tautan->get_all_tautan();
		$this->load->view('v_header',$y);
		$this->load->view('v_sidebar',["side" => 12]);
		$this->load->view('v_sitemap',$x);
		$this->load->view('v_footer');
	}

	function hubungi_kami(){
		$data['tautan'] = $this->m_tautan->get_all_tautan();
		$this->load->library('googlemaps');
        $config=array();
        $config['center']="-2.925341, 104.546655";
        $config['zoom']=17;
        $config['map_height']="400px";
      	$this->googlemaps->initialize($config);
        $marker=array();
        $marker['position']="-2.925341, 104.546655";
        $this->googlemaps->add_marker($marker);
        $data['map']=$this->googlemaps->create_map();
        $kode = 8;
		$data['portofolio']=$this->m_portfolio->get_portfolio_by_kode($kode);
		$y['title'] = 'Hubungi Kami';
		
		$this->load->view('v_hubungi_kami',$data);
		$this->load->view('v_footer');
	}

 	function search()
		{
			$keyword=str_replace("'", "", $this->input->post('xfilter',TRUE));
			$jum=$this->m_tulisan->search_tulisan1($keyword);
	        $page=$this->uri->segment(3);
	        if(!$page):
	            $offset = 0;
	        else:
	            $offset = $page;
	        endif;
	        $limit=6;
	        $config['base_url'] = base_url() . 'Informasi/search';
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
		    $y['title'] = 'Artikel';
	        $this->pagination->initialize($config);
			$x['page'] =$this->pagination->create_links();
			$x['filter'] = $this->input->post('xfilter');
			$x['title'] = 'Artikel';
			$x['data']=$this->m_tulisan->search_tulisan($keyword,$offset,$limit);
			$x['populer']=$this->m_tulisan->get_tulisan_populer();
			$x['terbaru']=$this->m_tulisan->get_tulisan_terbaru();
			$x['kat']=$this->m_tulisan->get_kategori_for_blog();
			$x['tautan'] = $this->m_tautan->get_all_tautan();
			$this->load->view('v_header',$x);
			$this->load->view('v_artikel',$x);
			$this->load->view('v_footer');


		}

		function kirim_pesan(){
                $nama=str_replace("'", "", $this->input->post('xnama',TRUE));
                $email=str_replace("'", "", $this->input->post('xemail',TRUE));
                $kontak=str_replace("'", "", $this->input->post('xkontak',TRUE));
                $pesan=str_replace("'", "", $this->input->post('xpesan',TRUE));
                $this->m_kontak->kirim_pesan($nama,$email,$kontak,$pesan);
                echo $this->session->set_flashdata('msg','<div class="alert alert-success"><p><strong> NB: </strong> Terima Kasih Telah Menghubungi Kami.</p></div>');
                redirect('Informasi/hubungi_kami');
        }

        function infografis(){
        	$jum = $this->m_galeri->get_galeri_by_album_id(9);
			$page=$this->uri->segment(3);
	        if(!$page):
	            $offset = 0;
	        else:
	            $offset = $page;
	        endif;
	        $limit=6;
	        $config['base_url'] = base_url() . 'Informasi/infografis';
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
			$x['data']=$this->m_galeri->gallery_perpage_by_id($offset,$limit,9);
			$x['alb']=$this->m_album->get_all_album();
			$x['tautan'] = $this->m_tautan->get_all_tautan();
	        $y['title'] = 'Infografis';
			$this->load->view('v_header',$y);
			$this->load->view('v_sidebar',["side" => 9]);
			$this->load->view('v_infografis',$x);
			$this->load->view('v_footer');
        }
}
?>