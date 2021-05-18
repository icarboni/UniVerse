<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="../css/pagerm.css" type="text/css">
        <script type="text/javascript" src="../js/recensioni.js"></script>

    </head>
<body>
<nav class="navbar navbar-expand-sm navbar-light fixed-top" >
        <h2>Recensioni</h2>
</nav>

<?php include "../php/connect.php";
    $codex = $_GET['codex']; $name=''; $codut = (int)$_SESSION['cod_utente'];
    $qi = "SELECT nome FROM esami WHERE esami.cod_esame = $codex";
    $result = $conn->query($qi);
    if ($r = $result->fetch_assoc()) $name = $r['nome'];  
?>

<div class="text-center"> <button class="btn" type="button" id="valutabtn" onclick="valutaex()"> Valuta il Corso:<br><?php echo $name ?></button> </div>
<br>

<?php
    $q = "SELECT * FROM valutazioni WHERE valutazioni.cod_esame = $codex AND valutazioni.cod_utente = $codut";
    $result = $conn->query($q);
    if ($result->num_rows > 0) {
        echo "<SCRIPT LANGUAGE='javascript'>disable();</SCRIPT>";
    }
?>

<div class="mb-3 row">
    <label for="staticEmail" class="col-sm-2 col-form-label"><h4>Scriverai come: <b>Me</b> </h4></label>
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
        echo "<li id='$idc'> 
                <div> 
                    <img src='../images/comment.jpg' height='32' width='32'> 
                    <b>$author</b> <span> dice:</span>
                </div>
                <div id='time' class='small'> $time </div>
                <div class='lead'> <b>$commento</b> </div>
                <div> <span> <button class='dark-btn' id='repbtnto$idc' onclick='reply($idc, $codex)'>Rispondi</button>";
                if ($codutente == $codut) echo "<button class='dark-btn' id='remcom$idc' onclick='removecomment($idc)'>Elimina</button></span>";
                else echo "</span> <br>";
                $sql2 = "SELECT * FROM commenti WHERE commenti.codice_esame = $codex AND commenti.reply_to = $idc";
                $res2 = $conn->query($sql2);
                while($row2 = $res2->fetch_assoc()) {
                    $idc2 = $row2['id']; 
                    $author2 = $row2['utente'];
                    $codutente2 = $row2['cod_utente'];
                    $commento2 = $row2['commento'];
                    $time2 = $row2['tempo'];
                    echo " <div class='mx-5' id='$idc2'> 
                            <img src='../images/comment.jpg' height='22' width='22'> 
                            <b>$author2</b> <span> risponde:</span>
                            <div id='time' class='small'> $time2 </div>
                            <div class='lead'> <b>$commento2</b> </div>"; if ($codutente2 == $codut) echo "
                            <button class='dark-btn' id='remreplycom$idc2' onclick='removecomment($idc2)'>Elimina</button>
                        </div>"; else echo "<br> </div>";
                    }
           echo "</div> </li> <br>";
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
</body>
</html>