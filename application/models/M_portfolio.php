<?php
class M_portfolio extends CI_Model{

	function get_all_portfolio(){
		$hsl=$this->db->query("SELECT tbl_portfolio.*,DATE_FORMAT(port_tanggal,'%d %M %Y') AS tanggal FROM tbl_portfolio ORDER BY port_id DESC");
		return $hsl;
	} 
	
	function simpan_portfolio($judul,$isi,$user_nama,$gambar){
		$hsl=$this->db->query("INSERT INTO tbl_portfolio (port_judul,port_deskripsi,port_author,port_image) VALUES ('$judul','$isi','$user_nama','$gambar')");
		return $hsl;
	}

	function get_portfolio_by_kode($kode){
		$hsl=$this->db->query("SELECT *,DATE_FORMAT(port_tanggal,'%d %M %Y') AS tanggal FROM tbl_portfolio WHERE port_id='$kode'");
		return $hsl;
	}

	function update_portfolio($port_id,$judul,$isi,$user_nama,$gambar){
		$hsl=$this->db->query("UPDATE tbl_portfolio SET port_judul='$judul',port_deskripsi='$isi',port_author='$user_nama',port_image='$gambar' WHERE port_id='$port_id'");
		return $hsl;
	}

	function update_portfolio_tanpa_img($port_id,$judul,$isi,$user_nama){
		$hsl=$this->db->query("UPDATE tbl_portfolio SET port_judul='$judul',port_deskripsi='$isi',port_author='$user_nama' WHERE port_id='$port_id'");
		return $hsl;
	}

	function hapus_portfolio($kode){
		$hsl=$this->db->query("DELETE FROM tbl_portfolio WHERE port_id='$kode'");
		return $hsl;
	}

	function get_portfolio_by_ket($keterangan){
		$hsl=$this->db->query("SELECT * ,DATE_FORMAT(port_tanggal,'%d %M %Y') AS tanggal FROM tbl_portfolio where keterangan = '$keterangan'");
		return $hsl;
	}


	//Frontend
	function get_portfolio(){
		$hsl=$this->db->query("SELECT tbl_portfolio.*,DATE_FORMAT(port_tanggal,'%d %M %Y') AS tanggal FROM tbl_portfolio where port_id !=9 ORDER BY port_id ASC");
		return $hsl;
	}

	function get_portfolio_tanpa_kepsek(){
		$hsl=$this->db->query("SELECT tbl_portfolio.*,DATE_FORMAT(port_tanggal,'%d %M %Y') AS tanggal FROM tbl_portfolio WHERE port_id !=8 AND port_id !=9 ORDER BY port_id ASC");
		return $hsl;
	}

	function get_portfolio_per_page($offset,$limit){
		$hsl=$this->db->query("SELECT tbl_portfolio.*,DATE_FORMAT(port_tanggal,'%d %M %Y') AS tanggal FROM tbl_portfolio ORDER BY port_id DESC LIMIT $offset,$limit");
		return $hsl;
	}

	function count_views($kode){
        $user_ip=$_SERVER['REMOTE_ADDR'];
        $cek_ip=$this->db->query("SELECT * FROM tbl_post_views WHERE views_ip='$user_ip' AND views_tulisan_id='$kode' AND DATE(views_tanggal)=CURDATE()");
        if($cek_ip->num_rows() <= 0){
            $this->db->trans_start();
				$this->db->query("INSERT INTO tbl_post_views (views_ip,views_tulisan_id) VALUES('$user_ip','$kode')");
				$this->db->query("UPDATE tbl_portfolio SET tulisan_views=tulisan_views+1 WHERE port_id='$kode'");
			$this->db->trans_complete();
			if($this->db->trans_status()==TRUE){
				return TRUE;
			}else{
				return FALSE;
			}
        }
	
        
	}
	
	function get_latest_header(){
		return $this->db->query("SELECT * from tbl_header ORDER BY tanggal DESC LIMIT 1");
	}

	function get_history_header(){
		return $this->db->query("SELECT * from tbl_header where id < (SELECT MAX(id) FROM tbl_header) ORDER BY tanggal DESC LIMIT 6");
	}

	function update_header($gambar, $oleh, $oleh_id){
		$this->db->query("INSERT INTO tbl_header(link,oleh, oleh_id) VALUES('$gambar', '$oleh', '$oleh_id')");
	}

	function getdel_history_header(){
		return $this->db->query("SELECT * from tbl_header ORDER BY tanggal DESC LIMIT 7");
	}
	
	function del_header_by_id($id){
		$this->db->query("DELETE FROM tbl_header WHERE id='$id'");
	}

	
	function get_header_by_id($id){
		return $this->db->query("SELECT * FROM tbl_header WHERE id='$id'");
	}
	function get_author(){
		return $this->db->query("SELECT * FROM tbl_portfolio where port_id!=8 and port_id!=9 Order By port_tanggal DESC limit 1");
	}
	function get_All_Sosmed(){
		return $this->db->query("SELECT * FROM tbl_sosmed");	
	}
	function update_sosmed($link, $id){
		 $this->db->query("UPDATE tbl_sosmed set link ='$link' where id = '$id'");	
	}

	
	function edit_profil($id, $nama, $judul, $deskripsi, $author, $image, $keterangan){
		$hsl=$this->db->query("UPDATE tbl_portfolio set port_nama='$nama', port_judul='$judul', port_deskripsi='$deskripsi', port_author='$author', port_image='$image', keterangan='$keterangan', port_tanggal = CURRENT_TIMESTAMP where port_id='$id'");
		return $hsl;
	}

	function get_views_profil(){
		return $this->db->query("SELECT * FROM tbl_portfolio where port_id=9");	
	

	}

}
