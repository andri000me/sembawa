<?php 

class M_agenda extends CI_Model{

    function get_all_agenda(){
		$hsl=$this->db->query("SELECT tbl_agenda.*,DATE_FORMAT(tanggal,'%d/%m/%Y') AS tanggal FROM tbl_agenda ORDER BY tanggal DESC");
		return $hsl;
    }

    function simpan_agenda($nama_agenda,$deskripsi,$mulai,$selesai,$tempat,$waktu,$keterangan,$user_nama){
        $hsl=$this->db->query("INSERT into tbl_agenda(agenda_nama,agenda_deskripsi,agenda_mulai,agenda_selesai,agenda_tempat,agenda_waktu,agenda_keterangan, agenda_author) values ('$nama_agenda','$deskripsi','$mulai','$selesai','$tempat','$waktu','$keterangan','$user_nama')");
		return $hsl;
    }

    function update_agenda($agenda_id,$nama_agenda,$deskripsi,$mulai,$selesai,$tempat,$waktu,$keterangan,$user_nama){
        $hsl=$this->db->query("UPDATE tbl_agenda SET agenda_nama='$nama_agenda',agenda_deskripsi='$deskripsi',agenda_mulai='$mulai',agenda_selesai='$selesai',agenda_tempat='$tempat',agenda_waktu='$waktu',agenda_keterangan='$keterangan', agenda_author='$user_nama' where agenda_id='$agenda_id'");
		return $hsl;
    }
    
    function hapus_agenda($agenda_id){
        $hsl=$this->db->query("DELETE from tbl_agenda where agenda_id='$agenda_id'");
		return $hsl;
    }
}

?>