<?php include('header.php');
include('Student.php');
?>
<?php
$stu = new Student();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$name = $_POST['name'];
	$roll = $_POST['roll'];
	$insertdata=$stu->insertStudent($name,$roll); 
}
?>
<?php
if (isset($insertdata)) {
	echo $insertdata;
}

?>

	<div class="panel panel-default">
		<div class="panel-heading">
			<h2>
				<a href="add.php" class="btn btn-success">Add Student</a>
				<a href="index.php" class="btn btn-danger pull-right">Back</a>
			</h2>
			
		</div>
		<div class="panel-body">
			
			<form accept="" method="POST">
				<div class="form-group">
					<label form="name">Student Name</label>
					<input type="text" name="name" placeholder="Enter Your Name" class="form-control">
					
				</div>
				<div class="form-group">
					<label form="roll">Student Roll</label>
					<input type="text" name="roll" placeholder="Enter Your Roll" class="form-control">
					
				</div>
				<div class="form-group">
					
					<input type="submit" name="btn" value="Add Student" class="btn btn-primary">
					
				</div>
				
			</form>
			
		</div>
		
	</div>



<?php include('footer.php');?>