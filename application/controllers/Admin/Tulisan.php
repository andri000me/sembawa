<?php
class Tulisan extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('masuk') != TRUE) {
			$url = base_url('Administrator');
			redirect($url);
		};
		$this->load->model('m_kategori');
		$this->load->model('m_tulisan');
		$this->load->model('m_pengguna');
		$this->load->library('upload');
	}


	function index()
	{
		$x['data'] = $this->m_tulisan->get_all_tulisan();
		$y['title'] = 'Admin | Artikel';
		$this->load->view('admin/v_header', $y);
		$this->load->view('admin/v_sidebar', ["side" => 2]);
		$this->load->view('admin/v_tulisan', $x);
	}
	function add_tulisan()
	{
		$x['kat'] = $this->m_kategori->get_all_kategori();
		$y['title'] = 'Admin | Tambah Artikel';
		$this->load->view('admin/v_header', $y);
		$this->load->view('admin/v_sidebar', ["side" => 2]);
		$this->load->view('admin/v_add_tulisan', $x);
	}
	function get_edit()
	{
		$kode = $this->uri->segment(4);
		$x['data'] = $this->m_tulisan->get_tulisan_by_kode($kode);
		$x['kat'] = $this->m_kategori->get_all_kategori();
		$y['title'] = 'Admin | Edit Artikel';
		$this->load->view('admin/v_header', $y);
		$this->load->view('admin/v_sidebar', ["side" => 2]);
		$this->load->view('admin/v_edit_tulisan', $x);
	}
	function simpan_tulisan()
	{
		$config['upload_path'] = './assets/images/'; //path folder
		$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
		// $config['encrypt_name'] = TRUE; //nama yang terupload nantinya

		$this->upload->initialize($config);
		if (!empty($_FILES['filefoto']['name'])) {

			if (($_FILES["filefoto"]["size"] < 20000)) {
				$gambar = "default_err.png";
				$tulisan_id = $this->input->post('kode');
				$judul = strip_tags($this->input->post('xjudul'));
				$filter = str_replace("?", "", $judul);
				$filter2 = str_replace("$", "", $filter);
				$filter3 = str_replace(",", "", $filter2);
				$filter4 = str_replace(".", "", $filter3);
				$slug = strtolower(str_replace(" ", "-", $filter4));
				$isi = $this->input->post('xisi');
				$tanggal = $this->input->post('xtanggal');
				$kategori_id = strip_tags($this->input->post('xkategori'));
				$data = $this->m_kategori->get_kategori_byid($kategori_id);
				$q = $data->row_array();
				$kategori_nama = $q['kategori_nama'];
				$imgslider = $this->input->post('ximgslider');
				$kode = $this->session->userdata('idadmin');
				$user = $this->m_pengguna->get_pengguna_login($kode);
				$p = $user->row_array();
				$user_id = $p['pengguna_id'];
				$user_nama = $p['pengguna_nama'];
				$this->m_tulisan->simpan_tulisan($judul, $isi, $tanggal, $kategori_id, $kategori_nama, $user_id, $user_nama, $gambar, $slug);
				echo $this->session->set_flashdata('msg', 'warning');
				$this->session->set_flashdata('pesan', 'Artikel memiliki resolusi gambar < 20KB. Upload gambar gagal.');
				redirect('Admin/Tulisan');
			} else if ($this->upload->do_upload('filefoto')) {
				$gbr = $this->upload->data();
				//Compress Image
				$config['image_library'] = 'gd2';
				$config['source_image'] = './assets/images/' . $gbr['file_name'];
				$config['create_thumb'] = FALSE;
				$config['maintain_ratio'] = FALSE;
				$config['quality'] = '60%';
				$config['width'] = 710;
				$config['height'] = 320;
				$config['new_image'] = './assets/images/' . $gbr['file_name'];
				$this->load->library('image_lib', $config);
				$this->image_lib->resize();

				$gambar = $gbr['file_name'];
				$judul = strip_tags($this->input->post('xjudul'));
				$filter = str_replace("?", "", $judul);
				$filter2 = str_replace("$", "", $filter);
				$filter3 = str_replace(",", "", $filter2);
				$filter4 = str_replace(".", "", $filter3);
				$slug = strtolower(str_replace(" ", "-", $filter4));
				$isi = $this->input->post('xisi');
				$tanggal = $this->input->post('xtanggal');
				$kategori_id = strip_tags($this->input->post('xkategori'));
				$data = $this->m_kategori->get_kategori_byid($kategori_id);
				$q = $data->row_array();
				$kategori_nama = $q['kategori_nama'];
				$imgslider = $this->input->post('ximgslider');
				$kode = $this->session->userdata('idadmin');
				$user = $this->m_pengguna->get_pengguna_login($kode);
				$p = $user->row_array();
				$user_id = $p['pengguna_id'];
				$user_nama = $p['pengguna_nama'];
				$this->m_tulisan->simpan_tulisan($judul, $isi, $tanggal, $kategori_id, $kategori_nama, $user_id, $user_nama, $gambar, $slug);
				$this->session->set_flashdata('msg', 'success');
				redirect('Admin/Tulisan');
			} else {
				$gambar = "default_err.png";
				$tulisan_id = $this->input->post('kode');
				$judul = strip_tags($this->input->post('xjudul'));
				$filter = str_replace("?", "", $judul);
				$filter2 = str_replace("$", "", $filter);
				$filter3 = str_replace(",", "", $filter2);
				$filter4 = str_replace(".", "", $filter3);
				$slug = strtolower(str_replace(" ", "-", $filter4));
				$isi = $this->input->post('xisi');
				$tanggal = $this->input->post('xtanggal');
				$kategori_id = strip_tags($this->input->post('xkategori'));
				$data = $this->m_kategori->get_kategori_byid($kategori_id);
				$q = $data->row_array();
				$kategori_nama = $q['kategori_nama'];
				$imgslider = $this->input->post('ximgslider');
				$kode = $this->session->userdata('idadmin');
				$user = $this->m_pengguna->get_pengguna_login($kode);
				$p = $user->row_array();
				$user_id = $p['pengguna_id'];
				$user_nama = $p['pengguna_nama'];
				$this->m_tulisan->simpan_tulisan($judul, $isi, $tanggal, $kategori_id, $kategori_nama, $user_id, $user_nama, $gambar, $slug);
				$this->session->set_flashdata('pesan', 'Upload gambar gagal. Mohon update data.');
				echo $this->session->set_flashdata('msg', 'warning');
				redirect('Admin/Tulisan');
			}
		} else {
			$gambar = "default_err.png";
			$tulisan_id = $this->input->post('kode');
			$judul = strip_tags($this->input->post('xjudul'));
			$filter = str_replace("?", "", $judul);
			$filter2 = str_replace("$", "", $filter);
			$filter3 = str_replace(",", "", $filter2);
			$filter4 = str_replace(".", "", $filter3);
			$slug = strtolower(str_replace(" ", "-", $filter4));
			$isi = $this->input->post('xisi');
			$tanggal = $this->input->post('xtanggal');
			$kategori_id = strip_tags($this->input->post('xkategori'));
			$data = $this->m_kategori->get_kategori_byid($kategori_id);
			$q = $data->row_array();
			$kategori_nama = $q['kategori_nama'];
			$imgslider = $this->input->post('ximgslider');
			$kode = $this->session->userdata('idadmin');
			$user = $this->m_pengguna->get_pengguna_login($kode);
			$p = $user->row_array();
			$user_id = $p['pengguna_id'];
			$user_nama = $p['pengguna_nama'];
			$this->m_tulisan->simpan_tulisan($judul, $isi, $tanggal, $kategori_id, $kategori_nama, $user_id, $user_nama, $gambar, $slug);
			$this->session->set_flashdata('pesan', 'Tidak ada gambar yang dipilih. Upload gambar gagal.');
			echo $this->session->set_flashdata('msg', 'warning');
			redirect('Admin/Tulisan');
		}
	}

	function update_tulisan()
	{

		$config['upload_path'] = './assets/images/'; //path folder
		$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
		// $config['encrypt_name'] = TRUE; //nama yang terupload nantinya

		$this->upload->initialize($config);
		if (!empty($_FILES['filefoto']['name'])) {

			if (($_FILES["filefoto"]["size"] < 20000)) {
				$gambar = $this->input->post('gambar');
				$tulisan_id = $this->input->post('kode');
				$judul = strip_tags($this->input->post('xjudul'));
				$filter = str_replace("?", "", $judul);
				$filter2 = str_replace("$", "", $filter);
				$filter3 = str_replace(",", "", $filter2);
				$filter4 = str_replace(".", "", $filter3);
				$slug = strtolower(str_replace(" ", "-", $filter4));
				$isi = $this->input->post('xisi');
				$tanggal = $this->input->post('xtanggal');
				$kategori_id = strip_tags($this->input->post('xkategori'));
				$data = $this->m_kategori->get_kategori_byid($kategori_id);
				$q = $data->row_array();
				$kategori_nama = $q['kategori_nama'];
				$imgslider = $this->input->post('ximgslider');
				$kode = $this->session->userdata('idadmin');
				$user = $this->m_pengguna->get_pengguna_login($kode);
				$p = $user->row_array();
				$user_id = $p['pengguna_id'];
				$user_nama = $p['pengguna_nama'];
				$this->m_tulisan->update_tulisan($tulisan_id, $judul, $isi, $tanggal, $kategori_id, $kategori_nama, $user_id, $user_nama, $gambar, $slug);
				echo $this->session->set_flashdata('msg', 'warning2');
				$this->session->set_flashdata('pesan', 'Artikel memiliki resolusi gambar < 20KB. Update gambar gagal.');
				redirect('Admin/Tulisan');
			} else if ($this->upload->do_upload('filefoto')) {
				$gbr = $this->upload->data();
				//Compress Image
				$config['image_library'] = 'gd2';
				$config['source_image'] = './assets/images/' . $gbr['file_name'];
				$config['create_thumb'] = FALSE;
				$config['maintain_ratio'] = FALSE;
				$config['quality'] = '60%';
				$config['width'] = 710;
				$config['height'] = 320;
				$config['new_image'] = './assets/images/' . $gbr['file_name'];
				$this->load->library('image_lib', $config);
				$this->image_lib->resize();

				$gambar = $gbr['file_name'];
				$tulisan_id = $this->input->post('kode');
				$judul = strip_tags($this->input->post('xjudul'));
				$filter = str_replace("?", "", $judul);
				$filter2 = str_replace("$", "", $filter);
				$filter3 = str_replace(",", "", $filter2);
				$filter4 = str_replace(".", "", $filter3);
				$slug = strtolower(str_replace(" ", "-", $filter4));
				$isi = $this->input->post('xisi');
				$tanggal = $this->input->post('xtanggal');
				$kategori_id = strip_tags($this->input->post('xkategori'));
				$data = $this->m_kategori->get_kategori_byid($kategori_id);
				$q = $data->row_array();
				$kategori_nama = $q['kategori_nama'];
				$imgslider = $this->input->post('ximgslider');
				$kode = $this->session->userdata('idadmin');
				$user = $this->m_pengguna->get_pengguna_login($kode);
				$p = $user->row_array();
				$user_id = $p['pengguna_id'];
				$user_nama = $p['pengguna_nama'];
				$this->m_tulisan->update_tulisan($tulisan_id, $judul, $isi, $tanggal, $kategori_id, $kategori_nama, $user_id, $user_nama, $gambar, $slug);
				echo $this->session->set_flashdata('msg', 'info');
				redirect('Admin/Tulisan');
			} else {
				$gambar = $this->input->post('gambar');
				$tulisan_id = $this->input->post('kode');
				$judul = strip_tags($this->input->post('xjudul'));
				$filter = str_replace("?", "", $judul);
				$filter2 = str_replace("$", "", $filter);
				$filter3 = str_replace(",", "", $filter2);
				$filter4 = str_replace(".", "", $filter3);
				$slug = strtolower(str_replace(" ", "-", $filter4));
				$isi = $this->input->post('xisi');
				$tanggal = $this->input->post('xtanggal');
				$kategori_id = strip_tags($this->input->post('xkategori'));
				$data = $this->m_kategori->get_kategori_byid($kategori_id);
				$q = $data->row_array();
				$kategori_nama = $q['kategori_nama'];
				$imgslider = $this->input->post('ximgslider');
				$kode = $this->session->userdata('idadmin');
				$user = $this->m_pengguna->get_pengguna_login($kode);
				$p = $user->row_array();
				$user_id = $p['pengguna_id'];
				$user_nama = $p['pengguna_nama'];
				$this->m_tulisan->update_tulisan($tulisan_id, $judul, $isi, $tanggal, $kategori_id, $kategori_nama, $user_id, $user_nama, $gambar, $slug);
				echo $this->session->set_flashdata('msg', 'warning2');
				$this->session->set_flashdata('pesan', 'Update gambar gagal. Mohon pilih file lain.');
				redirect('Admin/Tulisan');
			}
		} else {
			$gambar = $this->input->post('gambar');
			$tulisan_id = $this->input->post('kode');
			$judul = strip_tags($this->input->post('xjudul'));
			$filter = str_replace("?", "", $judul);
			$filter2 = str_replace("$", "", $filter);
			$filter3 = str_replace(",", "", $filter2);
			$filter4 = str_replace(".", "", $filter3);
			$slug = strtolower(str_replace(" ", "-", $filter4));
			$isi = $this->input->post('xisi');
			$tanggal = $this->input->post('xtanggal');
			$kategori_id = strip_tags($this->input->post('xkategori'));
			$data = $this->m_kategori->get_kategori_byid($kategori_id);
			$q = $data->row_array();
			$kategori_nama = $q['kategori_nama'];
			$imgslider = $this->input->post('ximgslider');
			$kode = $this->session->userdata('idadmin');
			$user = $this->m_pengguna->get_pengguna_login($kode);
			$p = $user->row_array();
			$user_id = $p['pengguna_id'];
			$user_nama = $p['pengguna_nama'];
			$this->m_tulisan->update_tulisan($tulisan_id, $judul, $isi, $tanggal, $kategori_id, $kategori_nama, $user_id, $user_nama, $gambar, $slug);
			echo $this->session->set_flashdata('msg', 'info');
			redirect('Admin/Tulisan');
		}
	}

	function hapus_tulisan()
	{
		$kode = $this->input->post('kode');
		$gambar = $this->input->post('gambar');
		$path = './assets/images/' . $gambar;
		if($gambar!="default_err.png")
		unlink($path);
		$this->m_tulisan->hapus_tulisan($kode);
		echo $this->session->set_flashdata('msg', 'success-hapus');
		redirect('Admin/Tulisan');
	}
}
