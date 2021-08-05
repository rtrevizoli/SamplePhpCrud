<?php session_start(); ?>
<html>

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Sales</title>
    <!-- Bootstrap Required JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>

<body>
    <?php
    if (!isset($_SESSION['login'])) {
        include('login.php');
    } else {
        if(isset($_GET['logout'])) {
            session_destroy();
            header("Location: http://localhost/tray-homework-php-test/");
        }
        if(isset($_GET['saleId'])) {
            if(isset($_GET['new']) || isset($_GET['edit'])) {
                include('sale.php');
            } else if (isset($_GET['delete'])) {
                include('vendorSales.php');
            }
            return;
        }
        if(isset($_GET['vendorId'])) {
            if(isset($_GET['new']) || isset($_GET['edit'])) {
                include('vendor.php');
            } else if (isset($_GET['delete'])) {
                include('home.php');
            } else if (isset($_GET['sales'])) {
                include('vendorSales.php');
            }
            return;
        }
        include('home.php');
    }
    ?>
</body>

</html>