<?php
header('Content-Type: application/json');

include '../config.php';

$trs = "SELECT count(websites.id) AS webs, web_status.name AS status_name FROM `websites` INNER JOIN web_status ON websites.status = wsid GROUP BY status;";
$result = mysqli_query($conn,$trs);

$dw = array();
foreach ($result as $row) {
	$dw[] = $row;
}

mysqli_close($conn);

echo json_encode($dw);
?>