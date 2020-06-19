<?php 

    class Program extends CI_Controller{

        function __construct(){
            parent::__construct();
            if($this->session->userdata('masuk') !=TRUE){
                $url=base_url('Administrator');
                redirect($url);
            };
            $this->load->model('m_program');
            $this->load->library('upload');
            $this->load->helper('download');
        }
        
        function index(){
            $kode = $this->input->get('kode');
            if($kode == 1){
                $file_kategori = 7;
                $x['pengantar'] = $this->m_program->getPengantar($kode);
                $x['file'] = $this->m_program->getFile($file_kategori);
                $x['files'] = $this->m_program->getFile($file_kategori);
                $y['title'] = 'Admin | Renstra';
                $x['boxTitle'] = 'Kata Pengantar Renstra';
                $x['id_kat_file'] = $file_kategori;
                $x['kode'] = $kode;
                $this->load->view('admin/v_header',$y);
                $this->load->view('admin/v_sidebar',["side" => 13]);
                $this->load->view('admin/v_program',$x);
            }
            else if($kode == 2){
                $file_kategori = 8;
                $x['pengantar'] = $this->m_program->getPengantar($kode);
                $x['file'] = $this->m_program->getFile($file_kategori);
                $x['files'] = $this->m_program->getFile($file_kategori);
                $y['title'] = 'Admin | Renja';
                $x['boxTitle'] = 'Kata Pengantar Renja';
                $x['id_kat_file'] = $file_kategori;
                $x['kode'] = $kode;
                $this->load->view('admin/v_header',$y);
                $this->load->view('admin/v_sidebar',["side" => 13]);
                $this->load->view('admin/v_program',$x);
            }
            else if($kode == 3){
                $file_kategori = 6;
                $x['pengantar'] = $this->m_program->getPengantar($kode);
                $x['file'] = $this->m_program->getFile($file_kategori);
                $x['files'] = $this->m_program->getFile($file_kategori);
                $y['title'] = 'Admin | Dipa';
                $x['boxTitle'] = 'Kata Pengantar Dipa';
                $x['id_kat_file'] = $file_kategori;
                $x['kode'] = $kode;
                $this->load->view('admin/v_header',$y);
                $this->load->view('admin/v_sidebar',["side" => 13]);
                $this->load->view('admin/v_program',$x);
            }

        }
        
        function update_pengantar($kode){
            $kataPengantar = $this->input->post('xkataPengantar');
            $this->m_program->update_pengantar($kode, $kataPengantar);
            echo $this->session->set_flashdata('msg','success');
            if($kode == 1){
                redirect('Admin/Program?kode=1');
            }
            else if($kode == 2){
                redirect('Admin/Program?kode=2');
            }
            else if($kode == 3){
                redirect('Admin/Program?kode=3');
            }
        }

        function download()
	    {
            $id = $this->uri->segment(4);
            $kode = $this->uri->segment(5);
            $get_db = $this->m_program->get_file_byid($id);
            $q = $get_db->row_array();
            $file = $q['file_data'];
            $path = './assets/files/' . $file;
            $data =  file_get_contents($path);
            $name = $file;

            force_download($name, $data);
            if($kode == 1){
                redirect('Admin/Program?kode=1');
            }
            else if($kode == 2){
                redirect('Admin/Program?kode=2');
            }
            else if($kode == 3){
                redirect('Admin/Program?kode=3');
            }
	    }

        function simpan_file($kode)
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
    
                    $this->m_program->simpan_file($judul, $deskripsi, $oleh, $kategori, $file);
                    echo $this->session->set_flashdata('msg', 'success');
                    if($kode == 1){
                        redirect('Admin/Program?kode=1');
                    }
                    else if($kode == 2){
                        redirect('Admin/Program?kode=2');
                    }
                    else if($kode == 3){
                        redirect('Admin/Program?kode=3');
                    }
                } else {
                    $file = "null";
                    $judul = strip_tags($this->input->post('xjudul'));
                    $deskripsi = $this->input->post('xdeskripsi');
                    $oleh = strip_tags($this->input->post('xoleh'));
                    $kategori = $this->input->post('xkategori');
                    $this->m_program->simpan_file($judul, $deskripsi, $oleh, $kategori, $file);
                    $this->session->set_flashdata('pesan', ' Upload file gagal. Mohon update file.');
                    echo $this->session->set_flashdata('msg', 'warning');
                    if($kode == 1){
                        redirect('Admin/Program?kode=1');
                    }
                    else if($kode == 2){
                        redirect('Admin/Program?kode=2');
                    }
                    else if($kode == 3){
                        redirect('Admin/Program?kode=3');
                    }
                }
            } else {
                $file = "null";
                $judul = strip_tags($this->input->post('xjudul'));
                $deskripsi = $this->input->post('xdeskripsi');
                $oleh = strip_tags($this->input->post('xoleh'));
                $kategori = $this->input->post('xkategori');
                $this->m_program->simpan_file($judul, $deskripsi, $oleh, $kategori, $file);
                $this->session->set_flashdata('pesan', ' Tidak ada file yang dipilih. Upload file gagal. Mohon update file.');
                echo $this->session->set_flashdata('msg', 'warning');
                if($kode == 1){
                    redirect('Admin/Program?kode=1');
                }
                else if($kode == 2){
                    redirect('Admin/Program?kode=2');
                }
                else if($kode == 3){
                    redirect('Admin/Program?kode=3');
                }
            }
        }

        function update_file($kode)
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
                    $id = $this->input->post('kode');
                    $judul = strip_tags($this->input->post('xjudul'));
                    $deskripsi = $this->input->post('xdeskripsi');
                    $oleh = strip_tags($this->input->post('xoleh'));
                    $kategori = $this->input->post('xkategori');
                    $data = $this->input->post('file');
                    $path = './assets/files/' . $data;
                    if ($data != "null")
                        unlink($path);
                    $this->m_program->update_file($id, $judul, $deskripsi, $oleh, $kategori, $file);
                    echo $this->session->set_flashdata('msg', 'info');
                    if($kode == 1){
                        redirect('Admin/Program?kode=1');
                    }
                    else if($kode == 2){
                        redirect('Admin/Program?kode=2');
                    }
                    else if($kode == 3){
                        redirect('Admin/Program?kode=3');
                    }
                } else {
                    $file = $this->input->post('file');
                    $id = $this->input->post('kode');
                    $judul = strip_tags($this->input->post('xjudul'));
                    $deskripsi = $this->input->post('xdeskripsi');
                    $oleh = strip_tags($this->input->post('xoleh'));
                    $kategori = $this->input->post('xkategori');
                    $this->m_program->update_file($id, $judul, $deskripsi, $oleh, $kategori, $file);
                    echo $this->session->set_flashdata('msg', 'warning2');
                    $this->session->set_flashdata('pesan', 'Upload file gagal.');
                    if($kode == 1){
                        redirect('Admin/Program?kode=1');
                    }
                    else if($kode == 2){
                        redirect('Admin/Program?kode=2');
                    }
                    else if($kode == 3){
                        redirect('Admin/Program?kode=3');
                    }
                }
            } else {
                $file = $this->input->post('file');
                $id = $this->input->post('kode');
                $judul = strip_tags($this->input->post('xjudul'));
                $deskripsi = $this->input->post('xdeskripsi');
                $oleh = strip_tags($this->input->post('xoleh'));
                $kategori = $this->input->post('xkategori');
                $this->m_program->update_file($id, $judul, $deskripsi, $oleh, $kategori, $file);
                echo $this->session->set_flashdata('msg', 'info');
                if($kode == 1){
                    redirect('Admin/Program?kode=1');
                }
                else if($kode == 2){
                    redirect('Admin/Program?kode=2');
                }
                else if($kode == 3){
                    redirect('Admin/Program?kode=3');
                }
            }
        }
    
    
        function hapus_file($kode)
        {
            $id = $this->input->post('kode');
            $data = $this->input->post('file');
            $path = './assets/files/' . $data;
            if ($data != "null")
                unlink($path);
                $this->m_program->hapus_file($id);
                echo $this->session->set_flashdata('msg', 'success-hapus');
            if($kode == 1){
                redirect('Admin/Program?kode=1');
            }
            else if($kode == 2){
                redirect('Admin/Program?kode=2');
            }
            else if($kode == 3){
                redirect('Admin/Program?kode=3');
            }
        }



    }

?>