<?php

	$con = mysqli_connect("HostName", "User", "Pass", "DBName");
	
	if (mysqli_connect_errno($con)){
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	
	$agencyName = $_GET['agencyName'];
	
	$result = mysqli_query($con, "SELECT agencyID FROM agencies WHERE agencyName = '$agencyName'");

	$row = mysqli_fetch_array($result);
	$agencyID = $row[0];
	
	$result = mysqli_query($con, "SELECT routeShortName, direction FROM routes WHERE agencyID = '$agencyID' ORDER BY routeShortName ASC");

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
			<li>Agencies</li>
			<li>Routes</li>
		</ul>
		
		<h2>Arguments Required</h2>
		
		<ul>
			<li>agencyName</li>
		</ul>
		
		<h2>Attributes Returned</h2>
		
		<ul>
			<li>routeShortName</li>
			<li>direction</li>
		</ul>
	
	</body>

</html>
