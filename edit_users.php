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
    $page_title = "Edit: ".$row_Users->FirstName;
    include "includes/head.php";
    ?>
    <body>
        <!-- content -->
        <div class="content">
            <?php
            include "includes/nav.php";
            $header = "Update Your Info";
            include "includes/header.php";
            ?>
            <main>
                <!-- Users form -->
                <div class="Users form">
                    <form action="index.html" method="post">
                        <ul>
                            <li>
                                <select id="Title" name="Title">
                                    <?php
                                    switch ($row_Users->Title) {
                                        case 'Mr.':
                                            echo "<option value=\"Mr.\" selected>Mr.</option>";
                                            echo "<option value=\"Ms.\">Ms.</option>";
                                            echo "<option value=\"Mrs.\">Mrs.</option>";
                                            break;

                                        default:
                                            // code...
                                            break;
                                    }
                                    ?>
                                </select>
                            </li>
                        </ul>
                    </form>
                </div>
                <!-- end of User form -->
            </main>
        </div>
        <!-- end of content -->
        <?php include "includes/footer.html"; ?>
    </body>
    <script type="text/javascript" src="scripts/main.js"></script>
</html>
