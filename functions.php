<?php
require_once "conn.php";

//function to use
function table_Users ($job, $var1, $var2) {
    $database = new Database();
    switch ($job) {
        case 'check_before_insert':
            // getting the data from the form
            $Email = trim($_REQUEST['Email']);
            $query = "SELECT * FROM Users WHERE Email = :Email ;";
            $database->query($query);
            $database->bind(':Email', $Email);
            return $rowCount = $database->rowCount();
            break;

        case 'insert':
            // getting the data from the form
            $Title = trim($_REQUEST['Title']);
            $FirstName = trim($_REQUEST['FirstName']);
            $LastName = trim($_REQUEST['LastName']);
            $Email = trim($_REQUEST['Email']);
            $Password = "XXYGDSD";
            $Position = trim($_REQUEST['Position']);
            $Company = trim($_REQUEST['Company']);
            $City = trim($_REQUEST['City']);
            $Country = trim($_REQUEST['Country']);

            $query = "INSERT INTO Users (
                Title,
                FirstName,
                LastName,
                Email,
                Password,
                Position,
                Company,
                City,
                Country
            ) VALUES (
                :Title,
                :FirstName,
                :LastName,
                :Email,
                :Password,
                :Position,
                :Company,
                :City,
                :Country
            )
            ;";
            $database->query($query);
            $database->bind(':Title', $Title);
            $database->bind(':FirstName', $FirstName);
            $database->bind(':LastName', $LastName);
            $database->bind(':Email', $Email);
            $database->bind(':Password', $Password);
            $database->bind(':Position', $Position);
            $database->bind(':Company', $Company);
            $database->bind(':City', $City);
            $database->bind(':Country', $Country);
            if ($database->execute()) {
                header("location: thankyou_signup.php");
            }
            break;

        case 'select_all':
            $query = "SELECT * FROM Users ;";
            $database->query($query);
            return $r = $database->resultset();
            break;

        case 'select_one':
            $query = "SELECT * FROM Users WHERE Id = :Id ;";
            $database->query($query);
            $database->bind(':Id', $var1);
            return $r = $database->resultset();
            break;

        case 'check_before_update':
            //getting data from the form
            $Email = trim($_REQUEST['Email']);
            $query = "SELECT * FROM Users
                WHERE Email = :Email
                AND Id != :Id
            ;";
            $database->query($query);
            $database->bind(':Email', $Email);
            $database->bind(':Id', $var1);
            return $r = $database->rowCount();
            break;

        case 'check_password':
            //getting data from the form
            $Password = trim($_REQUEST['current_password']);
            $query = "SELECT * FROM Users
                WHERE Id = :Id
                AND BINARY Password = :Password
            ;";
            $database->query($query);
            $database->bind(':Id', $var1);
            $database->bind(':Password', $Password);
            return $r = $database->rowCount();
            break;

        case 'update':
            // getting data from the form
            $Profile = file_get_contents($_FILES['Profile']['tmp_name']);
            $Title = $_REQUEST['Title'];
            $FirstName = trim($_REQUEST['FirstName']);
            $LastName = trim($_REQUEST['LastName']);
            $Email = trim($_REQUEST['Email']);
            $Position = trim($_REQUEST['Position']);
            $Company = trim($_REQUEST['Company']);
            $City = trim($_REQUEST['City']);
            $Country = trim($_REQUEST['Country']);

            if (empty($Profile)) {
                $query = "UPDATE Users SET
                    Title = :Title,
                    FirstName = :FirstName,
                    LastName = :LastName,
                    Email = :Email,
                    Position = :Position,
                    Company = :Company,
                    City = :City,
                    Country = :Country
                    WHERE Id = :Id
                ;";
                $database->query($query);
                $database->bind(':Title', $Title);
                $database->bind(':FirstName', $FirstName);
                $database->bind(':LastName', $LastName);
                $database->bind(':Email', $Email);
                $database->bind(':Position', $Position);
                $database->bind(':Company', $Company);
                $database->bind(':City', $City);
                $database->bind(':Country', $Country);
                $database->bind(':Id', $var1);
                if ($database->execute()) {
                    header("location: home.php");
                }
            }
            else {
                $query = "UPDATE Users SET
                    Profile = :Profile,
                    Title = :Title,
                    FirstName = :FirstName,
                    LastName = :LastName,
                    Email = :Email,
                    Position = :Position,
                    Company = :Company,
                    City = :City,
                    Country = :Country
                    WHERE Id = :Id
                ;";
                $database->query($query);
                $database->bind(':Profile', $Profile);
                $database->bind(':Title', $Title);
                $database->bind(':FirstName', $FirstName);
                $database->bind(':LastName', $LastName);
                $database->bind(':Email', $Email);
                $database->bind(':Position', $Position);
                $database->bind(':Company', $Company);
                $database->bind(':City', $City);
                $database->bind(':Country', $Country);
                $database->bind(':Id', $var1);
                if ($database->execute()) {
                    header("location: home.php");
                }
            }
            break;

        case 'update_password':
            // getting data from the form
            $Password = trim($_REQUEST['new_password1']);
            $query = "UPDATE Users SET
                Password = :Password
                WHERE Id = :Id
            ;";
            $database->query($query);
            $database->bind(':Password', $Password);
            $database->bind(':Id', $var1);
            if ($database->execute()) {
                header("location: home.php");
            }
            break;
        default:
            // code...
            break;
    }
}

