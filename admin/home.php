<?php
require_once "../functions.php";
require "../loggedin.php";
require "admin.php";

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
    $page_title = 'Welcome';
    include "../includes/head.php";
    ?>
    <body>
        <!-- content -->
        <div class="content">
        <?php
        $header = 'Users';
        include "../includes/nav.php";
        include "../includes/header.php";
        ?>
        <main>
            <!-- table -->
            <div class="big table">
                <table>
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Title</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Company</th>
                            <th>Ctl</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // getting Users from the database
                        $rows_all_Users = table_Users ('select_all', NULL, NULL);
                        foreach ($rows_all_Users as $row_all_Users) {
                            echo "<tr>";
                            echo "<td>".$row_all_Users->Id."</td>";
                            echo "<td>".$row_all_Users->Title."</td>";
                            echo "<td>".$row_all_Users->FirstName."&nbsp";
                            echo $row_all_Users->LastName."</td>";
                            echo "<td>".$row_all_Users->Email."</td>";
                            echo "<td>".$row_all_Users->Company."</td>";
                            echo "<td><a href=\"edit_users.php?Id=$row_all_Users->Id\" target=\"_blank\"><button type=\"button\">Edit</button></a></td>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
            <!-- end of table -->
        </main>
        </div>
        <!-- end of content -->
        <?php include "../includes/footer.html"; ?>
    </body>
</html>
