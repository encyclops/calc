<?php

// Function to connect to the database
function connectDB()
{
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

// Function to execute a query
function executeQuery($sql) {
    $conn = connectDB(); // Connect to the database

    // Execute the query
    $result = $conn->query($sql);

    // Check if query was successful
    if ($result === false) {
        echo "Error executing query: " . $conn->error;
    } else {
        return $result;
    }

    // Close connection (optional, can be omitted as PHP will close it automatically)
    $conn->close();
}
?>