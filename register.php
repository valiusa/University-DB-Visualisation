<?php
    session_start();
    $_SESSION['message'] = "";

    $hostName = "localhost";
    $user = "root";
    $pass = "";
    $db = "testdb";

    $conn = new mysqli($hostName, $user, $pass, $db) or die();

    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        if($_POST['pass'] == $_POST['confpass']){
            $uname = $conn->real_escape_string($_POST['userName']);
            $email = $conn->real_escape_string($_POST['email']);
            $password = md5($_POST['pass']);

            $sql = "INSERT INTO users VALUES('$uname', '$email', '$password')";

            if($conn->query($sql) == true) {
                header('location: login.php'); 
            }
        }
        else {
            $_SESSION['message'] = "The two paswords do not match!";
        }
    }
?>

<!doctype html>
<html lang="en">
    <head>
        <!-- Put Meta tags below this -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>Task - IBS</title>

        <!-- Put Styles and Scripts below this -->
        <link rel="stylesheet" type="text/css" href="styles.css">
        <link rel="stylesheet" type="text/css" href="nav.css">
    </head>
    <body style="background: #037DB6;">
        <nav>
            <ul>
                <li><a href="login.php">LOGIN</a></li>
                <li><a href="register.php">REGISTER</a></li>
            </ul>
        </nav>

        <div class="center">
            <div class="alert">
                <?=
                    $_SESSION['message']
                ?>
            </div>

            <form action="register.php" method="post" autocomplete="off">
                <table>
                    <tr>
                        <th class="h">Create an account</th>
                    </tr>
                    <tr>
                        <td><input type="text" name="userName" placeholder="Enter Username"  class="input" required></td>
                    </tr>
                    <tr>
                        <td><input type="text" name="email" placeholder="Email" class="input" required></td>
                    </tr>
                    <tr>
                        <td><input type="password" name="pass" placeholder="Password" class="input" required></td>
                    </tr>
                    <tr>
                        <td><input type="password" name="confpass" placeholder="Confirm Password" class="input" required></td>
                    </tr>
                    <tr>
                        <td><input type="submit" value="Register" class="btn"></td>
                    </tr>
                </table>
            </form>
        </div>
    </body>
</html>