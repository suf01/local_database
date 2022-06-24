<?php
session_start();

   include("connection.php");
   include("functions.php");

   $user_data = check_login($con);

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Records</title>
</head>
<body>
	<a href="logout.php">Logout</a>
	<h1>Records</h1>
	<table>
		<tr>
			<th>User ID</th>
			<th>Location</th>
			<th>Time</th>
		</tr>
	<?php 

	$conn = mysqli_connect("localhost", "root", "", "operatorsDB");
	$sql = "SELECT * FROM buses";
	$result = $conn->query($sql);

	if($result->num_rows > 0){
		while($row = $result->fetch_assoc()){
			echo "<tr><td>" .$row["user_id"]. "</td><td>" .$row["location"] . "</td><td>" . $row["time"] . "</td></tr>";
		}
	}else{
		echo "No results found";
	}
	
	?>
	<br><br>
   </table>
   <br>
	<a href="index.php">return to home page</a>
</body>
</html>