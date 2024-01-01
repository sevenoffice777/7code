<?php 

require '../services/conn_host.php';
require '../services/prepareAndExecute.php';

$jsonData;

$jsonData = $_POST;



echo json_encode($jsonData);