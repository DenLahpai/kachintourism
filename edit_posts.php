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
if (!is_numeric($Posts_Id)) {
    echo "There has been an error! Please click on 'BACK' and try again!";
    die();
}

$rows_Posts = table_Posts ('select_one', $Posts_Id, NULL);
foreach ($rows_Posts as $row_Posts) {

}

if ($_SESSION['Id'] != $row_Posts->Users_Id) {
    echo "You can only edit your own posts!";
    die();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $rowCount = table_Posts ('check_before_update', $Posts_Id, NULL);
    if ($rowCount == 0) {
        table_Posts ('update', $Posts_Id, NULL);
    }
    else {
        $error = 'There is already a post with this subject!';
    }
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
    <?php
    $page_title = "Edit Posts";
    include "includes/head.php";
    ?>
    <body>
        <!-- content -->
        <div class="content">
            <?php
            $header = "Edit Post";
            include "includes/header.php";
            include "includes/nav.php";
            ?>
            <main>
                <!-- post form -->
                <div class="post form">
                    <form action="#" method="post">
                        <ul>
                            <li>
                                <textarea name="Subject" id="Subject" rows="2" cols="90" placeholder="Subject" style="height: 1.8em;" required><? echo $row_Posts->Subject; ?></textarea>
                            </li>
                            <li>
                                <textarea name="Description" id="Description" style="height: 300px;" placeholder="The description of your post here... " required><? echo $row_Posts->Description;?></textarea>
                            </li>
                            <li class="error">
                                <?php
                                if (!empty($error)) {
                                    echo $error;
                                }
                                ?>
                            </li>
                            <li>
                                <button type="button" id="buttonSubmit" name="buttonSubmit" onclick="checkThreeFields('Subject', 'Subject', 'Description');">New Post</button>
                            </li>
                        </ul>
                    </form>
                </div>
                <!-- end of post form -->
            </main>
        </div>
        <!-- end of content -->
        <?php include "includes/footer.html"; ?>
    </body>
    <script type="text/javascript" src="scripts/main.js"></script>
</html>
