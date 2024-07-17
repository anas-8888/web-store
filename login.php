<?php
require_once 'conn.php';
$error = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $password = "";
    if (isset($_POST['email'])) {
        $email = $_POST['email'];
    }
    if (isset($_POST['password'])) {
        $password = $_POST['password'];
    }
    if ($email == "" || $password == "") {
        echo ("Not all fields were entered<br>");
    } else {
        $q = "SELECT * FROM user WHERE email='$email' AND password='$password'";
        $result = $pdo->query($q);
        if ($result->rowCount() == 0) {
            $error = "<br>Invalid login attempt";
        } else {
            $result = $result->fetch();
            $myid = $result["id"];
            header("Location: home.php?myid=$myid");
            exit();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <center>
        <form action="login.php" method="POST">
            <h1 class="z"> ELECTROSHOP </h1>
            <br>
            <form action="login.php" method="POST">
                <br>
                <input type="email" name="email" placeholder="Enter Email" required><br>
                <input type="password" name="password" placeholder="Enter Password" required>
                <br><br>
                <input type="submit" value="Log in">
                <?php echo $error; ?>
                <br>
                <a href="register.php">Register</a>
            </form>
    </center>
</body>

</html>