<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "belajarweb";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    # code...
    die("Connection Failed:" . $conn->connect_error);
} else {

    // echo "koneksi berhasil";
}