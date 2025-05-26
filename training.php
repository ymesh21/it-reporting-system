<?php
include_once("export_excel.php");
// Check if the user is logged in, if not then redirect him to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: index.php");
    exit;
}

$id = $_SESSION['id'];
$woreda = $_SESSION['woreda'];

$year = $month = $name = $sex = $category = $type = $office = "";
$year_err = $month_err = $name_err = $sex_err = $category_err = $type_err = $office_err = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate year
    $input_year = trim($_POST["year"]);
    if (empty($input_year)) {
        $year_err = "Please select report year.";
    } else {
        $year = $input_year;
    }
    // Validate month
    $input_month = trim($_POST["month"]);
    if (empty($input_month)) {
        $month_err = "Please select report month.";
    } else {
        $month = $input_month;
    }
    // Validate category
    $input_category = trim($_POST["category"]);
    if (empty($input_category)) {
        $category_err = "Please select category.";
    } else {
        $category = $input_category;
    }
    // Validate type
    $input_type = trim($_POST["type"]);
    if (empty($input_type)) {
        $type_err = "Please select type.";
    } else {
        $type = $input_type;
    }
    // Validate sex
    $input_sex = trim($_POST["sex"]);
    if (empty($input_sex)) {
        $sex_err = "Please select sex.";
    } else {
        $sex = $input_sex;
    }
    // Validate name
    $input_name = trim($_POST["name"]);
    if (empty($input_name)) {
        $name_err = "Please enter a name.";
    } elseif (!filter_var($input_name, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => "/^[a-zA-Z\s]+$/")))) {
        $name_err = "Please enter a valid name. [English alphabets only]";
    } else {
        $name = $input_name;
    }

    // validate office
    $input_office = trim($_POST['office']);
    if (empty($input_office)) {
        $office = "";
    } elseif (!filter_var($input_office, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => "/^[a-zA-Z\s]+$/")))) {
        $office_err = "Please enter a valid office name. [English alphabets only]";
    } else {
        $office = $input_office;
    }



    // Check input errors before inserting in database
    if (empty($year_err) &&  empty($month_err) && empty($name_err) && empty($sex_err) && empty($category_err) && empty($type_err) && empty($office_err)) {
        // Prepare an insert statement
        $sql = "INSERT INTO trainings (woreda, fullname, sex, category, type, office, year, month) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

        if ($stmt = mysqli_prepare($conn, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssssssss", $param_woreda, $param_name, $param_sex, $param_category, $param_type, $param_office, $param_year, $param_month);

            // Set parameters
            $param_woreda = $woreda;
            $param_name = $name;
            $param_sex = $sex;
            $param_category = $category;
            $param_type = $type;
            $param_office = $office;
            $param_year = $year;
            $param_month = $month;

            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                // Records created successfully. Redirect to landing page
                header("location: training.php");
                exit();
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
        // Close statement
        mysqli_stmt_close($stmt);
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
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <h5>List of Trainees</h5>
                            <span id="export-to-excel"><a href="#" class="btn btn-success"><i class="fas fa-file-excel"></i> Export to excel</a></span>
                        </div>
                        <div class="card-body">
                            <form action="export_excel.php" method="post" id="export-form">
                                <input type="hidden" value="" id="hidden-type" name="ExportType" />
                            </form>
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover" id="dataTable">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Gender</th>
                                            <th>Category</th>
                                            <th>Type</th>
                                            <th>Year</th>
                                            <th>Month</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        foreach ($trainees as $row) : ?>
                                            <tr>
                                                <td><?php echo $no++ ?></td>
                                                <td><?php echo $row['name'] ?></td>
                                                <td><?php echo $row['sex'] ?></td>
                                                <td><?php echo $row['category'] ?></td>
                                                <td><?php echo $row['type'] ?></td>
                                                <td><?php echo $row['year'] ?></td>
                                                <td><?php echo $row['month'] ?></td>
                                                <td class="btn-group py-1">
                                                    <a href="#" class="btn btn-secondary btn-sm" data-bs-toggle="modal" data-bs-target="#viewModal<?= $row['id']; ?>" data-tooltip="tooltip" title="View Trainee"><i class="fa fa-eye"></i></a>
                                                    <a href="editTraining.php?id=<?= $row['id'] ?>" class="btn btn-info btn-sm" title="Update Record" data-toggle="tooltip"><i class="fas fa-pencil"></i></a>
                                                    <a href="deleteTraining.php?id=<?= $row['id'] ?>" class="btn btn-danger btn-sm" title="Delete Record" data-toggle="tooltip"><i class="fas fa-times"></i></a>
                                                </td>
                                            </tr>
                                            <?php include('inc/trainings.php'); ?>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="text-primary">አዲስ ሰልጣኝ መመዝገቢያ</h5>
                        </div>
                        <div class="card-body">
                            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                                <div class="row g-3 mb-3">
                                    <?php
                                    $years = date('Y') - 10;
                                    $yeare = $years + 3;
                                    $months = date('F');
                                    ?>
                                    <label class="col-sm-2 col-form-label">ዓመት</label>
                                    <div class="col-sm-10">
                                        <select name="year" class="form-select <?php echo (!empty($year_err)) ? 'is-invalid' : ''; ?>">
                                            <option value="">Select</option>
                                            <?php for ($ys = $years; $ys <= $yeare; $ys++) { ?>
                                                <option value="<?= $ys; ?>" <?php if ($year == $ys) {
                                                                                echo "selected";
                                                                            } ?>><?= $ys; ?> ዓ.ም</option>
                                            <?php  } ?>
                                        </select>
                                    </div>
                                    <span class="invalid-feedback"><?php echo $year_err; ?></span>
                                </div>
                                <div class="row g-3 mb-3">
                                    <label class="col-sm-2 col-form-label">ወር</label>
                                    <div class="col-sm-10">
                                        <select name="month" class="form-select <?php echo (!empty($month_err)) ? 'is-invalid' : ''; ?>">
                                            <option value="">Select</option>
                                            <option value="July" <?php if ($month == 'July') {
                                                                        echo "selected";
                                                                    } ?>>ሐምሌ</option>
                                            <option value="August" <?php if ($month == 'August') {
                                                                        echo "selected";
                                                                    } ?>>ነሃሴ</option>
                                            <option value="September" <?php if ($month == 'September') {
                                                                            echo "selected";
                                                                        } ?>>መስከረም</option>
                                            <option value="October" <?php if ($month == 'October') {
                                                                        echo "selected";
                                                                    } ?>>ጥቅምት</option>
                                            <option value="November" <?php if ($month == 'November') {
                                                                            echo "selected";
                                                                        } ?>>ሕዳር</option>
                                            <option value="Devember" <?php if ($month == 'Devember') {
                                                                            echo "selected";
                                                                        } ?>>ታህሳስ</option>
                                            <option value="January" <?php if ($month == 'January') {
                                                                        echo "selected";
                                                                    } ?>>ጥር</option>
                                            <option value="Febraury" <?php if ($month == 'Febraury') {
                                                                            echo "selected";
                                                                        } ?>>የካቲት</option>
                                            <option value="March" <?php if ($month == 'March') {
                                                                        echo "selected";
                                                                    } ?>>መጋቢት</option>
                                            <option value="April" <?php if ($month == 'April') {
                                                                        echo "selected";
                                                                    } ?>>ሚያዚያ</option>
                                            <option value="May" <?php if ($month == 'May') {
                                                                    echo "selected";
                                                                } ?>>ግንቦት</option>
                                            <option value="June" <?php if ($month == 'June') {
                                                                        echo "selected";
                                                                    } ?>>ሰኔ</option>
                                        </select>
                                    </div>
                                    <span class="invalid-feedback"><?php echo $month_err; ?></span>
                                </div>

                                <div class="row g-3 mb-3">
                                    <label class="col-sm-2 col-form-label">Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="name" class="form-control <?php echo (!empty($name_err)) ? 'is-invalid' : ''; ?>" value="<?= $name; ?>" placeholder="Enter fullname">
                                        <div id="nameHelp" class="form-text">English characters only.</div>
                                        <span class="invalid-feedback"><?php echo $name_err; ?></span>
                                    </div>
                                </div>
                                <div class="row g-3 mb-3">
                                    <label class="col-sm-2 col-form-label">ፆታ</label>
                                    <div class="col-sm-10">
                                        <select name="sex" class="form-select <?php echo (!empty($sex_err)) ? 'is-invalid' : ''; ?>">
                                            <option value="">Select</option>
                                            <option value="Male" <?php if ($sex == 'Male') {
                                                                        echo "selected";
                                                                    } ?>>ወንድ</option>
                                            <option value="Female" <?php if ($sex == 'Female') {
                                                                        echo "selected";
                                                                    } ?>>ሴት</option>
                                        </select>
                                    </div>
                                    <span class="invalid-feedback"><?php echo $sex_err; ?></span>
                                </div>

                                <div class="row g-3 mb-3">
                                    <?php
                                    $sql = $conn->query("SELECT * FROM categories") or die(mysqli_error($conn));
                                    ?>
                                    <label class="col-sm-2 col-form-label">የስልጠና ዓይነት</label>
                                    <div class="col-sm-10">
                                        <select name="category" class="form-select <?php echo (!empty($category_err)) ? 'is-invalid' : ''; ?>">
                                            <option value="">Select</option>
                                            <?php
                                            while ($row = $sql->fetch_assoc()) { ?>
                                                <option value="<?= $row['cid'] ?>" <?php if ($category == $row['cid']) {
                                                                                        echo "selected";
                                                                                    } ?>><?= $row['cname'] ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <span class="invalid-feedback"><?php echo $category_err; ?></span>
                                </div>

                                <div class="row g-3 mb-3">
                                    <label class="col-sm-2 col-form-label">የሠልጣኝ ምድብ</label>
                                    <div class="col-sm-10">
                                        <select name="type" class="form-select <?php echo (!empty($type_err)) ? 'is-invalid' : ''; ?>">
                                            <option value="">Select</option>
                                            <option value="Employee" <?php if ($type == 'Employee') {
                                                                            echo "selected";
                                                                        } ?>>መንግሥት ሠራተኛ</option>
                                            <option value="Teacher" <?php if ($type == 'Student') {
                                                                        echo "selected";
                                                                    } ?>>መምህር</option>
                                            <option value="Cabinet" <?php if ($type == 'Employee') {
                                                                        echo "selected";
                                                                    } ?>>አመራር</option>
                                            <option value="Kebele Manager" <?php if ($type == 'Kebele Manager') {
                                                                                echo "selected";
                                                                            } ?>>ቀበሌ ስራ አስኪያጅ</option>
                                            <option value="Community" <?php if ($type == 'Community') {
                                                                            echo "selected";
                                                                        } ?>>ማህበረሰብ</option>
                                            <option value="Women" <?php if ($type == 'Women') {
                                                                        echo "selected";
                                                                    } ?>>ሴቶች</option>
                                            <option value="Disabled" <?php if ($type == 'Disabled') {
                                                                            echo "selected";
                                                                        } ?>>አካል ጉዳተኛ</option>
                                            <option value="HIV/AIDS Association" <?php if ($type == 'HIV/AIDS Association') {
                                                                                        echo "selected";
                                                                                    } ?>>ኤች.አይ.ቪ/ኤድስ ማህበራት</option>
                                            <option value="Student" <?php if ($type == 'Student') {
                                                                        echo "selected";
                                                                    } ?>>ተማሪ</option>
                                        </select>
                                    </div>
                                    <span class="invalid-feedback"><?php echo $type_err; ?></span>
                                </div>
                                <div class="row g-3 mb-3">
                                    <label class="col-sm-2 col-form-label">ተቋም</label>
                                    <div class="col-sm-10">
                                        <textarea name="office" rows="1" class="form-control <?php echo (!empty($type_err)) ? 'is-invalid' : ''; ?>" placeholder="የሠልጣኝ ተቋም"><?= $office ?></textarea>
                                        <div id="officeHelp" class="form-text">English characters only.</div>
                                        <span class="invalid-feedback"><?php echo $office_err; ?></span>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Add</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End of Main Content -->

    <?php
    // Close connection
    mysqli_close($conn);
    include('footer.php'); ?>
</div>