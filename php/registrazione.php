<?php
$mail_err="";

//if (isset($_POST['registrati'])) {
    $nome = $_POST['nome'];
    $cognome = $_POST['cognome'];
    $mail = $_POST['mail'];
    $psw = $_POST['psw'];
    $psw2 = $_POST['psw2'];

        $sql = "SELECT cod_utente FROM utenti WHERE mail = '$mail'" ;
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $mail_err = "Gia esiste un account con questo indirizzo email.";
        } 
        //if(empty($mail_err)){
        echo($nome);
        
        $sql2 = "INSERT INTO utenti (nome, cognome, mail, psw) VALUES ('$nome','$cognome','$mail','$psw')";
        
        if ($conn->query($sql2) === TRUE) {
            echo "New record created successfully";
          } else {
            echo "Error: " . $sql2 . "<br>" . $conn->error;
          }
        $_SESSION['mail'] = $username;
  	    $_SESSION['success'] = "You are now logged in";
    //}
//}
?>
