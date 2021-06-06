<?php 
	include('header.php');
	include('Student.php');
?>
<?php
error_reporting(0);
$stu = new Student();
$cur_date = date('Y-m-d');
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$attend = $_POST['attend'];
	$insertattend=$stu->insertAttend($cur_date,$attend); 
}
?>
<?php
if (isset($insertattend)) {
	echo $insertattend;
}

?>
	<div class="panel panel-default">
		<div class="panel-heading">
			<h2>
				<a href="add.php" class="btn btn-success">Add Student</a>
				<a href="data.php" class="btn btn-info pull-right">View All</a>
			</h2>
			
		</div>
		<div class="panel-body">
			<div class="well text-center bg-light py-3 my-3" style="font-size: 20px;">
				<strong>Date:</strong><?php  echo $cur_date;?>

				
			</div>
			<form accept="" method="POST">
				<table class="table table-striped">
					<tr class="text-center">
						<th width="25%">Serial</th>
						<th width="25%">Student Name</th>
						<th width="25%">Student Roll</th>
						<th width="25%">Attendance</th>
					</tr>
					<?php 
						$get_student = $stu->getStudents();
						if($get_student){
							$i = 0;
							while($value =$get_student->fetch_assoc()){
								$i++;
					?>

					<tr class="text-center">
						<td width="25%"><?php echo $i;?></td>
						<td width="25%"><?php echo $value['name'];?></td>
						<td width="25%"><?php echo $value['roll'];?></td>
						<td width="25%">
							<input type="radio" name="attend[<?php echo $value['roll'];?>]" value="present">P
							<input type="radio" name="attend[<?php echo $value['roll'];?>]" value="absent">A
						</td>
					</tr>
				<?php
                }  }
				?>
					<tr>
						<td>
							<input type="submit" name="submit" value="Submit" class="btn btn-secondary">
						</td>
					</tr>
					
				</table>
				
			</form>
			
		</div>
		
	</div>



<?php include('footer.php');?>