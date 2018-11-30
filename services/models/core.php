<?php

// all core services
namespace services\core {

  class ResponseObject {

    public $status;// 0 - no error, 1 - Executed/Successful, 2 - Error
    public $message;
    public $data;

    public function __construct() {
      $status = 0;
      $message = null;
      $data = null;
    }
  }

  //database constants
  class DBConstants {
    const DB_HOST = 'localhost';
    const DB_NAME = 'dbname';
    const DB_USER_NAME = 'dbusername';
    const DB_USER_PASSWORD = 'dbpassword';

    public static function getDbHost() {
      return self::DB_HOST;
    }

    public static function getdbConnectionName() {
      return self::DB_NAME;
    }

    public static function getDbUserName() {
      return self::DB_USER_NAME;
    }

    public static function getDbUserPassword() {
      return self::DB_USER_PASSWORD;
    }
  }

  //extend this repo when access to db is needed
  class ConnectionRepository {
    public $dbConnection = null;
    public function __construct() {
      try {
        $this->dbConnection = new \PDO("mysql:host=" . DBConstants::getDbHost() . ";dbname=" . DBConstants::getdbConnectionName(), DBConstants::getDbUserName(), DBConstants::getDbUserPassword());
      } catch (\PDOException $e) {
        echo $e->getTraceAsString();
      }
    }
  }
}


?>