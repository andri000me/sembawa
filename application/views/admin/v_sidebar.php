<?php 
 
    $query=$this->db->query("SELECT * FROM tbl_inbox WHERE inbox_status='1'");
    $jum_pesan=$query->num_rows();

      $cek1 = "";
      $cek2 = "";
      $cek3 = "";
      $cek4 = "";
      $cek5 = "";
      $cek6 = "";
      $cek7 = "";
      $cek8 = "";
      $cek9 = "";
      $cek10 = "";
      $cek11 = "";
      $cek12 = "";
      $cek13 = "";
      $cek14 = "";
     
      
      if(isset($side)){
         switch ($side) {
          case 1:
            $cek1 = "active";
            break;
            case 2:
            $cek2 = "active";
            break;
            case 3:
            $cek3 = "active";
            break;
            case 4:
            $cek4 = "active";
            break;
            case 5:
            $cek5 = "active";
            break;
            case 6:
            $cek6 = "active";
            break;
            case 7:
            $cek7 = "active";
            break;
            case 8:
            $cek8 = "active";
            break;
            case 9:
            $cek9 = "active";
            break;
            case 10:
            $cek10 = "active";
            break;
            case 11:
            $cek11 = "active";
            break;
            case 12:
            $cek12 = "active";
            break;
            case 13:
            $cek13 = "active";
            break;
            case 14:
            $cek14 = "active";
            break;

         }
      }
    ?>
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu ">
        <li class="header ">Menu Utama</li>
        <li class="<?php echo $cek1?>">
          <a href="<?php echo base_url().'Admin/dashboard'?>">
          <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          <span class="pull-right-container">
            <small class="label pull-right"></small>
          </span>
        </a>
      </li>
      
      
      <li class="<?php echo $cek3?>">
        <a href="<?php echo base_url().'Admin/Profil/header'?>">
        <i class="fa fa-bars"></i> <span> Header</span>
        <span class="pull-right-container">
          <small class="label pull-right"></small>
        </span>
      </a>
    </li>

    
    <li class="treeview <?php echo $cek9?>">
          <a href="#">
            <i class="fa fa-bars"></i>
            <span>Footer</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url().'Admin/Profil/sosmed'?>"><i class="fa fa-google-plus"></i> Media Sosial</a></li>
<!--             <li><a href="#"><i class="fa fa-star-o"></i> Prestasi Siswa</a></li> -->
            
          </ul>
        </li>
    
    <li class="treeview <?php echo $cek2?>">
      <a href="#">
        <i class="fa fa-newspaper-o"></i>
        <span>Home & Artikel</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
      </a>
      <ul class="treeview-menu">
        <li><a href="<?php echo base_url().'Admin/Tulisan'?>"><i class="fa fa-newspaper-o"></i> Artikel</a></li>
        <li><a href="<?php echo base_url().'Admin/Tulisan/add_tulisan'?>"><i class="fa fa-plus"></i> Tambah Artikel</a></li>
<!--             <li><a href="<?php echo base_url().'Admin/Kategori'?>"><i class="fa fa-wrench"></i> Kategori</a></li> -->
      </ul>
    </li>
    <li class="treeview <?php echo $cek11?>">
      <a href="#">
        <i class="fa fa-link"></i>
        <span>Tautan</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
      </a>
      <ul class="treeview-menu">
        <li><a href="<?php echo base_url().'Admin/Tautan'?>"><i class="fa fa-link"></i> Tautan</a></li>
        <li><a href="<?php echo base_url().'Admin/Tautan/add_tautan'?>"><i class="fa fa-plus"></i> Tambah Tautan</a></li>
      
      </ul>
      </li>
        


        <li class="treeview <?php echo $cek3?>">
          <a href="#">
            <i class="fa fa-home"></i>
            <span>Halaman Profil</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url().'Admin/Profil'?>"><i class="fa fa-home"></i> Profil</a></li>
            <li><a href="<?php echo base_url().'Admin/Profil/Pejabat'?>"><i class="fa fa-user"></i> Data Pejabat</a></li>
             <li><a href="<?php echo base_url().'Admin/Kategori'?>"><i class="fa fa-wrench"></i> Kategori</a></li>
          </ul>
        </li>

        <li class="treeview <?php echo $cek13?>">
          <a href="#">
          <i class="fa fa-book"></i>
            <span>Program</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
          <li><a href="<?php echo base_url().'Admin/Program?kode=1'?>"><i class="fa fa-file-text-o"></i>Rencana Kerja (Renstra)</a></li>
            <li><a href="<?php echo base_url().'Admin/Program?kode=2'?>"><i class="fa fa-file-text-o"></i>Rencana Kerja (Renja)</a></li>
             <li><a href="<?php echo base_url().'Admin/Program?kode=3'?>"><i class="fa fa-file-text-o"></i>Anggaran (Dipa)</a></li>
          </ul>
        </li>

        <li class="treeview <?php echo $cek14?>">
          <a href="#">
          <i class="fa fa-book"></i>
            <span>Kinerja</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url().'Admin/Kinerja?kode=4'?>"><i class="fa fa-file-text-o"></i>Kinerja (Laporan Keuangan)</a></li>
            <li><a href="<?php echo base_url().'Admin/Kinerja?kode=5'?>"><i class="fa fa-file-text-o"></i>Kinerja (Lakin)</a></li>
            <li><a href="<?php echo base_url().'Admin/Kinerja?kode=6'?>"><i class="fa fa-file-text-o"></i>Kinerja (Capaian Kinerja)</a></li>
            <li><a href="<?php echo base_url().'Admin/Kinerja?kode=7'?>"><i class="fa fa-file-text-o"></i>Kinerja(Realisasi Anggaran)</a></li>
            <li><a href="<?php echo base_url().'Admin/Kinerja?kode=8'?>"><i class="fa fa-file-text-o"></i>Kinerja (Neraca Keuangan)</a></li>
            <li><a href="<?php echo base_url().'Admin/Kinerja?kode=9'?>"><i class="fa fa-file-text-o"></i>Laporan Tahunan</a></li>
            <li><a href="<?php echo base_url().'Admin/Kinerja?kode=10'?>"><i class="fa fa-file-text-o"></i>Laporan Tahunan PPID</a></li>
            <li><a href="<?php echo base_url().'Admin/Kinerja?kode=11'?>"><i class="fa fa-file-text-o"></i>Index Kepuasan Masyarakat</a></li>
          </ul>
        </li>
