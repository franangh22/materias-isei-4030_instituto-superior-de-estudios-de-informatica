<?php

require_once 'request/nuevoLoginRequest.php';
require_once 'responses/loginResponse.php';
require_once '../../configuracion/database.php';
require_once '../../modelo/paciente.php';

header('Content-Type: application/json');

$resp = new LoginResponse();

$json = file_get_contents('php://input', true);
$req = json_decode($json);

$Paciente = Paciente::ValidarUsuarioyClave($req->Email, $req->Clave);

$resp->IsOk = true;
$resp->Mensajes[] = "";

if ($Paciente == NULL) {
    $resp->IsOk = false;
    $resp->Mensajes[] = "el usuario y/o contraseña son incorrectos";
}

echo json_encode($resp);