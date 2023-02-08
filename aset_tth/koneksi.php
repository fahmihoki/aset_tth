<?php

$server     = "localhost";
$username   = "root";
$password_db   = "";
$db         = "tracking_aset"; //sesuaikan nama databasenya
$koneksi = mysqli_connect($server, $username, $password_db, $db); //pastikan urutan pemanggilan variabel nya sama.

//untuk cek jika koneksi gagal ke database
if(mysqli_connect_errno()) {
    echo "Koneksi gagal : ".mysqli_connect_error(); 
}