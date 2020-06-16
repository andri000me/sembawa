</section>
<style type="text/css">
  
.title{
  font-family: 'Merriweather', serif;
  font-size: 19px;
  font-weight: bold;
}  


</style>
	
  <section class="content-holder b-none inner_content" style="margin-top: 50px;">
  
  	<section class="container container-fluid">

	          <section class="row-fluid">

		<h2 class="heading"><br>Artikel</h2>
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
					<figure class="post_readmore" style="font-size: 14px;"> <a href="<?php echo base_url().'Artikel/'.$post_slug;?>"> &rarr; Read More </a></figure>
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
  
  
 
  