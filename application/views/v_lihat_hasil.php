
  
	</section>

	

<?php
        /* Mengambil query report*/
        foreach($visitor1 as $result){
            $bulan[] = $result->tgl; //ambil bulan
            $value[] = (float) $result->jumlah; //ambil nilai
        }

        
        /* end mengambil query*/
         
    ?>
  <section class="content-holder b-none inner_content" style="margin-top: 50px;">
  
  	<section class="container container-fluid">

	          <section class="row-fluid">

		<h2 class="heading"> Lihat hasil jejak pendapat</h2>
		<span class="border-line m-bottom" style="margin-top: 5px;margin-left: -19px;"></span>
		
	<section class="page_content">
		<section class="span9 first">

			
			<canvas id="canvas" width="640" height="280"></canvas>
			

	
		</section>
		<figure class="span3" style="width: 245px;margin-left: 34px;margin-top: 9px;">
  <blockquote>
  <h2 style='border-bottom: 6px solid #3a813c;width: 243px;margin-left: -15px;'></h2>
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
                              <a href="<?php echo base_url().'Home/kataSambutan'?>"><img src="<?php echo base_url().'assets/images/'.$image?>" alt="Ir. Mattobi'i, MP" /></a>
                              <strong class="candidate-name"><?php echo $nama?></strong>
                            </li>
                        </ul>
                    </div>
          <strong class="title2"> Kepala Sekolah</strong>
                    <p><?php echo limit_words($deskripsi,4).'...';?></p>

        </div>
                
            </div>
            <!-- Carousel End -->
            </blockquote>

            <blockquote>
                 <h2 style='border-bottom: 6px solid #3a813c;width: 243px;margin-left: -15px;'></h2>
          <!-- Carousel -->
                        <h3 style="margin-top: -7px;">Tautan</h3>
                        <span class="border-line m-bottom" style="margin-top: 5px;margin-left: -5px;"></span>
                          <ul class="nav nav-list">
                            <li><a href="http://bppsdmp.pertanian.go.id/id"><img src="<?php echo base_url().'assets/images/Kementan.png'?>" style="width: 36px;margin-right: 9px;">BPPSDMP</a></li>
                            <li ><a href="http://www.pertanian.go.id/"><img src="<?php echo base_url().'assets/images/Kementan.png'?>" style="width: 36px;margin-right: 9px;">KEMENTAN</a></li>
                            <li ><a href="http://cybex.pertanian.go.id/"><img src="<?php echo base_url().'assets/images/cybex.png'?>" style="width: 36px;margin-right: 9px;">Cyber Extension</a></li>
                            <li ><a href="http://www.sumselprov.go.id/index.php?module=content&id=1"><img src="<?php echo base_url().'assets/images/sumsel.png'?>" style="width: 36px;margin-right: 9px;">Provinsi SUMSEL</a></li>
                            <li ><a href="http://banyuasinkab.go.id/"><img src="<?php echo base_url().'assets/images/banyuasin.png'?>" style="width: 36px;margin-right: 9px;">Kabupaten Bayuasin</a></li>
                            <li ><a href="http://www.spmabanjarbaru.sch.id/"><img src="<?php echo base_url().'assets/images/banjarbaru.png'?>" style="width: 36px;margin-right: 9px;">SMK PP N Banjar Baru</a></li>
                          </ul>               
            <!-- Carousel End -->
            </blockquote>

            <blockquote style="margin-top: 35px;">
                 <h2 style='border-bottom: 6px solid #3a813c;width: 243px;margin-left: -15px;'></h2>
          <!-- Carousel -->
                        <h3 style="margin-top: -7x;">Pengunjung Hari Ini</h3>
                        <span class="border-line m-bottom" style="margin-top: 5px;margin-left: -5px;"></span>
                          <ul class="a-list">
                            <li style="margin-left: 13px;"><?php echo $visitor?></li>
                          </ul>

                        <h3 style="margin-top: 0px;">Total Pengunjung</h3>
                        <span class="border-line m-bottom" style="margin-top: 5px;margin-left: -5px;"></span>
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
                      </script>
                      <div id="datepicker1"></div>
            </blockquote>

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
</figure>
	</section>
   
	</section>
 
  </section>
  <!-- footer -->
  <section class="footer-top">
    <section class="container2-fluid">
      <figure class="span3" style="margin-right: 50px;">
          <h2>Tautan</h2>
            <ul class="a-list">
                <li><a href="http://bppsdmp.pertanian.go.id/id">BPPSDMP</a></li>
                <li><a href="http://www.pertanian.go.id/">KEMENTAN</a></li>
                <li><a href="http://cybex.pertanian.go.id/">Cyber Extension</a></li>
                <li><a href="http://www.sumselprov.go.id/index.php?module=content&id=1">Provinsi Sumatera Selatan</a></li>
                <li><a href="http://banyuasinkab.go.id/">Kabupaten Banyuasin</a></li>
                <li><a href="http://www.spmabanjarbaru.sch.id/">SMK PP Negeri Banjar Baru</a></li>
            </ul>
        </figure>
        <figure class="span3" style="margin-right: 50px;">
          <h2>Kategori</h2>
            <ul class="a-list">
                <li><a href="<?php echo base_url().'Artikel/kategori/1'?>">Jadwal</a></li>
                <li><a href="<?php echo base_url().'Artikel/kategori/2'?>">KampusKu</a></li>
                <li><a href="<?php echo base_url().'Artikel/kategori/3'?>">Kegiatan Minggu Ini</a></li>
                <li><a href="<?php echo base_url().'Artikel/kategori/5'?>">Kerja Sama</a></li>
                <li><a href="<?php echo base_url().'Artikel/kategori/7'?>">Pengumuman</a></li>
                <li><a href="<?php echo base_url().'Artikel/kategori/8'?>">Agenda</a></li>
            </ul>
        </figure>
        <figure class="span3" style="margin-right: 92px;">
          <h2>Hubungi Kami</h2>
            <ul class="a-list">
                <li style="margin-right: 10px;"><i class="icon-home icon-white"></i>Jl. Palembang - Jambi KM.29, 19 Ilir, Palembang, Kota Palembang, Sumatera Selatan 30010</li>
                <li style="margin-right: 10px;"><i class="icon-headphones icon-white"></i><(0711) 365553</li>
                <li style=""><i class="icon-bookmark icon-white"></i><a href="https://www.smkppnsembawa.sch.id/">smkppnsembawa.sch.id</a> </li>
                <li style="margin-right: 10px;"><i class="icon-envelope icon-white"></i>sppnsembawa@yahoo.com</li>
            </ul>
        </figure>
        <figure class="span2">
          <h2> Follow Us </h2>
          
                <div id="socialicons" class="hidden-phone">
                <a id="social_facebook" class="social_active" href="https://www.facebook.com/SMK-PP-Negeri-Sembawa-141728806448588/" title="Visit Facebook page"><span></span></a>  
                <a id="social_twitter" class="social_active" href="https://twitter.com/SMKPPN_SEMBAWA" title="Visit Twitter page"><span></span></a> 
                <a id="social_google_plus" class="social_active" href="#" title="Visit Google Plus page"><span></span></a>
                <a id="social_linkedin" class="social_active" href="https://www.linkedin.com/title/staff-at-kementan" title="Visit LinkedIn page"><span></span></a>
                <a id="social_youtube" class="social_active" href="https://www.youtube.com/channel/UCN9haidWqsrmRqp5BAhUNGw?view_as=subscriber" title="Visit Youtube page"><span></span></a>
                <a id="social_instagram" class="social_active" href="https://www.instagram.com/smkppn_sembawa/" title="Visit Instagram page"><span></span></a>      
                </div>
        </figure>
    </section>
  </section>
  <!-- footer -->
  <footer id="footer">
    <p style="color: white;">Copyright © 2018 Designed by: <a style="color:#387f3a;" href="http://digitalcreative.web.id">Digital Creative</a></p>
  </footer>
