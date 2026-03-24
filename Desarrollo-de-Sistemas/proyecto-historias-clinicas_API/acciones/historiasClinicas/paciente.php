<?php
require_once 'responses/pacienteResponse.php';
require_once '../../modelo/eventoHistoriaClinica.php';
require_once '../../configuracion/database.php';
header('Content-Type: application/json');
$resp= new PacienteResponse();

$resp->ListEventoHistoriaClinica = EventoHistoriaClinica::BuscarTodosPaciente($_GET['idpaciente']);



echo json_encode($resp);