<?php
class M_informasi_publik extends CI_Model {

    function get_all_informasi_publik_by_kat_id($katid){
        return $this->db->query("SELECT *, DATE_FORMAT(publik_tanggal,'%d/%m/%Y') FROM tbl_informasi_publik join tbl_kategori_files on publik_kategori_id=kategori_f_id join tbl_pengguna on publik_pengguna_id=pengguna_id WHERE publik_kategori_id=$katid ORDER BY publik_id DESC");
    }

    function simpan_informasi_publik($judul, $link, $tanggal, $user_id, $user_nama, $gambar, $kategori){
		$hsl=$this->db->query("INSERT into tbl_informasi_publik(publik_judul,publik_link,publik_tanggal,publik_pengguna_id,publik_author,publik_gambar, publik_kategori_id) values ('$judul','$link','$tanggal','$user_id','$user_nama','$gambar','$kategori')");
		return $hsl;
	}
}