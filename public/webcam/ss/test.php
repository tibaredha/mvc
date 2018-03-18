<?php
$uc=$_REQUEST['uc'];
$jpeg_data=file_get_contents('php://input');
$filename = $uc. '.jpg';
$result = file_put_contents( $filename,$jpeg_data  );
$url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['REQUEST_URI']) . '/' . $filename;
print "$url\n";

?>
