<?php include('db.php');

$origem = $decodedData['origem'];
$destino = $decodedData['destino'];

$response=array();


$SQL="SELECT distinct r.id_rota,r.descricao_rota,r.cor FROM rota_paragem rp INNER JOIN rota r ON r.id_rota=rp.id_rota INNER JOIN paragem p ON p.id_paragem= rp.id_paragem WHERE p.descricao_paragem='$origem' INTERSECT SELECT distinct r.id_rota,r.descricao_rota,r.cor FROM rota_paragem rp INNER JOIN rota r ON r.id_rota=rp.id_rota INNER JOIN paragem p ON p.id_paragem= rp.id_paragem WHERE p.descricao_paragem='$destino'";

$exeSQL = mysqli_query($cn, $SQL);


while( $row = mysqli_fetch_array($exeSQL)) 
{ 
    $rotas=array('id'=>$row["id_rota"],'rota'=>$row["descricao_rota"]);
    array_push($response,$rotas);
}

echo json_encode($response);

