<?php
$classId = $_REQUEST["classId"];
include "database1-connect.php";
$query = "select subjectName from tblsubject where classId=:classId";
$stmt = $conn->prepare($query);
$stmt->bindParam(':classId',$classId);
$stmt->execute();
$numRow=$stmt->rowcount();
if($numRow == 0)
{
	echo "No subjects found.";
	$stmt = null;
	$conn = null;
}
for($i=1;$row=$stmt->fetch();$i++)
{
?>
<input class="form-check-input" type="checkbox" id="flexCheckDefault"/>
<?php	
	echo $row["subjectName"];	
?>
	<a href="#" onclick="myFunction2('<?php echo $row["subjectName"]?>','<?php echo $row["subjectId"]?>')">
		<i style="float:right;color:red"class="fa fa-close"></i>
	</a>
<br>
<?php
}
$stmt = null;
$conn = null;
?>