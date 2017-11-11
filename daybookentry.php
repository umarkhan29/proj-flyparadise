 <?php
 include_once("config.khan");
 include_once(CATALOG.SESSION);
 
 ?>
		  
		  <!-- Validation here  --> 
		      <label > <?php 
			  
						if(isset($_POST['booknow'])){
							$admin="1";
								

								if($_POST['date']==""){
								$admin="0";
								echo "**Enter Date".'</br>';
								}
								

							
								
								
								if($_POST['client']==""){
								$admin="0";
								echo "**Enter client name".'</br>';
							}
							else{
									if(preg_match("%^[a-z A-Z 0-9 - .,!@&$]{4,77}$%",$_POST['client'])){
									
									}	
									else{
									$admin="0";
									echo "**Invalid client name".'</br>';
									}
							}
								
								
								
								if($_POST['amount']==""){
								$admin="0";
								echo "**Enter Price".'</br>';
								}
								else{
									if(preg_match("%^[0-9]{1,10}$%",$_POST['amount'])){
									
									}	
									else{
									$admin="0";
									echo "**Enter a valid amount".'</br>';
									}
								}
								
								
								if($_POST['desc']=="") $_POST['desc']="Not Avaliable";
								
								
						} 
					?> </label>
					
					
					
			 <!-- Validation end  --> 		
            <form class="order" action="" method="post" >
             
				
				
              <label >
                  <span>Date</span>
                   <input type="date" name='date'>
                </label>
				<br /><br />
				<label >
                  <span>Client</span>
                   <input type="text" name='client'>
                </label>
				<br />  <br />
				<label>
                <span>Type of transaction:</span>
                <select name='ttype' class='select_white'  >
                 
                  <option>Credit</option>
                  <option>Debit</option>
                </select> 
              </label>  
			  <br />  <br />
                <label >
                  <span>Amount</span>
                  <input type="text" name='amount'>
                </label>
				  <br />  <br />
				<label >
                  <span>Description</span>
				  
                  <textarea name='desc'></textarea>
                </label>
				  <br />  <br />
				   <label >
                  <span></span>
                  <button  type='submit' name="booknow">Save</button>
                </label>
			
              <div class="clearfix"></div>
              
            </form>

             <?php
				
					if(isset($_POST['booknow'])){
						if($admin=="1"){
							include_once('home/catalog/connect.khan');
							$date=mysqli_real_escape_string($dbconn,trim(strip_tags(stripslashes($_POST['date']))));
							$date=date("Y-m-d", strtotime($date));
							$amount=mysqli_real_escape_string($dbconn,trim(strip_tags(stripslashes($_POST['amount']))));
							$ttype=mysqli_real_escape_string($dbconn,trim(strip_tags(stripslashes($_POST['ttype']))));
							$desc=mysqli_real_escape_string($dbconn,trim(strip_tags(stripslashes($_POST['desc']))));
							$entryby=$_SESSION['current_loggedin_user'];
							$client=mysqli_real_escape_string($dbconn,trim(strip_tags(stripslashes($_POST['client']))));
						    $query="INSERT INTO `daybook` (`entryby`,`date`, `type`, `amount`, `desc`,`paymentto`) VALUES ('$entryby','$date','$ttype','$amount','$desc','$client');";
							if($user=mysqli_query($dbconn,$query)){  
								echo "Entry Added.";
							}
							
							else{
								echo "Failed: Please contact administrator.";
							}
					}
				}
	?>

