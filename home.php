<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- <link rel="stylesheet" href="home.css"> -->
    <link rel="stylesheet" href="admin.css">
</head>
 
<body>
    <header>
        <div class="logo">
        <img src="images/coffee.jpg" alt="cafe" id="logo">
        </div>
        <div class="nav">
            <div class="menu">
                <ul>
                    <a href="home.php" id="h1">Home</a>
                    <a href="manage admin.php" id="h1">Admin</a>
                    <a href="manage category.php" id="h1">category</a>
                    <a href="food.php" id="h1">food</a>
                    <a href="foodorder.php" id="h1">order</a>
                    <a href="about.php" id="h1">logout</a>
                </ul>
            </div>

        </div>

    </header>
    <div class="blank" style="height: 150px;">

    </div>
    <!-- footer -->
    <h2>DASHBOARD</h2>
    <div class="main-content">
        <?php
        include 'upadminconnection.php';

        $sql = "SELECT * FROM tbl_category";
        $res = mysqli_query($connect, $sql);
        $count = mysqli_num_rows($res);


        ?>
        <div class="col-4">
            <h1 style="display:flex; justify-content:center"><?php echo $count; ?></h1>
            <br />
            <h4 style="display:flex;justify-content:center;">categories</h4>
        </div>

        <div class="col-4">
            <?php
            include 'upadminconnection.php';

            $sql = "SELECT * FROM tbl_food";
            $res = mysqli_query($connect, $sql);
            $count = mysqli_num_rows($res);
            ?>
            <h1 style="display:flex; justify-content:center"><?php echo $count; ?></h1>
            <br />
            <h4 style="display:flex;justify-content:center;">foods</h4>
        </div>

        <div class="col-4">
            <?php

            include 'upadminconnection.php';
            $sql = "SELECT * FROM tbl_order";
            $res = mysqli_query($connect, $sql);
            $count = mysqli_num_rows($res);
            ?>

            <h1 style="display:flex; justify-content:center"><?php echo $count; ?></h1>
            <br />
            <h4 style="display:flex;justify-content:center;">Total orders</h4>
        </div>

        <div class="col-4">

            <?php
            include 'upadminconnection.php';
            $sql = "SELECT sum(total) AS total FROM tbl_order WHERE status='delivered'";
            $res = mysqli_query($connect, $sql);
            $count = mysqli_fetch_assoc($res);
            $total_revenue = $count['total'];
            ?>

            <h1 style="display:flex; justify-content:center">Rs.<?php echo $total_revenue; ?></h1>
            <br />
            <h4 style="display:flex;justify-content:center;">Revenue Generated</h4>
        </div>

        <div class="col-4">
            <?php
            include 'upadminconnection.php';
            $sql2 = "SELECT * FROM notification WHERE status='unread'";
            $res2= mysqli_query($connect, $sql2);
            $count3 = mysqli_num_rows($res2);

            ?>

            <h1 style="display:flex; justify-content:center"><?php echo $count3; ?></h1>
            <br />
            <a href="notification.php" style="text-decoration: none;">
                <h4 style="display:flex;justify-content:center;">Unread</h4>
                <h4 style="display:flex;justify-content:center;">Notifications</h4>
            </a>
        </div>

    </div>
    <div class="footer">
        <div class="wrapper">
            <p>2021 all rights reserved some restaurant.develop by surya malla </p>
        </div>
    </div>
</body>

</html>

<link rel="stylesheet" href="home.css">