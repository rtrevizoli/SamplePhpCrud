<?php

require __DIR__.'/vendor/autoload.php';

use \App\Entity\Vendor;

define("ISSEARCH", isset($_POST['vendorsSearch']) ? true : false);

$vendorsSearch = ISSEARCH ? ' and V.Vendor_Name like "%'.$_POST['vendorsSearch'].'%"' : '';

$vendors = Vendor::getVendors([
                                'V.Vendor_Id',
                                'V.Vendor_Name', 
                                'V.Vendor_Email',
                                'V.Vendor_Phone',
                                'V.Vendor_Status_Id',
                                'Truncate(IfNull(Sum(S.Sale_Value), 0), 2) Vendor_Sales',
                                'Truncate(IfNull(Sum(S.Sale_Value), 0) * 0.085, 2) Vendor_Charge'
                            ],
                            [[
                                'joinType' => 'Left Join',
                                'joinTable' => 'Sale',
                                'mainTableIdColumn' => 'Vendor_Id',
                                'joinTableIdColumn' => 'Sale_Vendor_Id'
                            ]], 
                            [
                                'V.Vendor_Status_Id = 1'.$vendorsSearch
                            ], 
                            [], 
                            [
                                'V.Vendor_Id', 
                                'V.Vendor_Name', 
                                'V.Vendor_Email', 
                                'V.Vendor_Phone'
                            ]);

$vendorsSearch = ISSEARCH ? explode("%", $vendorsSearch)[1] : '';

// echo "<pre>"; print_r($vendors); echo "</pre>"; exit;

include __DIR__.'/includes/header.php';
include __DIR__.'/includes/alert.php';
include __DIR__.'/includes/vendorsList.php';
include __DIR__.'/includes/footer.php';