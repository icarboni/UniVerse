<?php
    session_start();
    $code = (int)$_POST['codesame'];
    $c = (int)$_SESSION['cod_utente'];

    include "connect.php";

    $sql = "DELETE FROM verbalizzazioni WHERE verbalizzazioni.esame = $code AND verbalizzazioni.utente = $c";
    if ($conn->query($sql) === TRUE) {
        echo "1";
    } else echo "0";

?>