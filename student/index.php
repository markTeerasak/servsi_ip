<?php

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

    echo json_encode($result, JSON_UNESCAPED_UNICODE);
}else {

}


?>