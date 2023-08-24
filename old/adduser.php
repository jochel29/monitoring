<?php
$lib_ID = $_POST['lib_ID'];
$name = $_POST['name'];
$departmentORcurriculum = $_POST['departmentORcurriculum'];
$user_type = $_POST['user_type'];
// if ($password == $re_password){
// 	// code add data to account table insert query
// 	// add echo "account register"
// }else{
// 	// echo "account already exist"
// }



$host = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbname = "monitoring";

$conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);

if ($conn->connect_error){
	die("connection failed." . $conn->connect_error);
}else{
	 $SELECT = "SELECT name FROM lib_user WHERE name ='". $name. "'";
     $INSERT = "INSERT INTO lib_user(lib_ID, name, departmentORcurriculum, user_type) values(?, ?, ?, ?)";

     $stmt = $conn->query($SELECT);
     if ($stmt->num_rows == 0) {
     	$stmt = $conn->prepare($INSERT);
     	$stmt->bind_param("ssss", $lib_ID, $name, $departmentORcurriculum, $user_type);
     	$stmt->execute();
     	echo "<script>alert('New records inserted successfully')</script>";
        header("location:adduserhtml.php");


     } else{

     	echo "Someone already register using this library ID";
     }
     $conn->close();

}

?>