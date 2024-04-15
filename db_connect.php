<?php
function connectDB() {
    // Database credentials
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "DB_DCALC";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $database);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    return $conn;
}
?>