<style type="text/css">

.dataTables_wrapper{
  overflow: auto;
  overflow-x: auto;
  overflow-y: auto;
}

body{
  table-layout: fixed;
}

</style>

  </section>

	<br><br><br>
  <section class="content-holder b-none inner_content" style="margin-top: 100px;">
  
  	<section class="container container-fluid">

	          <section class="row-fluid">

		<h2 class="heading">Profil</h2>
		<span class="border-line m-bottom" style="margin-top: 1px;margin-left: -19px;"></span>

	<section class="page_content" style="margin-top: -30px;">
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
				
				<span> Posted by:  <a href="#"> <?php echo $author;?> </a> </span> 
				<span> Dilihat: <a href="#"><?php echo $views;?></a></span>
				<span> Tanggal: <a href="#"><?php echo $date;?></a></span>  
				</figure>
				<figure class="post_description">
        <h2>Kata Sambutan</h2>
          
        <p>
Assalamualaikum Warahmatullahi Wabarakatuh
Alhamdulillah, syukur kehadirat Tuhan Yang Maha Esa, dengan rahmat dan karunia-Nya akhirnya website sekolah ini telah selesai diperbaharui. Kami mengucapkan selamat datang di website Sekolah Menengah Kejuruan Pertanian Pembangunan (SMK PP) Negeri Sembawa, Sumatera Selatan. Di era global yang ditandai dengan makin pesatnya Teknologi Informasi, tidak dipungkiri bahwa keberadaan sebuah website untuk suatu instansi menjadi sebuah keharusan. Website tersebut dapat digunakan sebagai sarana informasi dan komunikasi pihak sekolah dengan siswa, alumni, dan stake holder secara luas.
Selanjutnya, website sekolah ini harus dapat berfungsi sebagai media untuk mendukung proses pembelajaran di sekolah. Guru dapat menuliskan materi pembelajaran sekaligus memberikan Tugas-Tugas Mandiri kepada peserta didik, sehingga akan menunjang kegiatan pembelajaran berbasis Teknologi Informasi. Selain itu juga website juga dapat menjadi sarana promosi sekolah yang cukup efektif. Kami menyadari sepenuhnya, bahwa website sekolah kami masih terdapat banyak kekurangan, oleh karena itu kepada seluruh civitas akademika dan masyarakat umum dapat memberikan saran dan kritik yang membangun demi kemajuan website ini lebih lanjut.
Mari kita bekerja dan berkarya untuk kemajuan SMK PP Negeri Sembawa yang Religius, Disiplin, dan Mandiri.
Wassalamualaikum Warahmatullohi Wabarokatuh.
</p>
  
				</figure>
			</article>
		</section>
		<figure class="span3" style="width: 245px;margin-left: 44px;margin-top: 35px;">
			<blockquote>
  			<h2 style='border-bottom: 6px solid #3d843e; width: 243px;margin-left: -15px;'></h2>
          <!-- Carousel -->
          <?php
          $b = $portofolio1->row_array();
          $nama = $b['port_nama'];
          $deskripsi = $b['port_deskripsi'];
          $image = $b['port_image']
          ?>
            <div class="slid-holder">
              <div class="slid-holder-inner">
                    <div class="mini-slider">
                      <ul id="carousel" class="elastislide-list">
                            <li style="margin-right: 0px;"">
                              <a href="#"><img src="<?php echo base_url().'assets/images/'.$image?>" alt="Ir. Mattobi'i, MP" /></a>
                              <strong class="candidate-name"><?php echo $nama?></strong>
                            </li>
                        </ul>
                    </div>
          <strong class="title2" style="font-size: 24px;"> Kepala Sekolah</strong>
                    <p><?php echo limit_words($deskripsi,4).'...';?></p>

        </div>
                
            </div>
            </blockquote>
            <!-- Carousel End -->

            <blockquote>
                 <h2 style='border-bottom: 6px solid #3a813c;width: 243px;margin-left: -15px;'></h2>
          <!-- Carousel -->
                        <h3 style="margin-top: -1px;">Tautan</h3>
                        <span class="border-line m-bottom" style="margin-top: 5px;margin-left: -10px;"></span>
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
                              </ul>                            
            <!-- Carousel End -->
            </blockquote>

            <blockquote style="margin-top: 35px;">
                 <h2 style='border-bottom: 6px solid #3a813c;width: 243px;margin-left: -15px;'></h2>
          <!-- Carousel -->
                        <h3 style="margin-top: -1px;">Pengunjung Hari Ini</h3>
                          <ul class="a-list">
                            <li style="margin-left: 13px;"><?php echo $visitor?></li>
                          </ul>

                        <h3 style="margin-top: 0px;">Total Pengunjung</h3>
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
                        <h3 style="margin-top: -7px;">Jejak Pendapat</h3>
                        <p style="margin-bottom: 6px;margin-top: -1px;">Mulai Tahun 2018, SMK PP NEGERI SEMBAWA akan berubah menjadi POLITEKNIK PEMBANGUNAN PERTANIAN ?</p>
                        <p> <?php echo $this->session->flashdata('msg');?></p>
                        <p><a href="<?php echo base_url().'Home/kirim_pendapat'?>"><button type="button" class="btn btn-success"><i class="icon-ok icon-white" style="margin-right:6px;"></i>Submit</button></a>
                          <a href="<?php echo base_url().'Home/lihat_hasil'?>"><button type="button" class="btn btn-info"><i class="icon-signal icon-white" style="margin-right:6px;"></i>Lihat Hasil</button></a></p>
            <!-- Carousel End -->
            </blockquote>
            </figure>
	</section>
   
	</section>
 
  </section>
  
 
 <!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script> -->
        <script type="text/javascript" src="http://malsup.github.com/jquery.media.js"></script>
        <script type="text/javascript">
            $(function () {
                $('.media').media({width: 600});
            });
</script>