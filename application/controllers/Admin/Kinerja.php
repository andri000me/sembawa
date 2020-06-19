<?php 

    class Kinerja extends CI_Controller{

        function __construct(){
            parent::__construct();
            if($this->session->userdata('masuk') !=TRUE){
                $url=base_url('Administrator');
                redirect($url);
            };
            $this->load->model('m_kinerja');
            $this->load->library('upload');
            $this->load->helper('download');
        }
        
        function index(){
            $kode = $this->input->get('kode');
            if($kode == 4){
                $file_kategori = 12;
                $x['pengantar'] = $this->m_kinerja->getPengantar($kode);
                $x['file'] = $this->m_kinerja->getFile($file_kategori);
                $x['files'] = $this->m_kinerja->getFile($file_kategori);
                $y['title'] = 'Admin | Laporan Keuangan';
                $x['boxTitle'] = 'Kata Pengantar Laporan Keuangan';
                $x['id_kat_file'] = $file_kategori;
                $x['kode'] = $kode;
                $this->load->view('admin/v_header',$y);
                $this->load->view('admin/v_sidebar',["side" => 14]);
                $this->load->view('admin/v_kinerja',$x);
            }
            else if($kode == 5){
                $file_kategori = 13;
                $x['pengantar'] = $this->m_kinerja->getPengantar($kode);
                $x['file'] = $this->m_kinerja->getFile($file_kategori);
                $x['files'] = $this->m_kinerja->getFile($file_kategori);
                $y['title'] = 'Admin | Lakin';
                $x['boxTitle'] = 'Kata Pengantar Lakin';
                $x['id_kat_file'] = $file_kategori;
                $x['kode'] = $kode;
                $this->load->view('admin/v_header',$y);
                $this->load->view('admin/v_sidebar',["side" => 14]);
                $this->load->view('admin/v_kinerja',$x);
            }
            else if($kode == 6){
                $file_kategori = 14;
                $x['pengantar'] = $this->m_kinerja->getPengantar($kode);
                $x['file'] = $this->m_kinerja->getFile($file_kategori);
                $x['files'] = $this->m_kinerja->getFile($file_kategori);
                $y['title'] = 'Admin | Capaian Kinerja';
                $x['boxTitle'] = 'Kata Pengantar Capaian Kinerja';
                $x['id_kat_file'] = $file_kategori;
                $x['kode'] = $kode;
                $this->load->view('admin/v_header',$y);
                $this->load->view('admin/v_sidebar',["side" => 14]);
                $this->load->view('admin/v_kinerja',$x);
            }
            else if($kode == 7){
                $file_kategori = 15;
                $x['pengantar'] = $this->m_kinerja->getPengantar($kode);
                $x['file'] = $this->m_kinerja->getFile($file_kategori);
                $x['files'] = $this->m_kinerja->getFile($file_kategori);
                $y['title'] = 'Admin | Realisasi Anggaran';
                $x['boxTitle'] = 'Kata Pengantar Realisasi Anggaran';
                $x['id_kat_file'] = $file_kategori;
                $x['kode'] = $kode;
                $this->load->view('admin/v_header',$y);
                $this->load->view('admin/v_sidebar',["side" => 14]);
                $this->load->view('admin/v_kinerja',$x);
            }
            else if($kode == 8){
                $file_kategori = 16;
                $x['pengantar'] = $this->m_kinerja->getPengantar($kode);
                $x['file'] = $this->m_kinerja->getFile($file_kategori);
                $x['files'] = $this->m_kinerja->getFile($file_kategori);
                $y['title'] = 'Admin | Neraca Keuangan';
                $x['boxTitle'] = 'Kata Pengantar Neraca Keuangan';
                $x['id_kat_file'] = $file_kategori;
                $x['kode'] = $kode;
                $this->load->view('admin/v_header',$y);
                $this->load->view('admin/v_sidebar',["side" => 14]);
                $this->load->view('admin/v_kinerja',$x);
            }
            else if($kode == 9){
                $file_kategori = 9;
                $x['pengantar'] = $this->m_kinerja->getPengantar($kode);
                $x['file'] = $this->m_kinerja->getFile($file_kategori);
                $x['files'] = $this->m_kinerja->getFile($file_kategori);
                $y['title'] = 'Admin | Laporan Tahunan';
                $x['boxTitle'] = 'Kata Pengantar Laporan Tahunan';
                $x['id_kat_file'] = $file_kategori;
                $x['kode'] = $kode;
                $this->load->view('admin/v_header',$y);
                $this->load->view('admin/v_sidebar',["side" => 14]);
                $this->load->view('admin/v_kinerja',$x);
            }
            else if($kode == 10){
                $file_kategori = 10;
                $x['pengantar'] = $this->m_kinerja->getPengantar($kode);
                $x['file'] = $this->m_kinerja->getFile($file_kategori);
                $x['files'] = $this->m_kinerja->getFile($file_kategori);
                $y['title'] = 'Admin | Laporan Tahunan PPID';
                $x['boxTitle'] = 'Kata Pengantar Laporan Tahunan PPID';
                $x['id_kat_file'] = $file_kategori;
                $x['kode'] = $kode;
                $this->load->view('admin/v_header',$y);
                $this->load->view('admin/v_sidebar',["side" => 14]);
                $this->load->view('admin/v_kinerja',$x);
            }
            else if($kode == 11){
                $file_kategori = 11;
                $x['pengantar'] = $this->m_kinerja->getPengantar($kode);
                $x['file'] = $this->m_kinerja->getFile($file_kategori);
                $x['files'] = $this->m_kinerja->getFile($file_kategori);
                $y['title'] = 'Admin | Index Kepuasan Masyarakat';
                $x['boxTitle'] = 'Kata Pengantar Index Kepuasan Masyarakat';
                $x['id_kat_file'] = $file_kategori;
                $x['kode'] = $kode;
                $this->load->view('admin/v_header',$y);
                $this->load->view('admin/v_sidebar',["side" => 14]);
                $this->load->view('admin/v_kinerja',$x);
            }

        }
        
        function update_pengantar($kode){
            $kataPengantar = $this->input->post('xkataPengantar');
            $this->m_kinerja->update_pengantar($kode, $kataPengantar);
            echo $this->session->set_flashdata('msg','success');
            if($kode == 4){
                redirect('Admin/Kinerja?kode=4');
            }
            else if($kode == 5){
                redirect('Admin/Kinerja?kode=5');
            }
            else if($kode == 6){
                redirect('Admin/Kinerja?kode=6');
            }
            else if($kode == 7){
                redirect('Admin/Kinerja?kode=7');
            }
            else if($kode == 8){
                redirect('Admin/Kinerja?kode=8');
            }
            else if($kode == 9){
                redirect('Admin/Kinerja?kode=9');
            }
            else if($kode == 10){
                redirect('Admin/Kinerja?kode=10');
            }
            else if($kode == 11){
                redirect('Admin/Kinerja?kode=11');
            }
        }

        function download()
	    {
            $id = $this->uri->segment(4);
            $kode = $this->uri->segment(5);
            $get_db = $this->m_kinerja->get_file_byid($id);
            $q = $get_db->row_array();
            $file = $q['file_data'];
            $path = './assets/files/' . $file;
            $data =  file_get_contents($path);
            $name = $file;

            force_download($name, $data);
            if($kode == 4){
                redirect('Admin/Kinerja?kode=4');
            }
            else if($kode == 5){
                redirect('Admin/Kinerja?kode=5');
            }
            else if($kode == 6){
                redirect('Admin/Kinerja?kode=6');
            }
            else if($kode == 7){
                redirect('Admin/Kinerja?kode=7');
            }
            else if($kode == 8){
                redirect('Admin/Kinerja?kode=8');
            }
            else if($kode == 9){
                redirect('Admin/Kinerja?kode=9');
            }
            else if($kode == 10){
                redirect('Admin/Kinerja?kode=10');
            }
            else if($kode == 11){
                redirect('Admin/Kinerja?kode=11');
            }
	    }

        function simpan_file($kode)
        {  
            $namaFile = $_FILES['filefoto']['name'];
            $info = pathinfo($namaFile);

            if ($info["extension"] == "jpg" || $info["extension"] == "jpeg" || $info["extension"] == "png") {
                $config['upload_path'] 	 = './assets/images/'; //path folder
            }
            else {
                $config['upload_path'] 	 = './assets/files/'; //path folder
            }

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
    
                    $this->m_kinerja->simpan_file($judul, $deskripsi, $oleh, $kategori, $file);
                    echo $this->session->set_flashdata('msg', 'success');
                    if($kode == 4){
                        redirect('Admin/Kinerja?kode=4');
                    }
                    else if($kode == 5){
                        redirect('Admin/Kinerja?kode=5');
                    }
                    else if($kode == 6){
                        redirect('Admin/Kinerja?kode=6');
                    }
                    else if($kode == 7){
                        redirect('Admin/Kinerja?kode=7');
                    }
                    else if($kode == 8){
                        redirect('Admin/Kinerja?kode=8');
                    }
                    else if($kode == 9){
                        redirect('Admin/Kinerja?kode=9');
                    }
                    else if($kode == 10){
                        redirect('Admin/Kinerja?kode=10');
                    }
                    else if($kode == 11){
                        redirect('Admin/Kinerja?kode=11');
                    }
                } else {
                    $file = "null";
                    $judul = strip_tags($this->input->post('xjudul'));
                    $deskripsi = $this->input->post('xdeskripsi');
                    $oleh = strip_tags($this->input->post('xoleh'));
                    $kategori = $this->input->post('xkategori');
                    $this->m_kinerja->simpan_file($judul, $deskripsi, $oleh, $kategori, $file);
                    $this->session->set_flashdata('pesan', ' Upload file gagal. Mohon update file.');
                    echo $this->session->set_flashdata('msg', 'warning');
                    if($kode == 4){
                        redirect('Admin/Kinerja?kode=4');
                    }
                    else if($kode == 5){
                        redirect('Admin/Kinerja?kode=5');
                    }
                    else if($kode == 6){
                        redirect('Admin/Kinerja?kode=6');
                    }
                    else if($kode == 7){
                        redirect('Admin/Kinerja?kode=7');
                    }
                    else if($kode == 8){
                        redirect('Admin/Kinerja?kode=8');
                    }
                    else if($kode == 9){
                        redirect('Admin/Kinerja?kode=9');
                    }
                    else if($kode == 10){
                        redirect('Admin/Kinerja?kode=10');
                    }
                    else if($kode == 11){
                        redirect('Admin/Kinerja?kode=11');
                    }
                }
            } else {
                $file = "null";
                $judul = strip_tags($this->input->post('xjudul'));
                $deskripsi = $this->input->post('xdeskripsi');
                $oleh = strip_tags($this->input->post('xoleh'));
                $kategori = $this->input->post('xkategori');
                $this->m_kinerja->simpan_file($judul, $deskripsi, $oleh, $kategori, $file);
                $this->session->set_flashdata('pesan', ' Tidak ada file yang dipilih. Upload file gagal. Mohon update file.');
                echo $this->session->set_flashdata('msg', 'warning');
                if($kode == 4){
                    redirect('Admin/Kinerja?kode=4');
                }
                else if($kode == 5){
                    redirect('Admin/Kinerja?kode=5');
                }
                else if($kode == 6){
                    redirect('Admin/Kinerja?kode=6');
                }
                else if($kode == 7){
                    redirect('Admin/Kinerja?kode=7');
                }
                else if($kode == 8){
                    redirect('Admin/Kinerja?kode=8');
                }
                else if($kode == 9){
                    redirect('Admin/Kinerja?kode=9');
                }
                else if($kode == 10){
                    redirect('Admin/Kinerja?kode=10');
                }
                else if($kode == 11){
                    redirect('Admin/Kinerja?kode=11');
                }
            }
        }

        function update_file($kode)
        {
            $namaFile = $_FILES['filefoto']['name'];
            $info = pathinfo($namaFile);
            if ($info["extension"] == "jpg" || $info["extension"] == "jpeg" || $info["extension"] == "png") {
                $config['upload_path'] 	 = './assets/images/'; //path folder
            }
            else {
                $config['upload_path'] 	 = './assets/files/'; //path folder
            }
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

                    $namaFile = $_FILES['filefoto']['name'];
                    $info = pathinfo($namaFile);
                    if ($info["extension"] == "jpg" || $info["extension"] == "jpeg" || $info["extension"] == "png") {
                        $path = './assets/images/' . $data;
                    }
                    else {
                        $path = './assets/files/' . $data;
                    }

                    if ($data != "null")
                        unlink($path);
                    $this->m_kinerja->update_file($id, $judul, $deskripsi, $oleh, $kategori, $file);
                    echo $this->session->set_flashdata('msg', 'info');
                    if($kode == 4){
                        redirect('Admin/Kinerja?kode=4');
                    }
                    else if($kode == 5){
                        redirect('Admin/Kinerja?kode=5');
                    }
                    else if($kode == 6){
                        redirect('Admin/Kinerja?kode=6');
                    }
                    else if($kode == 7){
                        redirect('Admin/Kinerja?kode=7');
                    }
                    else if($kode == 8){
                        redirect('Admin/Kinerja?kode=8');
                    }
                    else if($kode == 9){
                        redirect('Admin/Kinerja?kode=9');
                    }
                    else if($kode == 10){
                        redirect('Admin/Kinerja?kode=10');
                    }
                    else if($kode == 11){
                        redirect('Admin/Kinerja?kode=11');
                    }
                } else {
                    $file = $this->input->post('file');
                    $id = $this->input->post('kode');
                    $judul = strip_tags($this->input->post('xjudul'));
                    $deskripsi = $this->input->post('xdeskripsi');
                    $oleh = strip_tags($this->input->post('xoleh'));
                    $kategori = $this->input->post('xkategori');
                    $this->m_kinerja->update_file($id, $judul, $deskripsi, $oleh, $kategori, $file);
                    echo $this->session->set_flashdata('msg', 'warning2');
                    $this->session->set_flashdata('pesan', 'Upload file gagal.');
                    if($kode == 4){
                        redirect('Admin/Kinerja?kode=4');
                    }
                    else if($kode == 5){
                        redirect('Admin/Kinerja?kode=5');
                    }
                    else if($kode == 6){
                        redirect('Admin/Kinerja?kode=6');
                    }
                    else if($kode == 7){
                        redirect('Admin/Kinerja?kode=7');
                    }
                    else if($kode == 8){
                        redirect('Admin/Kinerja?kode=8');
                    }
                    else if($kode == 9){
                        redirect('Admin/Kinerja?kode=9');
                    }
                    else if($kode == 10){
                        redirect('Admin/Kinerja?kode=10');
                    }
                    else if($kode == 11){
                        redirect('Admin/Kinerja?kode=11');
                    }
                }
            } else {
                $file = $this->input->post('file');
                $id = $this->input->post('kode');
                $judul = strip_tags($this->input->post('xjudul'));
                $deskripsi = $this->input->post('xdeskripsi');
                $oleh = strip_tags($this->input->post('xoleh'));
                $kategori = $this->input->post('xkategori');
                $this->m_kinerja->update_file($id, $judul, $deskripsi, $oleh, $kategori, $file);
                echo $this->session->set_flashdata('msg', 'info');
                if($kode == 4){
                    redirect('Admin/Kinerja?kode=4');
                }
                else if($kode == 5){
                    redirect('Admin/Kinerja?kode=5');
                }
                else if($kode == 6){
                    redirect('Admin/Kinerja?kode=6');
                }
                else if($kode == 7){
                    redirect('Admin/Kinerja?kode=7');
                }
                else if($kode == 8){
                    redirect('Admin/Kinerja?kode=8');
                }
                else if($kode == 9){
                    redirect('Admin/Kinerja?kode=9');
                }
                else if($kode == 10){
                    redirect('Admin/Kinerja?kode=10');
                }
                else if($kode == 11){
                    redirect('Admin/Kinerja?kode=11');
                }
            }
        }
    
    
        function hapus_file($kode)
        {
            $id = $this->input->post('kode');
            $data = $this->input->post('file');

            $info = pathinfo($data);
            if ($info["extension"] == "jpg" || $info["extension"] == "jpeg" || $info["extension"] == "png") {
                $path = './assets/images/' . $data;
            }
            else {
                $path = './assets/files/' . $data;
            }

            if ($data != "null")
                unlink($path);
                $this->m_kinerja->hapus_file($id);
                echo $this->session->set_flashdata('msg', 'success-hapus');
                if($kode == 4){
                    redirect('Admin/Kinerja?kode=4');
                }
                else if($kode == 5){
                    redirect('Admin/Kinerja?kode=5');
                }
                else if($kode == 6){
                    redirect('Admin/Kinerja?kode=6');
                }
                else if($kode == 7){
                    redirect('Admin/Kinerja?kode=7');
                }
                else if($kode == 8){
                    redirect('Admin/Kinerja?kode=8');
                }
                else if($kode == 9){
                    redirect('Admin/Kinerja?kode=9');
                }
                else if($kode == 10){
                    redirect('Admin/Kinerja?kode=10');
                }
                else if($kode == 11){
                    redirect('Admin/Kinerja?kode=11');
                }
        }



    }

?>