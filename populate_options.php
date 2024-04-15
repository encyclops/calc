<?php
include 'queries.php'; // Include the file with your database connection and query execution functions

if (isset($_POST['action']) && $_POST['action'] === 'allFoodType') {
    $sql = "SELECT * FROM DCALC_FOODTYPE ORDER BY FTYPE_NAME";
    $result = executeQuery($sql);

    // Check if query was successful
    if ($result->num_rows > 0) {
        // Loop through the results and populate options
        while ($row = $result->fetch_assoc()) {
            echo "<option value='" . $row["FTYPE_ID"] . "'>" . $row["FTYPE_NAME"] . "</option>";
        }
    } else {
        echo "<option value=''>No options available</option>";
    }
}

if (isset($_POST['action']) && $_POST['action'] === 'allRefPattern') {
    $sql = "SELECT * FROM DCALC_REFPATTERN";
    $result = executeQuery($sql);

    // Check if query was successful
    if ($result->num_rows > 0) {
        // Loop through the results and populate options
        while ($row = $result->fetch_assoc()) {
            echo "<input type='radio' id='rPattern" . $row["RPATT_ID"] . "' name='rPattern' value='" . $row["RPATT_ID"] . "'><label for='rPattern" . $row["RPATT_ID"] . "'>" . $row["RPATT_NAME"] . "</label><br>";
        }
    } else {
        echo "<option value=''>No options available</option>";
    }
}

if (isset($_POST['action']) && $_POST['action'] === 'oneFT') {
    $sql = "SELECT * FROM DCALC_FOODTYPE WHERE FTYPE_ID = " . $_POST['FTYPE_ID'];
    $result = executeQuery($sql);

    // Check if query was successful
    if ($result->num_rows > 0) {
        echo json_encode($result->fetch_assoc());
    } else {
        echo "<option value=''>No options available</option>";
    }
}

?>