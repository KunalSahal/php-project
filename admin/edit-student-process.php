<?php

	include "helper-methods.php";
	
	include "database1-connect.php";
	
	$studentId        = checkinput($_REQUEST["studentId"]);
	$studentName      = checkinput($_REQUEST["studentName"]);
	$birthDate        = checkinput($_REQUEST["birthDate"]);
	$selectClass      = checkinput($_REQUEST["selectClass"]);
	$selectSession    = checkinput($_REQUEST["selectSession"]);
	$studentNumber    = checkinput($_REQUEST["studentNumber"]);
	$schoolName       = checkinput($_REQUEST["schoolName"]);
	$studentGender    = checkinput($_REQUEST["studentGender"]);
	$studentEmail     = checkinput($_REQUEST["studentEmail"]);
	$studentPassword  = checkinput($_REQUEST["studentPassword"]);
	$fatherName       = checkinput($_REQUEST["fatherName"]);
	$motherName       = checkinput($_REQUEST["motherName"]);
	$fatherNumber     = checkinput($_REQUEST["fatherNumber"]);
	$motherNumber     = checkinput($_REQUEST["motherNumber"]);
	$parentEmail      = checkinput($_REQUEST["parentEmail"]);
	$inputPassword    = checkinput($_REQUEST["inputPassword"]);
	$address          = checkinput($_REQUEST["address"]);
	$status           = checkinput($_REQUEST["status"]);  
	
	if(strlen($studentName)==0 || empty($studentName))
	{
		header("location:edit-student.php?err=1&studentId=$studentId");
		exit;
	}
	if(strlen($birthDate)==0 || empty($birthDate))
	{
		header("location:edit-student.php?err=2&studentId=$studentId");
		exit;
	}
	if(strlen($selectClass)==0 || empty($selectClass))
	{
		header("location:edit-student.php?err=3&studentId=$studentId");
		exit;
	}
	if(strlen($selectSession)==0 || empty($selectSession))
	{
		header("location:edit-student.php?err=4&studentId=$studentId");
		exit;
	}
	if(strlen($studentNumber)==0 || empty($studentNumber) || strlen($studentNumber)<10 || strlen($studentNumber)>10)
	{
		header("location:edit-student.php?err=5&studentId=$studentId");
		exit;
	}
	if(strlen($schoolName)==0 || empty($schoolName))
	{
		header("location:edit-student.php?err=6&studentId=$studentId");
		exit;
	}
	if(strlen($studentGender)==0 || empty($studentGender))
	{
		header("location:edit-student.php?err=7&studentId=$studentId");
		exit;
	}
	if(strlen($studentEmail)==0 || empty($studentEmail))
	{
		header("location:edit-student.php?err=8&studentId=$studentId");
		exit;
	}
	if(strlen($studentPassword)==0 || empty($studentPassword)|| strlen($studentPassword)<6 || strlen($student)>10)
	{
		header("location:edit-student.php?err=9&studentId=$studentId");
		exit;
	}
	if(strlen($fatherName)==0 || empty($fatherName))
	{
		header("location:edit-student.php?err=10&studentId=$studentId");
		exit;
	}
	if(strlen($motherName)==0 || empty($motherName))
	{
		header("location:edit-student.php?err=11&studentId=$studentId");
		exit;
	}
	if(strlen($parentEmail)==0 || empty($parentEmail))
	{
		header("location:edit-student.php?err=12&studentId=$studentId");
		exit;
	}
	if(strlen($inputPassword)==0 || empty($inputPassword)|| strlen($studentNumber)<6 || strlen($studentNumber)>10)
	{
		header("location:edit-student.php?err=13&studentId=$studentId");
		exit;
	}
	if(strlen($address)==0 || empty($address))
	{
		header("location:edit-student.php?err=14&studentId=$studentId");
		exit;
	}
	if(strlen($fatherNumber)==0 || empty($fatherNumber)|| strlen($studentNumber)<10 || strlen($studentNumber)>10)
	{
		header("location:edit-student.php?err=15&studentId=$studentId");
		exit;
	}
	if(strlen($motherNumber)==0 || empty($motherNumber)|| strlen($studentNumber)<10 || strlen($studentNumber)>10)
	{
		header("location:edit-student.php?err=16&studentId=$studentId");
		exit;
	}
	if(strlen($status)==0 || empty($status))
	{
		header("location:edit-student.php?err=17&studentId=$studentId");
		exit;
	}
	
	$query ="select * from tblstudents where studentId<>:studentId and studentEmail=:studentEmail";
	$stmt=$conn->prepare($query);
	$stmt->bindParam(':studentId',$studentId);
	$stmt->bindParam(':studentEmail',$studentEmail);
	$stmt->execute();
	$numRow=$stmt->rowcount();
	
	if($numRow==1)
	{
		$conn=null;
		header("location:edit-student.php?err=18&studentId=$studentId");
		exit;
	}
	
	$query="update tblstudents set studentName=:studentName, birthDate=:birthDate, selectClass=:selectClass, selectSession=:selectSession, studentNumber=:studentNumber, schoolName=:schoolName, studentGender=:studentGender, studentEmail=:studentEmail, studentPassword=:studentPassword, fatherName=:fatherName, motherName=:motherName, fatherNumber=:fatherNumber, motherNumber=:motherNumber, parentEmail=:parentEmail, inputPassword=:inputPassword, address=:address, status=:status where studentId=:studentId";
	$stmt=$conn->prepare($query);
	$stmt->bindParam(':studentId',$studentId);
	$stmt->bindParam(':studentName',$studentName);
	$stmt->bindParam(':birthDate',$birthDate);
	$stmt->bindParam(':selectClass',$selectClass);
	$stmt->bindParam(':selectSession',$selectSession);
	$stmt->bindParam(':studentNumber',$studentNumber);
	$stmt->bindParam(':schoolName',$schoolName);
	$stmt->bindParam(':studentGender',$studentGender);
	$stmt->bindParam(':studentEmail',$studentEmail);
	$stmt->bindParam(':studentPassword',$studentPassword);
	$stmt->bindParam(':fatherName',$fatherName);
	$stmt->bindParam(':motherName',$motherName);
	$stmt->bindParam(':fatherNumber',$fatherNumber);
	$stmt->bindParam(':motherNumber',$motherNumber);
	$stmt->bindParam(':parentEmail',$parentEmail);
	$stmt->bindParam(':inputPassword',$inputPassword);
	$stmt->bindParam(':address',$address);
	$stmt->bindParam(':status',$status);
	
	if($stmt->execute())
	{
		$conn=null;
		header("location:students.php?msg=1&studentId=$studentId");
		exit;
	}
	
	$stmt=null;
	$conn=null;
// * is used for picking up entire row
?>