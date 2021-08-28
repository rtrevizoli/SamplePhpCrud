<?php

require __DIR__.'/vendor/autoload.php';

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
if (isset($_POST['delete'])) {
    
    $obVendor->delete();

    header('location: index.php?status=success&message=Vendor+deleted+Successfully');
    exit;
}

include __DIR__.'/includes/header.php';
include __DIR__.'/includes/confirm-delete.php';
include __DIR__.'/includes/footer.php';