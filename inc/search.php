<?php

$search = $_POST['search'];

include('config.php');

$conn = new mysqli($servername, $username, $password, $db);

if ($conn->connect_error){
	die("Connection failed: ". $conn->connect_error);
}

$sql = "select * from contacts where firstname like '%$search%' OR lastname like '%$search%' OR email like '%$search%'";

$result = $conn->query($sql);

if ($result->num_rows > 0){
while($row = $result->fetch_assoc() ){
	echo $row["firstname"]."  ".$row["lastname"]."<br>";
}
} else {
	echo "0 records";
}

?>