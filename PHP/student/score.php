<?php
session_start();
include "db.php";

$student_id = $_GET['student_id'];

if(isset($_POST['save'])){

$subject = $_POST['subject'];
$credit = $_POST['credit'];
$grade = $_POST['grade'];

mysqli_query($conn,"
INSERT INTO scores(student_id,subject,credit,grade)
VALUES('$student_id','$subject','$credit','$grade')
");

echo "<center style='color:green;'>เพิ่มคะแนนสำเร็จ</center>";
}

if(isset($_GET['delete'])){

$id = $_GET['delete'];

mysqli_query($conn,"
DELETE FROM scores
WHERE score_id='$id'
");

}

$res=mysqli_query($conn,"
SELECT * FROM scores
WHERE student_id='$student_id'
");
?>

<div align="center">

<h2>เพิ่มคะแนนนักศึกษา</h2>

<form method="post">

<table border="1" cellpadding="10">

<tr>
<td>วิชา</td>
<td>
<input type="text" name="subject" required>
</td>
</tr>

<tr>
<td>หน่วยกิต</td>
<td>
<input type="number" name="credit" required>
</td>
</tr>

<tr>
<td>เกรด</td>
<td>

<select name="grade">

<option>A</option>
<option>B</option>
<option>C</option>
<option>D</option>
<option>F</option>

</select>

</td>
</tr>

<tr>
<td></td>
<td>
<button name="save">เพิ่มคะแนน</button>
</td>
</tr>

</table>

</form>

<br>

<h2>คะแนนนักศึกษา</h2>

<table border="1" cellpadding="10">

<tr>
<th>วิชา</th>
<th>หน่วยกิต</th>
<th>เกรด</th>
<th>ลบ</th>
</tr>

<?php while($row=mysqli_fetch_assoc($res)){ ?>

<tr>

<td><?php echo $row['subject']; ?></td>
<td><?php echo $row['credit']; ?></td>
<td><?php echo $row['grade']; ?></td>

<td>

<a href="score.php?student_id=<?php echo $student_id; ?>&delete=<?php echo $row['score_id']; ?>"
onclick="return confirm('ต้องการลบคะแนนหรือไม่ ?')">

Delete

</a>

</td>

</tr>

<?php } ?>

</table>

</div>
<center>
<a href="students.php">กลับหน้าหลัก</a>
</center>