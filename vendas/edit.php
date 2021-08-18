<?php

require __DIR__.'/vendor/autoload.php';

define('TITLE', 'Vendor edit');

use \App\Entity\Vendor;

// VENDOR ID VALIDATION
if (!isset($_GET['vendorId']) or !is_numeric($_GET['vendorId'])) {
    header('location: index.php?status=error');
    exit;
}

// GET VENDOR
$obVendor = Vendor::getVendors([], [], ['V.Vendor_Id = '.$_GET['vendorId']], [], [], 1)[0];

// VENDOR VALIDATION
if (!$obVendor instanceof Vendor) {
    header('location: index.php?status=error');
    exit;
}

// POST METHOD VALIDATION
if (isset($_POST['inputName'], $_POST['inputEmail'], $_POST['inputPhone'])) {

    $obVendor->vendorName   = $_POST['inputName'];
    $obVendor->vendorEmail  = $_POST['inputEmail'];
    $obVendor->vendorPhone  = $_POST['inputPhone'];
    $obVendor->vendorStatusId = 1;
    $obVendor->update();

    header('location: index.php?status=success');
    exit;
}

include __DIR__.'/includes/header.php';
include __DIR__.'/includes/vendorsForm.php';
include __DIR__.'/includes/footer.php';