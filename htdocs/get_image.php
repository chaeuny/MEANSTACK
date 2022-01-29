<?php
$con = mysqli_connect("localhost","root","","hsh") or die(mysqli_connect_error());
$name = $_REQUEST['image_name'];
$image = mysqli_query($con, "SELECT * FROM board WHERE name='$name'");
$image = mysqli_fetch_assoc($image);
$image = $image['image_data'];
echo $image;
?>