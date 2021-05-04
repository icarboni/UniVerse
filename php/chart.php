<?php
include "connect.php";

$sql_chart = "SELECT esami.nome, verbalizzazioni.voto FROM esami, verbalizzazioni WHERE verbalizzazioni.esame = esami.cod_esame " ;
$resultc = $conn->query($sql_chart);

$data_array = array(); 
$nex=0;
$tot_voti=0;

while($rows = $resultc->fetch_assoc()) { 
    $nex++;
    $tot_voti= $tot_voti+ (int)$rows['voto'];
    $rows['voto'] = (int)$rows['voto'];
    $rows['media'] = (float)number_format((int)$tot_voti/(int)$nex, 2);
    
    $data_array[] = $rows; 
} 
    
   echo json_encode($data_array);
?>