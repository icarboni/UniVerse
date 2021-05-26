<?php
session_start();


    include "connect.php";
    $corso= $_SESSION['cod_corso'];
    $anno= (int)$_SESSION['anno'];
    $utente = $_SESSION['cod_utente'];
    echo $corso;
    $sql = "SELECT * FROM esami";
    $result = $conn->query($sql);
    echo "
        <div class='select aggiungi'>
        <select name='esame' id='esame' class='form-select form-select-lg select' onchange=''>
        <option value=''>Seleziona corso</option>";
    while($esame = $result->fetch_assoc()) {
        echo "<option value='".$esame['nome']."'>".$esame['nome']."</option>";
    }
    echo "</select></div>";
            
?>
