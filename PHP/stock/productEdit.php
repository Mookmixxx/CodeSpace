<?php
include 'db.php';

// รับ id
$id = $_GET['id'];

// ดึงข้อมูลสินค้า
$sql = "SELECT * FROM product WHERE product_id='$id'";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($result);
?>

<form action="productUpdate.php" method="post">

<input type="hidden" name="id" value="<?php echo $row['product_id']; ?>">

Name :
<input type="text" name="name" value="<?php echo $row['product_name']; ?>">

<br><br>

Price :
<input type="text" name="price" value="<?php echo $row['price']; ?>">

<br><br>

Quantity :
<input type="text" name="qty" value="<?php echo $row['quantity']; ?>">

<br><br>

<button type="submit">Update</button>

</form>