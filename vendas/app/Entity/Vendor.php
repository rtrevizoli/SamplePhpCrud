<?php

namespace App\Entity;

use \App\Db\Database;
use \PDO;

class Vendor {
    
    /**
     * Vendor's identifier
     * @var integer
     */
    public $Vendor_Id;

    /**
     * Vendor's name
     * @var string
     */
    public $Vendor_Name;

    /**
     *  Vendor's e-mail
     * @var string
     */
    public $Vendor_Email;

    /**
     * Vendor's phone
     * @var string
     */
    public $Vendor_Phone;

    /**
     * Vendor status identifier
     * @var integer
     */
    public $Vendor_Status_Id;

    /**
     * Responsible method that register new vendors on db
     * @return boolean
     */
    public function insert() {
        //DATABASE VENDOR INSERT
        $obDatabase = new Database('vendor');
        $this->Vendor_Id = $obDatabase->insert([
                                                'Vendor_Name'       => $this->vendorName,
                                                'Vendor_Email'      => $this->vendorEmail,
                                                'Vendor_Phone'      => $this->vendorPhone,
                                                'Vendor_Status_Id'  => $this->vendorStatusId
                                            ]);

        //RETURN SUCCESS
        return true;
    }

    /**
     * Responsible method that get vendors on db
     * @param string $where
     * @param string $order
     * @param string $limit
     * @return array
     */
    public static function getVendors($fields = [], $join = [], $where = [], $order = [], $group = [], $limit = null) {
        //DATABASE GET VENDORS AND RETURN
        return (new Database('vendor'))->select($fields, $join, $where, $order, $group, $limit)
                                       ->fetchAll(PDO::FETCH_CLASS, self::class);
    }

}