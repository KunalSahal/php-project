<?php
	$myfile = fopen("hi.txt", "w") or die("Unable to open file!");
	$txt= "my first file program\n";
	fwrite($myfile,$txt);
	fclose($myfile);
?>
<?php
	$my = fopen("hi.txt","r") or die ("Unable to open file!");
	echo fread($my,filesize("hi.txt"));
?>