<!DOCTYPE html>
<html lang="vi">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>NTT</title>
    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/shop-homepage.css" rel="stylesheet">
    <link rel="stylesheet" href="css/test.css">

     
</head>

<body>
<div  class="container">
<?php
if ($current_page > 3) {
    $first_page = 1;
    ?>
    <a class="alert-link" href="?per_page=<?= $item_per_page ?>&page=<?= $first_page ?>">First</a>
    <?php
}
if ($current_page > 1) {
    $prev_page = $current_page - 1;
    ?>
    <a class="alert-link" href="?per_page=<?= $item_per_page ?>&page=<?= $prev_page ?>">Prev</a>
   
<?php }
?>
<?php for ($num = 1; $num <= $totalPages; $num++) { ?>
    <?php if ($num != $current_page) { ?>
        <?php if ($num > $current_page - 3 && $num < $current_page + 3) { ?>
           
            <a class="alert-link" href="?per_page=<?= $item_per_page ?>&page=<?= $num ?>"><?= $num ?></a>
        <?php } ?>
    <?php } else { ?>
        <strong class="alert-link"><?= $num ?></strong>
    <?php } ?>
<?php } ?>
<?php
if ($current_page < $totalPages - 1) {
    $next_page = $current_page + 1;
    ?>
    <a class="alert-link" href="?per_page=<?= $item_per_page ?>&page=<?= $next_page ?>">Next</a>
<?php
}
if ($current_page < $totalPages - 3) {
    $end_page = $totalPages;
    ?>
    <a class="alert-link" href="?per_page=<?= $item_per_page ?>&page=<?= $end_page ?>">Last</a>
    <?php
}
?>
</div>

</body>

</html>