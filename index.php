<?php
require_once "functions.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $database = new Database();

    //getting data from the form
    $Email = trim($_REQUEST['Email']);
    $Password = trim($_REQUEST['Password']);

    $query = "SELECT * FROM Users
        WHERE BINARY Email = :Email
        AND BINARY Password = :Password
    ;";
    $database->query($query);
    $database->bind(':Email', $Email);
    $database->bind(':Password', $Password);
    $rowCount = $database->rowCount();
    $rows_Users = $database->resultset();
    if ($rowCount == 1) {
        foreach ($rows_Users as $row_Users) {
            $_SESSION['FirstName'] = 'Den';
        }
        header("location:home.php");
    }
    else {
        $error = "Forgot your password? <a href=\"reset_password.php\">Click here</a> to reset your password.";
    }
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
    <?php
    $page_title = "Welcome";
    include "includes/head.php";
    ?>
    <body>
        <!-- content -->
        <div class="content">
            <?php
            $header = "Welcome";
            include "includes/header.php";
            ?>
            <main>
                <!-- login -->
                <div class="login form">
                    <form action="#" id="login" method="post">
                        <ul>
                            <li>
                                <input type="text" name="Email" id="Email" placeholder="Your email">
                            </li>
                            <li>
                                <input type="password" name="Password" id="Password" placeholder="Password">
                            </li>
                            <li>
                                <button type="button" id="buttonSubmit" name="buttonSubmit" onclick="checkThreeFields('Email', 'Password', 'Email');">Login</button>
                            </li>
                            <li class="error">
                                <?php
                                if (!empty($error)) {
                                    echo $error;
                                }
                                ?>
                            </li>
                        </ul>
                    </form>
                </div>
                <!-- end of login -->
                <p>
                    This is a private discussion platform. Please <a href="signup.php">signup</a> or login to access.
                </p>
            </main>
        </div>
        <!-- end of content -->
        <?php include "includes/footer.html"; ?>
    </body>
    <script type="text/javascript" src="scripts/main.js"></script>
</html>
