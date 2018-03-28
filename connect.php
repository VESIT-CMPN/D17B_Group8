<?php
$servername = "localhost";
$username = "root";
$password = "password";
$dbname = "owncloud";
$count1=0;
$i=0;
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$sql = "SELECT id, first_name, last_name, email, gender,city, state FROM MOCK_DATA";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
 $myfile = fopen('C:\xampp\htdocs\information\userdata'.$count1.'.txt', "w") or die("Unable to open file!");
    while($row = $result->fetch_assoc()) {
				if($i>1250)
			{
			      $count1++;
			     $myfile = fopen('C:\xampp\htdocs\information\userdata'.$count1.'.txt', "wb");// or die("Unable to open file!");
				
			}
				$txt = "User_id : ".$row["id"]. PHP_EOL;
				fwrite($myfile, $txt);
				$txt = "Firstname : ".$row["first_name"]. PHP_EOL;
				fwrite($myfile, $txt);
				$txt = "Last Name : ".$row["last_name"]. PHP_EOL;
				fwrite($myfile, $txt);
				$txt = "Email : ".$row["email"]. PHP_EOL;
				fwrite($myfile, $txt);
				$txt = "Gender : ".$row["gender"]. PHP_EOL;
				fwrite($myfile, $txt);
				$txt = "City : ".$row["city"]. PHP_EOL;
				fwrite($myfile, $txt);
				$txt = "State : ".$row["state"]. PHP_EOL;
				fwrite($myfile, $txt);
				$txt = PHP_EOL;
				fwrite($myfile, $txt);
								$filename = 'C:\xampp\htdocs\information\userdata'.$count1.'.txt';
				$i=filesize($filename);
				clearstatcache();
}
} else {
    echo "0 results";	
}
echo "Buckets Created";
echo "<br>";
$count1++;
echo "Number of buckets formed ".$count1;
$conn->close();
?>
