<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Pengumuman
      <small></small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?= base_url() ?>Admin/dashboard"><i class="fa fa-dashboard"></i>Dashboard</a></li>
      <li class="active"><i class="fa fa-volume-up"></i> Pengumuman</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">

          <!-- /.box-header -->
          <div class="table-responsive">
            <div class="box-header">
              <?php if ($this->session->flashdata('pesan')) : ?>
                <center>
                  <div class="alert alert-danger" role="alert">
                    <?= $this->session->flashdata('pesan') ?>
                  </div>
                </center>
              <?php endif; ?>
              <a class="btn btn-success btn-flat" data-toggle="modal" data-target="#myModal"><span class="fa fa-plus"></span> Tambah Pengumuman</a>
            </div>
            <div class="box-body">
              <table id="example1" class="table table-striped" style="font-size:12px;">
                <thead>
                  <tr>
                    <th style="width:70px;">No</th>
                    <th>Judul</th>
                    <th>Gambar</th>
                    <th>Deskripsi</th>
                    <th>Tanggal Post</th>
                    <th>Author</th>
                    <th>Kategori</th>
                    <th style="text-align:right; width:60px;">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $no = 0;
                  foreach ($data->result_array() as $i) :
                    $no++;
                    $id = $i['pengumuman_id'];
                    $judul = $i['pengumuman_judul'];
                    $deskripsi = $i['pengumuman_deskripsi'];
                    $author = $i['pengumuman_author'];
                    $tanggal = $i['tanggal'];
                    $gambar = $i['tulisan_gambar'];
                    $kategori = $i['pengumuman_kategori'];

                  ?>
                    <tr>
                      <td><?php echo $no; ?></td>
                      <td><?php echo $judul; ?></td>
                      <td><img src="<?php echo base_url() . 'assets/images/' . $gambar ?>" style="width: 50px"></td>
                      <td><?php echo $deskripsi; ?></td>
                      <td><?php echo $tanggal; ?></td>
                      <td><?php echo $author; ?></td>
                      <td><?php echo $kategori; ?></td>
                      <td style="text-align:right;">
                        <a class="btn" data-toggle="modal" data-target="#ModalEdit<?php echo $id; ?>"><span class="fa fa-pencil"></span></a>
                        <a class="btn" data-toggle="modal" data-target="#ModalHapus<?php echo $id; ?>"><span class="fa fa-trash"></span></a>
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

<!--Modal Add Pengguna-->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
        <h4 class="modal-title" id="myModalLabel">Tambah Pengumuman</h4>
      </div>
      <form class="form-horizontal" action="<?php echo base_url() . 'Admin/Pengumuman/simpan_pengumuman' ?>" method="post" enctype="multipart/form-data"  >
        <div class="modal-body">

          <div class="form-group">
            <label for="inputUserName" class="col-sm-2 control-label">Judul</label>
            <div class="col-sm-9">
              <input type="text" name="xjudul" class="form-control" id="inputUserName" placeholder="Judul">
            </div>
          </div>
          <div class="form-group">
            <label for="inputUserName" class="col-sm-2 control-label">Deskripsi</label>
            <div class="col-sm-9">
              <textarea id="ckeditor" class="form-control" rows="3" name="xdeskripsi" placeholder="Deskripsi ..."></textarea>
            </div>
          </div>

          <div class="form-group">
            <label for="inputUserName" class="col-sm-2 control-label">Kategori</label>
            <div class="col-sm-9">
              <input type="text" name="kategori" class="form-control" id="inputUserName" placeholder="Kategori" required>
            </div>
          </div>

          <div class="form-group">
            <label for="inputUserName" class="col-sm-2 control-label"></label>
            <div class="col-sm-9">
              <input type="file" name="filefoto" />
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
</form>
</div>


<?php foreach ($data->result_array() as $i) :
  $id = $i['pengumuman_id'];
  $judul = $i['pengumuman_judul'];
  $deskripsi = $i['pengumuman_deskripsi'];
  $author = $i['pengumuman_author'];
  $tanggal = $i['tanggal'];
  $gambar = $i['tulisan_gambar'];
  $kategori = $i['pengumuman_kategori']
?>
  <!--Modal Edit Pengguna-->
  <div class="modal fade" id="ModalEdit<?php echo $id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
          <h4 class="modal-title" id="myModalLabel">Edit Pengumuman</h4>
        </div>
        <form class="form-horizontal" action="<?php echo base_url() . 'Admin/Pengumuman/update_pengumuman' ?>" method="post" enctype="multipart/form-data">
          <div class="modal-body">

            <div class="form-group">
              <label for="inputUserName" class="col-sm-2 control-label">Judul</label>
              <div class="col-sm-9">
                <input type="hidden" name="kode" value="<?php echo $id; ?>">
                <input type="hidden" name="gambar" value="<?php echo $gambar; ?>">
                <input type="text" name="xjudul" class="form-control" value="<?php echo $judul; ?>" id="inputUserName" placeholder="Judul">
              </div>
            </div>
            <div class="form-group">
              <label for="inputUserName" class="col-sm-2 control-label">Deskripsi</label>
              <div class="col-sm-9">
                <textarea id="ckeditor<?=$id?>" class="form-control" rows="3" name="xdeskripsi" placeholder="Deskripsi ..."><?php echo $deskripsi; ?></textarea>
              </div>
            </div>
            <div class="form-group">

            <div class="form-group">
              <label for="inputUserName" class="col-sm-2 control-label">Kategori</label>
              <div class="col-sm-9">
                <input type="text" name="kategori" class="form-control" value="<?php echo $kategori; ?>" id="inputUserName" placeholder="Kategori">
              </div>
            </div>
              <label for="inputUserName" class="col-sm-2 control-label"></label>
              <div class="col-sm-9">
                <input type="file" name="filefoto">

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

