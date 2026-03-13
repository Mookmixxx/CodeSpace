<?php
$conn = mysqli_connect("localhost", "root", "", "bookstore");
if (!$conn) die("ไม่สามารถติดต่อกับ MySQL ได้");

mysqli_set_charset($conn, "utf8mb4");

$bookId = $_POST['bookId'];
$bookName = $_POST['bookName'];
$typeId = $_POST['typeId'];
$statusId = $_POST['statusId'];
$publish = $_POST['publish'];
$unitPrice = $_POST['unitPrice'];
$unitRent = $_POST['unitRent'];
$dayAmount = $_POST['dayAmount'];
$bookDate = date("Y-m-d");

$picture = "";
if (!empty($_FILES['imageFile']['name'])) {
    $picture = $_FILES['imageFile']['name'];
    move_uploaded_file($_FILES['imageFile']['tmp_name'], "pictures/".$picture);
}

$sql = "INSERT INTO book 
(bookId, bookName, typeId, statusId, publish, unitPrice, unitRent, dayAmount, picture, bookDate)
VALUES
('$bookId','$bookName','$typeId','$statusId','$publish','$unitPrice','$unitRent','$dayAmount','$picture','$bookDate')";

mysqli_query($conn, $sql) or die("Insert ผิดพลาด: " . mysqli_error($conn));

echo "<center><h2>บันทึกข้อมูลเรียบร้อย</h2>";
echo "<a href='bookList1.php'>กลับหน้าแสดงรายการ</a></center>";

mysqli_close($conn);
?>
