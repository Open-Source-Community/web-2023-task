<?php
if (isset($_GET['deltitle'])) {
    include('dbconnection.php');
    $deltitle = $_GET['deltitle'];
    $sql = "delete from books where title like '$deltitle'";

    if (mysqli_query($con, $sql)) {
        session_start();
        $_SESSION["delete"] = "Book Deleted Successfully!";
        header("Location:index-admin.php");
    } else {
        die("Something went wrong");
    }
} 
else {
    echo "Book does not exist";
}

?>