<?php
require_once "functions.php";

if (!isset($_SESSION['FirstName']) || empty($_SESSION['FirstName']) || $_SESSION['FirstName'] == NULL) {
    header("location: index.php");
}
?>
