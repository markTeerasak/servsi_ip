<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT");
header("Access-Control-Allow-Headers: Content-Type");

require_once "../connect.php";
require_once "../response.php";

$response = new Response();

$params = array(
    'id' => $_GET['id'],
);

$sql = "SELECT * FROM work JOIN enroll_subject ON work.enroll_subject_id = enroll_subject.enroll_subject_id JOIN enroll ON enroll_subject.enroll_subject_id = enroll.enroll_subject_id JOIN subject ON enroll_subject.subject_id = subject.subject_id WHERE enroll.student_id = :id";
$statement = $conn->prepare($sql);
$statement->execute($params);

$result = $statement->fetchAll(PDO::FETCH_ASSOC);

if(count($result)){
    $response -> success($result); 
}else {
    $response -> error(); 
}


?>