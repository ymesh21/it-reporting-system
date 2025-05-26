<?php $page = pathinfo(__FILE__, PATHINFO_FILENAME);?>
<?php include('inc/header.php'); ?>
<?php include('inc/sidebar.php') ?>
<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">
    <!-- Main Content -->
    <div id="content">
        <?php include('inc/admin-menu.php');?>
        <!-- Begin Page Content -->
        <div class="container-fluid">
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Documents</h1>
            </div>
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- End of Main Content -->
    <?php include('footer.php');?>