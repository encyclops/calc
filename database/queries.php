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

// Function to insert data
function insertData($tableName, $data)
{
    $conn = connectDB(); // Connect to the database

    // Construct the SQL query
    $fields = implode(", ", array_keys($data));
    $values = "'" . implode("', '", array_values($data)) . "'";
    $sql = "INSERT INTO $tableName ($fields) VALUES ($values)";

    // Execute the query
    $result = $conn->query($sql);

    $conn->close();
    
    if ($result === false) {
        return "Error executing query: " . $conn->error;
    } else {
        return "Data inserted successfully!";
    }
}

function updateData($tableName, $data, $id)
{
    $conn = connectDB();

    $setClause = "";
    foreach ($data as $key => $value) {
        $setClause .= "$key = '$value', ";
    }
    // Remove the trailing comma and space
    $setClause = rtrim($setClause, ", ");

    $sql = "UPDATE $tableName SET $setClause WHERE FTYPE_ID = $id";

    // Execute the query
    $result = $conn->query($sql);

    // Close connection (optional, can be omitted as PHP will close it automatically)
    $conn->close();

    // Check if query was successful
    if ($result === false) {
        return "Error executing query: " . $conn->error;
    } else {
        return "Data updated successfully!";
    }
}

?>