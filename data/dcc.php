<?php
header('Content-Type: application/json');

$conn = mysqli_connect("localhost","root","","db_ict");

$ccs = "SELECT count(ccenters.id) AS cc, status FROM `ccenters` GROUP BY status;";
$result = mysqli_query($conn,$ccs);

$dc = array();
foreach ($result as $row) {
	$dc[] = $row;
}

mysqli_close($conn);

echo json_encode($dc);
?>