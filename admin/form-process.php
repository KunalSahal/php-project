<!doctype html>

<?php
	session_start();
	$studentName   = trim($_REQUEST["studentName"]);
	$fatherName    = trim($_REQUEST["fatherName"]);
	$mobileNumber  = trim($_REQUEST["mobileNumber"]);
	$birthDate     = trim($_REQUEST["birthDate"]);
	$emailAddress  = trim($_REQUEST["emailAddress"]);
	
	$_SESSION["studentName"]  = $studentName; 
	$_SESSION["fatherName"]   = $fatherName;
	$_SESSION["mobileNumber"] = $mobileNumber;
	$_SESSION["birthDate"]    = $birthDate;
	$_SESSION["emailAddress"] = $emailAddress;
?>
<?php
	if(strlen($studentName)==0 || empty($studentName))
	{
		header("location:form.php?err=1");
		exit;
	}
?>
<?php
	if(strlen($fatherName)==0 || empty($studentName))
	{
		header("location:form.php?err=2");
		exit;
	}
?>
<?php
	if(strlen($mobileNumber)==0 || empty($mobileNumber))
	{
		header("location:form.php?err=3");
		exit;
	}
?>
<?php
	if(strlen($birthDate)==0 || empty($birthDate))
	{
		header("location:form.php?err=4");
		exit;
	}
?>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>
			<?php echo " Php Title "?>
		</title>
		<style>
			.form-container
			{	
				width:50%;
				border-right: 2px dashed #cccccc;
				border-top: 2px dashed #cccccc;
				height:600px;
				font-size:23px;
				padding-left:50px;
				padding-top:10px;
			}
			.form-container .button
			{
				margin-left:146px;
			}	
		</style>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
	</head>
	<body>
		<form>
			<d>
			<p style="font-size:23px; text-align:center;">
				Welcome to form process
			</p>
			<div class="form-container">
				<p>
					Name of the candidate : <b><?php echo $studentName; ?></b>
				</p>
				<p style=>
					Father's name of the candidate : <b><?php echo $fatherName; ?></b>
				</p>
				<p>
					Mobile number of the candidate : <b><?php echo $mobileNumber; ?></b>
				</p>
				<p>
					DOB of the candidate : <b><?php echo $birthDate; ?></b>
				</p>
				<p>
					Email id of the candidate : <b><?php echo $emailAddress; ?></b>
				</p>
				<div class="button">
					<button type="submit" class="btn btn-primary">
						Confirm
					</button>
				</div>
			</div>
		</form>
	</body>
</html>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
<?php
	// to remove warning . It can be done by xampp-php-php.ini-error_reporting-& ~E_WARNING.
	// header : helps in taking you to new page by providing the location of that particular link.
	// session start: used to make global varibale 
	// creates variable on the server end whereas cookies are created on the clients end.
	// made as under session_start(); $_SESSION["name of the variable"]
?>