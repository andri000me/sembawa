<style type="text/css">
  
.title{
  font-family: Arial;
  font-size: 19px;
  font-weight: bold;
}  


</style>


 
  
  <section class="content-holder">
    <section class="container1 container-fluid">
   	  <section class="row-fluid">	
      <figure class="span9">
   
    	 <figure class="span12" style="margin-top: -7px;margin-left: 4px;">
        <h2 style='border-bottom: 6px solid #3a813c;margin-left: 10px;text-align: left'>Artikel</h2>

        <div>
          <form id="search_form" action="<?php echo base_url().'Informasi/search'?>" method="post" style="text-align:left; margin-bottom:25px; margin-left:2%">
            <input type="text" class="text" placeholder="Cari Artikel Disini ..." name="xfilter" required>               
            <input type="submit" value="Submit" id="submit" class="search_ico" style="margin-bottom: -1px;">
          </form>
        </div>

        	
        <?php foreach ($jadwal->result_array() as $i):
              $post_id=$i['tulisan_id'];
              $post_judul=$i['tulisan_judul'];
              $post_isi=$i['tulisan_isi'];
              $post_author=$i['tulisan_author'];
              $post_image=$i['tulisan_gambar'];
              $post_tglpost=$i['tanggal'];
              $post_slug=$i['tulisan_slug'];
         ?>
         <a href="<?php echo base_url().'Artikel/'.$post_slug;?>" target="_blank">
          <figure class="span4 services">
               <div class="slid-holder b0">
                <div class="slid-holder-inner" style="height: 370px;">
                   <img src="<?php echo base_url().'assets/images/'.$post_image;?>" alt="Law and Order"/>
                   <strong class="title"><?php echo $post_judul?></strong>
                   <span><?php echo $post_tglpost.' | '.$post_author;?></span>
                   <p><?php echo limit_words($post_isi,10).'...';?></p>
                </div>
               </div>
          </figure>
          </a>
        <?php endforeach ?>
      </figure>
      <!-- <div class="btn-bar" style="margin-bottom: 25px;"><a href="<?php echo base_url().'Artikel/kategori/1'?>" class="see-btn">Lihat Lagi</a></div> -->

      <figure class="span12" style="margin-top: 22px;margin-left: 4px;">
        <!-- <h2 style='border-bottom: 6px solid #3a813c;margin-left: 10px;'>Kampusku</h2> -->
          
        <?php foreach ($kampusku->result_array() as $i):
              $post_id=$i['tulisan_id'];
              $post_judul=$i['tulisan_judul'];
              $post_isi=$i['tulisan_isi'];
              $post_author=$i['tulisan_author'];
              $post_image=$i['tulisan_gambar'];
              $post_tglpost=$i['tanggal'];
              $post_slug=$i['tulisan_slug'];
         ?>
         <a href="<?php echo base_url().'Artikel/'.$post_slug;?>" target="_blank">
          <figure class="span4 services">
               <div class="slid-holder b0">
                <div class="slid-holder-inner" style="height: 370px;">
                   <img src="<?php echo base_url().'assets/images/'.$post_image;?>" alt="Law and Order"/>
                   <strong class="title"><?php echo $post_judul?></strong>
                   <span><?php echo $post_tglpost.' | '.$post_author;?></span>
                   <p><?php echo limit_words($post_isi,10).'...';?></p>
                </div>
               </div>
          </figure>
          </a>
        <?php endforeach ?>
        </figure>
        <!-- <div class="btn-bar" style="margin-bottom: 25px; "><a href="<?php echo base_url().'Artikel/kategori/2'?>" class="see-btn">Lihat Lagi</a></div> -->

      <figure class="span12" style="margin-top: 22px;margin-left: 4px;">    
        <?php foreach ($minggu->result_array() as $i):
              $post_id=$i['tulisan_id'];
              $post_judul=$i['tulisan_judul'];
              $post_isi=$i['tulisan_isi'];
              $post_author=$i['tulisan_author'];
              $post_image=$i['tulisan_gambar'];
              $post_tglpost=$i['tanggal'];
              $post_slug=$i['tulisan_slug'];
         ?>
         <a href="<?php echo base_url().'Artikel/'.$post_slug;?>" target="_blank">
          <figure class="span4 services">
               <div class="slid-holder b0">
                <div class="slid-holder-inner" style="height: 370px;">
                   <img src="<?php echo base_url().'assets/images/'.$post_image;?>" alt="Law and Order"/>
                   <strong class="title"><?php echo $post_judul;?></strong>
                   <span><?php echo $post_tglpost.' | '.$post_author;?></span>
                   <p><?php echo limit_words($post_isi,10).'...';?></p>
                </div>
               </div>
          </figure>
          </a>
        <?php endforeach ?>
        </figure>
        <div class="btn-bar" style="margin-bottom: 25px;"><a href="<?php echo base_url().'Artikel/'?>" class="see-btn" target="_blank"><strong class="title">Lihat Lagi</strong></a></div>
      </figure>
