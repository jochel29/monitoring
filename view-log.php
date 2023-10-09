<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="https://cdn.tailwindcss.com"></script>
	<title>Library Monitoring | View Logs</title>
</head>
<body>
	<?php include 'partial/nav.php'; ?>


	<div class="mt-5 p-5 flex gap-3 items-center">
		<form  action="" method="POST">
			<div class="w-full flex gap-3 items-center">
				<div class="flex flex-col">
					<span class="text-sm">Date From:</span>
					<input class="border border-solid border-black px-2 rounded rounded-xl" type="date" name="dateFrom" value="<?php echo $dateFrom ?>">
				</div>
				<div class="flex flex-col">
					<span class="text-sm">Date To:</span>
					<input class="border border-solid border-black px-2 rounded rounded-xl" type="date" name="dateTo" value="<?php echo $dateFrom ?>">

				</div>
				
				<div class="flex flex-col">
					<span class="text-sm">Department/Curriculumn:</span>
					<select class="border border-solid border-black h-[28px] px-2 rounded rounded-xl" name="departmentORcurriculum" id="selectbox">
						<!-- <option value="SOICT">SOICT</option>
						<option value="SOIT">SOIT</option>
						<option value="SOED">SOED</option>
						<option value="SBM">SBM</option> -->
						<option value="BSIS">BSIS</option>
						<option value="BSINFOTECH">BSINFOTECH</option>
						<option value="BSED">BSED</option>
						<option value="BEED">BEED</option>
						<option value="BTVTED">BTVTED</option>
						<option value="BSHM">BSHM</option>
						<option value="BSIT">BSIT</option>
					</select>
				</div>
				<label> User Type:</label>
				<div class="">
					<input type="radio" value="Student" name="dept" id="student" checked>
					<label>Student</label>
				</div>
				<div class="">
					<input type="radio" value="Faculty" name="dept" id="faculty">
					<label>Faculty</label>
				</div>
				<input class="bg-gray-200 hover:bg-gray-300 px-2 py-1 w-20 rounded rounded-full" type="submit" value="Filter" name="filter">
			</div>
			
		</form>	
		<button class="bg-gray-200 hover:bg-gray-300 px-3 py-1 rounded rounded-full" onclick="printDiv()" >Print Data</button>	
	</div>

	<!-- button below has a onclick attribute that call the print div function in the JS script below -->
	
	<div class="w-full p-5" id="printTable">
		<script src="https://cdn.tailwindcss.com"></script>
		<!-- <div class="flex flex-wrap justify-center items-center  gap-3 mb-5">
			<div class="flex flex-col h-[150px] w-[150px] gap-3 justify-center items-center p-3 border border-solid border-black">
				<div class="font-bold text-lg">BS INFOTECH</div>
				<div class="font-bold text-3xl">0</div>
			</div>
			<div class="flex flex-col h-[150px] w-[150px] gap-3 justify-center items-center p-3 border border-solid border-black">
				<div class="font-bold text-lg">BSIS</div>
				<div class="font-bold text-3xl">0</div>
			</div>
			<div class="flex flex-col h-[150px] w-[150px] gap-3 justify-center items-center p-3 border border-solid border-black">
				<div class="font-bold text-lg">BSHM</div>
				<div class="font-bold text-3xl">0</div>
			</div>
			<div class="flex flex-col h-[150px] w-[150px] gap-3 justify-center items-center p-3 border border-solid border-black">
				<div class="font-bold text-lg">BEED</div>
				<div class="font-bold text-3xl">0</div>
			</div>
			<div class="flex flex-col h-[150px] w-[150px] gap-3 justify-center items-center p-3 border border-solid border-black">
				<div class="font-bold text-lg">BSED</div>
				<div class="font-bold text-3xl">0</div>
			</div>
			<div class="flex flex-col h-[150px] w-[150px] gap-3 justify-center items-center p-3 border border-solid border-black">
				<div class="font-bold text-lg">BTVTED</div>
				<div class="font-bold text-3xl">0</div>
			</div>
			<div class="flex flex-col h-[150px] w-[150px] gap-3 justify-center items-center p-3 border border-solid border-black">
				<div class="font-bold text-lg">BSIT</div>
				<div class="font-bold text-3xl">0</div>
			</div>
		</div>		   -->
		<div class="flex mb-5 gap-3 items-center">
			<p class="font-bold text-2xl">Total Users: </p>
			<p class="font-bold text-2xl" id="count">0</p>
		</div>
		<table class="w-full border-collapse border border-solid">
			<tr>
				<th class="p-3 border border-solid">No.</th>
				<th class="p-3 border border-solid">Library ID</th>
				<th class="p-3 border border-solid">Name</th>
				<th class="p-3 border border-solid">Department/Curriculum</th>	
				<th class="p-3 border border-solid">Time In</th>
				<th class="p-3 border border-solid">Time Out</th>
			</tr>

			<?php include 'functions/filter.php' ?>
			
		</table>
		<?php
			echo "<script> var data = '$json_data';</script>";
		?>
		<script>
			const countDiv = document.getElementById('count');
			// counting function
			function countUsersPerMonth(datas) {
				const userCounts = {};
				// console.log(datas)
				for(let entry of datas) {
					const logLibId = entry.log_lib_id;
					const dateSeperate = entry.time_in;
					// console.log(entry, dateSeperate)
					if(dateSeperate){
						let split = dateSeperate.split(' ')
						const loginDate = new Date(dateSeperate);
						// console.log(loginDate)
						const year = loginDate.getFullYear();
						const month = loginDate.getMonth() + 1; // Months are 0-indexed, so add 1 to get the correct month.

						// Create a unique key for each month and user combination.
						const key = `${year}-${month}-${logLibId}`;

						// If the key doesn't exist, increment the user count.
						if (!userCounts[key]) {
						userCounts[key] = 1;
						} else {
						// If the key exists, it means the user has already logged in during this month.
						// So, we don't increment the count again to ensure each user is counted only once per month.
						}
					}
					
				};
				console.log(userCounts)
				return userCounts;
			}

			
			let userCounts;
			userCounts = countUsersPerMonth(JSON.parse(data))
			
			// Display user counts per month
			let count = 0;
			for (const key in userCounts) {
				if (userCounts.hasOwnProperty(key)) {
					const [year, month, logLibId] = key.split('-');
					
					// console.log(`Month: ${month}/${year}, Users Count: ${userCounts[key]}`);
					count = count + userCounts[key];
				}
			}
			console.log(count)
			countDiv.innerHTML = count

			

			
		</script>
	</div>
	

