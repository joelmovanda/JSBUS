<?php include('db.php');

$rot = $decodedData['rota'];
$hor = $decodedData['horario'];
$response=array();

$SQL = "SELECT  r.id_rota,r.descricao_rota,h.descricao_horario,h.id_rota,h.id_horario ,r.descricao_rota,r.cor, p.latitude,p.longitude,p.descricao_paragem,rp.ordemParagem FROM rota_paragem rp  
INNER JOIN rota r ON r.id_rota=rp.id_rota 
INNER JOIN paragem p ON p.id_paragem=rp.id_paragem 
INNER JOIN horario h ON h.id_rota= rp.id_rota
WHERE r.descricao_rota='$rot' and h.descricao_horario='$hor'
ORDER BY rp.ordemParagem ";


$exeSQL = mysqli_query($cn, $SQL);

while($row = mysqli_fetch_array($exeSQL)) 
{
    $rota=array('rota'=>$row["descricao_rota"],'latitude'=>(float)$row["latitude"],'longitude'=>(float)$row["longitude"],'Cor'=>$row["cor"],'paragem'=>$row["descricao_paragem"]);
    array_push($response,$rota);
}
echo json_encode($response);