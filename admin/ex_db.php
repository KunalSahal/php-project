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

	//insert
	$studentName="naman";
	$mobileNumber="8888888888";

	$query = "insert into tblstudent (studentName,mobileNumber) values(:studentName,:mobileNumber)";
		$stmt=$conn->prepare($query);
		$stmt->bindParam(':studentName',$studentName);
		$stmt->bindParam(':mobileNumber',$mobileNumber);
		$stmt->execute();
//PDO is mostly prefered because reduces the chances of sql injection preventing hacking 
// other used types are mysqli_
?>