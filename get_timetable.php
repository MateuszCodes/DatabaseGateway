<?php

	$con = mysqli_connect("HostName", "User", "Pass", "DBName");
	
	if (mysqli_connect_errno($con)){
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	
	$routeID = $_GET['routeid'];
	$stopID = $_GET['stopid'];
	$direction = $_GET['direction'];
	
	$result = mysqli_query($con, "SELECT  timeVal FROM timetables WHERE routeID = '$routeID' AND stopID = '$stopID' AND direction = '$direction' ORDER BY timeVal ASC");
	
	$row = mysqli_fetch_array($result);
	$data = $row[0];
	
	if($data){
		echo $data;
	}
	
	mysqli_close($con);
?>

<html>

	<body>
	
		<h2>Tables Used</h2>
		
		<ul>
			<li>Timetables</li>
		</ul>
		
		<h2>Arguments Required</h2>
		
		<ul>
			<li>direction</li>
			<li>routeID</li>
			<li>stopID</li>
		</ul>
		
		<h2>Attributes Returned</h2>
		
		<ul>
			<li>time</li>
		</ul>
	
	</body>

</html>
