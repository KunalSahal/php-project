<title>math_functions</title>
<?php
	//1st function is pi() it only returns the value of pi
	echo 2+pi();
	echo "<br>"."<br>";
	//2nd function is min() it can print the least value in the whole lot 
	echo min(2,3,4,5,-6,0);//among the nos enterd in the min bracket it will only print -6
	echo "<br>"."<br>";
	//3rd function is max() it can print the max value in the whole lot
	echo max(2,3,10,3,6,7);
	echo "<br>"."<br>";
	//4th functio is sqrt() it will print the square root value of the no entered in the bracket 
	echo sqrt(13);
	echo "<br>"."<br>";
	//5th function is abs() it will return the positive value of any no entered in the bracket
	echo abs(10);
	echo "<br>"."<br>";
	//6th function is round() it round off the no the number entered in bracket to the nearest integer 
	echo round(33.49);
	echo "<br>"."<br>";
	//7th function is rand() it will generate a random number everytime (min,max) you can set a limit as well
	echo rand(1,100);
	echo "<br>"."<br>";
	//8th function is ** no before it gets the the power of no after the stars  
	$x=1000;$y=2;
	echo $x**$y;
?>