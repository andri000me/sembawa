<?php
class Galeri extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('masuk') != TRUE) {
			$url = base_url('Administrator');
			redirect($url);
		};
		$this->load->model('m_album');
		$this->load->model('m_galeri');
		$this->load->model('m_pengguna');
		$this->load->library('upload');
	}


	function index()
	{

		$x['data'] = $this->m_galeri->get_all_galeri();
		$x['alb'] = $this->m_album->get_all_album();
		$x['kat'] = $this->m_galeri->get_sarana();
		$y['title'] = 'Admin | Galeri';
		$this->load->view('admin/v_header', $y);
		$this->load->view('admin/v_sidebar', ["side" => 7]);
		$this->load->view('admin/v_galeri', $x);
	}


	function galeri_by_id($id)
	{

		$x['data'] = $this->m_galeri->get_galeri_by_id_album($id);
		$x['alb'] = $this->m_album->get_album_by_id($id);
		$a = $this->m_album->get_album_by_id($id)->result();
		foreach ($a as $i) {
			$nama = $i->album_nama;
			$x['nama'] = $i->album_nama;
			$x['id'] = $i->album_id;
		}
		$x['kat'] = $this->m_galeri->get_sarana();
		$y['title'] = 'Admin | Galeri untuk album ' . $nama;
		$this->load->view('admin/v_header', $y);
		$this->load->view('admin/v_sidebar', ["side" => 7]);
		$this->load->view('admin/v_galeri_by_id', $x);
	}

	function simpan_galeri()
	{
		$config['upload_path'] = './assets/images/'; //path folder
		$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';
		$config['max_size']             = 0; //type yang dapat diakses bisa anda sesuaikan
		// 	 //nama yang terupload nantinya

		$this->upload->initialize($config);
		if (!empty($_FILES['filefoto']['name'])) {
			if ($_FILES["filefoto"]["size"] < 20000) {
				$gambar = "default_err.png";
				if ($this->input->get('id'))
					$album = $this->input->get('id');
				else
					$album = strip_tags($this->input->post('xalbum'));

				if ($this->input->post('sarana'))
					$sarana = $this->input->post('sarana');
				else
					$sarana = -1;
				$judul = strip_tags($this->input->post('xjudul'));
				$kode = $this->session->userdata('idadmin');
				$user = $this->m_pengguna->get_pengguna_login($kode);
				$p = $user->row_array();
				$user_id = $p['pengguna_id'];
				$user_nama = $p['pengguna_nama'];
				$this->m_galeri->simpan_galeri($judul, $album, $user_id, $user_nama, $gambar, $sarana);
				echo $this->session->set_flashdata('msg', 'warning');
				$this->session->set_flashdata('pesan', 'Gambar yang diupload memiliki resolusi < 20KB. Upload gambar gagal.');
				if ($this->input->get('id'))
					redirect('Admin/Galeri/galeri_by_id/' . $album);
				else
					redirect('Admin/Galeri');
			} else if ($this->upload->do_upload('filefoto')) {

				$gbr = $this->upload->data();
				//Compress Image

				$config['image_library'] = 'gd2';
				$config['source_image'] = './assets/images/' . $gbr['file_name'];
				$config['create_thumb'] = FALSE;
				$config['maintain_ratio'] = FALSE;
				$config['quality'] = '60%';
				$config['width'] = 700;
				$config['height'] = 600;
				$config['new_image'] = './assets/images/' . $gbr['file_name'];
				$this->load->library('image_lib', $config);
				$this->image_lib->resize();

				$gambar = $gbr['file_name'];
				$judul = strip_tags($this->input->post('xjudul'));
				if ($this->input->get('id'))
					$album = $this->input->get('id');
				else
					$album = strip_tags($this->input->post('xalbum'));
				if ($this->input->post('sarana'))
					$sarana = $this->input->post('sarana');
				else
					$sarana = -1;
				$kode = $this->session->userdata('idadmin');
				$user = $this->m_pengguna->get_pengguna_login($kode);
				$p = $user->row_array();
				$user_id = $p['pengguna_id'];
				$user_nama = $p['pengguna_nama'];
				$this->m_galeri->simpan_galeri($judul, $album, $user_id, $user_nama, $gambar, $sarana);
				echo $this->session->set_flashdata('msg', 'success');
				if ($this->input->get('id'))
					redirect('Admin/Galeri/galeri_by_id/' . $album);
				else
					redirect('Admin/Galeri');
			} else {
				$gambar = "default_err.png";
				$judul = strip_tags($this->input->post('xjudul'));
				if ($this->input->get('id'))
					$album = $this->input->get('id');
				else
					$album = strip_tags($this->input->post('xalbum'));
				if ($this->input->post('sarana'))
					$sarana = $this->input->post('sarana');
				else
					$sarana = -1;

				$kode = $this->session->userdata('idadmin');
				$user = $this->m_pengguna->get_pengguna_login($kode);
				$p = $user->row_array();
				$user_id = $p['pengguna_id'];
				$user_nama = $p['pengguna_nama'];
				$this->m_galeri->simpan_galeri($judul, $album, $user_id, $user_nama, $gambar, $sarana);
				echo $this->session->set_flashdata('msg', 'warning');
				$this->session->set_flashdata('pesan', 'Upload gambar gagal. Mohon pilih file lain.');
				if ($this->input->get('id'))
					redirect('Admin/Galeri/galeri_by_id/' . $this->input->get('id'));
				else
					redirect('Admin/Galeri');
			}
		} else {
			$gambar = "default_err.png";
			$judul = strip_tags($this->input->post('xjudul'));
			if ($this->input->get('id'))
				$album = $this->input->get('id');
			else
				$album = strip_tags($this->input->post('xalbum'));
				if ($this->input->post('sarana'))
					$sarana = $this->input->post('sarana');
				else
					$sarana = -1;
				
			$kode = $this->session->userdata('idadmin');
			$user = $this->m_pengguna->get_pengguna_login($kode);
			$p = $user->row_array();
			$user_id = $p['pengguna_id'];
			$user_nama = $p['pengguna_nama'];
			$this->m_galeri->simpan_galeri($judul, $album, $user_id, $user_nama, $gambar, $sarana);
			echo $this->session->set_flashdata('msg', 'warning');
			$this->session->set_flashdata('pesan', 'Tidak ada gambar yang dipilih. Upload gambar gagal.');
			if ($this->input->get('id'))
				redirect('Admin/Galeri/galeri_by_id/' . $this->input->get('id'));
			else
				redirect('Admin/Galeri');
		}
	}

	function update_galeri()
	{

		$config['upload_path'] = './assets/images/'; //path folder
		$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';
		$config['max_size']             = 0; //type yang dapat diakses bisa anda sesuaikan
		// $config['encrypt_name'] = TRUE; //nama yang terupload nantinya

		$this->upload->initialize($config);
		if (!empty($_FILES['filefoto']['name'])) {
			if ($_FILES["filefoto"]["size"] < 20000) {
				$galeri_id = $this->input->post('kode');
				$judul = strip_tags($this->input->post('xjudul'));
				if ($this->input->get('id'))
					$album = $this->input->get('id');
				else
					$album = strip_tags($this->input->post('xalbum'));
					if ($this->input->post('sarana'))
					$sarana = $this->input->post('sarana');
				else
					$sarana = -1;
				
				$gambar = $this->input->post('gambar');
				// $path='./assets/images/'.$images;
				// if($path!='./assets/images/default_err.png')
				// unlink($path);
				$kode = $this->session->userdata('idadmin');
				$user = $this->m_pengguna->get_pengguna_login($kode);
				$p = $user->row_array();
				$user_id = $p['pengguna_id'];
				$user_nama = $p['pengguna_nama'];
				$this->m_galeri->update_galeri($galeri_id, $judul, $album, $user_id, $user_nama, $gambar, $sarana);
				echo $this->session->set_flashdata('msg', 'warning2');
				$this->session->set_flashdata('pesan', 'Gambar yang diupload memiliki resolusi < 20KB. Upload gambar gagal.');
				if ($this->input->get('id'))
					redirect('Admin/Galeri/galeri_by_id/' . $album);
				else
					redirect('Admin/Galeri');
			} else if ($this->upload->do_upload('filefoto')) {

				$gbr = $this->upload->data();
				//Compress Image
				$config['image_library'] = 'gd2';
				$config['source_image'] = './assets/images/' . $gbr['file_name'];
				$config['create_thumb'] = FALSE;
				$config['maintain_ratio'] = FALSE;
				$config['quality'] = '60%';
				$config['width'] = 700;
				$config['height'] = 600;
				$config['new_image'] = './assets/images/' . $gbr['file_name'];
				$this->load->library('image_lib', $config);
				$this->image_lib->resize();

				$gambar = $gbr['file_name'];
				$galeri_id = $this->input->post('kode');
				$judul = strip_tags($this->input->post('xjudul'));
				if ($this->input->get('id'))
					$album = $this->input->get('id');
				else
					$album = strip_tags($this->input->post('xalbum'));
					if ($this->input->post('sarana'))
					$sarana = $this->input->post('sarana');
				else
					$sarana = -1;
				
				$images = $this->input->post('gambar');
				$path = './assets/images/' . $images;
				if ($path != './assets/images/default_err.png')
					unlink($path);
				$kode = $this->session->userdata('idadmin');
				$user = $this->m_pengguna->get_pengguna_login($kode);
				$p = $user->row_array();
				$user_id = $p['pengguna_id'];
				$user_nama = $p['pengguna_nama'];
				$this->m_galeri->update_galeri($galeri_id, $judul, $album, $user_id, $user_nama, $gambar, $sarana);
				echo $this->session->set_flashdata('msg', 'info');
				if ($this->input->get('id'))
					redirect('Admin/Galeri/galeri_by_id/' . $album);
				else
					redirect('Admin/Galeri');
			} else {
				$galeri_id = $this->input->post('kode');
				$judul = strip_tags($this->input->post('xjudul'));
				if ($this->input->get('id'))
					$album = $this->input->get('id');
				else
					$album = strip_tags($this->input->post('xalbum'));
					if ($this->input->post('sarana'))
					$sarana = $this->input->post('sarana');
				else
					$sarana = -1;
				
				$gambar = $this->input->post('gambar');
				// $path='./assets/images/'.$images;
				// if($path!='./assets/images/default_err.png')
				// unlink($path);
				$kode = $this->session->userdata('idadmin');
				$user = $this->m_pengguna->get_pengguna_login($kode);
				$p = $user->row_array();
				$user_id = $p['pengguna_id'];
				$user_nama = $p['pengguna_nama'];
				$this->m_galeri->update_galeri($galeri_id, $judul, $album, $user_id, $user_nama, $gambar, $sarana);
				echo $this->session->set_flashdata('msg', 'info');
				if ($this->input->get('id'))
					redirect('Admin/Galeri/galeri_by_id/' . $album);
				else
					redirect('Admin/Galeri');
			}
		} else {
			$galeri_id = $this->input->post('kode');
			$judul = strip_tags($this->input->post('xjudul'));
			if ($this->input->get('id'))
				$album = $this->input->get('id');
			else
				$album = strip_tags($this->input->post('xalbum'));
				if ($this->input->post('sarana'))
					$sarana = $this->input->post('sarana');
				else
					$sarana = -1;
				
			$gambar = $this->input->post('gambar');
			// $path='./assets/images/'.$images;
			// if($path!='./assets/images/default_err.png')
			// unlink($path);
			$kode = $this->session->userdata('idadmin');
			$user = $this->m_pengguna->get_pengguna_login($kode);
			$p = $user->row_array();
			$user_id = $p['pengguna_id'];
			$user_nama = $p['pengguna_nama'];
			$this->m_galeri->update_galeri($galeri_id, $judul, $album, $user_id, $user_nama, $gambar, $sarana);
			echo $this->session->set_flashdata('msg', 'info');
			if ($this->input->get('id'))
				redirect('Admin/Galeri/galeri_by_id/' . $album);
			else
				redirect('Admin/Galeri');
		}
	}

	function hapus_galeri()
	{
		$kode = $this->input->post('kode');
		if ($this->input->get('id'))
			$album = $this->input->get('id');
		else
			$album = $this->input->post('album');
		$gambar = $this->input->post('gambar');
		$path = './assets/images/' . $gambar;
		if ($path != './assets/images/default_err.png')
			unlink($path);

		$this->m_galeri->hapus_galeri($kode, $album);
		echo $this->session->set_flashdata('msg', 'success-hapus');
		if ($this->input->get('id'))
			redirect('Admin/Galeri/galeri_by_id/' . $album);
		else
			redirect('Admin/Galeri');
	}
}
