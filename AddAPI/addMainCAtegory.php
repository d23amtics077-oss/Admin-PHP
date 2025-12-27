<?php

include '../connection.php';



header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');
header('Access-Control-Allow-Headers: Content-Type');

$response = array();

$catName=$_POST["categoryName"];
$catDesc=$_POST["CatDEscription"];



$sql="INSERT INTO tbl_maincategory (MainName, description)
VALUES ('$catName','$catDesc')";



$result = mysqli_query($conn,$sql);


    $response['status'] = "true";
    
    echo json_encode($response);

$conn->close();
  


?>
