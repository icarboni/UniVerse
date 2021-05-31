    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../css/orari.css" type="text/css">
    <script type="text/javascript" src="../js/orari.js"></script>

    <?php include "../php/connect.php"; 
    $cod_utente = $_SESSION['cod_utente']; $i = "SELECT corso.num_anni FROM corso, iscrizione WHERE iscrizione.cod_utente = $cod_utente AND iscrizione.corso = corso.cod_corso"; 
    $r = $conn->query($i); $maxi = ($r->fetch_assoc())['num_anni']; 
    ?>

    <div class="btn-group pr-5">
            <button class="btn dropdown-toggle" type="button" id="A" name="ddm">
                Anno
            </button>
            <div class="dropdown-menu" id="dropdownMenuOrariA">
                <?php 
                for ($anno = 1; $anno <= $maxi; ++$anno) {
                  echo "<button class='dropdown-item' id=Anno$anno>$anno ° Anno</button>";
                }
                ?>
            </div>
    </div>
    <div class="btn-group">
            <button class="btn dropdown-toggle" type="button" id="S" name="ddm">
                Semestre
            </button>
            <div class="dropdown-menu" id="dropdownMenuOrariS"> 
                <button class="list-group-item border-0 pr-5" id="Sem1" onclick="changefirst()">1° Semestre</a>
                <button class="list-group-item border-0 pr-5" id="Sem2" onclick="changesecond()">2° Semestre</a>
            </div>
    </div> 
    
    <div class="container shadow p-3 mb-3  mr-2 bg-body rounded">
  <div class="title" id="main"></div>
  <div class="days">
    <div class="filler"></div>
    <div class="filler"></div>
    <div class="day" id="1"></div>
    <div class="day" id="2"></div>
    <div class="day" id="3"></div>
    <div class="day" id="4"></div>
    <div class="day" id="5"></div>
    <div class="day" id="6"></div>
    <div class="day" id="7"></div>
  </div>
  <div class="content">
    <div class="time" style="grid-row:1">08:00</div>
    <div class="time" style="grid-row:2">09:00</div>
    <div class="time" style="grid-row:3">10:00</div>
    <div class="time" style="grid-row:4">11:00</div>
    <div class="time" style="grid-row:5">12:00</div>
    <div class="time" style="grid-row:6">13:00</div>
    <div class="time" style="grid-row:7">14:00</div>
    <div class="time" style="grid-row:8">15:00</div>
    <div class="time" style="grid-row:9">16:00</div>
    <div class="time" style="grid-row:10">17:00</div>
    <div class="time" style="grid-row:11">18:00</div>
    <div class="time" style="grid-row:12">19:00</div>
    <div class="time" style="grid-row:13">20:00</div>
    <div class="filler-col"></div>
    <div class="col" style="grid-column:3"></div>
    <div class="col" style="grid-column:4"></div>
    <div class="col" style="grid-column:5"></div>
    <div class="col" style="grid-column:6"></div>
    <div class="col" style="grid-column:7"></div>
    <div class="col weekend" style="grid-column:8"></div>
    <div class="col weekend" style="grid-column:9"></div>
    <div class="row" style="grid-row:1"></div>
    <div class="row" style="grid-row:2"></div>
    <div class="row" style="grid-row:3"></div>
    <div class="row" style="grid-row:4"></div>
    <div class="row" style="grid-row:5"></div>
    <div class="row" style="grid-row:6"></div>
    <div class="row" style="grid-row:7"></div>
    <div class="row" style="grid-row:8"></div>
    <div class="row" style="grid-row:9"></div>
    <div class="row" style="grid-row:10"></div>
    <div class="row" style="grid-row:11"></div>
    <div class="row" style="grid-row:12"></div>
    <div class="row" style="grid-row:13"></div>
    <?php
      if (isset($_GET['anno'])) { $a = $_GET['anno'];
      $req = "SELECT * FROM orari WHERE orari.cod_corso IN (SELECT corso FROM iscrizione WHERE iscrizione.cod_utente = $cod_utente) AND orari.universita IN (SELECT universita FROM iscrizione WHERE iscrizione.cod_utente = $cod_utente) AND orari.cod_esame IN (SELECT cod_esame FROM esami WHERE esami.semestre = 1 AND esami.anno = $a)";
      $req2 = "SELECT * FROM orari WHERE orari.cod_corso IN (SELECT corso FROM iscrizione WHERE iscrizione.cod_utente = $cod_utente) AND orari.universita IN (SELECT universita FROM iscrizione WHERE iscrizione.cod_utente = $cod_utente) AND orari.cod_esame IN (SELECT cod_esame FROM esami WHERE esami.semestre = 2 AND esami.anno = $a)";
      }
      else { 
      $req = "SELECT * FROM orari WHERE orari.cod_corso IN (SELECT corso FROM iscrizione WHERE iscrizione.cod_utente = $cod_utente) AND orari.universita IN (SELECT universita FROM iscrizione WHERE iscrizione.cod_utente = $cod_utente) AND orari.cod_esame IN (SELECT cod_esame FROM esami WHERE esami.semestre = 1 AND esami.anno = 1)";
      $req2 = "SELECT * FROM orari WHERE orari.cod_corso IN (SELECT corso FROM iscrizione WHERE iscrizione.cod_utente = $cod_utente) AND orari.universita IN (SELECT universita FROM iscrizione WHERE iscrizione.cod_utente = $cod_utente) AND orari.cod_esame IN (SELECT cod_esame FROM esami WHERE esami.semestre = 2 AND esami.anno = 1)";
      }
      $res = $conn->query($req);
      while ($row = $res->fetch_assoc()) {
        $codex = $row['cod_esame'];
        $ex = "SELECT * FROM esami WHERE cod_esame = $codex"; $exr = $conn->query($ex); $e = $exr->fetch_assoc();
        $namex = $e['nome'];
        $prof = $e['professore'];
        $giorno = $row['giorno'] + 2; /* grid padding */
        $ora = $row['ora'] +1; /* grid padding */
        $durata = $row['durata'];
        echo "<div name='firstsem' class='event calendar1' style='grid-column: $giorno; grid-row: $ora/span $durata'> $namex <br> <span class='notbold'> $prof </span> </div>";
      }
      
      $res2 = $conn->query($req2);
      while ($row2 = $res2->fetch_assoc()) {
        $codex = $row2['cod_esame'];
        $ex2 = "SELECT * FROM esami WHERE cod_esame = $codex"; $exr2 = $conn->query($ex2); $e2 = $exr2->fetch_assoc();
        $namex = $e2['nome'];
        $prof = $e2['professore'];
        $giorno = $row2['giorno'] + 2; /* grid padding */
        $ora = $row2['ora'] +1; /* grid padding */
        $durata = $row2['durata'];
        echo "<div name='secondsem' class='event calendar2' style='display: none; grid-column: $giorno; grid-row: $ora/span $durata'> $namex <br> <span class='notbold'> $prof </span> </div>";
      }
    ?>
    </div>
    </div>
  </div>
</div>
<script> setdate();

var dropbtns = document.getElementsByName("ddm");
  for (var i = 0; i < dropbtns.length; i++) {
  dropbtns[i].onclick = function (e) {
      document.getElementById("dropdownMenuOrari" + e.target.getAttribute("id")).classList.toggle("show");
      if (e.target.getAttribute("id")=="A") document.getElementById("dropdownMenuOrariS").classList.remove("show");
      else document.getElementById("dropdownMenuOrariA").classList.remove("show");
      }
  }

  var dropitms = document.getElementsByClassName("dropdown-item");
  for (var i = 0; i < dropitms.length; i++) {
      dropitms[i].onclick = changeview;
  }

</script>