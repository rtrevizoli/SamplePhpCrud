<?php

require __DIR__.'/vendor/autoload.php';

use \App\Entity\Vendor;


// echo "<pre>"; print_r($_POST); echo "</pre>"; exit;

// VALIDAÇÂO DO POST
if (isset($_POST['inputName'], $_POST['inputEmail'], $_POST['inputPhone'])) {
    $obVendor = new Vendor;
    $obVendor->vendorName   = $_POST['inputName'];
    $obVendor->vendorEmail  = $_POST['inputEmail'];
    $obVendor->vendorPhone  = $_POST['inputPhone'];
    $obVendor->vendorStatusId = 1;
    $obVendor->register();

    echo "<pre>"; print_r($obVendor); echo "</pre>"; exit;


}

include __DIR__.'/includes/header.php';
include __DIR__.'/includes/vendorsForm.php';
include __DIR__.'/includes/footer.php';