<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1.0, shrink-to-fit=no">
	
<title>Hubungi Kami</title>

<meta name="keywords" content="SMK PP Negeri Sembawa" />
<meta name="description" content="SMK PP Negeri Sembawa">
<meta name="author" content="http://digitalcreative.web.id">

<!-- Favicon -->
<link rel="shortcut icon" href="<?php echo base_url() ?>assets/images/Kementan.png" type="image/x-icon" />
<link rel="apple-touch-icon" href="<?php echo base_url() ?>assets/images/Kementan.png">

<!-- Mobile Metas -->
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1.0, shrink-to-fit=no">


<link rel="stylesheet" href="<?php echo base_url()?>assets/css/style.css" type="text/css" media="all">
<link rel="stylesheet" href="<?php echo base_url()?>assets/css/update-responsive.css" type="text/css" media="all">

<!-- Slider -->
<link rel="stylesheet" href="<?php echo base_url()?>assets/css/flexslid.css" type="text/css" media="screen">

<!-- bootstrap css -->
<link rel="stylesheet" href="<?php echo base_url()?>assets/css/bootstrap.css" type="text/css" media="screen">
<!-- cerousel css -->
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/elastislide.css" />
<!-- Lightbox -->
<link rel="stylesheet" href="<?php echo base_url()?>assets/css/lightbox.min.css">
<!-- Style Switcher Box -->
<link rel="stylesheet" href="<?php echo base_url()?>assets/css/jsDatePick_ltr.css">
<link rel="stylesheet" href="<?php echo base_url()?>assets/jquery-ui/jquery-ui.css">
<script src="<?php echo base_url()?>assets/js/jquery-1.12.4.js"></script>
<script src="<?php echo base_url()?>assets/jquery-ui/jquery-ui.js"></script>
<!-- Right Hand Side Text Direction -->
<link rel="stylesheet" href="<?php echo base_url()?>assets/css/switcher.css">
<link rel="stylesheet" href="<?php echo base_url()?>assets/css/skins/default.css">
<!-- <script src="<?php echo base_url()?>assets/js/jquery.min.js"></script> -->
<script src="<?php echo base_url()?>assets/js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
<!-- skins -->
<link rel="stylesheet" name="skins" href="<?php echo base_url()?>assets/css/default.css" type="text/css" media="all">
<!--[if lt IE 7]>
	<script type="text/javascript" src="js/ie6_script_other.js"></script>
<![endif]-->
<!--[if lt IE 9]>
	<script type="text/javascript" src="js/html5.js"></script>
	<link rel="stylesheet" href="css/ie_lt9.css">
<![endif]-->
<!-- jquery -->

<style type="text/css">
  
.containernav-fluid{
  width: 1260px;
}

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
<?php echo $map['js'];?>
</head>	
<?php
            error_reporting(0);
            function limit_words($string, $word_limit){
                $words = explode(" ",$string);
                return implode(" ",array_splice($words,0,$word_limit));
            }

?>

