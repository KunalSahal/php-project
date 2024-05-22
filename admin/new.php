<?php

	$studentId = $_REQUEST["studentId"]; 
	
	include "database-connect.php";
	
	$query ="delet from tblstudents where studentId=:studentId";
	$stmt=$conn->prepare($query);
	$stmt->bindParam(':studentId',$studentId);
	$stmt->execute();
	
	if($stmt->execute())
	{
		header("location:student.php?return=1");
		exit;
	}