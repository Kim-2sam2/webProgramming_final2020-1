<?php
include 'func.php';
$list_index = $_GET["list_index"];
$con = connectDB();

for ($i = 0; $i < count($_POST["index"]); $i++) {
    $todo_index = $_POST["index"][$i];
    $content = $_POST["content"][$i];
    echo ($content);
    $sql = "update todo_20160705 set content='$content' where num = $todo_index";

    mysqli_query($con, $sql);
}
mysqli_close($con);
echo ("
    <script> 
    alert('변경되었습니다.');
    location.href = 'board_view.php?num=$list_index' 
    </script>
");