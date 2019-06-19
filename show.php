<?php

include_once('config/connection.php');

$query = "SELECT * FROM mahasiswa ORDER BY id DESC";

$sql = $conn->prepare($query);
$sql->execute();

$mahasiswa = $sql->fetchAll();

foreach ($mahasiswa as $mhs) {
    $data[] = array(
        'id' => $mhs['id'],
        'name' => $mhs['name'],
        'email' => $mhs['email'],
        'birth' => $mhs['birth'],
        'gender' => $mhs['gender'],
        'phone' => $mhs['phone']
    );
}

$json = array(
    'status' => 'Success',
    'data' => $data
);

$sql = null;

echo json_encode($json);

?>