<?php
include 'func.php';
session_start();

$userid = $_GET["userid"];
$pass = $_POST["pass"];
$name = $_POST["name"];
$email1 = $_POST["email1"];
$email2 = $_POST["email2"];
$email = $email1 . "@" . $email2;

$con = connectDB();
$sql = "update user_20160705 set pass='$pass', name='$name', email='$email' where id='$userid'";
mysqli_query($con, $sql);
mysqli_close($con);

echo ("
    <script> 
    alert('변경되었습니다.');
    location.href = 'index.php' 
    </script>
");