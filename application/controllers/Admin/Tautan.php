<?php
class Tautan extends CI_Controller{
	function __construct(){
		parent::__construct();
		if($this->session->userdata('masuk') !=TRUE){
            $url=base_url('Administrator');
            redirect($url);
        };
		$this->load->model('m_kategori');
		$this->load->model('m_tautan');
		$this->load->model('m_pengguna');
		$this->load->library('upload');
	}


	function index(){
		$x['data']=$this->m_tautan->get_all_tautan();
		$y['title'] = 'SMK Negeri PP Sembawa | Tulisan';
		$this->load->view('admin/v_header',$y);
		$this->load->view('admin/v_sidebar',["side" => 11]);
		$this->load->view('admin/v_tautan',$x);
	}
	function add_tautan(){
		$x['kat']=$this->m_kategori->get_all_kategori();
		$y['title'] = 'SMK Negeri PP Sembawa | Add Tulisan';
		$this->load->view('admin/v_header',$y);
		$this->load->view('admin/v_sidebar',["side" => 11]);
		$this->load->view('admin/v_add_tautan',$x);
	}
	function get_edit(){
		$kode=$this->uri->segment(4);
		$x['data']=$this->m_tautan->get_tulisan_by_kode($kode);
		$x['kat']=$this->m_kategori->get_all_kategori();
		$y['title'] = 'SMK Negeri PP Sembawa | Edit Tulisan';
		$this->load->view('admin/v_header',$y);
		$this->load->view('admin/v_sidebar',["side" => 11]);
		$this->load->view('admin/v_edit_tautan',$x);
	}
	function simpan_tautan(){
				$config['upload_path'] = './assets/images/'; //path folder
	            $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
	            // $config['encrypt_name'] = TRUE; //nama yang terupload nantinya

	            $this->upload->initialize($config);
	            if(!empty($_FILES['filefoto']['name']))
              {
					if (($_FILES["filefoto"]["size"] < 150000)) {
						$judul=$this->input->post('xjudul');
						$this->session->set_flashdata('pesan','Tautan (' . $judul . ') Memiliki Resolusi Gambar lebih kecil dari 150KB Mungkin Akan Muncul Buram');

						redirect('Admin/Tautan'); 
					}

	                else if ($this->upload->do_upload('filefoto'))
	                {
	                        $gbr = $this->upload->data();
	                        //Compress Image
	                        $config['image_library']='gd2';
	                        $config['source_image']='./assets/images/'.$gbr['file_name'];
	                        $config['create_thumb']= FALSE;
	                        $config['maintain_ratio']= FALSE;
	                        $config['quality']= '60%';
	                        $config['width']= 710;
	                        $config['height']= 320;
	                        $config['new_image']= './assets/images/'.$gbr['file_name'];
	                        $this->load->library('image_lib', $config);
	                        $this->image_lib->resize();

	                        $gambar=$gbr['file_name'];
							$judul=strip_tags($this->input->post('xjudul'));
							$filter=str_replace("?", "", $judul);
							$filter2=str_replace("$", "", $filter);
							$filter3=str_replace(",", "",$filter2);
							$filter4=str_replace(".", "", $filter3);
							$slug=strtolower(str_replace(" ", "-", $filter4));
							$link=$this->input->post('xlink');
							$tanggal=$this->input->post('xtanggal');
							$imgslider=$this->input->post('ximgslider');
							$kode=$this->session->userdata('idadmin');
							$user=$this->m_pengguna->get_pengguna_login($kode);
							$p=$user->row_array();
							$user_id=$p['pengguna_id'];
							$user_nama=$p['pengguna_nama'];
							$this->m_tautan->simpan_tulisan($judul,$link,$tanggal,$user_id,$user_nama,$gambar,$slug);
							echo $this->session->set_flashdata('msg','success');
							redirect('Admin/Tautan');
					}else{
	                    echo $this->session->set_flashdata('msg','warning');
	                    redirect('Admin/Tautan');
	                }
	                 
	            }else{
					redirect('Admin/Tautan');
				}
				
	}
	
