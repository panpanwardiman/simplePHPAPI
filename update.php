<?php

include_once('config/connection.php');

$json = file_get_contents("php://input");

$mhs = json_decode($json, true);

$id = $mhs['id'];
$name = $mhs['name'];
$email = $mhs['email'];
$birth = $mhs['birth'];
$gender = $mhs['gender'];
$phone = $mhs['phone'];

$query = "UPDATE mahasiswa SET name=:name, email=:email, birth=:birth, gender=:gender, phone=:phone WHERE id=:id";

$sql = $conn->prepare($query);
$sql->bindParam(':id', $id);
$sql->bindParam(':name', $name);
$sql->bindParam(':email', $email);
$sql->bindParam(':birth', $birth);
$sql->bindParam(':gender', $gender);
$sql->bindParam(':phone', $phone);

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