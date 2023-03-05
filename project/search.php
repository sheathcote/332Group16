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
   
	function test_input($data) {
		# format the data appropriately
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		if ($data == "NULL") {
			$data = NULL;
		}
		return $data;
	}

	function addToWhere($data, $columnName, $where) {
		if ($data != NULL) {
			if ($where == "") {
				$where = "WHERE " . $columnName . " = " . $data;
			} else {
				$where .= " AND " . $columnName . " = " . $data;
			}
		}
		return $where;
	}

	function addToWhereString($data, $columnName, $tableName, $where) {
		if ($data != NULL) {
			if ($where == "") {
				$where = "WHERE " . $tableName . "." . $columnName . " = '" . $data . "'";
			} else {
				$where .= " AND " . $tableName . "." . $columnName . " = '" . $data . "'";
			}
		}
		return $where;
	}
	

	$computerID = "computerID";
	$accessLevel = "accessLevel";
	$OS = "OS";
	$compid = $access = $os = "";
	//parse the data
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$compid = test_input($_POST["compid"]);
		//echo "<br> Computerid = " . $compid;
		$access = test_input($_POST["access"]);
		$os = test_input($_POST["os"]);
	}

	//initialize where statement to be empty
	$where = "";
	//table names
	$computerTable = 'C';
	$secondmemtable = 'S';
	$monitortable = 'M';
	//if it is not null, make it a where statement
	$where = addToWhere($compid, $computerID, $computerTable, $where);
	$where = addToWhere($access, $accessLevel, $computerTable, $where);
	$where = addToWhereString($os, $OS, $computerTable, $where);

	//Run SQL query
	$query = "SELECT * FROM Computer C, SecondaryMemory S, Monitor M " . $where . " ORDER BY computerID";

	echo "<br> query: " . $query . "<br>";


	$result = mysqli_query($conn, $query);
   echo "<table border = 1>";
   if(mysqli_num_rows($result) > 0) {
      while ($row = mysqli_fetch_assoc($result)) {
         echo "<tr>";
         echo "<td>" .$row["computerID"]."</td><td>".$row["CPU"]. "</td><td>" .$row["GPU"]."</td>";
         echo "</tr>";
         echo "<br>";
      }
   } else {
      echo "0 results";
   }
   echo "<table>";

/*   $sql = "SELECT DISTINCT computerID FROM Computer";
   $comp_numbers = mysqli_query($con,$sql);
   

	
	
	//After submitting
	
	
	//collect where statements
	//Start with empty string
	$where = '';
	
	//check if an input is null, then add it to where if it isn't null
	
	*/
	//Close connection
	mysqli_close($conn);

?>