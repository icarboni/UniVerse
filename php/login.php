<?php
    session_start();
    include "connect.php";

$mail = $_POST['mail'];
$psw = $_POST['psw'];


    $sql = "SELECT * FROM utenti WHERE mail= '$mail' and psw= '$psw' ";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $_SESSION["mail"] = $mail;
        echo "1";
        
    } else echo "0";

    
?>