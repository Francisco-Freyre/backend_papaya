<?php
class dos_semanas{
    private $db;

    public function __construct() {
        $this->db = Database::connect();
    }

    public function Get($id_cliente){
        $sql = "SELECT * FROM dos_semanas WHERE cliente_id = $id_cliente";
        return $response = $this->db->query($sql);
    }

    public function insert($id_cliente){
        $sql = "INSERT INTO dos_semanas VALUES(NULL, $id_cliente, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, CURDATE());";
        $response = $this->db->query($sql);
        return $response;
    }

    public function Update($id_cliente){
        $sql = "UPDATE dos_semanas SET d1 = 0, d2 = 0, d3 = 0, d4 = 0, d5 = 0, d6 = 0, d7 = 0, d8 = 0, d9 = 0, d10 = 0, d11 = 0, d12 = 0 WHERE cliente_id = $id_cliente";
        $response = $this->db->query($sql);
        return $response;
    }

    public function UpdateFecha($id_cliente, $fecha){
        $sql = "UPDATE dos_semanas SET dia_final = '$fecha' WHERE cliente_id = $id_cliente";
        $response = $this->db->query($sql);
        return $response;
    }

    public function UpdateDia($id_cliente, $dia, $valor){
        $sql = "UPDATE dos_semanas SET $dia = '$valor' WHERE cliente_id = $id_cliente";
        $response = $this->db->query($sql);
        return $response;
    }

    public function DeleteByCliente($id_cliente){
        $sql = "DELETE FROM dias WHERE cliente_id = $id_cliente";
        $response = $this->db->query($sql);
        return $response;
    }
}
?>