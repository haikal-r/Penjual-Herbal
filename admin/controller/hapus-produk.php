<?php
// include database connection file
include '../../config/index.php';
$id = $_GET['id'];
$result = mysqli_query($conn, "DELETE FROM product WHERE id_product='$id'");
header("Location: ../view/produk.php");
?>
