
<?php 
session_start();
?>

<?php 
include '../ketnoi.php';
if( $_SESSION['maquyen'] == 1 )
header("Location: ../index.php"); 

 if (isset($_GET['id']) && !empty($_GET['id'])) {
    $sql ="UPDATE `taikhoan` SET `maquyen`='2'  WHERE id = " . $_GET['id'];
    mysqli_query($conn,$sql  );
    header("Location:taikhoan.php");
}
?>