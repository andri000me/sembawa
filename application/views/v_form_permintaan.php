<style type="text/css">
  
.widget h3{
  font-family: 'Merriweather', serif;
  font-size: 19px;
  font-weight: bold;
}  

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

  
  <section class="content-holder b-none inner_content" style="margin-top: 150px;">
  
    <section class="container container-fluid">

            <section class="row-fluid">

    <h2 class="heading">Form Permintaan Informasi Publik</h2>
    <span class="border-line m-bottom" style="margin-top: 5px;margin-left: -19px;"></span>
<div class="container">
  <div class="row">
  <section class="page_content">
    <section class="span9 first" style="margin-top: -44px;">
              <form id="contact_us" name="contact_us" action="<?php echo base_url().'Informasi/kirim_form_permintaan'?>" method="post">
                <table class="table table-container">
                  <tr><?php echo $this->session->flashdata('msg');?></tr>
                  <tr>
                    <td><h2> Nama </h2>
                      <input type="text" placeholder="Nama" name="xnama" required /></td>
                  </tr>
                  <tr>
                    <td><h2> No.KTP </h2>
                      <input type="text" placeholder="NoKTP" name="xnoktp" required /></td>
                  </tr>
                  <tr>
                    <td><h2> Alamat </h2>
                      <input type="text" placeholder="Alamat" name="xalamat" required /></td>
                  </tr>
                  <tr>
                    <td><h2> Email </h2>
                    <input type="text" placeholder="Email" name="xemail" required /></td>
                  </tr>
                  <tr>
                    <td><h2> No.Handphone </h2>
                      <input type="text" placeholder="kontak" name="xkontak" required /></td>
                  </tr>
                  <tr>
                    <td><h2> Pertanyaan / Rincian Informasi yang dibutuhkan </h2>
                      <input type="text" placeholder="" name="xpertanyaan" required /></td>
                  </tr>
                  
                  <tr>
                    <td><h2> Tujuan Penggunaan Informasi </h2>
                    <input type="text" placeholder="" name="xtujuan" required /></td>
                  </tr>
                  <tr>
                    <td>
                      <h2>Cara Memperoleh Informasi</h2>                        
                               <p><input type="radio" nama="xmemperoleh" value="melihat">Melihat</p>
                               <p><input type="radio" nama="xmemperoleh" value="membaca">Membaca</p>
                               <p><input type="radio" nama="xmemperoleh" value="mendengar">Mendengar</p>
                               <p><input type="radio" nama="xmemperoleh" value="mencatat">Mencatat</p>                      
                    </td>
                  </tr>
                  <br>
                  <tr>
                    <td>
                      <h2>Cara Mendapat Salinan Informasi</h2>                        
                               <p><input type="radio" nama="xmendapat" value="Hard Copy">Hard Copy</p>
                               <p><input type="radio" nama="xmendapat" value="Soft Copy">Soft Copy</p>                      
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <h2>Cara Mendapatkan Salinan Informasi</h2>                       
                               <p><input type="radio" nama="xmendapatkan" value="mengambil langsung" disabled="disable">Mengambil Langsung</p>
                               <p><input type="radio" nama="xmendapatkan" value="kurir">Kurir</p>
                               <p><input type="radio" nama="xmendapatkan" value="POS">POS</p>
                               <p><input type="radio" nama="xmendapatkan" value="faximile">Faximile</p>
                               <p><input type="radio" nama="xmendapatkan" value="email">Email</p>                     
                    </td>
                  </tr>

                  <tr>
                    <td>
                      
                      <input type="submit" class="btn btn-success" value="Submit" name="submit" style="margin-top: 2px;" />
                    </td>
                  </tr>
                </table>
              </form>
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
                              <a href="#"><img src="<?php echo base_url().'assets/images/'.$image?>" alt="Ir. Mattobi'i, MP" /></a>
                              <strong class="candidate-name"><?php echo $nama?></strong>
                            </li>
                        </ul>
                    </div>
          <strong class="title2" style="font-size: 24px;"> Kepala Sekolah</strong>
                    <p><?php echo limit_words($deskripsi,4).'...';?></p>

        </div>
                
            </div>
            <!-- Carousel End -->
            </blockquote>
            <blockquote>
                 <h2 style='border-bottom: 6px solid #3a813c;width: 243px;margin-left: -15px;'></h2>
          <!-- Carousel -->
                        <h2 style="margin-top: -1px;">Tautan</h2>
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
            <!-- Carousel End -->
            </figure>
  </section>
 
  </section>
  