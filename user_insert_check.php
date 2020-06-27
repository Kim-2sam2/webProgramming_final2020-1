<!DOCTYPE html>

<head>
    <meta charset="utf-8">
    <link href="https://fonts.googleapis.com/css2?family=Nanum+Gothic:wght@700&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/5e68c65b23.js" crossorigin="anonymous"></script>
    <style>
    h3 {
        padding-left: 5px;
        border-left: solid 5px #edbf07;
    }

    #close {
        width: 40px;
        height: 15px;
        padding: 5px 10px;
        text-align: center;
        line-height: 15px;
        vertical-align: middle;
        cursor: pointer;
        background: white;
        border: 3px solid black;
        border-radius: 6px;
    }
    </style>
</head>

<body>
    <h3>아이디 중복체크</h3>
    <p>
        <?php
        include 'func.php';
        $userid = $_GET["userid"];

        if (!$userid) {
            echo ("<li>아이디를 입력해 주세요!</li>");
        } else {
            $con = connectDB();

            $sql = "select id from user_20160705 where id='$userid'";
            $result = mysqli_query($con, $sql);

            $num_record = mysqli_num_rows($result);

            if ($num_record) {
                echo "<li>" . $userid . " 아이디는 중복됩니다.</li>";
                echo "<li>다른 아이디를 사용해 주세요!</li>";
            } else {
                echo "<li>" . $userid . " 아이디는 사용 가능합니다.</li>";
            }
            mysqli_close($con);
        }
        ?>
    </p>
    <div id="close" onclick="javascript:self.close()">
        닫기
    </div>

</body>

</html>