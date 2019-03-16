<?php
require_once "functions.php";
require "loggedin.php";

//getting current user's data
$rows_Users = table_Users('select_one', $_SESSION['Id'], NULL);
foreach ($rows_Users as $row_Users) {
    // code...
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $rowCount = table_Users ('check_before_update', $_SESSION['Id'], NULL);

    if ($rowCount == 0) {
        table_Users ('update', $_SESSION['Id'], NULL);
    }
    else {
        $error = 'The email is already used by someone else!';
    }
}

$Id = $_SESSION['Id'];
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
                    <form action="#" method="post" enctype="multipart/form-data">
                        <ul>
                            <li id="Users_Id" class="invisible"><? echo $_SESSION['Id'];?></li>
                            <li>
                                <?php echo '<img src="data:image/jpeg;base64,'.base64_encode($row_Users->Profile).'"/>'; ?>
                            </li>
                            <li>
                                <input type="file" name="Profile" id="Profile">
                            </li>
                            <li>
                                <select id="Title" name="Title">
                                    <?php
                                    switch ($row_Users->Title) {
                                        case 'Mr.':
                                            echo "<option value=\"Mr.\" selected>Mr.</option>";
                                            echo "<option value=\"Ms.\">Ms.</option>";
                                            echo "<option value=\"Mrs.\">Mrs.</option>";
                                            break;
                                        case 'Ms.':
                                            echo "<option value=\"Mr.\">Mr.</option>";
                                            echo "<option value=\"Ms.\" selected>Ms.</option>";
                                            echo "<option value=\"Mrs.\">Mrs.</option>";
                                            break;
                                        case 'Mrs.':
                                            echo "<option value=\"Mr.\">Mr.</option>";
                                            echo "<option value=\"Ms.\">Ms.</option>";
                                            echo "<option value=\"Mrs.\" selected>Mrs.</option>";
                                            break;
                                        default:
                                            // code...
                                            break;
                                    }
                                    ?>
                                </select>
                            </li>
                            <li>
                                <input type="text" name="FirstName" id="FirstName" value="<? echo $row_Users->FirstName; ?>">
                            </li>
                            <li>
                                <input type="text" name="LastName" id="LastName" value="<? echo $row_Users->LastName; ?>">
                            </li>
                            <li>
                                <input type="text" name="Email" id="Email" value="<? echo $row_Users->Email; ?>">
                            </li>
                            <li>
                                <input type="password" name="old_password" placeholder="Old Password" >
                            </li>
                            <li>
                                <input type="password" name="new_password1" id="new_password1" placeholder="New Password">
                            </li>
                            <li>
                                <input type="password" name="new_password2" id="new_password2" placeholder="Confirm Password">
                            </li>
                            <li>
                                <input type="text" name="Position" id="Position" value="<? echo $row_Users->Position; ?>">
                            </li>
                            <li>
                                <input type="text" name="Company" id="Company" value="<? echo $row_Users->Company; ?>">
                            </li>
                            <li>
                                <input type="text" name="City" id="City" value="<? echo $row_Users->City; ?>">
                            </li>
                            <li>
                                <input type="text" name="Country" id="Country" value="<? echo $row_Users->Country; ?>">
                            </li>
                            <li class="error">
                                <?php
                                if (!empty($error)) {
                                    echo $error;
                                }
                                ?>
                            </li>
                            <li>
                                <button type="button" id="buttonSubmit" name="buttonSubmit" onclick="checkThreeFields('FirstName', 'Email', 'Company');">Update</button>
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
    <script type="text/javascript">
        addEventListener("load", checkUploadPic());
        //function to check if user has the authority to upload picture
        function checkUploadPic(){
            var UsersId = document.getElementById('Users_Id').innerHTML;

            if (UsersId > 4) {
                document.getElementById('Profile').style.display = 'none';
            }
        }
    </script>
    <script type="text/javascript" src="scripts/main.js"></script>

</html>
