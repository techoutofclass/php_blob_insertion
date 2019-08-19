<?php
	include 'DBConnect.php';

	$id=$_GET['id'];
	$sql="DELETE FROM `tbl_images` WHERE id='$id' ";
	mysqli_query($conn,$sql);
		header("Location: index.php");


?>