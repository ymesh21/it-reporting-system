<?php session_start();
//echo $_SESSION[‘session_name’];
//set a variable to the session name
$user = $_SESSION['username'];

if ($user) {
//select statement to find access level based on unique username

$query="SELECT * from users WHERE username=`$user`";
$result = mysqli_query($conn, $query);
if ($result && mysqli_num_rows($result) > 0){
while($row = mysqli_fetch_assoc($result)) {
//echo $row[‘Username’];
//echo $row[‘access_level’];

if ($row['role']=='Zone') {
//add custom content here for this user access level?>

<?php }

else if ($row['role']=="Woreda"){
//add custom content here for this user access level
?>

<?php
}
}
}
} else {
//add custom content here for public access level
?>
<?php }?>