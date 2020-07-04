<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Serta Merta
      <small></small>
    </h1>
    <?php
      $b = $data->row_array();
      ?>
    <ol class="breadcrumb">
      <li><a href="<?= base_url() ?>Admin/dashboard"><i class="fa fa-dashboard"></i>Dashboard</a></li>
      <li class="active"><i class="fa fa-link"></i> Tautan</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">

          <!-- <div class="box">
            <div class="box-header">
              <a class="btn btn-success btn-flat" href="<?php echo base_url() . 'Admin/Tautan/add_tautan' ?>"><span class="fa fa-plus"></span> Post Tautan</a>
            </div> -->
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
                <a class="btn btn-success btn-flat" data-toggle="modal" data-target="#myModal"><span class="fa fa-plus"></span> Tambah Artikel</a>

            </div>
            <div class="box-body">
              <table id="example1" class="table table-striped" style="font-size:13px;">
                <thead>
                  <tr>
                    <th>Gambar</th>
                    <th>Judul</th>
                    <th>Link</th>
                    <th>Tanggal</th>
                    <th>Author</th>
                    <th style="text-align:right; width: 58px;">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $no = 0;
                  foreach ($data->result_array() as $i) :
                    $no++;
                    $publik_id = $i['publik_id'];
                    $publik_judul = $i['publik_judul'];
                    $publik_link = $i['publik_link'];
                    $publik_tanggal = $i['publik_tanggal'];
                    $publik_author = $i['publik_author'];
                    $publik_gambar = $i['publik_gambar'];
                    
                  ?>
                    <tr>
                      <td><img src="<?php echo base_url() . 'assets/images/' . $publik_gambar; ?>" style="width:90px;"></td>
                      <td><?php echo $publik_judul; ?></td>
                      <td><?php echo $publik_link; ?></td>
                      <td><?php echo $publik_tanggal; ?></td>
                      <td><?php echo $publik_author; ?></td>
                      <td style="text-align:right; width: 58px; ">
                      <a data-toggle="modal" data-target="#ModalEdit<?php echo $publik_id; ?>" style="padding-right: 10px;"><span class="fa fa-pencil"></span></a>
                        <a class="btn" data-toggle="modal" data-target="#ModalHapus<?php echo $publik_id; ?>"><span class="fa fa-trash"></span></a>
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
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
        <h4 class="modal-title" id="myModalLabel">Tambah Artikel</h4>
      </div>
      <form class="form-horizontal" action="<?php echo base_url() . 'Admin/Informasi_publik/simpan_informasi_publik?kode=2' ?>" method="post" enctype="multipart/form-data">
        <div class="modal-body">
          <div class="form-group">
            <label for="inputUserName" class="col-sm-4 control-label">Judul</label>
            <div class="col-sm-7">
              <input type="text" name="xjudul" class="form-control" id="inputUserName" placeholder="Judul" required>
            </div>
          </div>

          <div class="form-group">
            <label for="inputUserName" class="col-sm-4 control-label">Link</label>
            <div class="col-sm-7">
              <input type="text" name="xlink" class="form-control" id="inputUserName" placeholder="http" required>
            </div>
          </div>

          <div class="form-group">
            <label for="inputUserName" class="col-sm-4 control-label">Tanggal</label>
            <div class="col-sm-7">
              <input type="date" name="xtanggal" class="form-control" id="inputUserName" placeholder="Tanggal" required>
            </div>
          </div>

          <div class="form-group">
            <label for="inputUserName" class="col-sm-4 control-label">Kategori</label>
            <div class="col-sm-7">
              <select class="form-control" name="xkategori" required>
                <?php
                $no = 0;
                foreach ($kat->result_array() as $i) {
                  $no++;
                  $kategori_id = $i['kategori_f_id'];
                  $kategori_nama = $i['kategori_nama'];
                  
                ?>
                  <option value="<?php echo $kategori_id; ?>"><?php echo $kategori_nama; ?></option>
                <?php } ?>
              </select>
            </div>
          </div>

          <div class="form-group">
              <label for="inputUserName" class="col-sm-4 control-label">Gambar</label>
              <div class="col-sm-7">
                <input type="file" name="filefoto" accept="image/jpg, image/jpeg, image/png">
                NB: file harus bertype JPG|JPEG|PNG 
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

