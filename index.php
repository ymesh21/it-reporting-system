<?php

if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
    $access = $_SESSION['role'];
}
?>
<?php
$sender_name = $email = $subject = $message = '';
if (isset($_POST['send'])) {
    require_once './config.php';
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    if(!empty($_POST['email']) && !empty($_POST['message'])) {
        $insert = mysqli_query($conn, "INSERT INTO messages (name, email, subject, message) VALUES('$name', '$email', '$subject', '$message')");
        if ($insert) {
            $_SESSION['success'] = 'Message sent. Thank  you you message.';
        } else{
            $_SESSION['error'] = 'Unable to send your message. Please try again!';
        }
    }
}
?>

<?php $page = pathinfo(__FILE__, PATHINFO_FILENAME); ?>
<?php include('inc/header.php'); ?>

<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">
    <!-- Main Content -->
    <div id="content">
        <?php require('inc/menu.php'); ?>
        <!-- Begin Page Content -->
        <div class="container">
            <?php //echo $_SESSION['role']; ?>
            <!-- Page Heading -->
            <h1 class="display-4 h3 mb-4 text-gray-800">የሰሜን ሸዋ ዞን አስተዳደር ኢኮቴ ቡድን</h1>
            <section id="services">
                <p class="display-6 text-primary">የምሰጣቸው አገልግሎቶች</p>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">የኮምፒዩተር ስልጠና ለተለያዩ የማሕበረሰብ ክፍሎች</li>
                    <li class="list-group-item">የኤሌክትሮኒክስ ዕቃዎች ጥገናና</li>
                    <li class="list-group-item">የኤሌክትሮኒክስ ዕቃዎች ግዢና ማማከር</li>
                    <li class="list-group-item">የወረዳኔት እና ቨርቿል ስብሰባ አገልግሎት</li>
                    <li class="list-group-item">የተለያዩ ሶፍትዌሮችን ማልማትና መጫን</li>
                    <li class="list-group-item">የድረ ገፅ ልማትና ማስተዳደር</li>
                    <li class="list-group-item">የኤሌክትሮኒክስ ነክ ንግድ ላይ ለሚሰማሩ አካላት የሙያ ብቃት ፍቃድ</li>
                </ul>
            </section>
        </div>
        <!-- /.container-fluid -->
        <hr>
        <!-- Teams -->
        <section id="team">
            <div class="container">
                <div class="row">
                    <div class="col-12 intro text-center">
                        <h6 class="text-uppercase">ኢኮቴ ቡድን</h6>
                        <h1>Meet Our Team</h1>
                        <p>በሰሜን ሸዋ ዞን አስተዳደር ጽ/ቤት ስር የሚገኘው የኢኮቴ ቡድን ባለኡት የስራ መደቦች ላይ የሠው ኃይል ያሟላ ሲሆን ከታች ያሉትን ባለሙያዎች በተቀመጠው አድራሻ ማግኘት ትችላላችሁ።</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4 col-md-6">
                        <div class="team-member">
                            <div class="img-wrapper">
                                <img src="img/demelash-belay.gif" alt="">
                                <div class="overlay"></div>
                                <div class="social-links">
                                    <a href="" class="fab fa-facebook"></a>
                                    <a href="" class="fab fa-twitter"></a>
                                    <a href="" class="fab fa-telegram"></a>
                                </div>
                            </div>
                            <div class="content">
                                <h5>ደመላሽ በላይ</h5>
                                <p>ቡድን መሪ</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="team-member">
                            <div class="img-wrapper">
                                <img src="img/Yohannes-Meshesha.gif" alt="">
                                <div class="overlay"></div>
                                <div class="social-links">
                                    <a href="" class="fab fa-facebook"></a>
                                    <a href="" class="fab fa-twitter"></a>
                                    <a href="" class="fab fa-telegram"></a>
                                </div>
                            </div>
                            <div class="content">
                                <h5>ዮሐንስ መሸሻ</h5>
                                <p>መገናኛና ኢንፎ/ ቴክኖ/ አቅም ግ/ባለሙያ</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="team-member">
                            <div class="img-wrapper">
                                <img src="img/Aemero-Assefa.gif" alt="">
                                <div class="overlay"></div>
                                <div class="social-links">
                                    <a href="" class="fab fa-facebook"></a>
                                    <a href="" class="fab fa-twitter"></a>
                                    <a href="" class="fab fa-telegram"></a>
                                </div>
                            </div>
                            <div class="content">
                                <h5>አእምሮ አሠፋ</h5>
                                <p>ኔትወርክ አስተዳደር ባለሙያ</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="team-member">
                            <div class="img-wrapper">
                                <img src="img/Anmut-Alene.gif" alt="">
                                <div class="overlay"></div>
                                <div class="social-links">
                                    <a href="" class="fab fa-facebook"></a>
                                    <a href="" class="fab fa-twitter"></a>
                                    <a href="" class="fab fa-telegram"></a>
                                </div>
                            </div>
                            <div class="content">
                                <h5>አንሙት አለነ</h5>
                                <p>ኔትወርክ አስተዳደር ባለሙያ</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="team-member">
                            <div class="img-wrapper">
                                <img src="img/aregahegn.gif" alt="">
                                <div class="overlay"></div>
                                <div class="social-links">
                                    <a href="" class="fab fa-facebook"></a>
                                    <a href="" class="fab fa-twitter"></a>
                                    <a href="" class="fab fa-telegram"></a>
                                </div>
                            </div>
                            <div class="content">
                                <h5>አረጋኸኝ በዛብህ</h5>
                                <p>ሲስተም አስተዳደር ባለሙያ</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Contact -->
        <section id="contact">
            <div class="container">
                <div class="row">
                    <div class="col-12 intro text-center">
                        <h6 class="text-uppercase">Contact us</h6>
                        <h1>Constac us form</h1>
                        <p>Send us a message if you have any question.</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <?php if (isset($_POST['send']) && isset($_SESSION['success'])) : ?>
                            <div class="alert alert-success alert-dismissible d-flex align-items-center fade show">
                                <i class="bi-check-circle-fill"></i>
                                <?= $_SESSION['success'] ?>.
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            </div>
                        <?php endif; ?>
                        <?php if (isset($_POST['send']) && isset($_SESSION['error'])) : ?>
                            <div class="alert alert-danger alert-dismissible d-flex align-items-center fade show">
                                <i class="bi-check-circle-fill"></i>
                                <?= $_SESSION['error'] ?>.
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            </div>
                        <?php endif; ?>
                        <form action="index.php#contact" method="post">
                            <div class="form-group mb-3">
                                <label for="">Name</label>
                                <input type="text" name="name" placeholder="Your Name" value="<?= $sender_name ?>" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <label for="">Email address</label>
                                <input type="email" name="email" placeholder="Email address" value="<?= $sender_name ?>" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <label for="">Subject</label>
                                <input type="text" name="subject" placeholder="Subject" value="<?= $sender_name ?>" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <label for="">Message</label>
                                <textarea name="message" rows="5" class="form-control"></textarea>
                            </div>
                            <div class="form-group mb-3">
                                <button type="submit" class="btn btn-primary text-uppercase" name="send">Send</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>

    </div>
    <!-- End of Main Content -->

    <?php include('footer.php'); ?>