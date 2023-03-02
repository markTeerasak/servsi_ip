<?php

require_once "../connect.php";

$params = array(
    'username' => $_GET['username'],
    'password' => $_GET['password']
);

$sql = "SELECT * FROM student WHERE student_id = :username AND password = :password";
$statement = $conn->prepare($sql);
$statement->execute($params);

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