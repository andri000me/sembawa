<?php
class Kategori_file extends CI_Controller{
	function __construct(){
		parent::__construct();
		if($this->session->userdata('masuk') !=TRUE){
            $url=base_url('Administrator');
            redirect($url);
        };
		$this->load->model('m_kategori_file');
		$this->load->library('upload');
	}


	function index(){
		$x['data']=$this->m_kategori_file->get_all_kategori_files();
		$y['title'] = 'SMK Negeri PP Sembawa | Kategori Files';
		$this->load->view('admin/v_header',$y);
		$this->load->view('admin/v_sidebar',["side" => 6]);
		$this->load->view('admin/v_kategori_file',$x);
	}

	function simpan_kategori(){
		$kategori=strip_tags($this->input->post('xkategori'));
		$this->m_kategori_file->simpan_kategori($kategori);
		echo $this->session->set_flashdata('msg','success');
		redirect('Admin/Kategori_file');
	}

	function update_kategori(){
		$kode=strip_tags($this->input->post('kode'));
		$kategori=strip_tags($this->input->post('xkategori'));
		$this->m_kategori_file->update_kategori($kode,$kategori);
		echo $this->session->set_flashdata('msg','info');
		redirect('Admin/Kategori_file');
	}
	function hapus_kategori(){
		$kode=strip_tags($this->input->post('kode'));
		$this->m_kategori_file->hapus_kategori($kode);
		echo $this->session->set_flashdata('msg','success-hapus');
		redirect('Admin/Kategori_file');
	}

}