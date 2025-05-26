<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>NICT- <?php if (!isset($_GET['page'])) {
                        echo 'Dashabord';
                    } else {
                        echo $_GET['page'];
                    } ?></title>

    <!-- Custom fonts for this template-->
    <link rel="stylesheet" href="./assets/fontawesome/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <?php if ($page === 'admin' || $page === 'users' || $page === 'documents') : ?>
        <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <?php endif; ?>
    <link rel="stylesheet" type="text/css" href="./assets/bootstrap/css/bootstrap.min.css"/>
    <link rel="stylesheet" type="text/css" href="./assets/dataTables/datatables.min.css"/>
    <link href="css/custom.css" rel="stylesheet">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <style>
        .scroll-to-top {
            margin-right: 0 !important;
            bottom: 0;
            border-radius: 50% !important;
        }
    </style>
</head>

<body data-bs-spy="scroll" data-bs-target=".navbar">

    <!-- Page Wrapper -->
    <div id="wrapper">