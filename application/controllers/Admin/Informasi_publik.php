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
		$this->load->model('m_files');
		$this->load->model('m_kategori');
		$this->load->model('m_pengguna');
		$this->load->library('upload');
		$this->load->helper('download');
	}


	function index()
	{
        $kode=$this->input->get('kode');
        if($kode == "1"){
            $x['data'] = $this->m_files->get_all_files_by_katid($kode);
            $x['kate'] = $this->m_kategori->get_all_kategori_files_by_id($kode);
            $y['title'] = 'Admin | Files';
            $this->load->view('admin/v_header', $y);
            $this->load->view('admin/v_sidebar', ["side" => 6]);
            $this->load->view('admin/v_informasi_publik_berkala', $x);
        }
        if($kode == "2"){
            $x['data'] = $this->m_files->get_all_files_by_katid($kode);
            $x['kate'] = $this->m_kategori->get_all_kategori_files_by_id($kode);
            $y['title'] = 'Admin | Files';
            $this->load->view('admin/v_header', $y);
            $this->load->view('admin/v_sidebar', ["side" => 6]);
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
}
