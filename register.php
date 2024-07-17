<?php
require_once 'conn.php';
$error = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $email = $password = $address = "";
    if (isset($_POST["name"])) {
        $name = $_POST["name"];
    }
    if (isset($_POST['email'])) {
        $email = $_POST['email'];
    }
    if (isset($_POST['password'])) {
        $password = $_POST['password'];
    }
    if (isset($_POST['address'])) {
        $address = $_POST['address'];
    }
    if ($name == "" || $email == "" || $password == "" || $address == "") {
        echo "Not all fields were entered<br>";
    } else {
        $q = "SELECT * FROM user WHERE email='$email'";
        $result = $pdo->query($q);
        if ($result->rowCount() == 1) {
            $error = "<center>This Email is taken</center>";
        } else {
            $q = "INSERT INTO user(name,type,password,email,address) VALUES(?, ?, ?, ?, ?)";
            $ps = $pdo->prepare($q);
            $type = "A"; //admin
            $ps->bindParam(1, $name, PDO::PARAM_STR);
            $ps->bindParam(2, $type, PDO::PARAM_STR);
            $ps->bindParam(3, $password, PDO::PARAM_STR);
            $ps->bindParam(4, $email, PDO::PARAM_STR);
            $ps->bindParam(5, $address, PDO::PARAM_STR);
            $ps->execute();
            $myid = $pdo->lastInsertId();
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
    <title>Registre</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <center>
        <h1 class="z"> Register</h1>
        <br>
        <?php echo $error; ?>
        <br>
        <form action="register.php" method="POST">
            <input type="text" name="name" placeholder="Enter name" required>
            <br>
            <input type="email" name="email" placeholder="Enter email" required>
            <br>
            <input type="password" name="password" placeholder="Enter password" required>
            <br>
            <input type="text" name="address" placeholder="Enter your address" required>
            <br><br>
            <input type="submit" name="submit" value="Sign up">
            <input type="Reset" name="Reset" value="Reset">
            <br>
            <a href="login.php">login</a>
        </form>
    </center>
</body>

</html>