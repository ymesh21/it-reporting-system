<?php
header('Content-Type: application/json');

include '../config.php';

$trs = "SELECT cname, COUNT(tid) as total FROM trainings LEFT JOIN categories On category = cid GROUP By category;";
$result = mysqli_query($conn,$trs);

$dt = array();
foreach ($result as $row) {
	$dt[] = $row;
}

mysqli_close($conn);

echo json_encode($dt);
?>