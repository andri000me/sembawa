<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Kinerja
      <small></small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?= base_url() ?>Admin/dashboard"><i class="fa fa-dashboard"></i>Dashboard</a></li>
      <li class="active"><i class="fa fa-book"></i> Kinerja</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">


    <div class="box box-default">
      <div class="box-header with-border">
        <h3 class="box-title"><b><?= $boxTitle ?></b></h3>
          <?php if($kode == 4) { ?>
            <a href="<?=base_url()?>Kinerja/laporan_keuangan" target="_blank" class="btn btn-primary btn-flat" style="float: right; margin-right:10px">Lihat Perubahan</a>
          <?php } else if($kode == 5) { ?>
            <a href="<?=base_url()?>Kinerja/lakin" target="_blank" class="btn btn-primary btn-flat" style="float: right; margin-right:10px">Lihat Perubahan</a>
          <?php } else if($kode == 6) { ?>
            <a href="<?=base_url()?>Kinerja/capaian_kinerja" target="_blank" class="btn btn-primary btn-flat" style="float: right; margin-right:10px">Lihat Perubahan</a>
          <?php } else if($kode == 7) { ?>
            <a href="<?=base_url()?>Kinerja/realisasi_anggaran" target="_blank" class="btn btn-primary btn-flat" style="float: right; margin-right:10px">Lihat Perubahan</a>
          <?php } else if($kode == 8) { ?>
            <a href="<?=base_url()?>Kinerja/neraca_keuangan" target="_blank" class="btn btn-primary btn-flat" style="float: right; margin-right:10px">Lihat Perubahan</a>
          <?php } else if($kode == 9) { ?>
            <a href="<?=base_url()?>Kinerja/laporan_tahunan" target="_blank" class="btn btn-primary btn-flat" style="float: right; margin-right:10px">Lihat Perubahan</a>
          <?php } else if($kode == 10) { ?>
            <a href="<?=base_url()?>Kinerja/laporan_tahunan_ppid" target="_blank" class="btn btn-primary btn-flat" style="float: right; margin-right:10px">Lihat Perubahan</a>
          <?php } else if($kode == 11) { ?>
            <a href="<?=base_url()?>Kinerja/laporan_masyarakat" target="_blank" class="btn btn-primary btn-flat" style="float: right; margin-right:10px">Lihat Perubahan</a>
          <?php } ?>
      </div>
    </div>
    <div class="box-body">
          <div class="row">
            <div class="col-md-12">
              <section class="page_content">
                <?php
                  foreach ($pengantar->result_array() as $i) :
                    $programID = $i['programID'];
                    $kataPengantar = $i['kataPengantar'];
                ?>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><?= $kataPengantar ?></li>
                    </ul>
                <?php endforeach ?>
              </section>
              <center>
                  <a class="btn btn-warning btn-flat" data-toggle="modal" data-target="#myModal"><span class="fa fa-pencil"></span> Edit <?= $boxTitle ?></a>
              </center>
            </div>
          </div>
        </div>

        <hr>

          <!-- /.box-header -->
          <div class="table-responsive">
            <div class="box-header">  
                <a class="btn btn-success btn-flat" data-toggle="modal" data-target="#tambahFile"><span class="fa fa-plus"></span> Tambah File</a>
            </div>
            <div class="box-body">
              <table id="example1" class="table table-striped" style="font-size:12px;">
                <thead>
                  <tr>
                    <th style="width:30px;">No</th>
                    <th style="width: 260px;">File</th>
                    <th>Tanggal Post</th>
                    <th>Oleh</th>
                    <th style="width: 25px;">Download</th>
                    <th>Kategori</th>
                    <th style="text-align:center; width: 50px;">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $no = 0;
                  foreach ($file->result_array() as $i) :
                    $no++;
                    $id = $i['file_id'];
                    $judul = $i['file_judul'];
                    $deskripsi = $i['file_deskripsi'];
                    $oleh = $i['file_oleh'];
                    $tanggal = $i['tanggal'];
                    $kategori_id = $i['kategori_f_id'];
                    $kategori = $i['kategori_nama'];
                    $download = $i['file_download'];
                    $file = $i['file_data'];
                  ?>
                    <tr>
                      <td><b><?php echo $no . "."; ?></b></td>
                      <td><?php echo $judul; ?></td>
                      <td><?php echo $tanggal; ?></td>
                      <td><?php echo $oleh; ?></td>
                      <td style="padding-left: 33px;"><?php echo $download; ?></td>
                      <td><?php echo $kategori; ?></td>
                      <td style="text-align:center;">
                        <?php if ($i['file_data'] != 'null') : ?>
                          <a href="<?php echo base_url() . 'Admin/Kinerja/download/' . $id .'/'. $kode ?>" style="padding-right: 10px;"><span class="fa fa-download"></span></a>
                        <?php endif; ?>
                        <a data-toggle="modal" data-target="#ModalEdit<?php echo $id; ?>" style="padding-right: 10px;"><span class="fa fa-pencil"></span></a>
                        <a data-toggle="modal" data-target="#ModalHapus<?php echo $id; ?>"><span class="fa fa-trash"></span></a>
                      </td>
                    </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
  </section>
  <!-- /.content -->
