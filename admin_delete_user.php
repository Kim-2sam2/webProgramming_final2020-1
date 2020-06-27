<?php
include 'func.php';
session_start();
if (isset($_SESSION["admin"])) {
    $admin = $_SESSION["admin"];
} else {
    $admin = 0;
}

if ($admin != 1) {
    echo ("
        <script>
        alert('관리자가 아닙니다! 회원 삭제는 관리자만 가능합니다!');
        history.go(-1)
        </script>
    ");
    exit;
}

$userid = $_GET["userid"];
$con = connectDB();
$sql = "select num from todoList_20160705 where id = '$userid'";
$result = mysqli_query($con, $sql);
while ($row = mysqli_fetch_array($result)) {
    $todoList_index = $row["num"];
    $sql = "delete from todo_20160705 where list = $todoList_index";
    mysqli_query($con, $sql);
}

$sql = "delete from todoList_20160705 where id = '$userid'";
mysqli_query($con, $sql);

$sql = "delete from user_20160705 where id='$userid'";
mysqli_query($con, $sql);

mysqli_close($con);

echo "
<script>
    location.href = 'admin.php';
</script>
";