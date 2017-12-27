<?php
	require_once('../catalog/connect.khan');
	require_once('../catalog/session.khan');
?>

<?php
//fetch blogs
$blogsearch=mysqli_real_escape_string($dbconn,trim(strip_tags(stripslashes($_GET['blogsearch']))));


	$query = "SELECT * FROM `blog` WHERE  ";
	if($blogsearch!=""){
		$query.=" (`author` like '%$blogsearch%' OR `about` like '%$blogsearch%') ";
	}
    $query.="order by `id` ;";
	if($result = mysqli_query($dbconn,$query)){
		$blogs;
		$count=0;
		while($row = mysqli_fetch_assoc($result)){
			$blogs[] = array(
					
					'ID'		=>	$row['id'],
					'PATH' 		=> 	$row['imgpath'],
					'AUTHOR' 	=> 	$row['author'],
					'ABOUT' 	=> 	$row['about'],
					'CONTENT' 	=> 	$row['content'],
					'THUMB' 	=> 	$row['thumb'],
					'TYPE'		=> 	$row['blogtype'],
					'DATE'		=> 	$row['date'],
				);
				 $count=$count+1;
				
		}
		
	}
	else{
		echo mysqli_error($dbconn);
	}


?>		
<?php for($i=0;$i<$count;$i++) {  //Loading Packages ?>
			<li>
                <div class="teaser-article border">
                    <img src="<?php echo $blogs[$i]['THUMB']; ?>" alt="">
                    <div class="teaser--div">
                        <h3><?php echo $blogs[$i]['ABOUT']; ?></h3>
                        <p class="teaser"><?php echo $trimtext=substr($blogs[$i]['CONTENT'],3,150); ?></p>
                        <div class="comments">
                            <img src="./assets/icons/social/comment.svg" alt="">
                            <span>22 Comments</span>
                        </div>
                        <div class="author">
                            <img src="./assets/blogs/author/junaid.jpeg" alt="">
                            <div class="credts">
                                <span class="name"><?php echo $blogs[$i]['AUTHOR']; ?></span>
                                <span class="date">
								<?php 
									$dt = new DateTime($blogs[0]['DATE']);
									echo $date = $dt->format('jS F Y');
									$i=$i+1;
								?>	
								</span>
                            </div>
                        </div>
                        <img class="sharing" src="./assets/icons/social/share.svg" alt="">
                    </div>
                </div>
				
				<?php if($i!=$count){ ?>
                <div class="teaser-article border">
                    <img src="<?php echo $blogs[$i]['THUMB']; ?>" alt="">
                    <div class="teaser--div">
                        <h3><?php echo $blogs[$i]['ABOUT']; ?></h3>
                        <p class="teaser"><?php echo $trimtext=substr($blogs[$i]['CONTENT'],3,150); ?></p>
                        <div class="comments">
                            <img src="./assets/icons/social/comment.svg" alt="">
                            <span>22 Comments</span>
                        </div>
                        <div class="author">
                            <img src="./assets/blogs/author/junaid.jpeg" alt="">
                            <div class="credts">
                                <span class="name"><?php echo $blogs[$i]['AUTHOR']; ?></span>
                                <span class="date">
								<?php 
									$dt = new DateTime($blogs[0]['DATE']);
									echo $date = $dt->format('jS F Y');
								?>	
								</span>
                            </div>
                        </div>
                        <img class="sharing" src="./assets/icons/social/share.svg" alt="">
                    </div>
                </div>
				<?php } //closing if ?>
            </li>
	
<?php }  ?>  