<!--          
         <li class="treeview <?php echo $cek2?>">
          <a href="#">
            <i class="fa fa-newspaper-o"></i>
            <span>Berita</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url().'Admin/Tulisan'?>"><i class="fa fa-list"></i> List Berita</a></li>
            <li><a href="<?php echo base_url().'Admin/Tulisan/add_tulisan'?>"><i class="fa fa-thumb-tack"></i> Post Berita</a></li>
            <li><a href="<?php echo base_url().'Admin/Kategori'?>"><i class="fa fa-wrench"></i> Kategori</a></li> 
          </ul>
        </li> --> 


        <li class="<?php echo $cek3?>">
          <a href="<?php echo base_url().'Admin/Pengguna'?>">
            <i class="fa fa-users"></i> <span>Pengguna</span>
            <span class="pull-right-container">
              <small class="label pull-right"></small>
            </span>
          </a>
        </li>
        <li class="<?php echo $cek5?>">
          <a href="<?php echo base_url().'Admin/Pengumuman'?>">
            <i class="fa fa-volume-up"></i> <span>Pengumuman</span>
            <span class="pull-right-container">
              <small class="label pull-right"></small>
            </span>
          </a>
        </li>
        <!-- <li class="treeview <?php echo $cek6?>">
          <a href="#">
            <i class="fa fa-files-o"></i>
            <span>Files</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url().'Admin/Files'?>"><i class="fa fa-files-o"></i> Files</a></li>
            <li><a href="<?php echo base_url().'Admin/Kategori_file'?>"><i class="fa fa-clone "></i> Kategori File</a></li>
          </ul>
        </li>
         -->
         <li class="<?php echo $cek12?>">
          <a href="<?php echo base_url().'Admin/Files'?>">
          <i class="fa fa-files-o"></i> <span>Files</span>
            <span class="pull-right-container">
              <small class="label pull-right"></small>
            </span>
          </a>
        </li>

        <li class="treeview <?php echo $cek14?>">
          <a href="#">
            <i class="fa fa-info-circle"></i>
            <span>Informasi Publik</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url().'Admin/Informasi_publik?kode=1'?>"><i class="fa fa-file-o"></i> Informasi Publik Berkala</a></li>
            <li><a href="<?php echo base_url().'Admin/Informasi_publik?kode=2'?>"><i class="fa fa-file-o"></i> Informasi Publik Setiap Saat</a></li>
            <li><a href="<?php echo base_url().'Admin/Informasi_publik/setiap_saat?kode=1'?>"><i class="fa fa-external-link"></i> Setiap Saat</a></li>
            <li><a href="<?php echo base_url().'Admin/Informasi_publik/setiap_saat?kode=2'?>"><i class="fa fa-external-link"></i> Serta Merta</a></li>
          </ul>
        </li>

        <li class="treeview <?php echo $cek7?>">
          <a href="#">
            <i class="fa fa-camera"></i>
            <span>Galeri</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url().'Admin/Album'?>"><i class="fa fa-book"></i> Album</a></li>
            <li><a href="<?php echo base_url().'Admin/Galeri'?>"><i class="fa fa-picture-o"></i> Seluruh Foto</a></li>
            <li><a href="<?php echo base_url().'Admin/Video'?>"><i class="fa fa-video-camera"></i> Video</a></li>
          </ul>
        </li>

        <li class="<?php echo $cek8?>">
          <a href="<?php echo base_url().'Admin/Guru'?>">
            <i class="fa fa-graduation-cap"></i> <span>Data Guru</span>
            <span class="pull-right-container">
              <small class="label pull-right"></small>
            </span>
          </a>
        </li>

        <li class="<?php echo $cek12?>">
          <a href="<?php echo base_url().'Admin/Agenda'?>">
          <i class="fa fa-calendar"></i> <span>Agenda</span>
            <span class="pull-right-container">
              <small class="label pull-right"></small>
            </span>
          </a>
        </li>

        <li class="treeview <?php echo $cek9?>">
          <a href="#">
            <i class="fa fa-user"></i>
            <span>Kesiswaan</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url().'Admin/Siswa'?>"><i class="fa fa-users"></i> Data Siswa</a></li>
<!--             <li><a href="#"><i class="fa fa-star-o"></i> Prestasi Siswa</a></li> -->
            
          </ul>
        </li>
        
        <li class="<?php echo $cek10?>">
          <a href="<?php echo base_url().'Admin/Inbox'?>">
            <i class="fa fa-envelope"></i> <span>Inbox</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-green"><?php echo $jum_pesan;?></small>
            </span>
          </a>
        </li>

         <li>
          <a href="<?php echo base_url().'Administrator/logout'?>">
            <i class="fa fa-sign-out"></i> <span>Sign Out</span>
            <span class="pull-right-container">
              <small class="label pull-right"></small>
            </span>
          </a>
        </li>
        
       
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>