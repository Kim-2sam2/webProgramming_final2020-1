<?php
include 'func.php';
session_start();
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
            <?php include "board_box.php"; ?>

            <?php include "aside.php" ?>
        </section>

        <footer class="footer">
            <?php include "footer.php" ?>
        </footer>
    </div>
</body>

</html>