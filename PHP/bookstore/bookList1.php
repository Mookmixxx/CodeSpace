<?php
session_start();

if(!isset($_SESSION['username'])){
    header("location:login.php");
    exit();
}
?>

<html>
<head>
<title>รายการหนังสือ</title>
</head>

<body>

<?php
$conn = mysqli_connect("localhost", "root", "", "bookstore");
if (!$conn) die("ไม่สามารถติดต่อกับ MySQL ได้");

mysqli_set_charset($conn, "utf8mb4");

$sql = "SELECT * FROM book ORDER BY bookId";
$result = mysqli_query($conn, $sql);
?>

<center>

<h3>รายชื่อหนังสือ</h3>

<!-- แสดง user ที่ login -->
<p>
ผู้ใช้งาน : <?php echo $_SESSION['username']; ?> |
<a href="logout.php">ออกจากระบบ</a>
</p>

<!-- ปุ่มเพิ่ม -->
<table width="500">
<tr>
<td align="left">
<a href="bookInsert1.php">เพิ่มรายการหนังสือ</a>
</td>
</tr>
</table>

<br>

<table width="700" border="1">

<tr align="center">
<th width="50">ลำดับ</th>
<th width="100">รหัสหนังสือ</th>
<th width="250">ชื่อหนังสือ</th>
<th width="80">แก้ไข</th>
<th width="80">ลบ</th>
</tr>

<?php
$row = 1;

while ($rs = mysqli_fetch_assoc($result)) {
?>

<tr align="center">

<td><?php echo $row; ?></td>

<td>
<a href="bookDetail1.php?bookId=<?php echo $rs['bookId']; ?>">
<?php echo $rs['bookId']; ?>
</a>
</td>

<td align="left"><?php echo $rs['bookName']; ?></td>

<td>
<a href="bookDetail1_edit.php?bookId=<?php echo $rs['bookId']; ?>">
[แก้ไข]
</a>
</td>

<td>
<a href="bookDelete1.php?bookId=<?php echo $rs['bookId']; ?>"
onclick="return confirm('ยืนยันการลบ <?php echo $rs['bookName']; ?> ?')">
[ลบ]
</a>
</td>

</tr>

<?php
$row++;
}
?>

</table>

</center>

<?php mysqli_close($conn); ?>

</body>
</html>
