<?php
require_once "conn.php";
$myid = $_GET["myid"];
$proid = $_GET["proid"];
$DateTime = date('Y-m-d H:i:s.000000');//local date
$q = "INSERT INTO bill(user_id,product_id,date) VALUES(?, ?, ?)";
$ps = $pdo->prepare($q);
$ps->bindParam(1, $myid, PDO::PARAM_INT);
$ps->bindParam(2, $proid, PDO::PARAM_INT);
$ps->bindParam(3, $DateTime, PDO::PARAM_STR);
$ps->execute();
$pdo = NULL;
header("Location: home.php?myid=$myid");
exit();
