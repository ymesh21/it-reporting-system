<?php
    $total_ams = $conn->query("SELECT SUM(ams) AS Total_ams FROM `open_sources`") or die(mysqli_error());
    $total_ipm = $conn->query("SELECT SUM(ipm) AS Total_ipm FROM `open_sources`") or die(mysqli_error());
    $total_teamv = $conn->query("SELECT SUM(teamv) AS Total_teamv FROM `open_sources`") or die(mysqli_error());
    $total_jaws = $conn->query("SELECT SUM(jaws) AS Total_jaws FROM `open_sources`") or die(mysqli_error());
    $total_faxaw = $conn->query("SELECT SUM(faxaw) AS Total_faxaw FROM `open_sources`") or die(mysqli_error());
    $total_simu = $conn->query("SELECT SUM(simu) AS Total_simu FROM `open_sources`") or die(mysqli_error());
    $total_dms = $conn->query("SELECT SUM(dms) AS Total_dms FROM `open_sources`") or die(mysqli_error());
    $total_bsca = $conn->query("SELECT SUM(bsca) AS Total_bsca FROM `open_sources`") or die(mysqli_error());
    $total_arkdb = $conn->query("SELECT SUM(arkdb) AS Total_arkdb FROM `open_sources`") or die(mysqli_error());
    $total_ebcd = $conn->query("SELECT SUM(ebcd) AS Total_ebcd FROM `open_sources`") or die(mysqli_error());
    $total_others = $conn->query("SELECT SUM(others) AS Total_others FROM `open_sources`") or die(mysqli_error());    
    // Total attendance management system
    $row_ams = mysqli_fetch_assoc($total_ams);
    $sum_ams = $row_ams['Total_ams'];
    // Total ip mesenger
    $row_ipm = mysqli_fetch_assoc($total_ipm);
    $sum_ipm = $row_ipm['Total_ipm'];
    // Total teamv
    $row_teamv = mysqli_fetch_assoc($total_teamv);
    $sum_teamv = $row_teamv['Total_teamv'];
    // Total jaws
    $row_jaws = mysqli_fetch_assoc($total_jaws);
    $sum_jaws = $row_jaws['Total_jaws'];
    // Total faxaw
    $row_faxaw = mysqli_fetch_assoc($total_faxaw);
    $sum_faxaw = $row_faxaw['Total_faxaw'];
    // Total simu
    $row_simu = mysqli_fetch_assoc($total_simu);
    $sum_simu = $row_simu['Total_simu'];
    // Total dms
    $row_dms = mysqli_fetch_assoc($total_dms);
    $sum_dms = $row_dms['Total_dms'];
    // Total bsca
    $row_bsca = mysqli_fetch_assoc($total_bsca);
    $sum_bsca = $row_bsca['Total_bsca'];
    // Total arkdb
    $row_arkdb = mysqli_fetch_assoc($total_arkdb);
    $sum_arkdb = $row_arkdb['Total_arkdb'];
    // Total ebcd
    $row_ebcd = mysqli_fetch_assoc($total_ebcd);
    $sum_ebcd = $row_ebcd['Total_ebcd'];
    // Total others
    $row_others = mysqli_fetch_assoc($total_others);
    $sum_others = $row_others['Total_others'];

    $total_opensources = $sum_ams+$sum_ipm+$sum_teamv+$sum_jaws+$sum_faxaw+$sum_simu+$sum_dms+$sum_bsca+$sum_arkdb+$sum_ebcd+$sum_others;

?>