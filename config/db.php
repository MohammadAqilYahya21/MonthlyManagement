<?php
$host = "localhost";
$user = "root";
$pass = "q";
$db = "keuangan_db";

$mysqli = new mysqli($host, $user, $pass, $db);

if ($mysqli->connect_error) {
  die("Koneksi gagal: " . $mysqli->connect_error);
}
