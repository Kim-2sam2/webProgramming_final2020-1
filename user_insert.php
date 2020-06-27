<?php
include 'func.php';
$userid = $_POST["userid"];
$pass = $_POST["pass"];
$name = $_POST["name"];
$email1 = $_POST["email1"];
$email2 = $_POST["email2"];
$email = $email1 . "@" . $email2;

$con = connectDB();
$sql = "insert into user_20160705 values ('$userid', '$pass', '$name', '$email', 0)";
mysqli_query($con, $sql);
mysqli_close($con);

echo ("<script> location.href='index.php';</script>");