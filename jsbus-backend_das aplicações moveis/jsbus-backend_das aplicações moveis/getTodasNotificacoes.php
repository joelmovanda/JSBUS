<?php include('db.php');

$response=array();
$SQL = "SELECT n.id_notificacao,n.descricao_notificacao,n.dataNot,h.id_horario,h.descricao_horario,r.id_rota,r.descricao_rota FROM notificacao n INNER JOIN horario h ON h.id_horario=n.id_horario
INNER JOIN rota r ON r.id_rota=n.id_rota";

$exeSQL = mysqli_query($cn, $SQL);

while( $row = mysqli_fetch_array($exeSQL)) 
{ 
    $not=array('id'=>$row["id_notificacao"] ,'notificacao'=>$row["descricao_notificacao"].' no horário das '.$row["descricao_horario"].' da rota '.$row["descricao_rota"] ,'data'=>$row["dataNot"]);
    array_push($response,$not);
}
echo json_encode($response);