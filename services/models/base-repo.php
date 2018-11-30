<?php

namespace services\base;

require_once("core.php");
use services\core as Core;

class DataAPI extends Core\ConnectionRepository {

  public function __construct() {
    parent::__construct();
  }

  public function getAll() {

    $responseObject = new Core\ResponseObject();
    $responseObject->status = 0;

    try {
      $sql = "SELECT * FROM table_name;";
      $statement = $this->dbConnection->prepare($sql);
      $statement->execute();
      $response = $statement->fetchAll();
      if($response){
        $responseObject->status = 1;
      }
      $responseObject->data = $response;
      return $responseObject;
    }catch (\PDOException $e) {
      $responseObject->message = $e->getTraceAsString();
      return $responseObject;
    }
  }
}
?>