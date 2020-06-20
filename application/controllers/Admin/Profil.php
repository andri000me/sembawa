<?php
class Profil extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('masuk') != TRUE) {
			$url = base_url('Administrator');
			redirect($url);
		};
		$this->load->model('m_tulisan');
		$this->load->model('m_pengunjung');
		$this->load->model('m_portfolio');
		$this->load->model('m_jejak_pendapat');
		$this->load->model('m_tautan');
		$this->load->model('m_pengguna');
		$this->load->library('upload');
		$this->m_pengunjung->count_visitor();
	}

	function index()
	{
		$y['title'] = 'Admin | Profil';
		$this->m_portfolio->count_views(9);
		$x['portofolio1'] = $this->m_portfolio->get_portfolio_by_kode(8);
		$x['portofolio'] = $this->m_portfolio->get_portfolio();
		$x['visitor'] = $this->m_pengunjung->statistik_pengujung();
		$x['total'] = $this->m_pengunjung->get_all_pengunjung();
		$x['tautan'] = $this->m_tautan->get_all_tautan();
		$this->load->view('admin/v_header', $y);
		$this->load->view('admin/v_sidebar', ["side" => 12]);
		$this->load->view('admin/v_list_profil', $x);
	}

	function get_edit_profil()
	{
		$kode = $this->uri->segment(4);
		$x['portofolio'] = $this->m_portfolio->get_portfolio_by_kode($kode);
		$y['title'] = 'Admin | Edit Profil';
		$this->load->view('admin/v_header', $y);
		$this->load->view('admin/v_sidebar', ["side" => 2]);
		$this->load->view('admin/v_edit_profil', $x);
	}
	function edit_profil()
	{
		$config['upload_path'] = './assets/images/'; //path folder
		$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
		// $config['encrypt_name'] = TRUE; //nama yang terupload nantinya

		$this->upload->initialize($config);
		if (!empty($_FILES['filefoto']['name'])) {

			if ($this->upload->do_upload('filefoto')) {
				if (($_FILES["filefoto"]["size"] < 20000)) {
					$gambar = $this->input->post('gambar');
					$id = $this->input->post('id');
					$tampil = $this->input->post('tampil');

					$judul = strip_tags($this->input->post('judul'));
					$nama = strip_tags($this->input->post('nama'));
					$filter = str_replace("'", "\'", $nama);
					$deskripsi = $this->input->post('isi');
					$keterangan = strip_tags($this->input->post('kategori'));
					$kode = $this->session->userdata('idadmin');
					$user = $this->m_pengguna->get_pengguna_login($kode);
					$p = $user->row_array();
					$user_id = $p['pengguna_id'];
					$user_nama = $p['pengguna_nama'];
					$this->m_portfolio->edit_profil($id, $filter, $judul, $deskripsi, $user_nama, $gambar, $keterangan, $tampil);
					echo $this->session->set_flashdata('msg', 'warning2');
					$this->session->set_flashdata('pesan', 'Gambar yang dipilih memiliki resolusi < 20KB. Update gambar gagal.');
					redirect('Admin/Profil');
				} else {
					$gbr = $this->upload->data();
					//Compress Image
					$config['image_library'] = 'gd2';
					$config['source_image'] = './assets/images/' . $gbr['file_name'];
					$config['create_thumb'] = FALSE;
					$config['maintain_ratio'] = FALSE;
					$config['quality'] = '100%';
					$config['new_image'] = './assets/images/' . $gbr['file_name'];
					$this->load->library('image_lib', $config);
					$this->image_lib->resize();

					$gambar = $gbr['file_name'];
					$id = $this->input->post('id');
					$judul = strip_tags($this->input->post('judul'));
					$nama = strip_tags($this->input->post('nama'));
					$tampil = $this->input->post('tampil');
					$filter = str_replace("'", "\'", $nama);
					$deskripsi = $this->input->post('isi');
					$keterangan = strip_tags($this->input->post('kategori'));
					$kode = $this->session->userdata('idadmin');
					$user = $this->m_pengguna->get_pengguna_login($kode);
					$p = $user->row_array();
					$user_id = $p['pengguna_id'];
					$user_nama = $p['pengguna_nama'];
					$this->m_portfolio->edit_profil($id, $filter, $judul, $deskripsi, $user_nama, $gambar, $keterangan, $tampil);
					echo $this->session->set_flashdata('msg', 'info');
					redirect('Admin/Profil');
				}
			} else {
				$gambar = $this->input->post('gambar');
				$id = $this->input->post('id');
				$judul = strip_tags($this->input->post('judul'));
				$nama = strip_tags($this->input->post('nama'));
				$tampil = $this->input->post('tampil');
				$filter = str_replace("'", "\'", $nama);
				$deskripsi = $this->input->post('isi');
				$keterangan = strip_tags($this->input->post('kategori'));
				$kode = $this->session->userdata('idadmin');
				$user = $this->m_pengguna->get_pengguna_login($kode);
				$p = $user->row_array();
				$user_id = $p['pengguna_id'];
				$user_nama = $p['pengguna_nama'];
				$this->m_portfolio->edit_profil($id, $filter, $judul, $deskripsi, $user_nama, $gambar, $keterangan, $tampil);
				echo $this->session->set_flashdata('msg', 'warning2');
				$this->session->set_flashdata('pesan', 'Update gambar gagal. Mohon pilih file lain.');
				redirect('Admin/Profil');
			}
		} else {
			$gambar = $this->input->post('gambar');
			$id = $this->input->post('id');
			$judul = strip_tags($this->input->post('judul'));
			$nama = strip_tags($this->input->post('nama'));
			$tampil = $this->input->post('tampil');
			$filter = str_replace("'", "\'", $nama);
			$deskripsi = $this->input->post('isi');
			$keterangan = strip_tags($this->input->post('kategori'));
			$kode = $this->session->userdata('idadmin');
			$user = $this->m_pengguna->get_pengguna_login($kode);
			$p = $user->row_array();
			$user_id = $p['pengguna_id'];
			$user_nama = $p['pengguna_nama'];
			$this->m_portfolio->edit_profil($id, $filter, $judul, $deskripsi, $user_nama, $gambar, $keterangan, $tampil);
			echo $this->session->set_flashdata('msg', 'info');
			redirect('Admin/Profil');
		}
	}
	function sosmed()
	{
		$y['title'] = 'Admin | Media Sosial';
		$this->m_portfolio->count_views(9);
		$x['sosmed'] = $this->m_portfolio->get_All_Sosmed();
		$this->load->view('admin/v_header', $y);
		$this->load->view('admin/v_sidebar', ["side" => 12]);
		$this->load->view('admin/v_sosmed', $x);
	}

	function update_sosmed()
	{
		$id = $this->input->post('id');
		$link = $this->input->post('link');
		$this->m_portfolio->update_sosmed($link, $id);
		echo $this->session->set_flashdata('msg', 'info');
		redirect("Admin/Profil/sosmed");
	}


	function header()
	{
		$y['title'] = 'Admin | Header';
		$x['latest_header'] = $this->m_portfolio->get_latest_header();
		$x['history_header'] = $this->m_portfolio->get_history_header();
		$this->load->view('admin/v_header', $y);
		$this->load->view('admin/v_sidebar', ["side" => 12]);
		$this->load->view('admin/v_list_header', $x);
	}
	function update_header()
	{
		$config['upload_path'] = './assets/images/header/'; //path folder
		$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';
		$config['max_size']             = 0; //type yang dapat diakses bisa anda sesuaikan
		// 	 //nama yang terupload nantinya

		$this->upload->initialize($config);
		if (!empty($_FILES['filefoto']['name'])) {
			if (($_FILES["filefoto"]["size"] < 20000)) {
				$this->session->set_flashdata('pesan', 'Gambar yang diupload memiliki resolusi < 20Kb. Update header gagal. Mohon pilih file lain.');
				echo $this->session->set_flashdata('msg', 'error');
				redirect('Admin/Profil/header');
			} else if ($this->upload->do_upload('filefoto')) {
				$gbr = $this->upload->data();
				//Compress Image

				$config['image_library'] = 'gd2';
				$config['source_image'] = './assets/images/header/' . $gbr['file_name'];
				$config['create_thumb'] = FALSE;
				$config['maintain_ratio'] = FALSE;
				$config['quality'] = '100%';
				$config['width'] = 850;
				$config['height'] = 600;
				$config['new_image'] = './assets/images/header/' . $gbr['file_name'];
				$this->load->library('image_lib', $config);
				$this->image_lib->resize();

				$gambar = $gbr['file_name'];
				$kode = $this->session->userdata('idadmin');
				$user = $this->m_pengguna->get_pengguna_login($kode);
				$p = $user->row_array();
				$user_id = $p['pengguna_id'];
				$user_nama = $p['pengguna_nama'];
				$this->m_portfolio->update_header($gambar, $user_nama, $user_id);
				echo $this->session->set_flashdata('msg', 'success');

				$q = $this->db->query("SELECT * from tbl_header")->result();
				$row = count($q);
				if ($row > 7) {
					$this->del_history_header();
				}

				redirect('Admin/Profil/header');
			} else {
				$this->session->set_flashdata('pesan', 'Update header gagal. Mohon pilih file lain.');
				echo $this->session->set_flashdata('msg', 'error');
				redirect('Admin/Profil/header');
			}
		} else {
			$this->session->set_flashdata('pesan', 'Tidak ada gambar yang dipilih. Update header gagal.');
			echo $this->session->set_flashdata('msg', 'error');
			redirect('Admin/Profil/header');
		}
	}

	function del_history_header()
	{
		$least = $this->db->query("SELECT * FROM tbl_header WHERE id = (SELECT MIN(id) FROM tbl_header)")->result();
		$top = $this->db->query("SELECT * FROM tbl_header WHERE id = (SELECT MAX(id) FROM tbl_header)")->result();
		foreach ($top as $i)
			$max = $i->id;
		foreach ($least as $i)
			$min = $i->id;

		echo $min;
		echo $max;
		for ($i = $min; $i <= $max - 7; $i++) {
			$id = $this->m_portfolio->get_header_by_id($i)->result();
			foreach ($id as $a) {
				$link = $a->link;
			}
			$path = './assets/images/header/' . $link;
			unlink($path);


			$this->m_portfolio->del_header_by_id($i);
		}

		redirect('Admin/Profil/header');
	}

	function pejabat()
	{
		$y['title'] = 'Admin | Pejabat';
		$this->m_portfolio->count_views(9);
		$x['data'] = $this->m_portfolio->get_pejabat();
		$this->load->view('admin/v_header', $y);
		$this->load->view('admin/v_sidebar', ["side" => 12]);
		$this->load->view('admin/v_list_pejabat', $x);
	}

	function penghargaan_by_id($id)
	{
		$y['title'] = 'Admin | Pejabat';
		$x['data'] = $this->m_portfolio->get_penghargaan($id);
		$c = $this->m_portfolio->get_pejabat_by_id($id)->row_array();

		$x['title'] = $c['nama'];
		$x['id_pejabat'] = $id;


		$this->load->view('admin/v_header', $y);
		$this->load->view('admin/v_sidebar', ["side" => 12]);
		$this->load->view('admin/v_penghargaan_by_id', $x);
	}

	function tambah_penghargaan()
	{
		$String1 = strip_tags(str_replace("'", "\'", $this->input->post('deskripsi')));
		$deskripsi = strip_tags(str_replace("\"", "\"", $String1));
		$tahun = $this->input->post('tahun');
		$id_pejabat = $this->input->post('id_pejabat');
		$this->m_portfolio->tambah_penghargaan($deskripsi, $tahun, $id_pejabat);
		echo $this->session->set_flashdata('msg', 'success');
		redirect('Admin/Profil/penghargaan_by_id/' . $id_pejabat);
	}

	function hapus_penghargaan()
	{
		$id = $this->input->post('id');
		$id_pejabat = $this->input->post('id_pejabat');
		$this->m_portfolio->hapus_penghargaan($id, $id_pejabat);
		echo $this->session->set_flashdata('msg', 'success-hapus');

		redirect('Admin/Profil/penghargaan_by_id/' . $id_pejabat);
	}
	function update_penghargaan()
	{
		$id = $this->input->post('id');
		$id_pejabat = $this->input->post('id_pejabat');
		$String1 = strip_tags(str_replace("'", "\'", $this->input->post('deskripsi')));
		$deskripsi = strip_tags(str_replace("\"", "\"", $String1));

		$tahun = $this->input->post('tahun');
		$this->m_portfolio->edit_penghargaan($id, $deskripsi, $tahun, $id_pejabat);
		echo $this->session->set_flashdata('msg', 'info');

		redirect('Admin/Profil/penghargaan_by_id/' . $id_pejabat);
	}

	function tambah_pejabat()
	{
		$config['upload_path'] = './assets/images/pejabat_background/'; //path folder
		$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';
		$config['max_size']             = 0; //type yang dapat diakses bisa anda sesuaikan
		// 	 //nama yang terupload nantinya

		$this->upload->initialize($config);
		if (!empty($_FILES['filefoto']['name'])) {
			if ($_FILES["filefoto"]["size"] < 20000) {
				$gambar = "user_blank.png";
				$nama = strip_tags(str_replace("'", "\'", $this->input->post('nama')));
				$jabatan = strip_tags($this->input->post('jabatan'));
				$telfon = strip_tags($this->input->post('telfon'));
				$alamat = strip_tags($this->input->post('alamat'));
				$pendidikan = strip_tags($this->input->post('pendidikan'));

				$kode = $this->session->userdata('idadmin');
				$user = $this->m_pengguna->get_pengguna_login($kode);
				$p = $user->row_array();
				$user_id = $p['pengguna_id'];
				$user_nama = $p['pengguna_nama'];
				$this->m_portfolio->tambah_pejabat($nama, $jabatan, $telfon, $alamat, $pendidikan, $gambar, $user_nama);
				echo $this->session->set_flashdata('msg', 'warning');
				$this->session->set_flashdata('pesan', 'Gambar yang diupload memiliki resolusi < 20KB. Upload gambar gagal.');
				redirect('Admin/Profil/pejabat');
			} else if ($this->upload->do_upload('filefoto')) {

				$gbr = $this->upload->data();
				//Compress Image

				$config['image_library'] = 'gd2';
				$config['source_image'] = './assets/images/pejabat/background/' . $gbr['file_name'];
				$config['create_thumb'] = FALSE;
				$config['maintain_ratio'] = FALSE;
				$config['quality'] = '100%';
				$config['new_image'] = './assets/images/pejabat_background/' . $gbr['file_name'];
				$this->load->library('image_lib', $config);
				$this->image_lib->resize();

				$gambar = $gbr['file_name'];
				$nama = strip_tags(str_replace("'", "\'", $this->input->post('nama')));
				$jabatan = strip_tags($this->input->post('jabatan'));
				$telfon = strip_tags($this->input->post('telfon'));
				$alamat = strip_tags($this->input->post('alamat'));
				$pendidikan = strip_tags($this->input->post('pendidikan'));

				$kode = $this->session->userdata('idadmin');
				$user = $this->m_pengguna->get_pengguna_login($kode);
				$p = $user->row_array();
				$user_id = $p['pengguna_id'];
				$user_nama = $p['pengguna_nama'];
				$this->m_portfolio->tambah_pejabat($nama, $jabatan, $telfon, $alamat, $pendidikan, $gambar, $user_nama);
				echo $this->session->set_flashdata('msg', 'success');
				redirect('Admin/Profil/pejabat');
			} else {
				$gambar = "user_blank.png";
				$nama = strip_tags(str_replace("'", "\'", $this->input->post('nama')));
				$jabatan = strip_tags($this->input->post('jabatan'));
				$telfon = strip_tags($this->input->post('telfon'));
				$alamat = strip_tags($this->input->post('alamat'));
				$pendidikan = strip_tags($this->input->post('pendidikan'));

				$kode = $this->session->userdata('idadmin');
				$user = $this->m_pengguna->get_pengguna_login($kode);
				$p = $user->row_array();
				$user_id = $p['pengguna_id'];
				$user_nama = $p['pengguna_nama'];
				$this->m_portfolio->tambah_pejabat($nama, $jabatan, $telfon, $alamat, $pendidikan, $gambar, $user_nama);
				echo $this->session->set_flashdata('msg', 'warning');
				$this->session->set_flashdata('pesan', 'Upload gambar gagal. Mohon update data.');
				redirect('Admin/Profil/pejabat');
			}
		} else {
			$gambar = "user_blank.png";
			$nama = strip_tags(str_replace("'", "\'", $this->input->post('nama')));
			$jabatan = strip_tags($this->input->post('jabatan'));
			$telfon = strip_tags($this->input->post('telfon'));
			$alamat = strip_tags($this->input->post('alamat'));
			$pendidikan = strip_tags($this->input->post('pendidikan'));

			$kode = $this->session->userdata('idadmin');
			$user = $this->m_pengguna->get_pengguna_login($kode);
			$p = $user->row_array();
			$user_id = $p['pengguna_id'];
			$user_nama = $p['pengguna_nama'];
			$this->m_portfolio->tambah_pejabat($nama, $jabatan, $telfon, $alamat, $pendidikan, $gambar, $user_nama);
			echo $this->session->set_flashdata('msg', 'warning');
			$this->session->set_flashdata('pesan', 'Tidak ada gambar yang dipilih. Upload gambar gagal.');
			redirect('Admin/Profil/pejabat');
		}
	}
	function update_pejabat()
	{
		$config['upload_path'] = './assets/images/pejabat_background/'; //path folder
		$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';
		$config['max_size']             = 0; //type yang dapat diakses bisa anda sesuaikan
		// 	 //nama yang terupload nantinya

		$this->upload->initialize($config);
		if (!empty($_FILES['filefoto']['name'])) {
			if ($_FILES["filefoto"]["size"] < 20000) {
				$gambar = $this->input->post('gambar');
				$id = $this->input->post('id');
				$nama = strip_tags(str_replace("'", "\'", $this->input->post('nama')));
				$jabatan = strip_tags($this->input->post('jabatan'));
				$telfon = strip_tags($this->input->post('telfon'));
				$alamat = strip_tags($this->input->post('alamat'));
				$pendidikan = strip_tags($this->input->post('pendidikan'));

				$kode = $this->session->userdata('idadmin');
				$user = $this->m_pengguna->get_pengguna_login($kode);
				$p = $user->row_array();
				$user_id = $p['pengguna_id'];
				$user_nama = $p['pengguna_nama'];
				$this->m_portfolio->edit_pejabat($id, $nama, $jabatan, $telfon, $alamat, $pendidikan, $gambar, $user_nama);
				echo $this->session->set_flashdata('msg', 'warning2');
				$this->session->set_flashdata('pesan', 'Gambar yang diupload memiliki resolusi < 20KB. Upload gambar gagal.');
				redirect('Admin/Profil/pejabat');
			} else if ($this->upload->do_upload('filefoto')) {

				$gbr = $this->upload->data();
				//Compress Image

				$config['image_library'] = 'gd2';
				$config['source_image'] = './assets/images/pejabat_background/' . $gbr['file_name'];
				$config['create_thumb'] = FALSE;
				$config['maintain_ratio'] = FALSE;
				$config['quality'] = '100%';
				$config['new_image'] = './assets/images/pejabat_background/' . $gbr['file_name'];
				$this->load->library('image_lib', $config);
				$this->image_lib->resize();

				$gambar = $gbr['file_name'];
				$image = $this->input->post('gambar');
				$path = './assets/images/pejabat_background/' . $image;
				if ($image != 'user_blank.png')
					unlink($path);
				$id = $this->input->post('id');
				$nama = strip_tags(str_replace("'", "\'", $this->input->post('nama')));
				$jabatan = strip_tags($this->input->post('jabatan'));
				$telfon = strip_tags($this->input->post('telfon'));
				$alamat = strip_tags($this->input->post('alamat'));
				$pendidikan = strip_tags($this->input->post('pendidikan'));

				$kode = $this->session->userdata('idadmin');
				$user = $this->m_pengguna->get_pengguna_login($kode);
				$p = $user->row_array();
				$user_id = $p['pengguna_id'];
				$user_nama = $p['pengguna_nama'];
				$this->m_portfolio->edit_pejabat($id, $nama, $jabatan, $telfon, $alamat, $pendidikan, $gambar, $user_nama);
				echo $this->session->set_flashdata('msg', 'info');
				redirect('Admin/Profil/pejabat');
			} else {
				$gambar = $this->input->post('gambar');
				$id = $this->input->post('id');
				$nama = strip_tags(str_replace("'", "\'", $this->input->post('nama')));
				$jabatan = strip_tags($this->input->post('jabatan'));
				$telfon = strip_tags($this->input->post('telfon'));
				$alamat = strip_tags($this->input->post('alamat'));
				$pendidikan = strip_tags($this->input->post('pendidikan'));

				$kode = $this->session->userdata('idadmin');
				$user = $this->m_pengguna->get_pengguna_login($kode);
				$p = $user->row_array();
				$user_id = $p['pengguna_id'];
				$user_nama = $p['pengguna_nama'];
				$this->m_portfolio->edit_pejabat($id, $nama, $jabatan, $telfon, $alamat, $pendidikan, $gambar, $user_nama);
				echo $this->session->set_flashdata('msg', 'warning2');
				$this->session->set_flashdata('pesan', 'Upload gambar gagal. Mohon pilih file lain.');
				redirect('Admin/Profil/pejabat');
			}
		} else {
			$gambar = $this->input->post('gambar');
			$id = $this->input->post('id');
			$nama = strip_tags(str_replace("'", "\'", $this->input->post('nama')));
			$jabatan = strip_tags($this->input->post('jabatan'));
			$telfon = strip_tags($this->input->post('telfon'));
			$alamat = strip_tags($this->input->post('alamat'));
			$pendidikan = strip_tags($this->input->post('pendidikan'));

			$kode = $this->session->userdata('idadmin');
			$user = $this->m_pengguna->get_pengguna_login($kode);
			$p = $user->row_array();
			$user_id = $p['pengguna_id'];
			$user_nama = $p['pengguna_nama'];
			$this->m_portfolio->edit_pejabat($id, $nama, $jabatan, $telfon, $alamat, $pendidikan, $gambar, $user_nama);
			echo $this->session->set_flashdata('msg', 'warning2');
			redirect('Admin/Profil/pejabat');
		}
	}

	function hapus_pejabat()
	{
		$id = $this->input->post('id');
		$image = $this->input->post('gambar');
		$this->m_portfolio->hapus_pejabat($id);
		$path = './assets/images/pejabat_background/' . $image;
		if ($image != 'user_blank.png')
			unlink($path);
		echo $this->session->set_flashdata('msg', 'success-hapus');

		redirect('Admin/Profil/pejabat');
	}
}
