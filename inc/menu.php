<!-- Top Navbar -->
<div class="topnav" id="home">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-auto d-flex text-light">
                <p>
                    <i class="fas fa-envelope"></i>
                    <span><a href="mailto:info@norhshoaict.net">info@norhshoaict.net</a></span>
                </p>
                <p>
                    <i class="fas fa-phone"></i>
                    <span><a href="#">+251 116 81 1215</a></span>
                </p>
            </div>
            <div class="col-auto">
                <div class="social-links">
                    <a href="https://www.facebook.com/nszict" target="_blank" class="fab fa-facebook"></a>
                    <a href="https://t.me/nshoaict" class="fab fa-telegram" target="_blank"></a>
                    <a href="#" class="fab fa-linkedin" target="_blank"></a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Top Navabr -->
<!-- Topbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4 shadow sticky-top">
    <div class="container">
        <a class="navbar-brand" href="home.php" title="NICT Reporting System">ሰሜን ሸዋ ዞን ኢኮቴ</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
            <?php if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) : ?>
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">ኢኮቴ አቅም ግንባታ </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="home.php?page=Tcenters" title="Training Centers">ማሰልጠኛ ማዕከላት</a>
                        <a class="dropdown-item" href="training.php" title="Computer Training">ስልጠና</a>
                        <a class="dropdown-item" href="home.php?page=CCenters" title="Community Centers">ማሕበረሰብ ማዕከል</a>
                        <a class="dropdown-item" href="home.php?page=CLiteracy" title="Computer Literacy">የኮምፒዩተር ዕውቀት</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">ኔትወርክ አስተዳደር</a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="home.php?page=Maintenance" title="Electronic Device Maintenance">ጥገና</a>
                        <a class="dropdown-item" href="home.php?page=WoredaNet" title="WoredaNET">ወረዳኔት</a>
                        <a class="dropdown-item" href="home.php?page=Competency" title="Competency License">ሙያ ፍቃድ</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">ሲስተም አስተዳደር</a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="home.php?page=Apps" title="Electronic Device Maintenance">አፕሊኬሽን</a>
                        <a class="dropdown-item" href="home.php?page=Opens" title="Open Sources>ነፃ መተግበሪያ">ነፃ መተግበሪያ</a>
                        <a class="dropdown-item" href="home.php?page=Websites" title="Websites">ድረገፅ</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="home.php?page=Civilservice" title="የልማት ሠራዊት ግንባታ">የሲቪል ሰርቪስ አተገባበር</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="home.php?page=Problems" data-bs-toggle="tooltip" title="Problems">ያጋጠሙ ችግሮች</a>
                </li>
                <?php else: ?>
                <li class="nav-item">
                    <a class="nav-link" href="index.php" data-bs-toggle="tooltip" title="Problems">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#services" data-bs-toggle="tooltip" title="Problems">Services</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#team" data-bs-toggle="tooltip" title="Problems">Our Team</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#contact" data-bs-toggle="tooltip" title="Problems">Contacts Us</a>
                </li>
                <?php endif; ?>
            </ul>
            <ul class="navbar-nav ms-auto">
                <?php if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) : ?>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropMenu" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <?php echo htmlspecialchars($_SESSION["firstname"]); ?>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-dark dropdown-menu-end" aria-labelledby="navbarDropMenu">
                        <li><a class="dropdown-item" href="reset-password.php">Reset Password</a></li>
                        <li><a class="dropdown-item" data-bs-toggle="modal" href="#logoutModal">Logout</a></li>
                    </ul>
                </li>
                <?php else : ?>
                    <li class="nav-item"><a class="nav-link" href="login.php"><i class="fa fa-sign-in-alt"></i> Sign in</a></li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>
<!-- End of Topbar -->