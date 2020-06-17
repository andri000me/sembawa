 <style>
  
/*tooltip Box*/
.con-tooltip {

  position: relative;
  background: #82E0AA;
  
  border-radius: 5px;
  padding: 0 20px;
  margin: 10px;
  
  transition: all 0.3s ease-in-out;
  cursor: default;

}

/*tooltip */
.tooltip {
  visibility: hidden;
  z-index: 1;
  opacity: .40;
  
  width: 100%;
  padding: 0px 20px;

  background: #D0ECE7;
  position: absolute;
  top:-140%;
  left: -25%;
  
  border-radius: 9px;
  font: 16px;
  text-align: left;

  transform: translateY(9px);
  transition: all 0.3s ease-in-out;

}


/* tooltip  after*/
/* .tooltip::after {
  content: " ";
  width: 0;
  height: 0;
  
  border-style: solid;
  border-width: 12px 12.5px 0 12.5px;
  border-color: #333 transparent transparent transparent;

  position: absolute;
  left: 70%;

} */

.con-tooltip:hover .tooltip{
  visibility: visible;
  transform: translateY(-10px);
  opacity: 1;
  transition: .3s linear;
}

/*hover ToolTip*/
.left:hover {transform: translateX(-6px); }

/*left*/
.left .tooltip{left:-110%; }

.left .tooltip::after{
  top:46px;
  left:100%;
  transform: rotate(-90deg);
}

.fontAgenda{
    font-size: 13px;
    font-family: "Lucida Console", Courier, monospace;
    text-align: center;
    color: black;
  }
  
  .fontAgendaTable{
    font-family: Arial, Helvetica, sans-serif;
    font-size: 11px;
  }

 </style>

 <?php
            error_reporting(0);
            function limit_words($string, $word_limit){
                $words = explode(" ",$string);
                return implode(" ",array_splice($words,0,$word_limit));
            }

?>
 
 <hr>

        <?php 
        switch ($month){
            case 1 : $month = "Januari"; break;
            case 2 : $month = "Februari"; break;
            case 3 : $month = "Maret"; break;
            case 4 : $month = "April"; break;
            case 5 : $month = "Mei"; break;
            case 6 : $month = "Juni"; break;
            case 7 : $month = "Juli"; break;
            case 8 : $month = "Agustus"; break;
            case 9 : $month = "September"; break;
            case 10 : $month = "Oktober"; break;
            case 11 : $month = "November"; break;
            case 12 : $month = "Desember"; break;
        }
        ?>

        <div id="agendaByBulan">
        <?php if($agenda->result_array() == null) { ?>

            <p style="color: #C0392B;"><b>Belum Ada Agenda untuk Tanggal <?=$date ." ". $month ." ". $year ?> </b></p>

        <?php } else { ?>
          
          <p  style="color: #21618C;"><b> Agenda Tanggal <?=$date  . " " . $month . " " . $year ?> </b></p>
          <br>
          <p ><b>Klik Agenda Untuk Melihat Detail</b></p>

          <hr>
            <?php
            $no = 0;
             foreach ($agenda->result_array() as $i) :
              $no++;
                       $agenda_id=$i['agenda_id'];
                       $agenda_nama=$i['agenda_nama'];
                       $agenda_deskripsi=$i['agenda_deskripsi'];
                       $agenda_mulai=$i['agenda_mulai'];
                       $agenda_selesai=$i['agenda_selesai'];
                       $agenda_tempat=$i['agenda_tempat'];
                       $agenda_waktu=$i['agenda_waktu'];
                       $agenda_keterangan=$i['agenda_keterangan'];
                       $agenda_author=$i['agenda_author'];
                       $tanggal=$i['tanggal'];
            ?>   
                        <div class="con" >
                        <!-- Left tooltip -->
                        <div class="con-tooltip left">
                        <a class="fontAgenda" onclick="detailAgenda(<?= $agenda_id ?>)" ondblclick="tutupDetail(<?= $agenda_id ?>)" ><b> <?= $no . ". " . $agenda_nama ?></b> </a>

                        <div class="tooltip" id="tooltipAgenda<?= $agenda_id ?>" style="display: none;">
                            <p >
                            <br>
                            <b><u> <?= $agenda_nama ?> </u></b>
                            <hr>
                            <table class="fontAgendaTable" border="1px" style="font-size: 14px;">
                                <tr width="200px">
                                    <td><b>Deskripsi Singkat<b></td>
                                    <td><?php echo limit_words($agenda_deskripsi,16).'...';?></td>
                                </tr>
                                <tr>
                                    <td><b>Tempat<b></td>
                                    <td><?= $agenda_tempat ?></td>
                                </tr>
                                <tr>
                                    <td><b> Waktu</b></td>
                                    <td><?= $agenda_waktu ?></td>
                                </tr>
                                <tr>
                                    <td><b> Tanggal</b></td>
                                    <td><?= $agenda_mulai ?> sd <?= $agenda_selesai ?></td>
                                </tr>
                            </table>
                            <hr>
                            </p>
                        </div>
                        </div>
                        </div>

                      
                        <div id="detAgenda<?= $agenda_id ?>" style="display: none;">
                            <p class="fontAgenda" id="klikSatu">
                                <hr>
                                <table class="fontAgendaTable" border="1px" style="font-size: 14px;">
                                    <tr width="200px">
                                        <td><b>Deskripsi Singkat<b></td>
                                        <td><?php echo limit_words($agenda_deskripsi,22).'...';?></td>
                                    </tr>
                                    <tr>
                                        <td><b>Tempat<b></td>
                                        <td><?= $agenda_tempat ?></td>
                                    </tr>
                                    <tr>
                                        <td><b> Waktu</b></td>
                                        <td><?= $agenda_waktu ?></td>
                                    </tr>
                                    <tr>
                                        <td><b> Tanggal</b></td>
                                        <td><?= $agenda_mulai ?> sd <?= $agenda_selesai ?></td>
                                    </tr>
                                </table>
                                <hr>
                            </p>
                        </div>

            <hr>
          <?php endforeach; ?>
        <?php } ?>
        </div>

      
<script>
  function detailAgenda(num){
      $(document).ready(function(){
        if(screen.width < 600)
          {
            $('#detAgenda'+num).removeAttr('style');
          }
        else
          {
            $('#tooltipAgenda'+num).removeAttr('style');  
          }
      });
  }
 </script>
