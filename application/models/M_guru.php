<?php
class M_guru extends CI_Model{

	function get_all_guru(){
		$hsl=$this->db->query("SELECT * FROM tbl_guru");
		return $hsl;
	}

	function simpan_guru($nip,$nama,$jenkel,$tmp_lahir,$tgl_lahir,$jenis_gtk,$mapel,$photo){
		$hsl=$this->db->query("INSERT INTO tbl_guru (nik,guru_nama,guru_kelamin,guru_tempat,guru_tanggal,guru_jenis,guru_mapel,guru_gambar) VALUES ('$nip','$nama','$jenkel','$tmp_lahir','$tgl_lahir','$jenis_gtk','$mapel','$photo')");
		return $hsl;
	}
	function simpan_guru_tanpa_img($nip,$nama,$jenkel,$tmp_lahir,$tgl_lahir,$jenis_gtk,$mapel){
		$hsl=$this->db->query("INSERT INTO tbl_guru (nik,guru_nama,guru_kelamin,guru_tempat,guru_tanggal,guru_jenis,guru_mapel) VALUES ('$nip','$nama','$jenkel','$tmp_lahir','$tgl_lahir','$jenis_gtk','$mapel')");
		return $hsl;
	}

	function update_guru($kode,$nip,$nama,$jenkel,$tmp_lahir,$tgl_lahir,$jenis_gtk,$mapel,$photo){
		$hsl=$this->db->query("UPDATE tbl_guru SET nik='$nip',guru_nama='$nama',guru_kelamin='$jenkel',guru_tempat='$tmp_lahir',guru_tanggal='$tgl_lahir',guru_jenis='$jenis_gtk',guru_mapel='$mapel',guru_gambar='$photo' WHERE guru_id='$kode'");
		return $hsl;
	}
	function update_guru_tanpa_img($kode,$nip,$nama,$jenkel,$tmp_lahir,$tgl_lahir,$jenis_gtk,$mapel){
		$hsl=$this->db->query("UPDATE tbl_guru SET nik='$nip',guru_nama='$nama',guru_kelamin='$jenkel',guru_tempat='$tmp_lahir',guru_tanggal='$tgl_lahir',guru_jenis='$jenis_gtk',guru_mapel='$mapel' WHERE guru_id='$kode'");
		return $hsl;
	}
	function hapus_guru($kode){
		$hsl=$this->db->query("DELETE FROM tbl_guru WHERE guru_id='$kode'");
		return $hsl;
	}

	//front-end
	function guru(){
		$hsl=$this->db->query("SELECT * FROM tbl_guru");
		return $hsl;
	}
	function guru_perpage($offset,$limit){
		$hsl=$this->db->query("SELECT * FROM tbl_guru limit $offset,$limit");
		return $hsl;
	}
}
?>
