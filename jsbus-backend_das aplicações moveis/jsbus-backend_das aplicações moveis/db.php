<?php
    $cn= mysqli_connect('localhost','root','');
    $db=mysqli_select_db($cn,'jsbus');

    $encondedData=file_get_contents('php://input');
    $decodedData=json_decode($encondedData,true);
?>