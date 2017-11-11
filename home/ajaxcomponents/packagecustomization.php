<?php

//creating dynamic variables

$abc="iteration";
$dcount=$_GET['duration'];
$icount=$_GET['inclusion'];
$ecount=$_GET['exclusion'];
?>
<form action="customisepackage.php" method="POST">

	<input type="text" name="price"  placeholder="Price"/><br />
	<input type="text" name="hotel" placeholder="Hotel" /><br />
	<input type="text" name="cab" placeholder="Cab"/><br />
	<input type="text" name="flight" placeholder="Flight"/><br /><br /><br />
	
	
	
	<?php
//Defining Iterations
	for($i=1;$i<=$dcount;$i++){
		echo '<input type="text" name="iteration'.$i.'"placeholder="Iteration'.$i.'" />';
		echo "<br>";
	}
	
	echo "<br>";
//Defining Inclusions	
	for($i=1;$i<=$icount;$i++){
		echo '<input type="text" name="inclusion'.$i.'"placeholder="Inclusion'.$i.'" />';
		echo "<br>";
	}
	
	echo "<br>";
//Defining Exclusions	
	for($i=1;$i<=$ecount;$i++){
		echo '<input type="text" name="exclusion'.$i.'"placeholder="Exclusion'.$i.'" />';
		echo "<br>";
	}
	
	
	?>
	
	<input type="hidden" name="dcount" value="<?php echo $dcount; ?>"/>
	<input type="hidden" name="icount" value="<?php echo $icount; ?>" />
	<input type="hidden" name="ecount" value="<?php echo $ecount; ?>" />
	
	
	<input type="submit" value="Save" name="btn" />
</form>


