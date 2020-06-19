<?php
class M_tautan extends CI_Model{

	function get_all_tautan(){ 
		$hsl=$this->db->query("SELECT tbl_tautan.*,DATE_FORMAT(tulisan_tanggal,'%d/%m/%Y') AS tanggal FROM tbl_tautan ORDER BY tulisan_tanggal DESC, tulisan_id DESC");
		return $hsl;
	}
	function simpan_tulisan($judul,$link,$tanggal,$user_id,$user_nama,$gambar,$slug){
		$hsl=$this->db->query("INSERT into tbl_tautan(tulisan_judul,tulisan_link,tulisan_tanggal,tulisan_pengguna_id,tulisan_author,tulisan_gambar,tulisan_slug) values ('$judul','$link','$tanggal','$user_id','$user_nama','$gambar','$slug')");
		return $hsl;
	}
	function get_tulisan_by_kode($kode){
		$hsl=$this->db->query("SELECT tbl_tautan.*,DATE_FORMAT(tulisan_tanggal,'%d/%m/%Y') AS tanggal FROM tbl_tautan where tulisan_id='$kode'");
		return $hsl;
	}
	function update_tulisan($tulisan_id,$judul,$link,$tanggal,$user_id,$user_nama,$gambar,$slug){
		$hsl=$this->db->query("UPDATE tbl_tautan set tulisan_judul='$judul',tulisan_link='$link',tulisan_tanggal='$tanggal',tulisan_pengguna_id='$user_id',tulisan_author='$user_nama',tulisan_gambar='$gambar',tulisan_slug='$slug' where tulisan_id='$tulisan_id'");
		return $hsl;
	}
	function update_tulisan_tanpa_img($tulisan_id,$judul,$link,$tanggal,$user_id,$user_nama,$slug){
		$hsl=$this->db->query("UPDATE tbl_tautan set tulisan_judul='$judul',tulisan_link='$link',tulisan_tanggal='$tanggal',tulisan_pengguna_id='$user_id',tulisan_author='$user_nama',tulisan_slug='$slug' where tulisan_id='$tulisan_id'");
		return $hsl;
	}
	function hapus_tulisan($kode){
		$hsl=$this->db->query("DELETE from tbl_tautan where tulisan_id='$kode'");
		return $hsl;
	}



	//Front-End

	function get_post_home(){
		$hsl=$this->db->query("SELECT tbl_tautan.*,DATE_FORMAT(tulisan_tanggal,'%d %M %Y') AS tanggal FROM tbl_tautan ORDER BY tulisan_id DESC limit 4");
		return $hsl;
	}

	function get_kategori_jadwal(){
		$hsl=$this->db->query("SELECT tbl_tautan.*,DATE_FORMAT(tulisan_tanggal,'%d %M %Y') AS tanggal FROM tbl_tautan WHER = 'Jadwal' ORDER BY tulisan_id DESC limit 3");
		return $hsl;
	}

	function get_kategori_kampusku(){
		$hsl=$this->db->query("SELECT tbl_tautan.*,DATE_FORMAT(tulisan_tanggal,'%d %M %Y') AS tanggal FROM tbl_tautan WHER = 'Kampusku' ORDER BY tulisan_id DESC limit 3");
		return $hsl;
	}
	function get_kategori_kegiatanminggu(){
		$hsl=$this->db->query("SELECT tbl_tautan.*,DATE_FORMAT(tulisan_tanggal,'%d %M %Y') AS tanggal FROM tbl_tautan WHER = 'Kegiatan_Mingguan' ORDER BY tulisan_id DESC limit 3");
		return $hsl;
	}
	function get_kategori_kerjasama(){
		$hsl=$this->db->query("SELECT tbl_tautan.*,DATE_FORMAT(tulisan_tanggal,'%d %M %Y') AS tanggal FROM tbl_tautan WHER = 'Kerja_Sama' ORDER BY tulisan_id DESC limit 3");
		return $hsl;
	}
	function get_kategori_pengumuman(){
		$hsl=$this->db->query("SELECT tbl_tautan.*,DATE_FORMAT(tulisan_tanggal,'%d %M %Y') AS tanggal FROM tbl_tautan WHER = 'Pengumuman' ORDER BY tulisan_id DESC limit 3");
		return $hsl;
	}
	function get_kategori_agenda(){
		$hsl=$this->db->query("SELECT tbl_tautan.*,DATE_FORMAT(tulisan_tanggal,'%d %M %Y') AS tanggal FROM tbl_tautan WHER = 'agenda' ORDER BY tulisan_id DESC limit 3");
		return $hsl;
	}



