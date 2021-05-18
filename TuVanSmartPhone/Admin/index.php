<?php 
session_start();
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="dangnhap.css">
    <title>Đăng nhập</title>
    <style>
        body {
         padding-top: 56px;
            }
    </style>
    
</head>
<body>
<?php          
        include '../ketnoi.php'; 
        $error = false;
        if (isset($_POST['taikhoan']) && !empty($_POST['taikhoan']) && isset($_POST['matkhau']) && !empty($_POST['matkhau'])) {
            $result = mysqli_query($conn, "Select * from taikhoan WHERE `taikhoan` = '" . $_POST['taikhoan'] . "' AND `matkhau` = '" . $_POST['matkhau'] . "'");
            if (!$result) { 
                $error = mysqli_error($conn); //ko dang nhap dc
            } else {
                $user = mysqli_fetch_assoc($result);
            
                $_SESSION['dangnhapthanhcong'] = $user['id'];
                $_SESSION['maquyen'] = $user['maquyen'];
            }
        
            mysqli_close($conn);
            if ($error !== false || $result->num_rows == 0) { //khong tim dc tai khoan
                ?>
                <div id="login-notify" class="box-content">
                    <h1>Thông báo</h1>
                    <h4><?= !empty($error) ? $error : "Thông tin đăng nhập không chính xác" ?></h4>
                    <a href="index.php">Quay lại</a>
                </div>
                <?php
                exit;
             }
            ?>
        <?php } ?> 
        <?php if (empty($_SESSION['dangnhapthanhcong'])) { ?>

    <div id="login">
        <h3 class="text-center text-white pt-5">Hậu Tài Tư Vấn SmartPhone</h3>
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                        <form id="login-form" class="form" action="index.php" method="post">
                            <h3 class="text-center text-info">Đăng nhập</h3>
                            <div class="form-group">
                                <label for="username" class="text-info">Tài khoản:</label><br>
                                <input type="text" name="taikhoan" id="username" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="password" class="text-info">Mật khẩu:</label><br>
                                <input type="password" name="matkhau" id="password" class="form-control">
                            </div>
                            <div class="form-group"> 
                            <center>                           
                                <input type="submit" name="submit" class="btn btn-info btn-md" value="Đăng Nhập">
                            </center>    
                            </div>
                            <br>
                            <div id="register-link" class="text-right">
                                <a href="taotaikhoan.php" class="text-info">Đăng ký tại đây</a>
                            </div>         
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
        } else {
           // $currentUser = $_SESSION['dangnhapthanhcong'];
           if( $_SESSION['maquyen'] == 1 )
           header("Location: ../index.php"); 
           else
           header("Location: hienthi.php"); 
            ?>
            <a href="hienthi.php">quản trị</a>
        <?php } ?>
        

</body>
</html>