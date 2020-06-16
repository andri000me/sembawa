<?php
class Files extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('masuk') != TRUE) {
			$url = base_url('Administrator');
			redirect($url);
		};
		$this->load->model('m_files');
		$this->load->model('m_kategori');
		$this->load->model('m_pengguna');
		$this->load->library('upload');
		$this->load->helper('download');
	}


	function index()
	{
		$x['data'] = $this->m_files->get_all_files();
		$x['kate'] = $this->m_kategori->get_all_kategori_files();
		$y['title'] = 'SMK Negeri PP Sembawa | Files';
		$this->load->view('admin/v_header', $y);
		$this->load->view('admin/v_sidebar', ["side" => 6]);
		$this->load->view('admin/v_files', $x);
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
		redirect('Admin/Files');
	}

	function simpan_file()
	{
		$config['upload_path'] 	 = './assets/files/'; //path folder
		$config['allowed_types'] = '*';
		$config['max_size'] = 0; //type yang dapat diakses bisa anda sesuaikan
		// $config['encrypt_name'] = TRUE; //nama yang terupload nantinya

		$this->upload->initialize($config);
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
				redirect('Admin/Files');
			} else {
				$file = "null";
				$judul = strip_tags($this->input->post('xjudul'));
				$deskripsi = $this->input->post('xdeskripsi');
				$oleh = strip_tags($this->input->post('xoleh'));
				$kategori = $this->input->post('xkategori');
				$this->m_files->simpan_file($judul, $deskripsi, $oleh, $kategori, $file);
				$this->session->set_flashdata('pesan', ' Upload file gagal. Mohon update file.');
				echo $this->session->set_flashdata('msg', 'warning');
				redirect('Admin/Files');
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
			redirect('Admin/Files');
		}
	}

	function update_file()
	{

		$config['upload_path'] = './assets/files/'; //path folder
		$config['allowed_types'] = '*';
		$config['max_size'] = 0; 	 	  //type yang dapat diakses bisa anda sesuaikan
		// $config['encrypt_name'] = TRUE; //nama yang terupload nantinya

		$this->upload->initialize($config);
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
				redirect('Admin/Files');
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
				redirect('Admin/Files');
			}
		} else {
			$file = $this->input->post('file');
			$kode = $this->input->post('kode');
			$judul = strip_tags($this->input->post('xjudul'));
			$deskripsi = $this->input->post('xdeskripsi');
			$oleh = strip_tags($this->input->post('xoleh'));
			$kategori = $this->input->post('xkategori');
			$this->m_files->update_file($kode, $judul, $deskripsi, $oleh, $kategori, $file);
			echo $this->session->set_flashdata('msg', 'warning2');
			$this->session->set_flashdata('pesan', 'Tidak ada file yang dipilih. Upload file gagal.');
			redirect('Admin/Files');
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
		redirect('Admin/Files');
	}
}
