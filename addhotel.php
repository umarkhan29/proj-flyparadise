<?php
 	require_once('home/catalog/connect.khan');
	require_once('home/catalog/session.khan');
	require_once('home/components/employeeauthorize.fly');
 	require_once('home/common/employeeheader.fly');//adding employee header 
?>
<body>
<?php require_once('home/components/addhotel.fly');//adding hotel add module?>
<p>
		<form action="" method="POST">
			<input type="text" name="name" placeholder="Name"/><br />
			<input type="text" name="location" placeholder="Destination"/><br />
			<input type="text" name="place" placeholder="Place"/><br />
			<input type="text" name="stars" placeholder="Star Rating"/><br />
			<input type="text" name="desc" placeholder="Description"/><br /><br />
			Price : <br />
			
			<input type="text" name="jan2" placeholder="Jan - March (2 room)"/> <input type="text" name="jan3" placeholder="Jan - March(3 room)"/><br />
			<input type="text" name="april2" placeholder="April - June (2 room)"/> <input type="text" name="april3" placeholder="April - June(3 room)"/><br />
			<input type="text" name="july2" placeholder="July - Sep (2 room)"/> <input type="text" name="july3" placeholder="July - Sep(3 room)"/><br />
			<input type="text" name="oct2" placeholder="Oct - Dec (2 room)"/> <input type="text" name="oct3" placeholder="Oct - Dec(3 room)"/> <br /><br />
			
			<input type="text" name="meals" placeholder="Meals Price (Per Person)"/><br /><br />
			<br /><br />
			
			<input type="submit" name="btn" value="Add"/><br />
		</form>
		
</p>




<?php require_once('home/common/footer.fly');//adding employee header ?>

</body>
</html>
