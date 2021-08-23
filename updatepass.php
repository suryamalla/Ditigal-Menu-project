<?php

include("upadminconnection.php");

?>

<h1>change password</h1>

<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
}
?>

<form action="" method="post">
    <table class="tbl-30">
        <tr>

            <td>current password:</td>
            <td>
                <input type="password" name="current_password" placeholder="current password">
            </td>
        </tr>
        <tr>
            <td>new password:</td>
            <td>
                <input type="password" name="new_password" placeholder="new  password">
            </td>
        </tr>

        <tr>
            <td>confirm password:</td>
            <td>
                <input type="password" name="confirm_password" placeholder="confirm password">
            </td>
        </tr>

        </tr>

        <tr>
            <td cplspan="2">
                <input type="hidden" name="id" value=" <?php echo $id;  ?>">
                <input type="submit" name="submit" value="change password">
            </td>
        </tr>
    </table>
</form>

<?php

if (isset($_POST['submit'])) {
    // 1. get the data from form
    $id = $_POST['id'];
    $current_password =$_POST['current_password'];
    $new_password =$_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];
    // 2. check whether the user with current id and current password exist or not
     
$insertquery="SELECT * FROM admin where id=$id and PASSWORD='$current_password'";
// execute query
$result=mysqli_query($connect,$insertquery);

if($result==TRUE){
$count=mysqli_num_rows($result);

if($count){
// user exists and password can be changed
// echo "user found";
 
if($new_password==$confirm_password){
     
    $insertquery="UPDATE admin set
      PASSWORD ='$new_password'
      where id=$id
      ";
      
      $result=mysqli_query($connect,$insertquery);
      if($result==TRUE){
          echo "execute";
      }else{
        echo " not execute";
    }
      
}else{
    echo "confirm pass is incorrect";
}

}else{
// user does not exost set message and redirect
echo "user not found";
}

}
    
}


?>