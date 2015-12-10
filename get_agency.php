<?php

	$con = mysqli_connect("<hostName>", "<user>", "<pass>", "<DBName>");
	
	if (mysqli_connect_errno($con)){
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}

	$result = mysqli_query($con, "SELECT agencyName FROM agencies ORDER BY agencyName ASC");

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
		</ul>
		
		<h2>Arguments Required</h2>
						
		<h2>Attributes Returned</h2>
		
		<ul>
			<li>agencyName</li>
		</ul>
	
	</body>

</html>
