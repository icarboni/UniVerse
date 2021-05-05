<?php
session_start();
$cod_uni = $_GET['q'];

    include "connect.php";

    $sql = "SELECT * FROM corso WHERE universita = '$cod_uni'";
    $result = $conn->query($sql);
    echo "
    <br><br>
        <h6>Seleziona il tuo corso di studi:</h6>
        <div class='select'>
        <select name='corso' id='corso' class='form-select form-select-lg select' onchange='mostraAnno(this.value)'>
        <option value=''></option>";
    while($corso = $result->fetch_assoc()) {
        echo "<option value='".$corso['cod_corso']."'>".$corso['nome']."</option>";
    }
    echo "</select></div>";
            
?>
