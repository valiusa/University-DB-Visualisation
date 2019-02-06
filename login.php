<?php
    session_start();
    $_SESSION['message'] = "";

    $hostName = "localhost";
    $user = "root";
    $pass = "";
    $db = "testdb";

    $conn = new mysqli($hostName, $user, $pass, $db) or die();

    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $username = $conn->real_escape_string($_POST['userName']);
        $password = md5($_POST['pass']);

        if($username == "admin" && $password == '24489b14d735d20eab3b88eed54323f2'){
            header('location: admin.php');
        }
        else {
            $sql = "SELECT (pwd) FROM users WHERE (username = '$username' AND pwd = '$password')";
            $result = $conn->query($sql);

            if($result->num_rows == 1)
            {
                header('location: user.php');
            }
            else {
                $_SESSION['message'] = "Wrong username or passsword!";
            }
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

            <form action="login.php" method="post" autocomplete="off">
                <table>
                    <tr>
                        <th class="h">LOGIN</th>
                    </tr>
                    <tr>
                        <td><input type="text" name="userName" placeholder="Username"  class="input" required></td>
                    </tr>
                    <tr>
                        <td><input type="password" name="pass" placeholder="Password" class="input" required></td>
                    </tr>
                    <tr>
                        <td><input type="submit" value="LOGIN" class="btn"></td>
                    </tr>
                </table>
            </form>
        </div>
    </body>
</html>