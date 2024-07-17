<?php
require_once "conn.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $newnamepro = $newpricepro = $newtypenpro = $newphotonpro = "";
    if (isset($_POST["newnamepro"])) {
        $newnamepro = $_POST["newnamepro"];
    }
    if (isset($_POST["newpricepro"])) {
        $newpricepro = $_POST["newpricepro"];
    }
    if (isset($_POST["newtypenpro"])) {
        $newtypenpro = $_POST["newtypenpro"];
    }
    if (isset($_POST["newphotonpro"])) {
        $newphotonpro = $_POST["newphotonpro"];
    }
    if ($newnamepro == "" || $newpricepro == "" || $newtypenpro == "" || $newphotonpro == "") {
        echo "Not all fields were entered<br>";
    } else {
        $q = "INSERT INTO products (name,price,type,photo) VALUES(?, ?, ?, ?)";
        $ps = $pdo->prepare($q);
        $ps->bindParam(1, $newnamepro, PDO::PARAM_STR);
        $ps->bindParam(2, $newpricepro, PDO::PARAM_INT);
        $ps->bindParam(3, $newtypenpro, PDO::PARAM_STR);
        $ps->bindParam(4, $newphotonpro, PDO::PARAM_STR);
        $ps->execute();
        $pdo = NULL;
        echo "Done";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styhome.css">
    <title>Document</title>
</head>

<body>
    <center>
        <br />
        <h1>
            Add new product here:
        </h1>
        <br />
        <form action='Addnewproduct.php' method='POST'>
            <input size="35" type='text' name='newnamepro' placeholder='enter the name' required>
            <br>
            <input size="35" type='text' name='newpricepro' placeholder='enter the price' required>
            <br>
            <input size="35" type='text' name='newtypenpro' placeholder='enter the type' required>
            <br>
            <input size="35" type='text' name='newphotonpro' placeholder='enter the name of photo with .jpg or .png' required>
            <br>
            <br>
            <input type='submit' value='ok!'>
        </form>
    </center>
</body>

</html>