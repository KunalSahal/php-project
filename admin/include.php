<!doctype html>
<html>
	<head>
		<title>
			include.php
		</title>
	</head>
	<body>
		<h1>
			Welcome to the include showing file 
		</h1>
		<h1>
			Made by Kunal 
		</h1>
		<?php
			require 'footer.php';
		?>
	</body>
</html>
<?php
# include tag in php helps in calling the value created on one page to mulitple pages.

# As the case of footer , you require its value on almost every page . So inspite of writing it on every page we can simply use include or required to use same formating on every page.

# Include can bring the same formatting on every page but if the file is missing it will not show any error and will simply run the further project which make your project vulnurable as even if an important key gets missing then also the other lot of programm will work by just showing an warrning 

# Required functions in the same way as of include but it will not work if the file that is used with the syntax required is missing which increases security of project . So it is mostly used in the projects.

# Include_once or required_once is used to as to import file but will not include it again and again if that file is once used earlier in your lot of project . It can be used to prevent repetetion also when you are not confirmed about the files earlier use. 
?>