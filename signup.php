<?php
require_once "functions.php";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $rowCount = table_Users('check_before_insert', NULL, NULL);

    if ($rowCount == 0) {
        table_Users('insert', NULL, NULL);
    }
    else {
        $error = "Your email has already been registered! Please <a href=\"mailto:den.lahpai@icloud.com\">contact us</a> if you would like to reset your password.";
    }
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
    <?php
    $page_title = "Signup";
    include "includes/head.php";
    ?>
    <body>
        <!-- content -->
        <div class="content">
            <?php
            $header = $page_title;
            include "includes/header.php";
            ?>
            <main>
                <!-- signup form -->
                <div class="signup form">
                    <form action="#" method="post">
                        <ul>
                            <li>
                                <select id="Title" name="Title">
                                    <option value="Mr.">Mr.</option>
                                    <option value="Ms.">Ms.</option>
                                    <option value="Mrs.">Mrs.</option>
                                </select>
                            </li>
                            <li>
                                <input type="text" name="FirstName" id="FirstName" placeholder="First Name">
                            </li>
                            <li>
                                <input type="text" name="LastName" id="LastName" placeholder="Last Name">
                            </li>
                            <li>
                                <input type="text" name="Email" id="Email" placeholder="Email">
                            </li>
                            <li>
                                <input type="text" name="Position" id="Position" placeholder="Position">
                            </li>
                            <li>
                                <input type="text" name="Company" id="Company" placeholder="Company">
                            </li>
                            <li>
                                <input type="text" name="City" id="City" placeholder="City that you are based in">
                            </li>
                            <li>
                                <input type="text" name="Country" id="Country" placeholder="Country that you are based in">
                            </li>
                            <li class="error">
                                <?php
                                if (!empty($error)) {
                                    echo $error;
                                }
                                ?>
                            </li>
                            <li>
                                <button type="button" id="buttonSubmit" name="buttonSubmit" onclick="checkThreeFields('FirstName', 'Email', 'Company');">Sumbit</button>
                            </li>
                        </ul>
                    </form>
                </div>
                <!-- end of signup form -->
            </main>
        </div>
        <!-- end of content -->
        <?php include "includes/footer.html"; ?>
    </body>
    <script type="text/javascript" src="scripts/main.js"></script>
</html>
