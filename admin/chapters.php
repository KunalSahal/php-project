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
				<h4 class="alert-heading">Chapter has been added successfully!</h4>
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
				<h4 class="alert-heading">Chapter has been deleted Successfully!</h4>
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
		if($_REQUEST["msg"]==5)
		{
	?>
			<div class="alert alert-success alert-dismissible fade show" role="alert">
				<h4 class="alert-heading">
					Chapter has been edited successfully!
				</h4>
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
			  <strong>Alert!</strong> Chapter already exists.
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
			  <strong>Alert!</strong> No Chapter found.
			  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>
	<?php		
		}
	?>
	<table class="table">
		<thead>
			<tr>
				<th scope = "col" style="text-align:center;">
					Classes 
				</th>
				<th scope = "col" style="text-align:center;">
					Subjects 
				</th>
				<th scope = "col" style="text-align:center;">
					Chapters 
				</th>
				<th scope = "col" style="text-align:center;">
					Status
				</th>
				<th scope = "col" style="text-align:center;">
					<a href="add-chapter.php">
						<button type="submit" class="btn btn-primary sm-2">
							Add Chapter
						</button>
					</a>
				</th>
			</tr>
		</thead>
		<tbody>	
			<?php
				include "database1-connect.php";
					$query ="select * from tblchapter order by chapterId desc";
					$stmt=$conn->prepare($query);
					$stmt->execute();
					for($i=1;$row=$stmt->fetch();$i++)
					{
			?>		
						<tr>
							<td style="text-align:center;">
								<?php
									$query1 ="select className from tblclass where classId=:classId";
									$stmt1=$conn->prepare($query1);
									$stmt1->bindParam(':classId',$row["classId"]);
									$stmt1->execute();
									for($i=1;$row1=$stmt1->fetch();$i++)
									{
										echo $row1["className"];
									}	
								?>&nbsp&nbsp;
							</td>
							<td style="text-align:center;">
								<?php
									$query2 ="select subjectName from tblsubject where subjectId=:subjectId";
									$stmt2=$conn->prepare($query2);
									$stmt2->bindParam(':subjectId',$row["subjectId"]);
									$stmt2->execute();
									for($i=1;$row2=$stmt2->fetch();$i++)
									{
										echo $row2["subjectName"];
									}
								?>&nbsp&nbsp;
							</td>
							<td style="text-align:center;">
								<?php	
									echo $row["chapterName"];
								?>&nbsp&nbsp;
							</td>	
							<td style="text-align:center;">
								<a data-bs-toggle="modal" data-bs-target="#Modal2<?php echo $row["chapterId"]?>">
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
							<form action="edit-chapter-status-process.php?chapterId=<?php echo $row["chapterId"]?>" method="post">
								<div class="modal fade" id="Modal2<?php echo $row["chapterId"]?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
									<div class="modal-dialog">
										<div class="modal-content">
											<div class="modal-header">
												<h1 class="modal-title fs-5" id="exampleModalLabel">
													Edit the status of<br>  
													Class : <?php echo $row["className"]?><br>
													Subject : <?php echo $row["subjectName"]?><br>
													Chapter : <?php echo $row["chapterName"]?>
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
									<a href="edit-chapter.php?chapterId=<?php echo $row["chapterId"]?>&status=<?php echo $row["status"]?>">
										<i class="fa fa-edit"></i>
									</a>
								</button>
								<button class="btn">
									<a href="#" onclick="myFunction('<?php echo $row ["subjectName"]?>','<?php echo $row ["chapterId"]?>','<?php echo $row ["chapterName"]?>','<?php echo $row["className"]?>')">
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
	$("#navName").text("Welcome To Chapter Management Panel");
	function myFunction(subjectName,chapterId,className,chapterName){
		var subjectName = subjectName;
		var chapterId   = chapterId;
		var className   = className;
		var chapterName = chapterName;
		var conf = confirm("Do you want to delete "+className+" "+subjectName+" "+chapterName)
		if(conf==true)
		{
			location.href="delete-chapter.php?chapterId="+chapterId;	
			return true;
		}
		else
		{
			return false;
		}	
	}
</script>		
		
