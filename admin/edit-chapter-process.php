<?php

	include "helper-methods.php";
	
	$chapterId        = checkinput($_REQUEST["chapterId"]);
	$className        = checkinput($_REQUEST["className"]);
	$chapterName      = checkinput($_REQUEST["chapterName"]);
	$subjectName      = checkinput($_REQUEST["subjectName"]);
	$status           = checkinput($_REQUEST["status"]);
	
	if(strlen($chapterName)==0 || empty($chapterName))
	{
		header("location:edit-chapter.php?err=1&chapterId=$chapterId&status=$status");
		exit;
	}
	if(strlen($subjectName)==0 || empty($subjectName))
	{
		header("location:edit-chapter.php?err=2&chapterId=$chapterId&status=$status");
		exit;
	}
	
	if($className==-1)
	{
		header("location:edit-chapter.php?err=4&chapterId=$chapterId&status=$status");
		exit;
	}
	
	if($subjectName==-1)
	{
		header("location:edit-chapter.php?err=5&chapterId=$chapterId&status=$status");
		exit;
	}
	
	include "database1-connect.php";
	
	$query ="select * from tblchapter where chapterId<>:chapterId and classId=:classId and subjectId=:subjectId and chapterName=:chapterName";
	$stmt=$conn->prepare($query);
	$stmt->bindParam(':chapterId',$chapterId);
	$stmt->bindParam(':chapterName',$chapterName);
	$stmt->bindParam(':classId',$className);
	$stmt->bindParam(':subjectId',$subjectName);
	$stmt->execute();
	$numRow=$stmt->rowcount();
	
	if($numRow==1)
	{
		$conn=null;
		header("location:edit-chapter.php?err=3&chapterId=$chapterId&status=$status");
		exit;
	}
	
	$query="update tblchapter set chapterName=:chapterName,classId=:classId, subjectId=:subjectId, status=:status where chapterId=:chapterId";
	$stmt=$conn->prepare($query);
	$stmt->bindParam(':chapterId',$chapterId);
	$stmt->bindParam(':chapterName',$chapterName);
	$stmt->bindParam(':classId',$className);
	$stmt->bindParam(':subjectId',$subjectName);
	$stmt->bindParam(':status',$status);
	
	if($stmt->execute())
	{
		$conn=null;
		header("location:chapters.php?msg=5");
		exit;
	}
		
?>	

