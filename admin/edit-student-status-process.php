<?php

	include "helper-methods.php";
	
	$studentStatus    = checkinput($_REQUEST["status"]);
	$stId             = checkinput($_REQUEST["studentId"]);
	
	include "database1-connect.php";
	
	$query="update tblstudents set status=:studentStatus where studentId=:studentId";
	$stmt=$conn->prepare($query);
	$stmt->bindParam(':studentId',$stId);
	$stmt->bindParam(':studentStatus',$studentStatus);
	
	if($stmt->execute())
	{
		$conn=null;
		header("location:students.php?msg=3");
		exit;
	}
	
?>	