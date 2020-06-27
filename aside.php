<?php
session_start();
if (isset($_SESSION["userid"])) $userid = $_SESSION["userid"];
else $userid = "";
if (isset($_SESSION["username"])) $username = $_SESSION["username"];
else $username = "";
if (isset($_SESSION["admin"])) $admin = $_SESSION["admin"];
else $admin = 0;
?>

<section class="aside">
    <div>
        <div id="login_box">
            <?php if (!$userid) { ?>
            <div class="user_login">
                <form name="login" method="post" action="user_login.php">
                    <input type="text" name="id" class="id" placeholder="아이디" />
                    <input type="password" name="pass" class="pw" placeholder="비밀번호" />
                    <input type="submit" class="login" value="로그인" />
                </form>
                <input type="button" class="signup" value="회원 가입" onclick="locate('user_insert_form.php')" />
            </div>
            <?php } else {
                $info = $username . "님 반갑습니다.";
            ?>

            <?php if ($admin) { ?>
            <div>
                <input type="button" value="관리자모드" onclick="locate('admin.php')" />
            </div>
            <div class="logout">
                <input type="button" value="로그아웃" onclick="locate('user_logout.php')" />
            </div>
            <?php } else { ?>
            <div class="user_info">
                <p><?= $info ?></p>
                <div class="update">
                    <input type="button" value="정보수정" onclick="locate('user_info.php')" />
                </div>
                <div class="logout">
                    <input type="button" value="로그아웃" onclick="locate('user_logout.php')" />
                </div>
            </div>
        </div>
        <?php } ?>

        <?php if (!$admin) { ?>
        <div class="sidebar">
            <?php include "aside_sidebar.php" ?>
        </div>
        <?php } ?>
        <?php } ?>

    </div>
</section>