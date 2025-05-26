<?php
session_start();
include_once("config.php");
$woreda = $_SESSION['woreda'];

$sql_query = "SELECT *, trainings.id AS tid, fullname as name, sex, woredas.name as woreda, training_categories.name as category, training_categories.id as cat_id, trainings.type AS t_type, office, year, month FROM trainings JOIN woredas ON woreda = woredas.id JOIN training_categories ON category = training_categories.id ORDER BY fullname ASC";
if($_SESSION["role"] == "Zone"){
  $sql_query = "SELECT *, trainings.id AS tid, fullname as name, sex, woredas.name as woreda, training_categories.name as category, training_categories.id as cat_id, trainings.type AS t_type, office, year, month FROM trainings JOIN woredas ON woreda = woredas.id JOIN training_categories ON category = training_categories.id ORDER BY fullname ASC";
}elseif($_SESSION["role"] == "Woreda"){
  $sql_query = "SELECT *, trainings.id AS tid, fullname as name, sex, woredas.name as woreda, training_categories.name as category, categories.id as cat_id, trainings.type AS t_type, office, year, month FROM trainings JOIN woredas ON woreda = woredas.id JOIN training_categories ON category = training_categories.id WHERE woreda = '$woreda' ORDER BY fullname ASC";
}
$resultset = mysqli_query($conn, $sql_query) or die("database error:". mysqli_error($conn));
$trainees = array();
while( $rows = mysqli_fetch_assoc($resultset) ) {
  $trainees[] = $rows;
}

if(isset($_POST["ExportType"]))
{
   
    switch($_POST["ExportType"])
    {
        case "export-to-excel" :
            // Submission from
      $filename = "training_data_export_".date('YmdHms') . ".xlsx";     
            header("Content-Type: application/vnd.ms-excel");
      header("Content-Disposition: attachment; filename=\"$filename\"");
      ExportFile($trainees);
      //$_POST["ExportType"] = '';
            exit();
        default :
            die("Unknown action : ".$_POST["action"]);
            break;
    }
}
function ExportFile($records) {
  $heading = false;
    if(!empty($records))
      foreach($records as $row) {
      if(!$heading) {
        // display field/column names as a first row
        echo implode("\t", array_keys($row)) . "\n";
        $heading = true;
      }
      echo implode("\t", array_values($row)) . "\n";
      }
    exit;
}


?>