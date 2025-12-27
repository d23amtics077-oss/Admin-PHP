<?php
include '../connection.php';

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Content-Type');

$response = array();

$productName   = $_POST['name'];
$brandName     = $_POST['brand'];
$basePrice     = $_POST['base_price'];
$sellingPrice  = $_POST['selling_price'];
$subCategoryId = $_POST['sub_category_id'];
$status        = $_POST['status'];
$description   = $_POST['description'];


$exe=pathinfo($_FILES["image"]["name"],PATHINFO_EXTENSION);
$filename = time().random_int(1111,9999).".".$exe;

$sql = "INSERT INTO tbl_productstable 
(name, brand, base_price, selling_price, sub_category_id, status, description,image)
VALUES 
('$productName', '$brandName', '$basePrice', '$sellingPrice', '$subCategoryId', '$status', '$description','$filename')";

$result = mysqli_query($conn, $sql); 

if ($result) {
    $response['status'] = true;
    $response['message'] = "Product added successfully";
} else {
    $response['status'] = false;
    $response['message'] = mysqli_error($conn);
}

echo json_encode($response);
$conn->close();
?>
