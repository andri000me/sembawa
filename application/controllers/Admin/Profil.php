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

	function profil()
	{
		$y['title'] = 'Admin | Profil';
		$this->m_portfolio->count_views(9);
		$x['portofolio1'] = $this->m_portfolio->get_portfolio_by_kode(8);
		$x['portofolio'] = $this->m_portfolio->get_portfolio_by_kode(9);
		$x['visitor'] = $this->m_pengunjung->statistik_pengujung();
		$x['total'] = $this->m_pengunjung->get_all_pengunjung();
		$x['tautan'] = $this->m_tautan->get_all_tautan();
		$this->load->view('admin/v_header', $y);
		$this->load->view('admin/v_sidebar', ["side" => 12]);
		$this->load->view('admin/v_list_profil', $x);
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
				echo $this->session->set_flashdata('msg','error');
				redirect('Admin/Profil/header');
			}
		} else {
			$this->session->set_flashdata('pesan', 'Tidak ada gambar yang dipilih. Update header gagal.');
			echo $this->session->set_flashdata('msg','error');
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
}