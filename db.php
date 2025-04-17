<?php
$host = "localhost:3307";
    $username = "root";
    $password = "";
    $dbname = "todolist";

    $conn = new mysqli($host, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Database connection failed: " . $conn->connect_error);
    }