<?php

require __DIR__.'/vendor/autoload.php';

define('TITLE', 'Vendor registration');

use \App\Entity\Vendor;

$obVendor = new Vendor;

// VALIDAÇÂO DO POST
if (isset($_POST['inputName'], $_POST['inputEmail'], $_POST['inputPhone'])) {
    $obVendor->Vendor_Name   = $_POST['inputName'];
    $obVendor->Vendor_Email  = $_POST['inputEmail'];
    $obVendor->Vendor_Phone  = $_POST['inputPhone'];
    $obVendor->Vendor_Status_Id = 1;
    $obVendor->insert();

    header('location: index.php?status=success');
    exit;
}

include __DIR__.'/includes/header.php';
include __DIR__.'/includes/vendorsForm.php';
include __DIR__.'/includes/footer.php';