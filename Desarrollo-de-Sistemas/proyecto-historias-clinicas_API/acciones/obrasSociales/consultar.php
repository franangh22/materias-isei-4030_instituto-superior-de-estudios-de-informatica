<?php

require_once '../../modelo/obraSocial.php';
require_once '../../configuracion/database.php';
require_once 'responses/consultarResponse.php';

header('Content-Type: application/json');
$resp = new consultarResponse();

$resp->ObraSocial = ObraSocial::Buscar($_GET['Id']);


echo json_encode($resp);
