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