// function to use the table Posts
function table_Posts ($job, $var1, $var2) {
    $database = new Database();

    switch ($job) {
        case 'check_before_insert':
            // getting data from the form
            $Subject = trim($_REQUEST['Subject']);

            $query = "SELECT * FROM Posts WHERE Subject = :Subject ;";
            $database->query($query);
            $database->bind(':Subject', $Subject);
            return $r = $database->rowCount();
            break;

        case 'insert':
            // getting data from the form
            $Subject = trim($_REQUEST['Subject']);
            $Description = trim($_REQUEST['Description']);

            $query = "INSERT INTO Posts (
                Subject,
                Description,
                Users_Id
                ) VALUES (
                :Subject,
                :Description,
                :Users_Id
                )
            ;";
            $database->query($query);
            $database->bind(':Subject', $Subject);
            $database->bind(':Description', $Description);
            $database->bind(':Users_Id', $_SESSION['Id']);
            if ($database->execute()) {
                header("location: home.php");
            }
            break;

        case 'select_all':
            $query = "SELECT
                Posts.Id AS Posts_Id,
                Posts.Subject AS Subject,
                Posts.Description AS Description,
                Posts.Created AS Created,
                Posts.Updated AS Updated,
                Posts.Users_Id AS Users_Id,
                Users.FirstName AS FirstName,
                Users.Profile AS Profile
                FROM Posts
                LEFT OUTER JOIN Users
                ON Posts.Users_Id = Users.Id
                ORDER BY Posts.Updated DESC;
            ;";
            $database->query($query);
            return $r = $database->resultset();
            break;

        default:
            // code...
            break;
    }
}

//fucntion to use data from the table Comments
function table_Comments ($job, $var1, $var2) {
    $database = new Database();

    switch ($job) {
        case 'insert':
            // getting data from the form
            $Posts_Id = $_REQUEST['Posts_Id'];
            $Comment = trim($_REQUEST['Comment']);

            $query = "INSERT INTO Comments (
                Posts_Id,
                Comment,
                Users_Id
                ) VALUES (
                :Posts_Id,
                :Comment,
                :Users_Id
                )
            ;";
            $database->query($query);
            $database->bind(':Posts_Id', $Posts_Id);
            $database->bind(':Comment', $Comment);
            $database->bind(':Users_Id', $_SESSION['Id']);
            if ($database->execute()) {
                header("location: home.php");
            }
            break;

        case 'one_post':
            $query = "SELECT
                Comments.Id,
                Comments.Comment,
                Comments.Posts_Id,
                Comments.Users_Id,
                Comments.Created,
                Users.FirstName,
                Users.Profile
                FROM Comments
                LEFT OUTER JOIN Users
                ON Comments.Users_Id = Users.Id
                WHERE Comments.Posts_Id = :Posts_Id
            ;";
            $database->query($query);
            $database->bind(':Posts_Id', $var1);
            return $r = $database->resultset();
            break;

        default:
            // code...
            break;
    }
}

?>
