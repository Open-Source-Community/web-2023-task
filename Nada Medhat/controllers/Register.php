<?php
// Function to Display the alert box
function alert($message)
{
    echo "<script>alert('$message');</script>";
}

//Check Fields
if (isset($_POST["submit"])) {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["pass"];
    /* print_r($password);
            die();*/
    $hashd_password = password_hash($password, PASSWORD_DEFAULT);
    $errors = array();

    if (empty($name) or empty($email) or empty($password)) {
        array_push($errors, "All fields are required");
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        array_push($errors, "Email is not valid");
    }
    if (strlen($password) < 8) {
        array_push($errors, "Password must be at least 8 charactes long");
    }

    require_once "../db/database.php";

    $sql = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($connection, $sql);
    $rowCount = mysqli_num_rows($result);
    if ($rowCount > 0) {
        array_push($errors, "Email already exists!");
    }
    if (count($errors) > 0) {
        foreach ($errors as  $error) {
            alert($error);
        }
    } else {

        $sql = "INSERT INTO users (name,email,password) VALUES ( ?, ?, ? )";
        $stmt = mysqli_stmt_init($connection);
        $prepareStmt = mysqli_stmt_prepare($stmt, $sql);
        if ($prepareStmt) {
            /*print_r($password);
                die();*/
            $var = mysqli_stmt_bind_param($stmt, "sss", $name, $email, $password); /*$hashd_password*/

            mysqli_stmt_execute($stmt);
            alert("You are registered successfully");
            header("Location:../Login.html");
        } else {
            die("Something went wrong");
        }
    }
}
