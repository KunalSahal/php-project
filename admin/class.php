<?php
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
	.sub-header
	{
		text-align:center;
		font-size:30px;
		font-weight:500;
		margin-right:auto;
	}
	.button
	{
		text-align:right;
		margin-top:20px;
	}
	.btn a
	{
		text-decoration:none;
	}
	.btn1 a
	{
		text-decoration:none;
		color:white;
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
		if($_REQUEST["msg"]==5)
		{
	?>
			<div class="alert alert-success alert-dismissible fade show" role="alert">
				<h4 class="alert-heading">Class has been added successfully!</h4>
				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>
	<?php		
		}
	?>
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
		if($_REQUEST["msg"]== 2 || $_REQUEST["msg"]== 6 )
		{
	?>
			<div class="alert alert-success alert-dismissible fade show" role="alert">
				<h4 class="alert-heading">class has been deleted Successfully!</h4>
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
				<h4 class="alert-heading">Class has been updated successfully!</h4>
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
				<h4 class="alert-heading">Status has been updated successfully!</h4>
				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>
	<?php		
		}
	?>
	<?php
		if($_REQUEST["err"]==1)
		{
	?>
			<div class="alert alert-warning alert-dismissible fade show" role="alert">
			  <strong>Error!</strong> Wrong Input.
			  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>
	<?php		
		}
	?>
	<?php
		if($_REQUEST["err"]==2)
		{
	?>
			<div class="alert alert-warning alert-dismissible fade show" role="alert">
			  <strong>Alert!</strong> Class already exists.
			  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>
	<?php		
		}
	?>
	<?php
		if($_REQUEST["err"]==3)
		{
	?>
			<div class="alert alert-warning alert-dismissible fade show" role="alert">
			  <strong>Alert!</strong> Wrong Input.
			  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>
	<?php		
		}
	?>
	<?php
		if($_REQUEST["err"]==4)
		{
	?>
			<div class="alert alert-warning alert-dismissible fade show" role="alert">
			  <strong>Alert!</strong> No subjects found.
			  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>
	<?php		
		}
	?>
	<table class="table">
		<thead>
			<tr>
				<th scope = "col" style="text-align:center;">
					Class Name
				</th>
				<th scope = "col" style="text-align:center;">
					Status
				</th>
				<th scope = "col" style="text-align:center;">
					<a href="add-class.php">
						<button type="submit" class="btn btn-primary sm-2">
							Add Class
						</button>
					</a>
				</th>
			</tr>
		</thead>
		<tbody>	
			<?php
				include "database1-connect.php";
					$query ="select * from tblclass order by classId desc";
					$stmt=$conn->prepare($query);
					$stmt->execute();
					for($i=1;$row=$stmt->fetch();$i++)
					{
			?>		
						<tr>
							<td style="text-align:center;">	
								<a onclick="myFunction1('<?php echo $row["classId"]?>','<?php echo $row["className"]?>')" data-bs-toggle="modal" data-bs-target="#Modal2">	
									<?php
										echo $row["className"];
									?>&nbsp&nbsp;
								</a>	
							</td>
							<div class="modal fade" id="Modal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header">
											<h1 class="modal-title fs-5">Subjects of <span id="className"></span></h1>
											<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
										</div>
										<div class="modal-body">
											<p id="subModal"></p>
										</div>	
										<div class="modal-footer">
											<button type="btn" class="btn btn-primary btn1">
												<a href="add-subject.php">	
													Add Subject
												</a>	
											</button>	
											<button type="button" class="btn btn-danger" data-bs-dismiss="modal">
												Close
											</button>
										</div>
									</div>
								</div>
							</div>	
							<td style="text-align:center;">
								<a data-bs-toggle="modal" data-bs-target="#Modal1<?php echo $row["classId"]?>">
									<?php	
										$status=$row["status"];
										if($status==1)
										{
											echo "Active";
										}
										if($status==2)
										{
											echo "<span style=\"color:red\">Inactive</span>";
										}
										echo "<br>";
									?>
								</a>
							</td>
							<form action="edit-class-status-process.php?classId=<?php echo $row["classId"]?>" method="post">
								<div class="modal fade" id="Modal1<?php echo $row["classId"];?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
									<div class="modal-dialog">
										<div class="modal-content">
											<div class="modal-header">
												<h1 class="modal-title fs-5" id="exampleModalLabel">Edit the status of <?php echo $row["className"]?></h1>
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
													<input class="form-check-input" type="radio" value=2 name="status" 
													<?php 
														if($row["status"]==2) 
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
							<td style="text-align:center;">
								<button class="btn">
									<a href="edit-class.php?return=1&classId=<?php echo $row["classId"]?>&status=<?php echo $row["status"]?>">
										<i class="fa fa-edit"></i>
									</a>
								</button>
								<button class="btn delet-btn">
									<a href="#" onclick="myFunction('<?php echo $row["className"]?>','<?php echo $row["classId"]?>')">
										<i class="fa fa-trash"></i>
									</a>
								</button>
							</td>
						</tr>		
				<?php
					}
					$stmt=null;
					$conn=null;
				?>	
		</tbody>
	</table>
</div>	
<?php	
	include "include/footer.php";
?>
<script>
	$("#navName").text("Welcome To Class Management Panel");
	function myFunction(className,classId){
		var className = className;
		var classId = classId;
		var conf = confirm("Do you want to delete "+className)
		if(conf==true)
		{
			location.href="delete-class.php?classId="+classId;	
			return true;
		}
		else
		{
			return false;
		}	
	}
	function myFunction1(classId,className){
		var classId   = classId;
		var className = className;
		$.post("modal-subjects.php",{classId:classId},function(data){
			$("#subModal").html(data);
		});
		$("#className").text(className);	
	}
	function myFunction2(subjectName,subjectId){
		var subjectName = subjectName;
		var subjectId   = subjectId;
		var conf = confirm("Do you want to delete "+subjectName)
		if(conf==true)
		{
			location.href="delete-subject.php?return=1&subjectId="+subjectId;
			return true;
		}
		else
		{
			return false;
		}	
	}	
</script>	