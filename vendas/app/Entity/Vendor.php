<?php

namespace App\Entity;

use \App\Db\Database;

class Vendor {
    
    /**
     * Vendor's identifier
     * @var integer
     */
    public $vendorId;

    /**
     * Vendor's name
     * @var string
     */
    public $vendorName;

    /**
     *  Vendor's e-mail
     * @var string
     */
    public $vendorEmail;

    /**
     * Vendor's phone
     * @var string
     */
    public $vendorPhone;

    /**
     * Vendor status identifier
     * @var integer
     */
    public $vendorStatusId;

    /**
     * Responsible method that register new vendors on db
     * @return boolean
     */
    public function register() {
        //DATABASE VENDOR INSERT
        $obDatabase = new Database('vendor');
        echo "<pre>"; print_r($obDatabase); echo "</pre>"; exit;
        //ASSIGN VENDOR ID TO INSTANCE

        //RETURN SUCCESS

    }

}