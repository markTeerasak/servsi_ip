<?php

require_once "../connect.php";

$params = array(
    'id' => $_GET['key'],
);

$sql = "SELECT student_id, fist_name, last_name, gender, solial_id, bathday, nationality,
phone_number, first_name_father, last_name_father, first_name_mother, last_name_mother,
fist_name_parent, last_name_parent, phone_number_of_parent, status_name 
FROM student JOIN status WHERE student_id = :id AND student.status_id = status.status_id";
$statement = $conn->prepare($sql);
$statement->execute($params);

$result = $statement->fetchAll(PDO::FETCH_ASSOC);

if(count($result)){
    $response = array(
        'status' => true,
        'response' => $result
    );
    http_response_code(200);
    echo json_encode($result, JSON_UNESCAPED_UNICODE);
}else {
    http_response_code(404);
    echo json_encode(array('status' => false));
}


?>