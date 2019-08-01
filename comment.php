<?php
require_once "functions.php";

//inserting a comment in a post
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    table_Comments ('insert', NULL, NULL);
}
?>
