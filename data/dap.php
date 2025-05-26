<?php
header('Content-Type: application/json');

$conn = mysqli_connect("localhost","root","","db_ict");

$trs = "SELECT sum(ccms) AS ccms, sum(ibex) as ibex, sum(payroll) as payroll,  sum(trls) as trls, sum(pass) as pass, sum(sigtas) as sigtas, sum(isla) as isla, sum(mis) mis, sum(icsmis) as imis, sum(pads) as pads, sum(omas) as omas, sum(others) as others, woredas.name, woreda  FROM `apps` INNER JOIN woredas ON woreda = woredas.id GROUP BY woreda;";
$result = mysqli_query($conn,$trs);

$dap = array();
foreach ($result as $apps) {
	$dap[] = $apps;
}

mysqli_close($conn);

echo json_encode($dap);
?>