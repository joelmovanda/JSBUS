<?php include('db.php');

$response=array();
$SQL = "SELECT * FROM incidente ";

$exeSQL = mysqli_query($cn, $SQL);

while( $row = mysqli_fetch_array($exeSQL)) 
{ 
    $incidente=array('id'=>$row["id_incidente"],'incidente'=>$row["descricao_incidente"]);
    array_push($response,$incidente);
}
echo json_encode($response);