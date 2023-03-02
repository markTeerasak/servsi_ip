<?php

require_once "../connect.php";
require_once "../response.php";

$response = new Response();

$params = array(
    'username' => $_GET['username'],
    'password' => $_GET['password']
);

$sql = "SELECT student_id FROM student WHERE student_id = :username AND password = :password";
$statement = $conn->prepare($sql);
$statement->execute($params);

$result = $statement->fetchAll(PDO::FETCH_ASSOC);

if(count($result)){
    $response->success($result, "success", 200);    
}else {
    $response->error('error not found!', 404);
}


?>