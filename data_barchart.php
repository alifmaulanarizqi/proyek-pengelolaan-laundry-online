<?php
	header('Content-Type: application/json');
	$conn = mysqli_connect("localhost","root","","laundry");

	$sqlQuery = "SELECT DISTINCT bulan, total_per_bulan FROM total_transactions ORDER BY tanggal LIMIT 6";
	$result = mysqli_query($conn, $sqlQuery);

	$data = array();
	foreach ($result as $row) {
		$data[] = $row;
	}

	mysqli_close($conn);

	echo json_encode($data);
?>
