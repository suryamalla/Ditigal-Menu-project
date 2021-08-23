<link rel="stylesheet" href="home.css">
<link rel="stylesheet" href="admin.css">
<link rel="stylesheet" href="admin_button_css.css">
<style>
    .t1 {
        height: auto;
        width: 100%;
        background-color: green;
    }
</style>

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




<link rel="stylesheet" href="admin.css">
<div class="main-container">
    <div class="wrapper">
        <h1>manage admin</h1>
        <br>
        <!-- <a href="add-admin.php" class="btn-primary">add admin</a> -->
        <br><br>
        <link rel="stylesheet" href="admin.css">

        <?php // database connectivity
        $db = "sarkar";
        $username = "root";
        $password = "";
        $server = "localhost";


        // $connect=mysqli_connect($username,$password,$server,$db);
        $connect = mysqli_connect($server, $username, $password, $db);

        ?>

        <h1>add admin</h1>
        <form action="" method="post">
            <input type="text" placeholder="enter your full name" name="_name">
            <input type="text" placeholder="enter your USERNAME" name="_username">
            <input type="password" placeholder="enter your PASSWORD" name="_pass">
            <input type="submit" name="_submit" value="submit" class="btn-secondary">
        </form>
        <br><br>


        <?php
        // if($connect){
        // echo "thank you for feedback";
        error_reporting(0);
        if (isset($_POST['_submit'])) {
            $first1 = $_POST['_name'];
            $first2 = $_POST['_username'];
            $first3 = $_POST['_pass'];

            $insertquery = "insert into admin(full_name,username,PASSWORD)values('$first1','$first2','$first3')";
            $result = mysqli_query($connect, $insertquery);
        }
        ?>





        <table class="tbl-full">
            <tr>
                <th>S.N. </th>
                <th>full name</th>
                <th>user name</th>
                <th>action</th>
            </tr>


            <?php
            $insertquery = "select * from admin";
            $result = mysqli_query($connect, $insertquery);
            $SN = 1;
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
            ?>

                    <div class="t1">
                        <tr>
                            <td><?php echo $SN;
                                $SN++ ?></td>
                            <td><?php echo $row['full_name']; ?> </td>
                            <td><?php echo $row['username']; ?></td>
                            <td>
                                <a href=" updatepass.php?id=<?php echo $row['id']; ?> " class="btn-secondary">change password</a>
                                <a href=" updateadmin.php?id=<?php echo $row['id']; ?> " class="btn-secondary">update admin</a>
                                <a href=" delete.php?id=<?php echo $row['id']; ?> " class="btn-target">delete admin</a>
                            </td>

                        </tr>

                    </div>

            <?php
                }
            }
            ?>
        </table>

    </div>
</div>