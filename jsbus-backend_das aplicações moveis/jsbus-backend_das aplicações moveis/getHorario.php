<?php include('db.php');

$rota = $decodedData["rota"];
$response=array();
$SQL = "SELECT h.descricao_horario,p.descricao_paragem,(SEC_TO_TIME(TIME_TO_SEC(h.tempo) + TIME_TO_SEC(rp.offset))) AS Hora From horario h
INNER JOIN rota_paragem rp ON rp.id_rota=h.id_rota 
INNER JOIN paragem p ON rp.id_paragem= p.id_paragem
WHERE rp.id_rota='$rota'";

$exeSQL = mysqli_query($cn, $SQL);

while( $row = mysqli_fetch_array($exeSQL)) 
{ 
    $horario=array('Horario'=>$row["descricao_horario"],'Paragem'=>$row["descricao_paragem"],'Tempo'=>$row["Hora"]);
    array_push($response,$horario);
}

echo json_encode($response);