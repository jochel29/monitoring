<?php

$username = $_POST['username'];
$password = $_POST['password'];

$con = new mysqli("localhost","root","","monitoring");
if($con->connect_error) {
    die("Failed to connect : ".$con->connect_error);
}else{
    $stmt = $con->prepare("select * from admin_account where username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt_result = $stmt->get_result();
    if($stmt_result->num_rows > 0) {
        $data = $stmt_result->fetch_assoc();
        if($data['password'] === $password){
            // echo "Log In Sucessfull welcome " .$username  ;
            header("location:adduserhtml.php");

        }else{
            echo "invalid";
        }
    }else{
        echo "<h2>Invalid Username or Password</h2>";
    }

}
?>