 <?php
 if(!isset($_GET['token']))
	header('location:viewenquiries');

require_once('home/catalog/connect.khan');
require_once('home/catalog/session.khan');
require_once('home/common/employeeheader.fly');//adding employee header 
require_once('home/components/employeeauthorize.fly');

?>
		  
		  <!-- Validation here  --> 
		      <label > <?php 
			  
						if(isset($_POST['add'])){
							$admin="1";
								
								if($_POST['notes']==""){
								$admin="0";
								echo "**Enter your Remider".'</br>';
								}
								
								
								if($_POST['time']==""){
								$admin="0";
								echo "**Enter Date/Time".'</br>';
								}
					
						} 
					?> </label>
					
					
					
			 <!-- Validation end  --> 		
            <form class="order" action="" method="post" >
             
				
			  <br />  <br />
				
				<label >
                  <span>Reminder</span>
                   <input type="text" name='notes'>
                </label>
				
			  <br />  <br />
                <label >
                  <span>Date</span>
                  <input type="date" name='date'>
                </label>
				  <br />  <br />
				  
				  <label >
                  <span>Time</span>
                  <input type="time" name='time'>
                </label>
				  <br />  <br />
				
                  <button  type='submit' name="add">Save</button>
                </label>
			
              <div class="clearfix"></div>
              
            </form>

             <?php
				//getting employee towhich query is assigned
				$bookingid=mysqli_real_escape_string($dbconn,trim(strip_tags(stripslashes($_GET['token']))));
				
			    $query="SELECT * FROM `enquiries` WHERE `id` = '$bookingid' LIMIT 1";

				$res=mysqli_query($dbconn,$query) or die(mysqli_error($dbconn));
				
				if($rem){
						
						while($row = mysqli_fetch_assoc($res)){
								$nresults[] = array(
									
									'ASSIGNEDTO'	=>	$row['assignedto']
								);
							
						}
					
					}
					else{
						echo "No results Found";
					}

				 $assignedto=$nresults[0]['ASSIGNEDTO'];
				
				
				
				//adding reminder
					if(isset($_POST['add'])){
						if($admin=="1"){
							$bookingid=mysqli_real_escape_string($dbconn,trim(strip_tags(stripslashes($_GET['token']))));
							$rnotes=mysqli_real_escape_string($dbconn,trim(strip_tags(stripslashes($_POST['notes']))));
							$time=mysqli_real_escape_string($dbconn,trim(strip_tags(stripslashes($_POST['date']))));
							$time.=mysqli_real_escape_string($dbconn,trim(strip_tags(stripslashes($_POST['time']))));
							$time=date("Y-m-d H:i:s", strtotime($time));
							$employee=$_SESSION['current_loggedin_user'];
							$today=date("d M y");
						    $query="INSERT INTO `reminder`(`bookingid`, `reminderby`, `notes`, `time`, `bookingassignedto`) VALUES ('$bookingid','$employee','$rnotes','$time', '$assignedto')";
							if($user=mysqli_query($dbconn,$query)){ 
								$remid=mysqli_insert_id($dbconn); //getting reminder id
								$notes="(".$today.") - ".$rnotes;
								mysqli_query($dbconn,"UPDATE `enquiries` SET `notes` = '$notes' WHERE `id` = '$bookingid'");
								
								
								//deleting old delay notification
								
								mysqli_query($dbconn,"DELETE FROM `delayednotifications` WHERE `bookingid` = '$bookingid'");
								
								//storing delay notifications list
								
									
									$remindertime= date('Y-m-d H:i:s',strtotime('+1 hour',strtotime($time))); //adding 2 hours in actual time for delayed notification
									$rnotes="Delayed Notification --- ".$rnotes;
									$query="INSERT INTO `delayednotifications` (`bookingid`, `reminderid`, `reminderby`, `remindertime`, `notes`,  `bookingassignedto`) VALUES ('$bookingid','$remid', '$employee', '$remindertime', '$rnotes', '$assignedto')";
							
									if(mysqli_query($dbconn,$query)){ 
										
										echo "Entry Added."; //displaying message on addimg reminder and delayed notofication reminder
									}
									
									else{
										echo "Failed: Failed Seting delayed notification";
										echo mysqli_error($dbconn);
									}

	
	
								
							}
							
							else{
								echo "Failed: Please contact administrator.";
								echo mysqli_error($dbconn);
							}
					}
				}
	?>

<?php require_once('home/common/footer.fly'); ?>