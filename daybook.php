  <?php
 include_once("config.khan");
 include_once(CATALOG.SESSION);
 include_once('home/catalog/connect.khan');
 ?>
 
 <?php
		$totalcredit=0;
		$totaldebit=0;
		$checkout=date("Y-m-d");
		$query="SELECT * FROM `daybook`;";
		
		$products=mysqli_query($dbconn,$query) or die("db error");
		
		if($products){
				$count=0;
				while($row = mysqli_fetch_assoc($products)){
						$items[] = array(
							'ENTRYBY'			=>	$row['entryby'],
							'ENTRYTIME'			=>	$row['entrytime'],
							'DATE'			=>	$row['date'],
							'CLIENT'			=>	$row['paymentto'],
							'AMOUNT'		=>	$row['amount'],
							'TYPE'		=>	$row['type'],
							'DESC'		=>	$row['desc']
							
						);
					$count=	$count+1;
					
					
				}
			
			}
			else{
				echo "No data Found";
			}
			
   ?>

	
	
	
	
	<div >
          
            <div >
                <table >
                    <thead>
                        <tr>
                            <th>Client</th>
                            <th >Date</th>
							<th >Credit </th>
							<th >Debit</th>
							<th >Description</th>
							<th >Balance</th>
							<th >Entry made by</th>
							
                          
                        </tr>
                    </thead>
                    <tbody>
					<?php 
					$totalcredit = 0;
					$totaldebit	= 0;
					for($i=0; $i<$count; $i++){ 
					
					if($items[$i]['TYPE']=="Credit"){
						$totalcredit=$totalcredit+$items[$i]['AMOUNT'];
		
					}else{
						$totaldebit=$totaldebit+$items[$i]['AMOUNT'];
					}
					
					
					$balance=$totalcredit - $totaldebit;
					?>
				
						
					
                        <tr>
                            
							 
                            <td ><?php echo $items[$i]['CLIENT']; ?></td>
                     
							<td>
                                <span ><?php echo $items[$i]['DATE']; ?></span>
                            </td>
							<td>
                                <span ><?php if($items[$i]['TYPE']=="Credit") echo $items[$i]['AMOUNT']; ?></span>
								
                            </td>
							<td>
                                <span  style="background:red;"><?php if($items[$i]['TYPE']=="Debit") echo $items[$i]['AMOUNT']; ?></span>
                            </td>
							
							<td>
                                <span ><?php echo $items[$i]['DESC']; ?></span>
                            </td>
							<td>
                                <span style="font-size:18px;"><?php echo $balance; ?></span>
                            </td>
							<td>
                                <span ><?php echo $items[$i]['ENTRYBY']; ?> (<?php echo $items[$i]['ENTRYTIME'];?>)</span>
                            </td>
							
							</tr>
					
					
					
					
					<?php } ?>	
						
						
						
                    </tbody>
                </table>
            </div>
        </div><br></br> 