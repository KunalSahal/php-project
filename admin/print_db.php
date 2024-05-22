<?php
$servername = "localhost";
$myDB = "db_potential";
$username = "root";
$password = "";
try
{
	$conn = new PDO("mysql:host=$servername;dbname=$myDB",$username,$password);
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e)
{
	echo "Connection failed: " . $e->getMessage();
}
	$query ="SELECT * from tblstudent";
		$stmt=$conn->prepare($query);
		$stmt->execute();
		while($row=$stmt->fetch())
		{
			echo "Name is ".$row["studentName"]." "."Mobile is :".$row["mobileNumber"];
			echo "<br>";
		}
?>