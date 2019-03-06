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

        case 'select_one':
            $query = "SELECT * FROM Users WHERE Id = :Id ;";
            $database->query($query);
            $database->bind(':Id', $var1);
            return $r = $database->resultset();
            break;

        default:
            // code...
            break;
    }
}

?>
