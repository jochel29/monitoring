<?php 

$conn = mysqli_connect("localhost", "root", "", "monitoring");
    if ($conn-> connect_error) {
        die("Connection failed:". $conn-> connect_error);
    }

$lib_userdata = mysqli_query($conn, "SELECT * FROM lib_user");



// $row = $lib_userdata->fetch_assoc();
// $lib_ID = $row['lib_ID'];
// $name = $row['name'];
// $departmentORcurriculum = $row['departmentORcurriculum'];
// $user_type = $row['user_type'];





 ?>