	function get_berita_slider(){
		$hsl=$this->db->query("SELECT tbl_tautan.*,DATE_FORMAT(tulisan_tanggal,'%d/%m/%Y') AS tanggal FROM tbl_tautan where tulisan_img_slider='1' ORDER BY tulisan_id DESC");
		return $hsl;
	}

	function berita_perpage($offset,$limit){
		$hsl=$this->db->query("SELECT tbl_tautan.*,DATE_FORMAT(tulisan_tanggal,'%d/%m/%Y') AS tanggal FROM tbl_tautan ORDER BY tulisan_id DESC limit $offset,$limit");
		return $hsl;
	}

	function berita(){
		$hsl=$this->db->query("SELECT tbl_tautan.*,DATE_FORMAT(tulisan_tanggal,'%d/%m/%Y') AS tanggal FROM tbl_tautan ORDER BY tulisan_id DESC");
		return $hsl;
	} 
	function get_berita_by_slug($slug){
		$hsl=$this->db->query("SELECT tbl_tautan.*,DATE_FORMAT(tulisan_tanggal,'%d/%m/%Y') AS tanggal FROM tbl_tautan where tulisan_slug='$slug'");
		return $hsl;
	}

	function get_tulisan_by_kategori($kategori_id){
		$hsl=$this->db->query("SELECT tbl_tautan.*,DATE_FORMAT(tulisan_tanggal,'%d/%m/%Y') AS tanggal FROM tbl_tautan where ='$kategori_id'");
		return $hsl;
	}

	function get_tulisan_by_kategori_perpage($kategori_id,$offset,$limit){
		$hsl=$this->db->query("SELECT tbl_tautan.*,DATE_FORMAT(tulisan_tanggal,'%d/%m/%Y') AS tanggal FROM tbl_tautan where ='$kategori_id' ORDER BY tulisan_id DESC limit $offset,$limit ");
		return $hsl;
	}
	function search_tulisan1($keyword){
		$hsl=$this->db->query("SELECT tbl_tautan.*,DATE_FORMAT(tulisan_tanggal,'%d/%m/%Y') AS tanggal FROM tbl_tautan WHERE tulisan_judul LIKE '%$keyword%'");
		return $hsl;
	}

	function search_tulisan($keyword,$offset,$limit){
		$hsl=$this->db->query("SELECT tbl_tautan.*,DATE_FORMAT(tulisan_tanggal,'%d/%m/%Y') AS tanggal FROM tbl_tautan WHERE tulisan_judul LIKE '%$keyword%' ORDER BY tulisan_id DESC limit $offset,$limit");
		return $hsl;
	}

	function post_komentar($nama,$email,$web,$msg,$tulisan_id){
		$hsl=$this->db->query("INSERT INTO tbl_komentar (komentar_nama,komentar_email,komentar_web,komentar_isi,komentar_tulisan_id) VALUES ('$nama','$email','$web','$msg','$tulisan_id')");
		return $hsl;
	}


	function count_views($kode){
        $user_ip=$_SERVER['REMOTE_ADDR'];
        $cek_ip=$this->db->query("SELECT * FROM tbl_post_views WHERE views_ip='$user_ip' AND views_tulisan_id='$kode' AND DATE(views_tanggal)=CURDATE()");
        if($cek_ip->num_rows() <= 0){
            $this->db->trans_start();
				$this->db->query("INSERT INTO tbl_post_views (views_ip,views_tulisan_id) VALUES('$user_ip','$kode')");
				$this->db->query("UPDATE tbl_tautan SET tulisan_views=tulisan_views+1 where tulisan_id='$kode'");
			$this->db->trans_complete();
			if($this->db->trans_status()==TRUE){
				return TRUE;
			}else{
				return FALSE;
			}
        }
    }

