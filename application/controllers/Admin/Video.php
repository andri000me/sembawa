<?php
class Video extends CI_Controller{
	function __construct(){
		parent::__construct();
		if($this->session->userdata('masuk') !=TRUE){
            $url=base_url('Administrator');
            redirect($url);
        };
        $this->load->model('m_galeri');
		$this->load->model('m_pengguna');
		$this->load->library('upload');
	}


	function index(){
		$x['data']=$this->m_galeri->get_all_video();
		$x['pengguna']=$this->m_pengguna->get_all_pengguna();
		$y['title'] = 'Admin | Video';
		$this->load->view('admin/v_header',$y);
		$this->load->view('admin/v_sidebar',["side" => 2]);
		$this->load->view('admin/v_video',$x);
	}

	function simpan_video(){

		$link=$this->input->post('xlink');
		$nama = $this->input->post('xnama');
		$pengguna=$this->input->post('xpengguna');
		$kode = $this->session->userdata('idadmin');
		$user = $this->m_pengguna->get_pengguna_login($kode);
		$p = $user->row_array();
		$author_id=$p['pengguna_id'];
		$author=$p['pengguna_nama'];
		$this->m_galeri->simpan_video($nama,$link,$pengguna,$author);
		echo $this->session->set_flashdata('msg','success');
		redirect('Admin/Video');
	}

	function update_video(){
		$link=$this->input->post('xlink');
		$nama = $this->input->post('xnama');
		$pengguna=$this->input->post('xpengguna');
		$kode = $this->session->userdata('idadmin');
		$user = $this->m_pengguna->get_pengguna_login($kode);
		$p = $user->row_array();
		$author_id=$p['pengguna_id'];
		$author=$p['pengguna_nama'];
		$video_id=$this->input->post('kode');
		$this->m_galeri->update_video($video_id,$nama,$link,$pengguna,$author);
		echo $this->session->set_flashdata('msg','info');
		redirect('Admin/Video');
	}
	function hapus_video(){
		$kode=strip_tags($this->input->post('kode'));
		$this->m_galeri->hapus_video($kode);
		echo $this->session->set_flashdata('msg','success-hapus');
		redirect('Admin/Video');
	}

}