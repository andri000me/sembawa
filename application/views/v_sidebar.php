<style type="text/css">
  
.containernav-fluid{
  width: 1260px;
}

.dropdown-menu.pull-right li a{
  left:100%;
  top:5px;
}

.dropdown-menu.pull-left .dropdown-menu{
  top: 0px;
  left: 100%;
}

.navv{
  font-size: 14px;
  margin-left: -13px; 
  margin-right: -13px;
}

</style>

<?php
            error_reporting(0);
            function limit_words($string, $word_limit){
                $words = explode(" ",$string);
                return implode(" ",array_splice($words,0,$word_limit));
            }

?>
<body>
    <?php 
      $cek1 = "";
      $cek2 = "";
      $cek3 = "";
      $cek4 = "";
      $cek5 = "";
      $cek6 = "";
      $cek7 = "";
      $cek8 = "";
      $cek9 = "";
      $cek10="";
      $cek11="";
      $cek12="";
      $cek13="";
     
     
      
      if(isset($side)){
         switch ($side) {
          case 1:
            $cek1 = "active";
            break;
            case 2:
            $cek2 = "active";
            break;
            case 3:
            $cek3 = "active";
            break;
            case 4:
            $cek4 = "active";
            break;
            case 5:
            $cek5 = "active";
            break;
            case 6:
            $cek6 = "active";
            break;
            case 7:
            $cek7 = "active";
            break;
            case 8:
            $cek8 = "active";
            break;
            case 9:
            $cek9 = "active";
            break;
            case 10:
            $cek10= "active";
            break;
            case 11:
            $cek11="active";
            break;
            case 12:
            $cek12="active";
            break;
            case 13:
            $cek13="active";
            break;

           

         }
      }
    ?>
