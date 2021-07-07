<?php
class formularios{
    private $db;

    public function __construct() {
        $this->db = Database::connect();
    }

    //Leer el formulario de un cliente
    public function getFormulario($id_cliente){
        $sql = "SELECT * FROM formularios WHERE id_cliente = $id_cliente";
        $response = $this->db->query($sql);

        if($response){
            if($response->num_rows > 0){
                return $response->fetch_object();
            }
            else{
                return false;
            }
        }
        else{
            return $response;
        }
    }

    public function insertMeta($id_cliente, $objetivo){
        $sql = "INSERT INTO formularios VALUES(NULL, $id_cliente, '', '', '$objetivo', '', '', '');";
        $response = $this->db->query($sql);
        return $response;
    }

    public function UpdateMeta($id_cliente, $objetivo){
        $sql = "UPDATE formularios SET meta = '$objetivo' WHERE id_cliente = $id_cliente";
        $response = $this->db->query($sql);
        return $response;
    }

    public function insertActividadFisica($id_cliente, $actividad){
        $sql = "INSERT INTO formularios VALUES(NULL, $id_cliente, '', '', '', '$actividad', '', '');";
        $response = $this->db->query($sql);
        return $response;
    }

    public function UpdateActividadFisica($id_cliente, $actividad){
        $sql = "UPDATE formularios SET actividad_fisica = '$actividad' WHERE id_cliente = $id_cliente";
        $response = $this->db->query($sql);
        return $response;
    }

    public function insertExcluidos($id_cliente, $alimento){
        $sql = "INSERT INTO excluido VALUES(NULL, $id_cliente ,'$alimento');";
        $response = $this->db->query($sql);
        return $response;
    }

    public function InsertFechaEstatura($id_cliente, $estatura, $peso){
        $sql = "INSERT INTO formularios VALUES(NULL, $id_cliente ,'$estatura', '$peso', '', '', '', '');";
        $response = $this->db->query($sql);
        return $response;
    }

    public function UpdateFechaEstatura($id_cliente, $estatura, $peso){
        $sql = "UPDATE formularios SET altura = '$estatura', peso = '$peso' WHERE id_cliente = $id_cliente";
        $response = $this->db->query($sql);
        return $response;
    }
}
?>