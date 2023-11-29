<?php include('db.php');

$id = $decodedData['id'];

$response=array();

$SQL = "SELECT r.id_rota ,r.descricao_rota,r.cor, p.latitude,p.longitude,p.descricao_paragem,rp.ordemParagem FROM rota_paragem rp  
INNER JOIN rota r ON r.id_rota=rp.id_rota 
INNER JOIN paragem p ON p.id_paragem=rp.id_paragem 
WHERE r.id_rota='$id'
ORDER BY rp.ordemParagem";
$exeSQL = mysqli_query($cn, $SQL);

while($row = mysqli_fetch_array($exeSQL)) 
{
    $rota=array('rota'=>$row["descricao_rota"],'latitude'=>(float)$row["latitude"],'longitude'=>(float)$row["longitude"],'Cor'=>$row["cor"],'paragem'=>$row["descricao_paragem"]);
    array_push($response,$rota);
}
echo json_encode($response);