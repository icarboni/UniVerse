<?php
session_start();
    $ce = (int)$_POST['codesame'];
    $ve = (int)$_POST['votoesame'];
    $c = $_SESSION['cod_utente'];

    include "connect.php";

    $sql = "INSERT INTO verbalizzazioni (cod_verb, esame, utente, voto) VALUES (DEFAULT, $ce, $c, $ve)";
    if ($conn->query($sql) === TRUE) {
        echo "1";
    } else echo "0";

?>