</div>



<div class="modal fade" id="tambahFile" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
        <h4 class="modal-title" id="myModalLabel">Tambah File</h4>
      </div>
      <form class="form-horizontal" action="<?php echo base_url()?>Admin/Kinerja/simpan_file/<?=$kode?>" method="post" enctype="multipart/form-data">
        <div class="modal-body">

        <input type="hidden" name="xkategori" value="<?=$id_kat_file?>" required>

          <div class="form-group">
            <label for="inputUserName" class="col-sm-4 control-label">Judul</label>
            <div class="col-sm-7">
              <input type="text" name="xjudul" class="form-control" id="inputUserName" placeholder="Judul" required>
            </div>
          </div>
          <div class="form-group">
            <label for="inputUserName" class="col-sm-4 control-label">Deskripsi</label>
            <div class="col-sm-7">
              <textarea class="form-control" rows="3" name="xdeskripsi" placeholder="Deskripsi ..." required></textarea>
            </div>
          </div>

          <div class="form-group">
            <label for="inputUserName" class="col-sm-4 control-label">Oleh</label>
            <div class="col-sm-7">
              <input type="text" name="xoleh" class="form-control" id="inputUserName" placeholder="Oleh" required>
            </div>
          </div>

          <div class="form-group">
            <label for="inputUserName" class="col-sm-4 control-label">File</label>
            <div class="col-sm-7">
              <input type="file" name="filefoto" required>
              NB: file harus bertype pdf|doc|docx|ppt|pptx|zip|jpg|jpeg|png.
              <br>
               ukuran maksimal 2,7 MB.
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary btn-flat" id="simpan">Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div>

 <!-- end modal tambah file -->

 
<?php foreach ($files->result_array() as $i) :
  $id = $i['file_id'];
  $judul = $i['file_judul'];
  $deskripsi = $i['file_deskripsi'];
  $oleh = $i['file_oleh'];
  $tanggal = $i['tanggal'];
  $download = $i['file_download'];
  $file = $i['file_data'];
?>

<!--Modal Hapus File-->
  <div class="modal fade" id="ModalHapus<?php echo $id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
          <h4 class="modal-title" id="myModalLabel">Hapus File</h4>
        </div>
        <form class="form-horizontal" action="<?php echo base_url()?>Admin/Kinerja/hapus_file/<?=$kode?>" method="post" enctype="multipart/form-data">
          <div class="modal-body">
            <input type="hidden" name="kode" value="<?php echo $id; ?>" />
            <input type="hidden" name="file" value="<?php echo $file; ?>">
            <p>Apakah Anda yakin mau menghapus file <b><?php echo $judul; ?></b> ?</p>

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary btn-flat" id="simpan">Hapus</button>
          </div>
        </form>
      </div>
    </div>
  </div>
<?php endforeach; ?>
<!--End Modal Hapus File-->



