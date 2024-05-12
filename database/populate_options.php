<?php
include 'queries.php'; // Include the file with your database connection and query execution functions

if (isset($_POST['action']) && $_POST['action'] === 'allFoodType') {
    $sql = "SELECT * FROM DCALC_FOODTYPE ORDER BY FTYPE_NAME";
    $result = executeQuery($sql);

    // Check if query was successful
    if ($result->num_rows > 0) {
        $data = array(); // Initialize an array to store the data

        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }

        // Encode the data array as JSON and output it
        echo json_encode($data);
    } else {
        echo "<option value=''>No options available</option>";
    }
}

if (isset($_POST['action']) && $_POST['action'] === 'allRefPattern') {
    $sql = "SELECT * FROM DCALC_REFPATTERN";
    $result = executeQuery($sql);

    // Check if query was successful
    if ($result->num_rows > 0) {
        $data = array(); // Initialize an array to store the data

        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }

        // Encode the data array as JSON and output it
        echo json_encode($data);
    } else {
        echo "<option value=''>No options available</option>";
    }
}

if (isset($_POST['action']) && $_POST['action'] === 'insertFtype') {
    $data = json_decode($_POST['data'], true);
    $result = insertData('dcalc_foodtype', $data);

    echo $result;
}

if (isset($_POST['action']) && $_POST['action'] === 'updateFtype') {
    $data = json_decode($_POST['data'], true);
    $result = updateData('dcalc_foodtype', $data, $_POST['id']);

    echo $result;
}

?>