<?php
include "connect.php";

$idex = (int)$_POST['idesame'];
$comm = $_POST['commento'];
$utente = $_SESSION['nome'];
$codu = (int)$_SESSION['cod_utente'];
$r = (int)$_POST['reply'];

$sql = "INSERT INTO commenti (id, utente, cod_utente, commento, tempo, codice_esame, reply_to, seen) VALUES (DEFAULT, '$utente', $codu, '$comm', DEFAULT, $idex, $r, 0)";
if ($conn->query($sql) === TRUE) {
    echo "1";
} else echo "0";
  
?>