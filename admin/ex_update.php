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
	
	$studentName="mohan";
	$studentId="1";
	
	$query="update tblstudent set studentName=:studentName where studentId=:studentId";
	$stmt=$conn->prepare($query);
	$stmt->bindParam(':studentName',$studentName);
	$stmt->bindParam(':studentId',$studentId);
	$stmt->execute();
	echo "updated";
	
?>