<?php 

	include('../home/catalog/connect.khan');
    $from = $_GET['latitude'].",".$_GET['longitude'];
	$to=mysqli_real_escape_string($dbconn,trim(strip_tags(stripslashes($_GET['dest']))));
	$destination=mysqli_real_escape_string($dbconn,trim(strip_tags(stripslashes($_GET['destination']))));
	$from = urlencode($from);
	$to = urlencode($to);
	$data = file_get_contents("http://maps.googleapis.com/maps/api/distancematrix/json?origins=$from&destinations=$to&language=en-EN&sensor=false");
	$data = json_decode($data);
	$time = 0;
	$distance = 0;

	foreach($data->rows[0]->elements as $road) {
		$status=$road->status;
		if($status != 'ZERO_RESULTS'){
			$time += $road->duration->value;
			$distance += $road->distance->value;
		}
	}
	
	$time=$time/60; // to minutes
	$time=$time/60; // to hours
	
	$distance=$distance/1000; //to KMs
	
	//displaying distance time block
	if($status != 'ZERO_RESULTS'){
?>

		<div class='clouds'>
            <div class='clouds-1'></div>
            <div class='clouds-2'></div>
            <div class='clouds-3'></div>
        </div>
        <div class="info--destination">
            <p class=""><span><?php echo $destination; ?></span> is <span><?php echo number_format($distance, 2, '.', ''); ?></span> kilometres away</p>
            <div class="title--info">
                Fly out to <span><?php echo $destination; ?></span>, It's closer than you think!
            </div>
			
            <div class="animate">
                <img class="left" src="./assets/icons/house.svg" alt="">
                <span class="line"></span>
                <img class="right" src="./assets/icons/hotel.svg" alt="">
            </div>
			
            <span class="hours">Be there in just <?php  echo number_format($time, 2, '.', ''); ?> hour</span>
            <button>share with friends</button>
        </div>
<?php } ?>