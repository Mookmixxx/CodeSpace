<?php
include 'db.php';

// รับ id จาก url
$id = $_GET['id'];

// SQL delete
$sql = "DELETE FROM product WHERE product_id='$id'";

// execute
mysqli_query($conn,$sql);

// กลับหน้า list
header("Location: productList.php");
?>