</div>


<script src="<?php echo base_url()?>assets/js/jquery-1.9.1.min.js"></script>
 <script src="<?php echo base_url()?>assets/js/modernizr.custom.17475.js"></script>
 <script src="<?php echo base_url()?>assets/js/jsDatePick.min.1.3.js"></script>
 <script src="http://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/js/focus.js"></script><!-- clear input -->
<script type="text/javascript" src="<?php echo base_url()?>assets/js/bootstrap.js"></script><!-- bootstrap -->
<script type="text/javascript" src="<?php echo base_url()?>assets/js/lightbox.js"></script><!-- bootstrap -->
<script type="text/javascript" src="<?php echo base_url()?>assets/js/jquery.elastislide.js"></script><!-- Cerousel -->
 <script type="text/javascript" src="<?php echo base_url()?>assets/js/slider.js"></script><!-- FlexiSlider -->
 <script type="text/javascript" src="<?php echo base_url()?>assets/js/social.js"></script><!-- Social -->
 <script type="text/javascript" src="<?php echo base_url()?>assets/js/custom.js"></script><!-- Custom -->
 <script type="text/javascript" src="<?php echo base_url().'assets/plugins/chartjs/Chart.min.js'?>"></script><!-- chart -->
 <script type="text/javascript">
  /* <![CDATA[ */
    if ( jQuery('#calander_div').length > 0 ) {
 	window.onload = function(){
		g_globalObject = new JsDatePick({
			useMode:1,
			isStripped:true,
			target:"calander_div",
			cellColorScheme:"purple"
		});		
		};
		}    

	/*# Carousel Function #*/
    jQuery( '#carousel' ).elastislide();
    jQuery(document).ready(function($) {
	// Social Icons Function **/
		$('.switch_toggle').click(function(){
			$(this).next('.filter').slideToggle();
			$(this).toggleClass("minus_icon"); 
		});
		$('.social_active').hoverdir( {} );
	})

		/* ]]> */
	</script>
	<script>
	$(document).ready(function(){
	    $('#myTable').DataTable();
	} );

	</script>