<!-- artikel -->

     <!--  <figure class="span12" style="margin-top: 22px;margin-left: 4px;">
        <h2 style='border-bottom: 6px solid #3a813c;margin-left: 10px;'>Kerja Sama</h2>
          
        <?php foreach ($kerjasama->result_array() as $i):
              $post_id=$i['tulisan_id'];
              $post_judul=$i['tulisan_judul'];
              $post_isi=$i['tulisan_isi'];
              $post_author=$i['tulisan_author'];
              $post_image=$i['tulisan_gambar'];
              $post_tglpost=$i['tanggal'];
              $post_slug=$i['tulisan_slug'];
         ?>
         <a href="<?php echo base_url().'Artikel/'.$post_slug;?>">
          <figure class="span4 services">
               <div class="slid-holder b0">
                <div class="slid-holder-inner">
                   <img src="<?php echo base_url().'assets/images/'.$post_image;?>" alt="Law and Order"/>
                   <strong class="title"><?php echo $post_judul;?></strong>
                   <span><?php echo $post_tglpost.' | '.$post_author;?></span>
                   <p><?php echo limit_words($post_isi,16).'...';?></p>
                </div>
               </div>
          </figure>
          </a>
        <?php endforeach ?>
        </figure>
        <div class="btn-bar" style="margin-bottom: 25px;"><a href="<?php echo base_url().'Artikel/kategori/5'?>" class="see-btn">Lihat Lagi</a></div>

      <figure class="span12" style="margin-top: 22px;margin-left: 4px;">
        <h2 style='border-bottom: 6px solid #3a813c;margin-left: 10px;'>Pengumuman</h2>
          
        <?php foreach ($pengumuman->result_array() as $i):
              $post_id=$i['tulisan_id'];
              $post_judul=$i['tulisan_judul'];
              $post_isi=$i['tulisan_isi'];
              $post_author=$i['tulisan_author'];
              $post_image=$i['tulisan_gambar'];
              $post_tglpost=$i['tanggal'];
              $post_slug=$i['tulisan_slug'];
         ?>
         <a href="<?php echo base_url().'Artikel/'.$post_slug;?>">
          <figure class="span4 services">
               <div class="slid-holder b0">
                <div class="slid-holder-inner">
                   <img src="<?php echo base_url().'assets/images/'.$post_image;?>" alt="Law and Order"/>
                   <strong class="title"><?php echo $post_judul;?></strong>
                   <span><?php echo $post_tglpost.' | '.$post_author;?></span>
                   <p><?php echo limit_words($post_isi,16).'...';?></p>
                </div>
               </div>
          </figure>
          </a>
        <?php endforeach ?>
        </figure>
        <div class="btn-bar" style="margin-bottom: 25px;"><a href="<?php echo base_url().'Artikel/kategori/7'?>" class="see-btn">Lihat Lagi</a></div>

        <figure class="span12" style="margin-top: 22px;margin-left: 4px;">
        <h2 style='border-bottom: 6px solid #3a813c;margin-left: 10px;'>Agenda</h2>
          
        <?php foreach ($agenda->result_array() as $i):
              $post_id=$i['tulisan_id'];
              $post_judul=$i['tulisan_judul'];
              $post_isi=$i['tulisan_isi'];
              $post_author=$i['tulisan_author'];
              $post_image=$i['tulisan_gambar'];
              $post_tglpost=$i['tanggal'];
              $post_slug=$i['tulisan_slug'];
         ?>
         <a href="<?php echo base_url().'Artikel/'.$post_slug;?>">
          <figure class="span4 services">
               <div class="slid-holder b0">
                <div class="slid-holder-inner">
                   <img src="<?php echo base_url().'assets/images/'.$post_image;?>" alt="Law and Order"/>
                   <strong class="title"><?php echo $post_judul;?></strong>
                   <span><?php echo $post_tglpost.' | '.$post_author;?></span>
                   <p><?php echo limit_words($post_isi,16).'...';?></p>
                </div>
               </div>
          </figure>
          </a>
        <?php endforeach ?>
        </figure>
        <div class="btn-bar" style="margin-bottom: 25px;"><a href="<?php echo base_url().'Artikel/kategori/8'?>" class="see-btn">Lihat Lagi</a></div>
