<?php
ob_start();
session_start();
require "database/cong.php";
require "database/congduoide.php";
require "database/de.php";
require "database/nmns.php";
require "database/trambom.php";
require "database/diemnhanthai.php";
require "database/diemxathai.php";
require "database/kenh.php";


if (isset($_GET['typeSearch'])) {
    $typeSearch = $_GET['typeSearch'];
} else {
    $typeSearch = "cong";
}

if (isset($_POST['b-search'])) {
    $key = $_POST['key-search'];
    switch ($typeSearch) {

        case "cong":
            $result = searchByCong($key);
            break;
        case "trambom":
            $result = searchByTramBom($key);
            break;
        case "nmns":
            $result = searchByNmn($key);
            break;
        case "diennhanthai":
            $result = searchByDiemNhanThai($key);
            break;
        case "diemxathai":
            $result = searchByDiemXaThai($key);
            break;
        default:
    }
}
// echo basename($_SERVER['PHP_SELF']);
// if(!isset($_GET["tabdt"])){

// }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous" />
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A==" crossorigin="" />
    <!-- Make sure you put this AFTER Leaflet's CSS -->
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js" integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA==" crossorigin=""></script>
    <link rel="stylesheet" href="style.css" />
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>

    <title>Document</title>
</head>

<body>
    <div style="display: flex; flex-direction: column;height: 100%;">


        <div style="width: 100%;">
            <nav class="navbar navbar-expand-lg navbar-light bg-primary">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
                    <a class="navbar-brand text-light t-title" href="index.php">
                        <h4>V??nh B???o</h4>
                    </a>
                    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                        <li class="nav-item active">
                            <a class="nav-link text-light" href="gioithieu.php">Gi???i thi???u</a>
                        </li>
                        <?php
                        if (isset($_SESSION['user'])) {
                        ?>
                            <li disable class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle text-light" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    D??? li???u
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="tabCong.php">C???ng</a>
                                    <a class="dropdown-item" href="tabTramBom.php">Tr???m b??m</a>
                                    <a class="dropdown-item" href="tabKenh.php">K??nh</a>
                                    <a class="dropdown-item" href="tabNMNS.php">Nh?? m??y n?????c s???ch</a>
                                    <a class="dropdown-item" href="tabDiemNhanThai.php">??i???m nh???n th???i</a>
                                    <a class="dropdown-item" href="tabDiemXaThai.php">??i???m x??? th???i</a>
                                </div>
                            </li>

                            <li disable class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle text-light" href="#" id="navThongKe" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Th??ng k??
                                </a>
                                <div class="dropdown-menu " aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="tabthongkeCongTrinh.php">S??? l?????ng c??ng tr??nh</a>
                                    <div class="parent_menu dropdown-item">
                                        <a  href="#">T??nh tr???ng c??ng tr??nh <i class="fas fa-angle-right pl-3"></i></a>
                                        <ul class="submenu px-3">
                                            <li class="py-2"><a href="tabthongkeCong.php"> C???ng</a></li>
                                            <li class="py-2"><a href="tabthongkeCongduoide.php"> C???ng D?????i ????</a></li>
                                            <li class="py-2"><a href="tabThongKeTramBom.php"> Tr???m b??m</a></li>
                                            <li class="py-2"><a href="tabThongKeNMNS.php"> Nh?? m??y n?????c s???ch</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </li>
                        <?php
                        }
                        ?>
                    </ul>
                    <?php
                    if (basename($_SERVER['PHP_SELF']) == "index.php") {
                    ?>
                        <form action="index.php?typeSearch=<?php echo $typeSearch ?>" method="post" class="form-inline my-2 my-lg-0">
                            <div class="inner-addon left-addon">
                                <i class="glyphicon fas fa-search"></i>
                                <input value="<?php echo isset($key) ? $key : "" ?>" name="key-search" required placeholder="nh???p t??? kh??a" type="text" class="form-control input-search" />
                            </div>

                            <button class="btn btn-search my-2 my-sm-0" name="b-search">
                                T??m ki???m
                            </button>
                            <div class="dropdown show">
                                <a style="background-color: #FF7043; border-top-left-radius:0px ;" class="btn" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i style="color:white;" class="fas fa-cog"></i>
                                </a>

                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                    <a class="dropdown-item <?php echo $typeSearch == "cong" ?  "active" : "" ?>" href="index.php?typeSearch=cong">C???ng</a>
                                    <a class="dropdown-item <?php echo $typeSearch == "trambom" ?  "active" : "" ?> " href="index.php?typeSearch=trambom">Tr???m b??m</a>
                                    <a class="dropdown-item <?php echo $typeSearch == "nmns" ?  "active" : "" ?>" href="index.php?typeSearch=nmns">Nh?? m??y n?????c s???ch</a>
                                    <a class="dropdown-item  <?php echo $typeSearch == "diennhanthai" ?  "active" : "" ?>" href="index.php?typeSearch=diennhanthai">??i???m Nh???n Th???i</a>
                                    <a class="dropdown-item <?php echo $typeSearch == "diemxathai" ?  "active" : "" ?> " href="index.php?typeSearch=diemxathai">??i???m x??? th???i</a>
                                </div>
                            </div>
                        </form>
                    <?php
                    }
                    ?>

                    <?php
                    if (isset($_SESSION['user'])) {
                    ?>
                        <div class="mx-3 d-flex flex-row">
                            <span class="text-light">Xin Ch??o, <b class="text-light"><?php echo $_SESSION['user']["name"] ?></b></span>
                            <a data-toggle="modal" data-target="#confirmLogout" href="javascript;">
                                <i style="font-size: 20px;" class="fas fa-sign-out-alt text-light mx-3"></i>
                            </a>
                        </div>

                    <?php
                    } else {
                    ?>
                        <a href="login.php">
                            <i class="fas fa-sign-in-alt text-light mx-5">
                                <span class="t-login">Login</span></i>
                        </a>
                    <?php
                    }
                    ?>

                </div>
            </nav>
            <div class="modal fade" id="confirmLogout" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Th??ng b??o</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            B???n c?? ch???c ch???n mu???n ????ng xu???t kh??ng ????
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Kh??ng</button>
                            <a href="logout.php" class="btn btn-primary">C??</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>