<?php
class ObraSocial
{    
    public $Id;
    public $Descripcion;
    public $Eliminado;

    public static function BuscarTodasActivas()
    {
        $con  = Database::getInstance();
        $sql = "select * from obrasocial where Eliminado = 0";
        $queryClaseAReemplazar = $con->db->prepare($sql);
        $queryClaseAReemplazar->execute();
        $queryClaseAReemplazar->setFetchMode(PDO::FETCH_CLASS, 'ObraSocial');

        $claseAReemplazarADevolver = array();

        foreach ($queryClaseAReemplazar as $m) {
            $claseAReemplazarADevolver[] = $m;
        }

        return $claseAReemplazarADevolver;
    }

    public static function BuscarTodas()
    {
        $con  = Database::getInstance();
        $sql = "select * from obrasocial";
        $queryClaseAReemplazar = $con->db->prepare($sql);
        $queryClaseAReemplazar->execute();
        $queryClaseAReemplazar->setFetchMode(PDO::FETCH_CLASS, 'ObraSocial');

        $claseAReemplazarADevolver = array();

        foreach ($queryClaseAReemplazar as $m) {
            $claseAReemplazarADevolver[] = $m;
        }

        return $claseAReemplazarADevolver;
    }

    public static function Buscar($id)
    {
        $con  = Database::getInstance();
        $sql = "select * from obrasocial where Id = :p1";
        $queryClaseAReemplazar = $con->db->prepare($sql);
        $params = array("p1" => $id);
        $queryClaseAReemplazar->execute($params);
        $queryClaseAReemplazar->setFetchMode(PDO::FETCH_CLASS, 'ObraSocial');
        foreach ($queryClaseAReemplazar as $m) {
            return $m;
        }
    }

    public function Agregar()
    {
        $con  = Database::getInstance();
        $sql = "insert into obrasocial (Descripcion) values (:p1)";
        $claseAReemplazar = $con->db->prepare($sql);
        $params = array("p1" => $this->Descripcion);
        $claseAReemplazar->execute($params);
    }

    public function Modificar()
    {
        $con = Database::getInstance();
        $sql = "UPDATE [tablaAReemplazar]
                    SET
                    [propiedad1] = :p1,
                    [propiedad2] = :p2
                    WHERE Id = :p3";
        $claseAReemplazar = $con->db->prepare($sql);
        $params = array("p1" => $this->propiedad1, "p2" => $this->propiedad2, "p3" => $this->Id);
        $claseAReemplazar->execute($params);
    }

    public function Eliminar()
    {
        $con = Database::getInstance();
        $sql = "UPDATE obrasocial SET Eliminado=1 WHERE Id = :p1";
        $claseAReemplazar = $con->db->prepare($sql);
        $params = array("p1" => $this->Id);
        $claseAReemplazar->execute($params);
    }
}
