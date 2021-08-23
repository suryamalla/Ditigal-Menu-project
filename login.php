<html>

<head>
    <style>
         .login{
             text-align: center;
         }
    </style>
<title>login-digital menu</title>
<link rel="stylesheet" href="admin.css">
</head>
<body>
    <div class="login">
    <h1>login</h1>
    <form action="" method="POST">
    username:
    <input type="text" placeholder="enter the username" name="username"><br><br>
    password:
    <input type="password" placeholder="enter the password" name="password"><br><br>
    <input type="submit" name="submit">
    </form>

    <?php
    include 'upadminconnection.php';
   
    // if($connect){
        // echo "thank you for feedback";
        error_reporting(0);
        if(isset($_POST['submit']))
        {
        $first1=mysqli_real_escape_string($connect,$_POST['username']) ;
        $first2=mysqli_real_escape_string($connect,$_POST['password']) ;
         
        $insertquery="SELECT * from admin where username='$first1' AND PASSWORD='$first2'";
        $result=mysqli_query($connect,$insertquery);
      $count=mysqli_num_rows($result);
      
        if($count==1){
            ?>
            <h1>confirm you are admin:</h1>
                <a href="home.php">enter</a> <br>
          <?php
        }
        else
        {
            ?>
             <h1>sorry username or password did not match:</h1>
            <a href="login.php">again</a>
            <br><br>
            <a href="about.php">exit</a>
            <?php
        }
    }
    ?>

    <p>created by -<a href="https://www.facebook.com/surya.malla.5648">surya malla</a> </p>
    </div>
</body>
</html>