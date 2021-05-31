<link rel="stylesheet" href="../css/bacheca.css" type="text/css">
<script type="text/javascript" src="../js/recensioni.js"></script>

<script>
var  c;
function modalRec(cod) {
    c=cod;
    $("#recModal").modal("toggle");
}

function commenta(esame) {
    $("#recModal").modal("toggle");
    var commento = document.getElementById("commentText").value;
    var xhttp = new XMLHttpRequest();
              xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                if (this.responseText==1) {
                    <?php $_SESSION['page'] = 'esame';   ?>
                    $(document).ready(function(){
                        $('#internoBox').load('./recensionim.php?codex='+esame);
                    });
                }
                else { 
                  alert('something went wrong');
                     }
                }
              };
      xhttp.open("POST", "../php/commenta.php", true);
      xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
      xhttp.send("idesame="+esame+"&commento="+commento+"&reply=0");
}


</script>

<?php 
    session_start();
    include "./../php/connect.php";
    $n_esami=0;
    $tot_crediti=0;
    $cod_utente = $_SESSION['cod_utente'];
    $mail = $_SESSION["mail"];

    $sql_corso = "SELECT * FROM corso, iscrizione WHERE iscrizione.cod_utente = '$cod_utente' and  iscrizione.corso = corso.cod_corso" ;
    $result = $conn->query($sql_corso);
    $s=0;
    if ($result->num_rows >= 1) {
                        
        $corso = $result->fetch_assoc();

        $sql_esami = "SELECT * FROM verbalizzazioni, esami WHERE verbalizzazioni.utente = '$cod_utente' and verbalizzazioni.esame = esami.cod_esame " ;
        $esami = $conn->query($sql_esami);

        while($esame = $esami->fetch_assoc()) {
        
            $n_esami++;
            $tot_crediti = $tot_crediti + $esame['crediti'];
        }

        $sql_chart = "SELECT esami.nome, verbalizzazioni.voto FROM esami, verbalizzazioni WHERE verbalizzazioni.esame = esami.cod_esame and verbalizzazioni.utente = '$cod_utente' " ;
        $resultc = $conn->query($sql_chart);
    
        $data_array = array(); 
        $nex=0;
        $tot_voti=0;
    }

?>

<div class="modal fade" id="recModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticRatingLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="staticRatingLabel">Valuta Corso</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            
                <div class="rate">
                    <input type="radio" id="star5" name="rate" value="5" />
                    <label for="star5" title="text">5 stars</label>
                    <input type="radio" id="star4" name="rate" value="4" />
                    <label for="star4" title="text">4 stars</label>
                    <input type="radio" id="star3" name="rate" value="3" />
                    <label for="star3" title="text">3 stars</label>
                    <input type="radio" id="star2" name="rate" value="2" />
                    <label for="star2" title="text">2 stars</label>
                    <input type="radio" id="star1" name="rate" value="1" />
                    <label for="star1" title="text">1 star</label>
                </div>
                
            
            <button type="button" class="btn dark-btn" data-bs-dismiss="modal" id="triggerval" onclick="rate(c)">Valuta</button>
            <br>
            <textarea class="form-control" id="commentText" rows="5"></textarea>
  <br>
        </div>
        
        <div class="modal-footer">
            <button type="button" class="btn dark-btn" data-bs-dismiss="modal" id="triggerval" onclick="commenta(c)">Inserisci recensione</button>
        </div>
        </div>
        </div>
    </div>
    </div>
    </div>

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
    <h5 class="card-title">Benvenuto/a <?php echo $_SESSION['nome'] ?></h5>
</div>


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
                        <div id="donutchart" style="object-fit: cover;"></div> 
                    
                
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
        
        while($esame2 = $esami2->fetch_assoc()) {
            $c++;
            if($c<6) {
            
            echo '<li class="list-group-item d-flex justify-content-between esame-gruppo">
                  <div class="info-esame ">
                  <div class="nome-esame">
                  <a onclick="esamec('.$esame2['cod_esame'].')">'.$esame2['nome'].'</a></div>
                  <div class="prof">'.$esame2['professore'].'</div>
                  </div>
                
                  <div class="d-flex justify-content-between">
                  <div class="rec"><button class="btn dark-btn" onclick="modalRec('.$esame2['cod_esame'].')">Recensione</button></div>
                  <div class="cfu" style="width: 150px; padding-left: 20px;">'.$esame2['crediti'].' CFU</div>
                  <div class=""><span class=" badge voto" >'.$esame2['voto'].'</span></div>
                  </div>
                  </li>';
            }
        }

        ?>

        </ul>
    </div>
    <div class=" col-xl main shadow p-3 mb-3 ml-0 ml-xl-1 bg-body rounded">
        <h5 class="card-title">Media degli esami</h5>
        <br>
        <br>
            <div id="chart_div" style="width: auto; height: auto;"></div>
        
    </div>
</div>
        
  
