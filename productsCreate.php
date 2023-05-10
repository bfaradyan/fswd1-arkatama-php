<?php
require_once 'connection.php';


$category_id = $_POST['category_id'];
$name = $_POST['name_product'];
$desc = $_POST['description'];
$price = $_POST['price'];
$status = $_POST['status'];
$created_by = $_POST['created_by'];
$verivied_by = $_POST['verivied_by'];



$query = "INSERT INTO products (category_id, name, description, price, status, created_by, verified_by) 
VALUES ('$category_id', '$name', '$description', '$price', '$status', '$created_by', '$verivied_by')";


if (mysqli_query($conn, $query)) {
    echo 'Data berhasil ditambahkan';
} else {
    echo 'Error: ' . mysqli_error($conn);
}


mysqli_close($conn);
?>