<?php
	header('Content-Type: application/json');
	$conn = mysqli_connect("localhost","root","","laundry");

	$sqlQuery = "SELECT tanggal, total FROM total_transactions";
	$result = mysqli_query($conn, $sqlQuery);

	$current_month_number = date("m");

	$data = array();
	foreach ($result as $row) {
		if(substr($row["tanggal"],5,2) == $current_month_number) {
			$data[] = $row;
		}
	}

	mysqli_close($conn);

	echo json_encode($data);
?>
