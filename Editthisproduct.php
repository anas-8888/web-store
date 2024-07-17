<?php
require_once "conn.php";
$proid = $_GET['proid'];
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
        $q = "UPDATE products SET name='$newnamepro',price='$newpricepro',type='$newtypenpro' ,photo='$newphotonpro' where id='$proid'";
        $pdo->query($q);
        $pdo=NULL;
        echo "Done";
        exit();
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
        <?php echo "<h1>You are editing now the product number : $proid</h1>";?>
        <br />
        <?php echo "<form action='Editthisproduct.php?proid=$proid' method='POST'>" ?>
        <input size="35" type='text' name='newnamepro' placeholder='enter the new name' required>
        <br>
        <input size="35" type='text' name='newpricepro' placeholder='enter the new price' required>
        <br>
        <input size="35" type='text' name='newtypenpro' placeholder='enter the new type' required>
        <br>
        <input size="35" type='text' name='newphotonpro' placeholder='enter the name of new photo with .jpg or .png' required>
        <br>
        <br>
        <input type='submit' value='ok!'>
        </form>
    </center>
</body>

</html>