<script src="<?php echo base_url()?>assets/js/cockies.js"></script> <!-- jQuery cookie --> 

 <script>

            var lineChartData = {
                labels : <?php echo json_encode($bulan);?>,
                datasets : [
                    
                    {
                        fillColor: "rgba(60,141,188,0.9)",
                        strokeColor: "rgba(60,141,188,0.8)",
                        pointColor: "#3b8bba",
                        pointStrokeColor: "#fff",
                        pointHighlightFill: "#fff",
                        pointHighlightStroke: "rgba(152,235,239,1)",
                        data : <?php echo json_encode($value);?>
                    }

                ]
                
            }

        var myLine = new Chart(document.getElementById("canvas").getContext("2d")).Line(lineChartData);

        var canvas = new Chart(myLine).Line(lineChartData, {
            scaleShowGridLines : true,	
            scaleGridLineColor : "rgba(0,0,0,.005)",
            scaleGridLineWidth : 0,
            scaleShowHorizontalLines: true,
            scaleShowVerticalLines: true,
            bezierCurve : true,
            bezierCurveTension : 0.4,
            pointDot : true,
            pointDotRadius : 4,
            pointDotStrokeWidth : 1,
            pointHitDetectionRadius : 2,
            datasetStroke : true,
            tooltipCornerRadius: 2,
            datasetStrokeWidth : 2,
            datasetFill : true,
            legendTemplate : "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style=\"background-color:<%=datasets[i].strokeColor%>\"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>",
            responsive: true
        });
        
        </script>

</body>
</html>
  
</body>
</html>

 