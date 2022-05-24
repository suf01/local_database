<?php
session_start();
    
    include("connection.php");
    include("functions.php");

    
    if($_SERVER['REQUEST_METHOD'] == "POST"){
    	$user_id = $_POST['user_id'];
    	$user_name = $_POST['user_name'];
    	$phone = $_POST['phone'];
    	$location = $_POST['location'];
    	$password = $_POST['password'];
    	$cpassword = $_POST['cpassword'];

    	if($password!=$cpassword){
    		echo "Cannot comfirm passwords.";
    	}
    	
    	if(!empty($user_name) && !empty($password) && !is_numeric($user_name) && ($password==$cpassword)){

    		$query = "insert into valid_users (user_id, user_name, password, phone, location) values ('$user_id', 
    		'$user_name', '$password', '$phone', '$location')";

    		mysqli_query($con, $query);

    		echo "User created";

    	}else{
    		echo "Please enter valid information";
    	}
    }
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>SignUp</title>
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
			<div style="font-size: 25px;">User registration form</div><br>

			<input type="text" name="user_name" placeholder="User name" style="font-size: 20px;"><br><br>

			<input type="text" name="user_id" placeholder="User ID" style="font-size: 20px;"><br><br>

			<input type="text" name="phone" placeholder="Phone number" style="font-size: 20px;"><br><br>

			<input type="text" name="location" placeholder="Location" style="font-size: 20px; height: 60px; width: 242px;"><br><br>

			<input type="password" name="password" placeholder="Password" style="font-size: 20px;"><br><br>

			<input type="password" name="cpassword" placeholder="Confirm password" style="font-size: 20px;"><br><br>

			<input type="submit" value="Register" style="font-size: 15px;"><br><br>
		
		    <div style="text-align: center; font-size: 20px;"><a href="login.php">Click to login</a></div>
		</form>
		
	</div>

</body>
</html>