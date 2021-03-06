<?php

require __DIR__.'/vendor/autoload.php';

define('TITLE', 'Vendor edit');

use \App\Entity\Vendor;

// VENDOR ID VALIDATION
if (!isset($_GET['vendorId']) or !is_numeric($_GET['vendorId'])) {
    header('location: index.php?status=error&message=This+is+not+a+vendor+id');
    exit;
}

// GET VENDOR
$obVendor = Vendor::getVendors([], [], ['V.Vendor_Id = '.$_GET['vendorId']], [], [], 1)[0];

// VENDOR VALIDATION
if (!$obVendor instanceof Vendor) {
    header('location: index.php?status=error&message=Vendor+not+found');
    exit;
}

// POST METHOD VALIDATION
if (isset($_POST['inputName'], $_POST['inputEmail'], $_POST['inputPhone'])) {

    $obVendor->Vendor_Name   = $_POST['inputName'];
    $obVendor->Vendor_Email  = $_POST['inputEmail'];
    $obVendor->Vendor_Phone  = $_POST['inputPhone'];
    $obVendor->Vendor_Status_Id = 1;
    $obVendor->update();

    header('location: index.php?status=success&message=Vendor+edited+successfully');
    exit;
}

include __DIR__.'/includes/header.php';
include __DIR__.'/includes/vendorsForm.php';
include __DIR__.'/includes/footer.php';