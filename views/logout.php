<?php
session_start();
header("Location: " . $_SESSION['path']);
$_SESSION = array();
session_destroy();
?>