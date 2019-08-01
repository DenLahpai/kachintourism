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
    $page_title = "About Us";
    include "includes/head.php";
    ?>
    <body>
        <!-- content -->
        <div class="content">
            <?php
            $header = "About Us";
            include "includes/header.php";
            include "includes/nav.php";
            ?>
            <main>
                <p>
                    This is a private meeting room! We have gathered here to discuss about various topics to improve the tourism in Kachin State (nothern part of Myanmar).
                    <br>
                    Our vision is to develop tourism industry in our beautiful Kachin State.
                </p>
                <p>
                    Anyone who shares our vision is welcomed to join our online meeting room.
                </p>
            </main>
        </div>
        <!-- end of content -->
        <?php include "includes/footer.html"; ?>
    </body>
</html>
