<?php
session_start();
include 'db.php';

// ดึงข้อมูลสินค้าทั้งหมด
$sql = "SELECT * FROM product";
$result = mysqli_query($conn,$sql);
?>

<h2>รายการสินค้า</h2>

<a href="productInsert.php">เพิ่มสินค้า</a>

<table border="1">

<tr>
<th>ID</th>
<th>Name</th>
<th>Price</th>
<th>Quantity</th>
<th>Edit</th>
<th>Delete</th>
</tr>

<?php
// loop แสดงข้อมูล
while($row = mysqli_fetch_assoc($result)){
?>

<tr>

<td><?php echo $row['product_id']; ?></td>
<td><?php echo $row['product_name']; ?></td>
<td><?php echo $row['price']; ?></td>
<td><?php echo $row['quantity']; ?></td>

<td>
<a href="productEdit.php?id=<?php echo $row['product_id']; ?>">
Edit
</a>
</td>

<td>
<a href="productDelete.php?id=<?php echo $row['product_id']; ?>">
Delete
</a>
</td>

</tr>

<?php
}
?>

</table>