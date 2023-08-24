<?php 
	$i = 0;
	if(isset($_POST['filter'])){
		$dateFrom = $_POST['dateFrom'];
		$dateTo = $_POST['dateTo'];
		$departmentORcurriculum = $_POST['departmentORcurriculum'];
		echo $dateFrom. $dateTo. $departmentORcurriculum;
		$query = "SELECT * FROM log WHERE departmentORcurriculum = '".$departmentORcurriculum."' AND time_in BETWEEN '".$dateFrom."' and '".$dateTo."' ";
		$result = mysqli_query($conn, $query);
		if(mysqli_num_rows($result)>0){
			while($row = mysqli_fetch_assoc($result)){
				$i = $i + 1;
				echo "<tr>
				<td>".$i."</td>
				td>".$row ['log_lib_id']."</td>
			   <td>".$row ['name']."</td>
			   <td>".$row ['departmentORcurriculum']."</td>  
			   <td>".$row ['time_in']."</td>
			   <td>".$row ['time_out']."</td></tr>";
			};
		};

	}else{
		$query = "SELECT * FROM log";
		$result = mysqli_query($conn, $query);
		if(mysqli_num_rows($result)>0){
			while($row = mysqli_fetch_assoc($result)){
				$i = $i + 1;
				echo "<tr>
				<td>".$i."</td>
			   <td>".$row ['log_lib_id']."</td>
			   <td>".$row ['name']."</td>
			   <td>".$row ['departmentORcurriculum']."</td>  
			   <td>".$row ['time_in']."</td>
			   <td>".$row ['time_out']."</td></tr>";
			};
		};
	};

 ?>