</figure> -->

<!-- akhir artikel -->

<figure class="span3" style="width: 245px;margin-left: 63px;margin-top: 35px;">
  <blockquote>
  <h2 style='border-bottom: 6px solid #3a813c;width: 243px;margin-left: -15px;'></h2>
          <!-- Carousel -->
          <?php
          $b = $portofolio->row_array();
          $nama = $b['port_nama'];
          $deskripsi = $b['port_deskripsi'];
          $image = $b['port_image']
          ?>
            <div class="slid-holder">
              <div class="slid-holder-inner">
                    <div class="mini-slider">
                      <ul id="carousel" class="elastislide-list">
                            <li style="margin-right: 0px;"">
                              <a href="<?php echo base_url().'Home/kataSambutan'?>"><img src="<?php echo base_url().'assets/images/'.$image?>" alt="Ir. Mattobi'i, MP" /></a>
                              <strong class="candidate-name"><?php echo $nama?></strong>
                            </li>
                        </ul>
                    </div>
          <strong class="title2" style="font-size: 24px;"> Kepala Sekolah</strong>
                    <p ><?php echo limit_words($deskripsi,4).'...';?></p>

        </div>
                
            </div>
            <!-- Carousel End -->
            </blockquote>

            <blockquote>
                 <h2 style='border-bottom: 6px solid #3a813c;width: 243px;margin-left: -15px;'></h2>
          <!-- Carousel -->
                        <h2 style="margin-top: -20px;">Tautan</h2>
                        <span class="border-line m-bottom" style="margin-top: 5px;margin-left: -19px;"></span>
                          <ul class="nav nav-list">
                          <?php foreach($tautan->result_array() as $row):

                            $id = $row['tulisan_id'];
                            $judul = $row['tulisan_judul'];
                            $link = $row['tulisan_link'];
                            $gambar = $row['tulisan_gambar'];
                            ?>  
                            <li>
                          <a title="<?php echo $judul ?>" href="<?php echo $link; ?>" target="_blank">
                          <table>
                            <tr>
                              <td width="55px"><img src="<?php echo base_url().'assets/images/'.$gambar?>" style="width: 50px;height:50px;margin-right: 9px;"></td>
                              <td><?= $judul ?></td>
                            </tr>
                          </table>
                          </a>
                        </li>

                            <?php endforeach; ?>
                           <!--  <li><a href="http://bppsdmp.pertanian.go.id/id" target="blank"><img src="<?php echo base_url().'assets/images/Kementan.png'?>" style="width: 36px;margin-right: 9px;">BPPSDMP</a></li>
                            <li ><a href="http://www.pertanian.go.id/" target="blank"><img src="<?php echo base_url().'assets/images/Kementan.png'?>" style="width: 36px;margin-right: 9px;">KEMENTAN</a></li>
                            <li ><a href="http://cybex.pertanian.go.id/" target="blank"><img src="<?php echo base_url().'assets/images/cybex.png'?>" style="width: 36px;margin-right: 9px;">Cyber Extension</a></li>
                            <li ><a href="http://www.sumselprov.go.id/index.php?module=content&id=1" target="blank"><img src="<?php echo base_url().'assets/images/sumsel.png'?>" style="width: 36px;margin-right: 9px;">Provinsi SUMSEL</a></li>
                            <li ><a href="http://banyuasinkab.go.id/" target="blank"><img src="<?php echo base_url().'assets/images/banyuasin.png'?>" style="width: 36px;margin-right: 9px;">Kabupaten Bayuasin</a></li>
                            <li ><a href="http://www.spmabanjarbaru.sch.id/" target="blank"><img src="<?php echo base_url().'assets/images/banjarbaru.png'?>" style="width: 36px;margin-right: 9px;">SMK PP N Banjar Baru</a></li>
                            <li><a href="http://sppsembawa.ppid.pertanian.go.id/" target="blank"><img src="<?php echo base_url().'assets/images/Kementan.png'?>" style="width: 36px;margin-right: 9px;">Portal PPID</a></li> -->
                          </ul>               
            <!-- Carousel End -->
            </blockquote>

            <blockquote style="margin-top: 35px;">
                 <h2 style='border-bottom: 6px solid #3a813c;width: 243px;margin-left: -15px;'></h2>
          <!-- Carousel -->
                        <h3 style="margin-top: -20px;">Pengunjung Hari Ini</h3>
                        <span class="border-line m-bottom" style="margin-top: 5px;margin-left: -19px;"></span>
                          <ul class="a-list">
                            <li style="margin-left: 13px;"><?php echo $visitor?></li>
                          </ul>

                        <h3 style="margin-top: 0px;">Total Pengunjung</h3>
                        <span class="border-line m-bottom" style="margin-top: 5px;margin-left: -19px;"></span>
                          <ul class="a-list">
                            <li style="margin-left: 13px;"><?php echo $total?></li>
                          </ul>      
            <!-- Carousel End -->
            </blockquote>
            <blockquote style="margin-top: 35px;">
              <h2 style='border-bottom: 6px solid #3a813c;width: 243px;margin-left: -15px;'></h2>
              <script type="text/javascript">
                        $(function() {
                          $("#datepicker1").datepicker({
                            numberOfMonths:1
                          }); 
                        });
                        function getDate(){
                            var date = new Date($("#datepicker1").val());
                            $.ajax({
                              method: "POST",
                              url: "<?= base_url() ?>Agenda_view/getAgenda",
                              data: {
                                date : date.getDate(),
                                bln : date.getMonth() + 1,
                                thn : date.getFullYear()
                              },
                              success: function (result) {
                                console.log(result);
                                $('#agendaa').html(result)  
                            }})
                        }

                      </script>
                      <script>
                        
                        $(document).on('click', '.ui-datepicker-next', function () {
                          $('#agendaa').html(`
                            <hr>
                            <p><b>Klik Tanggal Pada Kalender Untuk Melihat Agenda</b></p>
                          `);
                          $('#agendaByBulan').remove(); 
                        })

                        $(document).on('click', '.ui-datepicker-prev', function () {
                          $('#agendaa').html(`
                            <hr>
                            <p><b>Klik Tanggal Pada Kalender Untuk Melihat Agenda</b></p>
                          `);
                          $('#agendaByBulan').remove(); 
                        })

                      </script>

                      <div id="datepicker1" onchange="getDate()" ></div>   
