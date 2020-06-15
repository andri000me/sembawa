<?php 
	/**
	* 
	*/
	class Artikel extends CI_Controller
	{
		
		function __construct()
		{
			parent::__construct();
			$this->load->model('m_tulisan');
			$this->load->model('m_pengunjung');
			$this->load->model('m_tautan');
        	$this->m_pengunjung->count_visitor();
		}

		function index()
		{
			$jum=$this->m_tulisan->berita();
	        $page=$this->uri->segment(3);
	        $x['tautan'] = $this->m_tautan->get_all_tautan();
	        if(!$page):
	            $offset = 0;
	        else:
	            $offset = $page;
	        endif;
	        $limit=4;
	        $config['base_url'] = base_url() . 'artikel/index';
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
		    
		    $y['title'] = 'Artikel';
	       
	        $x['page'] =$this->pagination->create_links();
	       	$x['populer']=$this->m_tulisan->get_tulisan_populer();
			$x['terbaru']=$this->m_tulisan->get_tulisan_terbaru();
			$x['data']=$this->m_tulisan->berita_perpage($offset,$limit);
			$x['kat']=$this->m_tulisan->get_kategori_for_blog();
			$this->load->view('v_header',$y);
			$this->load->view('v_artikel',$x);
			$this->load->view('v_footer');
	 	}

	 	function detail($slug)
	 	{
	 		$y['title'] = 'Artikel';
			$data=$this->m_tulisan->get_berita_by_slug($slug);
			$q=$data->row_array();
			$kode=$q['tulisan_id'];
			$this->m_tulisan->count_views($kode);
			$x['rate']=$this->m_tulisan->cek_ip_rate($kode);
			$x['data']=$this->m_tulisan->get_berita_by_slug($slug);
			$x['populer']=$this->m_tulisan->get_tulisan_populer();
			$x['terbaru']=$this->m_tulisan->get_tulisan_terbaru();
			$x['kat']=$this->m_tulisan->get_kategori_for_blog();
			$x['tautan'] = $this->m_tautan->get_all_tautan();
			$this->load->view('v_header',$y);
			//$this->load->view('v_sidebar',["side" => 1]);
			$this->load->view('v_artikel_detail',$x);
			$this->load->view('v_footer');
		}

		function kategori(){
			$kategori_id=$this->uri->segment(3);
			$jum=$this->m_tulisan->get_tulisan_by_kategori($kategori_id);
	        $page=$this->uri->segment(4);
	        if(!$page):
	            $offset = 0;
	        else:
	            $offset = $page;
	        endif;
	        $limit=3;
	        $config['base_url'] = base_url() . 'artikel/kategori/'.$kategori_id.'/';
	        $config['total_rows'] = $jum->num_rows();
	        $config['per_page'] = $limit;
	        $config['uri_segment'] = 4;
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
	        $x['populer']=$this->m_tulisan->get_tulisan_populer();
			$x['terbaru']=$this->m_tulisan->get_tulisan_terbaru();
			$x['kat']=$this->m_tulisan->get_kategori_for_blog();
	        $x['page'] =$this->pagination->create_links();
			$x['data']=$this->m_tulisan->get_tulisan_by_kategori_perpage($kategori_id,$offset,$limit);
			$x['tautan'] = $this->m_tautan->get_all_tautan();
			$this->load->view('v_header',$y);
			$this->load->view('v_artikel',$x);
			$this->load->view('v_footer');
	}

	function good($slug){
		$data=$this->m_tulisan->get_berita_by_slug($slug);
		if($data->num_rows() > 0){

			$q=$data->row_array();
			$kode=$q['tulisan_id'];
			$this->m_tulisan->count_good($kode);
			echo "<script>location='https://www.smkppnsembawa.sch.id/Artikel/".$slug."'</script>";
		}else{
			echo "<script>location='https://www.smkppnsembawa.sch.id/Artikel/".$slug."'</script>";
		}
	}

	function like($slug){
		$data=$this->m_tulisan->get_berita_by_slug($slug);
		if($data->num_rows() > 0){
			$q=$data->row_array();
			$kode=$q['tulisan_id'];
			$this->m_tulisan->count_like($kode);
			echo "<script>location='https://www.smkppnsembawa.sch.id/Artikel/".$slug."'</script>";
		}
		else{
			echo "<script>location='https://www.smkppnsembawa.sch.id/Artikel/".$slug."'</script>";
		}
	}

	function love($slug){
		$data=$this->m_tulisan->get_berita_by_slug($slug);
		if($data->num_rows() > 0){
			$q=$data->row_array();
			$kode=$q['tulisan_id'];
			$this->m_tulisan->count_love($kode);
			echo "<script>location='https://www.smkppnsembawa.sch.id/Artikel/".$slug."'</script>";
		}else{
			echo "<script>location='https://www.smkppnsembawa.sch.id/Artikel/".$slug."'</script>";
		}
	}

	function genius($slug){
		$data=$this->m_tulisan->get_berita_by_slug($slug);
		if($data->num_rows() > 0){
			$q=$data->row_array();
			$kode=$q['tulisan_id'];
			$this->m_tulisan->count_genius($kode);
			echo "<script>location='https://www.smkppnsembawa.sch.id/Artikel/".$slug."'</script>";
		}else{
			echo "<script>location='https://www.smkppnsembawa.sch.id/Artikel/".$slug."'</script>";
		}
	}

	// function search()
	// {
	// 	// $keyword=str_replace("'", "", $this->input->post('xfilter',TRUE));
	// 	// $x['data']=$this->m_tulisan->search_tulisan($keyword);
	// 	// $this->load->view('v_header');
	// 	// $this->load->view('v_artikel',$x);
	// 	// $this->load->view('v_footer');
	// }
}
?>