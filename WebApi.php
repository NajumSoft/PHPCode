<?php

 header("Content-Type: application/json");
// header('Access-Control-Allow-Headers: Content-Type');
// header('Access-Control-Allow-Origin :http:// localhost:4200');
// header('Access-Control-Allow-Methods:PUT, GET, POST, DELETE, OPTIONS');
// header('Access-Control-Allow-Headers Origin: X-Requested-With, Content-Type, Access-Control-Allow-Origin');

header('Access-Control-Allow-Origin: http://localhost:4200');
header ("Access-Control-Expose-Headers: Content-Length, X-JSON");
header ("Access-Control-Allow-Methods: GET, POST, PATCH, PUT, DELETE, OPTIONS");
header ("Access-Control-Allow-Headers: Content-Type, Authorization, Accept, Accept-Language, X-Authorization");
header('Access-Control-Max-Age: 86400');


$conn = new mysqli("localhost","root","","weberp");
$sql="SELECT * FROM invoicea";
$result = mysqli_query($conn,$sql) or die("Connection Faild");;
$output = mysqli_fetch_all($result,MYSQLI_ASSOC);
echo json_encode($output);



$myPost = file_get_contents("php://input");
if($myPost >0 )
{
    $output2 = json_decode($myPost);
    $addQuery = "INSERT INTO `invoicea` (`Id`, `InvoiceId`, `Date`, `CustomerName`, `FatherName`, `MobileNumber`, `LisenceNumber`, `Address`, `Note`) 
                  VALUES (NULL,'25', '{$output2->date}', '{$output2->customerName}', '{$output2->fatherName}', '{$output2->mobileNumber}', '{$output2->lisenceNumber}', '{$output2->address}', '{$output2->note}')";  
    $result = mysqli_query($conn,$addQuery) or die("Connection Faild");
 }





// file_put_contents(); any file if you want to chane
// file_get_contents(); any file if you want to read

?>