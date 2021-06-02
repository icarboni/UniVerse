<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="../css/pagerm.css" type="text/css">
        <script type="text/javascript" src="../js/recensioni.js"></script>


        <script>
    
    function comment(esame, r) {
        if (r==0) var commento = document.getElementById("commentText").value;
        else var commento = document.getElementById("replycommentText").value;
        var xhttp = new XMLHttpRequest();
                  xhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                    if (this.responseText==1) {
                        alert("done");
                         $('#internoBox').load('recensionim.php?codex='+esame);
                    }
                    else { 
                      alert('something went wrong');
                         }
                    }
                  };
          xhttp.open("POST", "../php/commenta.php", true);
          xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
          xhttp.send("idesame="+esame+"&commento="+commento+"&reply="+r);
    }
    </script>


<?php include "../php/connect.php";
    $codex = $_GET['codex'];
    $_SESSION['page'] = 'esame';
   
    $name=''; 
    $codut = (int)$_SESSION['cod_utente'];
    $qi = "SELECT * FROM esami WHERE esami.cod_esame = $codex";
    $result = $conn->query($qi);
    if ($r = $result->fetch_assoc()) $name = $r['nome'];  

    $q = "SELECT * FROM valutazioni WHERE valutazioni.cod_esame = $codex AND valutazioni.cod_utente = $codut";
    $result = $conn->query($q);
    if ($result->num_rows > 0) {
        echo "<SCRIPT LANGUAGE='javascript'>disable();</SCRIPT>";
    }
?>
<div class="row mr-3 ml-3">
    <div class="col main shadow p-4 mb-3 mr-md-2 bg-body rounded">
        <div class="tit-corso">
            <div id="titolo"> <?php echo $name ?> </div><br>
            <div id="info" > 
                <b>Codice esame:</b> <?php echo $r['cod_esame'] ?> 
                <br>
                <b>CFU:</b> <?php echo $r['crediti'] ?>
                <br>
                <b>Professore:</b> <?php echo $r['professore'] ?>
                <br>
                <b>Anno:</b> <?php echo $r['anno'] ?> 
                    <b>Semestre:</b> <?php echo $r['semestre'] ?>
            </div>
            
        </div>
        <br>
       <div id="valuta" style="display: inline-block;"> <button class="btn" type="button" id="valutabtn" onclick="valutaex()"> Valuta il Corso</button> </div>
    </div>
    <div class="col main shadow p-4 mb-3 mr-md-2 bg-body rounded">
    
    <?php
    $query = "SELECT * FROM valutazioni WHERE valutazioni.cod_esame = $codex";
    $all = $conn->query($query);
    $tot = $all->num_rows;

    $query1 = "SELECT * FROM valutazioni WHERE valutazioni.cod_esame = $codex AND valutazioni.valore = 1";
    $resultp = $conn->query($query1);
    $num1 = $resultp->num_rows; if ($tot!=0) $perc1 = ($num1/$tot)*100; else $perc1=0;
    $query2 = "SELECT * FROM valutazioni WHERE valutazioni.cod_esame = $codex AND valutazioni.valore = 2";
    $resultp = $conn->query($query2);
    $num2 = $resultp->num_rows; if ($tot!=0) $perc2 = ($num2/$tot)*100; else $perc2=0;
    $query3 = "SELECT * FROM valutazioni WHERE valutazioni.cod_esame = $codex AND valutazioni.valore = 3";
    $resultp = $conn->query($query3);
    $num3 = $resultp->num_rows; if ($tot!=0) $perc3 = ($num3/$tot)*100; else $perc3=0;
    $query4 = "SELECT * FROM valutazioni WHERE valutazioni.cod_esame = $codex AND valutazioni.valore = 4";
    $resultp = $conn->query($query4);
    $num4 = $resultp->num_rows; if ($tot!=0) $perc4 = ($num4/$tot)*100; else $perc4=0;
    $query5 = "SELECT * FROM valutazioni WHERE valutazioni.cod_esame = $codex AND valutazioni.valore = 5";
    $resultp = $conn->query($query5);
    $num5 = $resultp->num_rows; if ($tot!=0) $perc5 = ($num5/$tot)*100; else $perc5=0;
