<?php 
session_start();
?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../vendor/bootstrap/css/bootstrap.min.css">
    <title>dang nhap</title>
</head>

<body>

    <?php 
include '../ketnoi.php';
//if( $_SESSION['maquyen'] == 1 )
//header("Location: ../index.php"); 

$error = false;
if(isset($_GET['action']) && $_GET['action'] == 'reg'){
	if(isset($_POST['ho']) && !empty($_POST['ho']) && isset($_POST['ten']) && !empty($_POST['ten']) && isset($_POST['sdt']) && !empty($_POST['sdt']) && isset($_POST['gt']) && !empty($_POST['gt']) && isset($_POST['taikhoan']) && !empty($_POST['taikhoan']) && isset($_POST['matkhau']) && !empty($_POST['matkhau'])){
		$result = mysqli_query($conn, "INSERT INTO `taikhoan`(`id`, `ho`, `ten`, `sdt`, `gioitinh`, `taikhoan`, `matkhau`, `trangthai`, `maquyen`) VALUE (null,('" . $_POST['ho'] . "'), ('" . $_POST['ten'] . "'),('" . $_POST['sdt'] . "'),('" . $_POST['gt'] . "'),('" . $_POST['taikhoan'] . "'),('" . $_POST['matkhau'] . "'),1,1)");
		
		if (!$result) {
			if (strpos(mysqli_error($conn), "Duplicate entry") !== FALSE) { 
				$error = "Tài khoản đã tồn tại. Bạn vui lòng chọn tài khoản khác.";
			}
		}
		mysqli_close($conn);
		if ($error !== false) {
			?>
    <div class="container">
        <h1>Thông báo</h1>
        <h4><?= $error ?></h4>
        <a href="taotaikhoan.php">Quay lại</a>
    </div>
    <?php } else { ?>
    <div class="container">
        <h1><?= ($error !== false) ? $error : "Đăng ký tài khoản thành công" ?></h1>
        <a href="index.php">Mời bạn đăng nhập</a>
    </div>
    <?php } ?>
    <?php } else { ?>
    <div>
        <h1>Vui lòng nhập đủ thông tin để đăng ký tài khoản</h1>
        <a href="taotaikhoan.php">Quay lại đăng ký</a>
    </div>
    <?php
            }

}else{

?>


    <div class="container">
        <hr>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <header class="card-header">
                        <a href="index.php" class="float-right btn btn-outline-primary mt-1">Đăng nhập</a>
                        <h4 class="card-title mt-2">Đăng ký</h4>
                    </header>
                    <article class="card-body">


                        <form action="./taotaikhoan.php?action=reg" method="Post">
                            <!--ho ten -->
                            <div class="form-row">
                                <div class="col form-group">
                                    <label>Nhập Họ </label>
                                    <input type="text" class="form-control" placeholder="Họ" name="ho">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col form-group">
                                    <label>Nhập Tên </label>
                                    <input type="text" class="form-control" placeholder="Tên" name="ten">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col form-group">
                                    <label>Nhập số điện thoại </label>
                                    <input type=text class="form-control" placeholder="Số điện thoại" name="sdt">
                                </div>
                            </div>
                            <!--giới tính -->
                            <div class="form-group">
                                <label class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="gt" value="nam">
                                    <span class="form-check-label"> Nam </span>
                                </label>

                                <label class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="gt" value="nu">
                                    <span class="form-check-label"> Nữ</span>
                                </label>
                            </div>
                            <!--so dien thoai -->
                            
                            <!-- tai khoan -->
                            <div class="form-row">
                                <div class="col form-group">
                                    <label>Nhập tài khoản mới</label>
                                    <input type="text" class="form-control" placeholder="Tài khoản" name="taikhoan">
                                </div>
                            </div>
                            <!-- mat khau -->
                            <div class="form-group">
                                <label>Nhập mật khẩu mới</label>
                                <input class="form-control" type="password" placeholder="Mật khẩu" name="matkhau">
                            </div>
                            <!-- xác nhận -->
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-block"> Tạo Tài Khoản </button>
                            </div>
                            <!-- form-group// -->
                           
                        </form>


                    </article>
                    <div class="border-top card-body text-center">Đã có tài khoản <a href="index.php">Đăng nhập</a>
                    </div>
                </div>
            </div>

        </div>


    </div>
    <!--container end.//-->

   

    <?php } ?>


</body>

</html>