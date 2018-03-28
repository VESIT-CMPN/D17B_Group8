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
