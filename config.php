<?php
$conn = mysqli_connect("localhost", "root", "");

if (!$conn) {
    die("Connection failed");
}

$sql = "CREATE DATABASE IF NOT EXISTS brgy_panduma_db";
mysqli_query($conn, $sql);

mysqli_select_db($conn, "brgy_panduma_db");

$table = "CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(100),
    email VARCHAR(150),
    password VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);";

mysqli_query($conn, $table);
