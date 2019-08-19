<!DOCTYPE html>
<html>
<head>
	<title>image</title>
	<style type="text/css">
		td {
			padding: 0px;
			/*border: solid 1px;*/
		}
	</style>
	<link rel="stylesheet" type="text/css" href="bootstrap.min.css">
</head>	
<body>
	<?php
		include 'DBConnect.php';
	?>
	<form method="post" enctype="multipart/form-data">
		<input type="file" name="img" required>
		<input type="submit" name="submit" value="save" required>
	</form>
	<?php
		if(isset($_POST['submit']))
		{
			$filename = addslashes($_FILES["img"]["name"]);
			$tempname = addslashes(file_get_contents( $_FILES["img"]["tmp_name"]));
			$filetype = addslashes($_FILES["img"]["type"]);

			$array = array("jpg","jpeg","JPG","JPEG","png","PNG");
			$ext = pathinfo($filename,PATHINFO_EXTENSION);
			if(!empty($filename)){
				if(in_array($ext, $array)){
					$sql= "INSERT into tbl_images (name,image) values ('$filename','$tempname')";
					mysqli_query($conn,$sql);
				}
				else{

					echo "<script>
 						 alert('unsupported File Format');
						</script>";
				}

			}
			else{
			}
		}
$sql = "SELECT * FROM tbl_images ";
$sth=mysqli_query($conn,$sql);
// $sth = $conn->query($sql);
?>
<table class="table">
  <tr>
    <th>name</th>
    <th>image</th>
    <th>Delete</th>
  </tr>
 
  
		
<?php
while ($result=mysqli_fetch_array($sth)) {	

		?>
		 <tr>

<td> <?php echo $result['name'] ?></td>
 <?php
 echo '<td><img src="data:image/jpeg;base64,'.base64_encode( $result['image'] ).' " height="150px" /></td>';
 echo " 
 		<td><a href='delete.php?id=$result[id]'>Delete</td>";
 		}
 ?>
    
  
		
<!-- <td>image</td> -->
		<?php







	
	?>
	
		</tr>

	</table>
</body>
</html>


