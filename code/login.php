<?php
ob_start();
session_start();
require("conn.php");
$isLogin = true;
if (isset($_POST["login"])) {

  $username = $_POST["username"];
  $password = $_POST['password'];
  $sql = "SELECT * FROM tb_user WHERE username = '$username' AND password = '$password' ";
  // echo $sql;
  $reuslt = pg_query($dbconn, $sql);
  $count = pg_num_rows($reuslt);
  $user = pg_fetch_assoc($reuslt);
  if ($count > 0) {
    $isLogin = true;
    $_SESSION['user'] = $user;
    // print_r($_SESSION['user']);
    header("location:index.php");
  } else {
    $isLogin = false;
  }
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Login Template</title>
  <link href="https://fonts.googleapis.com/css?family=Karla:400,700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.8.95/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/css/login.css">
</head>

<body>
  <main class="d-flex align-items-center min-vh-100 py-3 py-md-0">
    <div class="container">
      <div class="card login-card">
        <div class="row no-gutters">
          <div class="col-md-5">
            <img src="img/unnamed.jpg" alt="login" class="login-card-img">
          </div>
          <div class="col-md-7">
            <div class="card-body">
              <div class="brand-wrapper">
                <img src="img/logo.png" alt="logo">
              </div>
              <p class="login-card-description">Đăng nhập</p>
              <form method="POST">
                <div class="form-group">
                  <label for="email" class="sr-only">Email</label>
                  <input required type="text" name="username" id="email" class="form-control" placeholder="Tài khoản">
                </div>
                <div class="form-group mb-4">
                  <label for="password" class="sr-only">Password</label>
                  <input required type="password" name="password" id="password" class="form-control" placeholder="mật khẩu">
                </div>
                <input name="login" id="login" class="btn btn-block login-btn mb-4" type="submit" value="Login">
                <a href="index.php" class="btn btn-light btn-block">Trang chủ</a>
              </form>


            </div>
          </div>
        </div>
      </div>

      <div class="modal show" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Thông báo</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              Tài khoản không hợp lệ!
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">OK</button>
             
            </div>
          </div>
        </div>
      </div>

    </div>
  </main>
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  <?php if (!$isLogin) { ?>
    <script type="text/javascript">
      $(function() {

        $('#exampleModal').modal('show');

      });
    </script>
  <?php } ?>
</body>

</html>