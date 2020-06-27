<?php
include 'func.php';
session_start();

$con = connectDB();
$sql = "select * from user_20160705";
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
    <link rel="stylesheet" type="text/css" href="css/admin.css" />
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
            <div id="admin_box">

                <h3>회원관리</h3>
                <ul id="member_list">
                    <li>
                        <span class="col1">아이디</span>
                        <span class="col2">이름</span>
                        <span class="col3">이메일</span>
                        <span class="col4">삭제</span>
                    </li>
                    <?php
                    $total = mysqli_num_rows($result);
                    while ($row = mysqli_fetch_array($result)) {
                        $userid = $row["id"];
                        $username = $row["name"];
                        $email = $row["email"];
                        $admin = $row["admin"];
                        if ($admin) continue;
                    ?>
                    <li>
                        <span class="col1"><?= $userid ?></span>
                        <span class="col2"><?= $username ?></span>
                        <span class="col3"><?= $email ?></span>
                        <span class="col4"><button type="button"
                                onclick="location.href='admin_delete_user.php?userid=<?= $userid ?>'">삭제</button></span>
                    </li>
                    <?php } ?>
                </ul>

                <h3>게시판 관리</h3>
                <ul id="board_list">
                    <li>
                        <span class="col1">선택</span>
                        <span class="col2">번호</span>
                        <span class="col3">이름</span>
                        <span class="col4">제목</span>
                        <span class="col5">작성일</span>
                        <span class="col6">조회수</span>
                    </li>

                    <?php
                    $sql = "select * from todoList_20160705";
                    $result = mysqli_query($con, $sql);
                    while ($row = mysqli_fetch_array($result)) {
                        $num = $row["num"];
                        $userid = $row["id"];
                        $title = $row["title"];
                        $regist_day = $row["regist_day"];
                        $view = $row["view"];
                    ?>
                    <form method="post" action="admin_delete_board.php">
                        <li>
                            <span class="col1"><input type="checkbox" name="item[]" value="<?= $num ?>"></span>
                            <span class="col2"><?= $num ?></span>
                            <span class="col3"><?= $userid ?></span>
                            <span class="col4"><?= $title ?></span>
                            <span class="col5"><?= $regist_day ?></span>
                            <span class="col6"><?= $view ?></span>
                        </li>
                        <?php
                    }
                    mysqli_close($con);
                        ?>
                        <button type="submit">선택된 글 삭제</button>
                    </form>
                </ul>
            </div>
        </section>
        <footer class="footer">
            <?php include "footer.php"; ?>
        </footer>
    </div>
</body>

</html>