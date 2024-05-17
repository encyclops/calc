<?php
include 'queries.php'; // Include the file with your database connection and query execution functions
if (session_status() == PHP_SESSION_NONE) session_start();
$_SESSION['path'] = "http://localhost/calc/";

if (isset($_POST['action']) && $_POST['action'] === 'oneUser') {
    $sql = "SELECT * FROM DCALC_USER WHERE USER_USERNAME = ? AND USER_PASSWORD = ?";
    $params = [$_POST['username'], $_POST['password']];

    $result = executeQuery($sql, $params);

    if ($result && $result->num_rows > 0) {
        $_SESSION['username'] = $_POST['username'];
        http_response_code(200);
    } else {
        http_response_code(401);
    }
    exit;
}

if (isset($_POST['action']) && $_POST['action'] === 'allFoodType') {
    $sql = "SELECT * FROM DCALC_FOODTYPE WHERE FTYPE_STATUS = 1 ORDER BY FTYPE_NAME";
    $result = executeQuery($sql, []);

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
    $result = executeQuery($sql, []);

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

if (isset($_POST['action']) && $_POST['action'] === 'allUser') {
    $sql = "SELECT * FROM DCALC_USER WHERE USER_NAME <> 'Super Admin' ORDER BY USER_NAME";
    $result = executeQuery($sql, []);

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
    $result = updateData('dcalc_foodtype', $data, $_POST['id'], 'FTYPE_ID');

    echo $result;
}

if (isset($_POST['action']) && $_POST['action'] === 'insertUser') {
    $data = json_decode($_POST['data'], true);
    $result = insertData('dcalc_user', $data);

    echo $result;
}

if (isset($_POST['action']) && $_POST['action'] === 'updateUser') {
    $data = json_decode($_POST['data'], true);
    $result = updateData('dcalc_user', $data, $_POST['id'], 'USER_ID');

    echo $result;
}

if (isset($_POST['action']) && $_POST['action'] === 'deleteUser') {
    $sql = "DELETE FROM DCALC_USER WHERE USER_ID = ?";
    $params = [$_POST['id']];
    $result = executeQuery($sql, $params);

    echo $result;
}

?>