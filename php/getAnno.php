<?php
session_start();
$cod_corso = $_GET['q'];

    include "connect.php";

    $sql = "SELECT num_anni FROM corso WHERE cod_corso = '$cod_corso'";
    $result = $conn->query($sql);
    echo "<br><br>
        <h6>Seleziona l'anno che stai frequentando:</h6>
        <div class='select'>
        <select name='anno' id='anno' class='form-select form-select-lg select' onchange='mostraContinua(this.value)'>
        <option value=''></option>";
        $anni = $result->fetch_assoc();
        $a=0;
    while($a<$anni['num_anni']) {
        $a++;
        echo "<option value='".$a."'>".$a."</option>";
    }
    echo "</select></div>";
            
?>
