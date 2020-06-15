<?php
	class Profil extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('m_tulisan');
		$this->load->model('m_pengunjung');
		$this->load->model('m_portfolio');
		$this->load->model('m_jejak_pendapat');
		$this->load->model('m_tautan');
		$this->load->model('m_pengguna');
		$this->load->library('upload');
        $this->m_pengunjung->count_visitor();
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
		$this->load->view('admin/v_header',$y);
		$this->load->view('admin/v_sidebar',["side" => 12]);
		$this->load->view('admin/v_list_profil',$x);
	}
	
	
    function header()
	{
		$y['title'] = 'Admin | Header';
		$x['latest_header']=$this->m_portfolio->get_latest_header();
		$x['history_header']=$this->m_portfolio->get_history_header();
		$this->load->view('admin/v_header',$y);
		$this->load->view('admin/v_sidebar',["side" => 12]);
		$this->load->view('admin/v_list_header',$x);
	}
    function update_header()
	{
		$config['upload_path'] = './assets/images/header/'; //path folder
		$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';
		$config['max_size']             = 0; //type yang dapat diakses bisa anda sesuaikan
		// 	 //nama yang terupload nantinya

		$this->upload->initialize($config);
		if(!empty($_FILES['filefoto']['name']))
		{
			if (($_FILES["filefoto"]["size"] < 150000)) {
				echo $this->session->set_flashdata('msg','warning');
				redirect('Admin/Profil/header'); 
			}
			else if ($this->upload->do_upload('filefoto'))
			{
					$gbr = $this->upload->data();
					//Compress Image
					
					$config['image_library']='gd2';
					$config['source_image']='./assets/images/header/'.$gbr['file_name'];
					$config['create_thumb']= FALSE;
					$config['maintain_ratio']= FALSE;
					$config['quality']= '100%';
					$config['width']= 850;
					$config['height']= 600;
					$config['new_image']= './assets/images/header/'.$gbr['file_name'];
					$this->load->library('image_lib', $config);
					$this->image_lib->resize();

					$gambar=$gbr['file_name'];
					$kode=$this->session->userdata('idadmin');
					$user=$this->m_pengguna->get_pengguna_login($kode);
					$p=$user->row_array();
					$user_id=$p['pengguna_id'];
					$user_nama=$p['pengguna_nama'];
					$this->m_portfolio->update_header($gambar,$user_nama,$user_id);
					echo $this->session->set_flashdata('msg','success');
					redirect('Admin/Profil/header');
			}else{
				echo $this->session->set_flashdata('msg','warning');
				redirect('Admin/Profil/header');
			}
			 
		}else{
			redirect('Admin/Profil/header');
		}
		
}
	
    }
