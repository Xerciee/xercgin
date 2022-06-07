<?php

include('../include/dbcon.php');

$get_id = $_GET['ebook_id'];

$query = $con->query("SELECT * FROM ebooks WHERE ebook_id = '$get_id'");
$row = $query->fetch_array();
$target_file = "../ebooks/" . $row['up_file'];
unlink($target_file);
mysqli_query($con, "DELETE FROM ebooks WHERE ebook_id = '$get_id' ") or die(mysqli_error($con));
echo "<script>alert('Successfully deleted!');history.go(-1);</script>";