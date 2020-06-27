<section class="main">
    <ul>
        <?php
        //include 'func.php';
        if (isset($_GET["page"])) {
            $page = $_GET["page"];
        } else {
            $page = 1;
        }

        $con = connectDB();
        $sql = "select L.num, L.id, L.title from todoList_20160705 L
        order by L.regist_day limit  6";
        $list = mysqli_query($con, $sql);
        if (!$list) {
            echo "생성된 테이블이 없습니다.";
        } else {
            while ($list_row = mysqli_fetch_array($list)) {
                $num = $list_row["num"];
                $id = $list_row["id"];
                $title = $list_row["title"];

                $sql = "select T.content from todo_20160705 T 
                where T.list = $num limit 5";
                $todo = mysqli_query($con, $sql);
                echo "<li class='content'>";
                echo "<a class='id' href='board_view.php?num=$num'>$title</a>";
                echo "<ul class='todo'>";
                while ($todo_list = mysqli_fetch_array($todo)) {
                    $content = $todo_list["content"];
                    echo "<li>$content</li>";
                }
                echo "</ul></li>";
            }
        }
        mysqli_close($con);
        ?>
    </ul>
</section>