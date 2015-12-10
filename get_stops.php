<?php

	$con = mysqli_connect("HostName", "User", "Pass", "DBName");
	
	if (mysqli_connect_errno($con)){
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	
	$routeShortName = $_GET['routeshortname'];
	
	$result = mysqli_query($con, "SELECT routeID FROM routes WHERE routeShortName = '$routeShortName'");

	$row = mysqli_fetch_array($result);
	$routeID = $row[0];
	
	$result = mysqli_query($con, " busstop.stopID, busstop.stopName, has.sequence FROM busstops, has WHERE has.routeID = '$routeID' and busstop.stopID = has.stopID ORDER BY has.sequence ASC");

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
			<li>BusStops</li>
			<li>Has</li>
			<li>Routes</li>
		</ul>
		
		<h2>Arguments Required</h2>
		
		<ul>
			<li>routeShortName</li>
		</ul>
		
		<h2>Attributes Returned</h2>
		
		<ul>
			<li>Has.sequence</li>
			<li>BusStop.stopID</li>
			<li>BusStop.stopName</li>
		</ul>
	
	</body>

</html>
