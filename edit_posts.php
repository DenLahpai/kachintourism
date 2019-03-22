<?php
require_once "functions.php";
require "loggedin.php";

//getting current user's data
$rows_Users = table_Users('select_one', $_SESSION['Id'], NULL);
foreach ($rows_Users as $row_Users) {
    // code...
}

//getting one row of data from the table Posts
$Posts_Id = trim($_REQUEST['Posts_Id']);
//TODO put this as a function...
if (is_numeric($Posts_Id)) {
    echo "OK";
}
else {
    echo "There has been an error! Please click on 'BACK' and try again!";
    die();
}

$rows_Posts = table_Posts ('select_one', $Posts_Id, NULL);
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title></title>
    </head>
    <body>
        test
    </body>
</html>
