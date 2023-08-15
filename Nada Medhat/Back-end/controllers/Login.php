 
 <?php
 $_SESSION['start']="";
    function alert($message)
    {
        echo "<script>alert('$message');</script>";
    }
    function fx_alert_and_redirect($msg, $page)
    {
        echo "<!DOCTYPE html><html><head>Login...</head><body><script type='text/javascript'>alert(\"" . $msg . "\");window.location.href=\"$page\";</script></body></html>";
    }

    if (isset($_POST["login"])) {
        $email = $_POST["email"];
        $pass = $_POST["password"];

        $errors = array();
        if (empty($email) or empty($pass)) {
            array_push($errors, "All fields are required");
        }
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            array_push($errors, "Email is not valid");
        }
        if (strlen($pass) < 8) {
            array_push($errors, "pass must be at least 8 charactes long");
        }

        require_once "../db/database.php";
        $user = null;
        $admin = null;
        $sql = "SELECT * FROM users WHERE email = '$email'";
        $result = mysqli_query($connection, $sql);
        $user = mysqli_fetch_array($result, MYSQLI_ASSOC);

        $sql = "SELECT * FROM admins WHERE email = '$email'";
        $result = mysqli_query($connection, $sql);
        $admin = mysqli_fetch_array($result, MYSQLI_ASSOC);

        if ($user) {
            if ($pass == $user["password"]) {
                session_start();
                $_SESSION["user"] = "yes";
                $_SESSION["name"] = $user["name"];
                header("Location:../index.php");
                die();
            } else {
                fx_alert_and_redirect("password does not match", "../login.html");
            }
        } elseif ($admin) {
            if ($pass == $admin["password"]) {
                session_start();
                $_SESSION["admin"] = "yes";
                $_SESSION["name"] = $admin["name"];
                header("Location:../index-admin.php");
                die();
            } else {
                fx_alert_and_redirect("admin password does not match", "../login.html");
            }
        } else {
            fx_alert_and_redirect("Email does not match", "../login.html");
        }

    }

    ?>