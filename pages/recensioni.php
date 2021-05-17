<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="../css/pager.css" type="text/css">
        <script type="text/javascript" src="../js/recensioni.js"></script>

    </head>
    <body>
    <nav class="navbar navbar-expand-sm navbar-light fixed-top">
            <h1>Recensioni</h1>
    </nav>
    <ul class="list-group list-group-flush">
        <?php include "../php/connect.php";
        $sql = "SELECT * FROM esami";
        $res1 = $conn->query($sql);
            while($row = $res1->fetch_assoc()) {
            $tit = $row['nome'];
            $s = (int)$row['semestre'];
            $credits = (int)$row['crediti'];
            $codice = (int)$row['cod_esame'];
            $sql2 = "SELECT valore FROM valutazioni WHERE valutazioni.cod_esame = $codice";
            $res2 = $conn->query($sql2);
            $media = (double)0.0;
            $numval = 0; $img;
                while($row2 = $res2->fetch_assoc()) {
                    $media += $row2['valore'];
                    $numval += 1;
                }
            if ($numval==0) $media = 's.v.';
            else $media = $media / $numval;
            if ($media == 's.v.') $img = 0;
            else if ($media > 0 && $media <= 2) $img = 1;
            else if ($media > 2 && $media <= 3) $img = 2;
            else if ($media > 3 && $media <= 4.5) $img = 3;
            else $img = 4;
            $badge; $codu = (int)$_SESSION['cod_utente'];
            $sql3 = "SELECT * FROM commenti WHERE commenti.codice_esame = $codice AND commenti.reply_to IN (SELECT id FROM commenti WHERE commenti.codice_esame = $codice AND commenti.cod_utente = $codu )";
            $res3 = $conn->query($sql3);
            $badge = 0;
            while($row3 = $res3->fetch_assoc()) {
                if ($row3['seen']==0) $badge += 1;
            }
            if ($badge == 0) $badge = '';
            echo "<li class='btn list-group-item' onclick='openrec($codice)'><h2><b>$tit</b></h2> <span class='badge badge-secondary badge-pill align-text-top'>$badge</span>
            $media<img src='../images/$img.jpg' class='avatar' height='22' width='32'><h5>$s ° Semestre <br> Cod: $codice $credits CFU </h5></li>";
            }
        ?>
    </ul>
    </body>
</html>