<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="./Css/style.css">
</head>
<body>
    <div class="wrapper fadeInDown">
  <div id="formContent">
    <!-- Icon -->
    <div class="fadeIn first">
      <img src="./src/login.png" id="icon" alt="User Icon" />
    </div>

    <!-- Login Form -->
    <form method="POST">
      <input type="text" id="login" class="fadeIn second" name="username" placeholder="login">
      <input type="text" id="password" class="fadeIn third" name="password" placeholder="password">
      <input type="submit" class="fadeIn fourth" value="Log In" name="submit">
    </form>

    <!-- Remind Passowrd -->
    <div id="formFooter">
      <a class="underlineHover" href="#">Forgot Password?</a>
    </div>

  </div>
</div>
</body>
</html>

<?php
        session_start();
      $conn_string = "host=localhost port=5432 dbname=BTL user=postgres password=geoserver";
      $dbconn = pg_connect($conn_string);

      if(isset($_POST['submit'])){
         $user = $_POST['username'];
         $pass = $_POST['password'];

         $query = "SELECT count(*) as total from _user where name='$user' and password='$pass'";
        $result=pg_query($dbconn,$query);
         $row = pg_fetch_array($result);

         if($row['total']>0){
             $_SESSION['user_name']=$user;
            header("Location: index.php");
         }else{
             echo "<script>alert('Kiểm tra lại thông tin đăng nhập')</script>";
         }
      }
?>