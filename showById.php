<?php

include_once('config/connection.php');

if (isset($_GET['id'])) {
    $query = "SELECT * FROM mahasiswa WHERE id = ?";
    $sql = $conn->prepare($query);

    $id = $_GET['id'];

    $sql->bindParam(1, $id);
    $sql->execute();

    $mhs = $sql->fetch();

    $data = [
        'id' => $mhs['id'],
        'name' => $mhs['name'],
        'email' => $mhs['email'],
        'birth' => $mhs['birth'],
        'gender' => $mhs['gender'],
        'phone' => $mhs['phone']
    ];

    $json = [
        'status' => 'success',
        'data' => $data
    ];

    $sql = null;

    echo json_encode($json);
} else {
    $json = [
        'status' => 'Failed !',
    ];

    $sql = null;

    echo json_encode($json);
}

?>