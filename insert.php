<?php

include_once('config/connection.php');

$json = file_get_contents("php://input");

$mhs = json_decode($json, true);

$name = $mhs['name'];
$email = $mhs['email'];
$birth = $mhs['birth'];
$gender = $mhs['gender'];
$phone = $mhs['phone'];

// var_dump($mhs);

$query = "INSERT INTO mahasiswa set name=:name, email=:email, birth=:birth, gender=:gender, phone=:phone";

$sql = $conn->prepare($query);

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
// $sql = null;

$result = [
    'status' => $msg
];

echo json_encode($result);
?>