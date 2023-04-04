<?php
	ini_set('display_errors', 1);
	$fileno = $_POST['fileno'];
	$cookie = $_POST['cookie'];
	$ip = $_POST['ip']; 
	$window_width = $_POST['window_width'];
	$window_height = $_POST['window_height'];
        $user_agent = $_POST['user_agent']; 	
	$cookies_enabled = $_POST['cookies_enabled']; 
	$fonts = $_POST['fonts']; 
	$javascript = $_POST['javascript']; 

	// hardcoded values for testing /tracking.php
	//$fileno = 32; 
	//$cookie = '394853';
        //$ip = '21.23.45.65'; 
	//$window_width = 200; 
	//$window_height = 100; 
	//$user_agent = 'itsa me'; 
	//$cookies_enabled = True; 
	//$fonts = 'Abyssinica SIL'; 
	//$javascript = True; 




	$servername = "localhost";
	$username = "jackson";
	$password = "computer";
	$dbname = "tracking_db";
	 
	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	 
	if ($conn->connect_error) {
		echo('uh oh'); 
		die("Connection failed: " . $conn->connect_error);
	}

	$sql = "INSERT INTO visit (file_no, cookie, ip, window_width, window_height, user_agent, cookies_enabled, fonts, javascript) VALUES ($fileno, '$cookie', '$ip', $window_width, $window_height, '$user_agent', $cookies_enabled, '$fonts', $javascript)"; 
	 
	if ($conn->query($sql) === TRUE) {
  		echo "New record created successfully";
	} else {
  		echo "Error: " . $sql . "<br>" . $conn->error;
	}	
	
	$conn->close(); 
?>