<?php foreach ($data->result_array() as $i) :
  $id = $i['pengumuman_id'];
  $judul = $i['pengumuman_judul'];
  $deskripsi = $i['pengumuman_deskripsi'];
  $author = $i['pengumuman_author'];
  $tanggal = $i['tanggal'];
  $gambar = $i['tulisan_gambar'];
?>
  <!--Modal Hapus Pengguna-->
  <div class="modal fade" id="ModalHapus<?php echo $id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
          <h4 class="modal-title" id="myModalLabel">Hapus Pengumuman</h4>
        </div>
        <form class="form-horizontal" action="<?php echo base_url() . 'Admin/Pengumuman/hapus_pengumuman' ?>" method="post" enctype="multipart/form-data">
          <div class="modal-body">
            <input type="hidden" name="kode" value="<?php echo $id; ?>" />
            <input type="hidden" name="gambar" value="<?php echo $gambar; ?>" />
            <p>Apakah Anda yakin mau menghapus pengumuman <b><?php echo $judul; ?></b> ?</p>

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




<!-- jQuery 2.2.3 -->
<script src="<?php echo base_url() . 'assets/plugins/jQuery/jquery-2.2.3.min.js' ?>"></script>
<!-- Bootstrap 3.3.6 -->
<script src="<?php echo base_url() . 'assets/bootstrap/js/bootstrap.min.js' ?>"></script>
<!-- DataTables -->
<script src="<?php echo base_url() . 'assets/plugins/datatables/jquery.dataTables.min.js' ?>"></script>
<script src="<?php echo base_url() . 'assets/plugins/datatables/dataTables.bootstrap.min.js' ?>"></script>
<!-- SlimScroll -->
<script src="<?php echo base_url() . 'assets/plugins/slimScroll/jquery.slimscroll.min.js' ?>"></script>
<script src="<?php echo base_url() . 'assets/plugins/datepicker/bootstrap-datepicker.js' ?>"></script>
<script src="<?php echo base_url() . 'assets/plugins/timepicker/bootstrap-timepicker.min.js' ?>"></script>
<script src="<?php echo base_url() . 'assets/plugins/daterangepicker/daterangepicker.js' ?>"></script>
<!-- FastClick -->
<script src="<?php echo base_url() . 'assets/plugins/fastclick/fastclick.js' ?>"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url() . 'assets/dist/js/app.min.js' ?>"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url() . 'assets/dist/js/demo.js' ?>"></script>
<script type="text/javascript" src="<?php echo base_url() . 'assets/plugins/toast/jquery.toast.min.js' ?>"></script>
<!-- page script -->
<script src="<?php echo base_url() . 'assets/ckeditor/ckeditor.js' ?>"></script>
<!-- page script -->

<script>
  $(function() {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.

    CKEDITOR.replace('ckeditor');


  });
</script>
<?php foreach ($data->result_array() as $i) :
  $id = $i['pengumuman_id'];
  $judul = $i['pengumuman_judul'];
  $deskripsi = $i['pengumuman_deskripsi'];
  $author = $i['pengumuman_author'];
  $tanggal = $i['tanggal'];
  $gambar = $i['tulisan_gambar'];
?>
<script>
  $(function() {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.

    CKEDITOR.replace('ckeditor<?=$id?>');


  });
</script>
<?php endforeach?>
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
<?php if ($this->session->flashdata('msg') == 'error') : ?>
  <script type="text/javascript">
    $.toast({
      heading: 'Error',
      text: "Password dan Ulangi Password yang Anda masukan tidak sama.",
      showHideTransition: 'slide',
      icon: 'error',
      hideAfter: false,
      position: 'bottom-right',
      bgColor: '#FF4859'
    });
  </script>

<?php elseif ($this->session->flashdata('msg') == 'success-hapus') : ?>
  <script type="text/javascript">
    $.toast({
      heading: 'Hapus Pengumuman Berhasil',
      text: "Pengumuman berhasil dihapus",
      showHideTransition: 'slide',
      icon: 'success',
      hideAfter: false,
      position: 'bottom-right',
      bgColor: '#FF4859'
    });
  </script>

<?php elseif ($this->session->flashdata('msg') == 'success') : ?>
  <script type="text/javascript">
    $.toast({
      heading: 'Tambah Pengumuman Berhasil',
      text: "Pengumuman Berhasil ditambahkan.",
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
      heading: 'Update Pengumuman Berhasil',
      text: "Pengumuman Berhasil diupdate.",
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
      heading: 'Peringatan Tambah Pengumuman',
      text: "Data berhasil diinput tanpa upload gambar.",
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
      heading: 'Peringatan Update Pengumuman',
      text: "Data berhasil diupdate tanpa update gambar.",
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