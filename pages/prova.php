
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="../js/carriera.js"></script>
        <script type="text/javascript" src="../js/vue.min.js"></script>
        <link rel="stylesheet" href="../css/pagec.css" type="text/css">


        <div class="btn-group">
            <button class="btn dropdown-toggle" type="button" id="1" name="ddt">
                Anno Accademico
            </button>
            <div class="dropdown-menu" id="dropdownMenuButton1"> 
                <button class="dropdown-item" name="1">1° Anno</a>
                <button class="dropdown-item" name="2">2° Anno</a>
                <button class="dropdown-item" name="3">3° Anno</a>
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
            <?php include "../php/connect.php";
            $u = (int)$_SESSION['cod_utente'];
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
                echo "<exam titolo='$tit' sem='$s' cfu='$credits' cod='$codice' d='$bool'></exam>";
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
                echo "<exam titolo='$tit' sem='$s' cfu='$credits' cod='$codice' d='$bool'></exam>";
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
                echo "<exam titolo='$tit' sem='$s' cfu='$credits' cod='$codice' d='$bool'></exam>";
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
                echo "<exam titolo='$tit' sem='$s' cfu='$credits' cod='$codice' d='0'></exam>";
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
                echo "<exam titolo='$tit' sem='$s' cfu='$credits' cod='$codice' d='1'></exam>";
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
