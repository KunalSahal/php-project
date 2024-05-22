<?php
	
	session_start();
	
	require "helper-methods.php";
	
	$classId     = checkinput($_REQUEST["classId"]);
	$subjectId   = checkinput($_REQUEST["subjectId"]);
	$chapterName = checkinput($_REQUEST["chapterName"]);
	$status      = checkinput($_REQUEST["status"]);
	
	
	$_SESSION["classId"]   = $classId;
	$_SESSION["subjectId"] = $subjectId;
	$_SESSION["chapterName"] = $chapterName;
	
	if(strlen($_SESSION["classId"])==0 || empty($classId))
	{
		header("location:add-chapter.php?err=1");
		exit;
	}
	
	if(strlen($_SESSION["subjectId"])==0 || empty($_SESSION["subjectId"]))
	{
		header("location:add-chapter.php?err=1");
		exit;
	}
	
	if(strlen($_SESSION["chapterName"])==0 || empty($_SESSION["chapterName"]))
	{
		header("location:add-chapter.php?err=1");
		exit;
	}
	
	if(strlen($status)==0 || empty($status))
	{
		header("location:add-chapter.php?err=4");
		exit;
	}
	
	require 'database1-connect.php';
	
	$query ="select chapterName from tblchapter where classId=:classId and subjectId=:subjectId";
	$stmt=$conn->prepare($query);
	$stmt->bindParam(':classId',$classId);
	$stmt->bindParam(':subjectId',$subjectId);	
	$stmt->execute();
	for($i=1;$row=$stmt->fetch();$i++)
	{
	
		if($row["chapterName"]==$chapterName)
		{
			$stmt=null;
			$conn=null;
			header("location:add-chapter.php?err=2");
			exit;
		}
	}
	
	$query = "insert into tblchapter (classId,subjectId,chapterName,status) value (:classId,:subjectId,:chapterName,:status)";
	$stmt=$conn->prepare($query);
	$stmt->bindParam(':classId',$classId);
	$stmt->bindParam(':subjectId',$subjectId);
	$stmt->bindParam(':chapterName',$chapterName);
	$stmt->bindParam(':status',$status);
	
	if($stmt->execute())
	{
		$stmt=null;
		$conn=null;
		unset($_SESSION["subjectId"]);
		unset($_SESSION["classId"]);
		header("location:chapters.php?msg=1");
		exit;
	}
?>