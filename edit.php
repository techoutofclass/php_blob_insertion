<?php
	include 'DBConnect.php';

	$id=$_GET['id'];
	$sql="UPDATE FROM `tbl_images` WHERE id='$id' ";
	mysqli_query($conn,$sql);
		header("Location: index.php");


?>