<?php
$bookId = $_REQUEST['bookId']; //รับค่า bookId ที่ส่งมาจาก bookList1.php

$conn = mysqli_connect("localhost", "root", "", "bookstore"); //เชื่อมต่อฐานข้อมูล
if (!$conn) die("ไม่สามารถติดต่อกับ MySQL ได้");//ตรวจสอบการเชื่อมต่อ

mysqli_set_charset($conn, "utf8mb4"); //ตั้งค่าการเข้ารหัสเป็น UTF-8

$sql = "DELETE FROM book WHERE bookId='$bookId'"; //คำสั่ง SQL สำหรับลบข้อมูลหนังสือที่มี bookId ตรงกับค่าที่รับมา
mysqli_query($conn, $sql) or die("Delete ผิดพลาด: " . mysqli_error($conn)); //รันคำสั่ง SQL และตรวจสอบว่ามีข้อผิดพลาดหรือไม่

mysqli_close($conn);
header("location:bookList1.php");
exit();
?>