<!-- agenda start -->
        <div id="agendaa">
          <hr>
          <p><b>Klik Tanggal Pada Kalender Untuk Melihat Agenda</b></p>
        </div>
      </blockquote>
<!-- agenda end -->

            <blockquote style="margin-top: 35px;">
                 <h2 style='border-bottom: 6px solid #3a813c;width: 243px;margin-left: -15px;'></h2>
          <!-- Carousel -->
                        <h2 style="margin-top: -20px;">Jejak Pendapat</h2>
                        <p style="margin-bottom: 6px;margin-top: -1px;">Mulai Tahun 2018, SMK PP NEGERI SEMBAWA akan berubah menjadi POLITEKNIK PEMBANGUNAN PERTANIAN ?</p>
                        <p> <?php echo $this->session->flashdata('msg');?></p>
                        <p><a href="<?php echo base_url().'Home/kirim_pendapat'?>"><button type="button" class="btn btn-success"><i class="icon-ok icon-white" style="margin-right:6px;"></i>Submit</button></a>
                          <a href="<?php echo base_url().'Home/lihat_hasil'?>"><button type="button" class="btn btn-info"><i class="icon-signal icon-white" style="margin-right:6px;"></i>Lihat Hasil</button></a></p>
            <!-- Carousel End -->
            </blockquote>
</figure>
         
</section>
</section>  
       
	 
    