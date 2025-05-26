<?php
session_start();
// Check if the user is logged in, if not then redirect him to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: index.php");
    exit;
}
// Include config file
require_once "config.php";

// Define variables and initialize with empty values
$name = $sex = $category = $type = $office =  $year = $month = "";
$name_err = $sex_err = $category_err = $type_err = $office_err =  $year = $month_err = "";

// Processing form data when form is submitted
if (isset($_POST["id"]) && !empty($_POST["id"])) {
    // Get hidden input value
    $id = $_POST["id"];

    // Validate name
    $input_name = trim($_POST["name"]);
    if (empty($input_name)) {
        $name_err = "Please enter a name.";
    } elseif (!filter_var($input_name, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => "/^[a-zA-Z\s]+$/")))) {
        $name_err = "Please enter a valid name.";
    } else {
        $name = $input_name;
    }

    // Validate sex
    $input_sex = trim($_POST["sex"]);
    if (empty($input_sex)) {
        $sex_err = "Please select trainee gender.";
    } else {
        $sex = $input_sex;
    }
    // Validate category
    $input_category = trim($_POST["category"]);
    if (empty($input_category)) {
        $category_err = "Please select training category.";
    } else {
        $category = $input_category;
    }
    // Validate type
    $input_type = trim($_POST["type"]);
    if (empty($input_type)) {
        $type_err = "Please select trainee type.";
    } else {
        $type = $input_type;
    }
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


    // Check input errors before inserting in database
    if (empty($name_err) && empty($sex_err) && empty($category_err) && empty($type_err) && empty($year_err) && empty($month_err)) {
        // Prepare an update statement
        $sql = "UPDATE trainings SET fullname=?, sex=?, category=?, type=?, office=?, year=?, month=? WHERE tid=?";

        if ($stmt = mysqli_prepare($conn, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sssssssi", $param_name, $param_sex, $param_category, $param_type, $param_office, $param_year, $param_month, $param_id);

            // Set parameters
            $param_name = $name;
            $param_sex = $sex;
            $param_category = $category;
            $param_type = $type;
            $param_office = $office;
            $param_year = $year;
            $param_month = $month;
            $param_id = $id;

            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                // Records updated successfully. Redirect to landing page
                header("location: training.php");
                exit();
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }
        }

        // Close statement
        mysqli_stmt_close($stmt);
    }
} else {
    // Check existence of id parameter before processing further
    if (isset($_GET["id"]) && !empty(trim($_GET["id"]))) {
        // Get URL parameter
        $id =  trim($_GET["id"]);

        // Prepare a select statement
        $sql = "SELECT * FROM trainings WHERE tid = ?";
        if ($stmt = mysqli_prepare($conn, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "i", $param_id);

            // Set parameters
            $param_id = $id;

            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                $result = mysqli_stmt_get_result($stmt);

                if (mysqli_num_rows($result) == 1) {
                    /* Fetch result row as an associative array. Since the result set
                    contains only one row, we don't need to use while loop */
                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

                    // Retrieve individual field value
                    $name = $row["fullname"];
                    $sex = $row["sex"];
                    $category = $row["category"];
                    $type = $row["type"];
                    $office = $row["office"];
                    $year = $row["year"];
                    $month = $row["month"];
                } else {
                    // URL doesn't contain valid id. Redirect to error page
                    header("location: error.php");
                    exit();
                }
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }
        }

        // Close statement
        mysqli_stmt_close($stmt);
    } else {
        // URL doesn't contain id parameter. Redirect to error page
        header("location: error.php");
        exit();
    }
}
$cat_query = $conn->query("SELECT * FROM categories") or die(mysqli_error($conn));
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
                        <h2 class="mt-2">Update Record</h2>
                    </div>
                    <div class="card-body">
                        <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <?php
                                        $years = date('Y') - 10;
                                        $yeare = $years + 3;
                                        $months = date('F');
                                        ?>
                                        <label class="col-form-label">በጀት ዓመት</label>
                                            <select name="year" class="form-select <?php echo (!empty($year_err)) ? 'is-invalid' : ''; ?>">
                                                <option value="">Select</option>
                                                <?php for ($ys = $years; $ys <= $yeare; $ys++) { ?>
                                                    <option value="<?= $ys; ?>" <?php if ($year == $ys) {
                                                                                    echo "selected";
                                                                                } ?>><?= $ys; ?> ዓ.ም</option>
                                                <?php  } ?>
                                            </select>
                                        <span class="invalid-feedback"><?php echo $year_err; ?></span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="col-form-label">ወር</label>
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
                                        <span class="invalid-feedback"><?php echo $month_err; ?></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row g-3 mb-3">
                                <label class="col-form-label col-sm-2">ሙሉ ስም</label>
                                <div class="col-sm-10">
                                    <input type="text" name="name" class="form-control <?php echo (!empty($name_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $name; ?>">
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
                                                                    echo 'selected';
                                                                } ?>>Male</option>
                                        <option value="Female" <?php if ($sex == 'Female') {
                                                                    echo 'selected';
                                                                } ?>>Female</option>
                                    </select>
                                </div>
                                <span class="invalid-feedback"><?php echo $sex_err; ?></span>
                            </div>
                            <div class="row g-3 mb-3">
                                <label class="col-sm-2 col-form-label">ስልጠና</label>
                                <div class="col-sm-10">
                                    <select name="category" class="form-select <?php echo (!empty($category_err)) ? 'is-invalid' : ''; ?>">
                                        <option value="">Select</option>
                                        <?php
                                        while ($cat = $cat_query->fetch_assoc()) { ?>
                                            <option value="<?= $cat['cid'] ?>" <?php if ($category == $cat['cid']) {
                                                                                    echo "selected";
                                                                                } ?>><?= $cat['cname'] ?></option>
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
                                                                        echo 'selected';
                                                                    } ?>>መንግሥት ሠራተኛ</option>
                                        <option value="Teacher" <?php if ($type == 'Teacher') {
                                                                    echo 'selected';
                                                                } ?>>መምህር</option>
                                        <option value="Cabinet" <?php if ($type == 'Cabinet') {
                                                                    echo 'selected';
                                                                } ?>>አመራር</option>
                                        <option value="Kebele Manager" <?php if ($type == 'Kebele Manager') {
                                                                            echo 'selected';
                                                                        } ?>>ቀበሌ ስራ አስኪያጅ</option>
                                        <option value="Community" <?php if ($type == 'Community') {
                                                                        echo 'selected';
                                                                    } ?>>ማህበረሰብ</option>
                                        <option value="Women" <?php if ($type == 'Women') {
                                                                    echo 'selected';
                                                                } ?>>ሴቶች</option>
                                        <option value="HIV/AIDS Association" <?php if ($type == 'HIV/AIDS Association') {
                                                                                    echo 'selected';
                                                                                } ?>>HIV/AIDS ማሀበራት</option>
                                        <option value="Disabled" <?php if ($type == 'Disabled') {
                                                                        echo 'selected';
                                                                    } ?>>አካል ጉዳተኛ</option>
                                        <option value="Student" <?php if ($type == 'Student') {
                                                                    echo 'selected';
                                                                } ?>>ተማሪ</option>
                                    </select>
                                </div>
                                <span class="invalid-feedback"><?php echo $type_err; ?></span>
                            </div>
                            <div class="row g-3 mb-3">
                                <label class="col-form-label col-sm-2">ተቋም</label>
                                <div class="col-sm-10">
                                    <textarea type="text" name="office" class="form-control <?php echo (!empty($office_err)) ? 'is-invalid' : ''; ?>"><?php echo $office; ?></textarea>
                                    <div id="officeHelp" class="form-text">English characters only.</div>
                                </div>
                                <span class="invalid-feedback"><?php echo $office_err; ?></span>
                            </div>
                            <input type="hidden" name="id" value="<?php echo $id; ?>" />
                            <input type="submit" class="btn btn-primary offset-md-2" value="Submit">
                            <a href="training.php" class="btn btn-secondary ml-2">Cancel</a>
                        </form>
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