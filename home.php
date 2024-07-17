<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styhome.css">
</head>

<body>
    <?php
    require_once "conn.php";
    if (!isset($_GET["myid"])) {
        echo "<a href='login.php'>Log in </a>";
        echo " OR ";
        echo "<a href='register.php'>Register </a>";
        echo "<center>";
        echo "<h1 class='b'>Pleas log in to use the site<h1>";
        echo "</center>";
    } else {
        $myid = $_GET["myid"];
        echo "<a href='login.php'>Logout </a>";
        echo "<center><h1>This your Home:</h1></center><br/>";
        $arr = $pdo->query("select * from products;");
        $arr = $arr->fetchAll();
        if (count($arr) == 0) {
            echo "<center>";
            echo "<h1>There is nothing to see here!, try to add some products <a href='Addnewproduct.php?myid=$myid'>Here</a></h1>";
            echo "</center>";
        } else {
            echo "<center>";
            echo "<a href='Showyourbill.php?myid=$myid'>Show your Bill</a>";
            echo " OR ";
            echo "<a href='Addnewproduct.php?myid=$myid'>Add new product</a>";
            echo "</center>";
            echo "<br/>";
            echo "<center>";
            echo "<table border=2>";
            foreach ($arr as $row) {
                $proid = $row['id'];
                $proname = $row['name'];
                $proprice = $row['price'];
                $protype = $row['type'];
                $prophoto = $row['photo'];
                echo "<tr>";
                echo "<center>";
                echo "<td>";
                echo "Number: " . $proid . "<br>";
                echo "product name: " . $proname . "<br>";
                echo "Price: " . $proprice . "<br>";
                echo "type: " . $protype . "<br>";
                echo "</td>";
                echo "</center>";
                echo "<td>";
                echo "<center>";
                echo '<img width="300" src="images\\' . $prophoto . '"/>';
                echo "</td>";
                echo "<td>";
                echo "<a href='Addtobill.php?proid=$proid&myid=$myid'>Add to bill</a>";
                echo "<br/>";
                echo "<a href='Deletethisproduct.php?proid=$proid&myid=$myid'>Delete this product</a>";
                echo "<br/>";
                echo "<a href='Editthisproduct.php?proid=$proid'>Edit this product</a>";
                echo "</td>";
                echo "</center>";
                echo "</tr>";
            }
            echo "</table>";
            echo "</center>";
        }
    }
    ?>
</body>

</html>