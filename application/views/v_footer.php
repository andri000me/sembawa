 <!-- footer -->
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
.fa {
  padding: 9px;
  font-size: 18px;
  width: 15px;
  text-align: center;
  text-decoration: none;
  margin: 5px 3px;
}

.fa:hover {
    opacity: 0.7;
}

.fa-facebook {
  background: #3B5998;
  color: white;
}

.fa-twitter {
  background: #55ACEE;
  color: white;
}

.fa-google {
  background: #dd4b39;
  color: white;
}

.fa-linkedin {
  background: #007bb5;
  color: white;
}
.fa-youtube {
  background: #bb0000;
  color: white;
}

.fa-instagram {
  background: #125688;
  color: white;
}
</style>

  <section class="footer-top">
  	<section class="container container2-fluid">
    	<figure class="span4" style="margin-right: 50px; margin-left: 50px;">
        	<h2>Tautan</h2>
            <ul class="a-list">
                <?php foreach($tautan->result_array() as $row):

                            $id = $row['tulisan_id'];
                            $judul = $row['tulisan_judul'];
                            $link = $row['tulisan_link'];
                            $gambar = $row['tulisan_gambar'];
                            ?>
                <li><a href="<?php echo $link ?>" target="blank"><?php echo $judul ?></a></li>
            <?php endforeach; ?>
            </ul>
        </figure>
        <figure class="span4" style="margin-right: 92px;">
        	<h2>Hubungi Kami</h2>
            <ul class="a-list">
                <li style="margin-right: 10px;"><i class="icon-home icon-white"></i>Jalan Palembang-Pangkalan Balai Km. 29 Sembawa Kec. Sembawa Kab. Banyuasin Sumatera Selatan</li>
                <li style="margin-right: 10px;"><i class="icon-headphones icon-white"></i><(0711) 7439058</li>
                <li style=""><i class="icon-bookmark icon-white"></i><a href="https://www.smkppnsembawa.sch.id/">smkppnsembawa.sch.id</a> </li>
                <li style="margin-right: 10px;"><i class="icon-envelope icon-white"></i>sppnsembawa@yahoo.com</li>
            </ul>
        </figure>
        <figure class="span2">
          <?php 
          $facebook = $this->db->query("SELECT link from tbl_sosmed where keterangan = 'facebook'")->row_array();
          $twitter = $this->db->query("SELECT link from tbl_sosmed where keterangan = 'twitter'")->row_array();
          $googleplus = $this->db->query("SELECT link from tbl_sosmed where keterangan = 'googleplus'")->row_array();
          $linkedin = $this->db->query("SELECT link from tbl_sosmed where keterangan = 'linkedin'")->row_array();
          $youtube = $this->db->query("SELECT link from tbl_sosmed where keterangan = 'youtube'")->row_array();
          $instagram = $this->db->query("SELECT link from tbl_sosmed where keterangan = 'instagram'")->row_array();
                  ?>
          <h2> Follow Us </h2>
          
                <div id="socialicons" >
                <a id="facebook" class="fa fa-facebook" href="<?=$facebook['link']?>" target="_blank" title="Visit Facebook page"><span></span></a>  
                <a id="twitter" class="fa fa-twitter" href="<?=$twitter['link']?>" target="_blank" title="Visit Twitter page"><span></span></a> 
                <a id="google_plus" class="fa fa-google" href="<?=$googleplus['link']?>" target="_blank" title="Visit Google Plus page"><span></span></a>
                <a id="linkedin" class="fa fa-linkedin" href="<?=$linkedin['link']?>" target="_blank" title="Visit LinkedIn page"><span></span></a>
                <a id="youtube" class="fa fa-youtube" href="<?=$youtube['link']?>" target="_blank" title="Visit Youtube page"><span></span></a>
                <a id="instagram" class="fa fa-instagram" href="<?=$instagram['link']?>" target="_blank" title="Visit Instagram page"><span></span></a>      
                </div>
        </figure>
    </section>
  </section>
  <!-- footer -->
  <footer id="footer">
    <p style="color: white; text-align:center ;font-size:14px ">Copyright © 2020 Designed by: <a style="color:#387f3a;" href="http://digitalcreative.web.id">Digital Creative</a></p>
  </footer>
</div>


<script src="<?php echo base_url()?>assets/js/jquery-1.9.1.min.js"></script>
 <script src="<?php echo base_url()?>assets/js/modernizr.custom.17475.js"></script>
 <script src="<?php echo base_url()?>assets/js/jsDatePick.min.1.3.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/js/focus.js"></script><!-- clear input -->
<script type="text/javascript" src="<?php echo base_url()?>assets/js/bootstrap.js"></script><!-- bootstrap -->
<script type="text/javascript" src="<?php echo base_url()?>assets/js/lightbox.js"></script><!-- bootstrap -->
<script type="text/javascript" src="<?php echo base_url()?>assets/js/jquery.elastislide.js"></script><!-- Cerousel -->
 <script type="text/javascript" src="<?php echo base_url()?>assets/js/slider.js"></script><!-- FlexiSlider -->
 <script type="text/javascript" src="<?php echo base_url()?>assets/js/social.js"></script><!-- Social -->
 <script type="text/javascript" src="<?php echo base_url()?>assets/js/custom.js"></script><!-- Custom -->
 <script src="<?php echo base_url().'assets/plugins/chartjs/Chart.min.js'?>"></script>
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

</body>
</html>