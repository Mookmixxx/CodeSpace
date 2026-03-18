<?php
include "db.php";

if(isset($_POST['save'])){

$username = $_POST['username'];
$password = $_POST['password'];
$name = $_POST['name'];
$email = $_POST['email'];

$photo = $_FILES['photo']['name'];
$tmp = $_FILES['photo']['tmp_name'];

if($username=="" || $password=="" || $name=="" || $email=="" || $photo==""){

echo "<center style='color:red;'>กรุณากรอกข้อมูลให้ครบ</center>";

}else{

$filename = time()."_".$photo;

move_uploaded_file($tmp,"picture/".$filename);

mysqli_query($conn,"
INSERT INTO users(username,password,role)
VALUES('$username','$password','student')
");

$uid = mysqli_insert_id($conn);

mysqli_query($conn,"
INSERT INTO students(user_id,name,email,photo)
VALUES('$uid','$name','$email','$filename')
");

echo "<center style='color:green;'>สมัครสมาชิกสำเร็จ</center>";

}

}
?>

<h2 align="center">สมัครสมาชิก</h2>

<form method="post" enctype="multipart/form-data">

<table border="1" align="center" cellpadding="10">

<tr>
<td>Username</td>
<td>
<input type="text" name="username" required>
</td>
</tr>

<tr>
<td>Password</td>
<td>
<input type="password" name="password" required>
</td>
</tr>

<tr>
<td>ชื่อ</td>
<td>
<input type="text" name="name" required>
</td>
</tr>

<tr>
<td>Email</td>
<td>
<input type="email" name="email" required>
</td>
</tr>

<tr>
<td>รูปภาพ</td>
<td>
<input type="file" name="photo" required>
</td>
</tr>

<tr>
<td></td>
<td>
<button name="save">สมัครสมาชิก</button>
</td>
</tr>

<tr>
<td colspan="2" align="center">
<a href="login.php">กลับหน้า Login</a>
</td>
</tr>

</table>

</form>