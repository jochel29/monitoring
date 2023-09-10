<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="https://cdn.tailwindcss.com"></script>
	<title>Library Monitoring | Add User</title>
</head>
<body>

	<?php 
		// this include the nav php from partial folder
		include 'partial/nav.php';
		
	 ?>

	<!-- <p>add user page</p> -->

	<div class='flex items-center justify-center p-10'>
		<div class="w-[500px] border border-solid p-5 rounded rounded-xl bg-sky-300/50">
		<?php 
		if(isset($_GET['lib_ID'])){
			$lib_ID = $_GET['lib_ID'];
			$name = $_GET['name'];
			$deptCurr = $_GET['deptCurr'];
			$userType = $_GET['userType'];

			echo '
				<form class="w-full flex flex-col gap-5 justify-center" action="functions/actions.php" method="POST">
					<h1 class="font-bold text-2xl text-center">Add User</h1>
				<input class="w-full border border-solid p-5 rounded rounded-full" placeholder="Library ID" type="text" name="lib_ID" value="'.$lib_ID.'" required>
				<input class="w-full border border-solid p-5 rounded rounded-full" placeholder="Name" type="text" name="name" required value="'.$name.'">
				
					
					
			';
				if($userType == "Student" || $userType == "student"){
					echo '
						<select class="w-full border border-solid p-5 rounded rounded-full" name="departmentORcurriculum" id="selectbox">
							<option '.(($deptCurr == "BSIS")? 'selected':'').' value="BSIS">Bachelor of Science in Information Systems</option>
							<option '.(($deptCurr == "BSINFOTECH")? 'selected':'').' value="BSINFOTECH">Bachelor of Science in Information Technology</option>
							<option '.(($deptCurr == "BSED")? 'selected':'').' value="BSED">Bachelor of Secondary Education</option> 
							<option '.(($deptCurr == "BEED")? 'selected':'').' value="BEED">Bachelor of Elementary Education</option>
							<option '.(($deptCurr == "BTVTED")? 'selected':'').' value="BTVTED">Bachelor in Technical Vocational Teacher Education</option>
							<option '.(($deptCurr == "BSHM")? 'selected':'').' value="BSHM">Bachelor of Science in Hospitality Management</option>
							<option '.(($deptCurr == "BSIT")? 'selected':'').' value="BSIT">Bachelor of Science in Industrial Technology</option>
						</select>
						
						<div class="flex ml-3 gap-2">
								<p> User Type:</p>
								<input type="radio" value="Student" name="user_type" id="student" checked>
								<label>Student</label>
								<input  type="radio" value="Faculty" name="user_type" id="faculty">
								<label>Faculty</label>
							</div>
							
							<div class="flex gap-2">
								<input class="flex-grow p-5 rounded rounded-full bg-gray-300 hover:bg-gray-400 text-l font-semibold" type="submit" name="updateUser" value="Update">
								<input class="flex-grow p-5 rounded rounded-full bg-gray-300 hover:bg-gray-400 text-l font-semibold" type="submit" name="cancel" value="Cancel">
							</div>
							
						
					</form>
					';
				}else{
					echo '
						<select class="w-full border border-solid p-5 rounded rounded-full" name="departmentORcurriculum" id="selectbox">
							<option '.(($deptCurr == "SOICT")? 'selected':'').' value="SOICT">School of Information and Communications Technology</option>
							<option '.(($deptCurr == "SOIT")? 'selected':'').' value="SOIT">School of Industrial Technology</option>
							<option '.(($deptCurr == "SOED")? 'selected':'').' value="SOED">School of Education </option>
							<option '.(($deptCurr == "SBM")? 'selected':'').' value="SBM">School of Business Management </option>
						</select>

							<div class="flex ml-3 gap-2">
								<p> User Type:</p>
								<input type="radio" value="Student" name="user_type" id="student" >
								<label>Student</label>
								<input  type="radio" value="Faculty" name="user_type" id="faculty" checked>
								<label>Faculty</label>
							</div>
							
							<div class="flex gap-2">
								<input class="flex-grow p-5 rounded rounded-full bg-gray-300 hover:bg-gray-400 text-l font-semibold" type="submit" name="updateUser" value="Update">
								<input class="flex-grow p-5 rounded rounded-full bg-gray-300 hover:bg-gray-400 text-l font-semibold" type="submit" name="cancel" value="Cancel">
							</div>
					</form>
					';
				};
		}else{
			echo '
				<form class="w-full flex flex-col gap-5 justify-center" action="functions/actions.php" method="POST">
					<h1 class="font-bold text-2xl text-center">Add User</h1>
				<input class="w-full border border-solid p-5 rounded rounded-full" placeholder="Library ID" type="text" name="lib_ID" required>
				<input class="w-full border border-solid p-5 rounded rounded-full" placeholder="Name" type="text" name="name" required>
				<select class="w-full border border-solid p-5 rounded rounded-full" name="departmentORcurriculum" id="selectbox">
					<option value="BSIS">Bachelor of Science in Information Systems</option>
					<option value="BSINFOTECH">Bachelor of Science in Information Technology</option>
					<option value="BSED">Bachelor of Secondary Education</option> 
					<option value="BEED">Bachelor of Elementary Education</option>
					<option value="BTVTED">Bachelor in Technical Vocational Teacher Education</option>
					<option value="BSHM">Bachelor of Science in Hospitality Management</option>
					<option value="BSIT">Bachelor of Science in Industrial Technology</option>
				</select>
				
				<div class="flex ml-3 gap-2">
					<p> User Type:</p>
					<input type="radio" value="Student" name="user_type" id="student" checked>
					<label>Student</label>
					<input  type="radio" value="Faculty" name="user_type" id="faculty">
					<label>Faculty</label>
				</div>
				
				
				<input class="w-full p-5 rounded rounded-full bg-gray-300 hover:bg-gray-400 text-l font-semibold" type="submit" name="addUser" value="Add">
			
				</form>
			';
		};

		 ?>
		
		</div>
				

	</div>

	

				
		


						
	

</body>
<script type="text/javascript">
	var option1 = document.getElementById("student");
    var option2 = document.getElementById("faculty");
    var selectBox = document.getElementById("selectbox");

    option1.addEventListener("change", function() {
      selectBox.innerHTML = '<option value="BSIS">BSIS</option><option value="BSINFOTECH">BSINFOTECH</option><option value="BSED">BSED</option><option value="BEED">BEED</option><option value="BTVTED">BTVTED</option><option value="BSHM">BSHM</option><option value="BSIT">BSIT</option>';
    });

    option2.addEventListener("change", function() {
      selectBox.innerHTML = '<option value="SOICT">School of Information and Comunication Technology</option><option value="SOIT">School of Industrial Technology</option><option value="SOED">School of Education</option><option value="SBM">School of Business Management</option>';
    });
</script>
</html>