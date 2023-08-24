
<?php
$host = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbname = "monitoring";

$conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);

$query = "SELECT log_lib_id, name, departmentORcurriculum, time_in, time_out FROM log LIMIT 10";
$result = mysqli_query($conn, $query) or die("database error:". mysqli_error($conn));
$records = array();
while( $rows = mysqli_fetch_assoc($result) ) {
	$records[] = $rows;
}	

?>

<?php
 include 'export.php';
?>

<div class="well-sm col-sm-12">
	<div class="btn-group pull-right">	
		<form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">					
			<button type="submit" id="export_csv_data" name='export_csv_data' value="Export to CSV" class="btn btn-info">Export to CSV</button>
		</form>
	</div>
</div>				  
<table id="" class="table table-striped table-bordered">
	<tr>
		<th>Library ID</th>
		<th>Name</th>
		<th>Departmen/Curriculum</th>	
		<th>Time In</th>
		<th>Time Out</th>
	</tr>

	<tbody>
		<?php foreach($records as $record) { ?>
		   <tr>
		   <td><?php echo $record ['log_lib_id']; ?></td>
		   <td><?php echo $record ['name']; ?></td>
		   <td><?php echo $record ['departmentORcurriculum']; ?></td>   
		   <td><?php echo $record ['time_in']; ?></td>
		   <td><?php echo $record ['time_out']; ?></td>   
		   </tr>
		<?php } ?>
	</tbody>
</table>	

