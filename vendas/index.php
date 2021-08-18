<?php

require __DIR__.'/vendor/autoload.php';

use \App\Entity\Vendor;

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
                                'V.Vendor_Status_Id = 1'
                            ], 
                            [], 
                            [
                                'V.Vendor_Id', 
                                'V.Vendor_Name', 
                                'V.Vendor_Email', 
                                'V.Vendor_Phone'
                            ]);

// echo "<pre>"; print_r($vendors); echo "</pre>"; exit;

include __DIR__.'/includes/header.php';
include __DIR__.'/includes/vendorsList.php';
include __DIR__.'/includes/footer.php';