<?php
require_once "functions.php";

//getting current user's data
if (isset($_SESSION['Id'])) {
    $rows_Users = table_Users('select_one', $_SESSION['Id'], NULL);
    foreach ($rows_Users as $row_Users) {
        // code...
    }
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
    <?php
    $page_title = 'Contact Us';
    include "includes/head.php";
    ?>
    <body>
        <!-- content -->
        <div class="content">
            <?php
            $header = 'Contact Us';
            include "includes/header.php";
            include "includes/nav.php";
            ?>
            <main>
                <p>Your suggestions and feedback are precious for us to improve our services. Please feel free to contact us at <a href=\"mailto: den.lahpai@icloud.com\">den.lahpai@icloud.com</a>.</p>
            </main>
        </div>
        <!-- end of content -->
        <?php include "includes/footer.html"; ?>
    </body>
</html>