<?php foreach ($files->result_array() as $i) :
  $id = $i['file_id'];
  $judul = $i['file_judul'];
  $deskripsi = $i['file_deskripsi'];
  $oleh = $i['file_oleh'];
  $tanggal = $i['tanggal'];
  $kategori_file_id = $i['kategori_f_id'];
  $kategori = $i['kategori_nama'];
  $download = $i['file_download'];
  $file = $i['file_data'];
?>
  <!--Modal Edit File-->
  <div class="modal fade" id="ModalEdit<?php echo $id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
          <h4 class="modal-title" id="myModalLabel">Edit File</h4>
        </div>
        <form class="form-horizontal" action="<?php echo base_url() ?>Admin/Kinerja/update_file/<?=$kode?>" method="post" enctype="multipart/form-data">
          <div class="modal-body">

          <input type="hidden" name="xkategori" value="<?=$id_kat_file?>" required>

            <div class="form-group">
              <label for="inputUserName" class="col-sm-4 control-label">Judul</label>
              <div class="col-sm-7">
                <input type="hidden" name="kode" value="<?php echo $id; ?>">
                <input type="hidden" name="file" value="<?php echo $file; ?>">
                <input type="text" name="xjudul" class="form-control" value="<?php echo $judul; ?>" id="inputUserName" placeholder="Judul" required>
              </div>
            </div>
            <div class="form-group">
              <label for="inputUserName" class="col-sm-4 control-label">Deskripsi</label>
              <div class="col-sm-7">
                <textarea class="form-control" rows="3" name="xdeskripsi" placeholder="Deskripsi ..." required><?php echo $deskripsi; ?></textarea>
              </div>
            </div>
            <div class="form-group">
              <label for="inputUserName" class="col-sm-4 control-label">Oleh</label>
              <div class="col-sm-7">
                <input type="text" name="xoleh" class="form-control" value="<?php echo $oleh; ?>" id="inputUserName" placeholder="Oleh" required>
              </div>
            </div>
            <div class="form-group">
              <label for="inputUserName" class="col-sm-4 control-label">File</label>
              <div class="col-sm-7">
                <input type="file" name="filefoto">
                NB: file harus bertype pdf|doc|docx|ppt|pptx|zip|jpg|jpeg|png. ukuran maksimal 2,7 MB.
              </div>
            </div>

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary btn-flat" id="simpan">Update</button>
          </div>
        </form>
      </div>
    </div>
  </div>
<?php endforeach; ?>
<!--End Modal Edit File-->

              <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" style="font-size: 20px;" id="exampleModalLabel">Edit <?= $boxTitle ?></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                <?php
                  foreach ($pengantar->result_array() as $i) :
                    $programID = $i['programID'];
                    $kataPengantar = $i['kataPengantar'];
                ?>

                    <form class="form-horizontal" action="<?=base_url()?>Admin/Kinerja/update_pengantar/<?=$programID?>" method="post" enctype="multipart/form-data">
                        <div class="modal-body">

                            <div class="form-group">
                            <label for="inputUserName" class="col-sm-2 control-label">Kata Pengantar : </label>
                            <div class="col-sm-9">
                                <textarea id="ckeditor" class="form-control" rows="3" name="xkataPengantar" placeholder="Deskripsi ..."><?= $kataPengantar ?></textarea>
                            </div>
                            </div>
                           
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary btn-flat" id="simpan">Update</button>
                        </div>
                        </form>

                  <?php endforeach; ?>
                </div>
                </div>
                </div>
            </div>



<!-- /.content-wrapper -->
<footer class="main-footer">
  <div class="pull-right hidden-xs">
    <b>Version</b> 1.0
  </div>
  <strong>Copyright &copy; 2020 <a href="http://digitalcreative.web.id">Digital Creative</a>.</strong> All rights reserved.
