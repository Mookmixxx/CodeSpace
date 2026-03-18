<?php
include "db.php";

/* คำสั่งลบนักศึกษา */
if(isset($_GET['delete'])){

$id = $_GET['delete'];

mysqli_query($conn,"DELETE FROM students WHERE student_id='$id'");

}

/* ดึงข้อมูลนักศึกษา */
$res = mysqli_query($conn,"SELECT * FROM students");
?>

<h2 align="center">รายชื่อนักศึกษา</h2>

<table border="1" align="center" cellpadding="10">

<tr>
<th>ID</th>
<th>รูป</th>
<th>ชื่อ</th>
<th>Email</th>
<th>จัดการ</th>
</tr>

<?php while($row=mysqli_fetch_assoc($res)){ ?>

<tr>

<td><?php echo $row['student_id']; ?></td>

<td>
<img src="picture/<?php echo $row['photo']; ?>" width="80">
</td>

<td><?php echo $row['name']; ?></td>

<td><?php echo $row['email']; ?></td>

<td>

<a href="score.php?student_id=<?php echo $row['student_id']; ?>">
เพิ่มคะแนน
</a>

|

<a href="students.php?delete=<?php echo $row['student_id']; ?>"
onclick="return confirm('ต้องการลบข้อมูลหรือไม่ ?')">

Delete

</a>

</td>

</tr>

<?php } ?>

</table>