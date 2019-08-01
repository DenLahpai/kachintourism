<?php
require_once "functions.php";

if (!isset($_SESSION['Id']) || empty($_SESSION['Id']) || $_SESSION['Id'] == NULL) {
    header("location: index.php");
}
?>
