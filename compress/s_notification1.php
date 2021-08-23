<html>

<head>
    <style>
         .login{
             text-align: center;
         }
    </style>
<title>Send requirements</title>
<link rel="stylesheet" href="admin.css">
</head>
<body>
    <?php
     include '../upadminconnection.php';
    
     $sql="SELECT * FROM tbl_order";
$res=mysqli_query($connect,$sql);
$count=mysqli_num_rows($res);
if($count>0){
while($row=mysqli_fetch_assoc($res)){
     
    $table_id=$row['table_id'];
}
}
    ?>
             
    <div class="login">
    <h1>Messege</h1>
    <form action="" method="POST">
    Table No.:
    <input type="text" value=" Enter table name" name="table_id"><br><br>
    Messege:
    <input type="hidden" value="want bill" name="message"><br><br>
    <input type="submit" name="submit">
    </form>

    <?php
   
   
    // if($connect){
        // echo "thank you for feedback";
        error_reporting(0);
        if(isset($_POST['submit']))
        {
        $first1=$_POST['table_id'];
        $first2=$_POST['message'];
         $first3="unread";
        $insertquery="INSERT INTO notification (table_id,message,status)values('$first1','$first2','$first3')";
        $result=mysqli_query($connect,$insertquery);
        if($result==true){
            header('location:../index.php');
        }else{
            echo "messege can't send";
        }
    }
    ?>

    <p>created by -<a href="https://www.facebook.com/surya.malla.5648">surya malla</a> </p>
    </div>
</body>
</html>