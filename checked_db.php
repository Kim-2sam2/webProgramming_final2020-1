<?php
include 'func.php';
$index = $_POST["num"];
$checked = $_POST["checked"];
$list_index = $_GET["list"];
$con = connectDB();
if (!$checked) {
    $sql = "update todo_20160705 set finish = 1 where num = $index";
} else {
    $sql = "update todo_20160705 set finish = 0 where num = $index";
}
mysqli_query($con, $sql);

//완료 확인//
$sql = "select finish from todo_20160705 where list=$list_index";
$result = mysqli_query($con, $sql);
$num = mysqli_num_rows($result);
$count = 0;
while ($row = mysqli_fetch_array($result)) {
    if ($row["finish"] == 1) {
        $count += 1;
    }
}

if ($num == $count) {
    $complete = 1;
} else {
    $complete = 0;
}

$sql = "update todoList_20160705 set complete = $complete where num = $list_index";
mysqli_query($con, $sql);
mysqli_close($con);

if (isset($_POST['url'])) {
    $url = $_POST["url"];
    echo ("<script> location.href= '$url' </script>");
} else {
    echo ("<script>history.go(-1);</script>");
}