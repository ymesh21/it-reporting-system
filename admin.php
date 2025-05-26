<?php
include_once("export_excel.php");
if ($_SESSION["role"] == "Woreda") {
    header("location: index.php");
    exit;
}
// Check if the user is logged in, if not then redirect him to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: login.php");
    exit;
}

// Contact
$firstname = $lastname = $sex = $woreda = $position = $phone = $email = $passowrd = '';
if (isset($_POST['add_contact'])) {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $sex = $_POST['sex'];
    $woreda = $_POST['woreda'];
    $position = $_POST['position'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $password_hash = password_hash($_POST['password'], PASSWORD_DEFAULT);
    if ($_POST['woreda'] == '1') {
        $role = 'Zone';
    } else {
        $role = 'Woreda';
    }

    mysqli_query($conn, "INSERT INTO `contacts`(firstname, lastname, sex,woreda,position,phone,email,password,role) 
        VALUES('$firstname', '$lastname', '$sex', '$woreda', '$position', '$phone', '$email', '$password_hash', '$role')") or die(mysqli_error($conn));
    header("location: admin.php?page=Contacts");
}

if (isset($_POST['update_contact'])) {
    $id = $_POST['id'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $sex = $_POST['sex'];
    $woreda = $_POST['woreda'];
    $position = $_POST['position'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $password_hash = password_hash($_POST['password'], PASSWORD_DEFAULT);
    if ($_POST['woreda'] == '1') {
        $role = 'Zone';
    } else {
        $role = 'Woreda';
    }


    mysqli_query($conn, "UPDATE `contacts` SET `firstname` = '$firstname', lastname = '$lastname', sex = '$sex', woreda = '$woreda',
        position = '$position', phone = '$phone', email = '$email', password = '$password_hash', role = '$role' WHERE `contacts`.`id` = '$id'") or die(mysqli_error($conn));
    header("location: admin.php?page=Contacts");
}
if (isset($_POST['delete_contact'])) {
    $id = $_POST['id'];

    mysqli_query($conn, "DELETE FROM `contacts` WHERE id = $id") or die(mysqli_error($conn));
    header("location: admin.php?page=Contacts");
}
// Add user
$contact = $username = $password = $confirmPassword = $role = '';
$contact_err = $username_err = $password_err = $confirm_password_err = $role_err = $err = '';
if (isset($_POST['add_user'])) {
    $contact = trim($_POST['contact']);
    $username = trim($_POST['username']);
    $passowrd = trim($_POST['password']);
    $hashed_pass = password_hash($passowrd, PASSWORD_DEFAULT);
    $role = trim($_POST['role']);

    if (mysqli_query($conn, "INSERT INTO `users`(contact_id, username, password,role) 
    VALUES('$contact', '$username', '$hashed_pass', '$role')") or die(mysqli_error($conn))) {
        header("location: admin.php?page=Users");
    } else {
        $err = 'Something Wrong';
    }
}

if (isset($_POST['add_trainee'])) {
    $woreda = $_POST['woreda'];
    $fullname = $_POST['fullname'];
    $sex = $_POST['sex'];
    $category = $_POST['category'];
    $type = $_POST['type'];
    $office = $_POST['office'];
    $year = $_POST['year'];
    $month = $_POST['month'];

    mysqli_query($conn, "INSERT INTO `trainings`(woreda,fullname,sex,category,type,office,year,month) 
            VALUES('$woreda', '$fullname', '$sex', '$category', '$type', '$office', $year,'$month')") or die(mysqli_error($conn));
    header("location: admin.php?page=Trainings");
}
if (isset($_POST['Update_trainee'])) {
    $id = $_POST['id'];
    $woreda = $_POST['woreda'];
    $fullname = $_POST['fullname'];
    $sex = $_POST['sex'];
    $category = $_POST['category'];
    $type = $_POST['type'];
    $office = $_POST['office'];
    $year = $_POST['year'];
    $month = $_POST['month'];

    mysqli_query($conn, "UPDATE `trainings` SET woreda ='$woreda',
        fullname='$fullname',
        sex='$sex',
        category='$category',
        type='$type',
        office='$office',
        year=$year,
        month='$month' 
        WHERE tid = '$id'") or die(mysqli_error($conn));
    header("location: admin.php?page=Trainings");
}
if (isset($_POST['delete_trainee'])) {
    $id = $_POST['id'];

    mysqli_query($conn, "DELETE FROM `trainings` WHERE tid = $id") or die(mysqli_error($conn));
    header("location: admin.php?page=Trainings");
}
if (isset($_POST['add_maintenance'])) {
    $woreda = $_POST['woreda'];
    $desktop = $_POST['desktop'];
    $printer = $_POST['printer'];
    $laptop = $_POST['laptop'];
    $photocopier = $_POST['photocopier'];
    $fax = $_POST['fax'];
    $scanner = $_POST['scanner'];
    $switch = $_POST['switch'];
    $projector = $_POST['projector'];
    $server = $_POST['server'];
    $year = $_POST['year'];
    $month = $_POST['month'];

    $price = 400 * (intval($desktop) + intval($laptop) + intval($fax) + intval($scanner) + intval($projector) + intval($server)) + 600 * (intval($printer) + intval($photocopier)) + 100 * intval($switch);

    mysqli_query($conn, "INSERT INTO `maintenances` (
            `woreda`, `desktop`, `printer`, `laptop`, `photocopier`, `fax`,`scanner`, 
            `switch`, `projector`, `server`, `price`, `year`, `month`) 
        VALUES(
            '$woreda', '$desktop', '$printer', '$laptop', '$photocopier', '$fax', '$scanner', 
            '$switch', '$projector', '$server', '$price', '$year', '$month')") or die(mysqli_error($conn));

    header("location: admin.php?page=Maintenances");
}
if (isset($_POST['update_maintenance'])) {
    $id = $_POST['id'];
    $woreda = $_POST['woreda'];
    $desktop = $_POST['desktop'];
    $printer = $_POST['printer'];
    $laptop = $_POST['laptop'];
    $photocopier = $_POST['photocopier'];
    $fax = $_POST['fax'];
    $scanner = $_POST['scanner'];
    $switch = $_POST['switch'];
    $projector = $_POST['projector'];
    $server = $_POST['server'];
    $year = $_POST['year'];
    $month = $_POST['month'];

    $price = 400 * (intval($desktop) + intval($laptop) + intval($fax) + intval($scanner) + intval($projector) + intval($server)) + 600 * (intval($printer) + intval($photocopier)) + 100 * intval($switch);

    mysqli_query($conn, "UPDATE `maintenances` SET `woreda` = '$woreda', 
        `desktop` = '$desktop', 
        `printer` = '$printer',
        `laptop` = '$laptop', 
        `photocopier` = '$photocopier',
        `fax` = '$fax', 
        `scanner` = '$scanner',
        `switch` = '$switch', 
        `projector` = '$projector',
        `server` = '$server',
        `price` = '$price', 
        `year` = '$year', 
        `month` = '$month' WHERE `id` = '$id'") or die(mysqli_error($conn));

    header("location: admin.php?page=Maintenances");
}
if (isset($_POST['delete_maintenance'])) {
    $id = $_POST['id'];

    mysqli_query($conn, "DELETE FROM `maintenances` WHERE `id` = '$id'") or die(mysqli_error($conn));

    header("location: admin.php?page=Maintenances");
}
// Apps
if (isset($_POST['add_app'])) {
    $woreda = $_POST['woreda'];
    $ccms = $_POST['ccms'];
    $ibex = $_POST['ibex'];
    $payroll = $_POST['payroll'];
    $pass = $_POST['pass'];
    $trls = $_POST['trls'];
    $mis = $_POST['mis'];
    $icsmis = $_POST['icsmis'];
    $sigtas = $_POST['sigtas'];
    $omas = $_POST['omas'];
    $pads = $_POST['pads'];
    $isla = $_POST['isla'];
    $year = $_POST['year'];
    $month = $_POST['month'];

    mysqli_query($conn, "INSERT INTO `apps`(`woreda`,`ccms`,`ibex`,`payroll`,
        `pass`,`trls`,`mis`,`icsmis`,`sigtas`,`omas`,`pads`,`isla`,year,month) 
        VALUES('$woreda', '$ccms', '$ibex','$payroll', '$pass', '$trls','$mis', '$icsmis',
         '$sigtas','$omas','$pads','$isla', $year,'$month')") or die(mysqli_error($conn));
    echo $month;
    header("location: admin.php?page=Applications");
}
if (isset($_POST['update_app'])) {
    $id = $_POST['id'];
    $woreda = $_POST['woreda'];
    $ccms = $_POST['ccms'];
    $ibex = $_POST['ibex'];
    $payroll = $_POST['payroll'];
    $pass = $_POST['pass'];
    $trls = $_POST['trls'];

    $mis = $_POST['mis'];
    $icsmis = $_POST['icsmis'];
    $sigtas = $_POST['sigtas'];
    $omas = $_POST['omas'];
    $pads = $_POST['pads'];
    $isla = $_POST['isla'];
    $others = $_POST['others'];
    $year = $_POST['year'];
    $month = $_POST['month'];

    mysqli_query($conn, "UPDATE `apps` SET 
        `woreda` = '$woreda', `ccms` = '$ccms', `ibex` = '$ibex', `payroll` = '$payroll', `pass` = '$pass', `trls` = '$trls', `mis` = '$mis', 
        `icsmis` = '$icsmis', `sigtas` = '$sigtas', `omas` = '$omas',`pads` = '$pads',`isla` = '$isla', `others` = '$others', `year` = '$year', 
        `month` = '$month' 
        WHERE `id` = '$id'") or die(mysqli_error($conn));

    header("location: admin.php?page=Applications");
}
if (isset($_POST['delete_app'])) {
    $id = $_POST['id'];

    mysqli_query($conn, "DELETE FROM `apps` WHERE `id` = '$id'") or die(mysqli_error($conn));

    header("location: admin.php?page=Applications");
}
if (isset($_POST['add_opensource'])) {
    $woreda = $_POST['woreda'];
    $ams = $_POST['ams'];
    $ipm = $_POST['ipm'];
    $teamv = $_POST['teamv'];
    $jaws = $_POST['jaws'];
    $faxaw = $_POST['faxaw'];

    $simu = $_POST['simu'];
    $dms = $_POST['dms'];
    $bsca = $_POST['bsca'];
    $arkdb = $_POST['arkdb'];
    $ebcd = $_POST['ebcd'];
    $others = $_POST['others'];
    $year = $_POST['year'];
    $month = $_POST['month'];

    mysqli_query($conn, "INSERT INTO `open_sources`(`woreda`,`ams`,`ipm`,`teamv`,
        `jaws`,`faxaw`,`simu`,`dms`,`bsca`,`arkdb`,`ebcd`,`others`,year,month) 
        VALUES('$woreda', '$ams', '$ipm','$teamv', '$jaws', '$faxaw','$simu', '$dms',
        '$bsca','$arkdb','$ebcd','$others', $year,'$month')") or die(mysqli_error($conn));
    echo $month;
    header("location: admin.php?page=OpenSources");
}
if (isset($_POST['update_open'])) {
    $id = $_POST['id'];
    $woreda = $_POST['woreda'];
    $ams = $_POST['ams'];
    $ipm = $_POST['ipm'];
    $teamv = $_POST['teamv'];
    $jaws = $_POST['jaws'];
    $faxaw = $_POST['faxaw'];

    $simu = $_POST['simu'];
    $dms = $_POST['dms'];
    $bsca = $_POST['bsca'];
    $arkdb = $_POST['arkdb'];
    $ebcd = $_POST['ebcd'];
    $others = $_POST['others'];
    $year = $_POST['year'];
    $month = $_POST['month'];

    mysqli_query($conn, "UPDATE `open_sources` SET 
        `woreda` = '$woreda', `ams` = '$ams', `ipm` = '$ipm',`teamv` = '$teamv',`jaws` = '$jaws',`faxaw` = '$faxaw', `simu` = '$simu', 
        `dms` = '$dms', `bsca` = '$bsca',`arkdb` = '$arkdb', `ebcd` = '$ebcd',`others` = '$others', `year` = '$year', `month` = '$month' 
        WHERE `id` = '$id'") or die(mysqli_error($conn));

    header("location: admin.php?page=OpenSources");
}
if (isset($_POST['delete_open'])) {
    $id = $_POST['id'];

    mysqli_query($conn, "DELETE FROM `open_sources` WHERE `id` = '$id'") or die(mysqli_error($conn));

    header("location: admin.php?page=OpenSources");
}
// Websites
if (isset($_POST['add_website'])) {
    $woreda = $_POST['woreda'];
    $status = $_POST['status'];
    $url = $_POST['url'];
    $count = $_POST['count'];
    $year = $_POST['year'];
    $month = $_POST['month'];

    mysqli_query($conn, "INSERT INTO `websites`(`woreda`, `status`, `url`, `count`,`year`,`month`) 
        VALUES('$woreda', '$status', '$url', '$count', $year,'$month')") or die(mysqli_error($conn));
    header("location: admin.php?page=Websites");
}
if (isset($_POST['update_website'])) {
    $id = $_POST['id'];
    $woreda = $_POST['woreda'];
    $status = $_POST['status'];
    $url = $_POST['url'];
    $count = $_POST['count'];
    // $year = $_POST['year'];
    // $month = $_POST['month'];

    mysqli_query($conn, "UPDATE `websites` SET `woreda` = '$woreda',  
        `status` = '$status', 
        `url` = '$url',
        `count` = '$count'
        WHERE `id` = '$id'") or die(mysqli_error($conn));

    header("location: admin.php?page=Websites");
}
if (isset($_POST['delete_website'])) {
    $id = $_POST['id'];

    mysqli_query($conn, "DELETE FROM `websites` WHERE `id` = '$id'") or die(mysqli_error($conn));

    header("location: admin.php?page=Websites");
}

// woredas
if (isset($_POST['add_woreda'])) {
    $name = $_POST['name'];
    $address = $_POST['address'];

    mysqli_query($conn, "INSERT INTO `woredas`(`woredas.name`, `address`) 
        VALUES('$name', '$address')") or die(mysqli_error($conn));
    header("location: admin.php?page=Woredas");
}
if (isset($_POST['update_woreda'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $address = $_POST['address'];

    mysqli_query($conn, "UPDATE `woredas` SET `woredas.name` = '$name', `address` = '$address' WHERE `wid` = '$id'") or die(mysqli_error($conn));

    header("location: admin.php?page=Woredas");
}
if (isset($_POST['delete_woreda'])) {
    $id = $_POST['id'];

    mysqli_query($conn, "DELETE FROM `woredas` WHERE `wid` = '$id'") or die(mysqli_error($conn));

    header("location: admin.php?page=Woredas");
}

$page = pathinfo(__FILE__, PATHINFO_FILENAME);
include('inc/header.php');
include('inc/sidebar.php')
?>
<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">
    <!-- Main Content -->
    <div id="content">
        <?php
        include('inc/admin-menu.php');
        include('inc/apps_calc.php');
        include('inc/maintenances_calc.php');
        include('inc/opensources_calc.php');
        $sum_apps_total = $sum_ccms + $sum_ibex + $sum_payroll + $sum_pass + $sum_trls + $sum_mis + $sum_icsmis + $sum_sigtas + $sum_omas + $sum_pads + $sum_isla + $sum_others;
        ?>
        <!-- Begin Page Content -->
        <div class="container-fluid">
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <?php if (!isset($_GET['page'])) : ?>
                    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
                <?php elseif (isset($_GET['page']) && $_GET['page'] === 'Contacts') : ?>
                    <h1 class="h3 mb-0 text-gray-800">Employees</h1>
                <?php elseif (isset($_GET['page']) && $_GET['page'] === 'Users') : ?>
                    <h1 class="h3 mb-0 text-gray-800">Users</h1>
                <?php elseif (isset($_GET['page']) && $_GET['page'] === 'Trainings') : ?>
                    <h1 class="h3 mb-0 text-gray-800">Trainings</h1>
                <?php elseif (isset($_GET['page']) && $_GET['page'] === 'Maintenances') : ?>
                    <h1 class="h3 mb-0 text-gray-800">Maintenances</h1>
                <?php elseif (isset($_GET['page']) && $_GET['page'] === 'Applications') : ?>
                    <h1 class="h3 mb-0 text-gray-800">Applications</h1>
                <?php elseif (isset($_GET['page']) && $_GET['page'] === 'OpenSources') : ?>
                    <h1 class="h3 mb-0 text-gray-800">Open Sources</h1>
                <?php elseif (isset($_GET['page']) && $_GET['page'] === 'Websites') : ?>
                    <h1 class="h3 mb-0 text-gray-800">Websites</h1>
                <?php elseif (isset($_GET['page']) && $_GET['page'] === 'Woredas') : ?>
                    <h1 class="h3 mb-0 text-gray-800">Woredas</h1>
                <?php elseif (isset($_GET['search'])) : ?>
                    <h1 class="h3 mb-0 text-gray-800">Search Results ...</h1>
                <?php endif; ?>
            </div>

            <?php if (!isset($_GET['page'])) : ?>
                <div class="row">

                    <div class="col-lg-6 col-md-6 col-sm-12 mb-4">
                        <div class="card border-left-success shadow h-100 py-2">
                            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                <h6 class="m-0 font-weight-bold text-primary">የኮምፒዩተር ስልጠና</h6>
                                <div class="dropdown no-arrow">
                                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                                        <div class="dropdown-header">Action:</div>
                                        <a class="dropdown-item" href="#">Add New</a>
                                        <a class="dropdown-item" href="?page=Trainings">View all</a>
                                    </div>
                                </div>
                            </div>
                            <!-- Card Body -->
                            <div class="card-body">
                                <div class="row no-gutters align-items-center mb-2">
                                    <div class="col mr-2">
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                                            <?php
                                            $sql = 'SELECT COUNT(id) as total FROM trainings';
                                            $result = mysqli_query($conn, $sql);
                                            foreach ($result as $row) : ?>
                                                <span class="badge rounded-pill bg-success p-3 text-light"><?= $row['total']; ?></span>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-graduation-cap fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                                <div class="card" id="chart-container">
                                    <canvas id="trCanvas"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-6 col-sm-12 mb-4">
                        <div class="card border-left-primary shadow h-100 py-2">
                            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                <h6 class="m-0 font-weight-bold text-primary">ድረ ገፆች</h6>
                                <div class="dropdown no-arrow">
                                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                                        <div class="dropdown-header">Action:</div>
                                        <a class="dropdown-item" href="#">Add New</a>
                                        <a class="dropdown-item" href="?page=Trainings">View all</a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row no-gutters align-items-center mb-2">
                                    <div class="col mr-2">
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                                            <?php
                                            $sql = "SELECT count(id) as webs FROM `websites`";
                                            $result = mysqli_query($conn, $sql);
                                            foreach ($result as $row) : ?>
                                                <span class="badge rounded-pill bg-primary p-3 text-light"><?= $row['webs']; ?>
                                                </span>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-globe fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                                <div class="card" id="chart-container">
                                    <canvas id="webCanvas"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-12 col-sm-12 mb-4">
                        <div class="card border-left-danger shadow h-100 py-2">
                            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                <h6 class="m-0 font-weight-bold text-primary">ኤሌክትሮኒክስ ዕቃዎች ጥገና</h6>
                                <div class="dropdown no-arrow">
                                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                                        <div class="dropdown-header">Action:</div>
                                        <a class="dropdown-item" href="#">Add New</a>
                                        <a class="dropdown-item" href="?page=Trainings">View all</a>
                                    </div>
                                </div>
                            </div>
                            <!-- Card Body -->
                            <div class="card-body">
                                <div class="row no-gutters align-items-center mb-2">
                                    <div class="col mr-2">
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                                            <?php
                                            $sql = 'SELECT COUNT(id) as total FROM trainings';
                                            $result = mysqli_query($conn, $sql);
                                            foreach ($result as $row) : ?>
                                                <span class="badge rounded-pill bg-primary p-3 text-light"><?php echo $sum_devices_total; ?></span>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-graduation-cap fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                                <div class="card" id="chart-container">
                                    <canvas id="dmtCanvas"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-12 col-sm-12 mb-4">
                        <div class="card border-left-info shadow py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center mb-2">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">አፕሊኬሽኖች</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                                            <span class="badge rounded-pill bg-info p-3 text-light"><?= $total_apps; ?></span>
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-code fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                                <div class="card h-50" id="chart-container">
                                    <canvas id="appCanvas"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-6 col-sm-12 mb-4">
                        <div class="card border-left-success shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">ሁለገብ ማህበረሰብ
                                            ማዕከላት</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                                            <?php
                                            $sql = "SELECT count(id) as cc FROM `ccenters`";
                                            $result = mysqli_query($conn, $sql);
                                            foreach ($result as $row) {
                                                echo $row['cc'];
                                            }
                                            ?>
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                                <div class="card" id="chart-container">
                                    <canvas id="ccCanvas"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-6 col-sm-12 mb-4">
                        <div class="card border-left-success shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                            Open Sources</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                                            <?php echo $total_opensources; ?>
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-code fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                                <div class="card" id="chart-container">
                                    <canvas id="dosCanvas"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>ዎ
                </div>


            <?php elseif (isset($_GET['page']) && $_GET['page'] === 'Contacts') : ?>
                <div class="row">
                    <div class="col-md-12">
                        <div class="cardshadow mb-4">
                            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                <h6 class="m-0 font-weight-bold text-primary">List of Employees</h6>

                                <div class="btn-group">
                                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addContactModal" title="Add New Employee"><i class="fa fa-plus"></i></button>
                                    <button class="btn btn-primary" title="Print Page"><i class="fa fa-print"></i></button>
                                    <button class="btn btn-primary" title="Export List"><i class="fa fa-export"></i></button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <?php
                                    $sql = "SELECT *, woredas.name AS w_name, woredas.id AS w_id FROM `contacts` INNER JOIN woredas on woreda = woredas.id";
                                    if ($result = mysqli_query($conn, $sql)) :
                                        if (mysqli_num_rows($result) > 0) : ?>
                                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                                <thead>
                                                    <tr>
                                                        <th>Name</th>
                                                        <th>Last Name</th>
                                                        <th>Gender</th>
                                                        <th>Woreda</th>
                                                        <th>Email</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tfoot>
                                                    <tr>
                                                        <th>Name</th>
                                                        <th>Last Name</th>
                                                        <th>Gender</th>
                                                        <th>Woreda</th>
                                                        <th>Email</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </tfoot>
                                                <tbody>
                                                    <?php while ($fetch = mysqli_fetch_array($result)) : ?>
                                                        <tr>
                                                            <td><?php echo $fetch['firstname']; ?></td>
                                                            <td><?php echo $fetch['lastname']; ?></td>
                                                            <td><?php echo $fetch['sex']; ?></td>
                                                            <td><?php echo $fetch['w_name']; ?></td>
                                                            <td><?php echo $fetch['email']; ?></td>
                                                            <td class="d-flex">
                                                                <a class="btn btn-primary btn-sm mr-1" href="#" data-tooltip="tooltip" title="View Contact" data-bs-toggle="modal" data-bs-target="#viewModal<?php echo $fetch['id']; ?>"><i class="fas fa-eye"></i></a>
                                                                <a class="btn btn-success btn-sm mr-1" href="#" data-tooltip="tooltip" title="Edit Contact" data-bs-toggle="modal" data-bs-target="#editModal<?php echo $fetch['id']; ?>"><i class="fas fa-edit"></i></a>
                                                                <a class="btn btn-danger btn-sm" href="#" data-tooltip="tooltip" title="Delete Contact" data-bs-toggle="modal" data-bs-target="#deleteModal<?php echo $fetch['id']; ?>"><i class="fas fa-times"></i></a>
                                                            </td>
                                                        </tr>
                                                        <?php include('inc/contacts.php'); ?>
                                                    <?php endwhile; ?>
                                                </tbody>
                                            </table>
                                    <?php
                                            mysqli_free_result($result);
                                        else :
                                            echo "No records matching your query were found.";
                                        endif;
                                    else :
                                        echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
                                    endif;
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            <?php elseif (isset($_GET['page']) && $_GET['page'] === 'Messages') : ?>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card shadow mb-4">
                            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                <h6 class="m-0 font-weight-bold text-primary">Messages</h6>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <?php
                                    $sql = "SELECT * FROM `messages`";
                                    if ($result = mysqli_query($conn, $sql)) :
                                        if (mysqli_num_rows($result) > 0) : ?>
                                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                                <thead>
                                                    <tr>
                                                        <th>Name</th>
                                                        <th>Email</th>
                                                        <th>Subject</th>
                                                        <th>Message</th>
                                                    </tr>
                                                </thead>
                                                <tfoot>
                                                    <tr>
                                                        <th>Name</th>
                                                        <th>Email</th>
                                                        <th>Subject</th>
                                                        <th>Message</th>
                                                    </tr>
                                                </tfoot>
                                                <tbody>
                                                    <?php while ($fetch = mysqli_fetch_array($result)) : ?>
                                                        <tr>
                                                            <td><?php echo $fetch['name']; ?></td>
                                                            <td><?php echo $fetch['email']; ?></td>
                                                            <td><?php echo $fetch['subject']; ?></td>
                                                            <td><?php echo $fetch['message']; ?></td>
                                                        </tr>
                                                    <?php endwhile; ?>
                                                </tbody>
                                            </table>
                                    <?php
                                            mysqli_free_result($result);
                                        else :
                                            echo "No messages found.";
                                        endif;
                                    else :
                                        echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
                                    endif;
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            <?php elseif (isset($_GET['page']) && $_GET['page'] === 'Users') : ?>
                <div class="row">
                    <div class="col-md-8">
                        <div class="card shadow">
                            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                <h6 class="m-0 font-weight-bold text-primary">LIST OF USERS</h6>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <?php
                                    $sql = "SELECT * FROM `users` INNER JOIN contacts INNER JOIN woredas on contact_id = contacts.id AND woreda = woredas.id";
                                    if ($result = mysqli_query($conn, $sql)) :
                                        if (mysqli_num_rows($result) > 0) : ?>
                                            <table class="table table-striped" id="dataTable">
                                                <thead>
                                                    <tr>
                                                        <th>Contact</th>
                                                        <th>Username</th>
                                                        <th>Woreda</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tfoot>
                                                    <tr>
                                                        <th>Contact</th>
                                                        <th>Username</th>
                                                        <th>Woreda</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </tfoot>

                                                <tbody>
                                                    <?php while ($fetch = mysqli_fetch_array($result)) : ?>
                                                        <tr>
                                                            <td class="py-1"><?php echo $fetch['firstname']; ?></td>
                                                            <td class="py-1"><?php echo $fetch['username']; ?></td>
                                                            <td class="py-1"><?php echo $fetch['woredas.name']; ?></td>
                                                            <td class="d-flex py-1">
                                                                <a class="btn btn-primary btn-sm mr-1" href="#" data-bs-toggle="modal" data-bs-target="#viewModal<?php echo $fetch['id']; ?>"><i class="fas fa-eye"></i></a>
                                                                <a class="btn btn-success btn-sm mr-1" href="#" data-bs-toggle="modal" data-bs-target="#editModal<?php echo $fetch['id']; ?>"><i class="fas fa-edit"></i></a>
                                                                <a class="btn btn-danger btn-sm" href="#" data-bs-toggle="modal" data-bs-target="#deleteModal<?php echo $fetch['id']; ?>"><i class="fas fa-edit"></i></a>
                                                            </td>
                                                        </tr>
                                                        <?php include('inc/users.php'); ?>
                                                    <?php endwhile; ?>
                                                </tbody>
                                            </table>
                                    <?php
                                            mysqli_free_result($result);
                                        else :
                                            echo "No records matching your query were found.";
                                        endif;
                                    else :
                                        echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
                                    endif;
                                    ?>
                                </div>
                            </div>
                        </div>co
                    </div>
                    <div class="col-md-4">
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">ADD NEW USER</h6>
                            </div>
                            <!-- Add user form -->
                            <form accept-charset="UTF-8" action="admin.php?page=Users" method="post">
                                <div class="card-body">
                                    <h5 class="text-danger"><?= $err . mysqli_error($conn); ?></h5>
                                    <div class="form-group">
                                        <label>Contact</label>
                                        <select name="contact" class="form-control form-control-user <?php echo (!empty($contact_err)) ? 'is-invalid' : ''; ?>" required>
                                            <option>-Select Contact-</option>
                                            <?php
                                            $co = $conn->query("SELECT * FROM `contacts` order by firstname") or die(mysqli_error($conn));
                                            while ($row = $co->fetch_assoc()) {
                                                $output = '<option value="' . $row['id'] . '">' . $row['firstname'] . ' ' . $row['lastname'] . '</option>';
                                                echo $output;
                                            }
                                            ?>
                                        </select>
                                        <span class="invalid-feedback"><?php echo $contact_err; ?></span>
                                    </div>
                                    <div class="form-group">
                                        <label>Username</label>
                                        <input type="text" name="username" class="form-control" value="<?= $username; ?>">
                                        <span class="invalid-feedback"><?php echo $username_err; ?></span>
                                    </div>
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="password" name="password" id="password" class="form-control" value="<?= $password ?>">
                                        <span class="invalid-feedback"><?php echo $password_err; ?></span>
                                        <div class="form-check mt-1">
                                            <input class="form-check-input d-block" type="checkbox" onclick="showPassword()">
                                            <label class="form-check-label d-block">Show Password</label>
                                        </div>
                                    </div>
                                    <!-- <div class="form-group">
                                        <label>Confirm Password</label>
                                        <input type="password" name="confirmPassword" class="form-control" value="">
                                        <span class="invalid-feedback"><?php echo $confirm_password_err; ?></span>
                                    </div> -->
                                    <div class="form-group">
                                        <label for="role">Role</label>
                                        <select name="role" class="form-control">
                                            <option>Please select role</option>
                                            <option value="Zone">Admin</option>
                                            <option value="Woreda">User</option>
                                        </select>
                                        <span class="invalid-feedback"><?php echo $role_err; ?></span>
                                    </div>
                                    <div class="form-group">
                                        <button class="btn btn-success" type="submit" name="add_user"><i class="fa fa-user-plus"></i> ADD
                                            USER</button>
                                        <button type="reset" class="btn btn-secondary ml-2">RESET</button>
                                    </div>
                            </form>
                        </div>
                    </div>
                </div>

            <?php elseif (isset($_GET['page']) && $_GET['page'] === 'WoredaNet') :  ?>
                <h1 class="h3 mb-2 text-gray-800">የወረዳኔት መረጃ</h1>
                <div class="row">
                    <div class="col-lg-8">
                        <div class="card shadow mb-2">
                            <div class="card-header py-2">
                                <h5 class="text-primary">የወረዳኔት ዝርዝር መረጃ</h5>
                            </div>
                            <div class="card-body">
                                <?php
                                $sql = "SELECT *, woredanet.id AS wnid, woredas.name AS w_name FROM `woredanet` INNER JOIN woredas INNER JOIN contacts ON woredanet.woreda = woredas.id AND contacts.id = rep";
                                if ($wns = mysqli_query($conn, $sql)) :
                                    if (mysqli_num_rows($wns) > 0) : ?>
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-striped" id="dataTable">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>ወረዳ</th>
                                                        <th>WAN IP</th>
                                                        <th>LAN IP</th>
                                                        <th>አገልግሎት ቁጥር</th>
                                                        <th>ያለበት ሁኔታ</th>
                                                        <th>ተወካይ</th>
                                                        <th></th>
                                                    </tr>
                                                </thead>
                                                <tfoot>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>ወረዳ</th>
                                                        <th>WAN IP</th>
                                                        <th>LAN IP</th>
                                                        <th>አገልግሎት ቁጥር</th>
                                                        <th>ያለበት ሁኔታ</th>
                                                        <th>ተወካይ</th>
                                                        <th></th>
                                                    </tr>
                                                </tfoot>
                                                <tbody>
                                                    <?php foreach ($wns as $wn) : ?>
                                                        <tr>
                                                            <td><?= $wn['wnid']; ?></td>
                                                            <td><?= $wn['w_name']; ?></td>
                                                            <td><?= $wn['lanip']; ?></td>
                                                            <td><?= $wn['wanip']; ?></td>
                                                            <td><?= $wn['srvno']; ?></td>
                                                            <td><?= $wn['status']; ?></td>
                                                            <td><a href="tel:<?= $wn['phone']; ?>" title="<?= $wn['phone']; ?>"><?= $wn['firstname']; ?></a></td>
                                                            <td></td>
                                                        </tr>
                                                    <?php endforeach; ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    <?php else : ?>
                                        <div class="alert alert-danger">
                                            <strong>Empty!</strong> No records found in the table.
                                        </div>
                                    <?php endif; ?>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card shadow mb-2">
                            <div class="card-header py-2">
                                <h5 class="text-primary">የወረዳኔት መረጃ መመዝገቢያ ቅፅ</h5>
                            </div>
                            <div class="card-body">
                                <form accept-charset="UTF-8" action="" method="post">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                LAN <i class="fas fa-i"></i><i class="fas fa-p"></i>
                                            </span>
                                        </div>
                                        <input type="text" name="lanip" class="form-control" placeholder="LAN IP {000.000.000.000}" pattern="[0-9]{1,3}.[0-9]{1,3}.[0-9]{1,3}.[0-9]{1,3}" required>
                                    </div>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                WAN <i class="fas fa-i"></i><i class="fas fa-p"></i>
                                            </span>
                                        </div>
                                        <input type="text" name="wanip" class="form-control" placeholder="WAN IP {000.000.000.000}" pattern="[0-9]{1,3}.[0-9]{1,3}.[0-9]{1,3}.[0-9]{1,3}" required>
                                    </div>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                ሰርቪስ ቁጥር <i class="fa-solid fa-1"></i> <i class="fa-solid fa-2"></i> <i class="fa-solid fa-3"></i>
                                            </span>
                                        </div>
                                        <input type="number" name="srvno" class="form-control" placeholder="Service number" pattern="[0-9]{5,12}" required>
                                    </div>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text">ያለበት ሁኔታ</span>
                                        <div class="form-control">
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" id="active" name="status" value="የሚሰራ">
                                                <label class="form-control-label" for="active">የሚሰራ</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" id="inactive" name="status" value="የማይሰራ">
                                                <label class="form-control-label" for="inactive">የማይሰራ</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text">
                                            <i class="fas fa-user"></i>
                                        </span>
                                        <select name="rep" class="form-select" required>
                                            <option value="" selected disabled>ተወካይ</option>
                                            <?php
                                            $sql = $conn->query("SELECT contacts.id AS coid, firstname, lastname FROM contacts WHERE woreda in(SELECT woreda FROM contacts WHERE contacts.id = $id);") or die(mysqli_error($conn));
                                            while ($row = $sql->fetch_assoc()) { ?>
                                                <option value="<?= $row['coid']; ?>"><?= $row['firstname']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" name="add_woredanet" class="btn btn-primary"><i class="fas fa-plus"></i> መዝግብ</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="card shadow mb-2">
                            <div class="card-header py-3 d-flex justify-content-between">
                                <h5 class="text-primary">የወረዳኔት አገልግሎት ዝርዝር መረጃ</h5>
                                <a href="#addVC" class="btn btn-success" title="የወረዳኔ አገልግሎት መዝግብ" data-bs-toggle="modal" data-tooltip="tooltip"><i class="fas fa-plus"></i></a>
                            </div>
                            <div class="card-body" id="vc">
                                <?php
                                $sql = "SELECT *, vcs.id AS vcid, woredas.name AS w_name FROM `vcs` INNER JOIN woredas ON woreda = woredas.id INNER JOIN contacts ON contacts.woreda = woredas.id GROUP BY month";
                                if ($vcs = mysqli_query($conn, $sql)) :
                                    if (mysqli_num_rows($vcs) > 0) : ?>
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-striped" id="dataTable">
                                                <thead>
                                                    <tr>
                                                        <th rowspan="2" class="text-center">ወር</th>
                                                        <th colspan="3" class="text-center">ቪዲዮ ኮንፈረንስ ተጠቃሚ</th>
                                                        <th colspan="3" class="text-center">ኢንተርኔት ተጠቃሚ</th>
                                                        <th rowspan="2"></th>
                                                    </tr>
                                                    <tr>
                                                        <th>ወንድ</th>
                                                        <th>ሴት</th>
                                                        <th>ድምር</th>
                                                        <th>ወንድ</th>
                                                        <th>ሴት</th>
                                                        <th>ድምር</th>

                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach ($vcs as $vc) : ?>
                                                        <tr>
                                                            <td class="py-1"><?= $vc['month']; ?></td>
                                                            <td class="py-1"><?= $vc['vmale']; ?></td>
                                                            <td class="py-1"><?= $vc['vfemale']; ?></td>
                                                            <td class="py-1"><?= $vc['vmale'] + $vc['vfemale']; ?></td>
                                                            <td class="py-1"><?= $vc['imale']; ?></td>
                                                            <td class="py-1"><?= $vc['ifemale']; ?></td>
                                                            <td class="py-1"><?= $vc['imale'] + $vc['ifemale']; ?></td>
                                                            <td class="btn-group py-1">
                                                                <a href="#viewVC<?= $vc['vcid']; ?>" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-tooltip="tooltip" title="View Record"><i class="fas fa-eye"></i></a>
                                                                <a href="#editVC<?= $vc['vcid']; ?>" class="btn btn-success btn-sm" data-bs-toggle="modal" data-tooltip="tooltip" title="Edit Record"><i class="fas fa-edit"></i></a>
                                                                <a href="#deleteVC<?= $vc['vcid']; ?>" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-tooltip="tooltip" title="Delete record"><i class="fas fa-times"></i></a>
                                                            </td>
                                                        </tr>

                                                        <!-- View WoredaNet service -->
                                                        <div class="modal fade" id="viewVC<?= $vc['vcid']; ?>" aria-hidden="true">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <form accept-charset="UTF-8" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                                                                        <div class="modal-header border-primary">
                                                                            <h3 class="modal-title">የወረዳኔት አገልግሎቱ ዝርዝር መረጃ</h3>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <p>ወረዳ፡ <span class="text-primary"><?= $vc['w_name']; ?></span></p>
                                                                            <p>ቪዲዮ ኮንፈረንስ ተጠቃሚ(ወንድ)፡ <span class="text-primary"><?= $vc['vmale']; ?></span></p>
                                                                            <p>ቪዲዮ ኮንፈረንስ ተጠቃሚ(ሴት)፡ <span class="text-primary"><?= $vc['vfemale']; ?></span>
                                                                            </p>
                                                                            <p>ኢንተርኔት ተጠቃሚ(ወንድ) <span class="text-primary"><?= $vc['imale']; ?></span></p>
                                                                            <p>ኢንተርኔት ተጠቃሚ(ሴት)፡ <span class="text-primary"><?= $vc['ifemale']; ?></span>
                                                                            </p>
                                                                            <p>ከብክነት የዳነ ወጪ፡ <span class="text-primary"><?= $vc['price']; ?></span></p>
                                                                        </div>
                                                                        <div class="modal-footer mt-0">
                                                                            <button class="btn btn-secondary" type="button" data-bs-dismiss="modal"><span class="fa fa-times"></span> Close</button>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <!-- Edit WoredaNet service -->
                                                        <div class="modal fade" id="editVC<?= $vc['vcid']; ?>" aria-hidden="true">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <form accept-charset="UTF-8" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                                                                        <div class="modal-header border-primary">
                                                                            <h3 class="modal-title">የወረዳኔት አገልግሎት መረጃ ማስተካከያ</h3>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <div class="input-group mb-3">
                                                                                <div class="input-group-prepend">
                                                                                    <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                                                                                </div>
                                                                                <?php
                                                                                $years = date('Y') - 9;
                                                                                $yeare = $years + 9;
                                                                                $months = date('F');
                                                                                ?>
                                                                                <select name="year" class="form-select">
                                                                                    <option value="" selected disabled>በጀት ዓመት</option>
                                                                                    <?php for ($ys = $years; $ys <= $yeare; $ys++) { ?>
                                                                                        <option value="<?= $ys; ?>" <?php if ($vc['year'] == $ys) {
                                                                                                                        echo 'selected';
                                                                                                                    } ?>><?= $ys; ?> ዓ.ም
                                                                                        </option>
                                                                                    <?php  } ?>
                                                                                </select>
                                                                                <select name="month" class="form-select" required>
                                                                                    <option value="" selected disabled>ወር</option>
                                                                                    <option value="ሐምሌ" <?php if ($vc['month'] == "ሐምሌ") {
                                                                                                            echo 'selected';
                                                                                                        } ?>>ሐምሌ
                                                                                    </option>
                                                                                    <option value="ነሃሴ" <?php if ($vc['month'] == "ነሃሴ") {
                                                                                                            echo 'selected';
                                                                                                        } ?>>ነሃሴ
                                                                                    </option>
                                                                                    <option value="መስከረም" <?php if ($vc['month'] == "መስከረም") {
                                                                                                                echo 'selected';
                                                                                                            } ?>>መስከረም
                                                                                    </option>
                                                                                    <option value="ጥቅምት" <?php if ($vc['month'] == "ጥቅምት") {
                                                                                                                echo 'selected';
                                                                                                            } ?>>ጥቅምት
                                                                                    </option>
                                                                                    <option value="ሕዳር" <?php if ($vc['month'] == "ሕዳር") {
                                                                                                            echo 'selected';
                                                                                                        } ?>>ሕዳር
                                                                                    </option>
                                                                                    <option value="ታሕሳስ" <?php if ($vc['month'] == "ታሕሳስ") {
                                                                                                                echo 'selected';
                                                                                                            } ?>>ታህሳስ
                                                                                    </option>
                                                                                    <option value="ጥር" <?php if ($vc['month'] == "ጥር") {
                                                                                                            echo 'selected';
                                                                                                        } ?>>ጥር
                                                                                    </option>
                                                                                    <option value="የካቲት" <?php if ($vc['month'] == "የካቲት") {
                                                                                                                echo 'selected';
                                                                                                            } ?>>የካቲት
                                                                                    </option>
                                                                                    <option value="መጋቢት" <?php if ($vc['month'] == "መጋቢት") {
                                                                                                                echo 'selected';
                                                                                                            } ?>>መጋቢት
                                                                                    </option>
                                                                                    <option value="ሚያዚያ" <?php if ($vc['month'] == "ሚያዚያ") {
                                                                                                                echo 'selected';
                                                                                                            } ?>>ሚያዚያ
                                                                                    </option>
                                                                                    <option value="ግንቦት" <?php if ($vc['month'] == "ግንቦት") {
                                                                                                                echo 'selected';
                                                                                                            } ?>>ግንቦት
                                                                                    </option>
                                                                                    <option value="ሰኔ" <?php if ($vc['month'] == "ሰኔ") {
                                                                                                            echo 'selected';
                                                                                                        } ?>>ሰኔ
                                                                                    </option>
                                                                                </select>
                                                                            </div>
                                                                            <fieldset class="scheduler-border">
                                                                                <legend class="scheduler-border">ቪዲዮ ኮንፈረንስ ተጠቃሚ
                                                                                </legend>
                                                                                <div class="input-group">
                                                                                    <div class="input-group-prepend">
                                                                                        <span class="input-group-text"><i class="fas fa-male"></i></span>
                                                                                    </div>
                                                                                    <input type="number" class="form-control" name="vmale" placeholder="ወንድ" value="<?= $vc['vmale']; ?>" />
                                                                                    <div class="input-group-prepend">
                                                                                        <span class="input-group-text"><i class="fas fa-female"></i></span>
                                                                                    </div>
                                                                                    <input type="number" class="form-control" name="vfemale" placeholder="ሴት" value="<?= $vc['vfemale']; ?>" />
                                                                                </div>
                                                                            </fieldset>
                                                                            <fieldset class="scheduler-border">
                                                                                <legend class="scheduler-border">ኢንተርኔት ተጠቃሚ</legend>
                                                                                <div class="input-group">
                                                                                    <div class="input-group-prepend">
                                                                                        <span class="input-group-text"><i class="fas fa-male"></i></span>
                                                                                    </div>
                                                                                    <input type="number" class="form-control" name="imale" placeholder="ወንድ" value="<?= $vc['imale']; ?>" />
                                                                                    <div class="input-group-prepend">
                                                                                        <span class="input-group-text"><i class="fas fa-female"></i></span>
                                                                                    </div>
                                                                                    <input type="number" class="form-control" name="ifemale" placeholder="ሴት" value="<?= $vc['ifemale']; ?>" />
                                                                                </div>
                                                                            </fieldset>
                                                                            <div class="input-group">
                                                                                <div class="input-group-prepend">
                                                                                    <span class="input-group-text"><i class="fas fa-dollar"></i></span>
                                                                                </div>
                                                                                <input type="number" class="form-control" name="price" placeholder="የዳነ ወጪ በብር" value="<?= $vc['price']; ?>" />
                                                                            </div>
                                                                        </div>
                                                                        <div class="modal-footer mt-0">
                                                                            <input type="hidden" name="id" value="<?= $vc['vcid']; ?>">
                                                                            <button type="submit" name="update_VC" class="btn btn-success"><i class="fa fa-check"></i>
                                                                                አስቀምጥ</button>
                                                                            <button class="btn btn-secondary" type="button" data-bs-dismiss="modal"><i class="fa fa-times"></i>
                                                                                ዝጋ</button>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <!-- Delete WoredaNet service -->
                                                        <div class="modal fade" id="deleteVC<?= $vc['vcid']; ?>" aria-hidden="true">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <form accept-charset="UTF-8" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                                                                        <div class="modal-header border-danger">
                                                                            <h3 class="modal-title">የወረዳኔቱን መረጃ ለማጥፋት</h3>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <h4 class="text-danger">ይህን የቪዲዮ ኮንፈረንስ መረጃ በእርግጥ ማስወገድ
                                                                                ይፈልጋሉ?</h4>
                                                                        </div>
                                                                        <div class="modal-footer mt-0">
                                                                            <input type="hidden" name="id" value="<?= $vc['vcid']; ?>">
                                                                            <button type="submit" name="delete_VC" class="btn btn-danger"><i class="fa fa-check"></i>
                                                                                አዎን</button>
                                                                            <button class="btn btn-secondary" type="button" data-bs-dismiss="modal"><span class="fa fa-times"></span> አይ</button>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- Modal End -->
                                                    <?php endforeach; ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    <?php else : ?>
                                        <div class="alert alert-danger">
                                            <strong>Empty!</strong> No records found in the table.
                                        </div>
                                    <?php endif; ?>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>

            <?php elseif (isset($_GET['page']) && $_GET['page'] === 'Trainings') : ?>
                <div class="row">
                    <div class="col-md-8">
                        <div class="card shadow">
                            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-around">
                                <h5>List of Trainees</h5>
                                <span id="export-to-excel"><a href="#" class="btn btn-success"><i class="fas fa-file-excel"></i> Export to excel</a></span>
                                <?php
                                $sql_year = "SELECT DISTINCT year FROM trainings ORDER BY year DESC";
                                $years = mysqli_query($conn, $sql_year);
                                ?>
                                <div class="row">
                                    <div class="col">
                                        <form accept-charset="UTF-8" action="#" method="post">
                                            <div class="input-group" id="filters">
                                                <select class="form-select form-select-sm" id="f_year">
                                                    <option selected disabled>ዓመት</option>
                                                    <?php
                                                    $sql_year = "SELECT DISTINCT year FROM `trainings`";
                                                    $years = mysqli_query($conn, $sql_year);
                                                    if ($years > 0) :
                                                        while ($row = mysqli_fetch_array($years)) { ?>
                                                            <option value="<?php echo $row['year']; ?>"><?php echo $row['year']; ?> ዓ.ም</option>
                                                        <?php }
                                                        ?>

                                                    <?php endif; ?>
                                                </select>
                                                <button type="reset" class="btn btn-secondary btn-sm" id="clear"><i class="fas fa-times"></i></button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                            <form action="export_excel.php" method="post" id="export-form">
                                <input type="hidden" value="" id="hidden-type" name="ExportType" />
                            </form>
                                <div class="table-responsive">
                                    <?php
                                    $sql = "SELECT * FROM trainings INNER JOIN woredas INNER JOIN training_categories ON woreda = woredas.id AND category = training_categories.id";

                                    if ($result = mysqli_query($conn, $sql)) :
                                        if (mysqli_num_rows($result) > 0) : ?>
                                            <table class="table table-striped" id="dataTable">
                                                <thead>
                                                    <tr>
                                                        <th>ስም</th>
                                                        <th>ወረዳ</th>
                                                        <th>ፆታ</th>
                                                        <th>የስልጠና ዓይነት</th>
                                                        <th>ዓመት</th>
                                                        <th>ወር</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>

                                                <tbody>
                                                    <?php foreach ($trainees as $row) : ?>
                                                        <tr>
                                                            <!--  -->
                                                            <td class="py-1"><?= $row['name']; ?></td>
                                                            <td class="py-1"><?= $row['woreda']; ?></td>
                                                            <td class="py-1"><?= $row['sex']; ?></td>
                                                            <td class="py-1"><?= $row['category']; ?></td>
                                                            <td class="py-1"><?= $row['year']; ?></td>
                                                            <td class="py-1"><?= $row['month']; ?></td>

                                                            <td class="btn-group py-1">
                                                                <a href="#" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#viewModal<?= $row['id']; ?>" data-tooltip="tooltip" title="View Trainee"><i class="fa fa-eye"></i></a>
                                                                <a href="#" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#editModal<?= $row['id']; ?>" data-tooltip="tooltip" title="Edit Trainee"><i class="fa fa-edit"></i></a>
                                                                <a href="#" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal<?= $row['id']; ?>" data-tooltip="tooltip" title="Delete Trainee"><i class="fa fa-times"></i></a>
                                                            </td>
                                                        </tr>
                                                        <?php include('inc/trainings.php'); ?>
                                                    <?php endforeach; ?>
                                                </tbody>
                                            </table>
                                    <?php
                                            mysqli_free_result($result);
                                        else :
                                            echo "No records matching your query were found.";
                                        endif;
                                    else :
                                        echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
                                    endif;
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">ADD NEW TRAINEE</h6>
                            </div>
                            <form accept-charset="UTF-8" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                                <div class="card-body">
                                    <div class="input-group mb-3">
                                        <select name="woreda" class="form-select" required>
                                            <option value="" selected disabled>ወረዳ</option>
                                            <?php foreach ($woredas = mysqli_query($conn, "SELECT * FROM woredas") as $woreda) : ?>
                                                <option value="<?= $woreda['id'] ?>"><?= $woreda['name']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                                        </div>
                                        <?php
                                        $years = date('Y') - 9;
                                        $yeare = $years + 9;
                                        $months = date('F');
                                        ?>
                                        <select name="year" class="form-select">
                                            <option value="" selected disabled>በጀት ዓመት</option>
                                            <?php for ($ys = $years; $ys <= $yeare; $ys++) { ?>
                                                <option value="<?= $ys; ?>"><?= $ys; ?></option>
                                            <?php  } ?>
                                        </select>
                                        <select name="month" class="form-select" required>
                                            <option value="" selected disabled>ወር</option>
                                            <option value="July">ሐምሌ</option>
                                            <option value="August">ነሃሴ</option>
                                            <option value="September">መስከረም</option>
                                            <option value="October">ጥቅምት</option>
                                            <option value="November">ሕዳር</option>
                                            <option value="December">ታህሳስ</option>
                                            <option value="January">ጥር</option>
                                            <option value="February">የካቲት</option>
                                            <option value="March">መጋቢት</option>
                                            <option value="April">ሚያዚያ</option>
                                            <option value="May">ግንቦት</option>
                                            <option value="June">ሰኔ</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="fullname" class="form-control" required="required" placeholder="ሙሉ ስም" />
                                    </div>
                                    <div class="form-group">
                                        <select name="sex" class="form-select" required="required">
                                            <option value="">-ፆታ-</option>
                                            <option value="Male">ወንድ</option>
                                            <option value="Female">ሴት</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <select name="category" class="form-select" required="required">
                                            <option value="" selected disabled>የስልጠና ዓይነት</option>
                                            <?php foreach ($cts = mysqli_query($conn, "SELECT * FROM training_categories") as $ct) : ?>
                                                <option value="<?= $ct['id'] ?>"><?= $ct['name']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <select name="type" class="form-select" required="required">
                                            <option value="">-የሠልጣኝ ዓይነት-</option>
                                            <option value="Employee">መንግሥት ሠራተኛ</option>
                                            <option value="Teacher">መምህር</option>
                                            <option value="Cabinet">አመራር</option>
                                            <option value="Kebele Manager">ስራ አስኪያጅ</option>
                                            <option value="Student">ተማሪ</option>
                                            <option value="Community">ማህበረሰብ</option>
                                            <option value="Women">ሴቶች</option>
                                            <option value="HIV/AIDS Association">HIV/AIDS ማህበራት</option>
                                            <option value="Disabled">አካል ጉዳተኛ</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <textarea name="office" class="form-control" rows="2" placeholder="ተቋም"></textarea>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button name="add_trainee" class="btn btn-primary"><span class="fa fa-check"></span>
                                        መዝግብ</button>
                                    <button class="btn btn-secondary" type="button" data-bs-dismiss="modal"><span class="fa fa-close"></span> ዝጋ</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>


            <?php elseif (isset($_GET['page']) && $_GET['page'] === 'Maintenances') : ?>
                <div class="row">
                    <div class="card col-md-12 shadow mb-4">
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary">List of Electronics Maintenances</h6>
                            <a href="#" class="btn btn-success rounded" data-bs-toggle="modal" data-bs-target="#addMTModal"><i class="fa fa-plus"></i></a>
                        </div>
                        <div class="card-body">

                            <div class="table-responsive col-md-12">
                                <?php
                                $sql = "SELECT *, maintenances.id as mid, woredas.name AS w_name FROM `maintenances` INNER JOIN woredas ON woreda = woredas.id";
                                if ($result = mysqli_query($conn, $sql)) :
                                    if (mysqli_num_rows($result) > 0) : ?>
                                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th>ወረዳ</th>
                                                    <th>ደስክቶፕ</th>
                                                    <th>ፕሪንተር</th>
                                                    <th>ላፕቶፕ</th>
                                                    <th>ፎቶኮፒ</th>
                                                    <th>ፋክስ</th>
                                                    <th>ስካነር</th>
                                                    <th>ስዊች</th>
                                                    <th>ፕሮጀክተር</th>
                                                    <th>ሰርቨር</th>
                                                    <th>ድምር</th>
                                                    <th>የዳነ ወጪ</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php while ($fetch = mysqli_fetch_array($result)) : ?>
                                                    <tr>
                                                        <td class="py-1"><?= $fetch['w_name']; ?></td>
                                                        <td class="py-1"><?= $fetch['desktop']; ?></td>
                                                        <td class="py-1"><?= $fetch['printer']; ?></td>
                                                        <td class="py-1"><?= $fetch['laptop']; ?></td>
                                                        <td class="py-1"><?= $fetch['photocopier']; ?></td>
                                                        <td class="py-1"><?= $fetch['fax']; ?></td>
                                                        <td class="py-1"><?= $fetch['scanner']; ?></td>
                                                        <td class="py-1"><?= $fetch['switch']; ?></td>
                                                        <td class="py-1"><?= $fetch['projector']; ?></td>
                                                        <td class="py-1"><?= $fetch['server']; ?></td>
                                                        <td class="py-1 right" style="font-weight:900;">
                                                            <?php
                                                            $sum_devices = $fetch['desktop'] + $fetch['printer'] + $fetch['laptop'] + $fetch['photocopier'] + $fetch['fax'] + $fetch['scanner'] + $fetch['switch'] + $fetch['projector'] + $fetch['server'];
                                                            echo $sum_devices;
                                                            ?>
                                                        </td>
                                                        <td class="py-1">
                                                            <?php
                                                            $p = (400 * ($fetch['desktop'] + $fetch['laptop'] + $fetch['fax'] + $fetch['scanner'] + $fetch['projector']) + $fetch['server']) + 600 * ($fetch['printer'] + $fetch['photocopier']) + (100 * $fetch['switch']);
                                                            // echo $fetch['price']; 
                                                            echo $p;
                                                            ?>
                                                        </td>
                                                        <td class="d-flex py-1">
                                                            <a class="btn btn-primary btn-sm mr-1 rounded" data-tooltip="tooltip" title="View Details" href="#" data-bs-toggle="modal" data-bs-target="#viewMTModal<?= $fetch['mid'] ?>"><i class="fas fa-eye"></i></a>
                                                            <a class="btn btn-success btn-sm mr-1 rounded" data-tooltip="tooltip" title="Edit Record" href="#" data-bs-toggle="modal" data-bs-target="#editMTModal<?php echo $fetch['mid'] ?>"><i class="fas fa-edit"></i></a>
                                                            <a class="btn btn-danger btn-sm rounded" data-tooltip="tooltip" title="Delete Record" href="#" data-bs-toggle="modal" data-bs-target="#deleteMTModal<?php echo $fetch['mid'] ?>"><i class="fas fa-times"></i></a>
                                                        </td>
                                                    </tr>
                                                    <?php include('inc/maintenances.php'); ?>
                                                <?php endwhile; ?>
                                                <tr class="right bolder" style="font-weight:900;">
                                                    <td class="py-1">ጠቅላላ ድምር</td>
                                                    <td class="py-1"><?php echo $sum_desktop; ?></td>
                                                    <td class="py-1"><?php echo $sum_printer; ?></td>
                                                    <td class="py-1"><?php echo $sum_laptop; ?></td>
                                                    <td class="py-1"><?php echo $sum_photocopier; ?></td>
                                                    <td class="py-1"><?php echo $sum_fax; ?></td>
                                                    <td class="py-1"><?php echo $sum_scanner; ?></td>
                                                    <td class="py-1"><?php echo $sum_switch; ?></td>
                                                    <td class="py-1"><?php echo $sum_projector; ?></td>
                                                    <td class="py-1"><?php echo $sum_server; ?></td>
                                                    <!-- <td class="py-1"><?php echo $sum_server; ?></td> -->
                                                    <td class="py-1"><?php echo $sum_devices_total; ?></td>
                                                    <td class="py-1"><?php echo $sum_price; ?></td>
                                                    <td class="py-1"></td>
                                                </tr>
                                            </tbody>
                                    <?php
                                        mysqli_free_result($result);
                                    else :
                                        echo "No records matching your query were found.";
                                    endif;
                                else :
                                    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
                                endif; ?>
                                        </table>
                            </div>
                        </div>
                    </div>
                </div>

            <?php elseif (isset($_GET['page']) && $_GET['page'] === 'Applications') : ?>
                <div class="row">
                    <div class="card col-md-12 shadow mb-4">
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary">List of Applications</h6>
                            <a href="#" class="btn btn-success rounded" data-bs-toggle="modal" data-bs-target="#addModal"><i class="fa fa-plus"></i></a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <?php
                                $sql = "SELECT *, apps.id AS aid, woredas.name AS w_name FROM `apps` INNER JOIN woredas ON woreda = woredas.id";
                                if ($result = mysqli_query($conn, $sql)) :
                                    if (mysqli_num_rows($result) > 0) : ?>
                                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th>ወረዳ</th>
                                                    <th>CCMS</th>
                                                    <th>IBEX</th>
                                                    <th>Payroll</th>
                                                    <th>PASS</th>
                                                    <th>TRLS</th>
                                                    <th>MIS</th>
                                                    <th>ICSMIS</th>
                                                    <th>SIGTAS</th>
                                                    <th>OMAS</th>
                                                    <th>PADS</th>
                                                    <th>ISLA</th>
                                                    <th>Others</th>
                                                    <th>ድምር</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php while ($fetch = mysqli_fetch_array($result)) : ?>
                                                    <tr>
                                                        <td class="py-1"><?= $fetch['w_name']; ?></td>
                                                        <td class="py-1"><?= $fetch['ccms']; ?></td>
                                                        <td class="py-1"><?= $fetch['ibex']; ?></td>
                                                        <td class="py-1"><?= $fetch['payroll']; ?></td>
                                                        <td class="py-1"><?= $fetch['pass']; ?></td>
                                                        <td class="py-1"><?= $fetch['trls']; ?></td>
                                                        <td class="py-1"><?= $fetch['mis']; ?></td>
                                                        <td class="py-1"><?= $fetch['icsmis']; ?></td>
                                                        <td class="py-1"><?= $fetch['sigtas']; ?></td>
                                                        <td class="py-1"><?= $fetch['omas']; ?></td>
                                                        <td class="py-1"><?= $fetch['pads']; ?></td>
                                                        <td class="py-1"><?= $fetch['isla']; ?></td>
                                                        <td class="py-1"><?= $fetch['others']; ?></td>
                                                        <td class="py-1" style="font-weight:900;">
                                                            <?php
                                                            $total = $fetch['ccms'] + $fetch['ibex'] + $fetch['payroll'] + $fetch['pass'] + $fetch['trls'] + $fetch['mis'] + $fetch['icsmis'] + $fetch['sigtas'] + $fetch['omas'] + $fetch['pads'] + $fetch['isla'];
                                                            echo $total;
                                                            ?>
                                                        </td>
                                                        <td class="d-flex py-1">
                                                            <a class="btn btn-primary btn-sm mr-1 rounded" title="View Details" href="#" data-tooltip="tooltip" data-bs-toggle="modal" data-bs-target="#viewAppModal<?php echo $fetch['aid'] ?>"><i class="fas fa-eye"></i></a>
                                                            <a class="btn btn-success btn-sm mr-1 rounded" title="Edit Record" href="#" data-tooltip="tooltip" data-bs-toggle="modal" data-bs-target="#editAppModal<?php echo $fetch['aid'] ?>"><i class="fas fa-edit"></i></a>
                                                            <a class="btn btn-danger btn-sm rounded" title="Delete Record" href="#" data-tooltip="tooltip" data-bs-toggle="modal" data-bs-target="#deleteAppModal<?php echo $fetch['aid'] ?>"><i class="fas fa-times"></i></a>
                                                        </td>
                                                    </tr>
                                                    <?php include('inc/apps.php'); ?>
                                                <?php endwhile; ?>
                                                <tr class="right fw-800" style="font-weight:900;">
                                                    <td class="py-1">ድምር</td>
                                                    <td class="py-1"><?= $sum_ccms; ?></td>
                                                    <td class="py-1"><?= $sum_ibex; ?></td>
                                                    <td class="py-1"><?= $sum_payroll; ?></td>
                                                    <td class="py-1"><?= $sum_pass; ?></td>
                                                    <td class="py-1"><?= $sum_mis; ?></td>
                                                    <td class="py-1"><?= $sum_trls; ?></td>
                                                    <td class="py-1"><?= $sum_icsmis; ?></td>
                                                    <td class="py-1"><?= $sum_sigtas; ?></td>
                                                    <td class="py-1"><?= $sum_omas; ?></td>
                                                    <td class="py-1"><?= $sum_pads; ?></td>
                                                    <td class="py-1"><?= $sum_isla; ?></td>
                                                    <td class="py-1"><?= $sum_others; ?></td>
                                                    <td class="py-1"><?= $sum_apps_total; ?></td>
                                                    <td class="py-1"></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                <?php
                                        mysqli_free_result($result);
                                    else :
                                        echo "No records matching your query were found.";
                                    endif;
                                else :
                                    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
                                endif; ?>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Add application modal -->
                <div class="modal fade" id="addModal" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form accept-charset="UTF-8" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                                <div class="modal-header">
                                    <h3 class="modal-title">ነባር አፕሊኬሽን መረጃ መመዝገቢያ</h3>
                                </div>
                                <div class="modal-body">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-map-marker"></i></span>
                                        </div>
                                        <select name="woreda" class="form-control <?php echo (!empty($woreda_err)) ? 'is-invalid' : ''; ?>">
                                            <option value="" selected disabled>ወረዳ</option>
                                            <?php foreach ($woredas = mysqli_query($conn, "SELECT * FROM woredas") as $woreda) : ?>
                                                <option value="<?= $woreda['id']; ?>"><?= $woreda['name']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                                        </div>
                                        <?php
                                        $years = date('Y') - 9;
                                        $yeare = $years + 9;
                                        $months = date('F');
                                        ?>
                                        <select name="year" class="form-control">
                                            <option value="" selected disabled>በጀት ዓመት</option>
                                            <?php for ($ys = $years; $ys <= $yeare; $ys++) { ?>
                                                <option value="<?= $ys; ?>"><?= $ys; ?> ዓ.ም</option>
                                            <?php  } ?>
                                        </select>
                                        <select name="month" class="form-control" required>
                                            <option value="" selected disabled>ወር</option>
                                            <option value="ሐምሌ">ሐምሌ</option>
                                            <option value="ነሃሴ">ነሃሴ</option>
                                            <option value="መስከረም">መስከረም</option>
                                            <option value="ጥቅምት">ጥቅምት</option>
                                            <option value="ሕዳር">ሕዳር</option>
                                            <option value="ታሕሳስ">ታህሳስ</option>
                                            <option value="ጥር">ጥር</option>
                                            <option value="የካቲት">የካቲት</option>
                                            <option value="መጋቢት">መጋቢት</option>
                                            <option value="ሚያዚያ">ሚያዚያ</option>
                                            <option value="ግንቦት">ግንቦት</option>
                                            <option value="ሰኔ">ሰኔ</option>
                                        </select>
                                    </div>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-code"></i></span>
                                        </div>
                                        <input type="number" name="ccms" class="form-control" placeholder="CCMS" />
                                        <input type="number" name="ibex" class="form-control" placeholder="IBEX">
                                    </div>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-code"></i></span>
                                        </div>
                                        <input type="number" name="payroll" class="form-control" placeholder="Payroll">
                                        <input type="number" name="pass" class="form-control" placeholder="PASS">
                                    </div>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-code"></i></span>
                                        </div>
                                        <input type="number" name="trls" class="form-control" placeholder="TRLS">
                                        <input type="number" name="mis" class="form-control" placeholder="MIS">
                                    </div>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-code"></i></span>
                                        </div>
                                        <input type="number" name="icsmis" class="form-control" placeholder="ICSMIS">
                                        <input type="number" name="sigtas" class="form-control" placeholder="SIGTAS">
                                    </div>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-code"></i></span>
                                        </div>
                                        <input type="number" name="omas" class="form-control" placeholder="OMAS">
                                        <input type="number" name="pads" class="form-control" placeholder="PADS">
                                    </div>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-code"></i></span>
                                        </div>
                                        <input type="number" name="isla" class="form-control" placeholder="ISLA">
                                        <input type="number" name="others" class="form-control" placeholder="Others">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button name="add_app" class="btn btn-primary"><span class="fa fa-check"></span>
                                        መዝግብ</button>
                                    <button class="btn btn-secondary" type="button" data-bs-dismiss="modal"><span class="fa fa-times"></span> ዝጋ</button>
                                </div>
                        </div>
                        </form>
                    </div>
                </div>
                <!-- End add modal -->
            <?php elseif (isset($_GET['page']) && $_GET['page'] === 'OpenSources') : ?>
                <div class="row">
                    <div class="card col-md-12 shadow mb-4">
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary">List of Open Sources Applications</h6>
                            <a href="#" class="btn btn-success rounded" data-bs-toggle="modal" data-bs-target="#addOpenModal"><i class="fa fa-plus"></i></a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <?php
                                $sql = "SELECT *, woredas.id AS w_id, woredas.name AS w_name, open_sources.id as oid FROM `open_sources` INNER JOIN woredas ON woreda = woredas.id";
                                if ($result = mysqli_query($conn, $sql)) :
                                    if (mysqli_num_rows($result) > 0) : ?>
                                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th>ወረዳ</th>
                                                    <th title="Attendance Management System">AMS</th>
                                                    <th title="IP Messenger">IpM</th>
                                                    <th>TeamViewer</th>
                                                    <th>JAWS/NVDA</th>
                                                    <th title="Fax Automation">FaxA</th>
                                                    <th>Simulation</th>
                                                    <th title="Document Management System">DMS</th>
                                                    <th title="BSC Automation">BSCA</th>
                                                    <th title="Amhara Rural Kebele Database">ARKDB</th>
                                                    <th>EasyBCD</th>
                                                    <th>Others</th>
                                                    <th>ድምር</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php while ($fetch = mysqli_fetch_array($result)) : ?>
                                                    <tr>
                                                        <td class="py-1"><?= $fetch['w_name']; ?></td>
                                                        <td class="py-1"><?= $fetch['ams']; ?></td>
                                                        <td class="py-1"><?= $fetch['ipm']; ?></td>
                                                        <td class="py-1"><?= $fetch['teamv']; ?></td>
                                                        <td class="py-1"><?= $fetch['jaws']; ?></td>
                                                        <td class="py-1"><?= $fetch['faxaw']; ?></td>
                                                        <td class="py-1"><?= $fetch['simu']; ?></td>
                                                        <td class="py-1"><?= $fetch['dms']; ?></td>
                                                        <td class="py-1"><?= $fetch['bsca']; ?></td>
                                                        <td class="py-1"><?= $fetch['arkdb']; ?></td>
                                                        <td class="py-1"><?= $fetch['ebcd']; ?></td>
                                                        <td class="py-1"><?= $fetch['others']; ?></td>
                                                        <td class="py-1" style="font-weight:900;">
                                                            <?php
                                                            $total_open = $fetch['ams'] + $fetch['ipm'] + $fetch['teamv'] + $fetch['jaws'] + $fetch['faxaw'] + $fetch['simu'] + $fetch['dms'] + $fetch['bsca'] + $fetch['arkdb'] + $fetch['ebcd'] + $fetch['others'];
                                                            echo $total_open;
                                                            ?>
                                                        </td>
                                                        <td class="d-flex py-1">
                                                            <a class="btn btn-primary btn-sm mr-1 rounded" title="View Details" href="#" data-bs-toggle="modal" data-tooltip="tooltip" data-bs-target="#viewOpenModal<?= $fetch['oid'] ?>"><i class="fas fa-eye"></i></a>
                                                            <a class="btn btn-success btn-sm mr-1 rounded" title="Edit Record" href="#" data-bs-toggle="modal" data-tooltip="tooltip" data-bs-target="#editOpenModal<?= $fetch['oid'] ?>"><i class="fas fa-edit"></i></a>
                                                            <a class="btn btn-danger btn-sm rounded" title="Delete Record" href="#" data-bs-toggle="modal" data-tooltip="tooltip" data-bs-target="#deleteOpenModal<?= $fetch['oid']; ?>"><i class="fas fa-times"></i></a>
                                                        </td>
                                                    </tr>
                                                    <?php include('inc/opensources.php'); ?>
                                                <?php endwhile; ?>
                                                <tr class="right fw-800" style="font-weight:900;">
                                                    <td class="py-1">ድምር</td>
                                                    <td class="py-1"><?php echo $sum_ams; ?></td>
                                                    <td class="py-1"><?php echo $sum_ipm; ?></td>
                                                    <td class="py-1"><?php echo $sum_teamv; ?></td>
                                                    <td class="py-1"><?php echo $sum_jaws; ?></td>
                                                    <td class="py-1"><?php echo $sum_faxaw; ?></td>
                                                    <td class="py-1"><?php echo $sum_simu; ?></td>
                                                    <td class="py-1"><?php echo $sum_dms; ?></td>
                                                    <td class="py-1"><?php echo $sum_bsca; ?></td>
                                                    <td class="py-1"><?php echo $sum_arkdb; ?></td>
                                                    <td class="py-1"><?php echo $sum_ebcd; ?></td>
                                                    <td class="py-1"><?php echo $sum_others; ?></td>
                                                    <td class="py-1"><?php echo $total_opensources; ?></td>
                                                    <td></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                <?php
                                        mysqli_free_result($result);
                                    else :
                                        echo "No records matching your query were found.";
                                    endif;
                                else :
                                    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
                                endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- add open source modal -->
                <div class="modal fade" id="addOpenModal" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form accept-charset="UTF-8" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                                <div class="modal-header">
                                    <h3 class="modal-title">ነፃ ሶፍትዌር (Open Source) መረጃ መመዝገቢያ</h3>
                                </div>
                                <div class="modal-body">
                                    <div class="row mb-2">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-map-marker"></i></span>
                                            </div>
                                            <select name="woreda" class="form-control <?php echo (!empty($woreda_err)) ? 'is-invalid' : ''; ?>">
                                                <option value="" selected disabled>ወረዳ</option>
                                                <?php foreach ($woredas = mysqli_query($conn, "SELECT * FROM woredas") as $woreda) : ?>
                                                    <option value="<?= $woreda['id']; ?>"><?= $woreda['name']; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                                            </div>
                                            <?php
                                            $years = date('Y') - 9;
                                            $yeare = $years + 9;
                                            $months = date('F');
                                            ?>
                                            <select name="year" class="form-control">
                                                <option value="" selected disabled>በጀት ዓመት</option>
                                                <?php for ($ys = $years; $ys <= $yeare; $ys++) { ?>
                                                    <option value="<?= $ys; ?>"><?= $ys; ?></option>
                                                <?php  } ?>
                                            </select>
                                            <select name="month" class="form-control" required>
                                                <option value="" selected disabled>ወር</option>
                                                <option value="ሐምሌ">ሐምሌ</option>
                                                <option value="ነሃሴ">ነሃሴ</option>
                                                <option value="መስከረም">መስከረም</option>
                                                <option value="ጥቅምት">ጥቅምት</option>
                                                <option value="ሕዳር">ሕዳር</option>
                                                <option value="ታሕሳስ">ታህሳስ</option>
                                                <option value="ጥር">ጥር</option>
                                                <option value="የካቲት">የካቲት</option>
                                                <option value="መጋቢት">መጋቢት</option>
                                                <option value="ሚያዚያ">ሚያዚያ</option>
                                                <option value="ግንቦት">ግንቦት</option>
                                                <option value="ሰኔ">ሰኔ</option>
                                            </select>
                                        </div>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-code"></i></span>
                                            </div>
                                            <input type="number" name="ams" class="form-control" placeholder="Attendance Management" />
                                            <input type="number" name="ipm" class="form-control" placeholder="IP Messenger">
                                        </div>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-code"></i></span>
                                            </div>
                                            <input type="number" name="teamv" class="form-control" placeholder="Teamviewer">
                                            <input type="number" name="jaws" class="form-control" placeholder="JAWS/NVDA">
                                        </div>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-code"></i></span>
                                            </div>
                                            <input type="number" name="faxaw" class="form-control" placeholder="Fax Automation">
                                            <input type="number" name="simu" class="form-control" placeholder="Simulation">
                                        </div>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-code"></i></span>
                                            </div>
                                            <input type="number" name="dms" class="form-control" placeholder="Document Management">
                                            <input type="number" name="bsca" class="form-control" placeholder="BSC Automation">
                                        </div>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-code"></i></span>
                                            </div>
                                            <input type="number" name="arkdb" class="form-control" placeholder="ARKDB">
                                            <input type="number" name="ebcd" class="form-control" placeholder="Easy BCD">
                                        </div>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-code"></i></span>
                                            </div>
                                            <input type="number" name="others" class="form-control" placeholder="Others">
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button name="add_opensource" class="btn btn-primary"><span class="fa fa-check"></span>
                                        መዝግብ</button>
                                    <button class="btn btn-secondary" type="button" data-bs-dismiss="modal"><span class="fa fa-close"></span> ዝጋ</button>
                                </div>
                        </div>
                        </form>
                    </div>
                </div>
                <!-- End add open source modal -->

            <?php elseif (isset($_GET['page']) && $_GET['page'] === 'Websites') : ?>
                <div class="row">
                    <div class="card col-md-12 shadow mb-4">
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary">List of Websites</h6>
                            <a href="#" class="btn btn-success rounded" data-bs-toggle="modal" data-bs-target="#addWebModal"><i class="fa fa-plus"></i></a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <?php
                                $sql = "SELECT *, websites.id as wbid, woredas.name AS w_name FROM websites INNER JOIN woredas INNER JOIN web_status ON woreda=woredas.id AND status = web_status.id";
                                if ($result = mysqli_query($conn, $sql)) :
                                    if (mysqli_num_rows($result) > 0) : ?>
                                        <table class="table table-bordered" id="dataTable">
                                            <thead>
                                                <tr>
                                                    <th>WOREDA</th>
                                                    <th>STATUS</th>
                                                    <th>URL</th>
                                                    <th>COUNT</th>
                                                    <th>ACTION</th>
                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <tr>
                                                    <th>WOREDA</th>
                                                    <th>STATUS</th>
                                                    <th>URL</th>
                                                    <th>COUNT</th>
                                                    <th>ACTION</th>
                                                </tr>
                                            </tfoot>
                                            <tbody>
                                                <?php while ($fetch = mysqli_fetch_array($result)) : ?>
                                                    <tr>
                                                        <td><?= $fetch['w_name']; ?></td>
                                                        <td style="text-transform: capitalize;"><?= $fetch['name']; ?></td>
                                                        <td class="py-1"><a href="<?= $fetch['url']; ?>" target="_blank"><?= $fetch['url']; ?></a></td>
                                                        <td><?= $fetch['count']; ?></td>
                                                        <td class="d-flex">
                                                            <a class="btn btn-primary btn-sm mr-1" href="#" data-tooltip="tooltip" title="View Record" data-bs-toggle="modal" data-bs-target="#viewWebModal<?= $fetch['wbid']; ?>"><i class="fas fa-eye"></i></a>
                                                            <a class="btn btn-success btn-sm mr-1" href="#" data-tooltip="tooltip" title="Edit Record" data-bs-toggle="modal" data-bs-target="#editWebModal<?= $fetch['wbid']; ?>"><i class="fas fa-edit"></i></a>
                                                            <a class="btn btn-danger btn-sm" href="#" data-tooltip="tooltip" title="Delete Record" data-bs-toggle="modal" data-bs-target="#deleteWebModal<?= $fetch['wbid']; ?>"><i class="fas fa-times"></i></a>
                                                        </td>
                                                    </tr>
                                                    <?php include('inc/websites.php'); ?>
                                                <?php endwhile; ?>
                                            </tbody>
                                        </table>
                                <?php
                                        mysqli_free_result($result);
                                    else :
                                        echo "No records matching your query were found.";
                                    endif;
                                else :
                                    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
                                endif;
                                ?>
                            </div>
                        </div>
                    </div>
                </div>

            <?php elseif (isset($_GET['page']) && $_GET['page'] === 'Woredas') : ?>
                <div class="row">
                    <div class="card col-md-8 shadow mb-4">
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary">List of Woredas</h6>
                            <a href="#" class="btn btn-success rounded" data-bs-toggle="modal" data-bs-target="#addModal"><i class="fa fa-plus"></i></a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <?php
                                $sql = "SELECT * FROM `woredas`";
                                if ($result = mysqli_query($conn, $sql)) :
                                    if (mysqli_num_rows($result) > 0) : ?>
                                        <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th>NAME</th>
                                                    <th>ADDRESS</th>
                                                    <th>ACTION</th>
                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <tr>
                                                    <th>NAME</th>
                                                    <th>ADDRESS</th>
                                                    <th>ACTION</th>
                                                </tr>
                                            </tfoot>
                                            <tbody>
                                                <?php while ($fetch = mysqli_fetch_array($result)) : ?>
                                                    <tr>
                                                        <td class="py-1"><?php echo $fetch['name']; ?></td>
                                                        <td class="py-1"><?php echo $fetch['address']; ?></td>
                                                        <td class="py-1 d-flex">
                                                            <a class="btn btn-success btn-sm mr-1" href="#" data-tooltip="tooltip" title="Edit Woreda" data-bs-toggle="modal" data-bs-target="#editModal<?php echo $fetch['id']; ?>"><i class="fas fa-edit"></i></a>
                                                            <a class="btn btn-danger btn-sm" href="#" data-tooltip="tooltip" title="Delete Woreda" data-bs-toggle="modal" data-bs-target="#deleteModal<?php echo $fetch['id']; ?>"><i class="fas fa-times"></i></a>
                                                            <?php include('inc/woredas.php'); ?>
                                                        </td>
                                                    </tr>
                                                
                                                <?php endwhile; ?>
                                            </tbody>
                                        </table>
                                <?php
                                        mysqli_free_result($result);
                                    else :
                                        echo "No records matching your query were found.";
                                    endif;
                                else :
                                    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
                                endif;
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- End of Main Content -->


    <?php include('footer.php'); ?>

    <!-- add maintanance Modal-->
    <div class="modal fade" id="addMTModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form accept-charset="UTF-8" method="POST" class="form-inline" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                    <div class="modal-header">
                        <h3 class="modal-title">አዲስ የጥገና መረጃ</h3>
                    </div>
                    <div class="modal-body">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-map-marker"></i></span>
                            </div>
                            <select name="woreda" class="form-control" required>
                                <option value="" selected disabled>ወረዳ</option>
                                <?php foreach ($woredas = mysqli_query($conn, "SELECT * FROM woredas") as $woreda) : ?>
                                    <option value="<?= $woreda['id']; ?>"><?= $woreda['name']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                            </div>
                            <?php
                            $years = date('Y') - 9;
                            $yeare = $years + 9;
                            $months = date('F');
                            ?>
                            <select name="year" class="form-select">
                                <option value="" selected disabled>በጀት ዓመት</option>
                                <?php for ($ys = $years; $ys <= $yeare; $ys++) { ?>
                                    <option value="<?= $ys; ?>"><?= $ys; ?> ዓ.ም</option>
                                <?php  } ?>
                            </select>
                            <select name="month" class="form-select" required>
                                <option value="" selected disabled>ወር</option>
                                <option value="ሐምሌ">ሐምሌ</option>
                                <option value="ነሃሴ">ነሃሴ</option>
                                <option value="መስከረም">መስከረም</option>
                                <option value="ጥቅምት">ጥቅምት</option>
                                <option value="ሕዳር">ሕዳር</option>
                                <option value="ታሕሳስ">ታህሳስ</option>
                                <option value="ጥር">ጥር</option>
                                <option value="የካቲት">የካቲት</option>
                                <option value="መጋቢት">መጋቢት</option>
                                <option value="ሚያዚያ">ሚያዚያ</option>
                                <option value="ግንቦት">ግንቦት</option>
                                <option value="ሰኔ">ሰኔ</option>
                            </select>
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fa fa-desktop"></i>
                                </span>
                            </div>
                            <input type="number" name="desktop" value="" title="ደስክቶፕ" class="form-control" placeholder="ደስክቶፕ ብዛት">
                            <input type="number" name="laptop" value="" title="ላፕቶፕ" class="form-control" placeholder="ላፕቶፕ ብዛት">
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fas fa-print"></i>
                                </span>
                            </div>
                            <input type="number" name="printer" class="form-control" title="ፕሪንተር" value="" placeholder="ፕሪንተር ብዛት">
                            <input type="number" name="photocopier" class="form-control" title="ፎቶኮፒ" value="" placeholder="ፎቶኮፒ ብዛት">
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fas fa-fax"></i>
                                </span>
                            </div>
                            <input type="number" name="fax" class="form-control" title="ፋክስ" value="" placeholder="ፋክስ ብዛት">
                            <input type="number" name="scanner" class="form-control" title="ስካነር" value="" placeholder="ስካነር ብዛት">
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fas fa-cogs"></i>
                                </span>
                            </div>
                            <input type="number" name="switch" class="form-control" title="ስዊችና ኔትወርክ" value="" placeholder="ስዊች ብዛት">
                            <input type="number" name="projector" class="form-control" title="ፕሮጀክተር" value="" placeholder="ፕሮጀክተር ብዛት">
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fas fa-cash-register"></i>
                                </span>
                            </div>
                            <input type="number" name="server" class="form-control" title="ሰርቨር" value="" placeholder="ሰርቨር ብዛት">

                        </div>
                    </div>
                    <!-- <div style="clear:both;"></div> -->
                    <div class="modal-footer">
                        <button name="add_maintenance" class="btn btn-primary"><span class="fa fa-check"></span>
                            መዝግብ</button>
                        <button class="btn btn-secondary" type="button" data-bs-dismiss="modal"><span class="fa fa-close"></span> ዝጋ</button>
                    </div>
            </div>
            </form>
        </div>
    </div>

    <div class="modal fade" id="addWebModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form accept-charset="UTF-8" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                    <div class="modal-header">
                        <h3 class="modal-title">አዲስ የድረገፅ መረጃ መመዝገቢያ</h3>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"><i class="fas fa-times"></i></button>
                    </div>
                    <div class="modal-body">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fas fa-map-marker"></i>
                                </span>
                            </div>
                            <select name="woreda" class="form-control" required>
                                <option value="" selected disabled>ወረዳ</option>
                                <?php foreach ($woredas = mysqli_query($conn, "SELECT * FROM woredas") as $woreda) : ?>
                                    <option value="<?= $woreda['id'] ?>"><?= $woreda['name']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                            </div>
                            <?php
                            $years = date('Y') - 9;
                            $yeare = $years + 9;
                            $months = date('F');
                            ?>
                            <select name="year" class="form-control">
                                <option value="" selected disabled>በጀት ዓመት</option>
                                <?php for ($ys = $years; $ys <= $yeare; $ys++) { ?>
                                    <option value="<?= $ys; ?>"><?= $ys; ?> ዓ.ም</option>
                                <?php  } ?>
                            </select>
                            <select name="month" class="form-control" required>
                                <option value="" selected disabled>ወር</option>
                                <option value="ሐምሌ">ሐምሌ</option>
                                <option value="ነሃሴ">ነሃሴ</option>
                                <option value="መስከረም">መስከረም</option>
                                <option value="ጥቅምት">ጥቅምት</option>
                                <option value="ሕዳር">ሕዳር</option>
                                <option value="ታሕሳስ">ታህሳስ</option>
                                <option value="ጥር">ጥር</option>
                                <option value="የካቲት">የካቲት</option>
                                <option value="መጋቢት">መጋቢት</option>
                                <option value="ሚያዚያ">ሚያዚያ</option>
                                <option value="ግንቦት">ግንቦት</option>
                                <option value="ሰኔ">ሰኔ</option>
                            </select>
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fas fa-power-off"></i>
                                </span>
                            </div>
                            <select name="status" class="form-control">
                                <option value="" selected disabled>ያለበት ሁኔታ</option>
                                <?php foreach ($sts = mysqli_query($conn, "SELECT * FROM web_status") as $st) : ?>
                                    <option value="<?= $st['wsid'] ?>"><?= $st['name']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><small>123</small></span>
                            </div>
                            <input type="number" name="count" class="form-control" value="">
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fas fa-link"></i>
                                </span>
                            </div>
                            <input type="url" name="url" class="form-control" value="" placeholder="Website address">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button name="add_website" class="btn btn-primary"><span class="fa fa-check"></span>
                            መዝግብ</button>
                        <button class="btn btn-secondary" type="button" data-bs-dismiss="modal"><span class="fa fa-times-circle"></span> ዝጋ</button>
                    </div>
                </form>
            </div>
        </div>
    </div>