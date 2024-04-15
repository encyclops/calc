<?php
include 'db_connect.php'; // Include the database connection file

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