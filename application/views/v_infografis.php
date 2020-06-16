
  
	</section>

	
  <section class="content-holder b-none inner_content" style="margin-top: 150px;">
  
  	<section class="container container-fluid">

	          <section class="row-fluid">

		<h2 class="heading"> Infografis</h2>
		<span class="border-line m-bottom" style="margin-top: 5px;margin-left: -19px;"></span>
		
<section class="page_content">
	<?php foreach ($data->result() as $row): ?>
		<figure class="span4"> <a data-toggle="lightbox" href="#<?php echo $row->galeri_id?>" > <img class="team-img f-width-img" src="<?php echo base_url().'assets/images/'.$row->galeri_gambar;?>" style="width: 577px;height: 244px;" alt="<?php echo $row->galeri_judul?>"/> </a> </figure>

            <div id="<?php echo $row->galeri_id?>" class="lightbox hide fade"  tabindex="-1" role="dialog" aria-hidden="true">
              <div class='lightbox-header'>
                <button type="button" class="close" data-dismiss="lightbox" aria-hidden="true">&times;</button>
              </div>
              <div class='lightbox-content'> <img src="<?php echo base_url().'assets/images/'.$row->galeri_gambar;?>" alt="" >
                <div class="lightbox-caption">
                  <p><?php echo $row->galeri_judul?></p>
                </div>
              </div>
            </div>

	<?php endforeach ?>


			</section>

		  </section>
 
	</section>
  
  </section>
   
	</section>
    
  </section>

  