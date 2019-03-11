<?php
require_once "functions.php";
require "loggedin.php";

//getting current user's data
$rows_Users = table_Users('select_one', $_SESSION['Id'], NULL);
foreach ($rows_Users as $row_Users) {
    // code...
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $rowCount = table_Posts ('check_before_insert', NULL, NULL);
    if ($rowCount == 0) {
        table_Posts ('insert', NULL, NULL);
    }
    else {
        $error = "There is already a post with your subject!";
    }
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
            <main>
                <!-- post form -->
                <div class="post form">
                    <form action="#" method="post">
                        <ul>
                            <li>
                                <input type="text" name="Subject" id="Subject" placeholder="Subject">
                            </li>
                            <li>
                                <textarea name="Description" id="Description" rows="8" cols="80" placeholder="The description of your post here... "></textarea>
                            </li>
                            <li>
                                <button type="button" id="buttonSubmit" name="buttonSubmit" onclick="checkThreeFields('Subject', 'Subject', 'Description');">New Post</button>
                            </li>
                        </ul>
                    </form>
                </div>
                <!-- end of post form -->
                <div class="error">

                </div>
                <?php
                //getting data from the table posts
                $rows_Posts = table_Posts ('select_all', NULL, NULL);
                foreach ($rows_Posts as $row_Posts) {
                    echo "<!-- post -->";
                    echo "<div class=\"post\">";
                    echo "<form action=\"comment.php\" method=\"post\">";
                    echo "<ul>";
                    echo "<li class=\"view_user\"><span onclick=\"openUserModal($row_Posts->Users_Id);\">".'<img src="data:image/jpeg;base64,'.base64_encode($row_Posts->Profile).'"/>'.$row_Posts->FirstName."</span></li>";
                    echo "<li class=\"invisible\"><input type=\"number\" name=\"Posts_Id\" id=\"Posts_Id\" value=\"$row_Posts->Posts_Id\"></li>";
                    echo "<li class=\"bold\">".$row_Posts->Subject."</li>";
                    echo "<li>".$row_Posts->Description."</li>";
                    echo "<li class=\"comment\" onclick=\"commentBox();\">Comment</li>";
                    echo "<li class=\"invisible\" id=\"commentBox\"><input type=\"text\" name=\"Comment\" id=\"Comment\"><button type=\"button\" id=\"buttonComment\" onclick=\"postComment();\">Post</button></li>";
                    echo "</ul>";
                    echo "</form>";
                    echo "<!-- comments -->";
                    echo "<div class=\"comments\">";
                    echo "</div>";
                    echo "<!-- end of comments -->";
                    echo "</div>";
                    echo "<!-- end of post -->";
                }
                ?>
            </main>
        </div>
        <!-- end of content -->
        <!-- modalUsers -->
        <div id="modalUsers">
            <?php
            $rows_Users_Details = table_Users('select_all', NULL, NULL);
            foreach ($rows_Users_Details as $row_Users_Details) {
                echo "<div id=\"$row_Users_Details->Id\" class=\"modalUsers\">";
                echo "<ul>";
                echo '<img src="data:image/jpeg;base64,'.base64_encode($row_Users_Details->Profile).'"/>';
                echo "<li>".$row_Users_Details->Title." ".$row_Users_Details->FirstName." ".$row_Users_Details->LastName."</li>";
                echo "<li><a href=\"mailto:".$row_Users_Details->Email."\">".$row_Users_Details->Email."</a></li>";
                echo "<li>".$row_Users_Details->Position." at ".$row_Users_Details->Company."</li>";
                echo "<li>".$row_Users_Details->City.", ".$row_Users_Details->Country."</li>";
                echo "</ul>";
                echo "</div>";
            }
            ?>
        </div>
        <!-- endo of modalUsers -->
    </body>
    <script type="text/javascript" src="scripts/main.js"></script>
</html>
