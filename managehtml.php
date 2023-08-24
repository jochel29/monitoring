<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Add User</title>
	<link rel="stylesheet" href="dash.css" type="text/css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
	<form action="managehtml.php" method="POST">
	<div id="mySidenav" class="sidenav">
	    <p class="logo"><span>W</span>VSU-PC</p>
		  <a href="adduserhtml.php" class="icon-a"><i class="fa fa-dashboard icons"></i>   ADD USER</a>
		  <a href="viewlog.php"class="icon-a"><i class="fa fa-file icons"></i>   VIEW LOG</a>
		  <a href="managehtml.php"class="icon-a"><i class="fa fa-circle-o-notch icons"></i> MANAGE ACCOUNT</a>
		  <a href="#"class="icon-a"><i class="fa fa-tasks icons"></i>   LOG OUT</a>
	 
	</div>
	<div id=main>
		<form>
			<h1> Manage Account</h1>
		    <p> Username:</p>
		    <input type="text" name="username" required>
		    <p> Email:</p>
		    <input type="text" name="email" required>    
		    <p> Password:</p>
		    <input type="text" name="password" required>
		    
		    <br><input type="submit" value="submit">
		    <br><input type="submit" value="update" hidden >
				<input type="submit" value="cancel" hidden >
		</form>

		<div>
			<table>
				<tr>
					<th>Username</th>
					<th>Email</th>
					<th>Password</th>
					<th>Actions</th>
				</tr>
<?php 
	$conn = mysqli_connect("localhost", "root", "", "monitoring");
    if ($conn-> connect_error) {
        die("Connection failed:". $conn-> connect_error);
    }

	$admin_accountdata = mysqli_query($conn, "SELECT * FROM admin_account");
	if (mysqli_num_rows($admin_accountdata)>0){
		while($row = mysqli_fetch_assoc($admin_accountdata)){
?>
				<tr>
					<td><?php echo $row['username']; ?></td>
					<td><?php echo $row['email']; ?></td>
					<td><?php echo $row['password']; ?></td>
					
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
</html>