<link rel="stylesheet" href="admin.css">


<?php // database connectivity
$db="sarkar";
$username="root";
$password="";
$server="localhost";


// $connect=mysqli_connect($username,$password,$server,$db);
$connect= mysqli_connect($server,$username,$password,$db);

?>

<h1>add admin</h1>
<form action="" method="post">
    <input type="text" placeholder="enter your full name" name="_name">
    <input type="text" placeholder="enter your username" name="_username">
    <input type="password" placeholder="enter your password" name="_pass">
   <input type="submit" name="_submit" value="submit">
</form>



<?php
// if($connect){
    // echo "thank you for feedback";
    error_reporting(0);
    if(isset($_POST['_submit']))
    {
    $first1=$_POST['_name'];
    $first2=$_POST['_username'];
    $first3=$_POST['_pass'];
    
    $insertquery="insert into admin(full_name,username,PASSWORD)values('$first1','$first2','$first3')";
    $result=mysqli_query($connect,$insertquery);
    }
    ?>
 

