<?php include('db.php');
 
    $nome=$decodedData['nome_passageiro'];
    $senha=$decodedData['senha'];
    $email=$decodedData['email'];
    $cartCd=$decodedData['cartaoCidadao'];
    $dataNasc=$decodedData['dataNasc'];

    $SQL="SELECT * FROM passageiro WHERE cartaoCidadao = '$cartCd'";

    $exeSQL=mysqli_query($cn,$SQL);

    $checkCartCD= mysqli_num_rows($exeSQL);

    if($checkCartCD !=0)
    {
        $Message="Já existe um passageiro com este cartão de cidadão no sistema ";
    }else
    {
        $InsertQuerry="insert into passageiro(nome_passageiro,senha,email,cartaoCidadao,dataNasc) values('$nome','$senha','$email','$cartCd','$dataNasc')"; 
        
        $R=mysqli_query($cn,$InsertQuerry);
        if($R)
        {
            $Message="Passageiro Inserido com sucesso"; 
        }else
        {
            $Message="Erro do servidor tenta mais tarde";  
        }
        
    }
    $response[]=array("Message" =>$Message);

    echo json_encode($response);
?>