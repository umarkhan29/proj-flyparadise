<?php

include_once('home/catalog/connect.khan');
 $empid=67; //replace by empid
 $today=date("Y-m-d");
 $query="SELECT * FROM `reminder` WHERE `empid`=".$empid." and `time`like '".$today."%'";

$products=mysqli_query($dbconn,$query) or die(mysqli_error($dbconn));
$count=0;
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
	$time_pre-=16200; // removing time zone conflict //19720 for producttion
	$time_post = strtotime(date("Y-m-d H:i:s"));

	$exec_time = $time_post - $time_pre; //for testing purposes


?>

<script>
function startTime<?php echo $i; ?>() {
	
    var today = checkTime();
	
    var time_pre=0+"<?php echo $time_pre;?>";
	
	
	//define condition, add more time to
	if(today==time_pre){
		//audio
	var audio = new Audio('sound/not2.mp3');
	audio.volume = 1;
	audio.play();

	//displaying reminder content
	document.getElementById('notification').innerHTML = "<?php echo "Reminder : ".$results[$i]['NOTES']; ?>"; //$results[$i]['NOTES'] has notes for each reminder
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

<div id="notification" style="padding:10px; margin:auto; color:red;">
		 
</div>


<script>
	<?php for($i=0; $i<$count; $i++){ echo "startTime".$i."();"; } //check if employee is logedin : in case of same header everywhere for security reasons?>
</script>

	
