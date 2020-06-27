<?php
session_start()
?>
<div id="board_box">
    <ul id="board_list">
        <li>
            <span class="col1">번호</span>
            <span class="col2">제목</span>
            <span class="col3">작성자</span>
            <span class="col4">작성일</span>
            <span class="col5">조회수</span>
            <span class="col5">추천수</span>
        </li>
        <?php
        if (isset($_GET["page"])) {
            $page = $_GET["page"];
        } else {
            $page = 1;
        }

        $con = connectDB();
        $sql = "select * from todoList_20160705 order by num desc";
        $result = mysqli_query($con, $sql);
        $total_record = mysqli_num_rows($result);

        $scale = 10;

        if ($total_record % $scale == 0) {
            $total_page = floor($total_record / $scale);
        } else {
            $total_page = floor($total_record / $scale) + 1;
        }

        $start = ($page - 1) * $scale;
        $number = $total_record - $start;

        for ($i = $start; $i < $start + $scale && $i < $total_record; $i++) {
            mysqli_data_seek($result, $i);
            $row = mysqli_fetch_array($result);

            $num = $row["num"];
            $title = $row["title"];
            $id = $row["id"];
            $regist_day = $row["regist_day"];
            $view = $row["view"];
            $likes = $row["likes"];
            echo ("
            <li>
                <span class='col1'>$num</span>
                <span class='col2'>
                    <a href='board_view.php?num=$num&page=$page'>$title</a>
                </span>
                <span class='col3'>$id</span>
                <span class='col4'>$regist_day</span>
                <span class='col5'>$view</span>
                <span class='col5'>$likes</span>
            ");
            $number--;
        }
        mysqli_close($con);
        ?>
    </ul>

    <ul id="page_num">
        <?php
        if ($total_page >= 2 && $page >= 2) {
            $new_page = $page - 1;
            echo ("<li><a href='board.php?page=$new_page'>◀ 이전</a></li>");
        } else {
            echo ("<li>&nbsp</li>");
        }
        for ($i = 1; $i <= $total_page; $i++) {
            if ($page == $i) {
                echo "<li><b> $i </b></li>";
            } else {
                echo "<li><a href='board.php?page=$i'> $i </a><li>";
            }
        }
        if ($total_page >= 2 && $page != $total_page) {
            $new_page = $page + 1;
            echo "<li> <a href='board.php?page=$new_page'>다음 ▶</a> </li>";
        } else
            echo "<li>&nbsp</li>";
        ?>
    </ul>
</div>