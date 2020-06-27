<?php
include 'func.php';
session_start();

$con = connectDB();
$sql = "select id, count(num) as content, sum(likes) as likes, sum(complete) as complete from todoList_20160705 group by id order by complete desc";
$result = mysqli_query($con, $sql);
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

<body>
    <div class="wrapper">
        <header>
            <?php include "header.php"; ?>
        </header>

        <section class="middle">
            <div id="board_box">
                <ul id="ranking_list">
                    <li>
                        <span class="col1">순위</span>
                        <span class="col2">아이디</span>
                        <span class="col3">게시글 수</span>
                        <span class="col4">추천 수</span>
                        <span class="col5">완료 수</span>
                    </li>

                    <?php
                    $rank = 0;
                    while ($row = mysqli_fetch_array($result)) {
                        $rank += 1;
                        $id = $row["id"];
                        $total_content = $row["content"];
                        $total_likes = $row["likes"];
                        $total_complete = $row["complete"];

                    ?>
                    <li>
                        <span class="col1"><?= $rank ?></span>
                        <span class="col2"><?= $id ?></span>
                        <span class="col3"><?= $total_content ?></span>
                        <span class="col4"><?= $total_likes ?></span>
                        <span class="col5"><?= $total_complete ?></span>
                    </li>
                    <?php
                    }
                    mysqli_close($con);
                    ?>
                </ul>
            </div>

            <?php include "aside.php"; ?>
        </section>

        <footer class="footer">
            <?php include "footer.php"; ?>

        </footer>
    </div>
</body>

</html>