</body>
<!-- code below print the table inside the div ID printTable!!@! -->
<script>

	


    var option1 = document.getElementById("student");
    var option2 = document.getElementById("faculty");
    var selectBox = document.getElementById("selectbox");

    option1.addEventListener("change", function() {
      selectBox.innerHTML = '<option value="BSIS">BSIS</option><option value="BSINFOTECH">BSINFOTECH</option><option value="BSED">BSED</option><option value="BEED">BEED</option><option value="BTVTED">BTVTED</option><option value="BSHM">BSHM</option><option value="BSIT">BSIT</option>';
    });

    option2.addEventListener("change", function() {
      selectBox.innerHTML = '<option value="SOICT">SOICT</option><option value="SOIT">SOIT</option><option value="SOED">SOED</option><option value="SBM">SBM</option>';
    });

	function printDiv() {
        var divContents = document.getElementById("printTable").innerHTML;
        var a = window.open('', 'Print-Window');
        a.document.open();
        a.document.write('<html>');
        a.document.write('<head>');
		a.document.write('<meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1"><title>Library Monitoring | Print</title></head>')
        a.document.write('<body >');
        a.document.write(divContents);
        a.document.write('</body></html>');
        a.document.close();
        setTimeout(function(){a.print();},1000);
        
    };

 </script>
</html>