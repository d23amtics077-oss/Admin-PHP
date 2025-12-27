<?php

include 'connection.php';

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');
header('Access-Control-Allow-Headers: Content-Type');

$response = array();

$sql = "SELECT 
            p.id,
            p.name,
            p.description,
            p.brand,
            p.base_price,
            p.selling_price,
            p.status,
            p.created_at,
            p.sub_category_id,
            sc.mainCatId,
            mainCat.MainName,
            sc.name AS subcategory_name
        FROM tbl_productstable p
        LEFT JOIN tbl_subcategory sc ON p.sub_category_id = sc.id
        LEFT JOIN tbl_maincategory AS mainCat ON mainCat.id = sc.mainCatId
        WHERE mainCat.MainName = 'Women'";

$result = mysqli_query($conn, $sql);

$response['status'] = true;
$response['data'] = array();

while ($row = mysqli_fetch_assoc($result)) {
    $response['data'][] = $row;
}

echo json_encode($response);

$conn->close();

?>
