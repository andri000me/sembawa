<?php
class Pengumuman extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('masuk') != TRUE) {
			$url = base_url('Administrator');
			redirect($url);
		};
		$this->load->model('m_pengumuman');
		$this->load->library('upload');
	}


	function index()
	{
		$x['data'] = $this->m_pengumuman->get_all_pengumuman();
		$y['title'] = 'Admin | Pengumuman';
		$this->load->view('admin/v_header', $y);
		$this->load->view('admin/v_sidebar', ["side" => 5]);
		$this->load->view('admin/v_pengumuman', $x);
	}

	function simpan_pengumuman()
	{
		$config['upload_path'] = './assets/images/'; //path folder
		$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
		// $config['encrypt_name'] = TRUE; //nama yang terupload nantinya

		$this->upload->initialize($config);
		if (!empty($_FILES['filefoto']['name'])) {

			if (($_FILES["filefoto"]["size"] < 150000)) {

				$gambar = "default_err.png";
				$judul = strip_tags($this->input->post('xjudul'));
				$deskripsi = $this->input->post('xdeskripsi');
				$this->m_pengumuman->simpan_pengumuman($judul, $deskripsi, $gambar);
				$this->session->set_flashdata('pesan', 'Gambar untuk pengumuman (' . $judul . ') Memiliki resolusi < 20Kb. Upload gambar gagal.');
				echo $this->session->set_flashdata('msg', 'warning');
				redirect('Admin/Pengumuman');
			} else if ($this->upload->do_upload('filefoto')) {
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
				$judul = strip_tags($this->input->post('xjudul'));
				$deskripsi = $this->input->post('xdeskripsi');
				$this->m_pengumuman->simpan_pengumuman($judul, $deskripsi, $gambar);
				echo $this->session->set_flashdata('msg', 'success');
				redirect('Admin/Pengumuman');
			} else {
				$gambar = "default_err.png";
				$judul = strip_tags($this->input->post('xjudul'));
				$deskripsi = $this->input->post('xdeskripsi');
				$this->m_pengumuman->simpan_pengumuman($judul, $deskripsi, $gambar);
				$this->session->set_flashdata('pesan', 'Upload gambar gagal. Mohon update data.');
				echo $this->session->set_flashdata('msg', 'warning');
				redirect('Admin/Pengumuman');
			}
		} else {
			$gambar = "default_err.png";
			$judul = strip_tags($this->input->post('xjudul'));
			$deskripsi = $this->input->post('xdeskripsi');
			$this->m_pengumuman->simpan_pengumuman($judul, $deskripsi, $gambar);
			echo $this->session->set_flashdata('msg', 'warning');
			$this->session->set_flashdata('pesan', 'Tidak ada gambar yang dipilih untuk Pengumuman ( ' . $judul . ' ). Upload gambar gagal.');
			redirect('Admin/Pengumuman');
		}
		print_r($this->upload->display_error());
	}

	function update_pengumuman()
	{
		$config['upload_path'] = './assets/images/'; //path folder
		$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
		// $config['encrypt_name'] = TRUE; //nama yang terupload nantinya

		$this->upload->initialize($config);
		if (!empty($_FILES['filefoto']['name'])) {

			if (($_FILES["filefoto"]["size"] < 150000)) {
				$images = $this->input->post('gambar');
				// $path='./assets/images/'.$images;
				// if($path!='./assets/images/default_err.png')
				// unlink($path);

				$gambar = $images;
				$kode = strip_tags($this->input->post('kode'));
				$judul = strip_tags($this->input->post('xjudul'));
				$deskripsi = $this->input->post('xdeskripsi');
				$this->m_pengumuman->update_pengumuman($kode, $judul, $deskripsi, $gambar);
				echo $this->session->set_flashdata('msg', 'warning2');

				$this->session->set_flashdata('pesan', 'Gambar untuk pengumuman (' . $judul . ') Memiliki resolusi < 20Kb. Update gambar gagal.');
				redirect('Admin/Pengumuman');
			} else if ($this->upload->do_upload('filefoto')) {
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

				$images = $this->input->post('gambar');
				$path = './assets/images/' . $images;
				if ($path != './assets/images/default_err.png')
					unlink($path);

				$gambar = $gbr['file_name'];
				$kode = strip_tags($this->input->post('kode'));
				$judul = strip_tags($this->input->post('xjudul'));
				$deskripsi = $this->input->post('xdeskripsi');
				$this->m_pengumuman->update_pengumuman($kode, $judul, $deskripsi, $gambar);
				echo $this->session->set_flashdata('msg', 'info');
				redirect('Admin/Pengumuman');
			} else {
				$images = $this->input->post('gambar');
				// $path='./assets/images/'.$images;
				// if($path!='./assets/images/default_err.png')
				// unlink($path);

				$gambar = $images;
				$kode = strip_tags($this->input->post('kode'));
				$judul = strip_tags($this->input->post('xjudul'));
				$deskripsi = $this->input->post('xdeskripsi');
				$this->m_pengumuman->update_pengumuman($kode, $judul, $deskripsi, $gambar);
				$this->session->set_flashdata('pesan', 'Update gambar gagal. Mohon pilih file lain.');
				echo $this->session->set_flashdata('msg', 'warning2');
				redirect('Admin/Pengumuman');
			}
		} else {
			$images = $this->input->post('gambar');
			$gambar = $images;
			$kode = strip_tags($this->input->post('kode'));
			$judul = strip_tags($this->input->post('xjudul'));
			$deskripsi = $this->input->post('xdeskripsi');
			$this->m_pengumuman->update_pengumuman($kode, $judul, $deskripsi, $gambar);
			echo $this->session->set_flashdata('msg', 'info');
			redirect('Admin/Pengumuman');
		}
		print_r($this->upload->display_error());
	}
	function hapus_pengumuman()
	{
		$kode = strip_tags($this->input->post('kode'));
		$images = strip_tags($this->input->post('gambar'));
		$path = './assets/images/' . $images;
		if ($path != './assets/images/default_err.png')
			unlink($path);
		$this->m_pengumuman->hapus_pengumuman($kode);
		echo $this->session->set_flashdata('msg', 'success-hapus');
		redirect('Admin/Pengumuman');
	}
}
