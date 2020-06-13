<?php
	/**

	*/
	class Gallery extends Ci_Controller
	{
		
		function __construct(){
			parent::__construct();
			$this->load->model('m_galeri');
			$this->load->model('m_album');
			$this->load->model('m_pengunjung');
			$this->load->model('m_tulisan');
			$this->load->model('m_tautan');
	        $this->m_pengunjung->count_visitor();
		}
		
		function index(){

			$jum = $this->m_galeri->get_galeri_by_album_id(4);
			$x['tautan'] = $this->m_tautan->get_all_tautan();
			$page=$this->uri->segment(3);
	        if(!$page):
	            $offset = 0;
	        else:
	            $offset = $page;
	        endif;
	        $limit=9;
	        $config['base_url'] = base_url() . 'Gallery/index';
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
			$x['data']=$this->m_galeri->gallery_perpage_by_id($offset,$limit,4);
			$x['alb']=$this->m_album->get_all_album();
	        $y['title'] = 'Gallery Photo';
			$this->load->view('v_header',$y);
			$this->load->view('v_sidebar',["side" => 7]);
			$this->load->view('v_photo',$x);
			$this->load->view('v_footer');		
		}

		function video(){
			$jum = $this->m_galeri->get_all_video();
			$x['tautan'] = $this->m_tautan->get_all_tautan();
			$page=$this->uri->segment(3);
	        if(!$page):
	            $offset = 0;
	        else:
	            $offset = $page;
	        endif;
	        $limit=9;
	        $config['base_url'] = base_url() . 'Gallery/video';
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
			$y['title'] = 'Gallery Video';
			$x['data']=$this->m_galeri->video_perpage($offset,$limit);
			$this->load->view('v_header',$y);
			$this->load->view('v_sidebar',["side" => 7]);
			$this->load->view('v_video',$x);
			$this->load->view('v_footer');
		}

		function sapras()
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
				$this->load->view('v_sidebar',["side" => 5]);
				$this->load->view('v_sapras_sekolah.php',$x);
				$this->load->view('v_footer');
			}
	}
?>