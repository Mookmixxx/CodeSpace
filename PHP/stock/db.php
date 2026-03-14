<?php
// เชื่อมต่อฐานข้อมูล MySQL

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "stockdb";

// สร้างการเชื่อมต่อ
$conn = mysqli_connect($servername,$username,$password,$dbname);

// ตรวจสอบการเชื่อมต่อ
if(!$conn){
    die("Connection failed : ".mysqli_connect_error());
}
?>