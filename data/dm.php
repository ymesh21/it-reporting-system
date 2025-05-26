<?php
header('Content-Type: application/json');

$conn = mysqli_connect("localhost","root","","db_ict");

$trs = "SELECT sum(desktop) AS desktop, sum(printer) as printer, sum(laptop) as laptop,  sum(photocopier) as photocopier, sum(fax) as fax, sum(scanner) as scanner, sum(switch) as sw, sum(projector) pr, sum(server) as sv, woredas.name, woreda  FROM `maintenances` INNER JOIN woredas ON woreda = woredas.id GROUP BY woreda;";
$result = mysqli_query($conn,$trs);

$dm = array();
foreach ($result as $mts) {
	$dm[] = $mts;
}

mysqli_close($conn);

echo json_encode($dm);
?>