?>


    <img class="mt-3 mb-1" src="../images/rec1.png" height="22"><div class="progress">
    <div class="progress-bar bg-rec" role="progressbar" style="width: <?php echo $perc1; echo "%"; ?>" aria-valuemin="0" aria-valuemax="100"><?php echo round($perc1,1); echo "%"; ?></div>
    </div>
    <img class="mt-3 mb-1" src="../images/rec2.png" height="22"><div class="progress">
    <div class="progress-bar bg-rec" role="progressbar" style="width: <?php echo $perc2; echo "%"; ?>" aria-valuemin="0" aria-valuemax="100"><?php echo round($perc2,1); echo "%"; ?></div>
    </div>
    <img class="mt-3 mb-1" src="../images/rec3.png" height="22"><div class="progress">
    <div class="progress-bar bg-rec" role="progressbar" style="width: <?php echo $perc3; echo "%"; ?>" aria-valuemin="0" aria-valuemax="100"><?php echo round($perc3,1); echo "%"; ?></div>
    </div>
    <img class="mt-3 mb-1" src="../images/rec4.png" height="22"><div class="progress">
    <div class="progress-bar bg-rec" role="progressbar" style="width: <?php echo $perc4; echo "%"; ?>" aria-valuemin="0" aria-valuemax="100"><?php echo round($perc4,1); echo "%"; ?></div>
    </div>
    <img class="mt-3 mb-1" src="../images/rec5.png" height="22"><div class="progress">
    <div class="progress-bar bg-rec" role="progressbar" style="width: <?php echo $perc5; echo "%"; ?>" aria-valuemin="0" aria-valuemax="100"><?php echo round($perc5,1); echo "%"; ?></div>
</div> 

</div>   <!---->
</div>


<div class="row mr-3 ml-3">
<div class="col-12 col-lg main shadow p-4 mb-3 mr-md-2 bg-body rounded" style="height: auto;">

<div id="titoloRec">Recensioni</div>

<div class="mb-1 row">
    <label for="staticEmail" class="col-sm-2 col-form-label"><h6>Scriverai come: <b><?php echo $_SESSION['nome'];?></b> </h6></label>
</div>

<div class="mb-3">
  <label for="commentText" class="form-label"><h5>Commento:</h5></label>
  <textarea class="form-control" id="commentText" rows="5"></textarea>
  <br>
  <button class="btn" type="button" id="commentabtn" onclick="comment(<?php echo $codex ?>, 0)"> Lascia commento </button>
</div>

<div class="mb-3" id="replyarea" style="display:none">
  <label for="replycommentText" class="form-label">Commento:</label>
  <textarea class="form-control" id="replycommentText" rows="3"></textarea>
  <br>
  <button class="btn" type="button" id="rispondibtn" onclick=""> Rispondi </button>
</div>

<br><br>

<ul class="list-group list-group-flush">
    <?php
    $sql = "SELECT * FROM commenti WHERE commenti.codice_esame = $codex AND commenti.reply_to = 0";
    $res = $conn->query($sql);
    while($row = $res->fetch_assoc()) { 
        $idc = $row['id']; 
        $author = $row['utente'];
        $codutente = $row['cod_utente'];
        $commento = $row['commento'];
        $time = $row['tempo'];
        echo "<li   id='$idc'> 
                <div class='col-12 col-lg main shadow p-4 mb-3 mr-md-2 bg-body rounded' style='background: #e5dbff;'>
                <div> 
                    <img src='../images/comment.jpg' height='32' width='32'> 
                    <b>$author</b> <span> dice:</span>
                </div>
                <div id='time' class='small'> $time </div>
                <div class='lead'> <b>$commento</b> </div>
                <span> <button class='dark-btn' id='repbtnto$idc' onclick='reply($idc, $codex)'>Rispondi</button>";
                if ($codutente == $codut) echo "<button class='dark-btn' id='remcom$idc' onclick='removecomment($idc)'>Elimina</button></span>";
                else echo "</div>";
                $sql2 = "SELECT * FROM commenti WHERE commenti.codice_esame = $codex AND commenti.reply_to = $idc";
                $res2 = $conn->query($sql2);
                while($row2 = $res2->fetch_assoc()) {
                    $idc2 = $row2['id']; 
                    $author2 = $row2['utente'];
                    $codutente2 = $row2['cod_utente'];
                    $commento2 = $row2['commento'];
                    $time2 = $row2['tempo'];
                    echo " <div class='mx-5 p-5'  id='$idc2'> 
                            <img src='../images/comment.jpg' height='22' width='22'> 
                            <b>$author2</b> <span> risponde:</span>
                            <div id='time' class='small'> $time2 </div>
                            <div class='lead'> <b>$commento2</b> </div>"; 
                            if ($codutente2 == $codut) echo "
                            <button class='dark-btn' id='remreplycom$idc2' onclick='removecomment($idc2)'>Elimina</button>
                        </div>"; else echo "</div>";
                    }
           echo "</li>";
        }
        $sql3 = "SELECT * FROM commenti WHERE commenti.codice_esame = $codex AND commenti.reply_to IN (SELECT id FROM commenti WHERE commenti.codice_esame = $codex AND commenti.cod_utente = $codut )";
        $res3 = $conn->query($sql3);
                while($row3 = $res3->fetch_assoc()) {
                    $idu = $row3['id'];
                    $q2 = "UPDATE commenti SET seen = 1 WHERE commenti.id = $idu";
                    $res4 = $conn->query($q2); 
                }
    ?>
</ul>

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
            <button type="button" class="btn dark-btn" data-bs-dismiss="modal" id="triggerval" onclick="rate(<?php echo $codex ?>)">Ok</button>
        </div>
        </div>
        </div>
    </div>
    </div>
    </div>
