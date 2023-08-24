<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Library Monitoring | Add User</title>
</head>
<body>

	<?php 
		// this include the nav php from partial folder
		include 'partial/nav.php';
		
	 ?>

	<p>add user page</p>

	<div>
		<?php 
		if(isset($_GET['lib_ID'])){
			$lib_ID = $_GET['lib_ID'];
			$name = $_GET['name'];
			$deptCurr = $_GET['deptCurr'];
			$userType = $_GET['userType'];

			echo '
				<form action="functions/actions.php" method="POST">
					<h1>Update User</h1>
					<p>Library ID:</p>
					<input type="text" name="lib_ID" required value="'.$lib_ID.'">
					<p>Name:</p>
					<input type="text" name="name" required value="'.$name.'">
					<p>Department/Curriculum:</p>
					<!-- <input type="text" name="departmentORcurriculum" required> -->
					
					
			';
				if($userType == "Student" || $userType == "student"){
					echo '
						<select name="departmentORcurriculum" id="selectbox" >
						<option '.(($deptCurr == "BSIS")? 'selected':'').' value="BSIS">Bachelor of Science in Information Systems</option>
						<option '.(($deptCurr == "BSINFOTECH")? 'selected':'').' value="BSINFOTECH">Bachelor of Science in Information Technology</option>
						<option '.(($deptCurr == "BSED")? 'selected':'').' value="BSED">Bachelor of Secondary Education</option> 
						<option '.(($deptCurr == "BEED")? 'selected':'').' value="BEED">Bachelor of Elementary Education</option>
						<option '.(($deptCurr == "BTVTED")? 'selected':'').' value="BTVTED">Bachelor in Technical Vocational Teacher Education</option>
						<option '.(($deptCurr == "BSHM")? 'selected':'').' value="BSHM">Bachelor of Science in Hospitality Management</option>
						<option '.(($deptCurr == "BSIT")? 'selected':'').' value="BSIT">Bachelor of Science in Industrial Technology</option>
					</select>
						
						<p> User Type:</p>
					    <!-- <input type="text" name="user_type" required> -->
					    <label>Student</label>
						<input type="radio" value="Student" name="user_type" id="student" checked>
						<label>Faculty</label>
						<input type="radio" value="Faculty" name="user_type" id="faculty">
						<input type="submit" name="updateUser" value="Update">
						<input type="submit" name="cancel" value="Cancel"> 
					</form>
					';
				}else{
					echo '
						<select name="departmentORcurriculum" id="selectbox" ">
						<option '.(($deptCurr == "SOICT")? 'selected':'').' value="SOICT">School of Information and Communications Technology</option>
						<option '.(($deptCurr == "SOIT")? 'selected':'').' value="SOIT">School of Industrial Technology</option>
						<option '.(($deptCurr == "SOED")? 'selected':'').' value="SOED">School of Education </option>
						<option '.(($deptCurr == "SBM")? 'selected':'').' value="SBM">School of Business Management </option>
					</select>

						<p> User Type:</p>
				    <!-- <input type="text" name="user_type" required> -->
				    <label>Student</label>
					<input type="radio" value="Student" name="user_type" id="student" >
					<label>Faculty</label>
					<input type="radio" value="Faculty" name="user_type" id="faculty" checked>
					<input type="submit" name="updateUser" value="Update">
					<input type="submit" name="cancel" value="Cancel"> 
				</form>
					';
				};
		}else{
			echo '
				<form action="functions/actions.php" method="POST">
			<h1>Add User</h1>
			<p>Library ID:</p>
			<input type="text" name="lib_ID" required>
			<p>Name:</p>
			<input type="text" name="name" required>
			<p>Department/Curriculum:</p>
			<select name="departmentORcurriculum" id="selectbox">
				<option value="BSIS">Bachelor of Science in Information Systems</option>
				<option value="BSINFOTECH">Bachelor of Science in Information Technology</option>
				<option value="BSED">Bachelor of Secondary Education</option> 
				<option value="BEED">Bachelor of Elementary Education</option>
				<option value="BTVTED">Bachelor in Technical Vocational Teacher Education</option>
				<option value="BSHM">Bachelor of Science in Hospitality Management</option>
				<option value="BSIT">Bachelor of Science in Industrial Technology</option>
			</select>
			<p> User Type:</p>
		    <label>Student</label>
			<input type="radio" value="Student" name="user_type" id="student" checked>
			<label>Faculty</label>
			<input type="radio" value="Faculty" name="user_type" id="faculty">
			<input type="submit" name="addUser" value="Add">
		</form>
			';
		};

		 ?>
		


						
	

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