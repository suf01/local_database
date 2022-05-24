<?php

session_start();
    
    include("connection.php");
    include("functions.php");

    
    if($_SERVER['REQUEST_METHOD'] == "POST"){
    	$user_name = $_POST['user_name'];
    	$password = $_POST['password'];
    	
    	if(!empty($user_name) && !empty($password) && !is_numeric($user_name)){

    		$query = "select * from valid_users where user_name = '$user_name' limit 1";
    		$result = mysqli_query($con, $query);

    		if($result){
    			if($result && mysqli_num_rows($result) > 0){
		            $user_data = mysqli_fetch_assoc($result);
		            
		            if($user_data['password'] === $password){
		            	$_SESSION['user_id'] = $user_data['user_id'];
		            	header('Location: index.php');
		            	die;
		            }
	            }
    		}
    		echo "Wrong username or password";
    	}else{
    		echo "Please enter some valid information";
    	}
    }


?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Login</title>
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
			<div style="font-size: 25px;">Login</div><br>

			<input type="text" name="user_name" placeholder="User name" style="font-size: 20px;"><br><br>

			<input type="password" name="password" placeholder="Password" style="font-size: 20px"><br><br>

			<input type="submit" value="Login" style="font-size: 15px;"><br><br>
		</form>		
	</div>

</body>
</html>