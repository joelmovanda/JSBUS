<?php include('db.php');

$response=array();
$SQL = "SELECT h.descricao_horario From horario h";

$exeSQL = mysqli_query($cn, $SQL);

while( $row = mysqli_fetch_array($exeSQL)) 
{ 
    array_push($response,$row["descricao_horario"]);
}

echo json_encode($response);