<?php 

class M_kinerja extends CI_Model{

    function getPengantar($kode){
        $hsl=$this->db->query("SELECT tbl_pengantar.* FROM tbl_pengantar WHERE tbl_pengantar.programID='$kode' ");
		return $hsl;
    }

    function update_pengantar($kode, $kataPengantar){
        $hsl=$this->db->query(" UPDATE tbl_pengantar SET kataPengantar='$kataPengantar' WHERE tbl_pengantar.programID='$kode' ");
		return $hsl;
    }

    function getFile($idFile){
		$hsl=$this->db->query("SELECT *,DATE_FORMAT(file_tanggal,'%d/%m/%Y') AS tanggal FROM tbl_files join tbl_kategori_files WHERE tbl_files.kategori_file_id='$idFile' AND tbl_kategori_files.kategori_f_id='$idFile' ORDER BY file_id DESC");
		return $hsl;
    }
    
    function simpan_file($judul,$deskripsi,$oleh,$kategori,$file){
		$hsl=$this->db->query("INSERT INTO tbl_files(file_judul,file_deskripsi,file_oleh,kategori_file_id,file_data) VALUES ('$judul','$deskripsi','$oleh','$kategori','$file')");
		return $hsl;
    }
    
    function get_file_byid($id){
		$hsl=$this->db->query("SELECT file_id,file_judul,file_deskripsi,DATE_FORMAT(file_tanggal,'%d/%m/%Y') AS tanggal,file_oleh,file_download,file_data FROM tbl_files WHERE file_id='$id'");
		$this->db->query("UPDATE tbl_files SET file_download=file_download+1 where file_id='$id'");
		return $hsl;
    }

    function update_file($kode,$judul,$deskripsi,$oleh,$kategori,$file){
		$hsl=$this->db->query("UPDATE tbl_files SET file_judul='$judul',file_deskripsi='$deskripsi',file_oleh='$oleh',kategori_file_id='$kategori',file_data='$file' WHERE file_id='$kode'");
		return $hsl;
	}
	function update_file_tanpa_file($kode,$judul,$deskripsi,$oleh,$kategori){
		$hsl=$this->db->query("UPDATE tbl_files SET file_judul='$judul',file_deskripsi='$deskripsi',file_oleh='$oleh',kategori_file_id ='$kategori' WHERE file_id='$kode'");
		return $hsl;
	}
    
    function hapus_file($id){
		$hsl=$this->db->query("DELETE FROM tbl_files WHERE tbl_files.file_id='$id'");
		return $hsl;
	}

    // frontend

    function get_kataPengantar($kode){
        $hsl=$this->db->query("SELECT tbl_pengantar.* FROM tbl_pengantar WHERE tbl_pengantar.programID='$kode' ");
		return $hsl;
    }

}

?>

