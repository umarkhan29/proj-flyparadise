<?php
require_once('home/catalog/connect.khan');
require_once('home/catalog/session.khan');
require_once('home/components/employeeauthorize.fly');
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Update Packages</title>
</head>

<body>
<?php require_once('home/common/employeeheader.fly');//adding employee header  ?>


<form action="" method="post">
	<input type="text" name="blogs" placeholder="" />
	<input type="submit" value="Find" />
</form>

<?php
	$uid=111; //update session here
	if(isset($_POST['blogs'])){
		$token=mysqli_real_escape_string($dbconn,trim(strip_tags(stripslashes($_POST['blogs']))));
		$query="SELECT * FROM `blog` WHERE (`id`='$token' or  `author` like  '%".$token."%' or `about` like  '%".$token."%') AND `uid` = '$uid' ";
	}
	else
	{	
		
		$query="SELECT * FROM `blog` WHERE `uid`='$uid' ";
	}
		if($result = mysqli_query($dbconn,$query)){
				$blog;
				$count=0;
				while($row = mysqli_fetch_assoc($result)){
					$blog[] = array(
							
							'ID'		=>	$row['id'],
							'PATH' 		=> 	$row['imgpath'],
							'AUTHOR' 	=> 	$row['author'],
							'ABOUT' 	=> 	$row['about'],
							'CONTENT' 	=> 	$row['content'],
							'THUMB' 	=> 	$row['thumb'],
							'TYPE'		=> 	$row['blogtype'],
							'DATE'		=> 	$row['date'],
						);
						 $count=$count+1;
						
				}
				
			}
			else{
				echo mysqli_error($dbconn);
			}
	
?>
<br />
	<div>
		<table border="2">
			<th>ID</th>
			<th>Author</th>
			<th>About</th>
			<th>Tag</th>
			<th>Update</th>
			<?php for($i=0; $i<$count; $i++){ ?>
				<tr>
					<td> <?php echo $blog[$i]['ID']; ?> </td>
					<td>  <?php echo $blog[$i]['AUTHOR']; ?> </td>
					<td>  <?php echo $blog[$i]['ABOUT']; ?> </td>
					<td>  <?php echo $blog[$i]['TYPE']; ?> </td>
					<td>  <a href="updateblog.php?token=<?php echo $blog[$i]['ID']; ?>" > Update </a> </td>
				</tr>
			<?php } //ending for ?> 
	
		</table>
	</div>
<?php require_once('home/common/footer.fly'); ?>
</body>
</html>
