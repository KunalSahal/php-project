<?php
	
	session_start();
	include "helper-methods.php";
	 
	$classId		= checkinput($_REQUEST["classId"]);	
	$subjectName	= checkinput($_REQUEST["subjectName"]);
	$status			= checkinput($_REQUEST["status"]);
	
	$_SESSION["classId"]        = $classId;
	$_SESSION["subjectName"]    = $subjectName;
	
	if(strlen($subjectName)==0 || empty($subjectName))
	{	
		header("location:add-subject.php?err=1");
		exit;
	}
	
	if(strlen($classId)==0 || empty($classId) || $classId==-2)
	{	
		header("location:add-subject.php?err=2");
		exit;
	}
	
	if($classId==-1)
	{	
		header("location:add-subject.php?err=3");
		exit;
	}
	
	include "database1-connect.php";
	
		$query ="select * from tblsubject where classId=:classId and subjectName=:subjectName";
		$stmt=$conn->prepare($query);
		$stmt->bindParam(':classId',$classId);
		$stmt->bindParam(':subjectName',$subjectName);
		$stmt->execute();
		$numRow=$stmt->rowcount();
		
		if($numRow==1)
		{
			$conn=null;
			header("location:add-subject.php?err=4");
			exit;
		}
				
		$query = "insert into tblsubject (subjectName, classId, status) value (:subjectName, :classId, :status)";
		$stmt= $conn->prepare($query); 
		$stmt-> bindParam(':subjectName',$subjectName);
		$stmt-> bindParam(':classId',$classId);
		$stmt-> bindParam(':status',$status);
		if($stmt->execute())
		{
			$stmt=null;
			$conn=null;
			header("location:subjects.php?msg=2");
			exit;
		}
?>