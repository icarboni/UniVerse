
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="../js/carriera.js"></script>
        <script type="text/javascript" src="../js/vue.min.js"></script>
        <link rel="stylesheet" href="../css/pagec.css" type="text/css">

        <script>

            
  function insertex(codesame) {
    votoesame = document.getElementById("votoesame").value;
    if (votoesame < 18 || votoesame > 31) { alert('Il valore del voto non è valido');
          return false;
          }
    else {
          var xhttp = new XMLHttpRequest();
              xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                if (this.responseText==1) {
                  $('#inserisciEsame').modal('hide');
                  alert('Hai inserito in Carriera questo esame: '+codesame+'\nAggiornamento esami svolti');
                  $('#internoBox').load('carriera.php');
                }
                else { 
                  alert('something went wrong!');
                     }
           
                }
              };
      xhttp.open("POST", "../php/inserisciesame.php", true);
      xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
      xhttp.send("codesame="+codesame+"&votoesame="+votoesame);
      }
  }

  function toggleremoveexam(codesame) {
      var xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
        if (this.responseText==1) {
          $('#inserisciEsame').modal('hide');
          alert('Hai rimosso dalla Carriera questo esame: '+codesame+'\nAggiornamento esami svolti');
          $('#internoBox').load('carriera.php');
        }
        else { 
          alert('something went wrong!');
            }
 
        }
      };
      xhttp.open("POST", "../php/rimuoviesame.php", true);
      xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
      xhttp.send("codesame="+codesame);
}

</script>

        <?php include "../php/connect.php";
        session_start(); 
        $u = (int)$_SESSION['cod_utente']; $na = "SELECT corso.num_anni FROM corso, iscrizione WHERE iscrizione.cod_utente = $u AND iscrizione.corso = corso.cod_corso";
        $ra = $conn->query($na); $maxi = ($ra->fetch_assoc())['num_anni']; 
        ?>
