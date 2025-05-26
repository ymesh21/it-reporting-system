<?php
session_start();
// Check if the user is logged in, if not then redirect him to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: index.php");
    exit;
}

if (isset($_POST["id"]) && !empty($_POST["id"])) {
    // Include config file
    require_once "config.php";

    $sql = "DELETE FROM trainings WHERE tid = ?";
    if ($stmt = mysqli_prepare($conn, $sql)) {
        mysqli_stmt_bind_param($stmt, "i", $param_id);
        $param_id = trim($_POST["id"]);
        if (mysqli_stmt_execute($stmt)) {
            header("location: training.php");
            exit();
        } else {
            echo "Oops! Something went wrong. Please try again later.";
        }
    }
    // Close statement
    mysqli_stmt_close($stmt);
    // Close connection
    mysqli_close($conn);
} else {
    // Check existence of id parameter
    if (empty(trim($_GET["id"]))) {
        // URL doesn't contain id parameter. Redirect to error page
        header("location: error.php");
        exit();
    }
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
                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                            <div class="alert alert-danger">
                                <input type="hidden" name="id" value="<?php echo trim($_GET["id"]); ?>" />
                                <p>Are you sure you want to delete this training record?</p>
                                <p>
                                    <input type="submit" value="Yes" class="btn btn-danger">
                                    <a href="training.php" class="btn btn-secondary">No</a>
                                </p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- End of Main Content -->

        <?php
        include('footer.php'); ?>
    </div>