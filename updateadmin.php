<?php
include 'upadminconnection.php';
?>
<div class="main-content">
    <div class="wrapper">
        <h1>update</h1>
    </div>

</div>


<?php
$id = $_GET['id'];
$insertquery = "SELECT * from admin";
$result = mysqli_query($connect, $insertquery);

if ($result == TRUE) {
    $count = mysqli_num_rows($result);

    if ($count) {
        $row = mysqli_fetch_assoc($result);
        $full_name = $row['full_name'];
        $username = $row['username'];
    } else {

        // header('location:' . "admin not available" .'index.php');
        echo "admin not available";
    }
}

?>
<form action="" method="post">
    <table class="tbl-30">
        <tr>

            <td>Full name:</td>
            <td>
                <input type="text" name="full_name" value="<?php echo $full_name; ?>">
            </td>
        </tr>

        <tr>
            <td>username</td>
            <td>
                <input type="text" name="username" value="<?php echo $username; ?>">
            </td>
        </tr>

        <tr>
            <td cplspan="2">
                <!-- <input type="text" name="id" value=" php echo $id;  "> -->
                <input type="submit" name="submit" value="update admin">
            </td>
        </tr>
    </table>
</form>

<?php
if (isset($_POST['submit'])) {
    //    echo $id=$_POST['id'];
    $full_name = $_POST['full_name'];
    $username = $_POST['username'];

    $insertquery = "UPDATE admin set 
    full_name='$full_name',
    username='$username'
    where id='$id'
     ";
    $result = mysqli_query($connect, $insertquery);
}
?>