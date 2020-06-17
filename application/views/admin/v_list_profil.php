

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Halaman Profil
        <small></small>
      </h1>
      <ol class="breadcrumb">
      <li><a href="<?=base_url()?>Admin/dashboard"><i class="fa fa-dashboard"></i>Dashboard</a></li>
      <li class="active"><i class="fa fa-volume-up"></i> Halaman Profil</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
                        <?php 
                        foreach($portofolio->result_array() as $b) :
                          $id = $b['port_id'];
                            $isi = $b['port_deskripsi'];
                            $views = $b['tulisan_views'];
                            $judul = $b['port_judul'];
                            $date = $b['port_tanggal'];
                            $author = $b['port_author'];
                            $img=base_url().'assets/images/'.$b['port_image'];
                            $keterangan = $b['keterangan'];
                        ?>
          <div class="box">
           <div class="box-header">
             <h4><b><?=$judul?></b></h4> 
           </div>

            <!-- /.box-header -->
            <div class="box-body">
            <section class="page_content">
		        <section class="span9 first">
			        <article class="blog_detail_wrapper">
				
				    <figure class="post_meta"> 
				
				<!-- <span> Posted by:  <a href="#"> <?php echo $author;?> </a> </span> 
				<span> Dilihat: <a href="#"><?php echo $views;?></a></span>
				<span> Tanggal: <a href="#"><?php echo $date;?></a></span>   -->
				</figure>
				<figure class="post_description">
                    <p><?php echo $isi?></p>	
                    <?php if ($b['port_image'] != null) : ?>
                    <img src="<?=$img?>">
                    <?php endif; ?>
                    <center><h5 style="color: green;">Updated : <?=$date?> | <?=$author?></h5></center>
                    <center><a class="btn" href="<?php echo base_url() . 'Admin/Profil/get_edit_profil/' . $id; ?>"><span class="fa fa-pencil"></span></a></center>
                        
        </figure>
			</article>
		</section>
            <!-- Carousel End -->

          </div>
          <!-- /.box-body -->
        </div>
        <?php endforeach?>
        <!-- /.box -->
      </div>
      <!-- /.col -->
    </div>
    
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
