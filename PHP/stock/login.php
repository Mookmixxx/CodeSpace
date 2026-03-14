<?php
// เริ่ม session
session_start();
?>

<form action="checkLogin.php" method="post">

<h2>Login</h2>

<!-- ช่องกรอก username -->
Username :
<input type="text" name="username">

<br><br>

<!-- ช่องกรอก password -->
Password :
<input type="password" name="password">

<br><br>

<button type="submit">Login</button>

</form>