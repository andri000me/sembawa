<?php
class Informasi_publik extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('masuk') != TRUE) {
			$url = base_url('Administrator');
			redirect($url);
		};
		$this->load->model('m_kategori');
		$this->load->model('m_informasi_publik');
		$this->load->model('m_pengguna');
		$this->load->library('upload');
		$this->load->model('m_files');
		$this->load->model('m_informasi_publik');
		$this->load->helper('download');
	}


	function index()
	{
        $kode=$this->input->get('kode');
        if($kode == "1"){
            $x['data'] = $this->m_files->get_all_files_by_katid($kode);
            $x['kate'] = $this->m_kategori->get_all_kategori_files_by_id($kode);
            $y['title'] = 'Admin | Informasi Publik';
            $this->load->view('admin/v_header', $y);
            $this->load->view('admin/v_sidebar', ["side" => 14]);
            $this->load->view('admin/v_informasi_publik_berkala', $x);
        }
        if($kode == "2"){
            $x['data'] = $this->m_files->get_all_files_by_katid($kode);
            $x['kate'] = $this->m_kategori->get_all_kategori_files_by_id($kode);
            $y['title'] = 'Admin | Informasi Publik';
            $this->load->view('admin/v_header', $y);
            $this->load->view('admin/v_sidebar', ["side" => 14]);
            $this->load->view('admin/v_informasi_publik_setiap_saat', $x);
        }
	}

    function download()
	{
		$id = $this->uri->segment(4);
		$get_db = $this->m_files->get_file_byid($id);
		$q = $get_db->row_array();
		$file = $q['file_data'];
		$path = './assets/files/' . $file;
		$data =  file_get_contents($path);
		$name = $file;

		force_download($name, $data);
		redirect('Admin/Informasi_publik');
    }
    
    function simpan_file()
	{
		$config['upload_path'] 	 = './assets/files/'; //path folder
		$config['allowed_types'] = '*';
		$config['max_size'] = 0; //type yang dapat diakses bisa anda sesuaikan
		// $config['encrypt_name'] = TRUE; //nama yang terupload nantinya

		$this->upload->initialize($config);

		$kode=$this->input->get('kode');
        if($kode == "1"){
			if (!empty($_FILES['filefoto']['name'])) {
				if ($this->upload->do_upload('filefoto')) {
					$gbr = $this->upload->data();
					$file = $gbr['file_name'];
					$judul = strip_tags($this->input->post('xjudul'));
					$deskripsi = $this->input->post('xdeskripsi');
					$oleh = strip_tags($this->input->post('xoleh'));
					$kategori = $this->input->post('xkategori');

					$this->m_files->simpan_file($judul, $deskripsi, $oleh, $kategori, $file);
					echo $this->session->set_flashdata('msg', 'success');
					redirect('Admin/Informasi_publik?kode=1');
				} else {
					$file = "null";
					$judul = strip_tags($this->input->post('xjudul'));
					$deskripsi = $this->input->post('xdeskripsi');
					$oleh = strip_tags($this->input->post('xoleh'));
					$kategori = $this->input->post('xkategori');
					$this->m_files->simpan_file($judul, $deskripsi, $oleh, $kategori, $file);
					$this->session->set_flashdata('pesan', ' Upload file gagal. Mohon update file.');
					echo $this->session->set_flashdata('msg', 'warning');
					redirect('Admin/Informasi_publik?kode=1');
				}
			} else {
				$file = "null";
				$judul = strip_tags($this->input->post('xjudul'));
				$deskripsi = $this->input->post('xdeskripsi');
				$oleh = strip_tags($this->input->post('xoleh'));
				$kategori = $this->input->post('xkategori');
				$this->m_files->simpan_file($judul, $deskripsi, $oleh, $kategori, $file);
				$this->session->set_flashdata('pesan', ' Tidak ada file yang dipilih. Upload file gagal. Mohon update file.');
				echo $this->session->set_flashdata('msg', 'warning');
				redirect('Admin/Informasi_publik?kode=1');
			}
		}
        if($kode == "2"){
			if (!empty($_FILES['filefoto']['name'])) {
				if ($this->upload->do_upload('filefoto')) {
					$gbr = $this->upload->data();
					$file = $gbr['file_name'];
					$judul = strip_tags($this->input->post('xjudul'));
					$deskripsi = $this->input->post('xdeskripsi');
					$oleh = strip_tags($this->input->post('xoleh'));
					$kategori = $this->input->post('xkategori');
					$this->m_files->simpan_file($judul, $deskripsi, $oleh, $kategori, $file);
					echo $this->session->set_flashdata('msg', 'success');
					redirect('Admin/Informasi_publik?kode=2');
				} else {
					$file = "null";
					$judul = strip_tags($this->input->post('xjudul'));
					$deskripsi = $this->input->post('xdeskripsi');
					$oleh = strip_tags($this->input->post('xoleh'));
					$kategori = $this->input->post('xkategori');
					$this->m_files->simpan_file($judul, $deskripsi, $oleh, $kategori, $file);
					$this->session->set_flashdata('pesan', ' Upload file gagal. Mohon update file.');
					echo $this->session->set_flashdata('msg', 'warning');
					redirect('Admin/Informasi_publik?kode=2');
				}
			} else {
				$file = "null";
				$judul = strip_tags($this->input->post('xjudul'));
				$deskripsi = $this->input->post('xdeskripsi');
				$oleh = strip_tags($this->input->post('xoleh'));
				$kategori = $this->input->post('xkategori');
				$this->m_files->simpan_file($judul, $deskripsi, $oleh, $kategori, $file);
				$this->session->set_flashdata('pesan', ' Tidak ada file yang dipilih. Upload file gagal. Mohon update file.');
				echo $this->session->set_flashdata('msg', 'warning');
				redirect('Admin/Informasi_publik?kode=2');
			}
		}
    }
    
    function update_file()
	{

		$config['upload_path'] = './assets/files/'; //path folder
		$config['allowed_types'] = '*';
		$config['max_size'] = 0; 	 	  //type yang dapat diakses bisa anda sesuaikan
		// $config['encrypt_name'] = TRUE; //nama yang terupload nantinya

		$this->upload->initialize($config);
		$kode=$this->input->get('kode');
        if($kode == "1"){
			if (!empty($_FILES['filefoto']['name'])) {
				if ($this->upload->do_upload('filefoto')) {
					$gbr = $this->upload->data();
					$file = $gbr['file_name'];
					$kode = $this->input->post('kode');
					$judul = strip_tags($this->input->post('xjudul'));
					$deskripsi = $this->input->post('xdeskripsi');
					$oleh = strip_tags($this->input->post('xoleh'));
					$kategori = $this->input->post('xkategori');
					$data = $this->input->post('file');
					$path = './assets/files/' . $data;
					if ($data != "null")
						unlink($path);
					$this->m_files->update_file($kode, $judul, $deskripsi, $oleh, $kategori, $file);
					echo $this->session->set_flashdata('msg', 'info');
					redirect('Admin/Informasi_publik?kode=1');
				} else {
					$file = $this->input->post('file');
					$kode = $this->input->post('kode');
					$judul = strip_tags($this->input->post('xjudul'));
					$deskripsi = $this->input->post('xdeskripsi');
					$oleh = strip_tags($this->input->post('xoleh'));
					$kategori = $this->input->post('xkategori');
					$this->m_files->update_file($kode, $judul, $deskripsi, $oleh, $kategori, $file);
					echo $this->session->set_flashdata('msg', 'warning2');
					$this->session->set_flashdata('pesan', 'Upload file gagal.');
					redirect('Admin/Informasi_publik?kode=1');
				}
			} else {
				$file = $this->input->post('file');
				$kode = $this->input->post('kode');
				$judul = strip_tags($this->input->post('xjudul'));
				$deskripsi = $this->input->post('xdeskripsi');
				$oleh = strip_tags($this->input->post('xoleh'));
				$kategori = $this->input->post('xkategori');
				$this->m_files->update_file($kode, $judul, $deskripsi, $oleh, $kategori, $file);
				echo $this->session->set_flashdata('msg', 'info');
				redirect('Admin/Informasi_publik?kode=1');
			}
		}
        if($kode == "2"){
			if (!empty($_FILES['filefoto']['name'])) {
				if ($this->upload->do_upload('filefoto')) {
					$gbr = $this->upload->data();
					$file = $gbr['file_name'];
					$kode = $this->input->post('kode');
					$judul = strip_tags($this->input->post('xjudul'));
					$deskripsi = $this->input->post('xdeskripsi');
					$oleh = strip_tags($this->input->post('xoleh'));
					$kategori = $this->input->post('xkategori');
					$data = $this->input->post('file');
					$path = './assets/files/' . $data;
					if ($data != "null")
						unlink($path);
					$this->m_files->update_file($kode, $judul, $deskripsi, $oleh, $kategori, $file);
					echo $this->session->set_flashdata('msg', 'info');
					redirect('Admin/Informasi_publik?kode=2');
				} else {
					$file = $this->input->post('file');
					$kode = $this->input->post('kode');
					$judul = strip_tags($this->input->post('xjudul'));
					$deskripsi = $this->input->post('xdeskripsi');
					$oleh = strip_tags($this->input->post('xoleh'));
					$kategori = $this->input->post('xkategori');
					$this->m_files->update_file($kode, $judul, $deskripsi, $oleh, $kategori, $file);
					echo $this->session->set_flashdata('msg', 'warning2');
					$this->session->set_flashdata('pesan', 'Upload file gagal.');
					redirect('Admin/Informasi_publik?kode=2');
				}
			} else {
				$file = $this->input->post('file');
				$kode = $this->input->post('kode');
				$judul = strip_tags($this->input->post('xjudul'));
				$deskripsi = $this->input->post('xdeskripsi');
				$oleh = strip_tags($this->input->post('xoleh'));
				$kategori = $this->input->post('xkategori');
				$this->m_files->update_file($kode, $judul, $deskripsi, $oleh, $kategori, $file);
				echo $this->session->set_flashdata('msg', 'info');
				redirect('Admin/Informasi_publik?kode=2');
			}		
		}

	}

	function hapus_file()
	{
		$kode = $this->input->post('kode');
		$data = $this->input->post('file');
		$path = './assets/files/' . $data;
		if ($data != "null")
			unlink($path);
		$this->m_files->hapus_file($kode);
		echo $this->session->set_flashdata('msg', 'success-hapus');
		$kode=$this->input->get('kode');
        if($kode == "1"){
			redirect('Admin/Informasi_publik?kode=1');
		}
        if($kode == "2"){
			redirect('Admin/Informasi_publik?kode=2');
		}
	}

		
	function setiap_saat()
	{
		$x['data'] = $this->m_informasi_publik->get_all_informasi_publik_by_kat_id(17);
		$x['kat'] = $this->m_kategori->get_all_kategori_files_by_id(17);
		$y['title'] = 'Admin | Informasi Publik';
		$this->load->view('admin/v_header', $y);
		$this->load->view('admin/v_sidebar', ["side" => 14]);
		$this->load->view('admin/v_setiap_saat', $x);
	}

	function add_informasi_publik()
	{ 
		$x['kat'] = $this->m_kategori->get_all_kategori_files_by_id(17);
		$y['title'] = 'Admin | Tambah Informasi Publik';
		$this->load->view('admin/v_header', $y);
		$this->load->view('admin/v_sidebar', ["side" => 14]);
		$this->load->view('admin/v_add_informasi_publik', $x);
	}
	function get_edit()
	{
		$id_publik = $this->uri->segment(4);
		$x['data'] = $this->m_informasi_publik->get_informasi_publik_by_id($id_publik);
		$x['kat'] = $this->m_kategori->get_all_kategori_files_by_id(17);
		$y['title'] = 'Admin | Edit Informasi Publik';
		$this->load->view('admin/v_header', $y);
		$this->load->view('admin/v_sidebar', ["side" => 14]);
		$this->load->view('admin/v_edit_setiap_saat', $x);

	}

	function simpan_informasi_publik()
	{
		$config['upload_path'] = './assets/images/'; //path folder
		$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
		// $config['encrypt_name'] = TRUE; //nama yang terupload nantinya

		$this->upload->initialize($config);
		if (!empty($_FILES['filefoto']['name'])) {
			if (($_FILES["filefoto"]["size"] < 150000)) {
				$gambar = "default_err.png";
				$judul = strip_tags($this->input->post('xjudul'));
				$link = $this->input->post('xlink');
				$tanggal = $this->input->post('xtanggal');
				$kategori = $this->input->post('xkategori');
				$kode = $this->session->userdata('idadmin');
				$user = $this->m_pengguna->get_pengguna_login($kode);
				$p = $user->row_array();
				$user_id = $p['pengguna_id'];
				$user_nama = $p['pengguna_nama'];
				$this->m_informasi_publik->simpan_informasi_publik($judul, $link, $tanggal, $user_id, $user_nama, $gambar, $kategori);
				$this->session->set_flashdata('pesan', 'Gambar yang dipilih memiliki resolusi < 20KB. Upload gambar gagal.');
				echo $this->session->set_flashdata('msg', 'warning');
				redirect('Admin/Informasi_publik/setiap_saat');
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
				$link = $this->input->post('xlink');
				$tanggal = $this->input->post('xtanggal');
				$kategori = $this->input->post('xkategori');
				$kode = $this->session->userdata('idadmin');
				$user = $this->m_pengguna->get_pengguna_login($kode);
				$p = $user->row_array();
				$user_id = $p['pengguna_id'];
				$user_nama = $p['pengguna_nama'];
				$this->m_informasi_publik->simpan_informasi_publik($judul, $link, $tanggal, $user_id, $user_nama, $gambar, $kategori);
				$this->session->set_flashdata('pesan', 'Gambar yang dipilih memiliki resolusi < 20KB. Upload gambar gagal.');
				echo $this->session->set_flashdata('msg', 'success');
				redirect('Admin/Informasi_publik/setiap_saat');
			} else {
				$gambar = "default_err.png";
				$judul = strip_tags($this->input->post('xjudul'));
				$link = $this->input->post('xlink');
				$tanggal = $this->input->post('xtanggal');
				$kategori = $this->input->post('xkategori');
				$kode = $this->session->userdata('idadmin');
				$user = $this->m_pengguna->get_pengguna_login($kode);
				$p = $user->row_array();
				$user_id = $p['pengguna_id'];
				$user_nama = $p['pengguna_nama'];
				$this->m_informasi_publik->simpan_informasi_publik($judul, $link, $tanggal, $user_id, $user_nama, $gambar, $kategori);
				$this->session->set_flashdata('pesan', 'Gambar yang dipilih memiliki resolusi < 20KB. Upload gambar gagal.');
				$this->session->set_flashdata('pesan', 'Upload gambar gagal. Mohon update data.');
				echo $this->session->set_flashdata('msg', 'warning');
				redirect('Admin/Informasi_publik/setiap_saat');
			}
		} else {
			$gambar = "default_err.png";
			$judul = strip_tags($this->input->post('xjudul'));
			$link = $this->input->post('xlink');
			$tanggal = $this->input->post('xtanggal');
			$kategori = $this->input->post('xkategori');
			$kode = $this->session->userdata('idadmin');
			$user = $this->m_pengguna->get_pengguna_login($kode);
			$p = $user->row_array();
			$user_id = $p['pengguna_id'];
			$user_nama = $p['pengguna_nama'];
			$this->m_informasi_publik->simpan_informasi_publik($judul, $link, $tanggal, $user_id, $user_nama, $gambar, $kategori);
			$this->session->set_flashdata('pesan', 'Gambar yang dipilih memiliki resolusi < 20KB. Upload gambar gagal.');
			$this->session->set_flashdata('pesan', 'Tidak ada gambar yang dipilih. Upload gambar gagal.');
			echo $this->session->set_flashdata('msg', 'warning');
			redirect('Admin/Informasi_publik/setiap_saat');
		}
	}

	function update_informasi_publik()
	{

		$config['upload_path'] = './assets/images/'; //path folder
		$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
		// $config['encrypt_name'] = TRUE; //nama yang terupload nantinya

		$this->upload->initialize($config);
		if (!empty($_FILES['filefoto']['name'])) {

			if (($_FILES["filefoto"]["size"] < 150000)) {
				$gambar = $this->input->post('gambar');
				// $path = './assets/images/' . $images;
				// if ($path != './assets/images/default_err.png')
				// 	unlink($path);

				$publik_id = $this->input->post('kode');
				$judul = strip_tags($this->input->post('xjudul'));
				$link = $this->input->post('xlink');
				$tanggal = $this->input->post('xtanggal');
				$kategori = $this->input->post('xkategori');
				$kode = $this->session->userdata('idadmin');
				$user = $this->m_pengguna->get_pengguna_login($kode);
				$p = $user->row_array();
				$user_id = $p['pengguna_id'];
				$user_nama = $p['pengguna_nama'];
				$this->m_informasi_publik->update_informasi_publik($publik_id, $judul, $link, $tanggal, $user_id, $user_nama, $gambar, $kategori);
				echo $this->session->set_flashdata('msg', 'warning2');
				$this->session->set_flashdata('pesan', 'Tautan memiliki Resolusi Gambar < 20KB. Update gambar gagal.');
				redirect('Admin/Informasi_publik/setiap_saat');
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
				$images = $this->input->post('gambar');
				$path = './assets/images/' . $images;
				if ($path != './assets/images/default_err.png')
					unlink($path);

				$gambar = $gbr['file_name'];
				$publik_id = $this->input->post('kode');
				$judul = strip_tags($this->input->post('xjudul'));
				$link = $this->input->post('xlink');
				$tanggal = $this->input->post('xtanggal');
				$kategori = $this->input->post('xkategori');
				$kode = $this->session->userdata('idadmin');
				$user = $this->m_pengguna->get_pengguna_login($kode);
				$p = $user->row_array();
				$user_id = $p['pengguna_id'];
				$user_nama = $p['pengguna_nama'];
				$this->m_informasi_publik->update_informasi_publik($publik_id, $judul, $link, $tanggal, $user_id, $user_nama, $gambar, $kategori);
				echo $this->session->set_flashdata('msg', 'info');
				redirect('Admin/Informasi_publik/setiap_saat');
			} else {
				$gambar = $this->input->post('gambar');
				// $path = './assets/images/' . $images;
				// if ($path != './assets/images/default_err.png')
				// 	unlink($path);

				$publik_id = $this->input->post('kode');
				$judul = strip_tags($this->input->post('xjudul'));
				$link = $this->input->post('xlink');
				$tanggal = $this->input->post('xtanggal');
				$kategori = $this->input->post('xkategori');
				$kode = $this->session->userdata('idadmin');
				$user = $this->m_pengguna->get_pengguna_login($kode);
				$p = $user->row_array();
				$user_id = $p['pengguna_id'];
				$user_nama = $p['pengguna_nama'];
				$this->m_informasi_publik->update_informasi_publik($publik_id, $judul, $link, $tanggal, $user_id, $user_nama, $gambar, $kategori);
				$this->session->set_flashdata('pesan', 'Upload gambar gagal. Mohon pilih file lain.');
				echo $this->session->set_flashdata('msg', 'warning2');
				redirect('Admin/Informasi_publik/setiap_saat');
			}
		} else {
			$gambar = $this->input->post('gambar');
			// $path = './assets/images/' . $images;
			// if ($path != './assets/images/default_err.png')
			// 	unlink($path);

			$publik_id = $this->input->post('kode');
			$judul = strip_tags($this->input->post('xjudul'));
			$link = $this->input->post('xlink');
			$tanggal = $this->input->post('xtanggal');
			$kategori = $this->input->post('xkategori');
			$kode = $this->session->userdata('idadmin');
			$user = $this->m_pengguna->get_pengguna_login($kode);
			$p = $user->row_array();
			$user_id = $p['pengguna_id'];
			$user_nama = $p['pengguna_nama'];
			$this->m_informasi_publik->update_informasi_publik($publik_id, $judul, $link, $tanggal, $user_id, $user_nama, $gambar, $kategori);
			echo $this->session->set_flashdata('msg', 'info');
			redirect('Admin/Informasi_publik/setiap_saat');
		}
	}

	function hapus_informasi_publik()
	{
		$id = $this->input->post('id');
		$gambar = $this->input->post('gambar');
		$path = './assets/images/' . $gambar;
		unlink($path);
		$this->m_informasi_publik->hapus_informasi_publik($id);
		echo $this->session->set_flashdata('msg', 'success-hapus');
		redirect('Admin/Informasi_publik/setiap_saat');
	}
}
