<?php
include '../connection.php';
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Content-Type');

$response = array();
$mainCategoryId=$_POST["mainCatId"];
$subName=$_POST["Name"];
$subDescription=$_POST["description"];
$sql = "INSERT INTO tbl_subcategory (mainCatId,Name, description )
        VALUES ('$mainCategoryId', '$subName','$subDescription')";


$result = mysqli_query($conn, $sql);

if ($result) {
    $response['status'] = true;
} else {
    $response['status'] = false;
}

echo json_encode($response);

$conn->close();

?>

