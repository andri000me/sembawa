
  
	</section>

	
  <section class="content-holder b-none inner_content" style="margin-top: 50px;">
  
  	<section class="container-fluid">

	          <section class="row-fluid">

		<h2 class="heading" style="margin-left: 74px;"> Setiap Saat</h2>
		<span class="border-line m-bottom" style="margin-top: 5px;margin-left: 60px;width: 1200px;"></span>

	<section class = "page_content">
		<section class="span9" style="width: 900px;margin-right: 66px;margin-left: 32px;">
	<figure class="span12" style="margin-top: 22px;margin-left: 4px;">
          <figure class="span4 services">
          	<a href="http://perundangan.pertanian.go.id/">
               <div class="slid-holder b0">
                <div class="slid-holder-inner">
                   <img src="<?php echo base_url().'assets/images/Kementan.png'?>" alt="Kementan"/>
                   <strong class="title">Produk Peraturan Perundang-Undangan Yang Telah Diundangkan</strong>
                </div>
               </div>
               </a>
          </figure>
          <figure class="span4 services">
          	<a href="http://www.pertanian.go.id/ap_pages/mod/publik">
               <div class="slid-holder b0">
                <div class="slid-holder-inner">
                   <img src="<?php echo base_url().'assets/images/Kementan.png'?>" alt="Kementan"/>
                   <strong class="title">Prosedur Kerja Kementerian Pertanian</strong>
                </div>
               </div>
               </a>
          </figure>
          <figure class="span4 services">
          	<a href="http://www.pertanian.go.id/assets/upload/doc/PAPARAN_BIRO_PERENCANAAN_PRAMUSREN2015.pdf">
               <div class="slid-holder b0">
                <div class="slid-holder-inner">
                   <img src="<?php echo base_url().'assets/images/Kementan.png'?>" alt="Kementan"/>
                   <strong class="title">Rencana Kerja Kementerian Pertanian</strong>
                </div>
               </div>
               </a>
          </figure>
          <div>
          <figure class="span4 services">
          	<a href="http://www.pertanian.go.id/assets/upload/doc/RKT_KEMENTAN_2015.pdf">
               <div class="slid-holder b0">
                <div class="slid-holder-inner">
                   <img src="<?php echo base_url().'assets/images/Kementan.png'?>" alt="Kementan"/>
                   <strong class="title">Rencana Tahunan Kementerian Pertanian</strong>
                </div>
               </div>
               </a>
          </figure>
          </div>

      </figure>  
		</section>

	</section>
   <figure class="span3" style="width: 245px;margin-left: 44px;margin-top: 4px;">
  				<blockquote>
          <h2 style='border-bottom: 6px solid #3a813c; width: 243px;margin-left: -15px;'></h2>
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
          <strong class="title2"> Kepala Sekolah</strong>
                    <p><?php echo limit_words($deskripsi,4).'...';?></p>

        </div>
                
            </div>
            <!-- Carousel End -->
            </blockquote>
            <blockquote>
                 <h2 style='border-bottom: 6px solid #3a813c;width: 243px;margin-left: -15px;'></h2>
          <!-- Carousel -->
          <br>
                         <h3 style="margin-top: -20px;">Tautan</h3>
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
                            <p><b>Klik Tanggal Pada Kalender Untuk Melihat Agenda Pada Bulan Tersebut</b></p>
                          `);
                          $('#agendaByBulan').remove(); 
                        })

                        $(document).on('click', '.ui-datepicker-prev', function () {
                          $('#agendaa').html(`
                            <hr>
                            <p><b>Klik Tanggal Pada Kalender Untuk Melihat Agenda Pada Bulan Tersebut</b></p>
                          `);
                          $('#agendaByBulan').remove(); 
                        })

                      </script>

                      <div id="datepicker1" onchange="getDate()" ></div>   
<!-- agenda start -->
        <div id="agendaa">
          <hr>
          <p><b>Klik Tanggal Pada Kalender Untuk Melihat Agenda Pada Bulan Tersebut</b></p>
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
            <!-- Carousel End -->
            </figure>
	</section>
 
  </section>
  