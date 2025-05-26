<?php
session_start();
// Check if the user is logged in, if not then redirect him to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: index.php");
    exit;
}

$page = 'home';
// $page = pathinfo(__FILE__, PATHINFO_FILENAME);
include('inc/header.php'); ?>
<div id="content-wrapper" class="d-flex flex-column">
    <div id="content">
        <?php require('inc/menu.php'); ?>
        <!-- Begin Page Content -->
        <div class="container-fluid">
            <div class="row">
                <div class="card col-md-6 offset-md-3">
                    <div class="card-header row justify-content-between">
                        <h2 class="mt-2">Delete Record</h2>
                    </div>
                    <div class="card-body">
                        <h2 class="mt-5 mb-3">Invalid Request</h2>
                        <div class="alert alert-danger">Sorry, you've made an invalid request. Please <a href="index.php" class="alert-link">go back</a> and try again.</div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End of Main Content -->

        <?php
        include('footer.php'); ?>
    </div>