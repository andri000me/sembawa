<style type="text/css">
  
.title{
  font-family: 'Merriweather', serif;
  font-size: 19px;
  font-weight: bold;
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
<div class="wrapper inner_page">
 
    <section class="banner-bg h400">  
	<!-- header -->
	
  <header id="header">
   <section class="">
      <h1 ><a href="<?php echo base_url()?>"><img src="<?php echo base_url()?>assets/images/bg-sekolah.jpg" style="height: 240px;width: 100%;margin-left: auto;margin-right: auto;"></a></h1>
    </section>
  	<section class="nav-holder">
    	<section class="containernav-fluid">
    		<nav id="nav">
        <div class="navbar navbar-inverse">
          <div class="navbar-inner">
             <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
             <div class="nav-collapse collapse">
			
              <ul class="nav">
                <!--<li class="active"> <a href="index.html">Home</a> </li>-->
			<li class="dropdown"> <a class="dropdown-toggle" href="<?php echo base_url()?>" >Home<b class="caret"></b> </a>
                  <ul class="dropdown-menu">
                  	<li><a href="<?php echo base_url(). 'Home/profil'?>">Profil</a></li>
                  	<li><a href="<?php echo base_url(). 'Home/kataSambutan'?>">Kata Sambutan</a></li>
                  </ul>
                </li>
				<li class="dropdown"> <a class="dropdown-toggle" href="#">Civitas<b class="caret"></b> </a>
                  <ul class="dropdown-menu">
					<li> <a href="<?php echo base_url().'Civitas'?>">Peserta Didik</a> </li>
					<li> <a href="<?php echo base_url().'Civitas/guru'?>"> Guru dan Tenaga Kerja</a> </li>
					<li> <a href="<?php echo base_url().'Civitas/alumni'?>"> Alumni</a> </li>
					<li> <a href="<?php echo base_url().'Civitas/form_alumni'?>"> Form Alumni</a> </li>
                  </ul>
                </li>
      
      <li class="dropdown"> <a class="dropdown-toggle" href="<?php echo base_url().'Ppdb'?>">PPDB</a></li>
			
      <li class="dropdown"> <a class="dropdown-toggle" href="#" >Kurikulum<b class="caret"></b> </a>
        <ul class="dropdown-menu">
       		<li> <a href="<?php echo base_url().'Kurikulum'?>">Kalender Pendidikan</a> </li>
       		<li> <a href="http://dapo.dikdasmen.kemdikbud.go.id/sekolah/964D53F4E9937D2E5327">DAPODIK</a> </li>
        </ul>
      </li>
				
		<li class="dropdown"> <a class="dropdown-toggle" href="#" >Sarana Prasarana<b class="caret"></b> </a>
                  <ul class="dropdown-menu">
                  	<li><a href="<?php echo base_url().'Sarana'?>">Sapras Sekolah</a></li>
                  <li><a href="<?php echo base_url().'Sarana/tuk'?>">TUK</a></li>
                  <li><a href="<?php echo base_url().'Sarana/gedung'?>">Gedung</a></li>
                  <li><a href="<?php echo base_url().'Sarana/laboratorium'?>">Laboratorium</a></li>
                  <li><a href="<?php echo base_url().'Sarana/lahan_praktikum'?>">Lahan Praktikum</a></li>
                  </ul>
        </li>
				
				<li class="dropdown active"> <a class="dropdown-toggle" href="#">Informasi Publik <b class="caret"></b> </a>
                  <ul class="dropdown-menu">
                  	<li><a href="<?php echo base_url().'Artikel/'?>">Berita</a></li>
                  	<li><a href="<?php echo base_url().'Informasi/informasi_publik_berkala'?>">Informasi Publik Berkala</a></li>
          	    	<li><a href="<?php echo base_url().'Informasi/informasi_publik_setiap_saat'?>">Informasi Publik Setiap Saat</a></li>
                  <li><a href="<?php echo base_url().'Informasi/setiap_saat'?>">Setiap Saat</a></li>
                  <li><a href="<?php echo base_url().'Informasi/serta_merta'?>">Serta Merta</a></li>
                  <li><a href="<?php echo base_url().'Informasi/form_permintaan'?>">Form Permintaan Informasi Publik</a></li>
                  <li><a href="https://kegpertanian.wordpress.com/">Laporan Kegitan</a></li>
                  </ul>
        </li>
				
				<li class="dropdown"> <a class="dropdown-toggle" href="#">Gallery<b class="caret"></b></a>
                  <ul class="dropdown-menu">
                  	<li><a href="<?php echo base_url().'Gallery'?>">Gallery Photo</a></li>
          	    	  <li><a href="<?php echo base_url().'Gallery/video'?>">Gallery Video</a></li>
                  </ul>
                </li>
        <li class="dropdown"> <a class="dropdown-toggle" href="<?php echo base_url(). 'Informasi/sitemap'?>">Sitemap</a></li>
        <li class="dropdown"> <a class="dropdown-toggle" href="<?php echo base_url(). 'Informasi/hubungi_kami'?>">Hubungi Kami</a></li>

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

	
  <section class="content-holder b-none inner_content" style="margin-top: 50px;">
  
  	<section class="container container-fluid">

	          <section class="row-fluid">

		<h2 class="heading">Artikel</h2>
		<span class="border-line m-bottom" style="margin-top: 5px;margin-left: -19px;"></span>
	<section class="page_content">
		<section class="span9 first">
			<?php if ($data->num_rows() > 0){?>

			<?php foreach ($data->result_array() as $j):
					$post_id=$j['tulisan_id'];
					$post_judul=$j['tulisan_judul'];
					$post_isi=$j['tulisan_isi'];
					$post_author=$j['tulisan_author'];
					$post_image=$j['tulisan_gambar'];
					$post_tglpost=$j['tanggal'];
					$post_slug=$j['tulisan_slug'];
			 ?>
				<article class="blog_listing_wrapper">
					<figure class="post_title"> <h2> <a href="<?php echo base_url().'Artikel/'.$post_slug;?>"> <span> <?php echo $post_tglpost ?> </span> <?php echo $post_judul ?> </h2>	</a> </figure>
					<figure class="post_featured_image"> <img src="<?php echo base_url().'assets/images/'.$post_image;?>" alt="" /> </figure>
					<figure class="post_meta"> 
					<span> Posted by: <?php echo $post_author ?> </span> 
					</figure>
					<figure class="post_description">	<p> <?php echo limit_words($post_isi,30).'...';?></p>	</figure>
					<figure class="post_readmore"> <a href="<?php echo base_url().'Artikel/'.$post_slug;?>"> &rarr; Read More </a></figure>
				</article>
			<?php endforeach;?>
			<?php
				}
				else if($data->num_rows() == 0){
			 ?>
			 	<section class="content-holder b-none inner_content">
  					<section class="container container-fluid">
	          			<section class="row-fluid">
							<span class="border-line m-bottom" style="margin-top: -79px;margin-left: -49px;"></span>
	
				<article class="page_content">
          			<p>No results were found for the requested archive. Perhaps searching will help finding you related post.</p>
				</article>
	
						</section>
   
					</section>
 
 			 </section>
			 <?php }?>


			
			
			
	<section class="pagination">  
		<?php echo $page;?> 
	</section> 
		</section>
		
		<section class="span3 sidebar">
		<article class="widget">

			<form id="search_form" action="<?php echo base_url().'Informasi/search'?>" method="post">
				<input type="text" class="text" value="Search Here..." name="xfilter" required>               
				<input type="submit" value="Submit" id="submit" class="search_ico" style="margin-bottom: -1px;">
			</form>
			
			</article>
			
				<article class="widget">			
				<h2> Categories </h2>				
				<ul class="cat_widget list_widget">
					<?php foreach ($kat->result() as $i): ?>
						<li> <a href="<?php echo base_url().'Artikel/kategori/'.$i->kategori_id;?>"> <?php echo $i->kategori_nama;?> 	<span> (<?php echo $i->jml?>) </span> </a> </li>
					<?php endforeach ?>
				
				
				</ul>
			</article>	
			
				<article class="widget">
				
				<h2> Latest Post </h2> <!-- 20px -->
				
				
				<ul class="latest_post">
					<?php foreach ($terbaru->result() as $row): ?>
					<li>
						<img src="<?php echo base_url().'assets/images/'.$row->tulisan_gambar;?>" alt="" /> 
						<span class="text_wrapper">
						<p class="title" title="<?php echo $row->tulisan_judul?>"> <?php echo limit_words($row->tulisan_judul,3).'...';?> </p> 
						<p> <?php echo limit_words($row->tulisan_isi,7).'...';?> </p> 
						<a href="<?php echo base_url().'Artikel/'.$row->tulisan_slug;?>"> Keep Reading →</a>
						</span>
					</li>	
					<?php endforeach ?> 
				</ul>
				</article>

				<article class="widget">
				
				<h2> Popular Post </h2> <!-- 20px -->
				
				
				<ul class="latest_post">
					<?php foreach ($populer->result() as $row): ?>
					<li>
						<img src="<?php echo base_url().'assets/images/'.$row->tulisan_gambar;?>" alt="" /> 
						<span class="text_wrapper">
						<p class="title" title="<?php echo $row->tulisan_judul?>"> <?php echo limit_words($row->tulisan_judul,3).'...';?> </p> 
						<p> <?php echo limit_words($row->tulisan_isi,7).'...';?> </p> 
						<a href="<?php echo base_url().'Artikel/'.$row->tulisan_slug;?>"> Keep Reading →</a>
						</span>
					</li>	
					<?php endforeach ?> 
				</ul>
				</article>
		
		</section>
	
	</section>
		  </section>
   
	</section>
 
  </section>
  
 
  