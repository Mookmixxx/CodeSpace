<?php
session_start();
include "db.php";

if(isset($_POST['login'])){

$user=$_POST['username'];
$pass=$_POST['password'];

$sql="SELECT * FROM users WHERE username='$user' AND password='$pass'";
$res=mysqli_query($conn,$sql);

if(mysqli_num_rows($res)==1){

$row=mysqli_fetch_assoc($res);

$_SESSION['user_id']=$row['user_id'];
$_SESSION['role']=$row['role'];

if($row['role']=="teacher"){
header("location:students.php");
}else{
header("location:profile.php");
}

}else{
echo "<center style='color:red;'>Username หรือ Password ไม่ถูกต้อง</center>";
}

}
?>

<h2 align="center">เข้าสู่ระบบ</h2>

<form method="post">

<table border="1" align="center" cellpadding="10">

<tr>
<td>Username</td>
<td>
<input type="text" name="username">
</td>
</tr>

<tr>
<td>Password</td>
<td>
<input type="password" name="password">
</td>
</tr>

<tr>
<td></td>
<td>
<button name="login">Login</button>
</td>
</tr>

<tr>
<td colspan="2" align="center">

ยังไม่มีบัญชี ?
<a href="register.php">สมัครสมาชิก</a>

</td>
</tr>

</table>

</form>