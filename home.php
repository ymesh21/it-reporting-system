<?php
// Initialize the session
session_start();
// Check if the user is logged in, if not then redirect him to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: index.php");
    exit;
}

include('config.php');
$name = $name_err = '';
$id = $_SESSION['id'];
$woreda = $_SESSION['woreda'];
$page = 'home';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //Civil service
    if (isset($_POST['add_civil_srvice'])) {
        $oemps = $_POST['oemps'];
        $dteams = $_POST['dteams'];
        $dtdiscussion = $_POST['dtdiscussion'];
        $learning = $_POST['learning'];
        $bscplan = $_POST['bscplan'];
        $bscresult = $_POST['bscresult'];
        $highscorers = $_POST['highscorers'];
        $year = $_POST['year'];
        $month = $_POST['month'];

        mysqli_query($conn, "INSERT INTO `civilservice`(woreda, oemps,dteams,dtdiscussion,learning,bscplan, bscresult, highscorers, year,month) 
        VALUES($woreda, $oemps, $dteams, $dtdiscussion, $learning, $bscplan, $bscresult, $highscorers, $year,'$month')") or die(mysqli_error($conn));
        header("location: home.php?page=Civilservice");
    }
    if (isset($_POST['update_civil_srvice'])) {
        $id = $_POST['id'];
        $oemps = $_POST['oemps'];
        $dteams = $_POST['dteams'];
        $dtdiscussion = $_POST['dtdiscussion'];
        $learning = $_POST['learning'];
        $bscplan = $_POST['bscplan'];
        $bscresult = $_POST['bscresult'];
        $highscorers = $_POST['highscorers'];
        $year = $_POST['year'];
        $month = $_POST['month'];

        mysqli_query($conn, "UPDATE `civilservice` SET oemps='$oemps',
        dteams='$dteams',
        dtdiscussion='$dtdiscussion',
        learning='$learning',
        bscplan='$bscplan',
        bscresult='$bscresult',
        highscorers='$highscorers',
        year=$year,
        month='$month' 
        WHERE cvid = '$id'") or die(mysqli_error($conn));
        header("location: home.php?page=Civilservice");
    }
    if (isset($_POST['delete_civil_srvice'])) {
        $id = $_POST['id'];

        mysqli_query($conn, "DELETE FROM `civilservice` WHERE cvid = $id") or die(mysqli_error($conn));
        header("location: home.php?page=Civilservice");
    }

    // Trainings
    if (isset($_POST['add_trainee'])) {
        // Validate name
        $input_name = trim($_POST["fullname"]);
        if (empty($input_name)) {
            $name_err = "Please enter Full Name.";
        } elseif (!filter_var($input_name, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => "/^[a-zA-Z\s]+$/")))) {
            $name_err = "Please enter a valid name.";
        } else {
            $name = $input_name;
        }
        $name = $_POST['fullname'];
        $sex = $_POST['sex'];
        $category = $_POST['category'];
        $type = $_POST['type'];
        $office = $_POST['office'];
        $year = $_POST['year'];
        $month = $_POST['month'];
        if (empty($name_err)) {
            mysqli_query($conn, "INSERT INTO `trainings`(woreda, fullname,sex,category,type,office,year,month) 
        VALUES('$woreda', '$name', '$sex', '$category', '$type', '$office', $year,'$month')") or die(mysqli_error($conn));
        }
        header("location: home.php?page=Training");
    }
    if (isset($_POST['Update_trainee'])) {
        $id = $_POST['id'];
        $fullname = $_POST['fullname'];
        $sex = $_POST['sex'];
        $category = $_POST['category'];
        $type = $_POST['type'];
        $office = $_POST['office'];
        $year = $_POST['year'];
        $month = $_POST['month'];

        mysqli_query($conn, "UPDATE `trainings` SET fullname='$fullname',
    sex='$sex',
    category='$category',
    type='$type',
    office='$office',
    year=$year,
    month='$month' 
    WHERE trainings.id = '$id'") or die(mysqli_error($conn));
        header("location: home.php?page=Training");
    }
    if (isset($_POST['delete_trainee'])) {
        $id = $_POST['id'];

        mysqli_query($conn, "DELETE FROM `trainings` WHERE trainings.id = $id") or die(mysqli_error($conn));
        header("location: home.php?page=Training");
    }

    if (isset($_POST['add_maintenance'])) {
        $desktop = $_POST['desktop'];
        $printer = $_POST['printer'];
        $laptop = $_POST['laptop'];
        $photocopier = $_POST['photocopier'];
        $fax = $_POST['fax'];
        $scanner = $_POST['scanner'];
        $switch = $_POST['switch'];
        $projector = $_POST['projector'];
        $server = $_POST['server'];
        $$year = $_POST['year'];
        $month = $_POST['month'];

        $price = 400 * (intval($desktop) + intval($laptop) + intval($fax) + intval($scanner) + intval($projector) + intval($server)) + 600 * (intval($printer) + intval($photocopier)) + 100 * intval($switch);

        mysqli_query($conn, "INSERT INTO `maintenances` (
            `woreda`, `desktop`, `printer`, `laptop`, `photocopier`, `fax`,`scanner`, 
            `switch`, `projector`, `server`, `price`, `year`, `month`) 
        VALUES(
            '$woreda', '$desktop', '$printer', '$laptop', '$photocopier', '$fax', '$scanner', 
            '$switch', '$projector', '$server', '$price', '$year', '$month')") or die(mysqli_error($conn));

        header("location: home.php?page=Maintenance");
    }
    if (isset($_POST['update_maintenance'])) {
        $id = $_POST['id'];
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

        mysqli_query($conn, "UPDATE `maintenances` SET `desktop` = '$desktop', 
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

        header("location: home.php?page=Maintenance");
    }
    if (isset($_POST['delete_maintenance'])) {
        $id = $_POST['id'];

        mysqli_query($conn, "DELETE FROM `maintenances` WHERE `id` = '$id'") or die(mysqli_error($conn));

        header("location: home.php?page=Maintenance");
    }
    // Woredanet
    if (isset($_POST['add_woredanet'])) {
        $lanip = $_POST['lanip'];
        $wanip = $_POST['wanip'];
        $srvno = $_POST['srvno'];
        $status = $_POST['status'];
        $rep = $_POST['rep'];

        mysqli_query($conn, "INSERT INTO woredanet(woreda, lanip, wanip, srvno, status, rep) VALUES('$woreda', '$lanip', '$wanip', '$srvno', '$status', '$rep')");
        header("location: home.php?page=WoredaNet");
    }
    if (isset($_POST['update_woredanet'])) {
        $id = $_POST['id'];
        $lanip = $_POST['lanip'];
        $wanip = $_POST['wanip'];
        $srvno = $_POST['srvno'];
        $status = $_POST['status'];
        $rep = $_POST['rep'];

        if (mysqli_query($conn, "UPDATE woredanet SET lanip = '$lanip', wanip = '$wanip', srvno = '$srvno', status = '$status', rep = '$rep' WHERE wnid = '$id'")) {
            header("location: home.php?page=WoredaNet");
        } else {
            echo 'Error' . mysqli_error($conn);
        }
    }
    if (isset($_POST['delete_woredanet'])) {
        $id = $_POST['id'];

        mysqli_query($conn, "DELETE FROM woredanet WHERE wnid = $id");
        header("location: home.php?page=WoredaNet#vc");
    }
    // Video conference
    if (isset($_POST['add_VC'])) {
        $vmale = $_POST['vmale'];
        $vfemale = $_POST['vfemale'];
        $imale = $_POST['imale'];
        $ifemale = $_POST['ifemale'];
        $price = $_POST['price'];
        $year = $_POST['year'];
        $month = $_POST['month'];

        if (mysqli_query($conn, "INSERT INTO vcs(vcs.woreda, vmale, vfemale, imale, ifemale, price, year, month) VALUES('$woreda', '$vmale', '$vfemale', '$imale', '$ifemale', '$price', '$year', '$month')")) {
            header("location: home.php?page=WoredaNet#vc");
        } else {
            echo 'Error! ' . mysqli_error($conn);
        }
    }
    if (isset($_POST['update_VC'])) {
        $id = $_POST['id'];
        $vmale = $_POST['vmale'];
        $vfemale = $_POST['vfemale'];
        $imale = $_POST['imale'];
        $ifemale = $_POST['ifemale'];
        $price = $_POST['price'];
        $year = $_POST['year'];
        $month = $_POST['month'];

        if (mysqli_query($conn, "UPDATE vcs SET vmale = '$vmale', vfemale = '$vfemale', imale = '$imale', ifemale = '$ifemale', price = '$price', year = '$year', month = '$month' WHERE vcid = '$id'")) {
            header("location: home.php?page=WoredaNet");
        } else {
            echo 'Error' . mysqli_error($conn);
        }
    }
    if (isset($_POST['delete_VC'])) {
        $id = $_POST['id'];

        mysqli_query($conn, "DELETE FROM vcs WHERE vcid = $id");
        header("location: home.php?page=WoredaNet#vc");
    }

    // Apps
    if (isset($_POST['add_app'])) {
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

        mysqli_query($conn, "INSERT INTO `apps`(`woreda`,`ccms`,`ibex`,`payroll`,
        `pass`,`trls`,`mis`,`icsmis`,`sigtas`,`omas`,`pads`,`isla`,`others`, year,month) 
        VALUES('$woreda', '$ccms', '$ibex','$payroll', '$pass', '$trls','$mis', '$icsmis',
         '$sigtas','$omas','$pads','$isla', '$others', $year,'$month')") or die(mysqli_error($conn));
        echo $month;
        header("location: home.php?page=Apps");
    }
    if (isset($_POST['update_app'])) {
        $id = $_POST['id'];
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

        header("location: home.php?page=Apps");
    }
    if (isset($_POST['delete_app'])) {
        $id = $_POST['id'];

        mysqli_query($conn, "DELETE FROM `apps` WHERE `id` = '$id'") or die(mysqli_error($conn));

        header("location: home.php?page=Apps");
    }
    // Open Sources
    if (isset($_POST['add_open'])) {
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
        header("location: home.php?page=Opens");
    }
    if (isset($_POST['update_open'])) {
        $id = $_POST['id'];
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
        `ams` = '$ams', `ipm` = '$ipm',`teamv` = '$teamv',`jaws` = '$jaws',`faxaw` = '$faxaw', `simu` = '$simu', 
        `dms` = '$dms', `bsca` = '$bsca',`arkdb` = '$arkdb', `ebcd` = '$ebcd',`others` = '$others', `year` = '$year', `month` = '$month' 
        WHERE `id` = '$id'") or die(mysqli_error($conn));

        header("location: home.php?page=Opens");
    }
    if (isset($_POST['delete_open'])) {
        $id = $_POST['id'];

        mysqli_query($conn, "DELETE FROM `open_sources` WHERE `id` = '$id'") or die(mysqli_error($conn));

        header("location: home.php?page=Opens");
    }
    // Websites
    if (isset($_POST['add_website'])) {
        $status = $_POST['status'];
        $url = $_POST['url'];
        $count = $_POST['count'];
        $year = $_POST['year'];
        $month = $_POST['month'];

        mysqli_query($conn, "INSERT INTO `websites`(`woreda`, `status`, `url`, `count`,`year`,`month`) 
        VALUES('$woreda', '$status', '$url', '$count', $year,'$month')") or die(mysqli_error($conn));
        header("location: home.php?page=Websites");
    }
    if (isset($_POST['update_website'])) {
        $id = $_POST['id'];
        $status = $_POST['status'];
        $url = $_POST['url'];
        $count = $_POST['count'];

        mysqli_query($conn, "UPDATE `websites` SET `status` = '$status', 
        `url` = '$url',
        `count` = '$count'
        WHERE `id` = '$id'") or die(mysqli_error($conn));

        header("location: home.php?page=Websites");
    }
    if (isset($_POST['delete_website'])) {
        $id = $_POST['id'];

        mysqli_query($conn, "DELETE FROM `websites` WHERE `id` = '$id'") or die(mysqli_error($conn));

        header("location: home.php?page=Websites");
    }
    // Problems
    if (isset($_POST['add_problem'])) {
        $subject = $_POST['subject'];
        $ptext = $_POST['ptext'];
        $year = $_POST['year'];
        $month = $_POST['month'];

        mysqli_query($conn, "INSERT INTO `problems`(`woreda`, `subject`, `ptext`,`year`,`month`) 
        VALUES('$woreda', '$subject', '$ptext', $year,'$month')") or die(mysqli_error($conn));
        header("location: home.php?page=Problems");
    }
    if (isset($_POST['update_problem'])) {
        $id = $_POST['id'];
        $subject = $_POST['subject'];
        $ptext = $_POST['ptext'];
        $year = $_POST['year'];
        $month = $_POST['month'];

        mysqli_query($conn, "UPDATE `problems` SET `subject` = '$subject', `ptext` = '$ptext'
        WHERE `pid` = '$id'") or die(mysqli_error($conn));

        header("location: home.php?page=Problems");
    }
    if (isset($_POST['delete_problem'])) {
        $id = $_POST['id'];

        mysqli_query($conn, "DELETE FROM `problems` WHERE `pid` = '$id'") or die(mysqli_error($conn));

        header("location: home.php?page=Problems");
    }
    // community centers
    if (isset($_POST['add_ccenter'])) {
        $name = $_POST['name'];
        $area = $_POST['area'];
        $level = $_POST['level'];
        $organizedyear = $_POST['organizedyear'];
        $organizedby = $_POST['organizedby'];
        $status = $_POST['status'];

        mysqli_query($conn, "INSERT INTO `ccenters`(`woreda`, `name`, `area`,`level`,`organizedyear`, `organizedby`, `status`) 
        VALUES('$woreda', '$name', '$area', '$level','$organizedyear', '$organizedby', '$status')") or die(mysqli_error($conn));
        header("location: home.php?page=CCenters");
    }
    if (isset($_POST['update_ccenter'])) {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $area = $_POST['area'];
        $level = $_POST['level'];
        $organizedyear = $_POST['organizedyear'];
        $organizedby = $_POST['organizedby'];
        $status = $_POST['status'];

        mysqli_query($conn, "UPDATE `ccenters` SET `name` = '$name', `area` = '$area', `level` = '$level', `organizedyear` = '$organizedyear', `organizedby` = '$organizedby', `status` = '$status'
        WHERE `id` = '$id'") or die(mysqli_error($conn));

        header("location: home.php?page=CCenters");
    }
    if (isset($_POST['delete_ccenter'])) {
        $id = $_POST['id'];

        mysqli_query($conn, "DELETE FROM `ccenters` WHERE `id` = '$id'") or die(mysqli_error($conn));

        header("location: home.php?page=CCenters");
    }
    // community center services
    if (isset($_POST['add_cservice'])) {
        $ccenter = $_POST['ccenter'];
        $empym = $_POST['empym'];
        $empyf = $_POST['empyf'];
        $empom = $_POST['empom'];
        $empof = $_POST['empof'];

        $iusersym = $_POST['iusersym'];
        $iusersyf = $_POST['iusersyf'];
        $iusersom = $_POST['iusersom'];
        $iusersof = $_POST['iusersof'];

        $bmembym = $_POST['bmembym'];
        $bmembyf = $_POST['bmembyf'];
        $bmembom = $_POST['bmembom'];
        $bmembof = $_POST['bmembof'];
        $capital = $_POST['capital'];

        mysqli_query($conn, "INSERT INTO `cservices`(`ccenter`, `empym`, `empyf`, `empom`, `empof`, `iusersym`, `iusersyf`, `iusersom`, `iusersof`, `bmembym`, `bmembyf`, `bmembom`, `bmembof`, `capital`) 
        VALUES('$ccenter', '$empym', '$empyf', '$empom', '$empof', '$iusersym', '$iusersyf',  '$iusersom', '$iusersof', '$bmembym', '$bmembyf', '$bmembom', '$bmembof', '$capital')") or die(mysqli_error($conn));
        header("location: home.php?page=CCenters");
    }
    if (isset($_POST['update_cservice'])) {
        $id = $_POST['id'];
        $empym = $_POST['empym'];
        $empyf = $_POST['empyf'];
        $empom = $_POST['empom'];
        $empof = $_POST['empof'];

        $iusersym = $_POST['iusersym'];
        $iusersyf = $_POST['iusersyf'];
        $iusersom = $_POST['iusersom'];
        $iusersof = $_POST['iusersof'];

        $bmembym = $_POST['bmembym'];
        $bmembyf = $_POST['bmembyf'];
        $bmembom = $_POST['bmembom'];
        $bmembof = $_POST['bmembof'];
        $capital = $_POST['capital'];

        mysqli_query($conn, "UPDATE `cservices` SET `empym` = '$empym', `empyf` = '$empyf', `empom` = '$empom', `empof` = '$empof', `iusersym` = '$iusersym', `iusersyf` = '$iusersyf', `iusersom` = '$iusersom', `iusersof` = '$iusersof', `bmembym` = '$bmembym', `bmembyf` = '$bmembyf', `bmembom` = '$bmembom', `bmembof` = '$bmembof', `capital` = '$capital'
        WHERE `id` = '$id'") or die(mysqli_error($conn));

        header("location: home.php?page=CCenters");
    }
    if (isset($_POST['delete_cservice'])) {
        $id = $_POST['id'];

        mysqli_query($conn, "DELETE FROM `cservices` WHERE `id` = '$id'") or die(mysqli_error($conn));

        header("location: home.php?page=CCenters");
    }
    if (isset($_POST['add_tcenter'])) {
        $amount = $_POST['amount'];
        $pcs = $_POST['pcs'];
        $efacility = $_POST['efacility'];
        $ifacility = $_POST['ifacility'];

        if (mysqli_query($conn, "INSERT INTO tcenters(woreda, amount, pcs, efacility, ifacility) VALUES('$woreda', '$amount', '$pcs', '$efacility', '$ifacility')")) {
            header('location: home.php?page=Tcenters');
        }
    }
    if (isset($_POST['update_tcenter'])) {
        $id = $_POST['id'];
        $amount = $_POST['amount'];
        $pcs = $_POST['pcs'];
        $efacility = $_POST['efacility'];
        $ifacility = $_POST['ifacility'];

        if (mysqli_query($conn, "UPDATE tcenters SET amount = '$amount', pcs = '$pcs', efacility = '$efacility', ifacility = '$ifacility'")) {
            header('location: home.php?page=Tcenters');
        }
    }
    if (isset($_POST['delete_tcenter'])) {
        $id = $_POST['id'];
        $amount = $_POST['amount'];
        $pcs = $_POST['pcs'];
        $efacility = $_POST['efacility'];
        $ifacility = $_POST['ifacility'];

        if (mysqli_query($conn, "DELETE FROM tcenters WHERE id = '$id'")) {
            header('location: home.php?page=Tcenters');
        }
    }
    // Computer Literacy
    if (isset($_POST['add_cliteracy'])) {
        $empsm = $_POST['empsm'];
        $empsf = $_POST['empsf'];
        $literatem = $_POST['literatem'];
        $literatef = $_POST['literatef'];
        $iliteratem = $_POST['iliteratem'];
        $iliteratef = $_POST['iliteratef'];
        $year = $_POST['year'];
        $month = $_POST['month'];

        if (mysqli_query($conn, "INSERT INTO cliteracy(woreda, empsm, empsf, literatem, literatef, iliteratem, iliteratef, year, month) VALUES('$woreda','$empsm','$empsf', '$literatem', '$literatef', '$iliteratem', '$iliteratef', '$year', '$month')")) {
            header('location: home.php?page=CLiteracy');
        }
    }
    if (isset($_POST['update_cliteracy'])) {
        $id = $_POST['id'];
        $empsm = $_POST['empsm'];
        $empsf = $_POST['empsf'];
        $literatem = $_POST['literatem'];
        $literatef = $_POST['literatef'];
        $iliteratem = $_POST['iliteratem'];
        $iliteratef = $_POST['iliteratef'];
        $year = $_POST['year'];
        $month = $_POST['month'];

        if (mysqli_query($conn, "UPDATE cliteracy SET empsM = '$empsm', empsF = '$empsf', literateM = '$literatem', literateF = '$literatef', iliterateM = '$iliteratem', iliterateF = '$iliteratef', year = '$year', month = '$month' WHERE id = '$id'")) {
            header('location: home.php?page=CLiteracy');
        }
    }
    if (isset($_POST['delete_cliteracy'])) {
        $id = $_POST['id'];
        if (mysqli_query($conn, "DELETE FROM cliteracy WHERE id = '$id'")) {
            header('location: home.php?page=CLiteracy');
        }
    }
    // Computerncy and Trade License
    if (isset($_POST['add_competency'])) {
        $newCompetency = $_POST['newCompetency'];
        $renewalCompetency = $_POST['renewalCompetency'];
        $newTradeLicense = $_POST['newTradeLicense'];
        $renewalTradeLicense = $_POST['renewalTradeLicense'];
        $newMoney = $_POST['newMoney'];
        $renewalMoney = $_POST['renewalMoney'];
        $year = $_POST['year'];
        $month = $_POST['month'];

        if (mysqli_query($conn, "INSERT INTO complicense(woreda, newCompetency, renewalCompetency, newTradeLicense, renewalTradeLicense, newMoney, renewalMoney, year, month) VALUES('$woreda','$newCompetency','$renewalCompetency', '$newTradeLicense', '$renewalTradeLicense', '$newMoney', '$renewalMoney', '$year', '$month')")) {
            header('location: home.php?page=Competency');
        }
    }
    if (isset($_POST['update_competency'])) {
        $id = $_POST['id'];
        $newCompetency = $_POST['newCompetency'];
        $renewalCompetency = $_POST['renewalCompetency'];
        $newTradeLicense = $_POST['newTradeLicense'];
        $renewalTradeLicense = $_POST['renewalTradeLicense'];
        $newMoney = $_POST['newMoney'];
        $renewalMoney = $_POST['renewalMoney'];
        $year = $_POST['year'];
        $month = $_POST['month'];

        if (mysqli_query($conn, "UPDATE complicense SET newCompetency = '$newCompetency', renewalCompetency = '$renewalCompetency', newTradeLicense = '$newTradeLicense', renewalTradeLicense = '$renewalTradeLicense', newMoney = '$newMoney', renewalMoney = '$renewalMoney', year = '$year', month = '$month' WHERE comp_id = '$id'")) {
            header('location: home.php?page=Competency');
        }
    }
    if (isset($_POST['delete_competency'])) {
        $id = $_POST['id'];
        if (mysqli_query($conn, "DELETE FROM complicense WHERE comp_id = '$id'")) {
            header('location: home.php?page=Competency');
        }
    }
}
$page = pathinfo(__FILE__, PATHINFO_FILENAME);
include('inc/header.php'); ?>

<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">
    <!-- Main Content -->
    <div id="content">
        <?php
        include('inc/apps_calc.php');
        include('inc/maintenances_calc.php');
        include('inc/opensources_calc.php');

        ?>

        <?php require('inc/menu.php'); ?>
        <!-- Begin Page Content -->
        <div class="container-fluid">
            <!-- Page Heading -->
            <?php if (isset($_GET['page']) && $_GET['page'] === 'Competency') :  ?>
                <h1 class="h3 mb-2 text-gray-800">የሙያ ብቃት ፍቃድና ዕድሳት</h1>
                <div class="row">
                    <div class="col-md-8">
                        <div class="card shadow mb-2">
                            <div class="card-header">
                                <h5 class="text-primary">የሙያ ብቃት ፍቃድና ዕድሳት መረጃ</h5>
                            </div>
                            <div class="card-body">
                                <?php
                                // $sql = "SELECT * FROM `trainings` WHERE woreda in(SELECT woreda FROM contacts WHERE id IN(SELECT contact_id FROM users WHERE id = $id));";
                                $sql = "SELECT * from complicense INNER JOIN woredas  ON woreda = woredas.id WHERE woreda = $woreda";
                                if ($result = mysqli_query($conn, $sql)) :
                                    if (mysqli_num_rows($result) > 0) : ?>
                                        <div class="table-responsive">
                                            <table class="table table-bordered" id="dataTable">
                                                <thead>
                                                    <tr>
                                                        <th rowspan="2">ወር</th>
                                                        <th scope="col" colspan="2">ሙያ ብቃት ማረጋገጫ ብዛት</th>
                                                        <th scope="col" colspan="2">ንግድ ፈቃድና ዕድሳት ብዛት</th>
                                                        <th scope="col" colspan="3">ከንግድ ፈቃድና ዕድሳት የተሰበሰበ ገንዘብ መጠን</th>
                                                        <th scope="col" rowspan="2">Action</th>
                                                    </tr>
                                                    <tr>
                                                        <td>አዲስ</td>
                                                        <td>ዕድሳት</td>
                                                        <td>አዲስ</td>
                                                        <td>ዕድሳት</td>
                                                        <td>አዲስ</td>
                                                        <td>ዕድሳት</td>
                                                        <td>ድምር</td>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php while ($fetch = mysqli_fetch_array($result)) : ?>
                                                        <tr>
                                                            <th class="py-1" scope="row"><?= $fetch['month']; ?></th>
                                                            <td class="py-1"><?= $fetch['newCompetency']; ?></td>
                                                            <td class="py-1"><?= $fetch['renewalCompetency']; ?></td>
                                                            <td class="py-1"><?= $fetch['newTradeLicense']; ?></td>
                                                            <td class="py-1"><?= $fetch['renewalTradeLicense']; ?></td>
                                                            <td class="py-1"><?= $fetch['newMoney']; ?></td>
                                                            <td class="py-1"><?= $fetch['renewalMoney']; ?></td>
                                                            <td class="py-1"><?= $fetch['newMoney'] + $fetch['renewalMoney']; ?></td>
                                                            <td class="py-1">
                                                                <div class="btn-group">
                                                                    <a href="#" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#vieCMPwModal<?= $fetch['id']; ?>" data-tooltip="tooltip" title="View Record"><i class="fa fa-eye"></i></a>
                                                                    <a href="#" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#editCMPModal<?= $fetch['id']; ?>" data-tooltip="tooltip" title="Edit Record"><i class="fa fa-edit"></i></a>
                                                                    <a href="#" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteCMPModal<?= $fetch['id']; ?>" data-tooltip="tooltip" title="Delete Record"><i class="fa fa-times"></i></a>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <?php include('inc/competency.php'); ?>
                                                    <?php endwhile; ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    <?php
                                    else : ?>
                                        <div class="alert alert-danger alert-dismissible fade show">
                                            <strong>Empty!</strong>የሙያ ብቃት ፍቃድና ዕድሳት መረጃ የለም
                                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                        </div>
                                <?php
                                        mysqli_free_result($result);
                                    endif;
                                else :
                                    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
                                endif;
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card shadow mb-2">

                            <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                                <div class="card-header">
                                    <h5 class="text-primary">የሙያ ብቃት ፍቃድና ዕድሳት መመዝገቢያ</h5>
                                </div>
                                <div class="card-body">

                                    <input type="hidden" name="woreda" value="<?= $woreda; ?>">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
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
                                        <input type="number" name="newCompetency" class="form-control" placeholder="አዲስ የሙያ ብቃት">
                                    </div>
                                    <div class="input-group mb-3">
                                        <input type="number" name="renewalCompetency" class="form-control" placeholder="የሙያ ብቃት ዕድሳት">
                                    </div>
                                    <div class="input-group mb-3">
                                        <input type="number" name="newTradeLicense" class="form-control" placeholder="አዲስ ንግድ ፍቃድ">
                                    </div>
                                    <div class="input-group mb-3">
                                        <input type="number" name="renewalTradeLicense" class="form-control" placeholder="የንግድ ፍቃድ ዕድሳት">
                                    </div>
                                    <div class="input-group mb-3">
                                        <input type="number" name="newMoney" class="form-control" placeholder="ከአዲስ ንግድ ፍቃድ የተገኘ ገንዘብ">
                                    </div>
                                    <div class="input-group mb-3">
                                        <input type="number" name="renewalMoney" class="form-control" placeholder="ከንግድ ዕድሳት የተገኝ ገንዘብ">
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button name="add_competency" class="btn btn-primary"><span class="fa fa-check"></span>መዝግብ</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            <?php elseif (isset($_GET['page']) && $_GET['page'] === 'Civilservice') :  ?>
                <h1 class="h3 mb-2 text-gray-800">ሲቪል ሰርቪስ አተገባበር</h1>
                <div class="row">
                    <div class="col-md-8">
                        <div class="card shadow mb-2">
                            <div class="card-header">
                                <h5 class="text-primary">የሲቪል ሰርቪስ አተገባበር መረጃ</h5>
                            </div>
                            <div class="card-body">
                                <?php
                                // $sql = "SELECT * FROM `trainings` WHERE woreda in(SELECT woreda FROM contacts WHERE id IN(SELECT contact_id FROM users WHERE id = $id));";
                                $sql = "SELECT *, civilservice.id AS cvid, woredas.name AS w_name from civilservice INNER JOIN woredas  ON woreda = woredas.id WHERE woreda = $woreda";
                                if ($result = mysqli_query($conn, $sql)) :
                                    if (mysqli_num_rows($result) > 0) : ?>
                                        <div class="table-responsive">
                                            <table class="table table-bordered" id="dataTable">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">የተደራጁ ሰራተኞች ብዛት</th>
                                                        <th scope="col">የልማት ቡድን ብዛት</th>
                                                        <th scope="col">እስከዚህ ወር የተደረገ የል/ቡድን ዉይይት ብዛት</th>
                                                        <th scope="col">የተደረገ መማማር ብዛት</th>
                                                        <th scope="col">የ6 ወር BSC ዉጤት ተኮር ዕቅድ የተሰጣቸዉ ባለሙያዎች ብዛት</th>
                                                        <th scope="col">የ6 ወር ዉጤት የተሞላላቸዉ ባለሙያዎች ብዛት</th>
                                                        <th scope="col">በ6ወር ከፍተኛ አፈጻጸም ያስመዘገቡ ባለሙያዎች ብዛት</th>
                                                        <th scope="col">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php while ($fetch = mysqli_fetch_array($result)) : ?>
                                                        <tr>
                                                            <td class="py-1"><?= $fetch['oemps']; ?></td>
                                                            <td class="py-1"><?= $fetch['dteams']; ?></td>
                                                            <td class="py-1"><?= $fetch['dtdiscussion']; ?></td>
                                                            <td class="py-1"><?= $fetch['learning']; ?></td>
                                                            <td class="py-1"><?= $fetch['bscplan']; ?></td>
                                                            <td class="py-1"><?= $fetch['bscresult']; ?></td>
                                                            <td class="py-1"><?= $fetch['highscorers']; ?></td>
                                                            <td class="py-1">
                                                                <div class="btn-group">
                                                                    <a href="#" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#viewModal<?= $fetch['cvid']; ?>" data-tooltip="tooltip" title="View Trainee"><i class="fa fa-eye"></i></a>
                                                                    <a href="#" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#editModal<?= $fetch['cvid']; ?>" data-tooltip="tooltip" title="Edit Trainee"><i class="fa fa-edit"></i></a>
                                                                    <a href="#" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal<?= $fetch['cvid']; ?>" data-tooltip="tooltip" title="Delete Trainee"><i class="fa fa-times"></i></a>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <?php include('inc/civilservices.php'); ?>
                                                    <?php endwhile; ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    <?php
                                    else : ?>
                                        <div class="alert alert-danger alert-dismissible fade show">
                                            <strong>Empty!</strong> የተመዘገበ የሲቪል ሰርቪስ አተገባበር መረጃ የለም
                                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                        </div>
                                <?php
                                        mysqli_free_result($result);
                                    endif;
                                else :
                                    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
                                endif;
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card shadow mb-2">

                            <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                                <div class="card-header">
                                    <h5 class="text-primary">አዲስ የሲቪል ሰርቪስ አተገባበር መመዝገቢያ</h5>
                                </div>
                                <div class="card-body">

                                    <input type="hidden" name="woreda" value="<?= $woreda; ?>">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
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
                                        <input type="number" name="oemps" class="form-control" placeholder="የተደራጁ ሰራተኞች ብዛት">
                                    </div>
                                    <div class="input-group mb-3">
                                        <input type="number" name="dteams" class="form-control" placeholder="የልማት ቡድን ብዛት">
                                    </div>
                                    <div class="input-group mb-3">
                                        <input type="number" name="dtdiscussion" class="form-control" placeholder="የል/ቡድን ዉይይት ብዛት (እስከዚህ ወር)">
                                    </div>
                                    <div class="input-group mb-3">
                                        <input type="number" name="learning" class="form-control" placeholder="በተመረጡ ርዕሶች ላይ የተደረገ መማማር ብዛት">
                                    </div>
                                    <div class="input-group mb-3">
                                        <input type="number" name="bscplan" class="form-control" placeholder="የ6 ወር BSC ዕቅድ የተሰጣቸዉ ባለሙያዎች ብዛት">
                                    </div>
                                    <div class="input-group mb-3">
                                        <input type="number" name="bscresult" class="form-control" placeholder="የ6 ወር BSC ውጤት የተሰጣቸዉ ባለሙያዎች ብዛት">
                                    </div>
                                    <div class="input-group mb-3">
                                        <input type="number" name="highscorers" class="form-control" placeholder="ከፍተኛ ውጤት ያስመዘገቡ ባለሙያዎች ብዛት">
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button name="add_civil_srvice" class="btn btn-primary"><span class="fa fa-check"></span>መዝግብ</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            <?php elseif (isset($_GET['page']) && $_GET['page'] === 'WoredaNet') :  ?>
                <h1 class="h3 mb-3 text-gray-800">የወረዳኔት መረጃ</h1>
                <div class="row">
                    <div class="col-lg-8">
                        <div class="card shadow mb-2">
                            <div class="card-header py-3">
                                <h5 class="text-primary">የወረዳኔት ዝርዝር መረጃ</h5>
                            </div>
                            <div class="card-body">
                                <?php
                                $sql = "SELECT *, woredanet.id AS wnid FROM ((woredanet INNER JOIN woredas ON woredanet.woreda = woredas.id) INNER JOIN contacts ON contacts.id = woredanet.rep) WHERE woredanet.woreda = $woreda";
                                if ($wns = mysqli_query($conn, $sql)) :
                                    if (mysqli_num_rows($wns) > 0) : ?>
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-striped" id="dataTable">
                                                <thead>
                                                    <tr>
                                                        <th>ወረዳ</th>
                                                        <th>LAN IP</th>
                                                        <th>WAN IP</th>
                                                        <th>ሰርቪስ ቁጥር</th>
                                                        <th>ያለበት ሁኔታ</th>
                                                        <th>ተወካይ</th>
                                                        <th></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach ($wns as $wn) : ?>
                                                        <tr>
                                                            <td><a href="#vc" class="btn-link"><?= $wn['name']; ?></a></td>
                                                            <td><?= $wn['lanip']; ?></td>
                                                            <td><?= $wn['wanip']; ?></td>
                                                            <td><?= $wn['srvno']; ?></td>
                                                            <td><?= $wn['status']; ?></td>
                                                            <td><a href="#" title="<?= $wn['phone']; ?>"><?= $wn['firstname']; ?></a></td>
                                                            <td class="btn-group py-1">
                                                                <a href="#viewWN<?= $wn['wnid']; ?>" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-tooltip="tooltip" title="View Record"><i class="fas fa-eye"></i></a>
                                                                <a href="#editWN<?= $wn['wnid']; ?>" class="btn btn-success btn-sm" data-bs-toggle="modal" data-tooltip="tooltip" title="Edit Record"><i class="fas fa-edit"></i></a>
                                                                <a href="#deleteWN<?= $wn['wnid']; ?>" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-tooltip="tooltip" title="Delete Record"><i class="fas fa-times"></i></a>
                                                            </td>
                                                        </tr>
                                                        <!-- Modal -->
                                                        <!-- View WoredaNet -->
                                                        <div class="modal fade" id="viewWN<?= $wn['wnid']; ?>" aria-hidden="true">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                                                                        <div class="modal-header border-primary">
                                                                            <h3 class="modal-title">የወረዳኔቱ ዝርዝር መረጃ</h3>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <p>ወረዳ፡ <span class="text-primary"><?= $wn['name']; ?></span></p>
                                                                            <p>LAN IP፡ <span class="text-primary"><?= $wn['lanip']; ?></span></p>
                                                                            <p>WAN IP፡ <span class="text-primary"><?= $wn['wanip']; ?></span></p>
                                                                            <p>ሰርቪስ ቁጥር፡ <span class="text-primary"><?= $wn['srvno']; ?></span></p>
                                                                            <p>ያለበት ሁኔታ፡ <span class="text-primary"><?= $wn['status']; ?></span></p>
                                                                            <p>ተወካይ፡ <span class="text-primary"><?= $wn['firstname']; ?> <?= $wn['lastname']; ?> (<?= $wn['phone']; ?>)</span></p>
                                                                        </div>
                                                                        <div class="modal-footer mt-0">
                                                                            <button class="btn btn-secondary" type="button" data-bs-dismiss="modal"><span class="fa fa-times"></span> Close</button>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <!-- Edit WoredaNet -->
                                                        <div class="modal fade" id="editWN<?= $wn['wnid']; ?>" aria-hidden="true">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                                                                        <div class="modal-header border-success">
                                                                            <h3 class="modal-title">የወረዳኔቱን መረጃ ማስተካከያ</h3>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <div class="input-group mb-3">
                                                                                <div class="input-group-prepend">
                                                                                    <span class="input-group-text">
                                                                                        <i class="fas fa-i"></i><i class="fas fa-p"></i>
                                                                                    </span>
                                                                                </div>
                                                                                <input type="text" name="lanip" class="form-control" value="<?= $wn['lanip']; ?>" placeholder="LAN IP {000.000.000.000}" pattern="[0-9]{1,3}.[0-9]{1,3}.[0-9]{1,3}.[0-9]{1,3}" required>
                                                                            </div>
                                                                            <div class="input-group mb-3">
                                                                                <div class="input-group-prepend">
                                                                                    <span class="input-group-text">
                                                                                        <i class="fas fa-i"></i><i class="fas fa-p"></i>
                                                                                    </span>
                                                                                </div>
                                                                                <input type="text" name="wanip" class="form-control" value="<?= $wn['wanip']; ?>" placeholder="WAN IP {000.000.000.000}" pattern="[0-9]{1,3}.[0-9]{1,3}.[0-9]{1,3}.[0-9]{1,3}" required>
                                                                            </div>
                                                                            <div class="input-group mb-3">
                                                                                <div class="input-group-prepend">
                                                                                    <span class="input-group-text">
                                                                                        <i class="fa-solid fa-1"></i> <i class="fa-solid fa-2"></i> <i class="fa-solid fa-3"></i>
                                                                                    </span>
                                                                                </div>
                                                                                <input type="number" name="srvno" class="form-control" value="<?= $wn['srvno']; ?>" placeholder="Service number" pattern="[0-9]{5,12}" required>
                                                                            </div>
                                                                            <div class="mb-3">
                                                                                <div class="custom-control custom-radio custom-control-inline">
                                                                                    <input type="radio" class="custom-control-input" id="active" name="status" value="የሚሰራ" <?php if ($wn['status'] == "የሚሰራ") {
                                                                                                                                                                                echo "checked";
                                                                                                                                                                            } ?>>
                                                                                    <label class="custom-control-label" for="active">የሚሰራ</label>
                                                                                </div>
                                                                                <div class="custom-control custom-radio custom-control-inline">
                                                                                    <input type="radio" class="custom-control-input" id="inactive" name="status" value="የማይሰራ" <?php if ($wn['status'] == "የማይሰራ") {
                                                                                                                                                                                    echo "checked";
                                                                                                                                                                                } ?>>
                                                                                    <label class="custom-control-label" for="inactive">የማይሰራ</label>
                                                                                </div>
                                                                            </div>
                                                                            <div class="input-group mb-3">
                                                                                <div class="input-group-prepend">
                                                                                    <span class="input-group-text">
                                                                                        <i class="fas fa-user"></i>
                                                                                    </span>
                                                                                </div>
                                                                                <select name="rep" class="form-select" required>
                                                                                    <option value="" selected disabled>ተወካይ</option>
                                                                                    <?php
                                                                                    $sql = $conn->query("SELECT contacts.id AS coid, firstname, lastname FROM contacts WHERE woreda in(SELECT woreda FROM contacts WHERE contacts.id = $id);") or die(mysqli_error($conn));
                                                                                    while ($row = $sql->fetch_assoc()) { ?>
                                                                                        <option value="<?= $row['coid']; ?>" <?php if ($row['coid'] == $wn['rep']) {
                                                                                                                                    echo "selected";
                                                                                                                                } ?>><?= $row['firstname']; ?></option>
                                                                                    <?php } ?>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <div class="modal-footer mt-0">
                                                                            <input type="hidden" name="id" value="<?= $wn['wnid']; ?>">
                                                                            <button type="submit" name="update_woredanet" class="btn btn-primary"><i class="fas fa-plus"></i> አስቀምጥ</button>
                                                                            <button class="btn btn-secondary" type="button" data-bs-dismiss="modal"><span class="fa fa-times"></span> Close</button>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <!-- Delete WoredaNet -->
                                                        <div class="modal fade" id="deleteWN<?= $wn['wnid']; ?>" aria-hidden="true">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                                                                        <div class="modal-header border-danger">
                                                                            <h3 class="modal-title">የወረዳኔቱን መረጃ ለማጥፋት</h3>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <h4 class="text-danger">ይህን መረጃ በእርግጥ ማስወገድ ይፈልጋሉ?</h4>
                                                                        </div>
                                                                        <div class="modal-footer mt-0">
                                                                            <input type="hidden" name="id" value="<?= $wn['wnid']; ?>">
                                                                            <button name="delete_woredanet" class="btn btn-danger"><span class="fa fa-check"></span>አዎን</button>
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
                                            <strong>Empty!</strong> የተመዘገበ የወረዳኔት ማዕከል መረጃ የለም.
                                        </div>
                                    <?php endif; ?>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <?php if (mysqli_num_rows($wns) == 0) : ?>
                        <div class="col-lg-4">
                            <div class="card shadow mb-2">
                                <div class="card-header py-3">
                                    <h5 class="text-primary">የወረዳኔት መረጃ መመዝገቢያ ቅፅ</h5>
                                </div>
                                <div class="card-body">
                                    <form action="" method="post">
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
                                                    <label class="custom-control-label" for="active">የሚሰራ</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input type="radio" class="form-check-input" id="inactive" name="status" value="የማይሰራ">
                                                    <label class="custom-control-label" for="inactive">የማይሰራ</label>
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
                    <?php endif; ?>
                </div>
                <?php if (mysqli_num_rows($wns) > 0) : ?>
                    <div class="col-lg-8">
                        <div class="card shadow mb-2">
                            <div class="card-header py-3 d-flex justify-content-between">
                                <h5 class="text-primary">የወረዳኔት አገልግሎት ዝርዝር መረጃ</h5>
                                <a href="#addVC" class="btn btn-success" title="የወረዳኔ አገልግሎት መዝግብ" data-bs-toggle="modal" data-tooltip="tooltip"><i class="fas fa-plus"></i></a>
                            </div>
                            <div class="card-body" id="vc">
                                <?php
                                $sql = "SELECT *, vcs.id AS vcid, woredas.name AS w_name FROM `vcs` INNER JOIN woredas ON vcs.woreda = woredas.id INNER JOIN contacts ON contacts.woreda = woredas.id WHERE contacts.id = $id";
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
                                                                    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                                                                        <div class="modal-header border-primary">
                                                                            <h3 class="modal-title">የወረዳኔት አገልግሎቱ ዝርዝር መረጃ</h3>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <p>ወረዳ፡ <span class="text-primary"><?= $vc['w_name']; ?></span></p>
                                                                            <p>ቪዲዮ ኮንፈረንስ ተጠቃሚ(ወንድ)፡ <span class="text-primary"><?= $vc['vmale']; ?></span></p>
                                                                            <p>ቪዲዮ ኮንፈረንስ ተጠቃሚ(ሴት)፡ <span class="text-primary"><?= $vc['vfemale']; ?></span></p>
                                                                            <p>ኢንተርኔት ተጠቃሚ(ወንድ) <span class="text-primary"><?= $vc['imale']; ?></span></p>
                                                                            <p>ኢንተርኔት ተጠቃሚ(ሴት)፡ <span class="text-primary"><?= $vc['ifemale']; ?></span></p>
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
                                                                    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
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
                                                                                                                    } ?>><?= $ys; ?> ዓ.ም</option>
                                                                                    <?php  } ?>
                                                                                </select>
                                                                                <select name="month" class="form-select" required>
                                                                                    <option value="" selected disabled>ወር</option>
                                                                                    <option value="ሐምሌ" <?php if ($vc['month'] == "ሐምሌ") {
                                                                                                            echo 'selected';
                                                                                                        } ?>>ሐምሌ</option>
                                                                                    <option value="ነሃሴ" <?php if ($vc['month'] == "ነሃሴ") {
                                                                                                            echo 'selected';
                                                                                                        } ?>>ነሃሴ</option>
                                                                                    <option value="መስከረም" <?php if ($vc['month'] == "መስከረም") {
                                                                                                                echo 'selected';
                                                                                                            } ?>>መስከረም</option>
                                                                                    <option value="ጥቅምት" <?php if ($vc['month'] == "ጥቅምት") {
                                                                                                                echo 'selected';
                                                                                                            } ?>>ጥቅምት</option>
                                                                                    <option value="ሕዳር" <?php if ($vc['month'] == "ሕዳር") {
                                                                                                            echo 'selected';
                                                                                                        } ?>>ሕዳር</option>
                                                                                    <option value="ታሕሳስ" <?php if ($vc['month'] == "ታሕሳስ") {
                                                                                                                echo 'selected';
                                                                                                            } ?>>ታህሳስ</option>
                                                                                    <option value="ጥር" <?php if ($vc['month'] == "ጥር") {
                                                                                                            echo 'selected';
                                                                                                        } ?>>ጥር</option>
                                                                                    <option value="የካቲት" <?php if ($vc['month'] == "የካቲት") {
                                                                                                                echo 'selected';
                                                                                                            } ?>>የካቲት</option>
                                                                                    <option value="መጋቢት" <?php if ($vc['month'] == "መጋቢት") {
                                                                                                                echo 'selected';
                                                                                                            } ?>>መጋቢት</option>
                                                                                    <option value="ሚያዚያ" <?php if ($vc['month'] == "ሚያዚያ") {
                                                                                                                echo 'selected';
                                                                                                            } ?>>ሚያዚያ</option>
                                                                                    <option value="ግንቦት" <?php if ($vc['month'] == "ግንቦት") {
                                                                                                                echo 'selected';
                                                                                                            } ?>>ግንቦት</option>
                                                                                    <option value="ሰኔ" <?php if ($vc['month'] == "ሰኔ") {
                                                                                                            echo 'selected';
                                                                                                        } ?>>ሰኔ</option>
                                                                                </select>
                                                                            </div>
                                                                            <fieldset class="scheduler-border">
                                                                                <legend class="scheduler-border">ቪዲዮ ኮንፈረንስ ተጠቃሚ</legend>
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
                                                                            <button type="submit" name="update_VC" class="btn btn-success"><i class="fa fa-check"></i> አስቀምጥ</button>
                                                                            <button class="btn btn-secondary" type="button" data-bs-dismiss="modal"><i class="fa fa-times"></i> ዝጋ</button>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <!-- Delete WoredaNet service -->
                                                        <div class="modal fade" id="deleteVC<?= $vc['vcid']; ?>" aria-hidden="true">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                                                                        <div class="modal-header border-danger">
                                                                            <h3 class="modal-title">የወረዳኔቱን መረጃ ለማጥፋት</h3>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <h4 class="text-danger">ይህን የቪዲዮ ኮንፈረንስ መረጃ በእርግጥ ማስወገድ ይፈልጋሉ?</h4>
                                                                        </div>
                                                                        <div class="modal-footer mt-0">
                                                                            <input type="hidden" name="id" value="<?= $vc['vcid']; ?>">
                                                                            <button type="submit" name="delete_VC" class="btn btn-danger"><i class="fa fa-check"></i> አዎን</button>
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
                <?php endif; ?>


            <?php elseif (isset($_GET['page']) && $_GET['page'] === 'Maintenance') :  ?>
                <h1 class="h3 mb-4 text-gray-800">የኢኮቴ ኤሌክትሮኒክስ ዕቃዎች ጥገና</h1>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card shadow mb-2">
                            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                <h6 class="m-0 font-weight-bold text-primary">የተጠገኑ ዕቃዎች ዝርዝር</h6>
                                <a href="#" class="btn btn-success rounded" data-bs-toggle="modal" data-bs-target="#addMTModal"><i class="fa fa-plus"></i></a>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <?php
                                    $sql = "SELECT *, maintenances.id as mid, woredas.name AS w_name, woredas.id AS w_id FROM maintenances LEFT JOIN woredas ON woreda=woredas.id WHERE maintenances.woreda = $woreda";
                                    if ($result = mysqli_query($conn, $sql)) :
                                        if (mysqli_num_rows($result) > 0) : ?>
                                            <table class="table table-bordered" id="dataTable">
                                                <thead>
                                                    <tr>
                                                        <th>ወር</th>
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
                                                            <td class="py-1"><?= $fetch['month']; ?></td>
                                                            <td class="py-1"><?php echo $fetch['desktop']; ?></td>
                                                            <td class="py-1"><?php echo $fetch['printer']; ?></td>
                                                            <td class="py-1"><?php echo $fetch['laptop']; ?></td>
                                                            <td class="py-1"><?php echo $fetch['photocopier']; ?></td>
                                                            <td class="py-1"><?php echo $fetch['fax']; ?></td>
                                                            <td class="py-1"><?php echo $fetch['scanner']; ?></td>
                                                            <td class="py-1"><?php echo $fetch['switch']; ?></td>
                                                            <td class="py-1"><?php echo $fetch['projector']; ?></td>
                                                            <td class="py-1"><?php echo $fetch['server']; ?></td>
                                                            <td class="py-1 right" style="font-weight:900;">
                                                                <?php
                                                                $sum_devices = $fetch['desktop'] + $fetch['printer'] + $fetch['laptop'] + $fetch['photocopier'] + $fetch['fax'] + $fetch['scanner'] + $fetch['switch'] + $fetch['projector'] + $fetch['server'];
                                                                echo $sum_devices;
                                                                ?>
                                                            </td>
                                                            <td class="py-1"><?php echo $fetch['price']; ?></td>
                                                            <td class="py-1">
                                                                <div class="btn-group">
                                                                    <a class="btn btn-primary btn-sm" data-tooltip="tooltip" title="View Details" href="#viewMTModal<?= $fetch['mid'] ?>" data-bs-toggle="modal"><i class="fas fa-eye"></i></a>
                                                                    <a class="btn btn-success btn-sm" data-tooltip="tooltip" title="Edit Record" href="#editMTModal<?= $fetch['mid'] ?>" data-bs-toggle="modal"><i class="fas fa-edit"></i></a>
                                                                    <a class="btn btn-danger btn-sm" data-tooltip="tooltip" title="Delete Record" href="#deleteMTModal<?= $fetch['mid']; ?>" data-bs-toggle="modal"><i class="fas fa-times"></i></a>
                                                                </div>
                                                                <?php include('inc/maintenances.php'); ?>
                                                            </td>
                                                        </tr>
                                                        
                                                    <?php endwhile; ?>
                                                    <tr class="right bolder" style="font-weight:900;">
                                                        <td class="py-1">ጠቅላላ ድምር</td>
                                                        <td class="py-1"><?= $sum_desktop; ?></td>
                                                        <td class="py-1"><?= $sum_printer; ?></td>
                                                        <td class="py-1"><?= $sum_laptop; ?></td>
                                                        <td class="py-1"><?= $sum_photocopier; ?></td>
                                                        <td class="py-1"><?= $sum_fax; ?></td>
                                                        <td class="py-1"><?= $sum_scanner; ?></td>
                                                        <td class="py-1"><?= $sum_switch; ?></td>
                                                        <td class="py-1"><?= $sum_projector; ?></td>
                                                        <td class="py-1"><?= $sum_server; ?></td>
                                                        <!-- <td class="py-1"><?= $sum_server; ?></td> -->
                                                        <td class="py-1"><?= $sum_devices_total; ?></td>
                                                        <td class="py-1"><?= $sum_price; ?></td>
                                                        <td class="py-1"></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                </div>
                            <?php
                                        else : ?>
                                <div class="alert alert-danger alert-dismissible fade show">
                                    <strong>Empty!</strong> የተመዘገበ የጥገና መረጃ የለም
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                </div>
                        <?php
                                            mysqli_free_result($result);
                                        endif;
                                    else :
                                        echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
                                    endif;
                        ?>
                            </div>
                        </div>
                    </div>
                </div>

            <?php elseif (isset($_GET['page']) && $_GET['page'] === 'Apps') :  ?>
                <h1 class="h3 mb-4 text-gray-800">ነባር አፕሊኬሽኖች</h1>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card shadow mb-2">
                            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                <h6 class="m-0 font-weight-bold text-primary">የነባር አፕሊኬሽኖች ዝርዝር መረጃ</h6>
                                <a href="#" class="btn btn-success rounded" data-bs-toggle="modal" data-bs-target="#addAppModal"><i class="fa fa-plus"></i></a>
                            </div>
                            <div class="card-body">
                                <?php
                                $sql = "SELECT *, apps.id as aid FROM apps JOIN woredas ON apps.woreda=woredas.id WHERE woredas.id = $woreda";
                                if ($result = mysqli_query($conn, $sql)) :
                                    if (mysqli_num_rows($result) > 0) : ?>
                                        <div class="table-responsive">
                                            <table class="table table-bordered" id="dataTable">
                                                <thead>
                                                    <tr>
                                                        <th title="የሪፖርት ወር" data-tooltip="tooltip">ወር</th>
                                                        <th title="Court Case Management System" data-tooltip="tooltip">CCMS</th>
                                                        <th title="Integrated Budget & Expenditure System" data-tooltip="tooltip">IBEX</th>
                                                        <th title="Payroll" data-tooltip="tooltip">Payroll</th>
                                                        <th title="Payroll & Attendance Sheet System" data-tooltip="tooltip">PASS</th>
                                                        <th title="Trade Registraion & Licensing System" data-tooltip="tooltip">TRLS</th>
                                                        <th title="Managemen Information System" data-tooltip="tooltip">MIS</th>
                                                        <th title="Integrated Civil Service MIS" data-tooltip="tooltip">ICSMIS</th>
                                                        <th title=" Standard Integrated Government Tax Administration System" data-tooltip="tooltip">SIGTAS</th>
                                                        <th title="OMAS" data-tooltip="tooltip">OMAS</th>
                                                        <th title="Prison Administration Database System" data-tooltip="tooltip">PADS</th>
                                                        <th title="ISLA" data-tooltip="tooltip">ISLA</th>
                                                        <th title="ሌላ" data-tooltip="tooltip">ሌላ</th>
                                                        <th>ድምር</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php while ($fetch = mysqli_fetch_array($result)) : ?>
                                                        <tr>
                                                            <td class="py-1"><?= $fetch['month']; ?></td>
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
                                                            <td class="py-1 right" style="font-weight:900;"><?= $fetch['ccms'] + $fetch['ibex'] + $fetch['payroll'] + $fetch['pass'] +
                                                                                                                $fetch['trls'] + $fetch['mis'] + $fetch['icsmis'] + $fetch['sigtas'] + $fetch['omas'] + $fetch['pads'] + $fetch['isla'] + $fetch['others']; ?></td>
                                                            <td class="py-1">
                                                                <div class="btn-group">
                                                                    <a class="btn btn-primary btn-sm" data-tooltip="tooltip" title="View Details" href="#viewAppModal<?= $fetch['aid'] ?>" data-bs-toggle="modal"><i class="fas fa-eye"></i></a>
                                                                    <a class="btn btn-success btn-sm" data-tooltip="tooltip" title="Edit Record" href="#editAppModal<?= $fetch['aid'] ?>" data-bs-toggle="modal"><i class="fas fa-edit"></i></a>
                                                                    <a class="btn btn-danger btn-sm" data-tooltip="tooltip" title="Delete Record" href="#deleteAppModal<?= $fetch['aid']; ?>" data-bs-toggle="modal"><i class="fas fa-times"></i></a>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <?php include('inc/apps.php'); ?>
                                                    <?php endwhile; ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    <?php
                                    else : ?>
                                        <div class="alert alert-danger alert-dismissible fade show">
                                            <strong>Empty!</strong> የተመዘገበ የአፕሊኬሽን መረጃ የለም
                                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                        </div>
                                <?php
                                        mysqli_free_result($result);
                                    endif;
                                else :
                                    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
                                endif;
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Add application modal -->
                <div class="modal fade" id="addAppModal" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                                <div class="modal-header">
                                    <h3 class="modal-title">ነባር አፕሊኬሽን መረጃ መመዝገቢያ</h3>
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

            <?php elseif (isset($_GET['page']) && $_GET['page'] === 'Opens') :  ?>
                <h1 class="h3 mb-4 text-gray-800">ነፃ መተግበሪያዎች</h1>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card shadow mb-2">
                            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                <h6 class="m-0 font-weight-bold text-primary">የተስፋፉ ነፃ መተግበሪያዎች</h6>
                                <a href="#" class="btn btn-success rounded" data-bs-toggle="modal" data-bs-target="#addOpenModal"><i class="fa fa-plus"></i></a>
                            </div>
                            <div class="card-body">
                                <?php
                                $sql = "SELECT *, open_sources.id as oid, woredas.name AS w_name FROM open_sources INNER JOIN woredas ON open_sources.woreda = woredas.id WHERE woreda IN(SELECT woreda FROM contacts WHERE contacts.id= $id)";
                                if ($result = mysqli_query($conn, $sql)) :
                                    if (mysqli_num_rows($result) > 0) : ?>
                                        <div class="table-responsive">
                                            <table class="table table-bordered" id="dataTable">
                                                <thead>
                                                    <tr>
                                                        <th title="የሪፖርት ወር" data-tooltip="tooltip">ወር</th>
                                                        <th title="Attendance Management System" data-tooltip="tooltip">AMS</th>
                                                        <th title="IP messenger" data-tooltip="tooltip">IPM</th>
                                                        <th title="TemViewer" data-tooltip="tooltip">Teamviewer</th>
                                                        <th title="NVDA/JAWS" data-tooltip="tooltip">NVDA/JAWS</th>
                                                        <th title="Fax Automation" data-tooltip="tooltip">Fax</th>
                                                        <th title="Simulation" data-tooltip="tooltip">Simulation</th>
                                                        <th title="Document Management System" data-tooltip="tooltip">DMS</th>
                                                        <th title="BSC Automation" data-tooltip="tooltip">BSCA</th>
                                                        <th title="Amhara Rural Kebele Database" data-tooltip="tooltip">ARKDB</th>
                                                        <th title="Easy BCD" data-tooltip="tooltip">eBCD</th>
                                                        <th title="ሌላ" data-tooltip="tooltip">ሌላ</th>
                                                        <th>ድምር</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php while ($fetch = mysqli_fetch_array($result)) : ?>
                                                        <tr>
                                                            <td class="py-1"><?= $fetch['month']; ?></td>
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
                                                            <td class="py-1 right" style="font-weight:900;"><?= $total_apps; ?></td>
                                                            <td class="py-1">
                                                                <div class="btn-group">
                                                                    <a class="btn btn-primary btn-sm" data-tooltip="tooltip" title="View Details" href="#viewOpenModal<?= $fetch['oid'] ?>" data-bs-toggle="modal"><i class="fas fa-eye"></i></a>
                                                                    <a class="btn btn-success btn-sm" data-tooltip="tooltip" title="Edit Record" href="#editOpenModal<?= $fetch['oid'] ?>" data-bs-toggle="modal"><i class="fas fa-edit"></i></a>
                                                                    <a class="btn btn-danger btn-sm" data-tooltip="tooltip" title="Delete Record" href="#deleteOpenModal<?= $fetch['oid']; ?>" data-bs-toggle="modal"><i class="fas fa-times"></i></a>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <?php include('inc/opensources.php'); ?>
                                                    <?php endwhile; ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    <?php
                                    else : ?>
                                        <div class="alert alert-danger alert-dismissible fade show">
                                            <strong>Empty!</strong> የተመዘገበ የነፃ መተግበሪያ መረጃ የለም
                                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                        </div>
                                <?php
                                        mysqli_free_result($result);
                                    endif;
                                else :
                                    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
                                endif;
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Add Open Source modal -->
                <div class="modal fade" id="addOpenModal" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                                <div class="modal-header">
                                    <h3 class="modal-title">ነፃ መተግበሪያ መረጃ መመዝገቢያ</h3>
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
                                        <input type="number" name="ams" class="form-control" placeholder="AMS" />
                                        <input type="number" name="ipm" class="form-control" placeholder="IP Messenger">
                                    </div>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-code"></i></span>
                                        </div>
                                        <input type="number" name="teamv" class="form-control" placeholder="TeamViewer">
                                        <input type="number" name="jaws" class="form-control" placeholder="NVDA/JAWS">
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
                                        <input type="number" name="dms" class="form-control" placeholder="DMS">
                                        <input type="number" name="bsca" class="form-control" placeholder="BSCA">
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
                                <div class="modal-footer">
                                    <button name="add_open" class="btn btn-primary"><span class="fa fa-check"></span>
                                        መዝግብ</button>
                                    <button class="btn btn-secondary" type="button" data-bs-dismiss="modal"><span class="fa fa-times"></span> ዝጋ</button>
                                </div>
                        </div>
                        </form>
                    </div>
                </div>
                <!-- End add modal -->
            <?php elseif (isset($_GET['page']) && $_GET['page'] === 'Websites') :  ?>
                <h1 class="h3 mb-4 text-gray-800">ደረገፅ</h1>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card shadow mb-2">
                            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                <h6 class="m-0 font-weight-bold text-primary">የተለሙ ድረገፆች ዝርዝር መረጃ</h6>
                                <a href="#" class="btn btn-success rounded" data-bs-toggle="modal" data-bs-target="#addWebModal"><i class="fa fa-plus"></i></a>
                            </div>
                            <div class="card-body">
                                <?php
                                $sql = "SELECT *, websites.id as wbid, woredas.name AS w_name, websites.status AS status FROM websites LEFT JOIN woredas ON websites.woreda = woredas.id LEFT JOIN web_status ON  web_status.id= websites.status WHERE woredas.id = $woreda";
                                if ($result = mysqli_query($conn, $sql)) :
                                    if (mysqli_num_rows($result) > 0) : ?>
                                        <div class="table-responsive">
                                            <table class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th title="የሪፖርት ወር" data-tooltip="tooltip">ወር</th>
                                                        <th>ያለበት ሁኔታ</th>
                                                        <th>ብዛት</th>
                                                        <th>ድረገፅ አድራሻ</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php while ($fetch = mysqli_fetch_array($result)) : ?>
                                                        <tr>
                                                            <td class="py-1"><?= $fetch['month']; ?></td>
                                                            <td class="py-1"><?= $fetch['name']; ?></td>
                                                            <td class="py-1"><?= $fetch['count']; ?></td>
                                                            <td class="py-1"><a href="<?= $fetch['url']; ?>" target="_blank"><?= $fetch['url']; ?></a></td>
                                                            <td class="py-1">
                                                                <div class="btn-group">
                                                                    <a class="btn btn-primary btn-sm" data-tooltip="tooltip" title="View Details" href="#viewWebModal<?= $fetch['wbid'] ?>" data-bs-toggle="modal"><i class="fas fa-eye"></i></a>
                                                                    <a class="btn btn-success btn-sm" data-tooltip="tooltip" title="Edit Record" href="#editWebModal<?= $fetch['wbid'] ?>" data-bs-toggle="modal"><i class="fas fa-edit"></i></a>
                                                                    <a class="btn btn-danger btn-sm" data-tooltip="tooltip" title="Delete Record" href="#deleteWebModal<?= $fetch['wbid'] ?>" data-bs-toggle="modal"><i class="fas fa-times"></i></a>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <?php include('inc/websites.php'); ?>
                                                    <?php endwhile; ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    <?php
                                    else : ?>
                                        <div class="alert alert-danger alert-dismissible fade show">
                                            <strong>Empty!</strong> የተመዘገበ የድረገፅ መረጃ የለም
                                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                        </div>
                                <?php
                                        mysqli_free_result($result);
                                    endif;
                                else :
                                    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
                                endif;
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Add Website modal -->
                <div class="modal fade" id="addWebModal" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                                <div class="modal-header">
                                    <h3 class="modal-title">ድረ ገፅ መረጃ መመዝገቢያ</h3>
                                </div>
                                <div class="modal-body">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text"><i class="fas fa-map-marker"></i></span>
                                        <select name="woreda" class="form-control <?php echo (!empty($woreda_err)) ? 'is-invalid' : ''; ?>">
                                            <?php foreach ($woredas = mysqli_query($conn, "SELECT *, woredas.name AS w_name, woredas.id w_id FROM woredas WHERE woredas.id IN(SELECt woreda FROM contacts WHERE contacts.id = $id)") as $woreda) : ?>
                                                <option value="<?= $woreda['w_id']; ?>"><?= $woreda['w_name']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                        <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
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
                                        <span class="input-group-text"><i class="fas fa-power-off"></i></span>
                                        <select name="status" class="form-control">
                                            <option value="" selected disabled>Status</option>
                                            <?php foreach ($status = mysqli_query($conn, "SELECT * FROM web_status") as $st) : ?>
                                                <option value="<?= $st['id']; ?>"><?= $st['name']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text">ብዛት</span>
                                        <input type="number" name="count" class="form-control" placeholder="ብዛት">
                                    </div>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text"><i class="fas fa-link"></i></span>
                                        <input type="url" name="url" class="form-control" placeholder="Web Address">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button name="add_website" class="btn btn-primary"><span class="fa fa-check"></span>
                                        መዝግብ</button>
                                    <button class="btn btn-secondary" type="button" data-bs-dismiss="modal"><span class="fa fa-times"></span> ዝጋ</button>
                                </div>
                        </div>
                        </form>
                    </div>
                </div>
                <!-- End add modal -->

            <?php elseif (isset($_GET['page']) && $_GET['page'] === 'Problems') :  ?>
                <h1 class="h3 mb-4 text-gray-800">ከስራ ጋር በተያያዘ ያጋጠሙ ችግሮች</h1>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card shadow mb-2">
                            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                <h6 class="m-0 font-weight-bold text-primary">ያጋጠሙ ችግሮች መመዝገቢያ ቅፅ</h6>
                                <a href="#" class="btn btn-success rounded" data-bs-toggle="modal" data-bs-target="#addPModal"><i class="fa fa-plus"></i></a>
                            </div>
                            <div class="card-body">
                                <?php
                                $sql = "SELECT *, problems.id As pid, woredas.name AS w_name FROM problems INNER JOIN woredas ON woreda = woredas.id WHERE woreda IN(SELECT woreda FROM contacts WHERE contacts.id= $id)";
                                if ($result = mysqli_query($conn, $sql)) :
                                    if (mysqli_num_rows($result) > 0) : ?>
                                        <div class="table-responsive">
                                            <table class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th title="የሪፖርት ወር" data-tooltip="tooltip">ወረዳ</th>
                                                        <th>ወር</th>
                                                        <th>ርዕሰ ጉዳይ</th>
                                                        <th>ያጋጠመ ችግር</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php while ($fetch = mysqli_fetch_array($result)) : ?>
                                                        <tr>
                                                            <td class="py-1"><?= $fetch['w_name']; ?></td>
                                                            <td class="py-1"><?= $fetch['month']; ?></td>
                                                            <td class="py-1"><?= $fetch['subject']; ?></td>
                                                            <td class="py-1"><?= $fetch['ptext']; ?></td>
                                                            <td class="py-1">
                                                                <div class="btn-group">
                                                                    <a class="btn btn-primary btn-sm" data-tooltip="tooltip" title="View Details" href="#viewPModal<?= $fetch['pid'] ?>" data-bs-toggle="modal"><i class="fas fa-eye"></i></a>
                                                                    <a class="btn btn-success btn-sm" data-tooltip="tooltip" title="Edit Record" href="#editPModal<?= $fetch['pid'] ?>" data-bs-toggle="modal"><i class="fas fa-edit"></i></a>
                                                                    <a class="btn btn-danger btn-sm" data-tooltip="tooltip" title="Delete Record" href="#deletePModal<?= $fetch['pid'] ?>" data-bs-toggle="modal"><i class="fas fa-times"></i></a>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <?php include('inc/problems.php'); ?>
                                                    <?php endwhile; ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    <?php
                                        mysqli_free_result($result);
                                    else : ?>
                                        <div class="alert alert-danger alert-dismissible">
                                            <strong>Empty!</strong> No problem recordered. Please add and try again.
                                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                        </div>
                                <?php
                                    endif;
                                else :
                                    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
                                endif;
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Add Problem modal -->
                <div class="modal fade" id="addPModal" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                                <div class="modal-header">
                                    <h3 class="modal-title">በስራ ላይ ያጋጠመ ችግር ሪፖርት ማድረጊያ ቅፅ</h3>
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
                                            <span class="input-group-text">ርዕሰ ጉዳይ</span>
                                        </div>
                                        <input type="text" name="subject" class="form-control" placeholder="የችግሩ ርዕሰ ጉዳይ">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="ptext">ዝርዝር መግለጫ
                                        </label>
                                        <textarea rows="5" name="ptext" class="form-control" placeholder="ያጋጠመው ችግር ዝርዝር" required></textarea>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button name="add_problem" class="btn btn-primary"><span class="fa fa-check"></span>
                                        መዝግብ</button>
                                    <button class="btn btn-secondary" type="button" data-bs-dismiss="modal"><span class="fa fa-times"></span> ዝጋ</button>
                                </div>
                        </div>
                        </form>
                    </div>
                </div>
                <!-- End add modal -->
            <?php elseif (isset($_GET['page']) && $_GET['page'] === 'Tcenters') :  ?>
                <h1 class="h3 mb-4 text-gray-800">የማሰልጠኛ ማዕከላት</h1>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card shadow mb-2">
                            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                <h6 class="m-0 font-weight-bold text-primary">የማሰልጠኛ ማዕከል መመዝገቢያ ቅፅ</h6>
                                <a href="#" class="btn btn-success rounded" data-bs-toggle="modal" data-bs-target="#addTCModal"><i class="fa fa-plus"></i></a>
                            </div>
                            <div class="card-body">
                                <?php
                                $sql = "SELECT *, tcenters.id as tcid, woredas.name AS w_name FROM `tcenters` INNER JOIN woredas ON woreda = woredas.id WHERE woreda IN(SELECT woreda FROM contacts WHERE contacts.id= $id)";
                                if ($result = mysqli_query($conn, $sql)) :
                                    if (mysqli_num_rows($result) > 0) : ?>
                                        <div class="table-responsive">
                                            <table class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>ወረዳ</th>
                                                        <th>ብዛት</th>
                                                        <th>ኮምፒዩተር ብዛት</th>
                                                        <th>መብራት ያላቸው</th>
                                                        <th>ኢንተርኔት ያላቸው</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php while ($fetch = mysqli_fetch_array($result)) : ?>
                                                        <tr>
                                                            <td class="py-1"><?= $fetch['w_name']; ?></td>
                                                            <td class="py-1"><?= $fetch['amount']; ?></td>
                                                            <td class="py-1"><?= $fetch['pcs']; ?></td>
                                                            <td class="py-1"><?= $fetch['efacility']; ?></td>
                                                            <td class="py-1"><?= $fetch['ifacility']; ?></td>
                                                            <td class="py-1">
                                                                <div class="btn-group">
                                                                    <a class="btn btn-primary btn-sm" data-tooltip="tooltip" title="View Details" href="#viewTCModal<?= $fetch['tcid'] ?>" data-bs-toggle="modal"><i class="fas fa-eye"></i></a>
                                                                    <a class="btn btn-success btn-sm" data-tooltip="tooltip" title="Edit Record" href="#editTCModal<?= $fetch['tcid'] ?>" data-bs-toggle="modal"><i class="fas fa-edit"></i></a>
                                                                    <a class="btn btn-danger btn-sm" data-tooltip="tooltip" title="Delete Record" href="#deleteTCModal<?= $fetch['tcid'] ?>" data-bs-toggle="modal"><i class="fas fa-times"></i></a>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <?php include('inc/tcenters.php'); ?>
                                                    <?php endwhile; ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    <?php
                                        mysqli_free_result($result);
                                    else : ?>
                                        <div class="alert alert-danger alert-dismissible">
                                            <strong>Empty!</strong> የተመዘገበ የማሰልጠኛ ማዕከል የለም.
                                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                        </div>
                                <?php
                                    endif;
                                else :
                                    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
                                endif;
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php elseif (isset($_GET['page']) && $_GET['page'] === 'CLiteracy') :  ?>
                <h1 class="h3 mb-4 text-gray-800">የኮምፒዩተር ዕውቀት</h1>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card shadow mb-2">
                            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                <h6 class="m-0 font-weight-bold text-primary">የኮምፒዩተር ዕውቀት መመዝገቢያ ቅፅ</h6>
                                <a href="#" class="btn btn-success rounded" data-bs-toggle="modal" data-bs-target="#addCLModal"><i class="fa fa-plus"></i></a>
                            </div>
                            <div class="card-body">
                                <?php
                                $sql = "SELECT *, cliteracy.id as clid, woredas.name AS w_name FROM `cliteracy` INNER JOIN woredas ON woreda = woredas.id WHERE woreda IN(SELECT woreda FROM contacts WHERE contacts.id= $id)";
                                if ($result = mysqli_query($conn, $sql)) :
                                    if (mysqli_num_rows($result) > 0) : ?>
                                        <div class="table-responsive">
                                            <table class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th class="text-center" rowspan="2">ወረዳ</th>
                                                        <th class="text-center" colspan="3">የሠራተኛ ብዛት</th>
                                                        <th class="text-center" colspan="3">የኮምፒዩተር ዕውቀት ያላቸው ብዛት</th>
                                                        <th class="text-center" colspan="3">የኮምፒዩተር ዕውቀት የሌላቸው ብዛት</th>
                                                        <th class="text-center" rowspan="2">Action</th>
                                                    </tr>
                                                    <tr>
                                                        <td>ወንድ</td>
                                                        <td>ሴት</td>
                                                        <td>ድምር</td>
                                                        <td>ወንድ</td>
                                                        <td>ሴት</td>
                                                        <td>ድምር</td>
                                                        <td>ወንድ</td>
                                                        <td>ሴት</td>
                                                        <td>ድምር</td>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php while ($fetch = mysqli_fetch_array($result)) : ?>
                                                        <tr>
                                                            <td class="py-1"><?= $fetch['w_name']; ?></td>
                                                            <td class="py-1"><?= $fetch['empsm']; ?></td>
                                                            <td class="py-1"><?= $fetch['empsf']; ?></td>
                                                            <td class="py-1"><?= $fetch['empsm'] + $fetch['empsf']; ?></td>
                                                            <td class="py-1"><?= $fetch['literatem']; ?></td>
                                                            <td class="py-1"><?= $fetch['literatef']; ?></td>
                                                            <td class="py-1"><?= $fetch['literatem'] + $fetch['literatef']; ?></td>
                                                            <td class="py-1"><?= $fetch['iliteratem']; ?></td>
                                                            <td class="py-1"><?= $fetch['iliteratef']; ?></td>
                                                            <td class="py-1"><?= $fetch['iliteratem'] + $fetch['iliteratef']; ?></td>
                                                            <td class="py-1">
                                                                <div class="btn-group">
                                                                    <a class="btn btn-primary btn-sm" data-tooltip="tooltip" title="View Details" href="#viewCLModal<?= $fetch['clid'] ?>" data-bs-toggle="modal"><i class="fas fa-eye"></i></a>
                                                                    <a class="btn btn-success btn-sm" data-tooltip="tooltip" title="Edit Record" href="#editCLModal<?= $fetch['clid'] ?>" data-bs-toggle="modal"><i class="fas fa-edit"></i></a>
                                                                    <a class="btn btn-danger btn-sm" data-tooltip="tooltip" title="Delete Record" href="#deleteCLModal<?= $fetch['clid'] ?>" data-bs-toggle="modal"><i class="fas fa-times"></i></a>

                                                                    <?php include('inc/cliteracy.php'); ?>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        
                                                    <?php endwhile; ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    <?php mysqli_free_result($result);
                                    else : ?>
                                        <div class="alert alert-danger alert-dismissible">
                                            <strong>Empty!</strong> የተመዘገበ የሠራተኞች የኮምፒዩተር ዕውቀት መረጃ የለም.
                                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                        </div>
                                <?php
                                    endif;
                                else :
                                    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
                                endif;
                                ?>
                            </div>
                        </div>
                    </div>
                </div>

            <?php elseif (isset($_GET['page']) && $_GET['page'] === 'CCenters') :  ?>
                <h1 class="h3 mb-4 text-gray-800">ሁለገብ ማሕበረሰብ ማዕከላት</h1>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card shadow mb-2">
                            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                <h6 class="m-0 font-weight-bold text-primary">ሁለገብ ማሕበረሰብ ማዕከላት</h6>
                                <a href="#" class="btn btn-success rounded" data-bs-toggle="modal" data-bs-target="#addCCModal"><i class="fa fa-plus"></i></a>
                            </div>
                            <div class="card-body">
                                <?php
                                $sql = "SELECT *, ccenters.id as ccid, woredas.name AS w_name, ccenters.name AS c_name FROM ccenters INNER JOIN woredas ON woreda = woredas.id WHERE woreda IN(SELECT woreda FROM contacts WHERE contacts.id= $id)";
                                if ($result = mysqli_query($conn, $sql)) :
                                    if (mysqli_num_rows($result) > 0) : ?>
                                        <div class="table-responsive">
                                            <table class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>ወረዳ/ከተማ</th>
                                                        <th>መጠሪያ</th>
                                                        <th>ደረጃ</th>
                                                        <th>የተቁቋመበት ዓመት</th>
                                                        <th>ያለበት ሁኔታ</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php while ($fetch = mysqli_fetch_array($result)) : ?>
                                                        <tr>
                                                            <td class="py-1"><?= $fetch['w_name']; ?></td>
                                                            <td class="py-1"><?= $fetch['c_name']; ?></td>
                                                            <td class="py-1"><?= $fetch['level']; ?></td>
                                                            <td class="py-1"><?= $fetch['organizedyear']; ?> ዓ.ም</td>
                                                            <td class="py-1"><?= $fetch['status']; ?></td>
                                                            <td class="py-1">
                                                                <div class="btn-group">
                                                                    <a class="btn btn-primary btn-sm" data-tooltip="tooltip" title="View Details" href="#viewCCModal<?= $fetch['ccid'] ?>" data-bs-toggle="modal"><i class="fas fa-eye"></i></a>
                                                                    <a class="btn btn-success btn-sm" data-tooltip="tooltip" title="Edit Record" href="#editCCModal<?= $fetch['ccid'] ?>" data-bs-toggle="modal"><i class="fas fa-edit"></i></a>
                                                                    <a class="btn btn-danger btn-sm" data-tooltip="tooltip" title="Delete Record" href="#deleteCCModal<?= $fetch['ccid'] ?>" data-bs-toggle="modal"><i class="fas fa-times"></i></a>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <?php include('inc/ccenters.php'); ?>
                                                    <?php endwhile; ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    <?php
                                    else : ?>
                                        <div class="alert alert-danger alert-dismissible">
                                            <strong>Empty!</strong> የተመዘገበ ሁለገብ ማሕበረሰብ ማዕከል የለም.
                                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                        </div>
                                <?php
                                    endif;
                                else :
                                    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
                                endif;
                                ?>
                            </div>
                        </div>
                    </div>
                    <?php if (mysqli_num_rows($result) > 0) : ?>
                        <div class="col-md-12">
                            <div class="card shadow mb-2">
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">ሁለገብ ማሕበረሰብ ማዕከል አገልግሎት</h6>
                                    <a href="#" class="btn btn-success rounded" data-bs-toggle="modal" data-bs-target="#addPModal"><i class="fa fa-plus"></i></a>
                                </div>
                                <div class="card-body">
                                    <?php
                                    $sql = "SELECT *, cservices.id as csid, woredas.name AS w_name, woredas.id AS w_id FROM cservices INNER JOIN ccenters INNER JOIN woredas ON ccenters.id = ccenter AND woreda = woredas.id WHERE woreda IN(SELECT woreda FROM contacts WHERE contacts.id= $id)";
                                    if ($result = mysqli_query($conn, $sql)) :
                                        if (mysqli_num_rows($result) > 0) : ?>
                                            <div class="table-responsive">
                                                <table class="table table-bordered" id="DataTable">
                                                    <thead>
                                                        <tr>
                                                            <th class="text-center" colspan="3">ተቀጣሪ ሠራተኛ</th>
                                                            <th class="text-center" colspan="3">ኢንተርኔት ተጠቃሚ</th>
                                                            <th class="text-center" colspan="3">የቦርድ አባላት</th>
                                                            <th class="text-center" rowspan="2">ካፒታል</th>
                                                            <th class="text-center" rowspan="2">Action</th>
                                                        </tr>
                                                        <tr>
                                                            <td>ወንድ</td>
                                                            <td>ሴት</td>
                                                            <td>ድምር</td>
                                                            <td>ወንድ</td>
                                                            <td>ሴት</td>
                                                            <td>ድምር</td>
                                                            <td>ወንድ</td>
                                                            <td>ሴት</td>
                                                            <td>ድምር</td>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php while ($fetch = mysqli_fetch_array($result)) : ?>
                                                            <tr>
                                                                <td class="py-1"><?= $fetch['empym'] + $fetch['empom']; ?></td>
                                                                <td class="py-1"><?= $fetch['empyf'] + $fetch['empof']; ?></td>
                                                                <td class="py-1"><?= $fetch['empym'] + $fetch['empyf'] + $fetch['empom'] + $fetch['empof']; ?></td>
                                                                <td class="py-1"><?= $fetch['iusersym'] + $fetch['iusersom']; ?></td>
                                                                <td class="py-1"><?= $fetch['iusersyf'] + $fetch['iusersof']; ?></td>
                                                                <td class="py-1"><?= $fetch['iusersym'] + $fetch['iusersyf'] + $fetch['iusersom'] + $fetch['iusersof']; ?></td>
                                                                <td class="py-1"><?= $fetch['bmembym'] + $fetch['bmembom']; ?></td>
                                                                <td class="py-1"><?= $fetch['bmembyf'] + $fetch['bmembof']; ?></td>
                                                                <td class="py-1"><?= $fetch['bmembym'] + $fetch['bmembyf'] + $fetch['bmembom'] + $fetch['bmembof']; ?></td>
                                                                <td class="py-1"><?= $fetch['capital']; ?></td>
                                                                <td class="py-1">
                                                                    <div class="btn-group">
                                                                        <a class="btn btn-primary btn-sm" data-tooltip="tooltip" title="View Details" href="#viewCSModal<?= $fetch['csid'] ?>" data-bs-toggle="modal"><i class="fas fa-eye"></i></a>
                                                                        <a class="btn btn-success btn-sm" data-tooltip="tooltip" title="Edit Record" href="#editCSModal<?= $fetch['csid'] ?>" data-bs-toggle="modal"><i class="fas fa-edit"></i></a>
                                                                        <a class="btn btn-danger btn-sm" data-tooltip="tooltip" title="Delete Record" href="#deleteCSModal<?= $fetch['csid'] ?>" data-bs-toggle="modal"><i class="fas fa-times"></i></a>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <?php include('inc/cservices.php'); ?>
                                                        <?php endwhile; ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        <?php
                                            mysqli_free_result($result);
                                        else : ?>
                                            <div class="alert alert-danger alert-dismissible">
                                                <strong>Empty!</strong> No service recordered. Please add and try again.
                                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                            </div>
                                    <?php
                                        endif;
                                    else :
                                        echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
                                    endif;
                                    ?>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>

            <?php else : ?>
                <h1 class="h3 mb-4 text-gray-800">Dashboard</h1>
                <div class="row">

                    <div class="col-xl-3 col-md-4 col-sm-6 mb-4">
                        <div class="card border-primary shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row d-flex no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                            የኮምፒዩተር ስልጠና</div>
                                        <div class="d-flex justify-content-between">
                                            <div class="h5 mb-0 font-weight-bold">
                                                <?php
                                                if ($result = mysqli_query($conn, "SELECT COUNT(trainings.id) as total FROM trainings INNER JOIN contacts ON trainings.woreda = contacts.woreda WHERE contacts.id = $id")) {
                                                    if (mysqli_num_rows($result) > 0) {
                                                        $row = mysqli_fetch_assoc($result);
                                                        echo 'ጠቅላላ፡ ' . $row['total'];
                                                    } else {
                                                        echo '0';
                                                    }
                                                } ?>
                                            </div>
                                            <?php $res = mysqli_query($conn, "SELECT trainings.sex AS sex , COUNT(trainings.id) as count FROM trainings INNER JOIN contacts ON trainings.woreda = contacts.woreda WHERE contacts.id = $id  GROUP BY trainings.sex");
                                            if (mysqli_num_rows($res) > 0) :

                                            ?>
                                                <div class="details">
                                                    <?php while ($row = mysqli_fetch_array($res)) : ?>
                                                        <p><strong><?= $row['sex']; ?></strong>: <?= $row['count']; ?></p>
                                                    <?php endwhile; ?>
                                                </div>

                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-graduation-cap fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-md-4 col-sm-6 mb-4">
                        <div class="card border-success shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                            ኤሌክትሮኒክስ ዕቃዎች ጥገና</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                                            <?php
                                            $sql = "SELECT SUM(desktop+laptop+printer+photocopier+fax+scanner+switch+projector+server) as total, price FROM maintenances INNER JOIN contacts ON maintenances.woreda = contacts.woreda WHERE contacts.id = $id";
                                            if ($result = mysqli_query($conn, $sql)) :
                                                foreach ($result as $mt) {
                                                    if ($mt['total'] > 0) {
                                                        echo  $mt['total'];
                                                    } else {
                                                        echo 0;
                                                    }
                                                }
                                            endif; ?>
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-tools fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-md-4 col-sm-6 mb-4">
                        <div class="card border-danger shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                            ነባር አፕሊኬሽኖች</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                                            <?php
                                            if ($total_apps > 0) {
                                                echo $total_apps;
                                            } else {
                                                echo '0';
                                            } ?>
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-desktop fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-md-4 col-sm-6 mb-4">
                        <div class="card border-info shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                            ነፃ ሶፍትዌሮች</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                                            <?php
                                            $sql = "SELECT SUM(ams+ipm+teamv+jaws+faxaw+simu+dms+bsca+arkdb+ebcd+others) as total FROM open_sources INNER JOIN contacts ON open_sources.woreda = contacts.woreda WHERE contacts.id = $id";
                                            if ($result = mysqli_query($conn, $sql)) :
                                                foreach ($result as $mt) {
                                                    if ($mt['total'] > 0) {
                                                        echo  $mt['total'];
                                                    } else {
                                                        echo 0;
                                                    }
                                                }
                                            endif; ?>
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-code fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-md-4 col-sm-6 mb-4">
                        <div class="card border-secondary shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="h4 text-xs font-weight-bold text-dark text-uppercase mb-2">
                                            ወረዳኔት አገልግሎት</div>
                                        <div class="h6 mb-0 font-weight-bold text-gray-800">
                                            <?php
                                            $sqlv = "SELECT SUM(vmale+vfemale) as total FROM vcs INNER JOIN contacts ON vcs.woreda = contacts.woreda WHERE contacts.id = $id";
                                            if ($result = mysqli_query($conn, $sqlv)) :
                                                foreach ($result as $mt) {
                                                    if ($mt['total'] > 0) {
                                                        $vc =  $mt['total'];
                                                    } else {
                                                        $vc = 0;
                                                    }
                                                    echo '<p>ቪዲዮ ኮንፈረንስ ተጠቃሚ<span class="text-primary"> ' . $vc . '</span></p>';
                                                }
                                            endif;

                                            $sqli = "SELECT SUM(imale+ifemale) as total FROM vcs INNER JOIN contacts ON vcs.woreda = contacts.woreda WHERE contacts.id = $id";
                                            if ($internet = mysqli_query($conn, $sqli)) :
                                                foreach ($internet as $in) {
                                                    if ($in['total'] > 0) {
                                                        $in =  $in['total'];
                                                    } else {
                                                        $in = 0;
                                                    }
                                                }

                                                echo 'ኢንተርኔት ተጠቃሚ <span class="text-primary">' . $in . '</span>';
                                            endif; ?>
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-tv fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-md-4 col-sm-6 mb-4">
                        <div class="card border-primary shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                            የሠው ኃይል</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                                            <?php
                                            $sql = "SELECT COUNT(id) as total FROM contacts WHERE woreda IN( SELECT woreda FROM contacts WHERE contacts.id = $id)";
                                            if ($result = mysqli_query($conn, $sql)) :
                                                foreach ($result as $mt) {
                                                    if ($mt['total'] > 0) {
                                                        echo  $mt['total'];
                                                    } else {
                                                        echo 0;
                                                    }
                                                }
                                            endif; ?>
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-male fa-2x text-gray-300"></i><i class="fas fa-female fa-2x text-gray-300"></i>
                                    </div>
                                </div>
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

    <!-- add maintenance modal -->
    <div class="modal fade" id="addMTModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                    <div class="modal-header">
                        <h3 class="modal-title">አዲስ ጥገና መመዝገቢያ</h3>
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
                            <input type="number" name="desktop" class="form-control" placeholder="ደስክቶፕ ብዛት">
                            <input type="number" name="laptop" class="form-control" placeholder="ላፕቶፕ ብዛት">
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fas fa-print"></i>
                                </span>
                            </div>
                            <input type="number" name="printer" class="form-control" placeholder="ፕሪንተር ብዛት">
                            <input type="number" name="photocopier" class="form-control" placeholder="ፎቶኮፒ ብዛት">
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fas fa-fax"></i>
                                </span>
                            </div>
                            <input type="number" name="fax" class="form-control" placeholder="ፋክስ ብዛት">
                            <input type="number" name="scanner" class="form-control" placeholder="ስካነር ብዛት">
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fas fa-cogs"></i>
                                </span>
                            </div>
                            <input type="number" name="switch" class="form-control" placeholder="ስዊች ብዛት">
                            <input type="number" name="projector" class="form-control" placeholder="ፕሮጀክተር ብዛት">
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fas fa-cash-register"></i>
                                </span>
                            </div>
                            <input type="number" name="server" class="form-control" placeholder="ሰርቨር ብዛት">

                        </div>

                    </div>
                    <div class="modal-footer mt-0">
                        <button name="add_maintenance" class="btn btn-primary"><span class="fa fa-check"></span>
                            Save</button>
                        <button class="btn btn-secondary" type="button" data-bs-dismiss="modal"><span class="fa fa-times"></span> Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Add VC Service modal -->
    <div class="modal fade" id="addVC" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                    <div class="modal-header border-primary">
                        <h3 class="modal-title">የወረዳኔት አገልግሎት መረጃ መመዝገቢያ</h3>
                    </div>
                    <div class="modal-body">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fas fa-map-marker"></i>
                                </span>
                            </div>
                            <?php
                            $sql = $conn->query("SELECT *, woredas.id AS w_id, woredas.name AS w_name FROM woredas INNER JOIN contacts ON woredas.id = woreda WHERE contacts.id = $id") or die(mysqli_error($conn));
                            while ($row = $sql->fetch_assoc()) { ?>
                                <select name="woreda" class="form-select" required>
                                    <option value="<?= $row['w_id']; ?>" selected><?= $row['w_name']; ?></option>
                                </select>
                            <?php } ?>
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
                        <fieldset class="scheduler-border">
                            <legend class="scheduler-border">ቪዲዮ ኮንፈረንስ ተጠቃሚ</legend>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-male"></i></span>
                                </div>
                                <input type="number" class="form-control" name="vmale" placeholder="ወንድ" />
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-female"></i></span>
                                </div>
                                <input type="number" class="form-control" name="vfemale" placeholder="ሴት" />
                            </div>
                        </fieldset>
                        <fieldset class="scheduler-border">
                            <legend class="scheduler-border">ኢንተርኔት ተጠቃሚ</legend>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-male"></i></span>
                                </div>
                                <input type="number" class="form-control" name="imale" placeholder="ወንድ" />
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-female"></i></span>
                                </div>
                                <input type="number" class="form-control" name="ifemale" placeholder="ሴት" />
                            </div>
                        </fieldset>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-dollar"></i></span>
                            </div>
                            <input type="number" class="form-control" name="capital" placeholder="ካፒታል" />
                        </div>
                    </div>
                    <div class="modal-footer mt-0">
                        <button class="btn btn-success" type="submit" name="add_VC"><span class="fa fa-check"></span> መዝግብ</button>
                        <button class="btn btn-secondary" type="button" data-bs-dismiss="modal"><span class="fa fa-times"></span> ዝጋ</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <!-- Add CCcenter modal -->
    <div class="modal fade" id="addCCModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                    <div class="modal-header">
                        <h3 class="modal-title">የሁለገብ ማሕበረሰብ ማዕከል መመዝገቢያ ቅፅ</h3>
                    </div>
                    <div class="modal-body">
                        <div class="input-group mb-3">
                            <span class="input-group-text">ወረዳ</span>
                            <select name="woreda" class="form-select">
                                <?php foreach ($woredas = mysqli_query($conn, "SELECT *, woredas.id AS w_id FROM woredas WHERE woredas.id IN(SELECt woreda FROM contacts WHERE contacts.id = $id)") as $woreda) : ?>
                                    <option value="<?= $woreda['w_id']; ?>" selected><?= $woreda['name']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text">መጠሪያ ስም</span>
                            <input type="text" name="name" class="form-control" placeholder="የማዕከሉ መጠሪያ" required>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text">አካባቢ</span>
                            <select name="area" class="form-select">
                                <option value="" selected disabled>ያለበት አካባቢ</option>
                                <option value="ከተማ">ከተማ</option>
                                <option value="ገጠር">ገጠር</option>
                            </select>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text">ደረጃ</span>
                            <select name="level" class="form-select">
                                <option value="" selected disabled>የማዕከሉ ደረጃ</option>
                                <option value="ትልቅ">ትልቅ</option>
                                <option value="መካከለኛ">መካከለኛ</option>
                                <option value="ትንሽ">ትንሽ</option>
                            </select>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text">የተቋቋመበት ዓመት</span>
                            <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                            <?php
                            $years = 2000;
                            $yeare = date('Y') - 8;
                            ?>
                            <select name="organizedyear" class="form-select" required>
                                <option value="" selected disabled>የተቋቋመበት ዓመት</option>
                                <?php for ($ys = $years; $ys <= $yeare; $ys++) { ?>
                                    <option value="<?= $ys; ?>"><?= $ys; ?> ዓ.ም</option>
                                <?php  } ?>
                            </select>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text">ያቋቋመው አካል</span>
                            <input type="text" name="organizedby" class="form-control" placeholder="ያቋቋመው አካል" required>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text me-3">ያለበት ሁኔታ</span>
                            <div class="form-check form-check-inline mt-2">
                                <input class="form-check-input" type="radio" name="status" id="active" value="የሚሰራ">
                                <label class="form-check-label" for="active">የሚሰራ</label>
                            </div>
                            <div class="form-check form-check-inline mt-2">
                                <input class="form-check-input" type="radio" name="status" id="closed" value="የተዘጋ">
                                <label class="form-check-label" for="closed">የተዘጋ</label>
                            </div>
                            <div class="form-check form-check-inline mt-2">
                                <input class="form-check-input" type="radio" name="status" id="inactive" value="ስራ ያልጀመረ">
                                <label class="form-check-label" for="inactive">ስራ ያልጀመረ</label>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button name="add_ccenter" class="btn btn-primary"><span class="fa fa-check"></span>
                            መዝግብ</button>
                        <button class="btn btn-secondary" type="button" data-bs-dismiss="modal"><span class="fa fa-times"></span> ዝጋ</button>
                    </div>
            </div>
            </form>
        </div>
    </div>
    <!-- End add modal -->

    <!-- Add CService modal -->
    <div class="modal fade" id="addPModal" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                    <div class="modal-header">
                        <h3 class="modal-title">የሁለገብ ማዕከል አገልግሎት ሪፖርት ማድረጊያ ቅፅ</h3>
                        <?php //echo $fetch['w_name']; ?>
                    </div>
                    <div class="modal-body">
                        <div class="input-group mb-3">
                            <span class="input-group-text"><i class="fas fa-map-marker"></i></span>
                            <select name="ccenter" class="form-select">
                                <?php foreach ($woredas = mysqli_query($conn, "SELECT *, ccenters.id as ccid, woredas.name as w_name, ccenters.name AS c_name FROM ccenters INNER JOIN woredas ON woreda = woredas.id WHERE woredas.id IN(SELECt woreda FROM contacts WHERE contacts.id = $id)") as $woreda) : ?>
                                    <option value="<?= $woreda['ccid']; ?>"><?= $woreda['w_name']; ?> ሁለገብ <?= $woreda['c_name']; ?> ማዕከል</option>
                                <?php endforeach; ?>
                            </select>
                            <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
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
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="input-group mb-3">
                                    <fieldset class="scheduler-border">
                                        <legend class="scheduler-border">የቅጥር ሠራተኛ ብዛት (ወጣቶች)</legend>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="fas fa-male"></i></span>
                                            <input type="number" class="form-control" name="empym" value="" />
                                            <span class="input-group-text"><i class="fas fa-female"></i></span>
                                            <input type="number" class="form-control" name="empyf" value="" />
                                        </div>
                                    </fieldset>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="input-group mb-3">
                                    <fieldset class="scheduler-border">
                                        <legend class="scheduler-border">የቅጥር ሠራተኛ ብዛት (ሌሎች)</legend>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="fas fa-male"></i></span>
                                            <input type="number" class="form-control" name="empom" value="" />
                                            <span class="input-group-text"><i class="fas fa-female"></i></span>
                                            <input type="number" class="form-control" name="empof" value="" />
                                        </div>
                                    </fieldset>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <fieldset class="scheduler-border">
                                    <legend class="scheduler-border">ኢንተርኔት ተጠቃሚ ወጣቶች ብዛት</legend>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fas fa-male"></i></span>
                                        <input type="number" class="form-control" name="iusersym" value="" />
                                        <span class="input-group-text"><i class="fas fa-female"></i></span>
                                        <input type="number" class="form-control" name="iusersyf" value="" />
                                    </div>
                                </fieldset>
                            </div>
                            <div class="col-lg-6">
                                <fieldset class="scheduler-border">
                                    <legend class="scheduler-border">ኢንተርኔት ተጠቃሚ ሌሎች ብዛት</legend>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fas fa-male"></i></span>
                                        <input type="number" class="form-control" name="iusersom" value="" />
                                        <span class="input-group-text"><i class="fas fa-female"></i></span>
                                        <input type="number" class="form-control" name="iusersof" value="" />
                                    </div>
                                </fieldset>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <fieldset class="scheduler-border">
                                    <legend class="scheduler-border">የቦርድ አባላት ብዛት (ወጣቶች)</legend>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fas fa-male"></i></span>
                                        <input type="number" class="form-control" name="bmembym" value="" />
                                        <span class="input-group-text"><i class="fas fa-female"></i></span>
                                        <input type="number" class="form-control" name="bmembyf" value="" />
                                    </div>
                                </fieldset>
                            </div>
                            <div class="col-lg-6">
                                <fieldset class="scheduler-border">
                                    <legend class="scheduler-border">የቦርድ አባላት ብዛት (ሌሎች)</legend>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fas fa-male"></i></span>
                                        <input type="number" class="form-control" name="bmembom" value="" />
                                        <span class="input-group-text"><i class="fas fa-female"></i></span>
                                        <input type="number" class="form-control" name="bmembof" value="" />
                                    </div>
                                </fieldset>
                            </div>
                        </div>
                        <div class="input-group w-50">
                            <span class="input-group-text">ካፒታል</span>
                            <input type="number" name="capital" class="form-control" placeholder="ካፒታል">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button name="add_cservice" class="btn btn-primary"><span class="fa fa-check"></span>
                            መዝግብ</button>
                        <button class="btn btn-secondary" type="button" data-bs-dismiss="modal"><span class="fa fa-times"></span> ዝጋ</button>
                    </div>
            </div>
            </form>
        </div>
    </div>
    <!-- End add modal -->

    <!-- Add Training Center -->
    <div class="modal fade" id="addTCModal" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                    <div class="modal-header">
                        <h3 class="modal-title">የማሰልጠኛ ማዕከል መረጃ አሻሽል</h3>
                    </div>
                    <div class="modal-body">
                        <div class="input-group mb-3">
                            <span class="input-group-text">
                                ወረዳ
                                <!-- <i class="fas fa-map-marker"></i> -->
                            </span>
                            <select name="woreda" class="form-select">
                                <?php foreach ($woredas = mysqli_query($conn, "SELECT *, woredas.id AS w_id, woredas.name AS w_name FROM woredas WHERE woredas.id IN(SELECt woreda FROM contacts WHERE contacts.id = $id)") as $woreda) : ?>
                                    <option value="<?= $woreda['w_id']; ?>"><?= $woreda['w_name']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text">የማዕከላት ብዛት</span>
                            <input type="number" name="amount" class="form-control" value="">
                            <span class="input-group-text">ኮምፒዩተር ብዛተ</span>
                            <input type="number" name="pcs" class="form-control" value="">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text">መብራት ያላቸው</span>
                            <input type="number" name="efacility" class="form-control" value="">
                            <span class="input-group-text">ኢንተርኔት ያላቸው</span>
                            <input type="number" name="ifacility" class="form-control" value="">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button name="add_tcenter" class="btn btn-primary"><span class="fa fa-check"></span>
                            አሻሽል</button>
                        <button class="btn btn-secondary" type="button" data-bs-dismiss="modal"><span class="fa fa-times-circle"></span> ዝጋ</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Add Computer Literacy -->
    <div class="modal fade" id="addCLModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                    <div class="modal-header">
                        <h3 class="modal-title">የኮምፒዩተር ዕውቀት መረጃ መመዝገቢያ</h3>
                    </div>
                    <div class="modal-body">
                        <div class="input-group mb-3">
                            <?php foreach ($woredas = mysqli_query($conn, "SELECT *, woredas.id AS w_id FROM woredas WHERE woredas.id IN(SELECt woreda FROM contacts WHERE contacts.id = $id)") as $woreda) : ?>
                                <?php $woreda = $woreda['w_id']; ?>
                                <input type="hidden" name="woreda" value="<?= $woreda ?>">
                            <?php endforeach; ?>
                            <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
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
                            <fieldset class="scheduler-border">
                                <legend class="scheduler-border">የሠራተኛ ብዛት</legend>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fas fa-male"></i></span>
                                    <input type="number" class="form-control" name="empsm" value="" />
                                    <span class="input-group-text"><i class="fas fa-female"></i></span>
                                    <input type="number" class="form-control" name="empsf" value="" />
                                </div>
                            </fieldset>
                        </div>
                        <div class="input-group mb-3">
                            <fieldset class="scheduler-border">
                                <legend class="scheduler-border">የኮምፒዩተር ዕውቀት ያላቸው ብዛት</legend>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fas fa-male"></i></span>
                                    <input type="number" class="form-control" name="literatem" value="" />
                                    <span class="input-group-text"><i class="fas fa-female"></i></span>
                                    <input type="number" class="form-control" name="literatef" value="" />
                                </div>
                            </fieldset>
                        </div>
                        <div class="input-group mb-3">
                            <fieldset class="scheduler-border">
                                <legend class="scheduler-border">የኮምፒዩተር ዕውቀት የሌላቸው ብዛት</legend>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fas fa-male"></i></span>
                                    <input type="number" class="form-control" name="iliteratem" value="" />
                                    <span class="input-group-text"><i class="fas fa-female"></i></span>
                                    <input type="number" class="form-control" name="iliteratef" value="" />
                                </div>
                            </fieldset>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button name="add_cliteracy" class="btn btn-primary"><span class="fa fa-check"></span>
                            አስቀምጥ</button>
                        <button class="btn btn-secondary" type="button" data-bs-dismiss="modal"><span class="fa fa-times-circle"></span> ዝጋ</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>