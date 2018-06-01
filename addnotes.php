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
								
								
						} 
					?> </label>
					
					
					
			 <!-- Validation end  --> 		
            <form action="" method="post" >
             
				
				<br />
				<a href="viewenquiry.php?token=<?php echo $_GET['token']; ?>" >Trip Id : <?php echo $_GET['token']; ?></a>
				<br />  <br />
				<label >
                  <span>Notes</span>
				  <textarea name='notes' rows="7" cols="27"> </textarea>  
                </label><br /><br />
				<button  type='submit' name="add">Save</button>
            </form>

             <?php
			
				//adding note
					if(isset($_POST['add'])){
						if($admin=="1"){
							$bookingid=mysqli_real_escape_string($dbconn,trim(strip_tags(stripslashes($_GET['token']))));
							$notes=mysqli_real_escape_string($dbconn,trim(strip_tags(stripslashes($_POST['notes']))));
							$employee=$_SESSION['current_loggedin_user'];
							$today=date("d M y");
						    $query="INSERT INTO `notes`(`bookingid`, `notes`, `addedby`) VALUES ('$bookingid','$notes','$employee')";
							if($user=mysqli_query($dbconn,$query)){ 
								$notes="(".$today.") - ".$notes;
								mysqli_query($dbconn,"UPDATE `enquiries` SET `notes` = '$notes' WHERE `id` = '$bookingid'");
								echo "Note Added.";
							}
							
							else{
								echo "Failed: Please contact administrator.";
								echo mysqli_error($dbconn);
							}
					}
				}
	?>

<?php require_once('home/common/footer.fly'); ?>