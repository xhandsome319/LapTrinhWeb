<!DOCTYPE html>
<html lang="vi">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Shop TNT</title>
   
    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/shop-homepage.css" rel="stylesheet">

</head>

<body>
    
    <?php 
     $search = isset($_GET['name']) ? $_GET['name'] : "";
     if ($search) {
         $where = "WHERE `tensp` LIKE '%" . $search . "%'";
     }
    include'ketnoi.php'; 
        
        //phan trang       
        $item_per_page = !empty($_GET['per_page'])?$_GET['per_page']:6;
        $current_page = !empty($_GET['page'])?$_GET['page']:1; //Trang hiện tại
        $offset = ($current_page - 1) * $item_per_page;


        //tim kiem
        if ($search) {
            $products = mysqli_query($conn, "SELECT * FROM `sanpham` WHERE `tensp` LIKE '%" . $search . "%' ORDER BY `masp` ASC  LIMIT " . $item_per_page . " OFFSET " . $offset);
            $totalRecords = mysqli_query($conn, "SELECT * FROM `sanpham` WHERE `tensp` LIKE '%" . $search . "%'");
        } else {
            $products = mysqli_query($conn, "SELECT * FROM `sanpham` ORDER BY `masp` ASC  LIMIT " . $item_per_page . " OFFSET " . $offset);
            $totalRecords = mysqli_query($conn, "SELECT * FROM `sanpham`");
        }
        ///

        $totalRecords = $totalRecords->num_rows;
        $totalPages = ceil($totalRecords / $item_per_page);


        $sql1 =  "SELECT * FROM `hangsx`";
        $result2 = mysqli_query($conn,$sql1);


        ?>


    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#">Hậu Tài Tư Vấn SmartPhone</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="index.php">Trang chủ
                            <span class="sr-only">(current)</span>
                        </a>
                    </li>
                                
                    <li class="nav-item">
                        <a class="nav-link" href="admin/index.php">Đăng nhập</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="admin/dangxuat.php"> Đăng xuất </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <form class="form-inline " method="GET" >
                <div class="container">
                <div class="card-body">
             
                <label class="form-control mr-sm-3" >Tìm kiếm sản phẩm</label>
                <input class="form-control mr-sm-3" size="50" type="text" placeholder="Search" aria-label="Search" value="<?=isset($_GET['name']) ? $_GET['name'] : ""?>" name="name">
                <input type="submit" value="Tìm kiếm" class="btn btn-success"/>
             
                </div>
                </div>
            </form>
    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <div class="col-lg-3">

                <h1 class="my-4"><img src="anh/logo.png" width=170 height="170"></h1>


                <div class="list-group">
                    <button type="button" class="list-group-item list-group-item-action active" disabled>Danh mục sản
                        phẩm </button>
                        <?php
                while ($row2 = mysqli_fetch_array($result2)) { 
                    ?>
                    <button type="button" class="list-group-item list-group-item-action" ><a href="hangsx.php?mahang=<?= $row2['mahang']?>" class="nav-link"><?= $row2['tenhang'] ?></a></button>
                  <?php } ?>
                
                    

                </div>

            </div>
            <!-- /.col-lg-3 -->

            <div class="col-lg-9">

                <div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner" role="listbox">
                        <div class="carousel-item active">
                            <video height="400px" loop autoplay muted controls id="vid">
                                 <source type="video/mp4" src="./Videos/Mi11.mp4"></source>
                                 
                            </video>
                        </div>
                        <div class="carousel-item">
                            <img class="d-block img-fluid" src="./Images/OP_reno5_01.png" alt="">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block img-fluid" src="anh/anh3.png" alt="">
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>

                

    

                <div class="row">
             
                <?php
                while ($row = mysqli_fetch_array($products)) {
   
                    ?>

                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="card h-100">
                            <a href="chitietsp.php?masp=<?= $row['masp']?>"><img class="card-img-top"  height="420px" src=" <?= $row['anhsanpham'] ?> " alt=""></a>
                            <div class="card-body">
                                <h4 class="card-title">
                                    <a href="chitietsp.php?masp=<?= $row['masp']?>"><?= $row['tensp'] ?></a>
                                </h4>
                                <h5><?= number_format($row['gia'],0,",",".") ?> đ</h5>
                                <!--<p class="card-text"><?= $row['noidung'] ?></p>-->
                            </div>                         
                        </div>
                    </div>

                    <?php } ?>
                  

               




                </div>
                <!-- /.row -->
    

                <?php
                include 'phantrang.php';
                    ?>
            </div>
            <!-- /.col-lg-9 -->
                    
        </div>
        <!-- /.row -->

    </div>
    <!-- /.container -->

    

    <!-- Footer -->
    <footer class="py-5 bg-dark">
        <div class="container">
            <p class="m-0 text-center text-white">Copyright &copy; Your Website 2020</p>
        </div>
        <!-- /.container -->
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>