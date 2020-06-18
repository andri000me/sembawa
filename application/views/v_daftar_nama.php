<style type="text/css">
  .dataTables_wrapper {
    overflow: auto;
    overflow-x: auto;
    overflow-y: auto;
  }

  body {
    table-layout: fixed;
  }
  td  {
    vertical-align: top;
  }
  
</style>

</section>

<br><br><br>
<section class="content-holder b-none inner_content" style="margin-top: 100px;">

  <section class="container container-fluid">

    <section class="row-fluid">

      <h2 class="heading"><?= $title ?></h2>
      <span class="border-line m-bottom" style="margin-top: 1px;margin-left: -19px;"></span>

      <section class="page_content" style="margin-top: -30px;">
        <section class="span9 first">
          <article class="blog_detail_wrapper">
            <?php
            $top = 0;
            foreach ($data->result_array() as $i) :
              $id = $i['id'];
              $nama = $i['nama'];
              $telepon = $i['telfon'];
              $jabatan = $i['jabatan'];
              $alamat = $i['alamat'];
              $pendidikan = $i['pendidikan'];
              $gambar = 'assets/images/pejabat_background/' . $i['gambar'];
            ?>
              <figure class="post_description">
                <center>
                  <h4><?= $jabatan ?></h4>
                </center>
                <br>
                <center><img src="<?= base_url() . $gambar ?>" style="width:150px;height:200px;"></center>
                
                <table style="margin: 40px; font-size: 17px; font-family: droig-reg; margin-bottom: 120px;" >
                <tr>
                  <td> Nama</td>
                  <td> :</td>
                  <td> <?=$nama?></td>
                </tr>
                <tr>
                  <td> Telepon Unit Kerja</td>
                  <td> :</td>
                  <td> <?=$telepon?></td>
                </tr>
                <tr>
                  <td> Alamat Unit Kerja</td>
                  <td> :</td>
                  <td> <?=$alamat?></td>
                </tr>
                <tr>
                  <td> Latar Belakang Pendidikan</td>
                  <td> :</td>
                  <td> <?=$pendidikan?></td>
                </tr>
                <tr>
                  <td style="vertical-align: top;"> Penghargaan yang Pernah Diterima</td>
                  <td style="vertical-align: top;"> :</td>
                  <?php $keterangan = $this->m_portfolio->get_penghargaan($id);
                  $no=0;
                  $txt = "";
                  foreach ($keterangan->result_array() as $c) : 
                    $no++;
                    $id = $c['id'];
                    $deskripsi = $c['deskripsi'];
                    $tahun = $c['tahun'];
                    $id_pejabat = $c['id_pejabat'];
                    $txt = $txt."".$no.". ".$deskripsi." <b>(".$tahun.")</b><br><br>";
                  endforeach; 
                  ?>
                  <?php if($txt=="") : ?>
                    <td style="vertical-align: top;"> -</td>
                  <?php else: ?>
                  <td> <?=$txt?></td>
                  <?php endif;?>
                </tr>
                <br>
                <br>
                </table>
              </figure>
            <?php endforeach; ?>
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
                    <li style="margin-right: 0px;">
                      <a href="#"><img src="<?php echo base_url() . 'assets/images/' . $image ?>" alt="Ir. Mattobi'i, MP" /></a>
                      <strong class="candidate-name"><?php echo $nama ?></strong>
                    </li>
                  </ul>
                </div>
                <strong class="title2" style="font-size: 24px;"> Kepala Sekolah</strong>
                <p><?php echo limit_words($deskripsi, 4) . '...'; ?></p>

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
              <?php foreach ($tautan->result_array() as $row) :

                $id = $row['tulisan_id'];
                $judul = $row['tulisan_judul'];
                $link = $row['tulisan_link'];
                $gambar = $row['tulisan_gambar'];
              ?>
                <li>
                  <a title="<?php echo $judul ?>" href="<?php echo $link; ?>" target="_blank">
                    <table>
                      <tr>
                        <td width="55px"><img src="<?php echo base_url() . 'assets/images/' . $gambar ?>" style="width: 50px;height:50px;margin-right: 9px;"></td>
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
              <li style="margin-left: 13px;"><?php echo $visitor ?></li>
            </ul>

            <h3 style="margin-top: 0px;">Total Pengunjung</h3>
            <ul class="a-list">
              <li style="margin-left: 13px;"><?php echo $total ?></li>
            </ul>
            <!-- Carousel End -->
          </blockquote>
          <blockquote style="margin-top: 35px;">
            <h2 style='border-bottom: 6px solid #3a813c;width: 243px;margin-left: -15px;'></h2>
            <script type="text/javascript">
              $(function() {
                $("#datepicker1").datepicker({
                  numberOfMonths: 1
                });
              });

              function getDate() {
                var date = new Date($("#datepicker1").val());
                $.ajax({
                  method: "POST",
                  url: "<?= base_url() ?>Agenda_view/getAgenda",
                  data: {
                    date: date.getDate(),
                    bln: date.getMonth() + 1,
                    thn: date.getFullYear()
                  },
                  success: function(result) {
                    //console.log(result);
                    $('#agendaa').html(result)
                  }
                })
              }
            </script>
            <script>
              $(document).on('click', '.ui-datepicker-next', function() {
                $('#agendaa').html(`
                            <hr>
                            <p><b>Klik Tanggal Pada Kalender Untuk Melihat Agenda</b></p>
                          `);
                $('#agendaByBulan').remove();
              })

              $(document).on('click', '.ui-datepicker-prev', function() {
                $('#agendaa').html(`
                            <hr>
                            <p><b>Klik Tanggal Pada Kalender Untuk Melihat Agenda</b></p>
                          `);
                $('#agendaByBulan').remove();
              })
            </script>

            <div id="datepicker1" onchange="getDate()"></div>
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
            <p> <?php echo $this->session->flashdata('msg'); ?></p>
            <p><a href="<?php echo base_url() . 'Home/kirim_pendapat' ?>"><button type="button" class="btn btn-success"><i class="icon-ok icon-white" style="margin-right:6px;"></i>Submit</button></a>
              <a href="<?php echo base_url() . 'Home/lihat_hasil' ?>"><button type="button" class="btn btn-info"><i class="icon-signal icon-white" style="margin-right:6px;"></i>Lihat Hasil</button></a></p>
            <!-- Carousel End -->
          </blockquote>
        </figure>
      </section>

    </section>

  </section>


  <script type="text/javascript" src="948144aa-b045-11ea-8b25-0cc47a792c0a_id_948144aa-b045-11ea-8b25-0cc47a792c0a_files/wz_jsgraphics.js"></script>