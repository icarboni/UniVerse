<?php
session_start();

$uni= (int)$_POST['uni'];
$corso = (int)$_POST['corso'];
$anno =(int)$_POST['anno'];
$cod= (int)$_SESSION['cod_utente'];
$_SESSION['cod_corso'] =$corso;
$_SESSION['anno'] =$anno;

    include "connect.php";

        $sql3 = "INSERT INTO iscrizione (cod_utente, universita, corso, anno) VALUES ($cod, $uni, $corso, $anno)";
        if ($conn->query($sql3) === TRUE) {
            echo "1";
        } else echo "0";
    
            
?>
