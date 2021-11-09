<?php

header("Content-Type: application/json");
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');



$conn = new mysqli("localhost","root","","weberp");
$sql="SELECT * FROM invoicea";

$result = mysqli_query($conn,$sql) or die("Connection Faild");;



    $output = mysqli_fetch_all($result,MYSQLI_ASSOC);
    echo json_encode($output);






?>