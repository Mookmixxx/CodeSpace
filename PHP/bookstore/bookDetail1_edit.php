<?php
$bookId = $_GET['bookId'];

$conn = mysqli_connect("localhost", "root", "", "bookstore");
if (!$conn) die("ไม่สามารถติดต่อกับ MySQL ได้");
mysqli_set_charset($conn, "utf8mb4");

$sql = "SELECT * FROM book WHERE bookId='$bookId'";
$result = mysqli_query($conn, $sql);
$rs = mysqli_fetch_assoc($result);

function getTypeSelect($selected){
    global $conn;
    $sql = "SELECT * FROM typebook ORDER BY Typeid";
    $result = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_assoc($result)){
        $sel = ($row['Typeid'] == $selected) ? "selected" : "";
        echo '<option value="'.$row['Typeid'].'" '.$sel.'>'.$row['TypeName'].'</option>';
    }
}

function getStatusSelect($selected){
    global $conn;
    $sql = "SELECT * FROM statusbook ORDER BY StatusId";
    $result = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_assoc($result)){
        $sel = ($row['StatusId'] == $selected) ? "selected" : "";
        echo '<option value="'.$row['StatusId'].'" '.$sel.'>'.$row['StatusName'].'</option>';
    }
}
?>

<html>
<head><title>แก้ไขข้อมูลหนังสือ</title></head>
<body>
<center>

<form enctype="multipart/form-data" method="post" action="bookUpdate1.php">
<input type="hidden" name="bookId" value="<?php echo $rs['bookId']; ?>">
<input type="hidden" name="oldPicture" value="<?php echo $rs['picture']; ?>">

<table border="1">
<tr><th colspan="2">แก้ไขข้อมูลหนังสือ</th></tr>

<tr>
<td>รหัสหนังสือ</td>
<td><?php echo $rs['bookId']; ?></td>
</tr>

<tr>
<td>ชื่อหนังสือ</td>
<td><input type="text" name="bookName" value="<?php echo $rs['bookName']; ?>"></td>
</tr>

<tr>
<td>ประเภทหนังสือ</td>
<td>
<select name="typeId">
<?php getTypeSelect($rs['typeId']); ?>
</select>
</td>
</tr>

<tr>
<td>สถานะหนังสือ</td>
<td>
<select name="statusId">
<?php getStatusSelect($rs['statusId']); ?>
</select>
</td>
</tr>

<tr>
<td>สำนักพิมพ์</td>
<td><input type="text" name="publish" value="<?php echo $rs['publish']; ?>"></td>
</tr>

<tr>
<td>ราคาซื้อ</td>
<td><input type="text" name="unitPrice" value="<?php echo $rs['unitPrice']; ?>"></td>
</tr>

<tr>
<td>ราคาเช่า</td>
<td><input type="text" name="unitRent" value="<?php echo $rs['unitRent']; ?>"></td>
</tr>

<tr>
<td>จำนวนวันที่เช่า</td>
<td><input type="text" name="dayAmount" value="<?php echo $rs['dayAmount']; ?>"></td>
</tr>

<tr>
<td>รูปภาพเดิม</td>
<td>
<?php 
if($rs['picture']!=""){
    echo "<img src='pictures/".$rs['picture']."' width='120'><br>";
}
?>
<input type="file" name="imageFile">
</td>
</tr>

</table>
<br>
<input type="submit" value="บันทึกการแก้ไข">
</form>

<br><a href="bookList1.php">กลับหน้าแสดงรายการ</a>

</center>
</body>
</html>

<?php mysqli_close($conn); ?>
