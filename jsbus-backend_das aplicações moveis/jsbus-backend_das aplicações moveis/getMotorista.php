<?php include('db.php');

$email = $decodedData['email'];//password is hashed

$SQL = "SELECT * FROM motorista WHERE email = '$email'";
$exeSQL = mysqli_query($cn, $SQL);

if(mysqli_num_rows($exeSQL) > 0) 
{
    $row = mysqli_fetch_assoc($exeSQL);
    $nome=$row["nome_motorista"];
    $email=$row["email"];
    $senha=$row["senha"];
    $dataN=$row["dataNasc"];
    $cartCd=$row["cartaoCidadao"];
}else 
{
    $nome="";
    $email="";
    $senha="";
    $dataN="";
    $cartCd="";
}
$response[] = array("nome" => $nome,
"email" => $email,"senha" => $senha,"dataNasc" => $dataN,
"cartaoCidadao" => $cartCd);

echo json_encode($response);