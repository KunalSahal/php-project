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
				<h4 class="alert-heading">Test has been added successfully!</h4>
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
				<h4 class="alert-heading">Test has been deleted Successfully!</h4>
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
				<h4 class="alert-heading">Test has been updated successfully!</h4>
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
					Test has been edited successfully!
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
					Class 
				</th>
				<th scope = "col" style="text-align:center;">
					Subject 
				</th>
				<th scope = "col" style="text-align:center;">
					Chapter 
				</th>
				<th scope = "col" style="text-align:center;">
					Test Name 
				</th>
				<th scope = "col" style="text-align:center;">
					Marks 
				</th>
				<th scope = "col" style="text-align:center;">
					Status
				</th>
				<th scope = "col" style="text-align:center;">
					<a href="add-test.php">
						<button type="submit" class="btn btn-primary sm-2">
							Add Test
						</button>
					</a>
				</th>
			</tr>
		</thead>
		<tbody>	
			<?php
				include "database1-connect.php";
					$query ="select * from tbltest1 order by testId desc";
					$stmt=$conn->prepare($query);
					$stmt->execute();
					$numRow=$stmt->rowcount();
					for($i=1;$row=$stmt->fetch();$i++)
					{
			?>		
						<tr>
							<td style="text-align:center;">
								<?php
									$stmt1=$conn->prepare("select className from tblclass where classId=:classId");
									$stmt1->bindParam(':classId',$row["classId"]);
									$stmt1->execute();
									while($row1=$stmt1->fetch())
									{
										echo $row1["className"];
									}
								?>&nbsp&nbsp;
							</td>
							<td style="text-align:left;">
								<?php
									$stmt2=$conn->prepare("select subjectId from tbltest1 where testId=:testId");
									$stmt2->bindParam(':testId',$row["testId"]);
									$stmt2->execute();
									for($j=1;$row2=$stmt2->fetch();$j++)
									{
										$subjectId = explode("#",$row2["subjectId"]);
										foreach($subjectId as $value)
										{
											echo "-> ";
											$stmt3=$conn->prepare("select subjectName from tblsubject where subjectId=:subjectId");
											$stmt3->bindParam(':subjectId',$value);
											$stmt3->execute();
											while($row3=$stmt3->fetch())
											{
												echo $row3["subjectName"]."<br>";
											}
										}	
									}	
								?>&nbsp&nbsp;
							</td>
							<td style="text-align:left;">
								<?php	
									$stmt4=$conn->prepare("select chapterId from tbltest1 where testId=:testId");
									$stmt4->bindParam(':testId',$row["testId"]);
									$stmt4->execute();
									for($k=1;$row4=$stmt4->fetch();$k++)
									{
										$chapterId = explode("#",$row4["chapterId"]);
										foreach($chapterId as $value)
										{
											echo "-> ";
											$stmt5=$conn->prepare("select chapterName from tblchapter where chapterId=:chapterId");
											$stmt5->bindParam(':chapterId',$value);
											$stmt5->execute();
											while($row5=$stmt5->fetch())
											{
												echo $row5["chapterName"]."<br>";
											}
										}
									}
								?>&nbsp&nbsp;
							</td>
							<td style="text-align:center;">
								<?php	
									echo $row["testName"];
								?>&nbsp&nbsp;
							</td>
							<td style="text-align:center;">
								<?php	
									echo $row["marks"];
								?>&nbsp&nbsp;
							</td>	
							<td style="text-align:center;">
								<a data-bs-toggle="modal" data-bs-target="#Modal2<?php echo $row["testId"]?>">
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
							<form action="edit-test-status-process.php?testId=<?php echo $row["testId"]?>" method="post">
								<div class="modal fade" id="Modal2<?php echo $row["testId"]?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
									<div class="modal-dialog">
										<div class="modal-content">
											<div class="modal-header">
												<h1 class="modal-title fs-5" id="exampleModalLabel">
													Edit the status of<br>  
													Class : <?php 
														$stmt1=$conn->prepare("select className from tblclass where classId=:classId");
														$stmt1->bindParam(':classId',$row["classId"]);
														$stmt1->execute();
														while($row1=$stmt1->fetch())
														{
															echo $row1["className"];
														}
													?><br>
													Test : <?php echo $row["testName"]?>
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
									<a href="edit-test.php?testId=<?php echo $row["testId"]?>&status=<?php echo $row["status"]?>">
										<i class="fa fa-edit"></i>
									</a>
								</button>
								<button class="btn">
									<a href="#" onclick="myFunction('<?php 
									$stmt1=$conn->prepare("select className from tblclass where classId=:classId");
									$stmt1->bindParam(':classId',$row["classId"]);
									$stmt1->execute();
									while($row1=$stmt1->fetch())
									{
										echo $row1["className"];
									}
									?>','<?php echo $row["testName"]?>','<?php echo $row["testId"]?>')">
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
	$stmt=null;
	$conn=null;
	include "include/footer.php";
?>	
<script>
	$("#navName").text("Welcome To Test Management Panel");
	function myFunction(className,testName,testId){	
		var className = className;
		var testName  = testName;
		var testId    = testId;
		var conf = confirm("Do you want to delete "+className+" "+testName)
		if(conf==true)
		{
			location.href="delete-test.php?testId="+testId;	
			return true;
		}
		else
		{
			return false;
		}	
	}
</script>		
		
