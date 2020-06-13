<html>
<head>
  <title><?php echo $title ?></title>
</head>
<!-- Favicon -->
<link rel="shortcut icon" href="<?php echo base_url()?>assets/images/logo.png" />

<!-- Font -->
<link  rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:200,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<body>
     <div>
          <?php foreach($data->result_array() as $row): 

            $judul = $row['tulisan_judul'];
            $isi = $row['tulisan_isi'];
            $gambar = $row['tulisan_gambar'];
          ?>
          <div class="col-xl-12">
            <center><h2><?php echo $judul; ?></h2></center>
          </div>
          <hr style="margin-left:10px;margin-right:10px;">
          <hr>
          <br>
           <div class="col-xl-8" style="text-align: center;"><img src="<?php echo base_url().'assets/images/'.$gambar ?>"> </div>
           <div class="col-xl-12" style="text-align:justify-all;"><p style="text-align:justify;"><?php echo $isi ?></p></div> 
      </div>
    <?php endforeach; ?>

</body>
</html>

<script type="text/javascript">
 window.print();
 window.close();
</script>
