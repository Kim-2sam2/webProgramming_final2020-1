<?php
session_start();
include 'func.php';

$con = connectDB();
$userid = $_GET["userid"];

if ($userid != $_SESSION["userid"]) {
    echo ("
    <script>
    alert('권한이 없습니다.');
    history.go(-1)
    </script>
");
    exit;
}

$todoList_index = $_GET["num"];
$sql = "select * from todo_20160705 where list = $todoList_index";
$result = mysqli_query($con, $sql);

while ($row = mysqli_fetch_array($result)) {
    $sql = "delete from todo_20160705 where list = $todoList_index";
    mysqli_query($con, $sql);
}
$sql = "delete from todoList_20160705 where num = $todoList_index";
mysqli_query($con, $sql);
mysqli_close($con);

echo "
<script>
    location.href = 'board.php';
</script>
";