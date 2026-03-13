<?php
$conn = mysqli_connect("localhost", "root", "", "bookstore");
if (!$conn) die("ไม่สามารถติดต่อกับ MySQL ได้");
mysqli_set_charset($conn, "utf8mb4");

function getTypeSelect(){
    global $conn;
    $sql = "SELECT * FROM typebook ORDER BY Typeid";
    $result = mysqli_query($conn, $sql);
    echo '<option value="">เลือกประเภทหนังสือ</option>';
    while($row = mysqli_fetch_assoc($result)){
        echo '<option value="'.$row['Typeid'].'">'.$row['TypeName'].'</option>';
    }
}

function getStatusSelect(){
    global $conn;
    $sql = "SELECT * FROM statusbook ORDER BY StatusId";
    $result = mysqli_query($conn, $sql);
    echo '<option value="">เลือกสถานะ</option>';
    while($row = mysqli_fetch_assoc($result)){
        echo '<option value="'.$row['StatusId'].'">'.$row['StatusName'].'</option>';
    }
}
?>
<html>
<head><title>เพิ่มข้อมูลหนังสือ</title></head>
<body>
<center>
<form enctype="multipart/form-data" method="post" action="bookInsert2.php">
<table border="1">
<tr><th colspan="2">เพิ่มข้อมูลหนังสือ</th></tr>

<tr><td>รหัสหนังสือ</td>
<td><input type="text" name="bookId"></td></tr>

<tr><td>ชื่อหนังสือ</td>
<td><input type="text" name="bookName"></td></tr>

<tr><td>ประเภทหนังสือ</td>
<td><select name="typeId"><?php getTypeSelect(); ?></select></td></tr>

<tr><td>สถานะหนังสือ</td>
<td><select name="statusId"><?php getStatusSelect(); ?></select></td></tr>

<tr><td>สำนักพิมพ์</td>
<td><input type="text" name="publish"></td></tr>

<tr><td>ราคาซื้อ</td>
<td><input type="text" name="unitPrice"></td></tr>

<tr><td>ราคาเช่า</td>
<td><input type="text" name="unitRent"></td></tr>

<tr><td>จำนวนวันที่เช่า</td>
<td><input type="text" name="dayAmount"></td></tr>

<tr><td>รูปภาพ</td>
<td><input type="file" name="imageFile"></td></tr>

</table>
<br>
<input type="submit" value="บันทึก">
<input type="reset" value="ยกเลิก">
</form>

<br><a href="bookList1.php">กลับหน้าแสดงรายการ</a>
</center>
</body>
</html>
