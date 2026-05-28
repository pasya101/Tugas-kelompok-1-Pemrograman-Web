<?php

$conn = mysqli_connect(
    "localhost",
    "root",
    "",
    "db_kusen"
);

if(!$conn){
    die("Koneksi gagal");
}
?>