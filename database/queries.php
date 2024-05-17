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
function executeQuery($sql, $params = [])
{
    $conn = connectDB();
    $stmt = $conn->prepare($sql);

    if (!$stmt) {
        echo "Error preparing statement: " . $conn->error;
        return false;
    }

    if (!empty($params)) {
        $types = str_repeat('s', count($params)); // Assuming all parameters are strings
        $stmt->bind_param($types, ...$params);
    }

    $stmt->execute();

    $result = $stmt->get_result();

    $stmt->close();
    $conn->close();

    return $result;
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

function updateData($tableName, $data, $id, $main)
{
    $conn = connectDB();

    $setClause = "";
    foreach ($data as $key => $value) {
        $setClause .= "$key = '$value', ";
    }
    // Remove the trailing comma and space
    $setClause = rtrim($setClause, ", ");

    $sql = "UPDATE $tableName SET $setClause WHERE $main = $id";

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