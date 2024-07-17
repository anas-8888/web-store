<?php
require_once "conn.php";
$myid = $_GET["myid"];
$proid = $_GET["proid"];
$q = "DELETE FROM products WHERE id='$proid';";
$pdo->query($q);
$pdo = NULL;
header("Location: home.php?myid=$myid");
exit();
