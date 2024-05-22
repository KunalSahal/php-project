<?php
	
	include "helper-methods.php";
	 
	$classId		= checkinput($_REQUEST["classId"]);	
	$subjectName	= checkinput($_REQUEST["subjectName"]);
	
	if(strlen($subjectName)==0 || empty($subjectName))
	{	
		header("location:subjects.php?err=1");
		exit;
	}
	
	if(strlen($classId)==0 || empty($classId))
	{	
		header("location:subjects.php?err=2");
		exit;
	}
	
	include "database1-connect.php";
		
		$query = "insert into tblsubject (subjectName, classId) value (:subjectName, :classId)";
		$stmt= $conn->prepare($query); 
		$stmt-> bindParam(':subjectName',$subjectName);
		$stmt-> bindParam(':classId',$classId);
		
		if($stmt->execute())
		{
			$stmt=null;
			$conn=null;
			header("location:subjects.php?msg=2&classId=$classId");
			exit;
		}
	
?>