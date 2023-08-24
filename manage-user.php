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
					// include 'partial/db.php';
					$query = "SELECT * FROM lib_user";
					$lib_userdata = mysqli_query($conn, $query);
					if (mysqli_num_rows($lib_userdata)>0){
						while($row = mysqli_fetch_assoc($lib_userdata)){
				?>
				<tr>
					<td><?php echo $row['lib_ID']; ?></td>
					<td><?php echo $row['name']; ?></td>
					<td><?php echo $row['departmentORcurriculum']; ?></td>
					<td><?php echo $row['user_type']; ?></td>
					<td>	
						<button><a href="add-user.php?lib_ID=<?php echo $row['lib_ID']; ?>&name=<?php echo $row['name'] ?>&deptCurr=<?php echo $row['departmentORcurriculum'] ?>&userType=<?php echo $row['user_type'] ?>">Edit</a></button>
						<button><a href="functions/actions.php?lib_ID=<?php echo $row['lib_ID']; ?>">Delete</a></button>
					</td>
				</tr>
				<?php 

						}
					}
				 ?>

			</table>
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
      selectBox.innerHTML = '<option value="SOICT">SOICT</option><option value="SOIT">SOIT</option><option value="SOED">SOED</option><option value="SBM">SBM</option>';
    });
</script>
</html>