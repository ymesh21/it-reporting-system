<?php
header('Content-Type: application/json');

$conn = mysqli_connect("localhost","root","","db_ict");

$query = "SELECT sum(desktop+printer+laptop+photocopier+fax+scanner+switch+projector+server) as total, woredas.name, woreda  FROM `maintenances` INNER JOIN woredas ON woreda = woredas.id GROUP BY woreda;";
$result = mysqli_query($conn,$query);

$dmt = array();
foreach ($result as $mts) {
	$dmt[] = $mts;
}

mysqli_close($conn);

echo json_encode($dmt);
?>