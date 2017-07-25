
<?php
	ob_start();
	include_once('../catalog/connect.khan');
?>



<?php

	$count=0;
	
	if(isset($_GET['searchtxtbox'])){
		
		$keywords = mysql_real_escape_string(trim(strip_tags(stripslashes($_GET['searchtxtbox']))));
	
		if($keywords){
			
			$searching = new Search($keywords);
			$result = $searching->result; 
			$resultCount = $searching->resultCount;
			
			if($result){
				$searchResults;
				while($row = mysqli_fetch_assoc($result)){
					$searchResults[] = array(
							
							'ID'			=>	$row['id'],
							'TITLE'			=>	$row['title'],
							'DESTINATION' 	=> 	$row['destination'],
							'PRICE' 		=> 	$row['price']
						);
						 $count=$count+1;
						
				}
				
			}
			else{
				
				echo ('<div style="font-family:Arial, Helvetica, sans-serif; padding:5px; font-size:40px; color:#602D8D; background-color:#414045; width:60%; height:100px; margin:auto; 								margin-top:40px; margin-bottom:40px; padding-left:225px; padding-top:30px; border-radius:7px;">No results found ! </div> ');
				
			}
		}
		else{
				echo ('<div style="font-family:Arial, Helvetica, sans-serif; padding:5px; font-size:40px; color:#602D8D; background-color:#414045; width:60%; height:100px; margin:auto; 	margin-top:40px; margin-bottom:40px; padding-left:120px; padding-top:30px; border-radius:7px;">Enter atleast one keyword to search anything !</div>');
				
		}

	}
		

	class Search{
		private $search_keywords = "";
		public $result;
		public $resultCount;
		function __construct($keywords){
			$this->resultCount = 0;
			$this->search_keywords = $this->splitKeywords($keywords);
			
			$this->result = $this->searchNow();
		}
		private function searchNow(){
			if(count($this->search_keywords) == 0){
				return FALSE;
			}
			$dbconn=mysqli_connect('localhost','root','') or die('could not connect');
			mysqli_select_db($dbconn,'flyparadise') or die('database error');
			 $query = $this->getQuery();
			if($result = mysqli_query($dbconn,$query)){
				
				if(mysqli_num_rows($result)!=0){
					$this->resultCount = mysqli_num_rows($result);
					
					return $result;
				}
				return FALSE;
			}
			else{
				echo mysqli_error($dbconn);
				echo "bihbb";
			}
			return FALSE;


		}
		private function splitKeywords($keywords){
			$words = preg_split('/\s+/', $keywords);
			return $words;
		}
		private function getQuery(){
			$count = count($this->search_keywords);
			$words = $this->search_keywords;
			$query = "SELECT * FROM `packages` WHERE ";
			
			$where = "";
			for($i = 0; $i < $count; $i++){
				$where .= "`title` like '%$words[$i]%'";
				if($i != $count-1){
					$where .= ' OR ';
				}
			}
			
			$where .= ' OR ';
			for($i = 0; $i < $count; $i++){
				$where .= "`destination` like '%$words[$i]%'";
				if($i != $count-1){
					$where .= ' OR ';
					}
					}
					
					
			$where .= ' OR ';
			for($i = 0; $i < $count; $i++){
				$where .= "`duration` like '%$words[$i]%'";
				if($i != $count-1){
					$where .= ' OR ';
				}
			}
			
			$where .= ' OR ';
			for($i = 0; $i < $count; $i++){
				$where .= "`price` like '%$words[$i]%'";
				if($i != $count-1){
					$where .= ' OR ';
				}
			}
			
			$where .= ' OR ';
			for($i = 0; $i < $count; $i++){
				$where .= "`hotelstar` like '%$words[$i]%'";
				if($i != $count-1){
					$where .= ' OR ';
				}
			}
			
			$query .= $where;
			//echo $query;
			return $query;
		}
	}
?>




 <div class="main">
    <div class="content">
    	<div class="content_top">
    		<div class="heading">
    		<h3>Search Results</h3>
    		</div>
    		
    		
    		
    		<div class="clear"></div>
    	</div>
	      <div class="section group">
		  

		  	<?php
				
				for($i=0;$i<$count;$i++){
					
			?>
				<div class="grid_1_of_4 images_1_of_4">
					
					 <h2><?php echo $searchResults[$i]['TITLE'];?></h2>
					 <p><?php echo $searchResults[$i]['DESTINATION'];?></p>
					 <p>Rs <span class="strike"><?php echo $searchResults[$i]['PRICE']?></span><span class="price"></span></p>
					 
				</div>
			
			<?php
				} //close for
				
				
			?>
			
			
			
    		
    		
    		<div class="clear"></div>
    	</div>
			
    </div>
 </div>
<div>


<?php
ob_end_flush();
?>






