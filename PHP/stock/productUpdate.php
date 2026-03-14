<?php
include 'db.php';

// รับค่าจาก form
$id = $_POST['id'];
$name = $_POST['name'];
$price = $_POST['price'];
$qty = $_POST['qty'];

// SQL update
$sql = "UPDATE product
SET product_name='$name',
price='$price',
quantity='$qty'
WHERE product_id='$id'";

// execute
mysqli_query($conn,$sql);

// กลับหน้ารายการ
header("Location: productList.php");
?>