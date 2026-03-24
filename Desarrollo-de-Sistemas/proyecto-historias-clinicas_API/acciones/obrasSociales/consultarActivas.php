<?php

require_once 'responses/responseConsultarActivas.php';
require_once '../../modelo/obraSocial.php';
require_once '../../configuracion/database.php';
header('Content-Type: application/json');

$resp= new responseConsultarActivas();


$resp->ListObrasSociales = ObraSocial::BuscarTodasActivas();

echo json_encode($resp);

