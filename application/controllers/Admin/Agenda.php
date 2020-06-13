<?php 

class Agenda extends CI_Controller {
    function __construct()
    {
        parent::__construct();
		if($this->session->userdata('masuk') !=TRUE){
            $url=base_url('Administrator');
            redirect($url);
        };
        $this->load->model('m_agenda');
        $this->load->model('m_pengguna');
    }

    function index(){
        $x['data']=$this->m_agenda->get_all_agenda();
		$y['title'] = 'SMK Negeri PP Sembawa | Agenda';
		$this->load->view('admin/v_header',$y);
		$this->load->view('admin/v_sidebar',["side" => 12]);
		$this->load->view('admin/v_agenda',$x);
    }

    function simpan_agenda(){
        $nama_agenda=$this->input->post('xnama_agenda');
        $deskripsi=$this->input->post('xdeskripsi');
        $mulai=$this->input->post('xmulai');
        $selesai=$this->input->post('xselesai');
        $tempat=$this->input->post('xtempat');
        $waktu=$this->input->post('xwaktu');
        $keterangan=$this->input->post('xketerangan');

        $kode=$this->session->userdata('idadmin');
        $user=$this->m_pengguna->get_pengguna_login($kode);
		$p=$user->row_array();
		$user_id=$p['pengguna_id'];
        $user_nama=$p['pengguna_nama'];
        
        $this->m_agenda->simpan_agenda($nama_agenda,$deskripsi,$mulai,$selesai,$tempat,$waktu,$keterangan,$user_nama);
        echo $this->session->set_flashdata('msg','success');
        redirect('Admin/Agenda');
    }

    function update_agenda(){
        $agenda_id = $this->input->post('kode');
        $nama_agenda=$this->input->post('xnama_agenda');
        $deskripsi=$this->input->post('xdeskripsi');
        $mulai=$this->input->post('xmulai');
        $selesai=$this->input->post('xselesai');
        $tempat=$this->input->post('xtempat');
        $waktu=$this->input->post('xwaktu');
        $keterangan=$this->input->post('xketerangan');

        $kode=$this->session->userdata('idadmin');
        $user=$this->m_pengguna->get_pengguna_login($kode);
		$p=$user->row_array();
		$user_id=$p['pengguna_id'];
        $user_nama=$p['pengguna_nama'];
        
        $this->m_agenda->update_agenda($agenda_id,$nama_agenda,$deskripsi,$mulai,$selesai,$tempat,$waktu,$keterangan,$user_nama);
        echo $this->session->set_flashdata('msg','info');
        redirect('Admin/Agenda');
    }

    function hapus_agenda(){
        $agenda_id = $this->input->post('kode');
        $this->m_agenda->hapus_agenda($agenda_id);
        echo $this->session->set_flashdata('msg','success-hapus');
		redirect('Admin/Agenda');
    }
}

?>