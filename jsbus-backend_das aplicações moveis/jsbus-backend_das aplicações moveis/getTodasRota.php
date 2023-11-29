<?php include('db.php');

$response=array();
$SQL = "SELECT r.descricao_rota FROM rota r";

$exeSQL = mysqli_query($cn, $SQL);

while( $row = mysqli_fetch_array($exeSQL)) 
{ 
    array_push($response,$row["descricao_rota"]);
}
echo json_encode($response);