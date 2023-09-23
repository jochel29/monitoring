<?php 	
	session_start();
	// code below if the session status is true if not it will back to the login
	if ($_SESSION["status"] != true){
		header('location:login.php');
		$id = $_SESSION['id'];
	};
 ?>
<!-- this is where you code your structure for navigation -->
<div class="w-full p-5 flex justify-between items-center bg-gray-200">
	<div class="flex gap-3 items-center">
		<img class="h-12" src="./partial/logo.png" alt="">
		<p>Library Monitoring System</p>
	</div>
	<ul class="flex gap-4">
		<!-- <li><a class="hover:underline" href="index.php">DASHBOARD</a></li> -->
		<li><a class="hover:underline" href="add-user.php">ADD LIBRARY USER</a></li>
		<li><a class="hover:underline" href="view-log.php">VIEW LOGIN LOG</a></li>
		<li><a class="hover:underline" href="manage-user.php">MANAGE ACCOUNTS</a></li>
		<li>
			<!-- this form logout the user session in the logout.php -->
			<form action="functions/logout.php" method="POST">
				<input class="hover:underline" type="submit" name="logout" value="LOGOUT">
			</form>
		</li>
	</ul>
</div>
<?php 
	include 'db.php'
 ?>