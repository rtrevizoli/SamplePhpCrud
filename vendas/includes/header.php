<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- JQuery and Bootstrap CSS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">

    <title>Sales</title>
    <script src="components/b-alert.js" defer></script>
</head>

<body>
    <?php
        if (isset($_GET['status'])) {
    ?>
            <b-alert alert-text="<?=$_GET['status'].'.'?>"></b-alert>
    <?php
        }
    ?>

    <div class="container py-4" style="width: 80%;">
        <div class="jumbotron">
            <h1>Sales pannel</h1>
            <p>OOP crud example</p>
        </div>