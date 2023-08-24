<!DOCTYPE html>
<html>
<head>
	
	<title>Add User</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="">
	<meta name="author" content="" />
	<link rel="stylesheet" href="dash.css" type="text/css"/>
    <link rel="stylesheet" href="css/css-family=Open+Sans-400italic,600italic,800italic,400,600,800.css" type="text/css">
	
</head>
<body>
	
	
	<div id="mySidenav" class="sidenav">
	    <p class="logo"><span>W</span>VSU-PC</p>
		<a href="adduserhtml.php" class="icon-a"><i class="fa fa-dashboard icons"></i>   ADD USER</a>
		  <a href="viewlog.php"class="icon-a"><i class="fa fa-file icons"></i>   VIEW LOG</a>
		  <a href="managehtml.php"class="icon-a"><i class="fa fa-circle-o-notch icons"></i> MANAGE ACCOUNT</a>
		  <a href="#"class="icon-a"><i class="fa fa-tasks icons"></i>   LOG OUT</a>
	 
	</div>
	<div id=main>
		<form action="adduserhtml.php" method="POST">
			<h1> Add User</h1>
		    <p> Library ID:</p>
		    <input type="text" name="lib_ID" required>
		    <p> Name:</p>
		    <input type="text" name="name" required>    
		    <p> Department/Curriculum:</p>
		    <input type="text" name="departmentORcurriculum" required>
		    <p> User Type:</p>
		    <input type="text" name="user_type" required>

		    <br><input type="submit" value="submit">
		    <br><input type="submit" value="update" hidden>
				<input type="submit" value="cancel" hidden>

		</form>

		<div>
			<table>
				<tr>
					<th>Library ID</th>
					<th>Name</th>
					<th>Department/Curriculum</th>
					<th>User Type</th>
					<th>Action</th>
				</tr>
<?php 
	$conn = mysqli_connect("localhost", "root", "", "monitoring");
    if ($conn-> connect_error) {
        die("Connection failed:". $conn-> connect_error);
    }

	$lib_userdata = mysqli_query($conn, "SELECT * FROM lib_user");
	if (mysqli_num_rows($lib_userdata)>0){
		while($row = mysqli_fetch_assoc($lib_userdata)){
?>
				<tr>
					<td><?php echo $row['lib_ID']; ?></td>
					<td><?php echo $row['name']; ?></td>
					<td><?php echo $row['departmentORcurriculum']; ?></td>
					<td><?php echo $row['user_type']; ?></td>
					<td>
	
						<button>edit</button>
						<button>delete</button>
					</td>
<?php 
	}
	}else{
		echo "error";
	}

 ?>
				</tr>
			</table>
		</div>	
	</div>

</body>
</html