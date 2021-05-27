<?php
include "connect.php";

$rate = (int)$_POST['rate'];
$codexam = (int)$_POST['codexam'];
$codutente = (int)$_SESSION['cod_utente'];

$sql = "INSERT INTO valutazioni (id_valutazione, cod_utente, valore, cod_esame) VALUES (DEFAULT, $codutente, $rate, $codexam)";
if ($conn->query($sql) === TRUE) {
    echo "1";
} else echo "0";
   
?>