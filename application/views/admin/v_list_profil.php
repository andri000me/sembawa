

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
          <div class="box">
           

            <!-- /.box-header -->
            <div class="box-body">
            <section class="page_content">
		        <section class="span9 first">
			        <article class="blog_detail_wrapper">
                        <?php 
                            $b=$portofolio->row_array();
                            $isi = $b['port_deskripsi'];
                            $views = $b['tulisan_views'];
                            $date = $b['port_tanggal'];
                            $author = $b['port_author'];
                            $img=base_url().'assets/images/'.$b['port_image'];
                        ?>
				
				    <figure class="post_meta"> 
				
				<!-- <span> Posted by:  <a href="#"> <?php echo $author;?> </a> </span> 
				<span> Dilihat: <a href="#"><?php echo $views;?></a></span>
				<span> Tanggal: <a href="#"><?php echo $date;?></a></span>   -->
				</figure>
				<figure class="post_description">				
                    <p><?php echo $isi?></p>	
                    <img src="<?php echo base_url().'assets/images/Struktur Organisasi 2019.jpg' ?>">
				</figure>
			</article>
		</section>
            <!-- Carousel End -->

            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