	function update_tulisan(){
				
	            $config['upload_path'] = './assets/images/'; //path folder
	            $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
	            // $config['encrypt_name'] = TRUE; //nama yang terupload nantinya

	            $this->upload->initialize($config);
	            if(!empty($_FILES['filefoto']['name']))
	            {

					if (($_FILES["filefoto"]["size"] < 150000)) {
						$judul=$this->input->post('xjudul');
						$this->session->set_flashdata('pesan','Tautan (' . $judul . ') Memiliki Resolusi Gambar lebih kecil dari 150KB Mungkin Akan Muncul Buram');

						redirect('Admin/Tautan'); 
					}

	                else if ($this->upload->do_upload('filefoto'))
	                {
	                        $gbr = $this->upload->data();
	                        //Compress Image
	                        $config['image_library']='gd2';
	                        $config['source_image']='./assets/images/'.$gbr['file_name'];
	                        $config['create_thumb']= FALSE;
	                        $config['maintain_ratio']= FALSE;
	                        $config['quality']= '60%';
	                        $config['width']= 710;
	                        $config['height']= 320;
	                        $config['new_image']= './assets/images/'.$gbr['file_name'];
	                        $this->load->library('image_lib', $config);
	                        $this->image_lib->resize();

	                        $gambar=$gbr['file_name'];
	                        $tulisan_id=$this->input->post('kode');
	                        $judul=strip_tags($this->input->post('xjudul'));
	                        $filter=str_replace("?", "", $judul);
							$filter2=str_replace("$", "", $filter);
							$filter3=str_replace(",", "", $filter2);
							$filter4=str_replace(".", "", $filter3);
							$slug=strtolower(str_replace(" ", "-", $filter4));
							$link=$this->input->post('xlink');
							$tanggal=$this->input->post('xtanggal');
							$imgslider=$this->input->post('ximgslider');
							$kode=$this->session->userdata('idadmin');
							$user=$this->m_pengguna->get_pengguna_login($kode);
							$p=$user->row_array();
							$user_id=$p['pengguna_id'];
							$user_nama=$p['pengguna_nama'];
							$this->m_tautan->update_tulisan($tulisan_id,$judul,$link,$tanggal,$user_id,$user_nama,$gambar,$slug);
							echo $this->session->set_flashdata('msg','info');
							redirect('Admin/Tautan');
	                    
	                }else{
	                    echo $this->session->set_flashdata('msg','warning');
	                    redirect('Admin/Tautan');
	                }
	                
	            }else{
							$tulisan_id=$this->input->post('kode');
							$judul=strip_tags($this->input->post('xjudul'));
							$filter=str_replace("?", "", $judul);
							$filter2=str_replace("$", "", $filter);
							$filter3=str_replace(",", "", $filter2);
							$filter4=str_replace(".", "", $filter3);
							$slug=strtolower(str_replace(" ", "-", $filter4));
							$link=$this->input->post('xlink');
							$tanggal=$this->input->post('xtanggal');
							$kategori_id=strip_tags($this->input->post('xkategori'));
							$data=$this->m_kategori->get_kategori_byid($kategori_id);
							$q=$data->row_array();
							$kategori_nama=$q['kategori_nama'];
							$imgslider=$this->input->post('ximgslider');
							$kode=$this->session->userdata('idadmin');
							$user=$this->m_pengguna->get_pengguna_login($kode);
							$p=$user->row_array();
							$user_id=$p['pengguna_id'];
							$user_nama=$p['pengguna_nama'];
							$this->m_tautan->update_tulisan_tanpa_img($tulisan_id,$judul,$link,$tanggal,$user_id,$user_nama,$slug);
							echo $this->session->set_flashdata('msg','info');
							redirect('Admin/Tautan');
	            } 

	}

	function hapus_tulisan(){
		$kode=$this->input->post('kode');
		$gambar=$this->input->post('gambar');
		$path='./assets/images/'.$gambar;
		unlink($path);
		$this->m_tautan->hapus_tulisan($kode);
		echo $this->session->set_flashdata('msg','success-hapus');
		redirect('Admin/Tautan');
	}

}