</footer>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
  <!-- Create the tabs -->
  <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
    <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
    <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
  </ul>
  <!-- Tab panes -->
  <div class="tab-content">
    <!-- Home tab content -->
    <div class="tab-pane" id="control-sidebar-home-tab">
      <h3 class="control-sidebar-heading">Recent Activity</h3>
      <ul class="control-sidebar-menu">
        <li>
          <a href="javascript:void(0)">
            <i class="menu-icon fa fa-birthday-cake bg-red"></i>

            <div class="menu-info">
              <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

              <p>Will be 23 on April 24th</p>
            </div>
          </a>
        </li>
        <li>
          <a href="javascript:void(0)">
            <i class="menu-icon fa fa-user bg-yellow"></i>

            <div class="menu-info">
              <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>

              <p>New phone +1(800)555-1234</p>
            </div>
          </a>
        </li>
        <li>
          <a href="javascript:void(0)">
            <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>

            <div class="menu-info">
              <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>

              <p>nora@example.com</p>
            </div>
          </a>
        </li>
        <li>
          <a href="javascript:void(0)">
            <i class="menu-icon fa fa-file-code-o bg-green"></i>

            <div class="menu-info">
              <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>

              <p>Execution time 5 seconds</p>
            </div>
          </a>
        </li>
      </ul>
      <!-- /.control-sidebar-menu -->

      <h3 class="control-sidebar-heading">Tasks Progress</h3>
      <ul class="control-sidebar-menu">
        <li>
          <a href="javascript:void(0)">
            <h4 class="control-sidebar-subheading">
              Custom Template Design
              <span class="label label-danger pull-right">70%</span>
            </h4>

            <div class="progress progress-xxs">
              <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
            </div>
          </a>
        </li>
        <li>
          <a href="javascript:void(0)">
            <h4 class="control-sidebar-subheading">
              Update Resume
              <span class="label label-success pull-right">95%</span>
            </h4>

            <div class="progress progress-xxs">
              <div class="progress-bar progress-bar-success" style="width: 95%"></div>
            </div>
          </a>
        </li>
        <li>
          <a href="javascript:void(0)">
            <h4 class="control-sidebar-subheading">
              Laravel Integration
              <span class="label label-warning pull-right">50%</span>
            </h4>

            <div class="progress progress-xxs">
              <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
            </div>
          </a>
        </li>
        <li>
          <a href="javascript:void(0)">
            <h4 class="control-sidebar-subheading">
              Back End Framework
              <span class="label label-primary pull-right">68%</span>
            </h4>

            <div class="progress progress-xxs">
              <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
            </div>
          </a>
        </li>
      </ul>
      <!-- /.control-sidebar-menu -->

    </div>
    <!-- /.tab-pane -->
    <!-- Stats tab content -->
    <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
    <!-- /.tab-pane -->
    <!-- Settings tab content -->
    <div class="tab-pane" id="control-sidebar-settings-tab">
      <form method="post">
        <h3 class="control-sidebar-heading">General Settings</h3>

        <div class="form-group">
          <label class="control-sidebar-subheading">
            Report panel usage
            <input type="checkbox" class="pull-right" checked>
          </label>

          <p>
            Some information about this general settings option
          </p>
        </div>
        <!-- /.form-group -->

        <div class="form-group">
          <label class="control-sidebar-subheading">
            Allow mail redirect
            <input type="checkbox" class="pull-right" checked>
          </label>

          <p>
            Other sets of options are available
          </p>
        </div>
        <!-- /.form-group -->

        <div class="form-group">
          <label class="control-sidebar-subheading">
            Expose author name in posts
            <input type="checkbox" class="pull-right" checked>
          </label>

          <p>
            Allow the user to show his name in blog posts
          </p>
        </div>
        <!-- /.form-group -->

        <h3 class="control-sidebar-heading">Chat Settings</h3>

        <div class="form-group">
          <label class="control-sidebar-subheading">
            Show me as online
            <input type="checkbox" class="pull-right" checked>
          </label>
        </div>
        <!-- /.form-group -->

        <div class="form-group">
          <label class="control-sidebar-subheading">
            Turn off notifications
            <input type="checkbox" class="pull-right">
          </label>
        </div>
        <!-- /.form-group -->

        <div class="form-group">
          <label class="control-sidebar-subheading">
            Delete chat history
            <a href="javascript:void(0)" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
          </label>
        </div>
        <!-- /.form-group -->
      </form>
    </div>
    <!-- /.tab-pane -->
  </div>
