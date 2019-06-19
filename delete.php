<?php

include_once('config/connection.php');

$json = file_get_contents('php://input');

$mhs = json_decode($json, true);

$id = $mhs['id'];

$query = "DELETE FROM mahasiswa WHERE id= ?";

$sql = $conn->prepare($query);

$sql->bindParam(1, $id);

if ($sql->execute()) {
    $msg = "Success !";
} else {
    $msg = "Failed !";
}

// close connection 
$sql = null;

$json = [
    'status' => $msg
];

echo json_encode($json);


?>