<style type="text/css">
 
.dataTables_wrapper{
  overflow: auto;
  overflow-x: auto;
  overflow-y: auto;
}
</style>
  
	</section>

	
  <section class="content-holder b-none inner_content" style="margin-top: 100px;">
  
  	<section class="container container-fluid">

	          <section class="row-fluid">

		<h2 class="heading">Guru dan Tenaga Kerja</span> </h2>
		<span class="border-line m-bottom" style="margin-top: 5px;margin-left: -19px;"></span>
	<div class="container">
  <div class="row">
  <section class="page_content">
		<section class="span11 first">
			<table class="table table-container" id="myTable">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Foto</th>
                  <th>NIK</th>
                  <th>Nama Lengkap</th>
                  <th>L/P</th>
                  <th>Mata Pelajaran</th>
                  <th>Tempat Lahir</th>
                  <th>Tanggal Lagir</th>
                  <th>Jenis GTK</th>
                </tr>
              </thead>
              <tbody>
          		 <?php
          		 		 $no=0;
                    foreach ($data->result_array() as $i) :
                       $no++;
                       $id=$i['guru_id'];
                       $nik=$i['nik'];
                       $nama=$i['guru_nama'];
                       $jenkel=$i['guru_kelamin'];
                       $mapel=$i['guru_mapel'];
                       $tempat_lahir=$i['guru_tempat'];
                       $tanggal_lahir=$i['guru_tanggal'];
                       $photo=$i['guru_gambar'];
                       $jenis=$i['guru_jenis'];
          		?> 
          		<tr>
          			<td style="text-align: center;"><?php echo $no?></td>
          			<?php if(empty($photo)):?>
                  <td><img style="width:85px;" src="<?php echo base_url().'assets/images/user_blank.png';?>"></td>
                  <?php else:?>
                  <td><img  style="width:85px;" src="<?php echo base_url().'assets/images/'.$photo;?>"></td>
                  <?php endif;?>
          			<td><?php echo $nik?></td>
          			<td><?php echo $nama?></td>
          			<?php if($jenkel=='L'):?>
                  <td>Laki-Laki</td>
                  <?php elseif($jenkel=='P'):?>
                  <td>Perempuan</td>
                  <?php endif;?>
                <td><?php echo $mapel?></td>
          			<td><?php echo $tempat_lahir?></td>
          			<td><?php echo $tanggal_lahir?></td>
          			<td><?php echo $jenis?></td>
          		</tr>
          		<?php endforeach;?>
              </tbody>
            </table>
		</section>
	</section>
   
	</section>
 
  </section>
