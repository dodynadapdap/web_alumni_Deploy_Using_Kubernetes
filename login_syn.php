<?php

global $connect;
$host="php-mysql";
$user="alumni_user";
$password="alumni_pass";
$db="db_alumni";

$connect = mysqli_connect($host, $user, $password, $db);

if(!$connect){
    die("Koneksi ke database gagal: " . mysqli_connect_error());
} else {
    echo "Koneksi berhasil!";
}

