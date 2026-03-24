<?php
require_once 'request/nuevoRequest.php';
require_once 'responses/nuevoResponse.php';
require_once '../../modelo/eventoHistoriaClinica.php';
require_once '../../modelo/paciente.php';
require_once '../../modelo/tipoEventoHistoriaClinica.php';
require_once '../../configuracion/database.php';

header('Content-Type: application/json');
$resp = new NuevoResponse();
$json = file_get_contents('php://input',true);
$req = json_decode($json);

$pacienteDB = Paciente::Buscar($req->PacienteId);
$tipoEventoDB = TipoEventoHistoriaClinica::Buscar($req->TipoEventoId);

$resp->IsOk=true;
$resp->Mensaje[]=" ";

if ($pacienteDB==null){
    $resp->IsOk=false;
    $resp->Mensaje []='El paciente no existe';
}

if ($req->Observaciones==null){
    $resp->IsOk=false;
    $resp->Mensaje []='Debe indicar una observación';
}

if ($tipoEventoDB==null || $tipoEventoDB->Eliminado==1){
    $resp->IsOk=false;
    $resp->Mensaje []='El tipo de evento no existe';
}

if ($resp->IsOk==true) {
    $ehc= new EventoHistoriaClinica();

    $ehc->PacienteId=$req->PacienteId;
    $ehc->Observaciones=$req->Observaciones;
    $ehc->FechaAlta=date('d/M/y');
    $ehc->NombreEstudio=$req->NombreEstudio;
    $ehc->Diagnostico=$req->Diagnostico;
    $ehc->PatologiaATratar=$req->PatologiaATratar;
    $ehc->Medicamentos=$req->Medicamentos;
    $ehc->TipoEventoId=$req->TipoEventoId;

    $ehc->Agregar();
}

echo json_encode($resp);