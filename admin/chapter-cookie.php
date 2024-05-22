<?php
	$cookieChapter = $_POST["array1"];

	setcookie("chapterId",$cookieChapter,time() + 10,"/");
	
?>