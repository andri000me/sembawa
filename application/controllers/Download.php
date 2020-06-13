<?php
Class Download extends CI_Controller{
    
    function __construct() {
        parent::__construct();
        $this->load->model('m_tulisan');
    }
    
    function index(){
        $this->load->library('pdf');
        $slug = $this->uri->segment(3);
        $pdf = new FPDF('l','mm','A5');
        // membuat halaman baru
        $pdf->AddPage();
        // setting jenis font yang akan digunakan
        $pdf->SetFont('Arial','B',16);
        // mencetak string 
        $pdf->Cell(190,7,'SEKOLAH MENENGAH KEJURUSAN NEEGRI 2 LANGSA',0,1,'C');
        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(190,7,'DAFTAR SISWA KELAS IX JURUSAN REKAYASA PERANGKAT LUNAK',0,1,'C');
        // Memberikan space kebawah agar tidak terlalu rapat
        $pdf->Cell(190,7,'',0,1);
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(190,7,'NIM',1,0);
      
        $data=$this->m_tulisan->get_berita_by_slug($slug)->row_array();
        $tulisan = $data['tulisan_judul'];

        $pdf->Cell(190,7,$tulisan,1,0);
            
        $pdf->Output();
    }


}