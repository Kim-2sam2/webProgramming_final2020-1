<?php
//include 'func.php';
//session_start();
$con = connectDB();
$sql = "select * from todoList_20160705 where id = '$userid' order by regist_day DESC limit 1";
$result = mysqli_query($con, $sql);
$num_match = mysqli_num_rows($result);
$row = mysqli_fetch_array($result);

if ($num_match) {
    $list_num = $row["num"];

    $sql = "select T.content, T.finish, T.num, L.title, L.complete from todo_20160705 T
    inner join todoList_20160705 L on L.num = T.list
    where L.id = '$userid' and T.list = '$list_num'";
    $result = mysqli_query($con, $sql);

    $num_match = mysqli_num_rows($result);
    $todo = mysqli_fetch_array($result);
    $title = $todo['title'];
    echo ("
    <ul id='side_todo_list'>
        <div id='title'>
            $title
        </div>
    ");

    do {
        $content = $todo['content'];
        $fin = $todo['finish'];
        $num = $todo['num'];
        //echo ("<script> view_todo('$content', $fin, $num) </script>");
?>
<li>
    <form method="post" id=<?= $num ?> action="checked_db.php">
        <input type="hidden" name="checked" value=<?= $fin ?>>
        <input type="hidden" name="num" value=<?= $num ?>>
    </form>
    <?php
            if ($fin) {
            ?>
    <input class="side_check" type="checkbox" index=<?= $num ?> onclick="check_todo(this)" checked="checked">
    <div style="text-Decoration: line-through"><?= $content ?></div>
    <?php } else { ?>

    <input class="side_check" type="checkbox" index=<?= $num ?> onclick="check_todo(this)">
    <div><?= $content ?></div>
    <?php } ?>
</li>
<?php
    } while ($todo = mysqli_fetch_array($result));
    echo ("</ul>");
} else {
    echo ("
        <a href='mylist.php'>todo 추가하기</a>
    ");
}
mysqli_close($con);