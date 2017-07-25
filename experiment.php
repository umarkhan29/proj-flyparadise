<?php

include_once('home/catalog/connect.khan');
 $empid=62; //replace by empid
 $today=date("Y-m-d");
 $query="SELECT * FROM `reminder` WHERE `empid`=".$empid." and `time`like '".$today."%'";

$products=mysqli_query($dbconn,$query) or die(mysqli_error($dbconn));
$count=0;
$results="";
if($products){
		
		while($row = mysqli_fetch_assoc($products)){
				$results[] = array(
					'ID'			=>	$row['id'],
					'BOOKINGID'		=>	$row['bookingid'],
					'NOTES'			=>	$row['notes'],
					'TIME'			=>	$row['time']
				);
			$count=	$count+1;
		}
	
	}
	else{
		echo "No results Found";
	}
	
	
for($i=0; $i<$count; $i++){			
	
	$time_pre = strtotime($results[$i]['TIME']);//converting to unix time stamp
	$time_pre-=12660; // removing time zone conflict
	$time_post = strtotime(date("Y-m-d H:i:s"));

	
	echo $exec_time = $time_post - $time_pre."<br>";


?>

<script>
function startTime<?php echo $i; ?>() {
	
    var today = checkTime();
	
    var time_pre=0+"<?php echo $time_pre;?>";
	
	
	//define condition, add more time to
	if(today==time_pre){
		
	document.getElementById('notification').innerHTML = "<?php echo $results[$i]['NOTES']; ?>"; //$results[$i]['NOTES'] has notes for each reminder
	//alert("yes");
	exit;
		
	}else{
		
		var t = setTimeout(startTime<?php echo $i; ?>,4);
	}
}


	function checkTime() {
   var i=Math.round((new Date()).getTime() / 1000); //get unix timestamp
	
    return i;
}

</script>
<?php } ?>


<html>
<body onload="<?php for($i=0; $i<$count; $i++){ echo "startTime".$i."();"; } //check if employee is logedin : in case of same header everywhere for security reasons?>">
<div> </div>
	<div id="notification" >

	</div>
	
</body>
</html>