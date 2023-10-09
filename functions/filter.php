<?php 
	$i = 0;
	if(isset($_POST['filter'])){
		$dateFrom = $_POST['dateFrom'];
		$dateTo = $_POST['dateTo'];
		$departmentORcurriculum = $_POST['departmentORcurriculum'];
		// echo $dateFrom. $dateTo. $departmentORcurriculum;
		$query = "SELECT * FROM log WHERE departmentORcurriculum = '".$departmentORcurriculum."' AND time_in BETWEEN '".$dateFrom."' and '".$dateTo."' ";
		$result = mysqli_query($conn, $query);
		if(mysqli_num_rows($result)>0){
			$data=array();
			while($row = mysqli_fetch_assoc($result)){
				$data[] = $row;
				$i = $i + 1;
				echo "<tr>
				<td class='p-3 border border-solid'>".$i."</td>
				<td class='p-3 border border-solid'>".$row ['log_lib_id']."</td>
			   <td class='p-3 border border-solid'>".$row ['name']."</td>
			   <td class='p-3 border border-solid'>".$row ['departmentORcurriculum']."</td>  
			   <td class='p-3 border border-solid'>".$row ['time_in']."</td>
			   <td class='p-3 border border-solid'>".$row ['time_out']."</td></tr>";
			};
			$json_data = json_encode($data);
		};

	}else{
		$query = "SELECT * FROM log";
		$result = mysqli_query($conn, $query);
		if(mysqli_num_rows($result)>0){
			$data=array();
			while($row = mysqli_fetch_assoc($result)){
				$data[] = $row;
				$i = $i + 1;
				echo "<tr>
				<td class='p-3 border border-solid'>".$i."</td>
			   <td class='p-3 border border-solid'>".$row ['log_lib_id']."</td>
			   <td class='p-3 border border-solid'>".$row ['name']."</td>
			   <td class='p-3 border border-solid'>".$row ['departmentORcurriculum']."</td>  
			   <td class='p-3 border border-solid'>".$row ['time_in']."</td>
			   <td class='p-3 border border-solid'>".$row ['time_out']."</td></tr>";
			};
			$json_data = json_encode($data);
			
		};
	};

 ?>