<link rel="stylesheet" href="home.css">
<link rel="stylesheet" href="admin_button_css.css">
<style>
    body{
        background-color: #f1f2f6;
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
        <h1>manage category</h1>
        <br>
        <a href="add-category.php" class="btn-primary">add category</a>
        <br><br><br>
        <form action="" method="post">
            <table class="tbl-full">
                <tr>
                    <th>SN</th>
                    <th>title</th>
                    <th>image</th>
                    <th>featured</th>
                    <th>active</th>
                    <th>Actions</th>
                </tr>

                <?php
                include "upadminconnection.php";
                $insertquery = "SELECT * FROM tbl_category";
                $result = mysqli_query($connect, $insertquery);
                $count = mysqli_num_rows($result);
                $sn = 1;
                if ($count > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $id = $row['id'];
                        $title = $row['title'];
                        $image_name = $row['image_name'];
            
                        $featured = $row['featured'];
                        $active = $row['active'];

                ?>
                        <tr>
                            <td><?php echo $sn++; ?></td>
                            <td><?php echo $title; ?></td>
                            <td>

                                <?php
                                if ($image_name != "") {
                                ?>
                                <img src="images/<?php echo $image_name; ?> " id="cimage">

                                <?php
                                }else{
                                    echo "no image";
                                }

                                ?>

                            </td>
                            <td><?php echo $featured; ?></td>
                            <td><?php echo $active; ?></td>
                            <td> <a href="update category.php?id=<?php echo $id; ?>" class="btn-secondary">update category</a>
                                <a href="deletecategory.php?id=<?php echo $id; ?>&image_name=<?php echo $image_name; ?>" class="btn-target">delete category</a>
                            </td>

                        </tr>

                    <?php

                    }
                } else {
                    ?>
                    <tr>
                        <td colspan="6">
                            <div class="error">No Category Added</div>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </table>
        </form>
    </div>
</div>