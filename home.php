<?php
$userName = $_SESSION["login"];
?>

<h1><?php echo "Hello, " . $userName; ?></h1>

<a class="btn btn-primary" href="http://localhost/tray-homework-php-test/?logout">Logout</a>