<?php foreach ($data->result_array() as $i) :
  $id = $i['publik_id'];
  $judul = $i['publik_judul'];
  $link = $i['publik_link'];
  $tanggal = $i['publik_tanggal'];
  $gambar = $i['publik_gambar'];
  $kategori_publik_id = $i['publik_kategori_id'];
?>
  <!--Modal Edit Pengguna-->
  <div class="modal fade" id="ModalEdit<?php echo $id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
          <h4 class="modal-title" id="myModalLabel">Edit Artikel</h4>
        </div>
        <form class="form-horizontal" action="<?php echo base_url() . 'Admin/Informasi_publik/update_informasi_publik?kode=2' ?>" method="post" enctype="multipart/form-data">
          <div class="modal-body">

            <div class="form-group">
              <label for="inputUserName" class="col-sm-4 control-label">Judul</label>
              <div class="col-sm-7">
                <input type="hidden" name="kode" value="<?php echo $id; ?>">
                <input type="hidden" name="gambar" value="<?php echo $gambar; ?>">
                <input type="text" name="xjudul" class="form-control" value="<?php echo $judul; ?>" id="inputUserName" placeholder="Judul" required>
              </div>
            </div>

            <div class="form-group">
            <label for="inputUserName" class="col-sm-4 control-label">Link</label>
            <div class="col-sm-7">
              <input type="text" name="xlink" class="form-control" value="<?php echo $link; ?>"id="inputUserName" placeholder="http" required>
            </div>
          </div>

          <div class="form-group">
            <label for="inputUserName" class="col-sm-4 control-label">Tanggal</label>
            <div class="col-sm-7">
              <input type="date" name="xtanggal" class="form-control" value="<?php echo $tanggal; ?>"id="inputUserName" placeholder="Tanggal" required>
            </div>
          </div>

 
            <div class="form-group">
              <label for="inputUserName" class="col-sm-4 control-label">Kategori</label>
              <div class="col-sm-7">
                <select class="form-control" name="xkategori" required>
                  <?php
                  foreach ($kat->result_array() as $i) {
                    $kategori_id = $i['kategori_f_id'];
                    $kategori_nama = $i['kategori_nama'];
                    if ($kategori_publik_id == $kategori_id)
                      echo "<option value='$kategori_id' selected>$kategori_nama</option>";
                    else
                      echo "<option value='$kategori_id'>$kategori_nama</option>";
                  ?>
                  <?php } ?>
                </select>
              </div>
            </div>
            <div class="form-group">
              <label for="inputUserName" class="col-sm-4 control-label">Gambar</label>
              <div class="col-sm-7">
                <input type="file" name="filefoto" value="<?php echo $gambar ?>" accept="image/jpg, image/jpeg, image/png">
                NB: file harus bertype JPG|JPEG|PNG 
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
  $publik_id = $i['publik_id'];
  $publik_judul = $i['publik_judul'];
  $publik_gambar = $i['publik_gambar'];
?>
  <!--Modal Hapus Pengguna-->
  <div class="modal fade" id="ModalHapus<?php echo $publik_id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
          <h4 class="modal-title" id="myModalLabel">Hapus Artikel</h4>
        </div>
        <form class="form-horizontal" action="<?php echo base_url() . 'Admin/Informasi_publik/hapus_informasi_publik?kode=2' ?>" method="post" enctype="multipart/form-data">
          <div class="modal-body">
            <input type="hidden" name="id" value="<?php echo $publik_id; ?>" />
            <input type="hidden" value="<?php echo $publik_gambar; ?>" name="gambar">
            <p>Apakah Anda yakin mau menghapus Artikel <b><?php echo $publik_judul; ?></b> ?</p>

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
<!-- FastClick -->
<script src="<?php echo base_url() . 'assets/plugins/fastclick/fastclick.js' ?>"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url() . 'assets/dist/js/app.min.js' ?>"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url() . 'assets/dist/js/demo.js' ?>"></script>
<script type="text/javascript" src="<?php echo base_url() . 'assets/plugins/toast/jquery.toast.min.js' ?>"></script>
<!-- page script -->
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
      heading: 'Hapus Tautan Berhasil',
      text: "Tautan berhasil dihapus",
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
      heading: 'Tambah Tautan Berhasil',
      text: "Tautan Berhasil ditambahkan.",
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
      heading: 'Update Tautan Berhasil',
      text: "Tautan Berhasil diupdate.",
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
      heading: 'Peringatan Tambah Tautan',
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
      heading: 'Peringatan Update Tautan',
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