</aside>
<!-- /.control-sidebar -->
<!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
<div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 2.2.3 -->
<script src="<?php echo base_url() . 'assets/plugins/jQuery/jquery-2.2.3.min.js' ?>"></script>
<!-- Bootstrap 3.3.6 -->
<script src="<?php echo base_url() . 'assets/bootstrap/js/bootstrap.min.js' ?>"></script>
<!-- DataTables -->
<script src="<?php echo base_url() . 'assets/plugins/datatables/jquery.dataTables.min.js' ?>"></script>
<script src="<?php echo base_url() . 'assets/plugins/datatables/dataTables.bootstrap.min.js' ?>"></script>
<!-- Select2 -->
<script src="<?php echo base_url() . 'assets/plugins/select2/select2.full.min.js' ?>"></script>
<!-- InputMask -->
<script src="<?php echo base_url() . 'assets/plugins/input-mask/jquery.inputmask.js' ?>"></script>
<script src="<?php echo base_url() . 'assets/plugins/input-mask/jquery.inputmask.date.extensions.js' ?>"></script>
<script src="<?php echo base_url() . 'assets/plugins/input-mask/jquery.inputmask.extensions.js' ?>"></script>
<!-- date-range-picker -->
<script src="<?php echo base_url() . 'assets/plugins/daterangepicker/daterangepicker.js' ?>"></script>
<!-- bootstrap datepicker -->
<script src="<?php echo base_url() . 'assets/plugins/datepicker/bootstrap-datepicker.js' ?>"></script>
<!-- bootstrap color picker -->
<script src="<?php echo base_url() . 'assets/plugins/colorpicker/bootstrap-colorpicker.min.js' ?>"></script>
<!-- bootstrap time picker -->
<script src="<?php echo base_url() . 'assets/plugins/timepicker/bootstrap-timepicker.min.js' ?>"></script>
<!-- SlimScroll 1.3.0 -->
<script src="<?php echo base_url() . 'assets/plugins/slimScroll/jquery.slimscroll.min.js' ?>"></script>
<!-- iCheck 1.0.1 -->
<script src="<?php echo base_url() . 'assets/plugins/iCheck/icheck.min.js' ?>"></script>
<!-- FastClick -->
<script src="<?php echo base_url() . 'assets/plugins/fastclick/fastclick.js' ?>"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url() . 'assets/dist/js/app.min.js' ?>"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url() . 'assets/dist/js/demo.js' ?>"></script>
<script src="<?php echo base_url() . 'assets/ckeditor/ckeditor.js' ?>"></script>
<!-- Page script -->

<script type="text/javascript" src="<?php echo base_url() . 'assets/plugins/toast/jquery.toast.min.js' ?>"></script>

<script>
  $(function() {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.

    CKEDITOR.replace('ckeditor');


  });
</script>

<script>
  $(function() {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });

    $('#datepicker').datepicker({
      autoclose: true,
      format: 'yyyy-mm-dd'
    });
    $('#datepicker2').datepicker({
      autoclose: true,
      format: 'yyyy-mm-dd'
    });
    $('.datepicker3').datepicker({
      autoclose: true,
      format: 'yyyy-mm-dd'
    });
    $('.datepicker4').datepicker({
      autoclose: true,
      format: 'yyyy-mm-dd'
    });
    $(".timepicker").timepicker({
      showInputs: true
    });

  });
</script>

