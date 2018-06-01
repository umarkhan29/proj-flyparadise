<?php

include_once('home/catalog/connect.khan');
 $employee=$_SESSION['current_loggedin_user'];
 $today=date("Y-m-d");
 
 if($_SESSION['current_loggedin_user_role'] == 'admin')
	 $query="SELECT * FROM `reminder` WHERE `time` like '".$today."%' AND `flag` = 'No'";
 else
	$query="SELECT * FROM `reminder` WHERE (`reminderby`='".$employee."' OR `bookingassignedto` = '".$employee."') and `time` like '".$today."%' AND `flag` = 'No'";


$rem=mysqli_query($dbconn,$query) or die(mysqli_error($dbconn));
$count=0;
$ncount=0;
if($rem){
		
		while($row = mysqli_fetch_assoc($rem)){
				$results[] = array(
					'ID'			=>	$row['id'],
					'BOOKINGID'		=>	$row['bookingid'],
					'NOTES'			=>	$row['notes'],
					'TIME'			=>	$row['time'],
					'REMINDERBY'	=>	$row['reminderby'],
					'ASSIGNEDTO'	=>	$row['bookingassignedto']
				);
			$count=	$count+1;
			$ncount=$ncount+1;
		}
	
	}
	else{
		echo "No results Found";
	}
	
	
	
	//getting delayed notification list
	if($_SESSION['current_loggedin_user_role'] == 'admin')
	 $query="SELECT * FROM `delayednotifications` WHERE `remindertime` like '".$today."%' AND `flag` = 'No'";
 else
	$query="SELECT * FROM `delayednotifications` WHERE (`bookingassignedto` = '".$employee."') and `remindertime` like '".$today."%' AND `flag` = 'No'";

$delaycount=0;
$delayrem=mysqli_query($dbconn,$query) or die(mysqli_error($dbconn));
if($delayrem){
		
		while($row = mysqli_fetch_assoc($delayrem)){
				$delayedresults[] = array(
					'ID'			=>	$row['id'],
					'BOOKINGID'		=>	$row['bookingid'],
					'NOTES'			=>	$row['notes'],
					'TIME'			=>	$row['remindertime'],
					'REMINDERBY'	=>	$row['reminderby'],
					'ASSIGNEDTO'	=>	$row['bookingassignedto']
				);
			$count=	$count+1;
			$delaycount=$delaycount+1;
		}
	
	}

	if($ncount>0 AND $delaycount>0)
			$results=array_merge($results,$delayedresults);
	
	if($ncount==0 AND $delaycount>0)
		$results=$delayedresults;
		
for($i=0; $i<$count; $i++){			
	
	$time_pre = strtotime($results[$i]['TIME']);//converting to unix time stamp
	$time_pre-=12600; // removing time zone conflict //19800 for producttion
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
	document.getElementById('notification').innerHTML += "<a style='color:#ffffff !important; cursor:pointer;' href='viewenquiry.php?token=<?php echo $results[$i]['BOOKINGID']; ?>' >Trip Id: <?php echo $results[$i]['BOOKINGID']; ?>    <br /><?php echo "Reminder : ".$results[$i]['NOTES']; ?> <br /><?php echo "Reminder By : ".$results[$i]['REMINDERBY']; ?> <br /> <?php echo "Assigned to: ".$results[$i]['ASSIGNEDTO']; ?>  </a> <br> <br>"; 
	
	
	//alert("yes");
	
	
	
	//send sms here
	
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

<div id="notification" style="padding:10px; margin:auto; color:#ffffff; background:#245f76; border:1px solid black;">
		 
</div>


<script>
	<?php for($i=0; $i<$count; $i++){ echo "startTime".$i."();"; } //check if employee is logedin : in case of same header everywhere for security reasons?>
</script>

	
