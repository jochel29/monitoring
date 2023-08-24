<?php
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];
$repassword = $_POST['repassword'];

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
	 $SELECT = "SELECT username FROM admin_account WHERE username ='". $username. "'";
     $INSERT = "INSERT INTO admin_account(username, email, password, repassword) values(?, ?, ?, ?)";
     if ($password == $repassword){
        $stmt = $conn->query($SELECT);
         if ($stmt->num_rows == 0) {
            $stmt = $conn->prepare($INSERT);
            $stmt->bind_param("sssi", $username, $email, $password, $repassword);
            $stmt->execute();
            //echo "New records inserted successfully";
            header("location:login.html");

         } else{

            echo "Someone already register using this library ID";
         }
         $conn->close();
     } else{
        echo "pass not match";
     };
     

}

?>