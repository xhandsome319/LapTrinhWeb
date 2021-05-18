
<?php 
    include 'dau.php';
    if (!empty($_SESSION['dangnhapthanhcong'])) {
        if(!empty($_GET['action']) && $_GET['action'] == 'search' && !empty($_POST)){        
            $_SESSION['locsp'] = $_POST;
            header('Location:hienthi.php');exit;

        }
        if(!empty($_SESSION['locsp'])){
            $where="";
            foreach ($_SESSION['locsp'] as $field => $value) {
                if(!empty($value)){
                    switch ($field) {
                        case 'tensp':
                            $where .= (!empty($where))?" AND"." `".$field."` LIKE '%".$value."%'" :  "`".$field."` LIKE '%".$value."%' ";
                            break;
                            default:
                            $where .= (!empty($where))? " AND "."`".$field."` = ".$value."": "`".$field."` = ".$value."";
                            break;
                    }
               
                }
     
            }
          
    
    }

    
     $item_per_page = !empty($_GET['per_page'])?$_GET['per_page']:10;
     $current_page = !empty($_GET['page'])?$_GET['page']:1; //Trang hiện tại
     $offset = ($current_page - 1) * $item_per_page;
     if(!empty($where)){
        // var_dump("SELECT * FROM `sanpham` Where (".$where.") ");exit;
        $totalRecords = mysqli_query($conn, "SELECT * FROM `sanpham` Where (".$where.") ");
     }
     else{
        $totalRecords = mysqli_query($conn, "SELECT * FROM `sanpham`");
     }
    
     $totalRecords = $totalRecords->num_rows;
     $totalPages = ceil($totalRecords / $item_per_page);
     if(!empty($where)){
        $products = mysqli_query($conn, "SELECT * FROM sanpham,loaisanphan Where sanpham.maloaisp = loaisanphan.maloaisp and (".$where.") ORDER BY masp ASC  LIMIT " . $item_per_page . " OFFSET " . $offset );

     }
     else{
     $products = mysqli_query($conn, "SELECT * FROM sanpham,loaisanphan Where sanpham.maloaisp = loaisanphan.maloaisp ORDER BY masp ASC  LIMIT " . $item_per_page . " OFFSET " . $offset );

     }

?>


            <div class="col-lg-9">


                <div class="container">



                    <div class="card-body text-center">
                        <h1>Danh sách sản phẩm</h1>
                    </div>
                    <a href="themsp.php" class="float-right btn btn-outline-primary mt-1">thêm sản phẩm</a>
                    <div class="container">
                <form  action="hienthi.php?action=search" method="POST">
                    <fieldset>
                        <legend>Tìm kiếm sản phẩm:</legend>
                        ID: <input type="text" name="masp" class="form-control" value="<?=!empty($masp)?$masp:""?>" />
                        Tên sản phẩm: <input type="text" class="form-control" name="tensp" value="<?=!empty($tensp)?$tensp:""?>" />
                        <input class="float-right btn btn-outline-primary mt-1" type="submit" value="Tim" />
                    </fieldset>
                </form>
            </div>
            <div class="total-products">
                <span>Có tất cả <strong><?=$totalRecords?></strong> sản phẩm trên <strong><?=$totalPages?></strong> trang</span>
            </div>


                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Mã sản phẩm</th>
                                <th scope="col">tên sản phẩm</th>
                                <th scope="col">loại sản phẩm</th>
                                <th scope="col">hình đại diện</th>
                                <th scope="col">giá sản phẩm</th>
                                <th scope="col">số lượng</th>
                                <th scope="col">trạng thái</th>
                                <th scope="col">xóa</th>
                                <th scope="col">sửa</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
              while ($row = mysqli_fetch_array($products)) {
                ?>

                            <tr>
                                <th scope="row"><?= $row['masp'] ?></th>
                                <td scope="row"><?= $row['tensp'] ?></td>
                                <td scope="row"><?= $row['tenloaisp'] ?></td>
                                <td class="w-25">
                                    <img src="../<?= $row['hinhanhdaidien'] ?>" class="img-fluid img-thumbnail"
                                        alt="<?= $row['tensp'] ?>">
                                </td>

                                <td scope="row"><?= number_format($row['giasp'],0,",",".") ?> đ</td>
                                <td scope="row"><?= $row['soluong'] ?></td>
                                <td scope="row"><?= $row['trangthai'] == 1 ? "Còn hàng" : "Hết hàng"  ?></td>
                                <td scope="row"><a href="xoasp.php?masp=<?= $row['masp'] ?>">Xóa</a></td>
                                <td scope="row"><a href="suasp.php?masp=<?= $row['masp'] ?>">Sửa</a></td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
                <!-- /.row -->
                <?php
                include '../phantrang.php';
                    ?>

            </div>
            <!-- /.col-lg-9 -->

  


    <?php
    }
            include 'cuoi.php';
            ?>

