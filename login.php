<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="https://cdn.tailwindcss.com"></script>
	<title>Library Monitoring</title>
</head>
<body>
	<div class="h-screen w-screen flex items-center justify-center">
		<!-- this where you code your login page -->	
		<div class="w-[500px] border border-solid p-10 rounded rounded-xl bg-sky-300/50 ">
			<form class="w-full flex flex-col gap-5 items-center justify-center" action="functions/verify.php" method="POST">
				<p class="font-bold text-2xl">Log In</p>
				<input class="w-full border border-solid p-5 rounded rounded-full" placeholder="Username" type="text" name="username" required>
				<input class="w-full border border-solid p-5 rounded rounded-full" placeholder="Password" type="password" name="password" required>
				<input class="w-full border border-solid p-5 rounded rounded-full bg-gray-300 hover:bg-gray-400" type="submit" value="Submit" name="login">
				
			</form>
		</div>	
	</div>
</body>
</html>