<?php
session_start();

$conn = mysqli_connect("localhost","root","","bookstore");
if(!$conn) die("ไม่สามารถติดต่อ MySQL ได้");

mysqli_set_charset($conn,"utf8mb4");

$username = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT * FROM user 
        WHERE username='$username' 
        AND password='$password'";

$result = mysqli_query($conn,$sql);

if(mysqli_num_rows($result)==1){

    $_SESSION['username'] = $username;

    header("location:bookList1.php");
}
else{

    echo "<center>";
    echo "Username หรือ Password ไม่ถูกต้อง <br>";
    echo "<a href='login.php'>ลองใหม่</a>";
    echo "</center>";

}

mysqli_close($conn);
?>