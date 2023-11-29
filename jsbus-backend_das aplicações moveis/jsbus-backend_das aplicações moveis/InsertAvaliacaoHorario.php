<?php include('db.php');
 
    $id=$decodedData['id_horario'];
    $avaliacao=$decodedData['id_avaliacao'];

    $InsertQuerry="insert into avaliacao_horario (id_avaliacao,id_horario)values('$avaliacao','$id')";     
    $R=mysqli_query($cn,$InsertQuerry);
    
    if($R)
    {
        $Message="Horario avaliado com sucesso"; 
    }else
    {
        $Message="Erro do servidor tenta mais tarde";  
        
    }$response[]=array("Message" =>$Message);

    echo json_encode($response);
?>