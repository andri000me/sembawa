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

	
  <section class="content-holder b-none inner_content" style="margin-top: 100px;">
  
  	<section class="container container-fluid">

	          <section class="row-fluid">

		<h2 class="heading">Alumni</h2>
		<span class="border-line m-bottom" style="margin-top: 5px;margin-left: -19px;"></span>
<div class="container">
  <div class="row">
	<section class="page_content">
		<section class="span11 first">
			<table class="table table-container" id="myTable">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Tanggal</th>
                  <th>Nama alumni</th>
                  <th>L/P</th>
                  <th>Tanggal lahir</th>
                  <th>Tahun lulus</th>
                  <th>Jurusan</th>
                  <th>Pendidikan terakhir</th>
                  <th style="width:50px;">Pekerjaan</th>
                  <th>Jabatan</th>
                  <th>Rumah</th>
                  <th>Kantor</th>
                  <th style="width:50px ;">Email</th>
                </tr>
              </thead>
              <tbody>
               <?php
                   $no=0;
                    foreach ($data->result_array() as $i) :
                       $no++;
                       $nama_alumni = $i['nama_alumni'];
                       $tgl_input = $i['tgl_input'];
                       $jenis_kelamin = $i['jns_kelamin'];
                       $tanggal_lahir = $i['tanggal_lahir'];
                       $tahun_lulus = $i['tahun_lulus'];
                       $jurusan = $i['jurusan'];
                       $pendidikan_terakhir = $i['pendidikan_terakhir'];
                       $pekerjaan = $i['pekerjaan'];
                       $jabatan = $i['jabatan'];
                       $rumah = $i['rumah'];
                       $kantor = $i['kantor'];
                       $email = $i['email'];
              ?> 
              <tr>
                      <td><?php echo $no ?></td>
                      <td><?php echo $tgl_input ?></td>
                      <td><?php echo $nama_alumni ?></td>
                      <td><?php echo $jenis_kelamin ?></td>
                      <td><?php echo $tanggal_lahir ?></td>
                      <td><?php echo $tahun_lulus ?></td>
                      <td><?php echo $jurusan ?></td>
                      <td><?php echo $pendidikan_terakhir ?></td>
                      <td><?php echo $pekerjaan ?></td>
                      <td><?php echo $jabatan ?></td>
                      <td><?php echo $rumah ?></td>
                      <td><?php echo $kantor ?></td>
                      <td style="width:50px ;"><?php echo $email ?></td>
              </tr>
              <?php endforeach;?>
              </tbody>
            </table>
      <br/>
      <br/>
      <br/>
      <br/>
      <br/>           
	
		</section>
	</section>
   
	</section>
 
  </section>
  