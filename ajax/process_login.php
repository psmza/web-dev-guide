<?php
	include_once('config.php');
    // Retrieve username and password from the form submission
    
	if (!empty($_POST)) {
		$username = $_POST['username1'];
		$password = $_POST['password1'];
	}
		// Perform authentication (e.g., check against database)
    // If authenticated, redirect to user dashboard
    // Otherwise, display an error message
	// Assuming $username and $password have been retrieved from the form submission
	// Perform database query to check credentials
	
	$query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
	$result = mysqli_query($conn, $query);
	
	if (mysqli_num_rows($result) == 1) {
		//$user = mysqli_fetch_assoc($result);
		$output = "Process masuk berjaya";
		echo json_encode(['status'=>'success','html'=>$output]);
		//echo "Login Success!";
		// Start session and store user details
		// Redirect based on access level
		
		/* if ($user['access_level'] == 'admin') {
			//header("Location: admin_dashboard.php"); 
			echo 'admin';
		} elseif ($user['access_level'] == 'staff') {
			//header("Location: staff_dashboard.php"); 
			echo 'staff';
		} else {
			//header("Location: user_dashboard.php"); 
			echo 'normal';
		} */
	} else {
		// Invalid credentials, display an error message
		$output = "Invalid username or password. Please try again.";
		echo json_encode(['status'=>'error','html'=>$output]);
	}
?>