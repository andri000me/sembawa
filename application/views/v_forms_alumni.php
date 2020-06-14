<style type="text/css">
	
label{
	font-family: Times ;
	font-size: 23px ;
	padding-top:18px;
	padding-bottom: 18px;
}


.radio{
	font-size: 20px;
}

table{
	width:90%;
	padding-bottom: 20px;
}

th{
	text-align: left;
}

.checkbox{
	text-align:center;
	padding-left:5px ;
}

.input-field-border-bottom {
      border: 1px solid #ddd;
      display: inline-block;
      width:100%;
      padding-bottom: 5em;
      padding-left:1em; 
     
 }

 .input-field-border-bottom input[type="text"],input[type="number"],input[type="date"],input[type="email"],
 .input-field-border-bottom textarea {
      border: none;
      border-bottom: 1px solid #ddd;
      color: #333;
      font-size: 14px;
      margin-bottom: 15px;
      padding: 0.5em 1em 0.5em 0;
      width: 30px;     /* Ukuran bebas */
 }

 .input-field-border-bottom input[type="text"]:focus,
 .input-field-border-bottom textarea:focus {
      border-bottom: 1px solid #000;
      outline: none;
 }






</style>
  
	</section>

  <section class="content-holder b-none inner_content" style="margin-top: 100px;">
  
  	<section class="container container-fluid">

	          <section class="row-fluid">

		<h2 class="heading">Form Alumni</h2>
		<span class="border-line m-bottom" style="margin-top: 5px;margin-left: -19px;"></span>
		
	<section class="page_content">
		<section class="span9 first">

			<div class="container-fluid" style="width:100%;height:125;" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen>
				<div class="row">
			
			<div>	
        <form action="<?php echo base_url().'Civitas/add_alumni'?>" method="post">
				<h1>Form Alumni SMK-PP Negeri Sembawa </h1>
 				<div class="form-group">
   			 		 <label for="text">Nama :</label>
   					 <input type="text" class="form-control" name="nama" id="text" style="width:340px;height:25px;background-color:white;" required/>
  				</div>
  				<div class="form-group">
   			 		 <label for="kelamin">Jenis Kelamin :</label>
   			 		 <label class="radio">
   					 <input type="radio" class="form-control" name="kelamin" id="kelamin" value="laki-laki" required/>Laki-laki
   					 </label>
   					 <label class="radio">
   					 <input type="radio" class="form-control" name="kelamin" id="kelamin" value="perempuan" required/>Perempuan
   					 </label>
  				</div>
  				<div class="form-group">
   			 		 <label for="tempat">Tempat Lahir :</label>
   					 <input type="text" class="form-control" name="tempat_lahir" id="tempat" style="width:340px;height:25px;background-color:white;" required/>
  				</div>
  				<div class="form-group">
   			 		 <label for="tanggal">Tanggal Lahir :</label>
   					 <input type="date" class="form-control" name="tanggal_lahir" id="tanggal" placeholder="DD/MM/YY" style="width:340px;height:25px;background-color:white;" required/>
  				</div>
  				<div class="form-group">
   			 		 <label for="tahun">Tahun Lulus :</label>
   					 <input type="number" class="form-control" name="tahun_lulus" id="tahun" style="width:340px;height:25px;background-color:white;" required/>
  				</div>
  				<div class="form-group">
   			 		 <label for="jurusan">Jurusan/Program Studi Pend. Terakhir :</label>
   					 <input type="text" class="form-control" name="jurusan" id="jurusan" style="width:340px;height:25px;background-color:white;" required/>
  				</div>
  				<div class="form-group">
   			 		 <label for="pendidikan">Pendidikan Terakhir :</label>
   			 		 <label class="radio">
   					 <input type="radio" class="form-control" name="pendidikan" id="pendidikan" value="SMK" required/>SMK
   					 </label>
   					 <label class="radio">
   					 <input type="radio" class="form-control" name="pendidikan" id="pendidikan" value="D3" required/>D2/D3
   					 </label>
   			 		 <label class="radio">
   					 <input type="radio" class="form-control" name="pendidikan" id="pendidikan" value="S1" required/>D4/S1
   					 </label>
   					 <label class="radio">
   					 <input type="radio" class="form-control" name="pendidikan" id="pendidikan" value="S2" required/>S2
   					 </label>
   					 <label class="radio">
   					 <input type="radio" class="form-control" name="pendidikan" id="pendidikan" value="S3" required/>S3
   					 </label>
  				</div>
  				<div class="form-group">
  					<label for="pendidikan">Pekerjaan :</label>
   			 		 <table>
   			 		 	<tr>
   			 		 		<th></th>
   			 		 		<th>Pertanian</th>
   			 		 		<th>Non Pertanian</th>
   			 		 		<th>Lain-lain</th>
   			 		 	</tr>
   			 		 	<tr>
   			 		 		<td>Wirausahawan</td>
   			 		 		<td>
    						<input type="radio" class="radio" name="wirausahawan" alt="radio" value="Wirausahawan-Pertanian">
  							</td>
  							<td>
    						<input type="radio" class="radio" name="wirausahawan" alt="radio" value="Wirausahawan-Non pertanian">
  							</td>
  							<td>
    						<input type="radio" class="radio" name="wirausahawan" alt="radio" value="Wirausahawan-Lain-lain">
  							</td>
   			 		 	</tr>
   			 		 	<tr>
   			 		 		<td style="background-color: #999;">Swasta</td>
   			 		 		<td style="background-color: #999;">
    						<input type="radio" class="radio" name="swasta"  alt="radio" value="Swasta-Pertanian">
  							</td>
  							<td style="background-color: #999;">
    						<input type="radio" class="radio" name="swasta"  alt="radio" value="Swasta-Non pertanian">
  							</td>
  							<td style="background-color: #999;">
    						<input type="radio" class="radio" name="swasta"  alt="radio" value="Swasta-Lain-lain">
  							</td>
   			 		 	</tr>
   			 		 	<tr>
   			 		 		<td>Mahasiswa</td>
   			 		 		<td>
    						<input type="radio" class="radio" name="mahasiswa"  alt="radio" value="Mahasiswa-Pertanian">
  							</td>
  							<td>
    						<input type="radio" class="radio" name="mahasiswa"  alt="radio" value="Mahasiswa-Non pertanian">
  							</td>
  							<td>
    						<input type="radio" class="radio" name="mahasiswa"  alt="radio" value="Mahasiswa-Lain-lain">
  							</td>
   			 		 	</tr>
   			 		 	<tr>
   			 		 		<td style="background-color: #999;">Pemerintah</td>
   			 		 		<td style="background-color: #999;">
    						<input type="radio" class="radio" name="pemerintah" alt="radio" value="Pemerintah-Pertanian">
  							</td>
  							<td style="background-color: #999;">
    						<input type="radio" class="radio" name="pemerintah" alt="radio" value="Pemerintah-Non pertanian">
  							</td>
  							<td style="background-color: #999;">
    						<input type="radio" class="radio" name="pemerintah" alt="radio" value="Pemerintah-Lain-lain">
  							</td>
   			 		 	</tr>
   			 		 	<tr>
   			 		 		<td>Belum Bekerja</td>
   			 		 		<td>
    						<input type="radio" class="radio" name="belum_bekerja" alt="radio" value="Belum Bekerja">
  							</td>
  							<td>
    						<input type="radio" class="radio" name="belum_bekerja" alt="radio" value="Belum Bekerja">
  							</td>
  							<td>
    						<input type="radio" class="radio" name="belum_bekerja" alt="radio" value="Belum Bekerja">
  							</td>
   			 		 	</tr>
   			 		 </table>
  				</div>
  				<div class="form-group">
   			 		 <label for="jabatan">Jabatan serta nama Perguruan Tinggi/Perusahaan/Instansi :</label>
   					 <input type="text" class="form-control" name="jabatan" id="jabatan" style="width:340px;height:25px;background-color:white;" required/>
  				</div>
  				<div class="form-group">
   			 		 <label for="rumah">Rumah :</label>
   					 <input type="text" class="form-control" name="rumah" id="rumah" style="width:340px;height:25px;background-color:white;" required/>
  				</div>
  				<div class="form-group">
   			 		 <label for="kantor">Kantor :</label>
   					 <input type="text" class="form-control" name="kantor" id="kantor" style="width:340px;height:25px;background-color:white;" required/>
  				</div>
  				<div class="form-group">
   			 		 <label for="nomor">No Hp :</label>
   					 <input type="number" class="form-control" name="no_hp" id="nomor" style="width:340px;height:25px;background-color:white;" required/>
  				</div>
  				<div class="form-group">
   			 		 <label for="email">Email :</label>
   					 <input type="email" class="form-control" name="email" id="email" style="width:340px;height:25px;background-color:white;" required/>
  				</div>
  				<div class="form-group">
   			 		 <label for="kesan">Pesan dan Kesan :</label>
   					 <input type="text" class="form-control" name="kesan" id="kesan" style="width:340px;height:25px;background-color:white;" required/>
  				</div>
  				<button type="submit" class="btn btn-primary" style="width:80px;margin-top:30px;height:35px;">Kirim</button>
			</form>
		</div>
	</div>
		
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
 
  </section>
  