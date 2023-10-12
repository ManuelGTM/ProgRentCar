<?php

include_once 'singleton.php';

class Database{

    function getConnection()
    {
    
        $dbConnection = null;
    
        try {
            $dbConnection = Singleton::getInstance()->conn ;//instanciando la clace de singleton

        } catch (PDOException $e) {
            $dbConnection = null;
        }
    
        return $dbConnection;
    }
}


?>

