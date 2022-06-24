<?php
session_start();
    
    include("connection.php");
    include("functions.php");
    $user_data = check_login($con);

    
    if($_SERVER['REQUEST_METHOD'] == "POST"){
    	$user_id = $_POST['user_id'];
    	$location = $_POST['location'];
    	$time = $_POST['time'];
        	
    	if(!empty($user_id) && !empty($location) && !empty($time) && ($user_id == $user_data['user_id'])){

    		$query = "DELETE FROM buses where location = '$location'";

    		mysqli_query($con, $query);

    		echo "Data deleted";

    	}else{
    		echo "Please enter valid information";
    	}
    }
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Delete records</title>
</head>
<body>
	<style type="text/css">
	
	#text{

		height: 25px;
		border-radius: 5px;
		padding: 4px;
		border: solid thin #aaa;
		width: 100%;
	}

	#button{

		padding: 10px;
		width: 100px;
		color: white;
		background-color: lightblue;
		border: none;
	}

	#box{

		margin: auto;
		width: 300px;
		padding: 20px;
	}

	</style>

	<div id = "box">
		<form method="post">
			<div style="font-size: 25px;">Delete record</div><br>

			<input type="text" name="location" placeholder="location" style="font-size: 20px;"><br><br>

			<input type="text" name="time" placeholder="time" style="font-size: 20px;"><br><br>

			<input type="text" name="user_id" placeholder="operator user id" style="font-size: 20px;"><br><br>

			<input type="submit" value="submit details" style="font-size: 15px;"><br><br>
		
		    <div style="text-align: center; font-size: 20px;"><a href="viewtable.php">view table</a></div>
		</form>
	</div>

	<a href = "index.php">Return to home page</a>

</body>
</html>