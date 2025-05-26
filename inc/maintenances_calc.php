<?php
    $id = $_SESSION['id'];
    $specific = "WHERE woreda  = $woreda";
    if($page === 'home'){
        // Desktop calcuations
        $total_desktop = $conn->query("SELECT SUM(desktop) AS Total_desktop FROM `maintenances`".$specific) or die(mysqli_error($conn));
        // printer calculations
        $total_printer = $conn->query("SELECT SUM(printer) AS Total_printer FROM `maintenances`".$specific) or die(mysqli_error($conn));
        // laptop calculations
        $total_laptop = $conn->query("SELECT SUM(laptop) AS Total_laptop FROM `maintenances`".$specific) or die(mysqli_error($conn));
        // photocopier calculatins
        $total_photocopier = $conn->query("SELECT SUM(photocopier) AS Total_photocopier FROM `maintenances`".$specific) or die(mysqli_error($conn));
        // fax calculatins
        $total_fax = $conn->query("SELECT SUM(fax) AS Total_fax FROM `maintenances`".$specific) or die(mysqli_error($conn));
        // switch calculatins
        $total_switch = $conn->query("SELECT SUM(switch) AS Total_switch FROM `maintenances`".$specific) or die(mysqli_error($conn));
        //Prohector calculatins
        $total_projector = $conn->query("SELECT SUM(projector) AS Total_projector FROM `maintenances`".$specific) or die(mysqli_error($conn));
        // Server calculatins
        $total_server = $conn->query("SELECT SUM(server) AS Total_server FROM `maintenances`".$specific) or die(mysqli_error($conn));
        // Scanner calculatins
        $total_scanner = $conn->query("SELECT SUM(scanner) AS Total_scanner FROM `maintenances`".$specific) or die(mysqli_error($conn));
        // Price calculations
        $total_price = $conn->query("SELECT SUM(price) AS Total_price FROM `maintenances`".$specific) or die(mysqli_error($conn));
    } else{
        if($page === 'admin'){
            $total_desktop = $conn->query("SELECT SUM(desktop) AS Total_desktop FROM `maintenances`") or die(mysqli_error($conn));
            // printer calculations
            $total_printer = $conn->query("SELECT SUM(printer) AS Total_printer FROM `maintenances`") or die(mysqli_error($conn));
            // laptop calculations
            $total_laptop = $conn->query("SELECT SUM(laptop) AS Total_laptop FROM `maintenances`") or die(mysqli_error($conn));
            // photocopier calculatins
            $total_photocopier = $conn->query("SELECT SUM(photocopier) AS Total_photocopier FROM `maintenances`") or die(mysqli_error($conn));
            // fax calculatins
            $total_fax = $conn->query("SELECT SUM(fax) AS Total_fax FROM `maintenances`") or die(mysqli_error($conn));
            // switch calculatins
            $total_switch = $conn->query("SELECT SUM(switch) AS Total_switch FROM `maintenances`") or die(mysqli_error($conn));
            //Prohector calculatins
            $total_projector = $conn->query("SELECT SUM(projector) AS Total_projector FROM `maintenances`") or die(mysqli_error($conn));
            // Server calculatins
            $total_server = $conn->query("SELECT SUM(server) AS Total_server FROM `maintenances`") or die(mysqli_error($conn));
            // Scanner calculatins
            $total_scanner = $conn->query("SELECT SUM(scanner) AS Total_scanner FROM `maintenances`") or die(mysqli_error($conn));
            // Total price
            $total_price = $conn->query("SELECT SUM(price) AS Total_price FROM `maintenances`") or die(mysqli_error($conn));
        }
    }   

    // Total desktop
    $row_desktop = mysqli_fetch_assoc($total_desktop);
    $sum_desktop = $row_desktop['Total_desktop'];

    // Total printers
    $row_printer = mysqli_fetch_assoc($total_printer);
    $sum_printer = $row_printer['Total_printer'];

    // Total laptops
    $row_laptop = mysqli_fetch_assoc($total_laptop);
    $sum_laptop = $row_laptop['Total_laptop'];

    // Total photocopier
    $row_photocopier = mysqli_fetch_assoc($total_photocopier);
    $sum_photocopier = $row_photocopier['Total_photocopier'];

    // Total fax
    $row_fax = mysqli_fetch_assoc($total_fax);
    $sum_fax = $row_fax['Total_fax'];

    // Total scanner
    $row_scanner = mysqli_fetch_assoc($total_scanner);
    $sum_scanner = $row_scanner['Total_scanner'];

    // Total switch
    $row_switch = mysqli_fetch_assoc($total_switch);
    $sum_switch = $row_switch['Total_switch'];

    // Total projector
    $row_projector = mysqli_fetch_assoc($total_projector);
    $sum_projector = $row_projector['Total_projector'];

    // Total server
    $row_server = mysqli_fetch_assoc($total_server);
    $sum_server = $row_server['Total_server'];

    // Total saved price
    $row_price = mysqli_fetch_assoc($total_price);
    $sum_price = $row_price['Total_price'];

    // Total devices
    $sum_devices_total = $sum_desktop+$sum_printer+$sum_laptop+$sum_photocopier+$sum_fax+$sum_scanner+$sum_switch+$sum_projector+$sum_server;

?>