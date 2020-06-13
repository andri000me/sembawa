<?php
class M_jejak_pendapat extends CI_Model{

	function kirim_pendapat(){
		$hsl=$this->db->query("INSERT INTO tbl_jejak_pendapat(vote) VALUES (1)");
		return $hsl;
	}


    function get_pendapat_perhari(){
        $query = $this->db->query("SELECT DATE_FORMAT(tanggal,'%d') AS tgl,COUNT(vote) AS jumlah FROM tbl_jejak_pendapat WHERE MONTH(tanggal)=MONTH(CURDATE()) GROUP BY DATE(tanggal)");
         
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }


} 