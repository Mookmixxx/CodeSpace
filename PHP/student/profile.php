<?php
session_start();
include "db.php";

$uid=$_SESSION['user_id'];

$res=mysqli_query($conn,"
SELECT * FROM students
WHERE user_id='$uid'
");

$row=mysqli_fetch_assoc($res);

$student_id=$row['student_id'];

$score=mysqli_query($conn,"
SELECT * FROM scores
WHERE student_id='$student_id'
");
?>

<div align="center">

<h2>ข้อมูลนักศึกษา</h2>

<img src="picture/<?php echo $row['photo']; ?>" width="120">

<br><br>

ชื่อ : <?php echo $row['name']; ?><br>
Email : <?php echo $row['email']; ?><br>

<hr width="400">

<h2>ผลการเรียน</h2>

<table border="1" cellpadding="10">

<tr>
<th>วิชา</th>
<th>หน่วยกิต</th>
<th>เกรด</th>
</tr>

<?php while($s=mysqli_fetch_assoc($score)){ ?>

<tr>

<td><?php echo $s['subject']; ?></td>
<td><?php echo $s['credit']; ?></td>
<td><?php echo $s['grade']; ?></td>

</tr>

<?php } ?>

</table>

<br><br>

<a href="logout.php">Logout</a>

</div>