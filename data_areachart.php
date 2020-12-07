<?php
	header('Content-Type: application/json');
	$conn = mysqli_connect("localhost","root","","laundry");

	$sqlQuery = "SELECT tanggal, total FROM total_transactions";
	$result = mysqli_query($conn, $sqlQuery);

	$data = array();
	foreach ($result as $row) {
		$data[] = $row;
	}

	mysqli_close($conn);

	echo json_encode($data);
?>
