<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Bootstrap demo</title>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
	</head>
	<body>
		<table class="table">
			<thead>
				<tr>
					<th scope="col">i</th>
					<th scope="col">ii</th>
					<th scope="col">iii</th>
					<th scope="col">iv</th>
					<th scope="col">v</th>
				</tr>
			</thead>
			<tbody>
			<?php
				$a=readline('Enter the number = ');
				echo $a;
				for($i=1;$i<=10;$i++)
				{
			?>
				<tr>
					<td>3</td>
					<td>x</td>
					<td><?php echo $i?></td>
					<td>=</td>
					<td><?php echo 3*$i?></td>			
				</tr>
			<?php
				}
			?>		
			</tbody>
		</table>
	</body>
</html>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous">
 </script>