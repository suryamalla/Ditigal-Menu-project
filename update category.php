<link rel="stylesheet" href="admin_button_css.css">
<?php
include "upadminconnection.php";
?>
<div class="main-content">
    <div class="wrapper">
        <h1>update category</h1>
        <br><br>


        <?php

        if (isset($_GET['id'])) {

            $id = $_GET['id'];
            $sql = "SELECT * FROM tbl_category WHERE id=$id";

            $result = mysqli_query($connect, $sql);

            $count = mysqli_num_rows($result);
            if ($count) {
                $row = mysqli_fetch_assoc($result);
                $title = $row['title'];
                $current_image = $row['image_name'];
                $featured = $row['featured'];
                $active = $row['active'];
            } else {
                header('location:manage category.php');
            }
        } else {
            header('location:manage category.php');
        }

        ?>

        <form method="post" action="" enctype="multipart/form-data">
            <table class="tbl-30">
                <tr>
                    <td>title:</td>
                    <td>
                        <input type="text" name="title" value="<?php echo $title; ?>">
                    </td>
                </tr>
                <tr>
                    <td>current image:</td>
                    <td>
                        <?php
                        if ($current_image != "") {

                        ?>
                            <img src="images/<?php echo $current_image; ?>" width="150px" alt="">
                        <?php


                        } else {
                            echo "image is not added";
                        }
                        ?>
                    </td>
                </tr>

                <tr>
                    <td>new image:</td>
                    <td>
                        <input type="file" name="image">
                    </td>
                </tr>

                <tr>
                    <td>featured:</td>
                    <td>
                        <input <?php if ($featured == "yes") {
                                    echo "checked";
                                } ?> type="radio" name="featured" value="yes">yes
                        <input <?php if ($featured == "no") {
                                    echo "checked";
                                } ?> type="radio" name="featured" value="no">no
                    </td>
                </tr>
                <tr>
                    <td>Active:</td>
                    <td>
                        <input <?php if ($active == "yes") {
                                    echo "checked";
                                } ?> type="radio" name="active" value="yes">yes
                        <input <?php if ($active == "no") {
                                    echo "checked";
                                } ?> type="radio" name="active" value="no">no
                    </td>
                </tr>

                <tr>
                    <td> <input type="hidden" name="current_image" value="<?php echo $current_image; ?>">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">

                        <input type="submit" name="submit" value="update category" class="btn-secondary">
                    </td>
                </tr>

            </table>
        </form>

        <?php
        if (isset($_POST['submit'])) {
            $id = $_POST['id'];
            $title = $_POST['title'];
            $current_image = $_POST['current_image'];
            $featured = $_POST['featured'];
            $active = $_POST['active'];

            if (isset($_FILES['image']['name'])) {

                $image_name = $_FILES['image']['name'];

                if ($image_name != "") {

                    $image_name = $_FILES['image']['name'];
                    $source_path = $_FILES['image']['tmp_name'];

                    $destination_path = "images/" . $image_name;
                    $upload = move_uploaded_file($source_path, $destination_path);
                    $remove =  unlink("images/" . $current_image);
                } else {
                    $image_name = $current_image;
                }
            } else {
                $image_name = $current_image;
            }
            $sql2 = "UPDATE tbl_category SET
    title='$title',
    image_name='$image_name',
    featured='$featured',
    active='$active'
    WHERE id=$id
    ";
            $res2 = mysqli_query($connect, $sql2);
            if ($res2 == true) {
                // echo "updated";
                header('location:manage category.php');
            }
        }
        ?>

    </div>
</div>