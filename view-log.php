<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Library Monitoring | View Logs</title>
</head>
<body>
	<?php include 'partial/nav.php'; ?>


	<div>
		<form action="" method="POST">
			<label>Date From:</label>
			<input type="date" name="dateFrom" value="<?php echo $dateFrom ?>">
			<label>Date To:</label>
			<input type="date" name="dateTo" value="<?php echo $dateFrom ?>">

			<select name="departmentORcurriculum" id="selectbox">
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
			<p> User Type:</p>
			<label>Student</label>
			<input type="radio" value="Student" name="dept" id="student" checked>
			<label>Faculty</label>
			<input type="radio" value="Faculty" name="dept" id="faculty">
			<input type="submit" value="filter" name="filter">
		</form>		
	</div>

	<!-- button below has a onclick attribute that call the print div function in the JS script below -->
	<button onclick="printDiv()" >Print Data</button>
	<div id="printTable">		  
		<table class="table table-striped table-bordered">
			<tr>
				<th>No.</th>
				<th>Library ID</th>
				<th>Name</th>
				<th>Department/Curriculum</th>	
				<th>Time In</th>
				<th>Time Out</th>
			</tr>

			<?php include 'functions/filter.php' ?>
			
		</table>
	</div>
	

</body>
<!-- code below print the table inside the div ID printTable!!@! -->
<script>

	function printDiv() {
        var divContents = document.getElementById("printTable").innerHTML;
        var a = window.open('', 'Print-Window');
        a.document.open();
        a.document.write('<html>');
        a.document.write('<head><meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1"><title>Library Monitoring | Print</title><link rel="stylesheet" type="text/css" href="style.css"></head>')
        a.document.write('<body >');
        a.document.write(divContents);
        a.document.write('</body></html>');
        a.document.close();
        setTimeout(function(){a.print();},1000);
        
    };


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