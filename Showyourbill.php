<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styhome.css">
    <title>Document</title>
</head>

<body>
    <?php
    require_once "conn.php";
    $myid = $_GET['myid'];
    $arr = $pdo->query("select * from bill where '$myid'=user_id");
    echo "<center>";
    echo "<h1>Your Bill is:</h1>";
    echo "<table border=2>";
    echo "<tr><td>product name</td><td>product price</td><td>date of pay</td></tr>";
    $mainprice=0;
    foreach ($arr as $row) {
        $id = $row['product_id'];
        $date = $row["date"];
        $productdet = $pdo->query("select * from products where '$id'=id");
        $productdet=$productdet->fetch();
        $name = $productdet["name"];
        $price = $productdet["price"];
        echo "<tr>";
        echo "<td>" . $name . "</td>";
        echo "<td>" . $price . "</td>";
        echo "<td>" . $date . "</td>";
        echo "</tr>";
        $mainprice+=$price;
    }
    echo "</table>";
    echo "<br/>";
    echo "Your main price is $mainprice";
    echo "<a href='home.php?myid=$myid'> Return to home</a>";
    echo "</center>";
    ?>
</body>

</html>