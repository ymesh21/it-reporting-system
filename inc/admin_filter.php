<?php
sleep(1);
require '../config.php';
$sql = "SELECT * FROM trainings INNER JOIN woredas INNER JOIN categories ON woreda = woredas.id AND category = cid";
if (isset($_POST['request'])) {    
    $request = $_POST['request'];
    $sql = "SELECT * FROM trainings INNER JOIN woredas INNER JOIN categories ON woreda = woredas.id AND category = cid WHERE year = $request";
}
$result = mysqli_query($conn, $sql);
$count = mysqli_num_rows($result);
?>
<table class="table table-striped" id="dataTable">
    <?php if ($count) : ?>
        <thead>
            <tr>
                <!-- <th>Woreda</th> -->
                <th>ስም</th>
                <th>ወረዳ</th>
                <th>ፆታ</th>
                <th>የስልጠና ዓይነት</th>
                <th>ዓመት</th>
                <th>ወር</th>
                <th>Action</th>
            </tr>
        </thead>
    <?php else : ?>
        <div class="alert alert-danger">No records found!</div>
    <?php endif; ?>


    <tbody>
        <?php while ($fetch = mysqli_fetch_array($result)) : ?>
            <tr>
                <!--  -->
                <td class="py-1"><?= $fetch['fullname']; ?></td>
                <td class="py-1"><?= $fetch['woredas.name']; ?></td>
                <td class="py-1"><?= $fetch['sex']; ?></td>
                <td class="py-1"><?= $fetch['year']; ?></td>
                <td class="py-1"><?= $fetch['month']; ?></td>
                <td class="py-1"><?= $fetch['cname']; ?></td>
                <td class="btn-group py-1">
                    <a href="#" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#viewModal<?= $fetch['tid']; ?>" data-tooltip="tooltip" title="View Trainee"><i class="fa fa-eye"></i></a>
                    <a href="#" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#editModal<?= $fetch['tid']; ?>" data-tooltip="tooltip" title="Edit Trainee"><i class="fa fa-edit"></i></a>
                    <a href="#" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal<?= $fetch['tid']; ?>" data-tooltip="tooltip" title="Delete Trainee"><i class="fa fa-times"></i></a>
                </td>
            </tr>
            <?php 
                include('../inc/trainings.php'); 
                endwhile; 
            ?>
    </tbody>
</table>