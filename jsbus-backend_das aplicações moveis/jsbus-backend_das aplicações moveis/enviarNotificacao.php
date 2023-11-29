<?php include('db.php');
 
    $not=$decodedData['notificacao'];
    $hor=$decodedData['horario']+1;
    $rot=$decodedData['rota']+1;
  
    $InsertQuerry="insert into notificacao(descricao_notificacao,dataNot,id_horario,id_rota) values('$not',CURRENT_TIMESTAMP(),'$hor','$rot')"; 
        
    $R=mysqli_query($cn,$InsertQuerry);
    if($R)
    {
        $Message="Incidente notificado com sucesso"; 
    }else
    {
        $Message="Erro do servidor tenta mais tarde";  
    }
    $response[]=array("Message" =>$Message);
    echo json_encode($response);
?>