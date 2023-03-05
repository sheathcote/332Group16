<html>

<?php

//Takes in a column and table name and creates a dropdown with options from that column
//dataName is how the column is referred to in the php data parsing
function createDropDown($columnName, $tableName, $dataName) {
// Establish a connection to the database
$servername = "mydb.itap.purdue.edu";
$username = "g1126566";
$password = "WeLoveCorn!";
$dbname = "g1126566";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Write a SQL query to select the data you want to populate in the dropdown
$sql = "SELECT DISTINCT " . $columnName . " FROM " . $tableName . " ORDER BY " . $columnName;

// Execute the SQL query
$result = $conn->query($sql);

// Loop through the result set and create an HTML <option> tag for each row in the result set
$options = "<option value=NULL></option>";
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $options .= "<option value='" . $row[$columnName] . "'>" . $row[$columnName] . "</option>";
    }
}

// Create the HTML <select> tag and add the $options variable containing the <option> tags to it
$select = "<select id=" . $dataName . " name=" . $dataName . ">" . $options . "</select>";

// Output the HTML <select> tag to the browser
echo $select;
}
?>

<head>
      <title>Group 16</title>
      <link href="project.css" rel="stylesheet" type="text/css" media="screen" />			    
</head>

<!-- Accessories, Hardware, Location, power supply, dvdrom, os, access level-->

<body>
<div id="main">
   <div class="container">
	   <div id="header">
		   <div id="logo">
		   </div>

    		<div id="tagline">
        	   <h3>Computer Resources</h3>
		   </div>
         <div style="clear:both"></div>
    		
         <ul id="menu">
           <li><a href="main.html">Home</a></li>
           <li><a href="search.html">Search</a></li>
           <li><a href="reservation_form.html">Reserve</a></li>
	       </ul>
         <div style="clear:both"></div>
      </div>

      <div id="content">
		
		<div id="form" class="dropdown">
		
		<h3>Search</h3>
		<h5>Filter by hardware specifications, accessories, and/or location.</h5>
		<h5>Note: to see all computers select "ALL" under computer ID number in hardware specifications</h5>
	
		<form id="search" method="post" action=search.php>
		
		<table style="position:absolute; bottom:100px;">
			
			<th ALIGN="center" colspan="2">Computer Specifications</th>
			
			<tr><td ALIGN="center">Computer ID Number:</td>
			<td ALIGN="center">
			<?php
			createDropDown ('computerID', 'Computer', 'compid');
			?>
			</td>
			</tr>
			<br><br>
			
			<tr><td ALIGN="center">Access Level</td>
			<td ALIGN="center">
			<?php
			createDropDown ('accessLevel', 'Computer', 'access');
			?>
			</td>
			</tr>
			<br><br>
			
			<tr><td ALIGN="center">Operating System</td>
			<td ALIGN="center">
			<?php
			createDropDown ('OS', 'Computer', 'os');
			?>
			</td>
			</tr>
			<br><br>
			
			<tr><td ALIGN="center">CPU:</td>
			<td ALIGN="center">
			<?php
			createDropDown ('CPU', 'Computer', 'cpu');
			?>
			</td>
			</tr>
			<br><br>
			
			<tr><td ALIGN="center">CPU Heatsink</td>
			<td ALIGN="center">
			<?php
			createDropDown ('CPUheatsink', 'Computer', 'heat');
			?>
			</td>
			</tr>
			<br><br>
			
			<tr><td ALIGN="center">RAM:</td>
			<td ALIGN="center">
			<?php
			createDropDown ('RAM', 'Computer', 'ramstor');
			?>
			</td>
			</tr>
			<br><br>
			
			<tr><td ALIGN="center">GPU:</td>
			<td ALIGN="center">
			<?php
			createDropDown ('GPU', 'Computer', 'gpu');
			?>
			</td>
			</tr>
			<br><br>
	
			<tr><td ALIGN="center">Storage:</td>
			<td ALIGN="center">
				<table>
				<tr>
				<th id="nested">Amount</th>
				<th id="nested">Type</th>
				</tr>
				<tr>
				<td>
				<?php
				createDropDown ('size', 'SecondaryMemory', 'amount');
				?>
				</td>
				<td>
				<?php
				createDropDown ('type', 'SecondaryMemory', 'type');
				?>
				</td>
				</tr>
				</table>
			</td>
			</tr>
			<br><br>
			
			<tr><td ALIGN="center">Motherboard</td>
			<td ALIGN="center">
			<?php
			createDropDown ('motherboard', 'Computer', 'mother');
			?>
			</td>
			</tr>
			<br><br>
			
			
			</table>
			
			
			<!-- ACCESSORIES TABLE -->
			
			<table style="position:absolute; left:800px; bottom:285px;">
			
			
			<th ALIGN="center" colspan="2">Accessories</th>
			
			<tr><td ALIGN="center">Keyboard</td>
			<td ALIGN="center">
			<?php
			createDropDown ('keyboard', 'Computer', 'key');
			?>
			</td>
			</tr>
			<br><br>
			
			<tr><td ALIGN="center">Mouse</td>
			<td ALIGN="center">
			<?php
			createDropDown ('mouse', 'Computer', 'mouse');
			?>
			</td>
			</tr>
			<br><br>
			
			<tr><td ALIGN="center">Web Camera</td>
			<td ALIGN="center">
			<?php
			createDropDown ('webCamera', 'Computer', 'cam');
			?>
			</td>
			</tr>
			<br><br>
			
			<tr><td ALIGN="center">Speaker</td>
			<td ALIGN="center">
			<?php
			createDropDown ('speaker', 'Computer', 'speaker');
			?>
			</td>
			</tr>
			<br><br>
			
			<tr><td ALIGN="center">DVDrom</td>
			<td ALIGN="center">
			<?php
			createDropDown ('DVDrom', 'Computer', 'dvd');
			?>
			</td>
			</tr>
			<br><br>
			
			<tr><td ALIGN="center">Power Supply</td>
			<td ALIGN="center">
			<?php
			createDropDown ('powerSupply', 'Computer', 'pwr');
			?>
			</td>
			</tr>
			<br><br>
			
			
			</table>
			
			<table style="position:absolute; left:800px; bottom:100px;">
			
			
			<th ALIGN="center" colspan="2">Location</th>
			
			<tr><td ALIGN="center">Building</td>
			<td ALIGN="center">
			<?php
			createDropDown ('building_name', 'Computer', 'bldg');
			?>
			</td>
			</tr>
			<br><br>
			
			<tr><td ALIGN="center">Room Number</td>
			<td ALIGN="center">
			<?php
			createDropDown ('room_number', 'Computer', 'room');
			?>
			</td>
			</tr>
			<br><br>
			
			
			
			</table>
			
		<br><br>
		<input type="submit" value="SEARCH" name="search">
		</form>
	
	</div>
	  
	  </div>   


</body>

<?php
// Close the database connection
$conn->close();
?>

</html>
