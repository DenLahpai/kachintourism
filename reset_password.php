<?php
require_once "functions.php";
require "loggedin.php";

//getting Users data
$rows_Users = table_Users('select_one', $_SESSION['Id'], NULL);
foreach ($rows_Users as $row_Users) {
    // code...
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
    <?php
    $page_title = 'Reset Password';
    include "includes/head.php";
    ?>
    <body>
        <!-- content -->
        <div class="content">
            <?php
            $header = "Reset your Password";
            include "includes/header.php";
            include "includes/nav.php";
            ?>
            <main>
                <!-- Users form -->
                <div class="Users form">
                    <form action="#" method="post">
                        <ul>
                            <li>
                                <input type="password" name="current_password" id="current_password" placeholder="Current Password">
                            </li>
                            <li>
                                <input type="password" name="new_password1" id="new_password1" placeholder="New Password">
                            </li>
                            <li>
                                <input type="password" name="new_password2" id="new_password2" placeholder="Confirm Password" onchange="checkIfMatch('new_password1', 'new_password2', 'passwordError');">
                            </li>
                            <li class="error">
                                <?php
                                if (!empty($error)) {
                                    echo $error;
                                }
                                ?>
                            </li>
                            <li>
                                <button type="button" id="buttonSubmit" name="buttonSubmit" onclick="checkThreeFields('current_password', 'new_password1', 'new_password2');">Update</button>
                            </li>
                        </ul>
                    </form>
                </div>
                <!-- end of Users form -->
            </main>
        </div>
        <!-- end of content -->
        <?php include "includes/footer.html"; ?>
    </body>
    <script type="text/javascript" src="scripts/main.js"></script>
</html>