<script>
  $(function() {
    //Initialize Select2 Elements
    $(".select2").select2();

    //Datemask dd/mm/yyyy
    $("#datemask").inputmask("dd/mm/yyyy", {
      "placeholder": "dd/mm/yyyy"
    });
    //Datemask2 mm/dd/yyyy
    $("#datemask2").inputmask("mm/dd/yyyy", {
      "placeholder": "mm/dd/yyyy"
    });
    //Money Euro
    $("[data-mask]").inputmask();

    //Date range picker
    $('#reservation').daterangepicker();
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({
      timePicker: true,
      timePickerIncrement: 30,
      format: 'MM/DD/YYYY h:mm A'
    });
    //Date range as a button
    $('#daterange-btn').daterangepicker({
        ranges: {
          'Today': [moment(), moment()],
          'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days': [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month': [moment().startOf('month'), moment().endOf('month')],
          'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate: moment()
      },
      function(start, end) {
        $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
      }
    );

    //Date picker
    $('#datepicker').datepicker({
      autoclose: true
    });

    //iCheck for checkbox and radio inputs
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass: 'iradio_minimal-blue'
    });
    //Red color scheme for iCheck
    $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
      checkboxClass: 'icheckbox_minimal-red',
      radioClass: 'iradio_minimal-red'
    });
    //Flat red color scheme for iCheck
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass: 'iradio_flat-green'
    });

    //Colorpicker
    $(".my-colorpicker1").colorpicker();
    //color picker with addon
    $(".my-colorpicker2").colorpicker();

    //Timepicker
    $(".timepicker").timepicker({
      showInputs: false
    });
  });
</script>

<?php if ($this->session->flashdata('msg') == 'error') : ?>
  <script type="text/javascript">
    $.toast({
      heading: 'Update <?= $boxTitle ?> Gagal',
      text: "<?= $boxTitle ?> gagal diupdate.",
      showHideTransition: 'slide',
      icon: 'error',
      hideAfter: false,
      position: 'bottom-right',
      bgColor: '#FF4859'
    });
  </script>

<?php elseif ($this->session->flashdata('msg') == 'success-update-p') : ?>
  <script type="text/javascript">
    $.toast({
      heading: 'Update <?= $boxTitle ?> Berhasil',
      text: "Kata <?= $boxTitle ?> diupdate.",
      showHideTransition: 'slide',
      icon: 'success',
      hideAfter: false,
      position: 'bottom-right',
      bgColor: '#7EC857'
    });
  </script>

<?php elseif ($this->session->flashdata('msg') == 'success-hapus') : ?>
  <script type="text/javascript">
    $.toast({
      heading: 'Hapus File Berhasil',
      text: "File berhasil dihapus",
      showHideTransition: 'slide',
      icon: 'success',
      hideAfter: false,
      position: 'bottom-right',
      bgColor: '#FF4859'
    });
  </script>

<?php elseif ($this->session->flashdata('msg') == 'success-save') : ?>
  <script type="text/javascript">
    $.toast({
      heading: 'Tambah File Berhasil',
      text: "File Berhasil ditambahkan.",
      showHideTransition: 'slide',
      icon: 'success',
      hideAfter: false,
      position: 'bottom-right',
      bgColor: '#7EC857'
    });
  </script>
<?php elseif ($this->session->flashdata('msg') == 'info') : ?>
  <script type="text/javascript">
    $.toast({
      heading: 'Update File Berhasil',
      text: "File Berhasil diupdate.",
      showHideTransition: 'slide',
      icon: 'success',
      hideAfter: false,
      position: 'bottom-right',
      bgColor: '#7EC857'
    });
  </script>

<?php elseif ($this->session->flashdata('msg') == 'warning') : ?>
  <script type="text/javascript">
    $.toast({
      heading: 'Peringatan Tambah File',
      text: "Data berhasil diinput tanpa upload file.",
      showHideTransition: 'slide',
      icon: 'info',
      hideAfter: false,
      position: 'bottom-right',
      bgColor: '#FFF00'
    });
  </script>

<?php elseif ($this->session->flashdata('msg') == 'warning2') : ?>
  <script type="text/javascript">
    $.toast({
      heading: 'Peringatan Update File',
      text: "Data berhasil diupdate tanpa update file.",
      showHideTransition: 'slide',
      icon: 'info',
      hideAfter: false,
      position: 'bottom-right',
      bgColor: '#FFF00'
    });
  </script>

<?php else : ?>

<?php endif; ?>


</body>

</html>