<div class="container">
       <div class="btn-group">
            <button class="btn dropdown-toggle" type="button" id="1" name="ddt">
                Anno Accademico
            </button>
            <div class="dropdown-menu" id="dropdownMenuButton1">
            <?php 
                for ($anno = 1; $anno <= $maxi; ++$anno) {
                  echo "<button class='dropdown-item' name='$anno'>$anno ° Anno</a></button>";
                }
                ?>
            </div>
        </div> 
        <div class="btn-group">
            <button class="btn dropdown-toggle" type="button" id="2" name="ddt">
                Percorso di Studi
            </button>
            <div class="dropdown-menu" id="dropdownMenuButton2">
                <button class="list-group-item border-0">Ingegneria Informatica</button>
            </div>
        </div>
        <br>
        <br>
        <div class="btn-group">
            <button class="btn" type="button" id="btn-svolti" onclick="changeesamidone()">
                Esami svolti
            </button>
        </div>
        <div class="btn-group">
            <button class="btn" type="button" id="btn-non-svolti" onclick="changeesamitodo()">
                Esami da svolgere
            </button>
        </div>

        <div class="row" id="Esami1" style="display:none">
            <?php
            $sql = "SELECT * FROM esami WHERE esami.anno = 1 ";
            $res1 = $conn->query($sql);
             while($row = $res1->fetch_assoc()) {
                $tit = $row['nome'];
                $s = (int)$row['semestre'];
                $credits = (int)$row['crediti'];
                $codice = (int)$row['cod_esame'];
                $sql2 = "SELECT * FROM verbalizzazioni WHERE utente=$u AND verbalizzazioni.esame = $codice";
                $result = $conn->query($sql2);
                if ($result->num_rows > 0) $bool = 0;
                else $bool = 1;   
                $q = "SELECT * FROM valutazioni WHERE valutazioni.cod_esame = $codice AND valutazioni.cod_utente = $u";
                $qres = $conn->query($q);
                if ($qres->num_rows > 0) $rated = 1; 
                else $rated = 0;
                $sql3 = "SELECT valore FROM valutazioni WHERE valutazioni.cod_esame = $codice";
                $resf = $conn->query($sql3);
                $media = (double)0.0;
                $numval = 0; $img;
                    while($row3 = $resf->fetch_assoc()) {
                        $media += $row3['valore'];
                        $numval += 1;
                    }
                if ($numval==0) $media = 's.v.';
                else $media = $media / $numval;
                if ($media == 's.v.') $img = 0;
                else if ($media > 0 && $media <= 2) $img = 1;
                else if ($media > 2 && $media <= 3) $img = 2;
                else if ($media > 3 && $media <= 4.5) $img = 3;
                else $img = 4;
                echo "<exam titolo='$tit' sem='$s' cfu='$credits' cod='$codice' d='$bool' rate='$media' star='$img' rated='$rated'></exam>";
             }
            ?>
        </div>
        <div class="row" id="Esami2" style="display:none">
            <?php
            $sql = "SELECT * FROM esami WHERE esami.anno = 2 ";
            $res2 = $conn->query($sql);
             while($row = $res2->fetch_assoc()) {
                $tit = $row['nome'];
                $s = (int)$row['semestre'];
                $credits = (int)$row['crediti'];
                $codice = (int)$row['cod_esame'];
                $sql2 = "SELECT * FROM verbalizzazioni WHERE utente=$u AND verbalizzazioni.esame = $codice";
                $result = $conn->query($sql2);
                if ($result->num_rows > 0) $bool = 0;
                else $bool = 1;
                $q2 = "SELECT * FROM valutazioni WHERE valutazioni.cod_esame = $codice AND valutazioni.cod_utente = $u";
                $qres2 = $conn->query($q2);
                if ($qres2->num_rows > 0) $rated = 1; 
                else $rated = 0;
                $sql3 = "SELECT valore FROM valutazioni WHERE valutazioni.cod_esame = $codice";
                $resj = $conn->query($sql3);
                $media = (double)0.0;
                $numval = 0; $img;
                    while($row3 = $resj->fetch_assoc()) {
                        $media += $row3['valore'];
                        $numval += 1;
                    }
                if ($numval==0) $media = 's.v.';
                else $media = $media / $numval;
                if ($media == 's.v.') $img = 0;
                else if ($media > 0 && $media <= 2) $img = 1;
                else if ($media > 2 && $media <= 3) $img = 2;
                else if ($media > 3 && $media <= 4.5) $img = 3;
                else $img = 4;
                echo "<exam titolo='$tit' sem='$s' cfu='$credits' cod='$codice' d='$bool' rate='$media' star='$img' rated='$rated'></exam>";
             }
            ?> 
        </div> 
        <div class="row" id="Esami3" style="display:none">
            <?php
            $sql = "SELECT * FROM esami WHERE esami.anno = 3 ";
            $res3 = $conn->query($sql);
             while($row = $res3->fetch_assoc()) {
                $tit = $row['nome'];
                $s = (int)$row['semestre'];
                $credits = (int)$row['crediti'];
                $codice = (int)$row['cod_esame'];
                $sql2 = "SELECT * FROM verbalizzazioni WHERE utente=$u AND verbalizzazioni.esame = $codice";
                $result = $conn->query($sql2);
                if ($result->num_rows > 0) $bool = 0;
                else $bool = 1;
                $q3 = "SELECT * FROM valutazioni WHERE valutazioni.cod_esame = $codice AND valutazioni.cod_utente = $u";
                $qres3 = $conn->query($q3);
                if ($qres3->num_rows > 0) $rated = 1; 
                else $rated = 0;
                $sql3 = "SELECT valore FROM valutazioni WHERE valutazioni.cod_esame = $codice";
                $ress = $conn->query($sql3);
                $media = (double)0.0;
                $numval = 0; $img;
                    while($row3 = $ress->fetch_assoc()) {
                        $media += $row3['valore'];
                        $numval += 1;
                    }
                if ($numval==0) $media = 's.v.';
                else $media = $media / $numval;
                if ($media == 's.v.') $img = 0;
                else if ($media > 0 && $media <= 2) $img = 1;
                else if ($media > 2 && $media <= 3) $img = 2;
                else if ($media > 3 && $media <= 4.5) $img = 3;
                else $img = 4;
                echo "<exam titolo='$tit' sem='$s' cfu='$credits' cod='$codice' d='$bool' rate='$media' star='$img' rated='$rated'></exam>";
             }
            ?>
        </div>
        
        <div class="row" id="Esamidone">
            <?php
        
            $sql = "SELECT * FROM esami, verbalizzazioni WHERE esami.cod_esame = verbalizzazioni.esame and verbalizzazioni.utente = $u";
            $res3 = $conn->query($sql);
            if ($res3->num_rows == 0) echo "<b><br><h2> Non hai svolto alcun Esame <h2> <h5> Prova ad inserire qualcuno tra gli 'Esami da svolgere'<h5>";
             while($row = $res3->fetch_assoc()) {
                $tit = $row['nome'];
                $s = (int)$row['semestre'];
                $credits = (int)$row['crediti'];
                $codice = (int)$row['cod_esame'];
                $qd = "SELECT * FROM valutazioni WHERE valutazioni.cod_esame = $codice AND valutazioni.cod_utente = $u";
                $qresd = $conn->query($qd);
                if ($qresd->num_rows > 0) $rated = 1; 
                else $rated = 0;
                $sql3 = "SELECT valore FROM valutazioni WHERE valutazioni.cod_esame = $codice";
                $resd = $conn->query($sql3);
                $media = (double)0.0;
                $numval = 0; $img;
                    while($row3 = $resd->fetch_assoc()) {
                        $media += $row3['valore'];
                        $numval += 1;
                    }
                if ($numval==0) $media = 's.v.';
                else $media = $media / $numval;
                if ($media == 's.v.') $img = 0;
                else if ($media > 0 && $media <= 2) $img = 1;
                else if ($media > 2 && $media <= 3) $img = 2;
                else if ($media > 3 && $media <= 4.5) $img = 3;
                else $img = 4;
                echo "<exam titolo='$tit' sem='$s' cfu='$credits' cod='$codice' d='0' rate='$media' star='$img' rated='$rated'></exam>";
             } 
            ?> 
        </div>
        <div class="row" id="Esamitodo" style="display:none">
            <?php
            $sql = "SELECT * FROM esami WHERE esami.cod_esame NOT IN (SELECT cod_esame FROM esami JOIN verbalizzazioni ON esami.cod_esame=verbalizzazioni.esame WHERE utente=$u)";
            $res3 = $conn->query($sql);
            if ($res3->num_rows == 0) echo "<b><br><h2> Hai svolto tutti gli esami, Complimenti! <h2>";
             while($row = $res3->fetch_assoc()) {
                $tit = $row['nome'];
                $s = (int)$row['semestre'];
                $credits = (int)$row['crediti'];
                $codice = (int)$row['cod_esame'];
                $qtd = "SELECT * FROM valutazioni WHERE valutazioni.cod_esame = $codice AND valutazioni.cod_utente = $u";
                $qrestd = $conn->query($qtd);
                if ($qrestd->num_rows > 0) $rated = 1; 
                else $rated = 0;
                $sql3 = "SELECT valore FROM valutazioni WHERE valutazioni.cod_esame = $codice";
                $restd = $conn->query($sql3);
                $media = (double)0.0;
                $numval = 0; $img;
                    while($row3 = $restd->fetch_assoc()) {
                        $media += $row3['valore'];
                        $numval += 1;
                    }
                if ($numval==0) $media = 's.v.';
                else $media = $media / $numval;
                if ($media == 's.v.') $img = 0;
                else if ($media > 0 && $media <= 2) $img = 1;
                else if ($media > 2 && $media <= 3) $img = 2;
                else if ($media > 3 && $media <= 4.5) $img = 3;
                else $img = 4;
                echo "<exam titolo='$tit' sem='$s' cfu='$credits' cod='$codice' d='1' rate='$media' star='$img' rated='$rated'></exam>";
             }
            ?>
        </div>

        <div class="modal fade" id="inserisciEsame" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticCarrierLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="staticCarrierLabel">Inserisci Esame in Carriera</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form method="post" onSubmit="">
        <div class="modal-body">
            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-prepend" >
                            <span class="input-group-text prefix">Voto</span>
                    </div>
                    <input type="number" aria-label="Voto" placeholder="Voto" class="form-control" name="voto" id="votoesame" value="" >
                    
                </div>
            <br>
            
            
        </div>
        <div class="modal-footer">
            <button type="button" class="btn dark-btn" data-bs-dismiss="modal" id="triggervoto" onclick="">Inserisci</button>
        </div>
        </form>
        </div>
        </div>
        </div>
        </div>

        <div class="modal fade" id="inseriscival" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticRatingLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="staticRatingLabel">Valuta Corso</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form>
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
        </form>
        <div class="modal-footer">
            <button type="button" class="btn dark-btn" data-bs-dismiss="modal" id="triggerval" onclick="">Ok</button>
        </div>
        </div>
        </div>
    </div>
    </div>
    </div>
</div>
            <script>
                var dropbottons = document.getElementsByName("ddt");
                for (var i = 0; i < dropbottons.length; i++) {
                dropbottons[i].onclick = function (e) {
                    document.getElementById("dropdownMenuButton" + e.target.getAttribute("id")).classList.toggle("show");
                    }
                }

                var dropitems = document.getElementsByClassName("dropdown-item");
                for (var i = 0; i < dropitems.length; i++) {
                    dropitems[i].onclick = ondropitemclick;
                }
            </script>
            <script type="text/javascript" src="../js/carrieraview.js"></script>