<body>
<div class="wrapper inner_page">
 
    <section class="banner-bg h400">  
	<!-- header -->
	
  <header id="header">
    <section class="">

    <?php
    $header="";
    $header = $this->db->query("SELECT link from tbl_header ORDER BY tanggal DESC LIMIT 1")->row_array();
    ?>
     <h1 ><a href="<?php echo base_url()?>"><img src="<?php echo base_url()?>assets/images/header/<?=$header['link']?>" style="max-height: 375px;width: 100%;margin-left: auto;margin-right: auto;"></a></h1>

    </section>
  	<section class="nav-holder">
    	<section class="containernav-fluid">
    		<nav id="nav" style="margin-top: 5px;">
        <div class="navbar navbar-inverse">
          <div class="navbar-inner">
             <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
             <div class="nav-collapse collapse">
			
              <ul class="nav">
                <!--<li class="active"> <a href="index.html">Home</a> </li>-->
	    <li class="navv dropdown <?php echo $cek1?>" > <a class="dropdown-toggle" href="<?php echo base_url()?>">Home</a></li>

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
                    <li><a href="#">Daftar Nama / Alamat </a></li>
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
              <li><a href="#">Pengumuman</a></li>
              <li><a href="<?php echo base_url().'Publikasi/berita' ?>">Berita</a></li>
              <li><a href="<?php echo base_url().'Informasi/infografis' ?>">Infografis</a></li>
          </ul>
      </li>



        
        <li class="navv dropdown <?php echo $cek10?>"> <a class="dropdown-toggle" href="#"><table align="center" style="color: white; font-size:12px; text-align:center;"><tr><td width="18px" >Informasi Publik <b class="caret"></b></td></tr></table>  </a>
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
        <li class="navv dropdown active"> <a class="dropdown-toggle" href="<?php echo base_url(). 'Informasi/hubungi_kami'?>"><table align="center" style="color: white; font-size:12px; text-align:center;"><tr><td width="18px" >Hubungi Kami</td></tr></table></a></li>
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
  
	</section>

	
  <section class="content-holder b-none inner_content" style="margin-top: 150px;">
  
  	<section class="container container-fluid">

	          <section class="row-fluid">

            <hr>

					<h2 class="heading"> Contact <span> Us </span> </h2>

					<span class="border-line m-bottom"></span>
 

					<article class="page_content">
		
						<figure class="span12"> <?php echo $map['html'];?> </figure>
		
						<figure class="span4 first contact_sidebar"> 
		
							<h2> Find Us </h2>
		 
								
								Jl. Palembang - Jambi KM.29, 19 Ilir, Palembang, Kota Palembang, Sumatera Selatan 30010 <br /><br/>
								Phone <a href="#"> (0711) 365553 </a> <br /><br/>
								Website <a href="https://www.smkppnsembawa.sch.id/"> smkppnsembawa.sch.id </a> <br /><br/>
								Email <a href="#" > sppnsembawa@yahoo.com</a> <br /><br/>
    
                <?php 
          $facebook = $this->db->query("SELECT link from tbl_sosmed where keterangan = 'facebook'")->row_array();
          $twitter = $this->db->query("SELECT link from tbl_sosmed where keterangan = 'twitter'")->row_array();
          $googleplus = $this->db->query("SELECT link from tbl_sosmed where keterangan = 'googleplus'")->row_array();
          $linkedin = $this->db->query("SELECT link from tbl_sosmed where keterangan = 'linkedin'")->row_array();
          $youtube = $this->db->query("SELECT link from tbl_sosmed where keterangan = 'youtube'")->row_array();
          $instagram = $this->db->query("SELECT link from tbl_sosmed where keterangan = 'instagram'")->row_array();
                  ?>
							<h2> Follow Us </h2>      
                <div id="socialicons" class="hidden-phone">
                <a id="facebook" class="fa fa-facebook" href="<?=$facebook['link']?>" target="_blank" title="Visit Facebook page"><span></span></a>  
                <a id="twitter" class="fa fa-twitter" href="<?=$twitter['link']?>" target="_blank" title="Visit Twitter page"><span></span></a> 
                <a id="google_plus" class="fa fa-google" href="<?=$googleplus['link']?>" target="_blank" title="Visit Google Plus page"><span></span></a>
                <a id="linkedin" class="fa fa-linkedin" href="<?=$linkedin['link']?>" target="_blank" title="Visit LinkedIn page"><span></span></a>
                <a id="youtube" class="fa fa-youtube" href="<?=$youtube['link']?>" target="_blank" title="Visit Youtube page"><span></span></a>
                <a id="instagram" class="fa fa-instagram" href="<?=$instagram['link']?>" target="_blank" title="Visit Instagram page"><span></span></a>      
                </div>
						</figure>
		       
						<figure class="span8"> 

							<h2> Leave us a Message </h2>
							<form id="contact_us" name="contact_us" action="<?php echo base_url().'Informasi/kirim_pesan'?>" method="post">
							<p> Name </p>
							<input type="text" placeholder="Nama" name="xnama" required />
							<p> Email </p>
							<input type="text" placeholder="Email" name="xemail" required />
							<p> Kontak </p>
							<input type="text" placeholder="Kontak" name="xkontak" required />
							<p> Isi pesan</p>
							<textarea id="comments" cols="60" name="xpesan" rows="15" required> </textarea> <br />

              <?php echo $this->session->flashdata('msg');?>
							<input type="submit" value="Submit" name="submit" />
							</form>
						
						</figure>
	
					</article>

	</section>
   
	</section>
 
  </section>
  