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

if (isset($_POST["item"]))
    $num_item = count($_POST["item"]);
else
    echo ("
            <script>
            alert('삭제할 게시글을 선택해주세요!');
            history.go(-1)
            </script>
");

$con = connectDB();

for ($i = 0; $i < count($_POST["item"]); $i++) {
    $todoList_index = $_POST["item"][$i];
    $sql = "select * from todoList_20160705 where num = $todoList_index";
    $result = mysqli_query($con, $sql);
    while ($row = mysqli_fetch_array($result)) {
        $sql = "delete from todo_20160705 where list = $todoList_index";
        mysqli_query($con, $sql);
    }
    $sql = "delete from todoList_20160705 where num = $todoList_index";
    mysqli_query($con, $sql);
}

mysqli_close($con);

echo "
<script>
    location.href = 'admin.php';
</script>
";