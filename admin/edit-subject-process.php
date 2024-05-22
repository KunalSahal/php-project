<?php

	include "helper-methods.php";
	
	$subjectId        = checkinput($_REQUEST["subjectId"]);
	$classId          = checkinput($_REQUEST["className"]);
	$subjectName      = checkinput($_REQUEST["subjectName"]);
	$status           = checkinput($_REQUEST["status"]);
	
	if(empty($classId) || $classId==-1)
	{
		header("location:edit-subject.php?err=1&subjectId=$subjectId&status=$status");
		exit;
	}
	
	if(strlen($subjectName)==0 || empty($subjectName))
	{
		header("location:edit-subject.php?err=2&subjectId=$subjectId&status=$status");
		exit;
	}
	
	include "database1-connect.php";
	
	$query ="select * from tblsubject where subjectId<>:subjectId and classId=:classId and subjectName=:subjectName";
	$stmt=$conn->prepare($query);
	$stmt->bindParam(':subjectId',$subjectId);
	$stmt->bindParam(':subjectName',$subjectName);
	$stmt->bindParam(':classId',$classId);
	$stmt->execute();
	$numRow=$stmt->rowcount();
	if($numRow==1)
	{
		$conn=null;
		header("location:edit-subject.php?err=3&subjectId=$subjectId&status=$status");
		exit;
	}

	$query="update tblsubject set classId=:classId, subjectName=:subjectName, status=:status where subjectId=:subjectId";
	$stmt=$conn->prepare($query);
	$stmt->bindParam(':subjectId',$subjectId);
	$stmt->bindParam(':classId',$classId);
	$stmt->bindParam(':subjectName',$subjectName);
	$stmt->bindParam(':status',$status);
	
	if($stmt->execute())
	{
		$conn=null;
		header("location:subjects.php?msg=4");
		exit;
	}
?>