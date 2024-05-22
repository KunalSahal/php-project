<?php
	setcookie("adminId","",time() - 3600,"/");
	header("location:login.php?msg=1");
	exit;
?>