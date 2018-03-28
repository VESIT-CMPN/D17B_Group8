# cloud
        CC Mini project : Data storage management using cloud for Online store
 
Title: Implement data storage management for online store using cloud services.

Introduction: The term storage management encompasses the technologies and processes organizations use to maximize or improve the performance of their data storage resources. It is a broad category that includes virtualization, replication, mirroring, security, compression, traffic analysis, process automation, storage provisioning and related techniques. 
OwnCloud : ownCloud is a suite of client–server software for creating file hosting services and using them. ownCloud is functionally very similar to the widely used Dropbox, with the primary functional difference being that the Server Edition of ownCloud is free and open-source, and thereby allowing anyone to install and operate it without charge on a private server. It also supports extensions that allow it to work like Google Drive, with online document editing, calendar and contact synchronization, and more. Its openness avoids enforced quotas on storage space or the number of connected clients, instead having hard limits (like on storage space or number of users) defined only by the physical capabilities of the server.

Implementation Details:
The cloud storage management portal mechanism provides a feature for data owners to publish and share data with other cloud consumers inside or outside of the cloud environment. Here we have one original file from which users can access data and on increasing number of requests file gets replicated based on some threshold value and users can access now from newly replicated files,by doing this we can manage the load or traffic on cloud. Also, we have divided MySQL data, i.e, tuples of table (500 tuples) into equal sized files (1 KB) on cloud in the form of buckets. Using form.html file we fetch the number of requests made by the user and using action.php we fetch the request and if  no of request exceed the threshold value the data is replicated .


Codes:
form.html
<!DOCTYPE html>
<html>
<body>
<h2>Access to OwnCloud Storage</h2>
<p>Enter the Number of Times You Want To Request File:</p>
<form action="./action.php" method="post">
  Requests
  <input type="number" name="Requests">
  <input type="submit">
</form>
</body>
</html>

Action.php
<?php
$num='';
$count=0;
$num = $_POST['Requests'];
for ($x = 1; $x <= $num; $x++) 
{
	if($x%50==0)
	{
		$count++;
		$a='data'.$count.'.txt';
		//$my_file = 'file.txt';
		//$handle = fopen($my_file, 'w') or die('Cannot open file:  '.$my_file);
			$fp = fopen('C:\xampp\htdocs\aarti\data'.$count.'.txt',"wb");
			$content =copy('C:\xampp\htdocs\aarti\data0.txt','C:\xampp\htdocs\aarti\data'.$count.'.txt');
			//fwrite($fp,$content);
			$logfile = 'C:\xampp\htdocs\aarti\data'.$count.'.txt';
			$my_file = file_get_contents($logfile);
			echo $x . " ";
			echo $my_file ;
			echo "<br>";
			fclose($fp);	
	}
	else
	{
		$logfile = 'C:\xampp\htdocs\aarti\data'.$count.'.txt';
		$my_file = file_get_contents($logfile);
		echo $x . " ";
		echo $my_file ;
		echo "<br>";
	}	
}
?>

connect.php
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



Output Screens:









Conclusion: Data management is implemented using PHP script in which as soon as more users try to access the files present on cloud, the files are replicated and the new users access the new file. In this way, elasticity is shown in ownCloud. Data from MySQL is fetched and Buckets of  1 KB are created and stored on OwnCloud.

