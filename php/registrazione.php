<?php
session_start();
$mail_err="";

$nome = $_POST['nome'];
$cognome = $_POST['cognome'];
$mail = $_POST['mail'];
$psw = $_POST['psw'];


//if (isset($_POST['registrati'])) {
    include "connect.php";

    $sql = "SELECT cod_utente FROM utenti WHERE mail = '$mail'" ;
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $mail_err = "Gia esiste un account con questo indirizzo email.";
    } else {

        $sql2 = "INSERT INTO utenti (nome, cognome, mail, psw) VALUES ('$nome', '$cognome', '$mail', '$psw')";
        if ($conn->query($sql2) === TRUE) {
            $_SESSION['mail']= $mail;
            echo "1";
        } else echo "0";
    }
            
?>
