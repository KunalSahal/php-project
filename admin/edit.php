<?php
	
	session_start();
	
	include "database-connect.php";
	
	$studentName = $_REQUEST["studentName"];
	$studentId= $_SESSION["studentId"];
	
	$query="update tblstudents set studentName=:studentName where studentId=:studentId";
	$stmt=$conn->prepare($query);
	$stmt->bindParam(':studentName',$studentName);
	$stmt->bindParam(':studentId',$studentId);
	$stmt->execute();
	echo "updated";
	
?>