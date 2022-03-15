<?php
class dias{
    private $db;

    public function __construct() {
        $this->db = Database::connect();
    }

    public function Get($id_cliente){
        $sql = "SELECT * FROM dias WHERE cliente_id = $id_cliente";
        return $response = $this->db->query($sql);
    }

    public function GetByFecha($id_cliente, $fecha){
        $sql = "SELECT * FROM dias WHERE cliente_id = $id_cliente AND fecha = '$fecha'";
        return $response = $this->db->query($sql);
    }

    public function insert($id_cliente, $fecha, $dia){
        $sql = "INSERT INTO dias VALUES(NULL, $id_cliente, '$fecha', '$dia');";
        $response = $this->db->query($sql);
        return $response;
    }

    public function UpdateBy($id_cliente){
        $sql = "UPDATE check_dia SET fecha = CURDATE(), check1 = 0, check2 = 0, check3 = 0, check4 = 0, check5 = 0 WHERE cliente_id = $id_cliente";
        $response = $this->db->query($sql);
        return $response;
    }

    public function Update($id, $fecha){
        $sql = "UPDATE dias SET fecha = '$fecha' WHERE id = $id";
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