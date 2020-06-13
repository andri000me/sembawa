
  
	</section>

	
  <section class="content-holder b-none inner_content" style="margin-top: 50px;">
  
  	<section class="container container-fluid">

	          <section class="row-fluid">

		<h2 class="heading">  Gallery Video </h2>
		<span class="border-line m-bottom" style="margin-top: 5px;margin-left: -19px;"></span>
	<section class="page_content">
		<!-- Dengan Database simpan nama -->
		<?php foreach ($data->result() as $row) :?>
			<!-- Dengan Database simpan nama -->
	<!-- 	<article class="span4"> 
			  <video controls width="100%" height="281" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen>
			  	<source src="<?php echo base_url().'assets/video/'.$row->video_nama?>" type="video/<?php echo $row->video_type?>">
			  </video>
			  <p><?php echo $row->video_judul?></p> -->

			  <!-- Embeb Youtube -->
				<article class="span4"> 
				  <iframe src="<?php echo $row->video_link?>" width="100%" height="281" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>
				</article>	
		<?php endforeach ;?>

		</section>
	</section>
	<section class="pagination" style="margin-bottom: 34px;margin-top: -48px;margin-left: 465px; ">  
      <?php echo $page;?> 
    </section>
   
	</section>
 
  </section>
  