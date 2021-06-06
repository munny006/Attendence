<?php
include('database.php');
?>

<?php
class Student{
	private $db;
	public function __construct(){
		$this->db = new Database();
	}
	public function getStudents(){
		$query = "SELECT * from  student";
		$result = $this->db->select($query);
		return $result;
	}

	public function insertStudent($name,$roll){
		$name = mysqli_real_escape_string($this->db->link,$name);
		$roll = mysqli_real_escape_string($this->db->link,$roll);
		if (empty($name) || empty($name)) {
			$msg = "<div class ='alert alert-danger'><strong>Error!!!</strong>Field must not be empty !</div>";
			return $msg;
		}
	else{
		$stu_query = "INSERT INTO student(name,roll) VALUES('$name','$roll')";
		$stu_inserte =$this->db->insert($stu_query);


		 $stud_query = "INSERT INTO information(roll) VALUES('$roll')";
		$stu_inserte =$this->db->insert($stud_query);
		if ($stu_inserte) {
			$msg = "<div class ='alert alert-success'><strong>Success!!!</strong>Data inserted Sucessfully!</div>";
			return $msg;
		}
		else{
			$msg = "<div class ='alert alert-danger'><strong>Error!!!</strong>Data not inserted Sucessfully!</div>";
			return $msg;
		}
	}
	}




	public function insertAttend($cur_date,$attend = array()){
		$query = "SELECT DISTINCT att_time FROM information";
		$get_Data = $this->db->select($query);
		while ($result =$get_Data->fetch_assoc()) {
			$db_date = $result['att_time'];
			if ($cur_date == $db_date) {
				$msg = "<div class ='alert alert-danger'><strong>Error!!!</strong>Attendence Already taken today!</div>";
			return $msg;
			}
		}

		foreach ($attend as $atn_key => $atn_value) {
			if ($atn_value == "present") {
				$stu_query = "INSERT INTO information(roll,attend,att_time) VALUES('$atn_key','present',now())";
				$data_Insert = $this->db->insert($stu_query);
			}
			elseif($atn_value == "absent") {
				$stu_query = "INSERT INTO information(roll,attend,att_time) VALUES('$atn_key','absent',now())";
				$data_Insertt = $this->db->insert($stu_query);

			}
		}
		if ($data_Insert) {
			$msg = "<div class ='alert alert-success'><strong>Success!!!</strong> Attendence Data inserted Sucessfully!</div>";
			return $msg;
		}
		else{
			$msg = "<div class ='alert alert-danger'><strong>Error!!!</strong> Attendence Data not inserted Sucessfully!</div>";
			return $msg;
		}

	}


public function getDateList(){
	$query = "SELECT DISTINCT att_time FROM information";
		$result = $this->db->select($query);
		return $result;
}


 public function getalldata($dt)
{
	$query = "SELECT student.name, information.* FROM student
	INNER JOIN information
	ON student.roll ==information.roll 
	WHERE att_time = '$dt'";
		$result = $this->db->select($query);
		return $result;
}
}











?>