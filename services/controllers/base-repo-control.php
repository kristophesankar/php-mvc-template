<?php

//import repositories
require_once("../models/base-repo.php");
use services\base as BaseRepo;
use services\core as Core;

//define service requests
$DEFAULT = 0;
$GETALL= 1;

if (isset($_POST["requestid"])) {
  $formdata = $_POST["requestid"];
  $requestid = $_POST["requestid"];
}

switch ($requestid) {

  case $GETALL:
    $repo = new BaseRepo\DataAPI();
    $response = $repo->getAll();
    echo json_encode($response);
  break;

  default:

    $responseObject = new Core\ResponseObject();
    $responseObject->status = 2;
    $responseObject->message = "The service requested doesn't exist.";
    echo json_encode($responseObject);

  break;
}







?>