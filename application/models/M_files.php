<?php 
class M_files extends CI_Model{

	function get_all_files(){
		$hsl=$this->db->query("SELECT *,DATE_FORMAT(file_tanggal,'%d/%m/%Y') AS tanggal FROM tbl_files join tbl_kategori_files on kategori_file_id=kategori_f_id ORDER BY file_id DESC");
		return $hsl;
	}

	function get_all_files_by_id($id){
		$hsl=$this->db->query("SELECT *,DATE_FORMAT(file_tanggal,'%d/%m/%Y') AS tanggal FROM tbl_files WHERE file_id = $id join tbl_kategori_files on kategori_file_id=kategori_f_id ORDER BY file_id DESC");
		return $hsl;
	}

	function simpan_file($judul,$deskripsi,$oleh,$kategori,$file){
		$hsl=$this->db->query("INSERT INTO tbl_files(file_judul,file_deskripsi,file_oleh,kategori_file_id,file_data) VALUES ('$judul','$deskripsi','$oleh','$kategori','$file')");
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
	function hapus_file($kode){
		$hsl=$this->db->query("DELETE FROM tbl_files WHERE file_id='$kode'");
		return $hsl;
	}

	function get_file_by_name($keyword){
		$hsl=$this->db->query("SELECT *,DATE_FORMAT(file_tanggal,'%d/%m/%Y') AS tanggal FROM tbl_files join tbl_kategori_files on kategori_file_id=kategori_f_id WHERE kategori_f_id = $keyword");
		return $hsl;
	}
	function get_file_byid($id){
		$hsl=$this->db->query("SELECT file_id,file_judul,file_deskripsi,DATE_FORMAT(file_tanggal,'%d/%m/%Y') AS tanggal,file_oleh,file_download,file_data FROM tbl_files WHERE file_id='$id'");
		$this->db->query("UPDATE tbl_files SET file_download=file_download+1 where file_id='$id'");
		return $hsl;
	}

	//Front-end
	function get_files_home(){
		$hsl=$this->db->query("SELECT file_id,file_judul,file_deskripsi,DATE_FORMAT(file_tanggal,'%d/%m/%Y') AS tanggal,file_oleh,file_download,file_data FROM tbl_files ORDER BY file_id DESC limit 7");
		return $hsl;
	}

	function get_all_files_by_kategori($id){
		$hsl = $this->db->query("SELECT * FROM tbl_files WHERE kategori_file_id='$id'");
		return $hsl;
	}
	
}