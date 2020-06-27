<?php
include 'func.php';
session_start();
$title = $_POST["title"];
$max = $_POST["max"];
$userid = $_SESSION["userid"];

$con = connectDB();
$todoList_insert = "insert into todoList_20160705 (id, title) values ('$userid', '$title')";
$todoList_query = mysqli_query($con, $todoList_insert);

$todoList_select = "select L.num from todoList_20160705 L order by regist_day DESC limit 1";
$todoList_num_query = mysqli_query($con, $todoList_select);
$todoList_row = mysqli_fetch_assoc($todoList_num_query);
$todoList_num = $todoList_row["num"];

for ($i = 1; $i <= $max; $i++) {
    if (!isset($_POST[$i])) continue;
    $content = $_POST[$i];
    $todo_insert = "insert into todo_20160705 (content, list) values ( '$content', '$todoList_num')";
    $todo_query = mysqli_query($con, $todo_insert);
}
mysqli_close($con);

echo ("
    <script>
        location.href = 'mylist.php';
    </script>
    ");