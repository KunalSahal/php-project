<?php	
	include "include/top-most.php";
?>
<title>
	Title
</title>
<style>
	.container
	{
		width : 50%;
		margin-left : auto;
	}
	img
	{
		margin-left : 40px;
	}
	.container .button
	{
		float : right;
	}
	<?php	
		include "include/top.php";
	?>
	<?php	
		include "include/footer-style.php";
	?>
</style>
<?php
	include "include/head.php";
	include "include/leftpart.php";
?>
<div class="rightpart">
	<form action="img-upload-process.php" method="post" enctype="multipart/form-data">
		<div class="container">	
			<div class="row">
				<div class="col-md-10">
					<img src="img-upload/<?php echo $img;?>">
				</div>	
				<div class="col-md-10">
					<input class="form-control" type="file" id="formFile">
				</div>
				<div class="col-md-10 ">
					<br>
					<button type="button" class="btn btn-primary button">
						Upload Image
					</button>
				</div>	
			</div>	
		</div>	
	</form>
</div>
<?php
	include "include/footer.php";
?>		
