</section>


<?php
	error_reporting(0);
    $b=$data->row_array();
    $title=$b['pengumuman_judul'];
    $id = $b['pengumuman_id'];
    $author=$b['pengumuman_author'];
    $date=$b['tanggal'];
    $deskripsi=strip_tags($b['pengumuman_deskripsi']);
    $gambar = $b['tulisan_gambar'];
?>

<section class="content-holder b-none inner_content" style="margin-top: 150px;">

	<section class="container container-fluid">

		<section class="row-fluid">
			<h2 class="heading">PPDB</h2>
			<span class="border-line m-bottom" style="margin-top: 5px;margin-left: -19px;"></span>

			<section class="page_content">
				<section class="span9 first">
					<?php foreach($data->result_array() as $row) :

			$judul = $row['pengumuman_judul'];
			$id = $row['pengumuman_id'];
			$gambar = $row['tulisan_gambar'];
			$deskripsi = $row['pengumuman_deskripsi'];	
						$i=0;
			?>

		<?php if($gambar == null) { 
			echo (" ");
			?>

			<?php } else { ?>
		
			<figure class="span12"> 
			<a data-toggle="lightbox" href="#<?php echo $id ?>" > 

			<div class="row mt" >
				<div class="col-lg-6">
					<div class="content-panel">
						<div class="panel-body text-center">
							<div class='lightbox-content'>
								<img src="<?php echo base_url().'assets/images/'.$gambar;?>" title="<?php echo $judul ?>" alt="<?php echo $judul; ?>"  style="object-fit: cover; width: 450px;" /> 
							</div>
						</div>
					</div>
				</div>
			</div>

			</a> 
			</figure>
				 
			<div id="<?php echo $id ?>" class="lightbox hide fade"  tabindex="-1" role="dialog" aria-hidden="true">
              <div class='lightbox-header'>
                <button type="button" class="close" data-dismiss="lightbox" aria-hidden="true">&times;</button>
              </div>
              <div class='lightbox-content'> <img src="<?php echo base_url().'assets/images/'.$gambar;?>" alt="" >
              </div>
			</div> 
			
			<?php }  ?>

			<p style="font-family: 'Times New Roman';"> <?php echo $deskripsi?> </p> 

		<?php endforeach; ?>

			
			
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
										<li style="margin-right: 0px;">
											<a href="#"><img src="<?php echo base_url().'assets/images/'.$image?>"
													alt="Ir. Mattobi'i, MP" /></a>
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
											<td width="55px"><img src="<?php echo base_url().'assets/images/'.$gambar?>"
													style="width: 50px;height:50px;margin-right: 9px;"></td>
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
							$(function () {
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
										date : date.getDate(),
										bln: date.getMonth() + 1,
										thn: date.getFullYear()
									},
									success: function (result) {				
										$('#agendaa').html(result)
									}
								})
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

						<div id="datepicker1" onchange="getDate()"></div>
						<!-- agenda start -->
						<div id="agendaa">
							<hr>
							<p><b>Klik Tanggal Pada Kalender Untuk Melihat Agenda Pada Bulan Tersebut</b></p>
						</div>
					</blockquote>
					<!-- agenda end -->

					</blockquote>
					<blockquote style="margin-top: 35px;">
						<h2 style='border-bottom: 6px solid #3a813c;width: 243px;margin-left: -15px;'></h2>
						<!-- Carousel -->
						<h3 style="margin-top: -7px;">Jejak Pendapat</h3>
						<p style="margin-bottom: 6px;margin-top: -1px;">Mulai Tahun 2018, SMK PP NEGERI SEMBAWA akan
							berubah menjadi POLITEKNIK PEMBANGUNAN PERTANIAN ?</p>
						<p> <?php echo $this->session->flashdata('msg');?></p>
						<p><a href="<?php echo base_url().'Home/kirim_pendapat'?>"><button type="button"
									class="btn btn-success"><i class="icon-ok icon-white"
										style="margin-right:6px;"></i>Submit</button></a>
							<a href="<?php echo base_url().'Home/lihat_hasil'?>"><button type="button"
									class="btn btn-info"><i class="icon-signal icon-white"
										style="margin-right:6px;"></i>Lihat Hasil</button></a></p>
						<!-- Carousel End -->
					</blockquote>
					<!-- Carousel End -->
				</figure>
			</section>

		</section>

	</section>

