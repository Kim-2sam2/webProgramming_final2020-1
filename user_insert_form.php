<?php
include 'func.php';
session_start();
$userid = $_SESSION["userid"];
$username = $_SESSION["username"];
$con = connectDB();
$sql = "select * from user_20160705 where id='$userid'";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_array($result);

$password = $row["pass"];
$email = explode("@", $row["email"]);
$email1 = $email[0];
$email2 = $email[1];
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
    <link rel="stylesheet" type="text/css" href="css/user.css" />
    <link rel="stylesheet" type="text/css" href="css/aside.css" />
    <link href="https://fonts.googleapis.com/css2?family=Nanum+Gothic:wght@700&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/5e68c65b23.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="scripts/common.js"></script>
    <script type="text/javascript" src="scripts/user.js"></script>
</head>

<body>
    <div class="wrapper">
        <header>
            <?php include "header.php"; ?>
        </header>

        <section id='user_form'>
            <div id="info_box">
                <form method="POST" name="info_form" action="user_insert.php">
                    <h2>회원 가입</h2>
                    <div class="form id">
                        <div class="col1">아이디</div>
                        <div class="col2">
                            <input type="text" name="userid">
                        </div>
                        <div class='col3'>
                            <div style="cursor:pointer" onclick="check_id()">확인</div>
                        </div>
                    </div>
                    <div class="clear"></div>

                    <div class="form">
                        <div class="col1">비밀번호</div>
                        <div class="col2">
                            <input type="password" name="pass">
                        </div>
                    </div>

                    <div class="form">
                        <div class="col1">비밀번호 확인</div>
                        <div class="col2">
                            <input type="password" name="pass_confirm">
                        </div>
                    </div>
                    <div class="form">
                        <div class="col1">이름</div>
                        <div class="col2">
                            <input type="text" name="name">
                        </div>
                    </div>
                    <div class="form">
                        <div class="col1">이메일</div>
                        <div class="col2">
                            <input type="text" name="email1">@<input type="text" name="email2">
                        </div>
                    </div>
                    <div class="buttons">
                        <div style="cursor:pointer" onclick="check_input()">가입하기</div>
                        <div style="cursor:pointer" onclick="back_page()">뒤로가기</div>
                    </div>
                </form>

            </div>
        </section>

        <footer class="footer">
            <?php include "footer.php"; ?>

        </footer>
    </div>
</body>

</html>