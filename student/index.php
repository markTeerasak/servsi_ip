<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT");
header("Access-Control-Allow-Headers: Content-Type"); 

require_once "../connect.php";

$sql = "SELECT * FROM student";
$statement = $conn->query($sql);
$statement->execute();

$result = $statement->fetchAll(PDO::FETCH_ASSOC);

if(count($result)){
    $response = array(
        'status' => true,
        'respoint' => $result
    );
    http_response_code(200);
    echo json_encode($result, JSON_UNESCAPED_UNICODE);
}else {
    http_response_code(404);
    echo json_encode(array('status' => false));
}

?>