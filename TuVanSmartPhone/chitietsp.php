<!DOCTYPE html>
<html lang="vi">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>chi tiet san pham</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/shop-item.css" rel="stylesheet">

</head>

<body>
  <?php
  include 'ketnoi.php';
 // var_dump($_GET['masp']);exit;
  $result = mysqli_query($conn, "SELECT * FROM `sanpham` WHERE `masp` = ".$_GET['masp']);
  $result1 = mysqli_query($conn, "SELECT * FROM `sanpham` WHERE `masp` = ".$_GET['masp']);
 
  //var_dump($product);exit;
  $hinhanh = mysqli_query($conn, "SELECT * FROM `hinhanh` WHERE `masp` = ".$_GET['masp']);

  ?>
  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" href="index.php">TNT Shop</a>
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
            <a class="nav-link" href="#">Đăng xuất</a>
          </li>
          
        </ul>
      </div>
    </div>
  </nav>

  <!-- Page Content -->
  <div class="container">

    <div class="row">

      <div class="col-lg-3">
        <h1 class="my-4">Shop TNT</h1>
        <div class="list-group">
                    <button type="button" class="list-group-item list-group-item-action active" disabled>Danh mục sản
                        phẩm </button>
                    <button type="button" class="list-group-item list-group-item-action" ><a href="#" class="nav-link">Apple</a></button>
                    <button type="button" class="list-group-item list-group-item-action" ><a href="#" class="nav-link">Samsung</a></button>
                    <button type="button" class="list-group-item list-group-item-action" ><a href="#" class="nav-link">Oppo</a></button>
                
                    

                </div>
      </div>
      <!-- /.col-lg-3 -->

      <div class="col-lg-9">

        <div class="card mt-4">
        <?php
                while ($row = mysqli_fetch_array($result)) {
   
         ?>
          <img class="card-img-top img-fluid" style="width: 200px; height: auto;" src="<?= $row['anhsanpham'] ?>" alt="">
          <div class="card-body">
            <h3 class="card-title"><?= $row['tensp'] ?></h3>
            <h4><?=number_format($row['gia'])?> VND</h4>
            
          </div>
          <?php } ?>
        </div>
        <!-- /.card -->

        <div class="card card-outline-secondary my-4">
        
            <table class="table">
              <thead>
              <?php
                while ($row2 = mysqli_fetch_array($hinhanh)) {
   
         ?>
                <th class="w-25">
                    <img src="<?= $row2['hinhanh'] ?>" class="img-fluid img-thumbnail"
                        alt="">
                </th>
                <?php } ?>
           

        </div>
          <div class="card-header">
            <h2>Thông số kỹ thuật</h2>
          </div>

          <div class="container">
          <table class="table">
            <thead>
            </thead>
            <tbody>
            <?php
               while ($row1 = mysqli_fetch_array($result1)) {
   
         ?>
              <tr>
                <th scope="row">Màn hình</th>             
                <td><?= $row1['manhinh'] ?></td>
              </tr>
              <tr>
                <th scope="row">Hệ điều hành</th>
                <td><?= $row1['hdh'] ?></td>
              </tr>
              <tr>
                <th scope="row">Camera trước</th>
                <td><?= $row1['cameratruoc'] ?></td>
              </tr>
              <tr>
                <th scope="row">Camera sau</th>
                <td><?= $row1['camerasau'] ?></td>
              </tr>           
              <tr>
                <th scope="row">CPU</th>
                <td><?= $row1['chip'] ?></td>
              </tr>
              <tr>
                <th scope="row">Ram</th>
                <td><?= $row1['ram'] ?></td>
              </tr>
              <tr>
                <th scope="row">Rom</th>
                <td><?= $row1['rom'] ?></td>
              </tr>
              <tr>
                <th scope="row">Pin</th>
                <td><?= $row1['sim'] ?></td>
              </tr>
               <tr>
                <th scope="row">Pin</th>
                <td><?= $row1['pinsac'] ?></td>
              </tr>
             
            </tbody>
          </table>
       
          <?php } ?>
        
        </div>
        <!-- /.card -->

      </div>
      <!-- /.col-lg-9 -->

    </div>

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