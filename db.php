<?php
$host = "localhost";
    $username = "user1";
    $password = "12345";
    $dbname = "todolist";

    $conn = new mysqli($host, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Database connection failed: " . $conn->connect_error);
    }
