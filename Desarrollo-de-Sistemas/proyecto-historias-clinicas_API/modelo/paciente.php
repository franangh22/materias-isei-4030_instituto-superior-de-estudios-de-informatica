<?php
class Paciente
{
    public $Id;
    public $Nombre;
    public $Apellido;
    public $Dni;
    public $Email;
    public $Clave;
    public $GrupoSanguineo;
    public $ObraSocialId;

    public static function Buscar($id)
    {
        $con = Database::getInstance();
        $sql = "select * from paciente where Id = :p1";
        $queryClaseAReemplazar = $con->db->prepare($sql);
        $params = array("p1" => $id);
        $queryClaseAReemplazar->execute($params);
        $queryClaseAReemplazar->setFetchMode(PDO::FETCH_CLASS, 'Paciente');
        foreach ($queryClaseAReemplazar as $m) {
            return $m;
        }
    }

    public static function BuscarTodos()
    {
        $con = Database::getInstance();
        $sql = "select * from paciente";
        $queryClaseAReemplazar = $con->db->prepare($sql);
        $queryClaseAReemplazar->execute();
        $queryClaseAReemplazar->setFetchMode(PDO::FETCH_CLASS, 'Paciente');

        $claseAReemplazarADevolver = array();

        foreach ($queryClaseAReemplazar as $m) {
            $claseAReemplazarADevolver[] = $m;
        }

        return $claseAReemplazarADevolver;

    }

    public function Agregar()
    {
        $con = Database::getInstance();
        $sql = "insert into paciente (Nombre,Apellido,Dni,Email,Clave,GrupoSanguineo,ObraSocialId) values (:p1,:p2,:p3,:p4,:p5,:p6,:p7)";
        $claseAReemplazar = $con->db->prepare($sql);
        $params = array("p1" => $this->Nombre, "p2" => $this->Apellido, "p3" => $this->Dni, "p4" => $this->Email, "p5" => $this->Clave, "p6" => $this->GrupoSanguineo, "p7" => $this->ObraSocialId);
        $claseAReemplazar->execute($params);
    }

    public static function ValidarUsuarioyClave($Email, $Clave)
    {
        $con = Database::getInstance();
        $sql = "select * from paciente where Email = :p5 and Clave = :p6";
        $queryClaseAReemplazar = $con->db->prepare($sql);
        $params = array("p5" => $Email, "p6" => $Clave);
        $queryClaseAReemplazar->execute($params);
        $queryClaseAReemplazar->setFetchMode(PDO::FETCH_CLASS, 'Paciente');
        foreach ($queryClaseAReemplazar as $m) {
            return $m;
        }
    }


}