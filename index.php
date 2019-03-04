<?php

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
                    <form action="login.php" id="login" method="post">
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
