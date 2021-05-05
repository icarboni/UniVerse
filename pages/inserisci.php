<?php
session_start();
$esame =(int)$_POST['esame'];
$voto =(int)$_POST['voto'];
$cod= (int)$_SESSION['cod_utente'];

    include "connect.php";

        $sql3 = "INSERT INTO verbalizzazioni (cod_verb, esame, utente, voto) VALUES (DEFAULT, $esame, $cod, $voto)";
        if ($conn->query($sql3) === TRUE) {
            echo "1";
        } else echo "0";
    
            
?>
