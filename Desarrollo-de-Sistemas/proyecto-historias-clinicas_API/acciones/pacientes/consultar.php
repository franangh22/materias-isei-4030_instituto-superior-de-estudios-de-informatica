<?php

require_once '../../modelo/paciente.php';
require_once '../../configuracion/database.php';
require_once 'responses/consultarResponse.php';

header('Content-Type: application/json');
$resp = new ConsultarResponse();

$resp->Paciente = Paciente::Buscar($_GET['Id']);


echo json_encode($resp);
