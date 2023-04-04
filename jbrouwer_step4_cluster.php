<?php
$servername = "localhost";
$username = "jackson";
$password = "computer";
$dbname = "tracking_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT file_no, cookie, ip, window_width, window_height, user_agent, cookies_enabled, fonts,javascript FROM visit";
$result = $conn->query($sql);
if ($result == FALSE) {
	echo "Error: " . $sql . "<br>" . $conn->error;
}
$cluster = array(); 

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
	  //echo "fileno " . $row["file_no"]. " - javascript: " . $row["javascript"]. "\n";
	  $key = $row["cookie"] . $row["ip"] . $row["window_width"] . $row["window_height"] . $row["user_agent"] . $row["cookies_enabled"] . $row["fonts"] . $row["javascript"]; 
	  if (array_key_exists($key, $cluster)) {
		  $cluster[$key][] = $row["file_no"]; 
	  }
	  else {
		  $cluster[$key] = array($row["file_no"]);
	  }
  }
 
 foreach ($cluster as &$files) {
    sort($files);
 }
 var_dump($cluster); 
  unset($files);

 function cmp($a, $b)
{
    if ($a[0] == $b[0]) {
        return 0;
    }
    return ($a[0] < $b[0]) ? -1 : 1;
 }

  usort($cluster, "cmp"); 
  
  $resstring = ""; 
  foreach ($cluster as &$files) {
	  foreach ($files as $file){
		  $resstring = $resstring . $file . ",";
	  }
	  $resstring[-1] = " ";
  }
  //var_dump($cluster);
  echo($resstring); 
} else {
  echo "0 results";
}
$conn->close();
?>
