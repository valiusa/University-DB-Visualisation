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
                <li><a href="login.php">LOGOUT</a></li>
            </ul>
        </nav>

        <?php
            $hostName = "localhost";
            $user = "root";
            $pass = "";
            $db = "testdb";

            $conn = new mysqli($hostName, $user, $pass, $db) or die();

            $sql = "SELECT username, email, pwd FROM users";
            $result = $conn->query($sql);

            // Do not work!!!!!!!!!!!!!!!
            if($result->num_rows > 0) {
                echo "<div class='center'><h1 class='h'>Hello ADMIN!</h1><table border='1' style='font-size: 30px;'><tr><th>Username</th><th>E-mail</th><th>Password</th></tr>";

                while($row = $result->fetch_assoc()) {
                    echo "<tr><td>".$row["username"]."</td><td>".$row["email"]."</td><td>".$row["pwd"]."</td></tr>";
                }

                echo "</table></div>";
            }
            else {
                echo "0 results found!";
            }
        ?>
    </body>
</html>