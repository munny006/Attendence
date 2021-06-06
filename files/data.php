<?php 
	include('header.php');
	include('Student.php');
?>

	<div class="panel panel-default">
		<div class="panel-heading">
			<h2>
				<a href="add.php" class="btn btn-success">Add Student</a>
				<a href="index.php" class="btn btn-info pull-right">Take Attendence</a>
			</h2>
			
		</div>
		<div class="panel-body">
			
			<form accept="" method="POST">
				<table class="table table-striped">
					<tr class="text-center">
						<th width="30%">Serial</th>
						<th width="50%">Attendence Date</th>
						<th width="20%">Action</th>
					
					</tr>
					<?php 
					$stu = new Student();
						$get_Date = $stu->getDateList();
						if($get_Date){
							$i = 0;
							while($value = $get_Date->fetch_assoc()){
								$i++;
					?>

					<tr class="text-center">
						<td width="30%"><?php echo $i;?></td>
						<td width="50%"><?php echo $value['att_time'];?></td>
					
						<td width="20%">
							<a class="btn btn-secondary" href="student_view.php?dlt=<?php echo $value['att_time'];?>">View</a>
						</td>
					</tr>
				<?php
                }  }
				?>
					
				</table>
				
			</form>
			
		</div>
		
	</div>



<?php include('footer.php');?>