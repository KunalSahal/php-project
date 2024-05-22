<?php
	include "database1-connect.php";

	if($_REQUEST["return"]==1)
	{
		$subjectId = $_REQUEST["subjectId"];	
			
		$query ="delete from tblsubject where subjectId=:subjectId";
		$stmt=$conn->prepare($query);
		$stmt->bindParam(':subjectId',$subjectId);
		
		if($stmt->execute())
		{
			$conn=null;
			$stmt=null;
			header("location:class.php?msg=6");
			exit;
		}
	}
	
	$subjectId = $_REQUEST["subjectId"];
	$classId = $_REQUEST["classId"];	
	
	$query ="delete from tblsubject where subjectId=:subjectId";
	$stmt=$conn->prepare($query);
	$stmt->bindParam(':subjectId',$subjectId);
	
	if($stmt->execute())
	{
		$conn=null;
		$stmt=null;
		header("location:subjects.php?msg=1&classId=$classId");
		exit;
	}
?>