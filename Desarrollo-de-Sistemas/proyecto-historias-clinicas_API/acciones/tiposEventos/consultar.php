<?php

require_once 'responses/consultarResponse.php';
require_once '../../modelo/tipoEventoHistoriaClinica.php';
require_once '../../configuracion/database.php';

header('Content-Type: application/json');
$resp = new ConsultarResponse();


$resp->TipoEventoHistoriaClinica = TipoEventoHistoriaClinica::Buscar($_GET['Id']);

echo json_encode($resp);