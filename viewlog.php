<?php
$id = $_POST['id'];
$log_lib_id = $_POST['log_lib_id'];
$name = $_POST['name'];
$departmentORcurriculum = $_POST['departmentORcurriculum'];
$time_in = $_POST['time_in'];
$time_out = $_POST['time_out'];
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
	 $SELECT = "SELECT name FROM log WHERE name ='". $name. "'";
     $INSERT = "INSERT INTO log(id, log_lib_id, name, departmentORcurriculum, time_in, time_out) values(?, ?, ?, ?, ?, ?)";

     $stmt = $conn->query($SELECT);
     if ($stmt->num_rows == 0) {
     	$stmt = $conn->prepare($INSERT);
     	$stmt->bind_param("isssii",$id, $log_lib_id, $name, $departmentORcurriculum, $time_in, $time_out);
     	$stmt->execute();
     	echo "New records inserted successfully";

     } else{

     	echo "Someone already register using this library ID";
     }
     $conn->close();

}

?>

<?php
    $conn = mysqli_connect("localhost", "root", "", "monitoring");
    if ($conn-> connect_error) {
        die("Connection failed:". $conn-> connect_error);
    }

    $sql = "SELECT * FROM log";
    $result = $conn-> query($sql);

    if ($result-> num_rows > 0){
        while ($row = $result-> fetch_assoc()){
            echo "<tr><td>". $row["id"]. $row["log_lib_id"] . "</td><td>". $row["name"] . "</td><td>". $row["departmentORcurriculum"] . "</td><td>". $row["time_in"] . "</td><td>". $row["time_out"] . "</td></tr>";
        }
        echo "</table>";
    }
    else {
        echo "0 result";
    }

    $conn-> close();
    ?>

<?php
$conn=mysqli_connect("localhost","root","","monitoring");

if($conn){
    echo "";
}else{
    echo "error";
}

$query="SELECT * FROM log;";
$connect=mysqli_query($conn,$query);
$num=mysqli_num_rows($connect);

?>


</body>
</html>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>View Log</title>
	<link rel="stylesheet" href="dash.css" type="text/css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
	<form action="viewlog.php" method="POST">
	<div id="mySidenav" class="sidenav">
	    <p class="logo"><span>W</span>VSU-PC</p>
		<a href="adduserhtml.php" class="icon-a"><i class="fa fa-dashboard icons"></i>   ADD USER</a>
		<a href="viewlog.php"class="icon-a"><i class="fa fa-file icons"></i>   VIEW LOG</a>
		<a href="managehtml.php"class="icon-a"><i class="fa fa-circle-o-notch icons"></i> MANAGE ACCOUNT</a>
		<a href="#"class="icon-a"><i class="fa fa-tasks icons"></i>   LOG OUT</a>
	 
	</div>
	<div id=main>
		<form>
			 <label>Date From:</label>
			  <input type="date">
			  <label>Date To:</label>
			  <input type="date">

			<select name="department/curriculum" id="selectbox">
				<!-- <option value="SOICT">SOICT</option>
				<option value="SOIT">SOIT</option>
				<option value="SOED">SOED</option>
				<option value="SBM">SBM</option> -->
				<option value="BSIS">BSIS</option>
				<option value="BSINFOTECH">BSINFOTECH</option>
				<option value="BSED">BSED</option>
				<option value="BEED">BEED</option>
				<option value="BTVTED">BTVTED</option>
				<option value="BSHM">BSHM</option>
				<option value="BSIT">BSIT</option>
			</select>
			<p> User Type:</p>
			<label>Student</label>
			<input type="radio" value="Student" name="dept" id="student" checked>

			<label>Faculty</label>
			<input type="radio" value="Faculty" name="dept" id="faculty">



		   <br><input type="submit" value="filter">
		   <div>
			<table>
				<tr>
                    <th>ID</th>
					<th>Library ID</th>
					<th>Name</th>
					<th>Department/Curriculum</th>
					<th>Time In</th>
					<th>Time Out</th>
				</tr>
			</table>
</div>
        </tr>
        </thead>
        <div class="table2">
        <?php
            if($num > 0){
                while ($data=mysqli_fetch_assoc($connect)) {
                    echo "
                        <tr>
                            <td>".$data['id']."</td>
                            <td>".$data['log_lib_id']."</td>
                            <td>".$data['name']."</td>
                            <td>".$data['departmentORcurriculum']."</td>
                            <td>".$data['time_in']."</td>
                            <td>".$data['time_out']."</td>
                        </tr>

                    ";
                }    
            }
        ?>
        </div>
    </table>

	
		

			<button>Create CSV</button>
		
	</div>
<script type="text/javascript">
    var option1 = document.getElementById("student");
    var option2 = document.getElementById("faculty");
    var selectBox = document.getElementById("selectbox");

    option1.addEventListener("change", function() {
      selectBox.innerHTML = '<option value="BSIS">BSIS</option><option value="BSINFOTECH">BSINFOTECH</option><option value="BSED">BSED</option><option value="BEED">BEED</option><option value="BTVTED">BTVTED</option><option value="BSHM">BSHM</option><option value="BSIT">BSIT</option>';
    });

    option2.addEventListener("change", function() {
      selectBox.innerHTML = '<option value="SOICT">SOICT</option><option value="SOIT">SOIT</option><option value="SOED">SOED</option><option value="SBM">SBM</option>';
    });

  </script>

</body>
</html>