<?php

$host = 'localhost';
$user = 'root';
$password = '';
$database = 'arkatama_store';

$connection = mysqli_connect($host, $user, $password, $database);

if (!$connection) {
    die('Koneksi database gagal: ' . mysqli_connect_error());
}else{

}

?>