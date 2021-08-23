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
                                                'Vendor_Name'       => $this->Vendor_Name,
                                                'Vendor_Email'      => $this->Vendor_Email,
                                                'Vendor_Phone'      => $this->Vendor_Phone,
                                                'Vendor_Status_Id'  => $this->Vendor_Status_Id
                                            ]);

        //RETURN SUCCESS
        return true;
    }

    /**
     * Reponsible method for database updates
     * @return boolean
     */
    public function update() {
        // DATABASE VENDOR UPDATE AND RETURN
        return (new Database('vendor'))->update('Vendor_Id = '.$this->Vendor_Id, [
                                                                                    'Vendor_Name'       => $this->Vendor_Name,
                                                                                    'Vendor_Email'      => $this->Vendor_Email,
                                                                                    'Vendor_Phone'      => $this->Vendor_Phone,
                                                                                    'Vendor_Status_Id'  => $this->Vendor_Status_Id  
                                                                                ]);
    }

    /**
     * Responsible method responsible for logial delete a vendor
     * @return boolean
     */
    public function delete() {
        // DATABASE VENDOR LOGICAL DELETE AND RETURN
        return (new Database('vendor'))->update('Vendor_Id = '.$this->Vendor_Id, [
                                                                                    'Vendor_Status_Id' => 2
                                                                                ]);
    }

    /**
     * Responsible method that get vendors on db
     * @param array $fields []
     * @param array $join []
     * @param array $where []
     * @param array $order []
     * @param array $group []
     * @param string $limit null
     * @return array
     */
    public static function getVendors($fields = [], $join = [], $where = [], $order = [], $group = [], $limit = null) {
        //DATABASE GET VENDORS AND RETURN
        return (new Database('vendor'))->select($fields, $join, $where, $order, $group, $limit)
                                       ->fetchAll(PDO::FETCH_CLASS, self::class);
    }
    
}