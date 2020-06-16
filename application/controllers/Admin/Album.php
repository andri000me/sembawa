<?php
class Album extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('masuk') != TRUE) {
			$url = base_url('Administrator');
			redirect($url);
		};
		$this->load->model('m_album');
		$this->load->model('m_pengguna');
		$this->load->library('upload');
	}


	function index()
	{
		$x['data'] = $this->m_album->get_all_album();
		$y['title'] = 'SMK Negeri PP Sembawa | Album';
		$this->load->view('admin/v_header', $y);
		$this->load->view('admin/v_sidebar', ["side" => 7]);
		$this->load->view('admin/v_album', $x);
	}

	function simpan_album()
	{
		$config['upload_path'] = './assets/images/'; //path folder
		$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';
		$config['max_size']             = 0;

		//type yang dapat diakses bisa anda sesuaikan
		// $config['encrypt_name'] = TRUE; //nama yang terupload nantinya

		$this->upload->initialize($config);
		if (!empty($_FILES['filefoto']['name'])) {
			if (($_FILES["filefoto"]["size"] < 150000)) {

				$gambar = "default_err.png";
				$album = strip_tags($this->input->post('xnama_album'));
				$kode = $this->session->userdata('idadmin');
				$user = $this->m_pengguna->get_pengguna_login($kode);
				$p = $user->row_array();
				$user_id = $p['pengguna_id'];
				$user_nama = $p['pengguna_nama'];
				$this->m_album->simpan_album($album, $user_id, $user_nama, $gambar);
				echo $this->session->set_flashdata('msg', 'warning');
				$this->session->set_flashdata('pesan', 'Gambar untuk Album (' . $album . ') Memiliki resolusi < 150Kb. Upload gambar gagal.');
				redirect('Admin/Album');
			} else if ($this->upload->do_upload('filefoto')) {

				$gbr = $this->upload->data();
				//Compress Image
				$config['image_library'] = 'gd2';
				$config['source_image'] = './assets/images/' . $gbr['file_name'];
				$config['create_thumb'] = FALSE;
				$config['maintain_ratio'] = FALSE;
				$config['quality'] = '60%';
				$config['width'] = 500;
				$config['height'] = 400;
				$config['new_image'] = './assets/images/' . $gbr['file_name'];
				$this->load->library('image_lib', $config);
				$this->image_lib->resize();

				$gambar = $gbr['file_name'];
				$album = strip_tags($this->input->post('xnama_album'));
				$kode = $this->session->userdata('idadmin');
				$user = $this->m_pengguna->get_pengguna_login($kode);
				$p = $user->row_array();
				$user_id = $p['pengguna_id'];
				$user_nama = $p['pengguna_nama'];
				$this->m_album->simpan_album($album, $user_id, $user_nama, $gambar);
				echo $this->session->set_flashdata('msg', 'success');
				redirect('admin/album');
			} else {
				$gambar = "default_err.png";
				$album = strip_tags($this->input->post('xnama_album'));
				$kode = $this->session->userdata('idadmin');
				$user = $this->m_pengguna->get_pengguna_login($kode);
				$p = $user->row_array();
				$user_id = $p['pengguna_id'];
				$user_nama = $p['pengguna_nama'];
				$this->m_album->simpan_album($album, $user_id, $user_nama, $gambar);
				$this->session->set_flashdata('pesan', 'Upload gambar gagal. Mohon pilih file lain.');
				echo $this->session->set_flashdata('msg', 'warning');
				redirect('Admin/Album');
			}
		} else {
			$gambar = "default_err.png";
			$album = strip_tags($this->input->post('xnama_album'));
			$kode = $this->session->userdata('idadmin');
			$user = $this->m_pengguna->get_pengguna_login($kode);
			$p = $user->row_array();
			$user_id = $p['pengguna_id'];
			$user_nama = $p['pengguna_nama'];
			$this->m_album->simpan_album($album, $user_id, $user_nama, $gambar);
			echo $this->session->set_flashdata('msg', 'warning');
			$this->session->set_flashdata('pesan', 'Tidak ada gambar yang dipilih untuk Album ( ' . $album . ' ). Upload gambar gagal.');
			redirect('Admin/Album');
		}
		print_r($this->upload->display_error());
	}

	function update_album()
	{

		$config['upload_path'] = './assets/images/'; //path folder
		$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';
		$config['max_size']             = 0; //type yang dapat diakses bisa anda sesuaikan
		// $config['encrypt_name'] = TRUE; //nama yang terupload nantinya

		$this->upload->initialize($config);
		if (!empty($_FILES['filefoto']['name'])) {

			if (($_FILES["filefoto"]["size"] < 150000)) {
				$images = $this->input->post('gambar');
				// $path='./assets/images/'.$images;
				// if($path!='./assets/images/default_err.png')
				// 	unlink($path);

				$gambar = $images;
				$album_id = $this->input->post('kode');
				$album_nama = strip_tags($this->input->post('xnama_album'));
				$kode = $this->session->userdata('idadmin');
				$user = $this->m_pengguna->get_pengguna_login($kode);
				$p = $user->row_array();
				$user_id = $p['pengguna_id'];
				$user_nama = $p['pengguna_nama'];
				$this->m_album->update_album($album_id, $album_nama, $user_id, $user_nama, $gambar);
				echo $this->session->set_flashdata('msg', 'warning2');
				$this->session->set_flashdata('pesan', 'Gambar untuk Album (' . $album_nama . ') Memiliki resolusi < 150Kb. Update gambar gagal.');
				redirect('Admin/Album');
			} else if ($this->upload->do_upload('filefoto')) {
				$gbr = $this->upload->data();
				//Compress Image
				$config['image_library'] = 'gd2';
				$config['source_image'] = './assets/images/' . $gbr['file_name'];
				$config['create_thumb'] = FALSE;
				$config['maintain_ratio'] = FALSE;
				$config['quality'] = '60%';
				$config['width'] = 500;
				$config['height'] = 400;
				$config['new_image'] = './assets/images/' . $gbr['file_name'];
				$this->load->library('image_lib', $config);
				$this->image_lib->resize();

				$images = $this->input->post('gambar');
				$path = './assets/images/' . $images;
				if ($path != './assets/images/default_err.png')
					unlink($path);

				$gambar = $gbr['file_name'];
				$album_id = $this->input->post('kode');
				$album_nama = strip_tags($this->input->post('xnama_album'));
				$kode = $this->session->userdata('idadmin');
				$user = $this->m_pengguna->get_pengguna_login($kode);
				$p = $user->row_array();
				$user_id = $p['pengguna_id'];
				$user_nama = $p['pengguna_nama'];
				$this->m_album->update_album($album_id, $album_nama, $user_id, $user_nama, $gambar);
				echo $this->session->set_flashdata('msg', 'info');
				redirect('Admin/Album');
			} else {
				$images = $this->input->post('gambar');
				$gambar = $images;
				$album_id = $this->input->post('kode');
				$album_nama = strip_tags($this->input->post('xnama_album'));
				$kode = $this->session->userdata('idadmin');
				$user = $this->m_pengguna->get_pengguna_login($kode);
				$p = $user->row_array();
				$user_id = $p['pengguna_id'];
				$user_nama = $p['pengguna_nama'];
				$this->m_album->update_album($album_id, $album_nama, $user_id, $user_nama, $gambar);
				$this->session->set_flashdata('pesan', 'Update gambar gagal. Mohon pilih file lain');
				echo $this->session->set_flashdata('msg', 'warning2');
				redirect('Admin/Album');
			}
		} else {
			$images = $this->input->post('gambar');
			$gambar = $images;
			$album_id = $this->input->post('kode');
			$album_nama = strip_tags($this->input->post('xnama_album'));
			$kode = $this->session->userdata('idadmin');
			$user = $this->m_pengguna->get_pengguna_login($kode);
			$p = $user->row_array();
			$user_id = $p['pengguna_id'];
			$user_nama = $p['pengguna_nama'];
			$this->m_album->update_album($album_id, $album_nama, $user_id, $user_nama, $gambar);
			echo $this->session->set_flashdata('msg', 'warning2');
			$this->session->set_flashdata('pesan', 'Tidak ada gambar yang dipilih untuk Album ( ' . $album_nama . ' ). Update gambar gagal.');
			redirect('Admin/Album');
		}
	}

	function hapus_album()
	{
		$kode = $this->input->post('kode');
		$gambar = $this->input->post('gambar');
		$path = './assets/images/' . $gambar;
		if ($path != './assets/images/default_err.png')
			unlink($path);
		$this->m_album->hapus_album($kode);
		echo $this->session->set_flashdata('msg', 'success-hapus');
		redirect('Admin/Album');
	}
}
