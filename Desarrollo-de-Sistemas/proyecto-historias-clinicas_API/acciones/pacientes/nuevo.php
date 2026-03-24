<?php

require_once 'responses/nuevoResponse.php';
require_once 'request/nuevoRequest.php';
require_once '../../modelo/paciente.php';
require_once '../../configuracion/database.php';
require_once '../../modelo/obraSocial.php';

header('Content-Type: application/json');


$response=new NuevoResponse ();
$response->isOK=true;
$response->Mensaje []= "";

$json = file_get_contents('php://input',true);
$request = json_decode($json);



$obraSocialDb=ObraSocial::Buscar($request->ObraSocialId);
if($obraSocialDb==null){
    $response->isOK=false;
    $response->Mensaje []= "la obra social no existe";

}

if($response->isOK==true){
    $pa= new Paciente();
    $pa->Nombre= $request->Nombre;
    $pa->Apellido= $request->Apellido;
    $pa->Dni= $request->Dni;
    $pa->Email= $request->Email;
    $pa->GrupoSanguineo= $request->GrupoSanguineo;
    $pa->ObraSocialId= $request->ObraSocialId;
        
    $pa->Agregar();
}



echo json_encode($response);