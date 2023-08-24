<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Library Monitoring</title>
</head>
<body>
	<!-- this where you code your login page -->
	<form action="functions/verify.php" method="POST">
  		<div class="box">
    		<center>
    			<h1>Login Form</h1>
    		</center>
    	</div>
	  	<table>
		   	<tr>
			    <td>Username :</td>
			    <td><input type="text" name="username" required></td>
		   	</tr>
		   	<tr>
			    <td>Password :</td>
			    <td><input type="password" name="password" required></td>
		   	</tr>

		   	<tr>
			    <td>
			      <center><input type="submit" value="Submit" name="login"></center>
			    </td>
		   	</tr>

		  	
		</table>
 </form>

</body>
</html>