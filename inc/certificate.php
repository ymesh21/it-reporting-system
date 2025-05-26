<?php
session_start();
$id = $_GET['id'];
if (!isset($_GET['id']) || !isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location:../home.php?page=Training");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Certificate</title>
    <link rel="stylesheet" href="../css/sb-admin-2.min.css">
    <link rel="stylesheet" href="../vendor/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="../css/custom.css">
    <style>
        body {
            font-family: 'Luckiest Guy', cursive;
            font-size: 15px;
        }

        path {
            fill: transparent;
            position: relative;
            margin-bottom: -500px !important;
        }

        text {
            fill: #FF9800;
        }
    </style>
</head>

<body>
    <div class="container-fluid certificate">
        <div class="row logo">
            <div class="col-sm-12 col-md-12 d-flex flex-column align-items-center justify-content-center">
                <!-- <svg viewBox="0 0 500 500">
                    <path id="curve" d="M73.2,148.6c4-6.1,65.5-96.8,178.6-95.6c111.3,1.2,170.8,90.3,175.1,97" />
                    <text width="500">
                        <textPath xlink:href="#curve">
                            Dangerous Curves Ahead
                        </textPath>
                    </text>
                </svg> -->
                <h1>የአብክመ ሳይንስና ቴክኖሎጂ ኮሚሽን</h1>
                <h1>Amhara Science & Technology Commission</h1>
                <img src="../img/logo.gif" alt="LOGO">
                <h2 class="text-primary">TRAINEE CERTIFICATE AND TRANSCRIPT</h2>
            </div>
        </div>
        <div class="content">
            <?php
            include('../config.php');
            $sql = "SELECT * FROM `trainings`WHERE id = $id;";
            if ($result = mysqli_query($conn, $sql)) :
                if (mysqli_num_rows($result) > 0) : ?>
                    <div class="row">
                        <div class="col-sm-6 col-md-6 border-right">
                            <?php while ($fetch = mysqli_fetch_array($result)) : ?>
                                    <p class="text-justify">This certificate accredits that <u><?php if ($fetch['sex'] === 'Male') {
                                                                                                echo "Ato";
                                                                                            } else {
                                                                                                echo "Mrs./Miss.";
                                                                                            } ?> <?= $fetch['fullname'] ?></u> has successfully completed the courses below given by Amhara National Regional State Science and Technology Commission.</p>
                                    <ul class="text-justify">
                                        <?php
                                        $query = "SELECT * FROM `courses`";
                                        if ($res = mysqli_query($conn, $query)) :
                                            while ($fetch = mysqli_fetch_array($res)) : ?>
                                                <li><?= $fetch['title']; ?></li>
                                        <?php endwhile;
                                        endif;
                                        ?>
                                    </ul>
                            <?php endwhile; ?>
                        </div>
                        <div class="col-sm-6 col-md-6 border-left">                            
                            <?php
                                $query = "SELECT * FROM `courses`";
                                if ($res = mysqli_query($conn, $query)) : ?>
                                <table class="table table-bordered">
                                    <tr>
                                        <th>Course</th>
                                        <th>Mark (100%)</th>
                                        <th>Grade</th>
                                    </tr>
                                <?php while ($fetch = mysqli_fetch_array($res)) : ?>
                                    <tr>
                                        <td class="py-1"><?= $fetch['title']; ?></td>
                                        <td class="py-1"></td>
                                        <td class="py-1"></td>
                                    </tr>
                                <?php endwhile; ?>
                                </table>
                               <?php endif;?>
                        </div>
                    </div>
            <?php
                    mysqli_free_result($result);
                endif;
            else :
                echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
                header("location:../home.php?page=Training");
            endif;
            ?>
        </div>
        <div class="print">
            <a href="javascript:window.print();" class="btn btn-primary">Print</a>
        </div>
    </div>
</body>

</html>