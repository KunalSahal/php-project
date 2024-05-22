<?php
	echo $studentId = $_REQUEST["studentId"];
	echo $studentImg = $_REQUEST["img"];
	
	include "database1-connect.php";
	
	$stmt1=$conn->prepare("select studentGender from tblstudents where studentId=:studentId");
	$stmt1->bindParam(':studentId',$studentId);
	$stmt1->execute();
	$row=$stmt1->fetch();
	$studentGender = $row["studentGender"];
	
	if($studentGender=="Male")
	{
		$img = "male.jpg";
	}
	
	if($studentGender=="Female")
	{
		$img = "female.jpg";
	}
	
	$query ="update tblstudents set imgPath=:img where studentId=:studentId";
	$stmt=$conn->prepare($query);
	$stmt->bindParam(':img',$img);
	$stmt->bindParam(':studentId',$studentId);
	if($stmt->execute())
	{
		unlink("img-upload/".$studentImg);
		header("location:students.php?msg=imageRemoved");
		exit;
	}
	else 
	{
		echo "Nope";
	}
?>