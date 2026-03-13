<?php
// รับค่า bookId ที่ส่งมาจาก bookList1.php
$bookId = $_GET['bookId'] ?? "";

// เชื่อมต่อฐานข้อมูล
$conn = mysqli_connect("localhost", "root", "", "bookstore");
if(!$conn){
    die("ไม่สามารถติดต่อกับ MySQL ได้");
}

// ตั้งค่า charset
mysqli_set_charset($conn,"utf8mb4");

// คำสั่ง SQL ดึงข้อมูลหนังสือ + ประเภท + สถานะ
$sql = "SELECT book.*, typebook.TypeName, statusbook.StatusName
        FROM book
        LEFT JOIN typebook ON book.typeId = typebook.Typeid
        LEFT JOIN statusbook ON book.statusId = statusbook.StatusId
        WHERE book.bookId='$bookId'";

// รันคำสั่ง SQL
$result = mysqli_query($conn,$sql);

// ตรวจสอบว่า query สำเร็จหรือไม่
if(!$result){
    die("SQL Error : ".mysqli_error($conn));
}

// ดึงข้อมูลออกมาเป็น array
$rs = mysqli_fetch_assoc($result);

// ตรวจสอบว่ามีข้อมูลหรือไม่
if(!$rs){
    die("ไม่พบข้อมูลหนังสือ");
}
?>

<html>
<head>
<title>รายละเอียดหนังสือ</title>
</head>

<body>
<center>

<h2>รายละเอียดหนังสือ</h2>

<table border="1" width="500">

<tr>
<td width="150">รหัสหนังสือ</td>
<td><?php echo $rs['bookId']; ?></td>
</tr>

<tr>
<td>ชื่อหนังสือ</td>
<td><?php echo $rs['bookName']; ?></td>
</tr>

<tr>
<td>ประเภทหนังสือ</td>
<td><?php echo $rs['TypeName']; ?></td>
</tr>

<tr>
<td>สถานะหนังสือ</td>
<td><?php echo $rs['StatusName']; ?></td>
</tr>

<tr>
<td>สำนักพิมพ์</td>
<td><?php echo $rs['publish']; ?></td>
</tr>

<tr>
<td>ราคาซื้อ</td>
<td><?php echo $rs['unitPrice']; ?></td>
</tr>

<tr>
<td>ราคาเช่า</td>
<td><?php echo $rs['unitRent']; ?></td>
</tr>

<tr>
<td>จำนวนวันเช่า</td>
<td><?php echo $rs['dayAmount']; ?></td>
</tr>

<tr>
<td>รูปภาพ</td>
<td>
<?php
if($rs['picture']!=""){
echo "<img src='pictures/".$rs['picture']."' width='150'>";
}
?>
</td>
</tr>

<tr>
<td>วันที่เพิ่มหนังสือ</td>
<td><?php echo $rs['bookDate']; ?></td>
</tr>

</table>

<br>

<a href="bookDetail1_edit.php?bookId=<?php echo $rs['bookId']; ?>">แก้ไขข้อมูล</a>

<br><br>

<a href="bookList1.php">กลับหน้ารายการหนังสือ</a>

</center>
</body>
</html>

<?php
// ปิดการเชื่อมต่อฐานข้อมูล
mysqli_close($conn);
?>