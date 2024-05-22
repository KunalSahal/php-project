<?php
	$classId	=	$_REQUEST["classId"];	
	include "include/top-most.php";
?>
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<meta name='viewport' content='width=device-width, initial-scale=1'>
<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
<title>
	Admin
</title>
<style>
	<?php	
		include "include/top.php";
	?>
	.rightpart .container 
	{
		width:100%;
		margin-left:-10px;
	}
	.sub-header
	{
		text-align:center;
		font-size:30px;
		font-weight:500;
		margin-right:auto;
	}
	.container .btn
	{
		text-align:right;
		float:right;
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
				<h4 class="alert-heading">Subject has been deleted Successfully!</h4>
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
				<h4 class="alert-heading">Subject has been added Successfully!</h4>
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
				<h4 class="alert-heading">Status has been updated Successfully!</h4>
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
				<h4 class="alert-heading">Subject has been updated Successfully!</h4>
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
	<div class="container">
		<table class="table">
			<thead>
				<tr>
					<th scope = "col">
						Class Name
					</th>
					<th scope = "col">
						Subject Name
					</th>
					<th scope = "col">
						Status
					</th>
					<th scope = "col">
						<a href="add-subject.php">
							<button type="submit" class="btn btn-primary sm-2">
								Add Subject
							</button>
						</a>
					</th>
				</tr>
			</thead>
			<tbody>	
				<?php
					include "database1-connect.php";
						$query ="select * from tblsubject order by subjectId desc";
						$stmt=$conn->prepare($query);
						$stmt->execute();
						for($i=1;$row=$stmt->fetch();$i++)
						{
				?>		
							<tr>
								<td>
									<?php
										$query1 ="select * from tblclass where classId=:classId";
										$stmt1=$conn->prepare($query1);
										$stmt1->bindParam(':classId',$row["classId"]);
										$stmt1->execute();
										for($i=1;$row1=$stmt1->fetch();$i++)
										{
											echo $row1["className"];	
										}	
										echo "<br>";
									?>
								</td>
								<td>
									<?php	
										echo $row["subjectName"];
										echo "<br>";
									?>
								</td>
								<td>
									<a data-bs-toggle="modal" data-bs-target="#Modal<?php echo $row["subjectId"]?>">
										<?php	
											$status=$row["status"];
											if($status==1)
											{
												echo "Active";
											}
											if($status==-1)
											{
												echo "<span style=\"color:red\">Inactive</span>";
											}
											echo "<br>";
										?>
									</a>
								</td>
								<form action="edit-subject-status-process.php?subjectId=<?php echo $row["subjectId"]?>" method="post">
									<div class="modal fade" id="Modal<?php echo $row["subjectId"];?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
										<div class="modal-dialog">
											<div class="modal-content">
												<div class="modal-header">
													<h1 class="modal-title fs-5" id="exampleModalLabel">
														Edit the status of<br> 
														Class : <?php echo $row["className"]?><br>
														Subject : <?php echo $row["subjectName"]?>
													</h1>
													<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
												</div>
												<div class="modal-body" required>
													<div class="form-check">
														<input class="form-check-input" type="radio" value=1 name="status" 
														<?php 
															if($row["status"]==1) 
																{
														?> 
															checked 
														<?php
																}
														?>  required >
														</input>
														<label class="form-check-label" for="flexRadioDefault1">
															Active
														</label>
													</div>
													<div class="form-check">
														<input class="form-check-input" type="radio" value=-1 name="status" 
														<?php 
															if($row["status"]==-1) 
																{
														?> 
															checked 
														<?php
																}
														?>  required >
														</input>
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
								<td>
									<button class="btn">
										<a href="edit-subject.php?return=1&subjectId=<?php echo $row["subjectId"]?>&status=<?php echo $row["status"]?>">
											<i class="fa fa-edit"></i>
										</a>
									</button>	
									<button class="btn">
										<a href="#" onclick="myFunction('<?php echo $row ["subjectName"]?>','<?php echo $row ["subjectId"]?>','<?php echo $row["className"]?>')">
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
</div>
<?php
	include "include/footer.php";
?>
<script>
	$("#navName").text("Welcome to Subject Management Panel");
	function myFunction(subjectName,subjectId,className){
		var subjectName = subjectName;
		var subjectId   = subjectId;
		var className   = className;
		var conf = confirm("Do you want to delete "+className+" "+subjectName)
		if(conf==true)
		{
			location.href="delete-subject.php?subjectId="+subjectId;	
			return true;
		}
		else
		{
			return false;
		}	
	}
</script>		
