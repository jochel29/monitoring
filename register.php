<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Library Monitoring</title>
</head>
<body>
	<form action="functions/verify.php" method="POST">
	    <h1>Register Form</h1>

	    <p> Username:</p>
	    <input type="text" name="username" required> 
	    <p> Email:</p>
	    <input type="text" name="email" required>   
	    <p> Password:</p>
	    <input type="password" name="password" required>
	    <p> Re-password:</p>
	    <input type="password" name="repassword" required>

	    <br><input type="submit" value="register" name="register">



    </form>

</body>
</html>