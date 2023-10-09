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
		
		<div class="flex m-5 gap-3">
			<form action="" method="post">
				<input class="border border-solid border-black w-[400px] p-3 rounded rounded-lg" placeholder="Search..." name="name" type="text">
				<input class="p-3 rounded rounded-lg bg-gray-300 hover:bg-gray-400 text-l font-semibold" type="submit" name="search" value="Search">
			</form>
		</div>
		<div class="w-full p-3 mt-5">
			<table class="w-full border-collapse border border-solid">
				<tr>
					<th class="p-3 border border-solid">Library ID</th>
					<th class="p-3 border border-solid">Name</th>
					<th class="p-3 border border-solid">Department/Curriculum</th>
					<th class="p-3 border border-solid">User Type</th>
					<th class="p-3 border border-solid">Action</th>
				</tr>
				<?php 
					// include 'partial/db.php';
					if(isset($_POST['search'])){
						$name = $_POST['name'];
						$query = "SELECT * FROM lib_user WHERE name = '".$name."'";

					}else{
						$query = "SELECT * FROM lib_user";
					}
					
					$lib_userdata = mysqli_query($conn, $query);
					if (mysqli_num_rows($lib_userdata)>0){
						while($row = mysqli_fetch_assoc($lib_userdata)){
				?>
				<tr>
					<td class="p-3 border border-solid"><?php echo $row['lib_ID']; ?></td>
					<td class="p-3 border border-solid"><?php echo $row['name']; ?></td>
					<td class="p-3 border border-solid"><?php echo $row['departmentORcurriculum']; ?></td>
					<td class="p-3 border border-solid"><?php echo $row['user_type']; ?></td>
					<td class="p-3 flex justify-around border border-solid">	
						<button><a class="hover:underline" href="add-user.php?lib_ID=<?php echo $row['lib_ID']; ?>&name=<?php echo $row['name'] ?>&deptCurr=<?php echo $row['departmentORcurriculum'] ?>&userType=<?php echo $row['user_type'] ?>">Edit</a></button>
						<button><a class="hover:underline" href="functions/actions.php?lib_ID=<?php echo $row['lib_ID']; ?>">Delete</a></button>
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