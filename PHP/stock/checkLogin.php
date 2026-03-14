<?php
session_start();

// เรียกไฟล์เชื่อมต่อฐานข้อมูล
include 'db.php';

// รับค่าจากฟอร์ม
$username = $_POST['username'];
$password = $_POST['password'];

// คำสั่ง SQL ตรวจสอบ user
$sql = "SELECT * FROM user WHERE username='$username' AND password='$password'";

// query
$result = mysqli_query($conn,$sql);

// ถ้ามีข้อมูล
if(mysqli_num_rows($result) == 1){

    $_SESSION['user'] = $username;

    // ไปหน้ารายการสินค้า
    header("Location: productList.php");

}else{

    echo "Login Failed";

}
?>