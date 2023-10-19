<?php 
	
	include '../partial/db.php';

	if(isset($_POST['cancel'])){
		header('location:../add-user.php');
	};
	if(isset($_POST['updateUser'])){
		$id = $_POST['id'];
		$lib_ID = $_POST['lib_ID'];
		$name = $_POST['name'];
		$departmentORcurriculum = $_POST['departmentORcurriculum'];
		$user_type = $_POST['user_type'];

		$UPDATE = "UPDATE lib_user SET lib_ID = ?, name = ?, departmentORcurriculum = ?, user_type = ? WHERE id = ? ";
		$stmt = $conn->prepare($UPDATE);
		$stmt->bind_param('sssss', $lib_ID, $name, $departmentORcurriculum, $user_type, $id);

		if($stmt->execute()){
			// echo 'Record Updated';
			header('location:../manage-user.php');
		}else{
			echo 'Record update error';
		};

	};
	
	if(isset($_POST['addUser'])){
		$lib_ID = $_POST['lib_ID'];
		$name = $_POST['name'];
		$departmentORcurriculum = $_POST['departmentORcurriculum'];
		$user_type = $_POST['user_type'];

		$SELECT = "SELECT name FROM lib_user WHERE name='". $name. "'  ";
		$INSERT = "INSERT INTO lib_user(lib_ID, name, departmentORcurriculum, user_type) values (?, ?, ?, ?)";

		$stmt = $conn->query($SELECT);
		if($stmt->num_rows == 0){
			$stmt = $conn->prepare($INSERT);
			$stmt->bind_param("ssss", $lib_ID, $name, $departmentORcurriculum, $user_type);
			$stmt->execute();
			echo "<script>alert('New records inserted successfully')</script>";
			header('location:../add-user.php');
		}else{
			echo "Someone already register using this library ID";
		};
		$conn->close();
	};

	if(isset($_POST['addAccount'])){
		$username = $_POST['username'];
		$email = $_POST['email'];
		$password = $_POST['password'];

		$SELECT = "SELECT username FROM admin_account WHERE username='".$username."'";
		$INSERT = "INSERT INTO admin_account(username,email,password) values (?,?,?)";

		$stmt = $conn->query($SELECT);
		if($stmt->num_rows == 0){
			$stmt = $conn->prepare($INSERT);
			$stmt->bind_param("sss", $username,$email,$password);
			$stmt->execute();
			header('location:../manage-user.php');
		}else{
			echo "Someone already register using this username";
		};
		$conn->close();
	};
	if(isset($_GET['lib_ID'])){
		$lib_ID = $_GET["lib_ID"];
		// echo $lib_ID;
		$sql = "DELETE FROM lib_user WHERE lib_ID='" . $lib_ID . "'";
	    if(mysqli_query($conn, $sql)){
	    	header('location:../manage-user.php');
	    };	    
	};
 ?>