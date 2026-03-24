<?php

require_once 'request/eliminarrequest.php';
require_once 'responses/eliminarResponse.php';
require_once '../../modelo/obraSocial.php';
require_once '../../configuracion/database.php';

header('Content-Type: application/json');

$response=new EliminarObrasocial ();

$json = file_get_contents('php://input',true);
$request = json_decode($json);

$os= new ObraSocial ();
$os->Id = $request->Id;
$os->Eliminar();





$response->IsOK=true;
$response->Mensaje []= "";


echo json_encode($response);
