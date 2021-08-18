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
     * @param string $query
     * @param array $params
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
     * Method responsible for join statement
     * @param array $join
     * @return array 
     */
    public function joinMaker($join) {
        $newJoin = [];
        for ($i = 0; $i < count($join); $i++) {
            $actualJoin = '';

            $joinType = $join[$i]['joinType'];
            $joinTable = $join[$i]['joinTable'];

            $actualJoin = $joinType.' '.$joinTable.' '.substr($joinTable, 0, 1);
            $actualJoin .= ' On ';          
            $actualJoin .= substr($this->table, 0, 1).'.'.$join[$i]['mainTableIdColumn'];
            $actualJoin .= ' = ';
            $actualJoin .= substr($joinTable, 0, 1).'.'.$join[$i]['joinTableIdColumn'];
            
            array_push($newJoin, $actualJoin);
        }

        return $newJoin;
    }

    /**
     * Method responsible for database inserts
     * @param array $values [ field => value ]
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

    /**
     * Method responsible for database selects
     * @param array $fields
     * @param array $join
     * @param array $where
     * @param array $order
     * @param array $group
     * @param string $limit
     * @return PDOStatment
     */
    public function select($fields = [], $join = [], $where = [], $order = [], $group = [], $limit = null) {
        // QUERY DATA
        $fields = count($fields) > 0 ? implode(', ', $fields).' ' : '* ';
        $join = count($join) > 0 ? ' '.implode(', ', $this->joinMaker($join)).' ' : '';
        $where = count($where) > 0 ? ' Where '.implode(', ', $where).' ' : '';
        $order = count($order) > 0 ? ' Order by '.implode(', ', $order).' ' : '';
        $group = count($group) > 0 ? ' Group By '.implode(', ', $group).' ' : '';
        $limit = strlen($limit) ? ' Limit '.$limit : '';
        
        // QUERY MAKER
        $query = 'Select '.$fields.'From '.$this->table.' '.substr($this->table, 0, 1).$join.$where.$order.$group.$limit;

        return $this->execute($query);
    }

}