    //Count rating Good
    function count_good($kode){
        $user_ip=$_SERVER['REMOTE_ADDR'];
        $cek_ip=$this->db->query("SELECT * FROM tbl_post_rating WHERE rate_ip='$user_ip' AND rate_tulisan_id='$kode'");
        if($cek_ip->num_rows() <= 0){
            
				$this->db->query("INSERT INTO tbl_post_rating (rate_ip,rate_point,rate_tulisan_id) VALUES('$user_ip','1','$kode')");
				$this->db->query("UPDATE tbl_tautan SET tulisan_rating=tulisan_rating+1 where tulisan_id='$kode'");

        }
    }

    //Count rating Like
    function count_like($kode){
        $user_ip=$_SERVER['REMOTE_ADDR'];
        $cek_ip=$this->db->query("SELECT * FROM tbl_post_rating WHERE rate_ip='$user_ip' AND rate_tulisan_id='$kode'");
        if($cek_ip->num_rows() <= 0){
           
				$this->db->query("INSERT INTO tbl_post_rating (rate_ip,rate_point,rate_tulisan_id) VALUES('$user_ip','2','$kode')");
				$this->db->query("UPDATE tbl_tautan SET tulisan_rating=tulisan_rating+2 where tulisan_id='$kode'");
		
        }
    }

    //Count rating Like
    function count_love($kode){
        $user_ip=$_SERVER['REMOTE_ADDR'];
        $cek_ip=$this->db->query("SELECT * FROM tbl_post_rating WHERE rate_ip='$user_ip' AND rate_tulisan_id='$kode'");
        if($cek_ip->num_rows() <= 0){
           
				$this->db->query("INSERT INTO tbl_post_rating (rate_ip,rate_point,rate_tulisan_id) VALUES('$user_ip','3','$kode')");
				$this->db->query("UPDATE tbl_tautan SET tulisan_rating=tulisan_rating+3 where tulisan_id='$kode'");
		
        }
    }

    //Count rating Like
    function count_genius($kode){
        $user_ip=$_SERVER['REMOTE_ADDR'];
        $cek_ip=$this->db->query("SELECT * FROM tbl_post_rating WHERE rate_ip='$user_ip' AND rate_tulisan_id='$kode'");
        if($cek_ip->num_rows() <= 0){
            
				$this->db->query("INSERT INTO tbl_post_rating (rate_ip,rate_point,rate_tulisan_id) VALUES('$user_ip','4','$kode')");
				$this->db->query("UPDATE tbl_tautan SET tulisan_rating=tulisan_rating+4 where tulisan_id='$kode'");
		}
    }

    function cek_ip_rate($kode){
    	$user_ip=$_SERVER['REMOTE_ADDR'];
        $hsl=$this->db->query("SELECT * FROM tbl_post_rating WHERE rate_ip='$user_ip' AND rate_tulisan_id='$kode'");
        return $hsl;
    }


    function get_tulisan_populer(){
		$hasil=$this->db->query("SELECT tbl_tautan.*,DATE_FORMAT(tulisan_tanggal,'%d %M %Y') AS tanggal FROM tbl_tautan ORDER BY tulisan_views DESC limit 10");
		return $hasil;
	}

	function get_tulisan_terbaru(){
		$hasil=$this->db->query("SELECT tbl_tautan.*,DATE_FORMAT(tulisan_tanggal,'%d %M %Y') AS tanggal FROM tbl_tautan ORDER BY tulisan_id DESC limit 10");
		return $hasil;
	}

	function get_kategori_for_blog(){
		$hasil=$this->db->query("SELECT COUNT() AS jml,kategori_id,kategori_nama FROM tbl_tautan JOIN tbl_kategori ON =kategori_id GROUP BY ");
		return $hasil;
	}
	

}