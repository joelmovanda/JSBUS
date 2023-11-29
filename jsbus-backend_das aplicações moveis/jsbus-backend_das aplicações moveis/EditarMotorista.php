<?php include('db.php');
 
    $nome=$decodedData['nome'];
    $senha=$decodedData['senha'];
    $email=$decodedData['email'];
    $cartCd=$decodedData['cartaoCd'];
    $dataNasc=$decodedData['dataNasc'];
    
   
    $UpdateQuerry="UPDATE motorista SET nome_motorista='$nome',senha='$senha',cartaoCidadao='$cartCd',dataNasc='$dataNasc' WHERE email='$email'"; 
        
    $R=mysqli_query($cn,$UpdateQuerry);
    if(mysqli_affected_rows ($cn) == 1)
    {
        $Message="Motorista Editado com sucesso"; 
    }else
    {
        $Message="Erro do servidor tenta mais tarde";  
    }
    $response[]=array("Message" =>$Message,"nome_motorista" => $nome,"senha" => $senha,"dataNasc" => $dataNasc,
    "cartaoCidadao" => $cartCd);

    echo json_encode($response);
?>