<?php

class EventoHistoriaClinica
{

    public $Id;
    public $PacienteId;
    public $FechaAlta;
    public $Observaciones;
    public $NombreEstudio;
    public $Diagnostico;
    public $PatologiaATratar;
    public $Medicamentos;
    public $TipoEventoId;

    public static function BuscarTodosPaciente($idpaciente)
    {
        $con  = Database::getInstance();
        $sql = "select * from eventohistoriaclinica where PacienteId = :p1";
        $queryClaseAReemplazar = $con->db->prepare($sql);
        $params = array("p1" => $idpaciente);
        $queryClaseAReemplazar->execute($params);
        $queryClaseAReemplazar->setFetchMode(PDO::FETCH_CLASS, 'EventoHistoriaClinica');

        $claseAReemplazarADevolver = array();

        foreach ($queryClaseAReemplazar as $m) {
            $claseAReemplazarADevolver[] = $m;
        }
        return $claseAReemplazarADevolver;
    }

    public static function Buscar($id)
    {
        $con  = Database::getInstance();
        $sql = "select * from eventohistoriaclinica where Id = :p1";
        $queryClaseAReemplazar = $con->db->prepare($sql);
        $params = array("p1" => $id);
        $queryClaseAReemplazar->execute($params);
        $queryClaseAReemplazar->setFetchMode(PDO::FETCH_CLASS, 'EventoHistoriaClinica');
        foreach ($queryClaseAReemplazar as $m) {
            return $m;
        }
    }

    public function Agregar()
    {
        $con  = Database::getInstance();
        $sql = "insert into eventohistoriaclinica (PacienteId, Observaciones, FechaAlta, NombreEstudio, Diagnostico, 
        PatologiaATratar, Medicamentos, TipoEventoId) values (:p1, :p2, :p3, :p4, :p5, :p6, :p7, :p8)";
        $claseAReemplazar = $con->db->prepare($sql);
        $params = array(
            "p1" => $this->PacienteId, "p2" => $this->Observaciones, "p3" => $this->FechaAlta,
            "p4" => $this->NombreEstudio, "p5" => $this->Diagnostico, "p6" => $this->PatologiaATratar,
            "p7" => $this->Medicamentos, "p8" => $this->TipoEventoId
        );
        $claseAReemplazar->execute($params);
    }
}
