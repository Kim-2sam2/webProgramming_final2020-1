<?php
include 'func.php';
session_start();
$list_index = $_GET["num"];
if (isset($_GET["page"])) {
    $page = $_GET["page"];
} else {
    $page = 1;
}
$con = connectDB();
$sql = "select *, T.num as todo_index, L.num as todoList_index from todo_20160705 T
        inner join todoList_20160705 L on L.num = T.list
        where L.num = $list_index";
$result = mysqli_query($con, $sql);

$row = mysqli_fetch_array($result);
$userid = $row["id"];
$regist_day = $row["regist_day"];
$title = $row["title"];
$view = $row["view"];
$new_view = $view + 1;
$likes = $row["likes"];
$sql = "update todoList_20160705 set view=$new_view where num=$list_index";
mysqli_query($con, $sql);
mysqli_close($con);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>20160705</title>
    <link rel="stylesheet" type="text/css" href="css/style.css" />
    <link rel="stylesheet" type="text/css" href="css/header.css" />
    <link rel="stylesheet" type="text/css" href="css/board.css" />
    <link rel="stylesheet" type="text/css" href="css/aside.css" />
    <link href="https://fonts.googleapis.com/css2?family=Nanum+Gothic:wght@700&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/5e68c65b23.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="scripts/common.js"></script>
    <script type="text/javascript" src="scripts/mylist.js"></script>
</head>
<style>
form {
    display: none;
}
</style>

<body>
    <div class="wrapper">
        <header>
            <?php include "header.php"; ?>
        </header>

        <section class="middle">
            <div id="board_box">
                <ul id='viewer'>
                    <li>
                        <div id='top'>
                            <span class="col1">제목 : <?= $title ?></span>
                            <span class="col2">작성자 : <?= $userid ?></span>
                            <span class="col2">조회수 : <?= $new_view ?> | 추천수 : <?= $likes ?> | </span>
                        </div>
                    </li>

                    <li id="content">
                        <ul>
                            <?php

                            if ($userid == $_SESSION["userid"]) {

                                do {
                                    $content = $row["content"];
                                    $finish = $row["finish"];
                                    $todo_index = $row["todo_index"];
                                    echo ('<li>');
                                    echo ("<form method=post id=$todo_index action=checked_db.php?list=$list_index>");
                                    echo ("<input type='hidden' name='checked' value=$finish></input>");
                                    echo ("<input type='hidden' name='num' value=$todo_index></input>");
                                    echo ("<input type='hidden' name='url' value='board_view.php?num=$list_index&page=$page'></input>");
                                    echo ("</form>");

                                    if ($finish) {
                                        echo ("<input type='checkbox' checked='checked' index='$todo_index' onclick='check_todo(this)'>");
                                        echo ("<div style='text-Decoration: line-through'>$content</div>");
                                    } else {
                                        echo ("<input type='checkbox' index='$todo_index' onclick='check_todo(this)'>");
                                        echo ("<div>$content</div>");
                                    }
                                    echo ('</li>');
                                } while ($row = mysqli_fetch_array($result));
                            } else {
                                do {
                                    $content = $row["content"];
                                    $finish = $row["finish"];
                                    if ($finish) {
                                        echo ("<li><span style='text-Decoration: line-through'>$content<span></li>");
                                    } else {
                                        echo ("<li><span>$content<span></li>");
                                    }
                                } while ($row = mysqli_fetch_array($result));
                            }
                            ?>
                        </ul>
                    </li>
                </ul>
                <ul class="buttons">
                    <?php
                    if ($userid == $_SESSION["userid"]) {
                        echo ("
                            <li>
                                <div onclick=locate('mylist_delete.php?num=$list_index&userid=$userid')>게시글삭제</div>
                            </li>
                            <li>
                                <div onclick = locate('mylist.php')>내 목록</div>
                            </li>
                            <li>
                                <div onclick = locate('board.php?page=$page')>목록</div>
                            </li>
                        ");
                    } else {
                        echo ("
                            <li>
                                <div onclick=locate('board_likes.php?num=$list_index')>추천</div>
                            </li>
                            <li>
                                <div onclick= locate('board.php?page=$page')>목록</div>
                            </li>
                        ");
                    }
                    ?>

                </ul>
            </div>

            <?php include "aside.php" ?>
        </section>

        <footer class="footer">
            <?php include "footer.php" ?>
        </footer>
    </div>
</body>

</html>