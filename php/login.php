<?php
    include "connect.php";

$mail = $_POST['mail'];
$psw = $_POST['psw'];


    $sql = "SELECT * FROM utenti WHERE mail= '$mail' and psw= '$psw' ";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        echo "1";
    } else echo "0";

    
?>