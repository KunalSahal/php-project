<?php

	$studentId = $_REQUEST["studentId"]; 
	
	include "database1-connect.php";
	
	$stmt=$conn->prepare("select imgPath from tblstudents where studentId=:studentId");
	$stmt->bindParam(':studentId',$studentId);
	$stmt->execute();
	while($row=$stmt->fetch())
	{
		$studentImg = $row["imgPath"];
	}		
	
	$query ="delete from tblstudents where studentId=:studentId";
	$stmt=$conn->prepare($query);
	$stmt->bindParam(':studentId',$studentId);
	$stmt->execute();
	
	if($stmt->execute())
	{
		unlink("img-upload/".$studentImg);
		header("location:students.php?msg=2");
		exit;
	}
?>