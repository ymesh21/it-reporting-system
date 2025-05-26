<?php
if($page == 'apps'){
    $where = 'WHERE apps.woreda IN(SELECT woreda FROM contacts WHERE contacts.id  = '.$id.')';
} else $where = '';
    // ccms calcuations
    $total_ccms = $conn->query("SELECT SUM(ccms) AS Total_ccms FROM `apps` ".$where) or die(mysqli_error($conn));
    // printer calculations
    $total_ibex = $conn->query("SELECT SUM(ibex) AS Total_ibex FROM `apps` ".$where) or die(mysqli_error($conn));
    // payroll calculations
    $total_payroll = $conn->query("SELECT SUM(payroll) AS Total_payroll FROM `apps` ".$where) or die(mysqli_error($conn));
    // pass calculatins
    $total_pass = $conn->query("SELECT SUM(pass) AS Total_pass FROM `apps` ".$where) or die(mysqli_error($conn));
    // trls calculatins
    $total_trls = $conn->query("SELECT SUM(trls) AS Total_trls FROM `apps` ".$where) or die(mysqli_error($conn));
    // mis calculatins
    $total_mis = $conn->query("SELECT SUM(mis) AS Total_mis FROM `apps` ".$where) or die(mysqli_error($conn));
    //icsmis calculatins
    $total_icsmis = $conn->query("SELECT SUM(icsmis) AS Total_icsmis FROM `apps` ".$where) or die(mysqli_error($conn));
    // sigtas calculatins
    $total_sigtas = $conn->query("SELECT SUM(sigtas) AS Total_sigtas FROM `apps` ".$where) or die(mysqli_error($conn));
    // omas calculatins
    $total_omas = $conn->query("SELECT SUM(omas) AS Total_omas FROM `apps` ".$where) or die(mysqli_error($conn));
    $total_pads = $conn->query("SELECT SUM(pads) AS Total_pads FROM `apps` ".$where) or die(mysqli_error($conn));
    $total_isla = $conn->query("SELECT SUM(isla) AS Total_isla FROM `apps` ".$where) or die(mysqli_error($conn));    

    $total_others = $conn->query("SELECT SUM(others) AS Total_others FROM `apps` ". $where) or die(mysqli_error($conn)); 
    // Total ccms
    $row_ccms = mysqli_fetch_assoc($total_ccms);
    $sum_ccms = $row_ccms['Total_ccms'];
    // Total ibex
    $row_ibex = mysqli_fetch_assoc($total_ibex);
    $sum_ibex = $row_ibex['Total_ibex'];
    // Total payroll
    $row_payroll = mysqli_fetch_assoc($total_payroll);
    $sum_payroll = $row_payroll['Total_payroll'];
    // Total pass
    $row_pass = mysqli_fetch_assoc($total_pass);
    $sum_pass = $row_pass['Total_pass'];
    // Total trls
    $row_trls = mysqli_fetch_assoc($total_trls);
    $sum_trls = $row_trls['Total_trls'];
    // Total mis
    $row_mis = mysqli_fetch_assoc($total_mis);
    $sum_mis = $row_mis['Total_mis'];
    // Total scsmis
    $row_icsmis = mysqli_fetch_assoc($total_icsmis);
    $sum_icsmis = $row_icsmis['Total_icsmis'];
    // Total projector
    $row_sigtas = mysqli_fetch_assoc($total_sigtas);
    $sum_sigtas = $row_sigtas['Total_sigtas'];
    // Total omas
    $row_omas = mysqli_fetch_assoc($total_omas);
    $sum_omas = $row_omas['Total_omas'];
    // Total pads
    $row_pads = mysqli_fetch_assoc($total_pads);
    $sum_pads = $row_pads['Total_pads'];
    // Total isla
    $row_isla = mysqli_fetch_assoc($total_isla);
    $sum_isla = $row_isla['Total_isla'];

    // Total isla

    $row_others = mysqli_fetch_assoc($total_others);
    $sum_others = $row_others['Total_others'];

    $total_apps = $sum_ccms+$sum_ibex+$sum_payroll+$sum_pass+$sum_mis+$sum_icsmis+$sum_sigtas+$sum_omas+$sum_pads+$sum_trls+$sum_isla+$sum_others;
?>