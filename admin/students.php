<?php	
	include "include/top-most.php";
?>
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<meta name='viewport' content='width=device-width, initial-scale=1'>
<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
<title>
	Title
</title>
<style>
	<?php	
		include "include/top.php";
	?>
	.sub-header
	{
		text-align:center;
		font-size:30px;
		font-weight:500;
		margin-right:auto;
	}
	img
	{
		height : 40px;
	}
	.button
	{
		text-align:right;
		margin-top:20px;
	}
	<?php	
		include "include/footer-style.php";
	?>
</style>
<?php
	include "include/head.php";
	include "include/leftpart.php";
?>
<div class="rightpart">
	<?php
		if($_REQUEST["msg"]==1)
		{
	?>
			<div class="alert alert-success alert-dismissible fade show" role="alert">
				<h4 class="alert-heading">Student has been updated successfully!</h4>
				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>
	<?php		
		}
	?>
	<?php
		if($_REQUEST["msg"]==2)
		{
	?>
		<div class="alert alert-success alert-dismissible fade show" role="alert">
			<h4 class="alert-heading">Student has been deleted Successfully!</h4>
			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
		</div>
	<?php		
		}
	?>
	<?php
		if($_REQUEST["msg"]==3)
		{
	?>
			<div class="alert alert-success alert-dismissible fade show" role="alert">
				<h4 class="alert-heading">Status has been updated successfully!</h4>
				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>
	<?php		
		}
	?>
	<?php
		if($_REQUEST["msg"]==4)
		{
	?>
			<div class="alert alert-success alert-dismissible fade show" role="alert">
				<h4 class="alert-heading">Student has been added successfully!</h4>
				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>
	<?php		
		}
	?>
	<?php
		if($_REQUEST["err"]==17)
		{
	?>
			<div class="alert alert-warning alert-dismissible fade show" role="alert">
			  <strong>Error!</strong> Wrong Input.
			  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>
	<?php		
		}
	?>
	<table class="table">
		<thead>
			<tr>
				<th scope = "col">Image</th>
				<th scope = "col">Student Name</th>
				<th scope = "col">Class</th>
				<th scope = "col">Student Number</th>
				<th scope = "col">Father Name</th>
				<th scope = "col">Father Number</th>
				<th scope = "col">Status</th>
				<th scope = "col">
					<a href="add-student.php">
						<button type="submit" class="btn btn-primary sm-2">
							Add Student
						</button>
					</a>
				</th>
			</tr>
		</thead>
		<tbody>	
			<?php
				include "database1-connect.php";
					$query ="select * from tblstudents order by studentId desc";
					$stmt=$conn->prepare($query);
					$stmt->execute();
					for($i=1;$row=$stmt->fetch();$i++)
					{
			?>		
						<tr>
							<td>
								<a href="img-upload.php?img=<?php echo $row["imgPath"]?>&studentId=<?php echo $row["studentId"]?>">
									<img src="img-upload/<?php echo $row["imgPath"]?>">
								</a>	
							</td>
							<td>
								<?php	
									echo $row["studentName"];
									echo "<br>";
								?>
							</td>
							<td>
								<?php
									$query1 ="select className from tblclass where classId=:classId";
									$stmt1=$conn->prepare($query1);
									$stmt1->bindParam(':classId',$row["selectClass"]);
									$stmt1->execute();
									for($i=1;$row1=$stmt1->fetch();$i++)
									{
										echo $row1["className"];
										echo "<br>";
									}	
								?>
							</td>
							<td>
								<?php
									echo $row["studentNumber"];
									echo "<br>";
								?>
							</td>
							<td>
								<?php
									echo $row["fatherName"];
									echo "<br>";
								?>
							</td>
							<td>
								<?php
									echo $row["fatherNumber"];
									echo "<br>";
								?>
							</td>
							<td>
								<a data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo $row["studentId"]?>">
									<?php	
										$status=$row["status"];
										if($status==-1)
										{
											echo "<span style=\"color:red\">Suspended";
										}
										if($status==1)
										{
											echo "Active";
										}
										if($status==2)
										{
											echo "Inactive";
										}
										echo "<br>";
									?>
								</a>
								<form action="edit-student-status-process.php?studentId=<?php echo $row["studentId"]?>" method="post">
									<div class="modal fade" id="exampleModal<?php echo $row["studentId"];?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
										<div class="modal-dialog">
											<div class="modal-content">
												<div class="modal-header">
													<h1 class="modal-title fs-5" id="exampleModalLabel">Edit the status of <?php echo $row["studentName"]?></h1>
													<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
												</div>
												<div class="modal-body" required>
													<div class="form-check">
														<input class="form-check-input" type="radio" value=-1 name="status" 
														<?php 
															if($row["status"]==-1) 
																{
														?> 
															checked 
														<?php
																}
														?>  required ></input>
														<label class="form-check-label" for="flexRadioDefault1">
															Suspended 
														</label>
													</div>
													<div class="form-check">
														<input class="form-check-input" type="radio" value=1 name="status" 
														<?php 
															if($row["status"]==1) 
																{
														?> 
															checked 
														<?php
																}
														?>  required ></input>
														<label class="form-check-label" for="flexRadioDefault1">
															Active
														</label>
													</div>
													<div class="form-check">
														<input class="form-check-input" type="radio" value=2 name="status" 
														<?php 
															if($row["status"]==2) 
																{
														?> 
															checked 
														<?php
																}
														?>  required ></input>
														<label class="form-check-label" for="flexRadioDefault1">
															Inactive
														</label>
													</div>
												</div>	
												<div class="modal-footer">
													<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
														Close
													</button>
													<button type="submit" class="btn btn-primary">
														Save changes
													</button>	
												</div>
											</div>
										</div>
									</div>
								</form>	
							</td>
							<td>
								<button class="btn" >
									<a href="edit-student.php?studentId=<?php echo $row ["studentId"]?>&status=<?php echo $row ["status"]?>">
										<i class="fa fa-edit"></i>
									</a>
								</button>
								<button class="btn">
									<a href="delete-student.php?studentId=<?php echo $row ["studentId"]?>">
										<i class="fa fa-trash"></i>
									</a>
								</button>
							</td>
						</tr>
				<?php
					}
				?>	
		</tbody>
	</table>
</div>
<?php
	include "include/footer.php";
?>	
<script>
	$(document).ready(function(){
		$("#navName").text("Welcome To Student Management Panel");
	});
</script>	
