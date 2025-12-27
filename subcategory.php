<?php

include 'connection.php';

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');
header('Access-Control-Allow-Headers: Content-Type');

$response = array();

$sql="SELECT subCat.Name,subCat.Description,mainCat.MainName,mainCat.description FROM tbl_subcategory as subCat INNER JOIN tbl_maincategory as mainCat ON subCat.mainCatId=mainCat.id;  ";


$result = mysqli_query($conn, $sql);

while ($row = mysqli_fetch_assoc($result)) {
    $response['status'] = "true";
    $response['data'][] = $row;
    
}

echo json_encode($response);

$conn->close();

?>
