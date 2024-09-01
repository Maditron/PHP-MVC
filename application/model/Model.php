<?php

namespace application\model;


use PDO;
use PDOException;

class Model
{

    protected $connection;

    public function __construct()
    {
        if (!isset ($this->connection)) {
            try {
                $this->connection = new PDO("mysql:host=localhost:3307;dbname=mvc_blog", 'root');
                // set the PDO error mode to exception
                $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $this->connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
                // echo "db Connected successfully";
            
              } catch(PDOException $e) {
                echo "Connection failed: " . $e->getMessage();
              }
        }
    }


    protected function query($query, $values = null)
    {
        try {
            // values is an array
            if ($values == null) {
                return $this->connection->query($query);
            } else {
                $stmt = $this->connection->prepare($query);
                $stmt->execute($values);
                return $stmt;
            }
        } catch (PDOException $e) {
            echo 'something went wrong!' . $e->getMessage();
        }

    }


    protected function execute($query, $values = null)
    {
        try {
            // values is an array
            if ($values == null) {
                return $this->connection->exec($query);
            } else {
                $stmt = $this->connection->prepare($query);
                $stmt->execute($values);
            }
            return true;
        } catch (PDOException $e) {
            echo 'something went wrong!' . $e->getMessage();
            return false;
        }

    }



    protected function closeConnection()
    {
        $this->connection = null;
    }



}