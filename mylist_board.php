<div class="myBoard">
    <div class="myBoard_list">
        <?php
        $con = connectDB();
        $sql = "select L.title, L.num from todoList_20160705 L where L.id = '$userid'";
        $title_query = mysqli_query($con, $sql);
        $test = mysqli_num_rows($title_query);

        while ($title_arr = mysqli_fetch_array($title_query)) {
            $list_index = $title_arr['num'];
            $title = $title_arr['title'];

            echo ("
                <div class='col' onclick=locate('board_view.php?num=$list_index')>
                $title
                </div>                
            ");
        }
        ?>
    </div>

    <div class="viewer">
        <!--default view-->
        <form class="insert_view" name="insert_list" method="post" action="mylist_insert.php">
            <div class="input_form">
                <input type="text" name="title" class="title" placeholder="제목" />
                <input type="text" class="todo" placeholder="할 일" />
                <div id="button_div">
                    <button type="button" class="add" onclick="addList()">
                        ADD
                    </button>
                </div>
            </div>
            <div class="insert_form">
                <input type="hidden" id="max" name="max"></input>
                <ul class="myList" index="0">

                </ul>
                <div id="button_div">
                    <input type="submit" value="저장" />
                </div>
            </div>
        </form>
    </div>

</div>
<?php mysqli_close($con); ?>