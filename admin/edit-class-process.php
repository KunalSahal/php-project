<?php
	
	include "helper-methods.php";
	
	$classId   = checkinput($_REQUEST["classId"]);
	$className = checkinput($_REQUEST["className"]);
	$status    = checkinput($_REQUEST["status"]);
	
	if(strlen($className)==0 || empty($className))
	{	
		header("location:class.php?err=1");
		exit;
	}
	
	include "database1-connect.php";
	
	$query ="select * from tblclass where classId<>:classId and className=:className";
	$stmt=$conn->prepare($query);
	$stmt->bindParam(':classId',$classId);
	$stmt->bindParam(':className',$className);
	$stmt->execute();
	$numRow=$stmt->rowcount();
	if($numRow==1)
	{
		$conn=null;
		header("location:class.php?err=2");
		exit;
	}
	
	$query="update tblclass set className=:className, status:status where classId=:classId";
	$stmt=$conn->prepare($query);
	$stmt->bindParam(':classId',$classId);
	$stmt->bindParam(':className',$className);
	$stmt->bindParam(':status',$status);
	
	if($stmt->execute())
	{
		$conn=null;
		header("location:class.php?msg=3");
		exit;
	}
	
?>	