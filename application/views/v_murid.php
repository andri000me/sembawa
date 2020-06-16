<style type="text/css">

.dataTables_wrapper{
  overflow: auto;
  overflow-x: auto;
  overflow-y: auto;
}



  
</style>
  
	</section>

	
  <section class="content-holder b-none inner_content" style="margin-top: 150px;">
  
  	<section class="container container-fluid">

	          <section class="row-fluid">

		<h2 class="heading">Peserta Didik</h2>
		<span class="border-line m-bottom" style="margin-top: 5px;margin-left: -19px;"></span>
<div class="container">
  <div class="row">		
	<section class="page_content">
		<section class="span12 first">
			<table class="table table-container" id="myTable">
              <thead>
                <tr>
          			<th style="width: 106px;">Photo</th>
          			<th>NIS</th>
          			<th>Nama</th>
          			<th>Jenis Kelamin</th>
                    <th>Kelas</th>
                </tr>
              </thead>
              <tbody>
          		 <?php
          				$no=0;
          				foreach ($data->result_array() as $i) :
          					$no++;
          					$id=$i['siswa_id'];
          					$nis=$i['siswa_nis'];
          					$nama=$i['siswa_nama'];
          					$jenkel=$i['siswa_jenkel'];
          					$kelas_id=$i['siswa_kelas_id'];
                       		$kelas_nama=$i['kelas_nama'];
                       		$photo=$i['siswa_photo'];
                       
                    ?>
          		<tr>
                  <?php if(empty($photo)):?>
                  <td><img style="width: 140px;" src="<?php echo base_url().'assets/images/user_blank.png';?>"></td>
                  <?php else:?>
                  <td><img style="width: 140px;" src="<?php echo base_url().'assets/images/'.$photo;?>"></td>
                  <?php endif;?>
                  <td><?php echo $nis;?></td>
        				  <td><?php echo $nama;?></td>
                  <?php if($jenkel=='L'):?>
                  <td>Laki-Laki</td>
                  <?php else:?>
                  <td>Perempuan</td>
                  <?php endif;?>
                  <td><?php echo $kelas_nama;?></td>
                </tr>
				<?php endforeach;?>
              </tbody>
            </table>
			
			

	
		</section>
	</section>
   
	</section>
 
  </section>
  
 
