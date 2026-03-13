<?php
$conn = mysqli_connect("localhost", "root", "", "bookstore");
if (!$conn) die("ไม่สามารถติดต่อกับ MySQL ได้");
mysqli_set_charset($conn, "utf8mb4");

$bookId = $_POST['bookId']; 
$bookName = $_POST['bookName'];
$typeId = $_POST['typeId'];
$statusId = $_POST['statusId'];
$publish = $_POST['publish'];
$unitPrice = $_POST['unitPrice'];
$unitRent = $_POST['unitRent'];
$dayAmount = $_POST['dayAmount'];
$oldPicture = $_POST['oldPicture'];

$picture = $oldPicture;

if (!empty($_FILES['imageFile']['name'])) {
    $picture = $_FILES['imageFile']['name'];
    move_uploaded_file($_FILES['imageFile']['tmp_name'], "pictures/".$picture);
}

$sql = "UPDATE book SET
bookName='$bookName',
typeId='$typeId',
statusId='$statusId',
publish='$publish',
unitPrice='$unitPrice',
unitRent='$unitRent',
dayAmount='$dayAmount',
picture='$picture'
WHERE bookId='$bookId'";

mysqli_query($conn, $sql) or die("Update ผิดพลาด: " . mysqli_error($conn));

mysqli_close($conn);

header("location:bookList1.php");
exit();
?>
