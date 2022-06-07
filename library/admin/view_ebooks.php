<?php
include '../include/dbcon.php';

$query = $con->query("SELECT * FROM ebooks WHERE ebook_id = '$_GET[ebook_id]'");
$row = $query->fetch_array();


$filename = '../ebooks/' . $row['up_file'];
header('Content-type: application/pdf');
header('Content-Disposition: inline; filename="' . $filename . '"');
header('Content-Transfer-Encoding: binary');
header('Content-Length: ' . filesize($filename));
header('Accept-Ranges: bytes');
@readfile($filename);