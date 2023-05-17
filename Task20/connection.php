<?php

$serverName = "localhost";
$username = "root";
$password = "";
$db = "";


$conn = new mysqli($serverName, $username, $password, $db);

if (!$conn){
    echo "koneksi failed";
}

?>