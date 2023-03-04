<?php
	$servername = "mydb.itap.purdue.edu";
	$username = "g1126566";
	$password = "WeLoveCorn!";
	$dbname = "g1126566";

	//create connection
	$conn = mysqli_connect($servername, $username, $password, $dbname);

	//check connection
	if (!$conn) {
		die ("Connection failed: " . mysqli_connect_error());
	}
	echo "Connected successfully";
   
/*   $sql = "SELECT DISTINCT computerID FROM Computer";
   $comp_numbers = mysqli_query($con,$sql);
   

	
	
	//After submitting
	
	
	//collect where statements
	//Start with empty string
	$where = '';
	
	//check if an input is null, then add it to where if it isn't null
	
	
	   //Close connection
	mysqli_close($conn);
*/
?>