<?php

	$chapterId = $_REQUEST["chapterId"]; 
	
	include "database1-connect.php";
	
	$query ="delete from tblchapter where chapterId=:chapterId";
	$stmt=$conn->prepare($query);
	$stmt->bindParam(':chapterId',$chapterId);
	$stmt->execute();
	
	if($stmt->execute())
	{
		header("location:chapters.php?msg=2");
		exit;
	}
?>