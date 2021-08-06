<?php

namespace App\Db;

use \PDO;
use \PDOException;

class Database {

    /**
     * Database host conection
     * @var string
     */
    const HOST = 'localhost';

    /**
     * Database name
     * @var string
     */
    const NAME = 'tray-homework-php-test';

    /**
     * Database user
     * @var string
     */
    const USER = 'root';

    /**
     * Database password
     * @var string
     */
    const PASS = '';

    /**
     * Using table name
     * @var string
     */
    private $table;

    /**
     * Instance connection database
     * @var PDO
     */
    private $connection;

    /**
     * Table and connection instance definition
     * @param string $table 
     */
    public function __construct($table = null) {
        $this->table = $table;
        $this->setConnection();
    }

    /**
     * Method responsible for make a database connection
     */
    private function setConnection(){
        try {
            $this->connection = new PDO('mysql:host='.self::HOST.';dbname='.self::NAME.';', self::USER, self::PASS);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die('ERROR: '.$e->getMessage());
        }
    }

    /**
     * Method responsible for execute database querys
     * @var string $query
     * @var array $params
     * @return PDOStatement
     */
    public function execute($query, $params = []){
        try {
            $statement = $this->connection->prepare($query);
            $statement->execute($params);

            return $statement;
        } catch(PDOException $e) {
            die('ERROR: '.$e->getMessage());
        }
    }

    /**
     * Method responsivle for database inserts
     * @param array $values [ fiel => value ]
     * @return integer inserted id
     */
    public function insert($values) {
        // QUERY DATA
        $fields = array_keys($values);
        $binds = array_pad([], count($fields), '?');

        // QUERY MAKER
        $query = 'Insert Into '.$this->table.' ('.implode(', ', $fields).') Values ('.implode(', ', $binds).') ';
        
        // INSERT EXECUTE
        $this->execute($query, array_values(($values)));

        // RETURN LAST INSERTED ID
        return $this->connection->lastInsertId();
    }

}