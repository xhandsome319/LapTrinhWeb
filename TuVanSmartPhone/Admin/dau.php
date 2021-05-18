<?php 
session_start();
?>

<!DOCTYPE html>
<html lang="vi">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Shop TNT</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../css/shop-homepage.css" rel="stylesheet">
    <link href="../css/test.css" rel="stylesheet">
    <script src="../vendor/jquery/jquery.min.js"></script>

</head>

<body>
    <body>
        <?php
        include '../ketnoi.php';
      //  include '../function.php';
       
         if( $_SESSION['maquyen'] == 1 )
         header("Location: ../index.php"); 

        if (!empty($_SESSION['dangnhapthanhcong'])) { //Kiểm tra xem đã đăng nhập chưa?
            ?>
          
            
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
                    <div class="container">
                        <a class="navbar-brand" href="#">Shop TNT</a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
                            aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarResponsive">
                            <ul class="navbar-nav ml-auto">
                                <li class="nav-item active">
                                    <a class="nav-link" href="../index.php">Trang chủ
                                        <span class="sr-only">(current)</span>
                                    </a>
                                </li>
                               
                                <li class="nav-item">
                                    <a class="nav-link" href="dangxuat.php"> Đăng xuất </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>


    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <div class="col-lg-3">

                <h1 class="my-4">Hậu Tài Tư Vấn SmartPhone</h1>


                <div class="list-group">
                    <button type="button" class="list-group-item list-group-item-action active" disabled>Quản trị </button>
                    <button type="button" class="list-group-item list-group-item-action" ><a href="hienthi.php " class="nav-link">Quản lý sản phẩm</a></button>
                    <button type="button" class="list-group-item list-group-item-action" ><a href="taikhoan.php" class="nav-link">Quản lý tài khoản</a></button>
                ss
                </div>

            </div>


                <?php } ?>