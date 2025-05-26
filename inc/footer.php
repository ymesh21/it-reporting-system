<!-- Footer -->
<footer class="sticky-footer bg-secondary text-light border-top mt-5 py-3">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>Copyright &copy; <?php echo date('Y'); ?> North Shoa ICT</span> <span>Designed and Developed by <a href="#">Yohannes Meshesha</a> </span>
        </div>
    </div>
</footer>
<!-- End of Footer -->
</div>
<!-- End of Content Wrapper -->
</div>
<!-- End of Page Wrapper -->
<!-- Scroll to Top Button-->
<!-- <a class="scroll-to-top rounded d-flex justify-content-end align-items-end" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a> -->

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Logout</h5>
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">Are you sure to end the session?</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-bs-dismiss="modal"><i class="fa fa-times"></i>
                    Close</button>
                <a class="btn btn-danger" href="logout.php"><i class="fa fa-sign-out-alt"></i> Logout</a>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript-->
<script src="assets/jquery/jquery.min.js"></script>
<script type="text/javascript" src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="js/sb-admin-2.min.js"></script>

<!-- Core plugin JavaScript-->
<!-- <script src="vendor/jquery-easing/jquery.easing.min.js"></script> -->

<script src="js/chart.js"></script>

<!-- Data Chart plugins -->
<script src="assets/Chart.js/chart.min.js"></script>

<!-- DataTables plugins -->
<script type="text/javascript" src="assets/datatables/datatables.min.js"></script>



<script>
    $(document).ready(function() {
        $('body').tooltip({
            selector: "[data-tooltip=tooltip]",
            container: "body"
        });
        $('#dataTable').DataTable();
    });
</script>

<?php

if ($_SESSION['role'] == 'Zone') { ?>
    <script src="./js/admin_filter.js"></script>
<?php } elseif ($_SESSION['role'] == 'Woreda') { ?>
    <script src="./js/home_filter.js"></script>
<?php }

?>


<script>
    function showPassword() {
        var x = document.getElementById("password");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }
</script>

<script>
    $(document).ready(function() {
        jQuery('#export-to-excel').bind("click", function() {
            var target = $(this).attr('id');
            switch (target) {
                case 'export-to-excel':
                    $('#hidden-type').val(target);
                    //alert($('#hidden-type').val());
                    $('#export-form').submit();
                    $('#hidden-type').val('');
                    break
            }
        });
    });
</script>


</body>

</html>