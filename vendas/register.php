<?php

require __DIR__.'/vendor/autoload.php';

define('TITLE', 'Vendor registration');

use \App\Entity\Vendor;

// VALIDAÇÂO DO POST
if (isset($_POST['inputName'], $_POST['inputEmail'], $_POST['inputPhone'])) {
    $obVendor = new Vendor;
    $obVendor->vendorName   = $_POST['inputName'];
    $obVendor->vendorEmail  = $_POST['inputEmail'];
    $obVendor->vendorPhone  = $_POST['inputPhone'];
    $obVendor->vendorStatusId = 1;
    $obVendor->register();

    header('location: index.php?status=success');
    exit;
}

include __DIR__.'/includes/header.php';
include __DIR__.'/includes/vendorsForm.php';
include __DIR__.'/includes/footer.php';