<div class="wrapper inner_page">
 
    <section class="banner-bg h400">  
	<!-- header -->
	
  <header id="header">
    <section class="">
    <?php
    $header = $this->db->query("SELECT link from tbl_header ORDER BY tanggal DESC LIMIT 1")->row_array();
    ?>
     <h1 ><a href="<?php echo base_url()?>"><img src="<?php echo base_url()?>assets/images/header/<?=$header['link']?>" style="max-height: 375px;width: 100%;margin-left: auto;margin-right: auto;"></a></h1>
    </section>
  	<section class="nav-holder">
      <section class="containernav-fluid">
    	 <nav id="nav">
        <div class="navbar navbar-inverse">
          <div class="navbar-inner">
             <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
             <div class="nav-collapse collapse">
			
              <ul class="nav" style="width: 100%; margin-top:5px">
                <!--<li class="active"> <a href="index.html">Home</a> </li>-->
			       <li  class="navv dropdown <?php echo $cek1?>"> <a class="dropdown-toggle" href="<?php echo base_url()?>">Home</a></li>

      <li class="navv dropdown <?php echo $cek2?>"> <a class="dropdown-toggle" href="<?php echo base_url(). 'Home/profil'?>" >Profil<b class="caret"></b> </a>
                  <ul class="dropdown-menu pull-left">
                    <li class="dropdown"><a class="dropdown-toggle" href="#">SMK PPN Sembawa</a>
                          <ul class="dropdown-menu">
                            <li><a href="<?php echo base_url().'Profil/sejarah' ?>">Sejarah</a></li>
                            <li><a href="<?php echo base_url().'Profil/visi' ?>">Visi Misi</a></li>
                            <li><a href="<?php echo base_url().'Profil/tugas' ?>">Tugas & Fungsi</a></li>
                            <li><a href="<?php echo base_url().'Profil/struktur_organisasi' ?>">Struktur Organisasi</a></li>
                          </ul> 
                    </li>
                    <li><a href="<?php echo base_url().'Profil/daftar_nama' ?>">Daftar Nama / Alamat Pejabat</a></li>
                     <li class="dropdown"><a class="dropdown-toggle" href="#">Civitas</a>
                          <ul class="dropdown-menu">
                            <li><a href="<?php echo base_url().'Civitas' ?>">Peseta Didik</a></li>
                            <li><a href="<?php echo base_url().'Civitas/guru' ?>">Guru & T. Kependidikan</a></li>
                            <li><a href="<?php echo base_url().'Civitas/alumni'?>">Alumni</a></li>
                            <li><a href="<?php echo base_url().'Civitas/form_alumni'?>">Form Alumni</a></li>
                          </ul> 
                    </li>

                    <li><a href="<?php echo base_url().'Profil/sambutan' ?>">Kata Sambutan</a></li>
                  </ul>
                  
      </li>

      <li class="navv dropdown <?php echo $cek3?>"> <a class="dropdown-toggle" href="#" >Program<b class="caret"></b> </a>
          <ul class="dropdown-menu pull-left">
              <li class="dropdown"><a class="dropdown-toggle" href="#">Rencana Kerja</a>
                  <ul class="dropdown-menu">
                    <li><a href="<?php echo base_url().'Program/renstra' ?>">Renstra</a></li>
                    <li><a href="<?php echo base_url().'Program/renja' ?>">Renja</a></li>
                  </ul> 
              </li>
              <li class="dropdown"><a class="dropdown-toggle" href="#">Anggaran</a>
                  <ul class="dropdown-menu">
                    <li><a href="<?php echo base_url().'Program/dipa' ?>">Dipa</a></li>
                  </ul>
              </li>
          </ul>
      </li>

      <li class="navv dropdown <?php echo $cek4?>"> <a class="dropdown-toggle" href="#" >Kinerja<b class="caret"></b> </a>
          <ul class="dropdown-menu pull-left">
              <li class="dropdown"><a class="dropdown-toggle-left" href="#">Kinerja</a>
                          <ul class="dropdown-menu">
                            <li><a href="<?php echo base_url() ?>Kinerja/laporan_keuangan">Laporan Keuangan</a></li>
                            <li><a href="<?php echo base_url() ?>Kinerja/lakin">Lakin</a></li>
                            <li><a href="<?php echo base_url() ?>Kinerja/capaian_kinerja">Capaian Kinerja</a></li>
                            <li><a href="<?php echo base_url() ?>Kinerja/realisasi_anggaran">Realisasi Anggaran</a></li>
                            <li><a href="<?php echo base_url() ?>Kinerja/neraca_keuangan">Neraca Keuangan</a></li>
                          </ul> 
              </li>
              <li><a href="<?php echo base_url().'Kinerja/laporan_tahunan' ?>">Laporan Tahunan</a></li>
              <li><a href="<?php echo base_url().'Kinerja/laporan_tahunan_ppid' ?>">Laporan Tahunan PPID</a></li>
              <li><a href="<?php echo base_url().'Kinerja/laporan_masyarakat' ?>">Index Kepuasan Masyarakat</a></li>
          </ul>
      </li>

   
      
      <li class="navv dropdown <?php echo $cek6?>"> <a class="dropdown-toggle" href="<?php echo base_url().'Ppdb'?>">PPDB</a></li>
			
      <li class="navv dropdown <?php echo $cek7?>"> <a class="dropdown-toggle" href="#" >Kurikulum<b class="caret"></b> </a>
        <ul class="dropdown-menu">
       		<li> <a href="<?php echo base_url().'Kurikulum'?>">Kalender Pendidikan</a> </li>
          <li> <a href="http://dapo.dikdasmen.kemdikbud.go.id/sekolah/964D53F4E9937D2E5327">DAPODIK</a> </li>
        </ul>
      </li>
				
				<li class="navv dropdown <?php echo $cek8?>"> <a class="dropdown-toggle" href="#" >Sarana<b class="caret"></b> </a>
                  <ul class="dropdown-menu">
                  	<li><a href="<?php echo base_url().'Sarana'?>">Sapras Sekolah</a></li>
                  <li><a href="<?php echo base_url().'Sarana/tuk'?>">TUK</a></li>
                  <li><a href="<?php echo base_url().'Sarana/gedung'?>">Gedung</a></li>
                  <li><a href="<?php echo base_url().'Sarana/laboratorium'?>">Laboratorium</a></li>
                  <li><a href="<?php echo base_url().'Sarana/lahan_praktikum'?>">Lahan Praktikum</a></li>
                  </ul>
        </li>

         <li class="navv dropdown <?php echo $cek9?>"> <a class="dropdown-toggle" href="#" >Publikasi<b class="caret"></b> </a>
          <ul class="dropdown-menu">
              <li><a href="<?php echo base_url().'Publikasi/pengumuman' ?>">Pengumuman</a></li>
              <li><a href="<?php echo base_url().'Publikasi/berita' ?>">Berita</a></li>
              <li><a href="<?php echo base_url().'Informasi/infografis' ?>">Infografis</a></li>
          </ul>
      </li>



				
				<li class="navv dropdown <?php echo $cek10?>"> <a class="dropdown-toggle" href="#"> <table align="center"><tr><td width="20px" >Informasi Publik <b class="caret"></b></td></tr></table>  </a>
                  <ul class="dropdown-menu">
                  	<!-- <li><a href="<?php echo base_url().'Artikel/'?>">Berita</a></li> -->

                  	<li><a href="<?php echo base_url().'Informasi/informasi_publik_berkala'?>">Informasi Publik Berkala</a></li>
          	    	<li><a href="<?php echo base_url().'Informasi/informasi_publik_setiap_saat'?>">Informasi Publik Setiap Saat</a></li>
                  <li><a href="<?php echo base_url().'Informasi/setiap_saat'?>">Setiap Saat</a></li>
                  <li><a href="<?php echo base_url().'Informasi/serta_merta'?>">Serta Merta</a></li>
                  <li><a href="<?php echo base_url().'Informasi/form_permintaan'?>">Form Permintaan Informasi Publik</a></li>
                  <li><a href="https://kegpertanian.wordpress.com/">Laporan Kegitan</a></li>
                  </ul>
        </li>
				
				<li class="navv dropdown <?php echo $cek11?>"> <a class="dropdown-toggle" href="#">Gallery<b class="caret"></b></a>
                  <ul class="dropdown-menu">
                    <li><a href="<?php echo base_url().'Gallery/sapras' ?>">SAPRAS</a></li>
                  	<li><a href="<?php echo base_url().'Gallery'?>">Gallery Photo</a></li>
          	    	  <li><a href="<?php echo base_url().'Gallery/video'?>">Gallery Video</a></li>
                  </ul>
        </li>

        <li class="navv dropdown <?php echo $cek12?>"> <a class="dropdown-toggle" href="<?php echo base_url(). 'Informasi/sitemap'?>">Sitemap</a></li>
        <li class="navv dropdown <?php echo $cek13?>"> <a class="dropdown-toggle" href="<?php echo base_url(). 'Informasi/hubungi_kami'?>"><table align="center"><tr><td width="20px" >Hubungi Kami</td></tr></table> </a></li>
              </ul>
            </div>
            <!--/.nav-collapse -->
          </div>
          <!-- /.navbar-inner -->
        </div>
        <!-- /.navbar -->
      </nav>
  		</section>
    </section>
  </header>


 