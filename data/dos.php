<?php
header('Content-Type: application/json');

$conn = mysqli_connect("localhost","root","","db_ict");

$query = "SELECT *, sum(ams+ipm+teamv+jaws+faxaw+simu+dms+bsca+arkdb+ebcd+others) as total FROM `open_sources` INNER JOIN woredas ON woreda = woredas.id GROUP BY woreda;";
$result = mysqli_query($conn,$query);

$dos = array();
foreach ($result as $ops) {
	$dos[] = $ops;
}

mysqli_close($conn);

echo json_encode($dos);
?>