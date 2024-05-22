<!doctype html>
<?php
	session_start();
	
	require "helper-methods.php";
	
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
	
	$_SESSION["studentName"]      = $studentName;    
	$_SESSION["birthDate"]        = $birthDate;      
	$_SESSION["selectClass"]      = $selectClass;    
	$_SESSION["selectSession"]    = $selectSession;  
	$_SESSION["studentNumber"]    = $studentNumber;  
	$_SESSION["schoolName"]       = $schoolName;     
	$_SESSION["studentGender"]    = $studentGender;  
	$_SESSION["studentEmail"]     = $studentEmail;   
	$_SESSION["studentPassword"]  = $studentPassword;
	$_SESSION["fatherName"]       = $fatherName;     
	$_SESSION["motherName"]       = $motherName;     
	$_SESSION["fatherNumber"]     = $fatherNumber;   
	$_SESSION["motherNumber"]     = $motherNumber;   
	$_SESSION["parentEmail"]      = $parentEmail;   
	$_SESSION["inputPassword"]    = $inputPassword;  
	$_SESSION["address"]          = $address;        
	
	if(strlen($studentName)==0 || empty($studentName))
	{
		header("location:add-student.php?err=1");
		exit;
	}
	if(strlen($birthDate)==0 || empty($birthDate))
	{
		header("location:add-student.php?err=2");
		exit;
	}
	if(strlen($selectClass)==0 || empty($selectClass))
	{
		header("location:add-student.php?err=3");
		exit;
	}
	if(strlen($selectSession)==0 || empty($selectSession))
	{
		header("location:add-student.php?err=4");
		exit;
	}
	if(strlen($studentNumber)==0 || empty($studentNumber) || strlen($studentNumber)<10 || strlen($studentNumber)>10)
	{
		header("location:add-student.php?err=5");
		exit;
	}
	if(strlen($schoolName)==0 || empty($schoolName))
	{
		header("location:add-student.php?err=6");
		exit;
	}
	if(strlen($studentGender)==0 || empty($studentGender))
	{
		header("location:add-student.php?err=7");
		exit;
	}
	if(strlen($studentEmail)==0 || empty($studentEmail))
	{
		header("location:add-student.php?err=8");
		exit;
	}
	if(strlen($studentPassword)==0 || empty($studentPassword)|| strlen($studentPassword)<6 || strlen($student)>10)
	{
		header("location:add-student.php?err=9");
		exit;
	}
	if(strlen($fatherName)==0 || empty($fatherName))
	{
		header("location:add-student.php?err=10");
		exit;
	}
	if(strlen($motherName)==0 || empty($motherName))
	{
		header("location:add-student.php?err=11");
		exit;
	}
	if(strlen($parentEmail)==0 || empty($parentEmail))
	{
		header("location:add-student.php?err=12");
		exit;
	}
	if(strlen($inputPassword)==0 || empty($inputPassword)|| strlen($studentNumber)<6 || strlen($studentNumber)>10)
	{
		header("location:add-student.php?err=13");
		exit;
	}
	if(strlen($address)==0 || empty($address))
	{
		header("location:add-student.php?err=14");
		exit;
	}
	if(strlen($fatherNumber)==0 || empty($fatherNumber)|| strlen($studentNumber)<10 || strlen($studentNumber)>10)
	{
		header("location:add-student.php?err=15");
		exit;
	}
	if(strlen($motherNumber)==0 || empty($motherNumber)|| strlen($studentNumber)<10 || strlen($studentNumber)>10)
	{
		header("location:add-student.php?err=16");
		exit;
	}
	if($studentGender=="Male")
	{
		$imgPath = "male.jpg";
	}
	
	if($studentGender=="Female")
	{
		$imgPath = "female.jpg";
	}
	
	require "database1-connect.php";
	
	$query ="select * from tblstudents where studentEmail=:studentEmail";
	$stmt=$conn->prepare($query);
	$stmt->bindParam(':studentEmail',$studentEmail);
	$stmt->execute();
	$numRow=$stmt->rowcount();
	
	if($numRow==1)
	{
		$conn=null;
		header("location:add-student.php?err=18");
		exit;
	}
	

	$query = "insert into tblstudents (imgPath,studentName,birthDate,selectClass,selectSession,studentNumber,schoolName,studentGender,studentEmail,studentPassword,fatherName,motherName,parentEmail,inputPassword,address,fatherNumber,motherNumber,status) 		values(:imgPath,:studentName,:birthDate,:selectClass,:selectSession,:studentNumber,:schoolName,:studentGender,:studentEmail,:studentPassword,:fatherName,:motherName,:parentEmail,:inputPassword,:address,:fatherNumber,:motherNumber,:status)";
	$stmt=$conn->prepare($query);
	$stmt->bindParam(':studentName',$studentName);
	$stmt->bindParam(':imgPath',$imgPath);
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
	$stmt->bindParam(':parentEmail',$parentEmail);
	$stmt->bindParam(':inputPassword',$inputPassword);
	$stmt->bindParam(':address',$address);
	$stmt->bindParam(':fatherNumber',$fatherNumber);
	$stmt->bindParam(':motherNumber',$motherNumber);
	$stmt->bindParam(':status',$status);
	
	if($stmt->execute())
	{
		$conn=null;
		header("location:students.php?msg=4");
		exit;
	}
	
	$stmt=null;
	$conn=null;
?>