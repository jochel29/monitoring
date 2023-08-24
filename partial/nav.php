<?php 	
	session_start();
	// code below if the session status is true if not it will back to the login
	if ($_SESSION["status"] != true){
		header('location:login.php');
		$id = $_SESSION['id'];
	};
 ?>
<!-- this is where you code your structure for navigation -->
<div>
	<ul>
		<li>DASHBOARD</li>
		<li><a href="add-user.php">ADD LIBRARY USER</a></li>
		<li><a href="view-log.php">VIEW LOGIN LOG</a></li>
		<li><a href="manage-user.php">MANAGE ACCOUNTS</a></li>
		<li>
			<!-- this form logout the user session in the logout.php -->
			<form action="functions/logout.php" method="POST">
				<input type="submit" name="logout" value="Logout">
			</form>
		</li>
	</ul>
</div>
<?php 
	include 'db.php'
 ?>