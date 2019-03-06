<?php
require_once "functions.php";
require "loggedin.php";

//getting current user's data
$rows_Users = table_Users('select_one', $_SESSION['Id'], NULL);
foreach ($rows_Users as $row_Users) {
    // code...
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
    <?php
    $page_title = "Home";
    include "includes/head.php";
    ?>
    <body>
        <!-- content -->
        <div class="content">
            <?php
            include "includes/nav.php";
            $header = "Welcome ".$row_Users->Title." ".$row_Users->FirstName." ".$row_Users->LastName;
            include "includes/header.php";
            ?>
        </div>
        <!-- end of content -->
    </body>
</html>
