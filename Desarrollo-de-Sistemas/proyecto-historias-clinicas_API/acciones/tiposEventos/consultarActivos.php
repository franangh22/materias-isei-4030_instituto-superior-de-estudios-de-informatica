<?php

require_once '../../configuracion/database.php';
require_once '../../modelo/tipoEventoHistoriaClinica.php';
require_once 'responses/consultarActivosResponse.php';

header('Content-Type: application/json');
$resp = new ConsultarTodosActivos();


$resp->ListTiposEventos = TipoEventoHistoriaClinica::BuscarTodosActivos();

echo json_encode($resp);