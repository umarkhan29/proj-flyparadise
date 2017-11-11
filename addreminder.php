 <?php
 include_once("config.khan");
 include_once(CATALOG.SESSION);
 
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
				
					if(isset($_POST['add'])){
						if($admin=="1"){
							include_once('home/catalog/connect.khan');
							$notes=mysqli_real_escape_string($dbconn,trim(strip_tags(stripslashes($_POST['notes']))));
							$time=mysqli_real_escape_string($dbconn,trim(strip_tags(stripslashes($_POST['date']))));
							$time.=mysqli_real_escape_string($dbconn,trim(strip_tags(stripslashes($_POST['time']))));
							$time=date("Y-m-d H:i:s", strtotime($time));
							$bookingid=56;
							$empid=67;
							
						    $query="INSERT INTO `reminder`(`bookingid`, `empid`, `notes`, `time`) VALUES ('$bookingid','$empid','$notes','$time')";
							if($user=mysqli_query($dbconn,$query)){  
								echo "Entry Added.";
							}
							
							else{
								echo "Failed: Please contact administrator.";
								echo mysqli_error($dbconn);
							}
					}
				}
	?>

