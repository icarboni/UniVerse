<link rel="stylesheet" href="../css/bacheca4.css" type="text/css">

<?php 
    
    $n_esami=0;
    $tot_crediti=0;
    
    while($esame = $esami->fetch_assoc()) {
        
        $n_esami++;
        $tot_crediti = $tot_crediti + $esame['crediti'];
    }

    
$sql_chart = "SELECT esami.nome, verbalizzazioni.voto FROM esami, verbalizzazioni WHERE verbalizzazioni.esame = esami.cod_esame " ;
$resultc = $conn->query($sql_chart);

$data_array = array(); 
$nex=0;
$tot_voti=0;
    
?>
<!--
<script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Crediti', 'Numero'],
          ['Conseguiti',     100],
          ['No',     80],
        ]);

        var options = {
          
          pieHole: 0.6,
          pieSliceTextStyle: {
            color: 'black',
          },
          legend: 'none',

          slices: {
            0: { color: '#7c74ea' },
            1: { color: '#9DA1B3' }
          },

          animation: {
              startup: true,
              duration: 2000
          },
          chartArea: {
              left: 0,
              right: 0,
              bottom: 0
          }
        };

        var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
        chart.draw(data, options);
      }

     
    </script> -->

    <?php
    echo "
    <script>
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawVisualization);

      function drawVisualization() {
        // Some raw data (not necessarily accurate)
        var data = google.visualization.arrayToDataTable([
          ['Esame', 'Voto conseguito',  'Media Totale'],";
          
            
            while($rows = $resultc->fetch_assoc()) { 
                $nex++;
                $tot_voti= $tot_voti+ (int)$rows['voto'];
                $voto = (int)$rows['voto'];
                $esame = $rows['nome'];
                $media = (float)number_format((int)$tot_voti/(int)$nex, 2);
                echo "['".$esame."', ".$voto." ,".$media."],";
            } 
             
        echo "]);
        

        var options = {
          
          vAxis: {title: 'Voto'},
          hAxis: {title: 'Esame'},
          seriesType: 'bars',
          series: {
                0: {color: '#7c74ea'},
                1: {color: '#c3bfff',
                    type: 'line'} 
                },
          legend: {
                alignment: 'center',
                position: 'bottom'
                }

        
        };

        var chart = new google.visualization.ComboChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      }
    </script>"; ?>



<div class="row mr-3 ml-3">
    <h5 class="card-title">Benvenuto/a <?php echo $utente["nome"]; ?></h5>
</div>

<!--
<div class="row mr-3 ml-3">
    <div class="col-12 main shadow p-3 mb-3 bg-body rounded">
    <h5 class="card-title">Stato di avanzamento della tua carriera</h5>
        <div class="progress">
            <div class="progress-bar progress-bar-custom progress-bar-striped progress-bar-animated" role="progressbar"  aria-valuemin="0" aria-valuemax="100" ></div>
        </div>
        
        <div class="row mr-1 ml-1 mt-3">
            <div class="carte-interne col-md main shadow p-3 mb-3 mr-3 bg-body rounded">
                <p class="crediti">Numero crediti conseguiti: x/180 </p>
            </div>
            <div class="carte-interne col-md main shadow p-3 mb-3 mr-3 bg-body rounded">
                <p class="crediti">Numero di esami svolti: x/x </p>
            </div>
            <div class="carte-interne col-md main shadow p-3 mb-3  bg-body rounded">
                <p class="crediti">Numero di esami mancanti: x/x </p>
            </div>
        </div>
        
            
    </div>

</div>
-->

<div class="row mr-3 ml-3">
    <div class="col-12 col-lg main shadow p-3 mb-3 mr-md-2 bg-body rounded">
        <h5 class="card-title">Stato di avanzamento della tua carriera</h5>
        <br>
        <div class="progress">
            <div class="progress-bar progress-bar-custom progress-bar-striped progress-bar-animated" id="progress"style="width: <?php echo round(($tot_crediti/$corso['crediti'])*100); ?>%" role="progressbar"  aria-valuemin="0" aria-valuemax="100" ><?php echo round(($tot_crediti/$corso['crediti'])*100); ?>%</div>
        </div>
    </div>
    <div class="col-12 col-lg ml-lg-2">
        <div class="row">   
            <div class="col-6 col-lg main shadow  mb-3 p-3 mr-2 bg-body rounded" id="donut-box">
                <h5 class="card-title">Numero crediti</h5>
                <br>
                <div class="crediti d-flex justify-content-center align-middle">
                    <div id="ncred"><?php echo $tot_crediti; ?></div><div id="totcred">/<?php echo $corso['crediti']; ?></div>
                </div>       
                    <!--    <div id="donutchart" style="object-fit: cover;"></div> -->
                    
                
                <br>
            </div>
            <div class="col col-lg main shadow mb-3 p-3 ml-2  bg-body rounded">
                <h5 class="card-title">Numero di esami svolti</h5>
                <br>
                <div class="crediti d-flex justify-content-center align-middle">
                    <div id="ncred"><?php echo $n_esami; ?></div><div id="totcred">/20</div>
                </div>
                
                <br>
            </div>
        </div>
    </div>        
</div>


<div class="row mr-3 ml-3">
    <div class="col-xl main shadow p-3 mb-3 mr-xl-2 bg-body rounded">
        <h5 class="card-title">Ultimi esami inseriri in carriera</h5>
        <ul class="list-group list-group-flush">

      <?php 
        $c = 0;
        $esami2 = $conn->query($sql_esami);
        while($c<5) {
        while($esame2 = $esami2->fetch_assoc()) {
            
            $c++;
            echo '<li class="list-group-item d-flex justify-content-between esame-gruppo">
                  <div class="info-esame ">
                  <div class="nome-esame"><a href="">'.$esame2['nome'].'</a></div>
                  <div class="prof">'.$esame2['professore'].'</div>
                  </div>
                
                  <div class="d-flex justify-content-between">
                  <div class="rec"><button class="btn dark-btn">Recensione</button></div>
                  <div class="cfu" style="width: 150px; padding-left: 20px;">'.$esame2['crediti'].' CFU</div>
                  <div class=""><span class=" badge voto" >'.$esame2['voto'].'</span></div>
                  </div>
                  </li>';
            }
        }

        ?>
<!--
            <li class="list-group-item d-flex justify-content-between esame-gruppo">
                <div class="info-esame">
                    <div class="nome-esame">Sistemi di calcolo</div>
                    <div class="prof">Camil Demetrescu</div>
                    
                </div>
                <div class="crediti">6 CFU</div>
                <span class="badge voto" >26</span>
            </li>
            <li class="list-group-item d-flex justify-content-between esame-gruppo">
                <div class="info-esame">
                    <div class="nome-esame">Sistemi di calcolo</div>
                    <div class="prof">Camil Demetrescu</div>
                    
                </div>
                <div class="crediti">6 CFU</div>
                <span class="badge voto" >26</span>
            </li>
            <li class="list-group-item d-flex justify-content-between esame-gruppo">
                <div class="info-esame">
                    <div class="nome-esame">Sistemi di calcolo</div>
                    <div class="prof">Camil Demetrescu</div>
                    
                </div>
                <div class="crediti">6 CFU</div>
                <span class="badge voto" >26</span>
            </li>
            <li class="list-group-item d-flex justify-content-between esame-gruppo">
                <div class="info-esame">
                    <div class="nome-esame">Sistemi di calcolo</div>
                    <div class="prof">Camil Demetrescu</div>
                    
                </div>
                <div class="crediti">6 CFU</div>
                <span class="badge voto" >26</span>
            </li>
            <li class="list-group-item d-flex justify-content-center esame-gruppo">
                <a href="">Visualizza tutti</a>
            </li>
            -->



        </ul>
        
    </div>
    <div class=" col-xl main shadow p-3 mb-3 ml-0 ml-xl-2 bg-body rounded">
        <h5 class="card-title">Media degli esami</h5>
        <br>
        <br>
            <div id="chart_div" style="width: auto; height: auto;"></div>
        
    </div>
</div>
        